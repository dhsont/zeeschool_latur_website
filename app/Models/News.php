<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    
	public $table = "news";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "title",
		"body",
		"slug",
		"featured",
		"published",
		"meta_keywords",
		"meta_description"
	];

	public static $rules = [
	    "title" => "required",
		"body" => "required",
	//	"slug" => "required"
	];

}
