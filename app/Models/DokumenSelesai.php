<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DokumenSelesai
 * 
 * @property int $id_dokumen_selesai
 * @property string $file
 * @property Carbon $tanggal
 * @property string $author
 * @property int $dokumen_id_dokumen
 * 
 * @property Dokuman $dokuman
 *
 * @package App\Models
 */
class DokumenSelesai extends Model
{
	protected $table = 'dokumen_selesai';
	protected $primaryKey = 'id_dokumen_selesai';
	public $timestamps = false;

	protected $casts = [
		'dokumen_id_dokumen' => 'int'
	];

	protected $dates = [
		'tanggal'
	];

	protected $fillable = [
		'file',
		'tanggal',
		'author',
		'dokumen_id_dokumen'
	];

	public function dokuman()
	{
		return $this->belongsTo(Dokuman::class, 'dokumen_id_dokumen');
	}
}
