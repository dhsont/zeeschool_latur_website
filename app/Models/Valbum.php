<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Valbum extends Model
{
    use SoftDeletes;

	public $table = "valbums";

	public $primaryKey = "id";
    
	protected $dates = ['deleted_at'];

	public $timestamps = true;

	public $fillable = [
	    "title",
		"vcategory_id",
		"desc",
		"link",
		"width",
		"height"
	];

	public static $rules = [
	    "title" => "required",
		"link" => "required"
	];

	public function vcategory()
	{
		return $this->belongsTo('App\Models\Vcategory');
	}

}
