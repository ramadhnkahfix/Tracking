<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';
    protected $fillable = ['nama_jabatan'];

    public function users()
    {
        return $this->hasMany(User::class,'id_jabatan');
    }

}
