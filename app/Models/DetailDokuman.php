<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailDokuman
 * 
 * @property int $id_detail_dokumen
 * @property string $file
 * @property int $dokumen_id_dokumen
 * 
 * @property Dokuman $dokuman
 *
 * @package App\Models
 */
class DetailDokuman extends Model
{
	protected $table = 'detail_dokumen';
	protected $primaryKey = 'id_detail_dokumen';
	public $timestamps = false;

	protected $casts = [
		'dokumen_id_dokumen' => 'int'
	];

	protected $fillable = [
		'file',
		'dokumen_id_dokumen'
	];

	public function dokuman()
	{
		return $this->belongsTo(Dokuman::class, 'dokumen_id_dokumen','id_dokumen');
	}
}
