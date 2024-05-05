<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class resume extends Model
{
    use SoftDeletes;

	public $table = "resumes";

	public $primaryKey = "id";
    
	protected $dates = ['deleted_at'];

	public $timestamps = true;

	public $fillable = [
	    "name",
		"mobile",
		"email",
		"feedback"
	];

	public static $rules = [
	    "name" => "required",
		"mobile" => "required"
	];

}
