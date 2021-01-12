<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class domaine extends Model
{
    protected $table = 'domaines';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'nom_domaine',
	];
}
