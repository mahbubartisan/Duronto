<?php

namespace App\Livewire;

use App\Models\Settings as ModelsSettings;
use Livewire\Component;

class Settings extends Component
{
    // public $per_unit_charge;
    // public $service_charge;
    // public $demand_charge;
    // public $ac_charge;
    // public $vat_charge;
    // public $fine_amount;

    public $settings;
    public $editItem = null;
    public $editAmount = null;

    public function mount()
    {
        $this->settings = ModelsSettings::all();
    }

    public function edit($id)
    {
        $this->editItem = ModelsSettings::findOrFail($id);
        $this->editAmount = $this->editItem->amount;
    }

    // public function submit()
// {
//     $this->validate([
//         'per_unit_charge' => 'required',
//         'service_charge' => 'required',
//         'demand_charge' => 'required',
//         'ac_charge' => 'required',
//         'vat_charge' => 'required',
//         'fine_amount' => 'required',
//     ]);

//     ModelsSettings::create([
//         'per_unit_charge' => $this->per_unit_charge,
//         'service_charge' => $this->service_charge,
//         'demand_charge' => $this->demand_charge,
//         'ac_charge' => $this->ac_charge,
//         'vat' => $this->vat_charge,
//         'fine_amount' => $this->fine_amount,
//     ]);

//     $this->reset();

//     session()->flash('message', 'Settings saved successfully!');
//     $this->dispatch('close-modal');

// }


    public function update()
    {
        $this->validate([
            'editAmount' => 'required',
        ]);

        $this->editItem->amount = $this->editAmount;
        $this->editItem->save();

        $this->settings = ModelsSettings::all();
        $this->dispatch('hideEditModal');
        $this->resetEdit();
    }

    public function resetEdit()
    {
        $this->editItem = null;
        $this->editAmount = null;
    }

    public function render()
    {
        return view('livewire.settings')->extends('layouts.app');
    }
}
