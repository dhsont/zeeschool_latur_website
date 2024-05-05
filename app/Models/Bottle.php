<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bottle extends Model
{
    use SoftDeletes;

	public $table = "bottles";

	public $primaryKey = "id";
    
	protected $dates = ['deleted_at'];

	public $timestamps = true;

	public $fillable = [
	    "name",
		"desc"
	];

	public static $rules = [
	    "name" => "required"
	];

}
