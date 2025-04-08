<?php

namespace App\Livewire;

use App\Models\Package;
use Livewire\Component;
use App\Models\Subscription;
use Livewire\Attributes\Title;

class Dashboard extends Component
{
    #[Title('Admin Dashboard')]

    public function render()
    {
        $latestDurontoCustomers = Subscription::withWhereHas('package', function ($query) {
            $query->where('type', 'duronto');
        })
            ->with(['customer:id,name,phone', 'package:id,name'])
            ->latest()
            ->take(5)
            ->get();

        $latestRiserCustomers = Subscription::whereHas('package', function ($query) {
            $query->where('type', 'riser');
        })
            ->with(['customer:id,name,phone', 'package:id,name'])
            ->latest()
            ->take(5)
            ->get();


        return view('livewire.dashboard', [
            'latestDurontoCustomers' => $latestDurontoCustomers,
            'latestRiserCustomers' => $latestRiserCustomers,
        ])->extends('layouts.app');
    }
}
