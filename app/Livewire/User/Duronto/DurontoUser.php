<?php

namespace App\Livewire\User\Duronto;

use App\Models\Media;
use Livewire\Component;
use App\Models\Customer;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

class DurontoUser extends Component
{
    use WithPagination;

    #[Title('Duronto POS Customers')]

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
        return redirect()->route('duronto.user');
    }
    
    public function render()
    {
        $customers = Customer::where('type', 'duronto')->paginate(20);
        return view('livewire.user.duronto.duronto-user', ['customers' => $customers])->extends('layouts.app');
    }
}
