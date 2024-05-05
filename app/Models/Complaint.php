<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complaint extends Model
{
    use SoftDeletes;

	public $table = "complaints";

	public $primaryKey = "id";
    
	protected $dates = ['deleted_at'];

	public $timestamps = true;

	public $fillable = [
	    "name",
		"email",
		"mobile",
		"about",
		"complaiint"
	];

	public static $rules = [
	    "name" => "required",
		"about" => "required"
	];

}
