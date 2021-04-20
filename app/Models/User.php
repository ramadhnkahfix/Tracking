<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id_user
 * @property string $nama
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property int|null $status
 * @property int|null $role
 * @property string|null $remember_token
 * @property int $id_jabatan
 * 
 * @property Jabatan $jabatan
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'user';
	protected $primaryKey = 'id_user';
	public $timestamps = false;

	protected $casts = [
		'status' => 'int',
		'role' => 'int',
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
		'role',
		'remember_token',
		'id_jabatan'
	];

	public function jabatan()
	{
		return $this->belongsTo(Jabatan::class, 'id_jabatan');
	}
}
