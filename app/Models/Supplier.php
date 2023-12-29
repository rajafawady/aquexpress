<?php


namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Order;


class Supplier extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'companyName', 'phone', 'password', 'email', 'address', 'cnic_front', 'cnic_back', 'picture'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
