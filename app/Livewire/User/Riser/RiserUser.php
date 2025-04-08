<?php

namespace App\Livewire\User\Riser;

use App\Models\Media;
use Livewire\Component;
use App\Models\Customer;
use Livewire\Attributes\Title;

class RiserUser extends Component
{
    #[Title('Riser POS Customers')]

    public function delete($id)
    {

        $customer = Customer::findOrFail($id);

        if ($customer->media_id) {
            $media = Media::find($customer->media_id);
            if ($media) {

                $filePath = public_path($media->path);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }

                $media->delete();
            }
        }

        $customer->delete();

        session()->flash('message', 'Customer deleted successfully!');
        return redirect()->route('riser.user');
    }
    
    public function render()
    {
        $customers = Customer::where('type', 'riser')->get();
        return view('livewire.user.riser.riser-user', ['customers' => $customers])->extends('layouts.app');
    }
}
