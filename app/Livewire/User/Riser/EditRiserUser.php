<?php

namespace App\Livewire\User\Riser;

use App\Models\Media;
use Livewire\Component;
use App\Models\Customer;
use App\Traits\MediaTrait;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;

class EditRiserUser extends Component
{
    use WithFileUploads, MediaTrait;

    #[Title('Edit Riser POS Customer')]

    public $name, $email, $type, $phone, $address, $dob, $media, $gender, $national_id, $profession, $company_name, $monthly_income, $special_notes;
    public $customerId;
    public $status = true;

    public function mount($id)
    {
        $this->customerId = $id;
        $customer = Customer::findOrFail($this->customerId);
        $this->name = $customer->name;
        $this->email = $customer->email;
        $this->phone = $customer->phone;
        $this->address = $customer->address;
        $this->dob = $customer->dob;
        $this->media = $customer->media;
        $this->gender = $customer->gender;
        $this->national_id = $customer->national_id;
        $this->profession = $customer->profession;
        $this->company_name = $customer->company_name;
        $this->monthly_income = $customer->monthly_income;
        $this->special_notes = $customer->special_notes;
        $this->status = $customer->status;
    }

    public function update()
    {
        $customer = Customer::findOrFail($this->customerId);

        $media_id = $customer->media_id;

        if ($this->media) {

            if ($media_id) {
                $oldMedia = Media::find($media_id);
                if ($oldMedia) {

                    $oldFilePath = public_path($oldMedia->path);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                    $oldMedia->delete();
                }
            }

            $media = $this->uploadMedia($this->media, 'uploads/customer', 80);
            $media_id = $media->id;
        }

        $customer->update([
            'name' => $this->name,
            'email' => $this->email,
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

        session()->flash('message', 'Customer updated successfully!');
        return redirect()->route('riser.user');
    }

    public function render()
    {
        return view('livewire.user.riser.edit-riser-user')->extends('layouts.app');
    }
}
