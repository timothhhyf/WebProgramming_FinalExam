<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Item;

class Order extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'account_id');
    }

    public function item(){
        return $this->belongsTo(Item::class);
    }
}
