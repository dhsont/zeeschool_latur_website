<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class page extends Model
{
    
	public $table = "pages";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "title",
		"heading",
		"banner_image",
		"banner_image_alt",
		"main_image",
		"main_image_alt",
		"main_image_width",
		"you_tube_video_id",
		"content",
		"uri",
		"meta_description",
		"meta_keywords",
		"status",
		"published_date"
	];

	public static $rules = [
	    "title" => "required",
		"uri"=>"unique:pages",
		"heading" => "required",
		"main_image_width" => "main_image_height:string"
	];

	public static $updateRules = [
		"title" => "required",
		"heading" => "required",
		"main_image_width" => "main_image_height:string"
	];

}
