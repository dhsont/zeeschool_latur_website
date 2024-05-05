<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vcategory extends Model
{
    use SoftDeletes;

	public $table = "vcategories";

	public $primaryKey = "id";
    
	protected $dates = ['deleted_at'];

	public $timestamps = true;

	public $fillable = [
	    "name",
		"year",
		"desc"
	];

	public static $rules = [
	    "name" => "required"
	];

	public function valbums()
	{
		return $this->hasMany('App\Models\Valbum');
	}

}
