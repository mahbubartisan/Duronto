<?php

namespace App\Livewire\Subcritption;

use App\Models\Package;
use Livewire\Component;
use App\Models\Customer;
use App\Models\Subscription;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

class RiserSubscriber extends Component
{
    use WithPagination;

    #[Title('Riser POS Subscriptions')]

    public $editingSubscription = null;
    public $search = '';
    public $customer_id;
    public $package_id;
    public $start_date;
    public $end_date;
    public $status = true;
    public $customers = [];
    public $packages = [];

    public function mount()
    {
        $this->customers = Customer::where('type', 'riser')->get();
        $this->packages = Package::where('type', 'riser')->get();
    }

    public function submit()
    {
        $this->validate([
            'customer_id' => 'required',
            'package_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        Subscription::create([
            'customer_id' => $this->customer_id,
            'package_id' => $this->package_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'type' => 'riser',
            'status' => $this->status,
        ]);

        session()->flash('message', 'Subscription created successfully!');
        $this->resetForm();
        $this->dispatch('close-modal');
    }

    public function updateField($field, $value)
    {
        $this->$field = $value;
    }

    public function edit($id)
    {
        $this->editingSubscription = Subscription::with(['customer', 'package'])->findOrFail($id);

        $this->customer_id = $this->editingSubscription->customer->id;
        $this->package_id = $this->editingSubscription->package->id;
        $this->start_date = $this->editingSubscription->start_date;
        $this->end_date = $this->editingSubscription->end_date;
        $this->status = $this->editingSubscription->status;

        $this->customers = Customer::where('type', 'riser')->get();
        $this->packages = Package::where('type', 'riser')->get();

        $this->dispatch('open-modal', '#ModalOne');
    }


    public function update()
    {
        $this->editingSubscription->update([
            'customer_id' => $this->customer_id,
            'package_id' => $this->package_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'type' => 'riser',
            'status' => $this->status,
        ]);

        session()->flash('message', 'Subscription updated successfully!');
        $this->resetForm();
        $this->dispatch('close-modal');
    }

    public function delete($id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();

        session()->flash('message', 'Subscription deleted successfully!');
    }

    public function resetForm()
    {
        $this->customer_id = null;
        $this->package_id = null;
        $this->start_date = null;
        $this->end_date = null;
        $this->editingSubscription = null;
    }


    public function render()
    {
        $subscriptions = Subscription::with(['customer', 'package'])
            ->where('type', 'riser')
            ->when(
                $this->search,
                function ($query) {
                    $query->whereHas('customer', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                    })->orWhereHas('package', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                    });
                }
            )
            ->latest()
            ->paginate(20);

        return view('livewire.subcritption.riser-subscriber', ['subscriptions' => $subscriptions])->extends('layouts.app');
    }
    
}
