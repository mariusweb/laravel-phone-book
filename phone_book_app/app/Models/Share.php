<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    use HasFactory;

    protected $fillable = ['user_sharing_id', 'phone_id', 'user_shares_id'];

    public function sharingUser()
    {
        return $this->belongsTo(User::class, 'user_sharing_id');
    }
    public function sharesUser()
    {
        return $this->belongsTo(User::class, 'user_shares_id');
    }

    public function phones()
    {
        return $this->belongsTo(Phone::class, 'phone_id', 'id');
    }
}
