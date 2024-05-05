<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pcategory extends Model
{
    use SoftDeletes;

	public $table = "pcategories";

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

	public function palbums()
	{
		return $this->hasMany('App\Models\Palbum', 'pcategory_id');
	}

}
