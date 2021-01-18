<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infocv extends Model
{
    protected $table = 'infos_cv';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'furst_coll','secend_coll2','id_users'
	];


	public static function updateData($id,$data){
		DB::table('infos_cv')
		  ->where('id', $id)
		  ->update($data);
	}
}
