<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autoorder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'quantity',
        'address',
        'phone',
        'time',
        'period',
        'amount',
        'payment_method',
    ];
    protected $table = 'autoorders';

    // Relationship with users Model
    public function customer()
    {
        return $this->belongsTo(User::class);
    }
}
