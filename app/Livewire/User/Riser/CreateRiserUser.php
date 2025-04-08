<?php

namespace App\Livewire\User\Riser;

use Livewire\Component;
use App\Models\Customer;
use App\Traits\MediaTrait;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;

class CreateRiserUser extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Create Riser POS Customer')]

    public $name, $email, $type, $phone, $address, $dob, $media, $gender, $national_id, $profession, $company_name, $monthly_income, $special_notes;
    public $status = true;

    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|email|unique:customers,email',
        'type' => 'nullable|string',
        'phone' => 'required|string',
        'address' => 'required',
        'dob' => 'required|date',
        'media' => 'required|image|max:1024',
        'gender' => 'required|in:Male,Female,Other',
        'national_id' => 'required|string',
        'profession' => 'required|string',
        'company_name' => 'required|string',
        'monthly_income' => 'nullable',
        'special_notes' => 'nullable|string',
    ];

    public function store()
    {
        $this->validate();

        $media_id = null;
        if ($this->media) {
            $media = $this->uploadMedia($this->media, 'uploads/customer', 80);
            $media_id = $media->id;
        }

        Customer::create([
            'name' => $this->name,
            'email' => $this->email,
            'type' => 'riser',
            'phone' => $this->phone,
            'address' => $this->address,
            'dob' => $this->dob,
            'media_id' => $media_id,
            'gender' => $this->gender,
            'national_id' => $this->national_id,
            'profession' => $this->profession,
            'company_name' => $this->company_name,
            'monthly_income' => $this->monthly_income,
            'special_notes' => $this->special_notes,
            'status' => $this->status,
        ]);

        $this->reset();

        session()->flash('message', 'Customer created successfully!');
        return redirect()->route('riser.user');
    }

    public function render()
    {
        return view('livewire.user.riser.create-riser-user')->extends('layouts.app');
    }
}
