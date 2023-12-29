<?php

namespace App\Models;

use App\Models\User;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'payment_method', 'status', 'amount', 'time', 'quantity', 'user_id','phone','address', 'supplier_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
