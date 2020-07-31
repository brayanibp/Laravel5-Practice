<?php

namespace Cinema;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Hash;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

	use Authenticatable, CanResetPassword, SoftDeletes;

	protected $table = 'users';

	protected $fillable = ['name', 'email', 'password'];

	protected $hidden = ['password', 'remember_token'];

	protected $dates = ['deleted_at'];

	public function setPasswordAttribute($value)
	{
		if (!empty($value)) {
			$this->attributes['password'] = Hash::make($value);
		}
	}
}
