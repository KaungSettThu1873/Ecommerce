<?php

namespace App\Models;

use App\Models\Bank;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserBank extends Model
{
    protected $guarded = [];

    public function banks() {
        return $this->hasMany(Bank::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }
}
