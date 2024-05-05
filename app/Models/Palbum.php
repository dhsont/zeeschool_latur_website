<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Palbum extends Model
{
    use SoftDeletes;

	public $table = "palbums";

	public $primaryKey = "id";
    
	protected $dates = ['deleted_at'];

	public $timestamps = true;

	public $fillable = [
	    "Title",
		"pcategory_id",
		"desc",
		"link",
        "photo"
	];

	public static $rules = [
	    "Title" => "required",
		"pcategory_id" => "required",
		"link" => "required",
        "photo" => "required|image|max:2000"
	];

	public function pcategory()
	{
		return $this->belongsTo('App\Models\Pcategory','pcategory_id');
	}
}
