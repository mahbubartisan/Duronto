<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function media()
    {
        return $this->belongsTo(Media::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'customer_id');
    }
}
