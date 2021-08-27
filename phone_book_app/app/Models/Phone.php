<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'phone'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function share()
    {
        return $this->hasMany(Share::class, 'phone_id', 'id');
    }
    public function sharingPhoneWith()
    {
        return $this->belongsToMany(User::class, 'shares', 'phone_id', 'user_shares_id');
    }
}
