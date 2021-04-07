<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

/**
 * Class User
 * 
 * @property int $id_user
 * @property string $nama
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property int $status
 * @property string|null $remember_token
 * @property int $id_jabatan
 * 
 * @property Jabatan $jabatan
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	// use Authenticatable;


	protected $table = 'user';
	protected $primaryKey = 'id_user';
	public $timestamps = false;

	protected $casts = [
		'status' => 'int',
		'id_jabatan' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'nama',
		'email',
		'email_verified_at',
		'password',
		'status',
		'remember_token',
		'id_jabatan'
	];

	public function jabatan()
	{
		return $this->belongsTo(Jabatan::class, 'id_jabatan','id_jabatan');
	}
}
