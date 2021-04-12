<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Dokuman
 * 
 * @property int $id_dokumen
 * @property string $nama_instansi
 * @property string $email
 * @property string $subject
 * @property Carbon $tanggal
 * @property int $status
 * 
 * @property Collection|DetailDokuman[] $detail_dokumen
 * @property Collection|DokumenSelesai[] $dokumen_selesais
 *
 * @package App\Models
 */
class Dokuman extends Model
{
	protected $table = 'dokumen';
	protected $primaryKey = 'id_dokumen';
	public $timestamps = false;

	protected $casts = [
		'status' => 'int'
	];

	protected $dates = [
		'tanggal'
	];

	protected $fillable = [
		'nama_instansi',
		'email',
		'subject',
		'tanggal',
		'status',
		'kode'
	];

	public function detail_dokumen()
	{
		return $this->hasMany(DetailDokuman::class, 'dokumen_id_dokumen');
	}

	public function dokumen_selesais()
	{
		return $this->hasMany(DokumenSelesai::class, 'dokumen_id_dokumen');
	}
}
