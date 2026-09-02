<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Fortify\TwoFactorAuthenticatable;

class Admin extends Authenticatable
{
    use TwoFactorAuthenticatable;
    //
    protected $fillable = ['name','email','password','status','super_admin'];
}
