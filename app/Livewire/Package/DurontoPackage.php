<?php

namespace App\Livewire\Package;

use Livewire\Component;
use App\Models\Package as ModelPackage;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

class DurontoPackage extends Component
{
    use WithPagination;

    #[Title('Duronto POS Packages')]

    public $editingPackage = null;
    public $search = '';
    public $name;
    public $price;
    public $detail;
    public $status = true;

    public function submit()
    {
        $this->validate([
            'name' => 'required|unique:packages,name',
            'price' => 'required',
            'detail' => 'required',
        ]);

        ModelPackage::create([
            'name' => $this->name,
            'price' => $this->price,
            'detail' => $this->detail,
            'type' => 'duronto',
            'status' => $this->status,
        ]);

        session()->flash('message', 'Package created successfully!');
        $this->reset(['name', 'price', 'detail', 'status']);
        $this->dispatch('close-modal');
    }

    public function edit($id)
    {
        $this->editingPackage = ModelPackage::findOrFail($id);
        $this->name = $this->editingPackage->name;
        $this->price = $this->editingPackage->price;
        $this->detail = $this->editingPackage->detail;
        $this->status = $this->editingPackage->status;

        $this->dispatch('open-modal', '#ModalOne');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|unique:packages,name,' . $this->editingPackage->id,
            'price' => 'required',
            'detail' => 'required',
        ]);

        $this->editingPackage->update([
            'name' => $this->name,
            'price' => $this->price,
            'detail' => $this->detail,
            'status' => $this->status,
        ]);

        session()->flash('message', 'Package updated successfully!');
        $this->reset(['editingPackage', 'name', 'price', 'detail', 'status']);
        $this->dispatch('close-modal');
    }

    public function delete($id)
    {
        $package = ModelPackage::findOrFail($id);
        $package->delete();

        session()->flash('message', 'Package deleted successfully!');
    }

    public function render()
    {
        $packages = ModelPackage::query()
            ->where('type', 'duronto')
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('price', 'like', '%' . $this->search . '%')
                    ->orWhere('detail', 'like', '%' . $this->search . '%')
                    ->orWhere('status', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(20);

        return view('livewire.package.duronto-package', ['packages' => $packages])->extends('layouts.app');
    }
}
