<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pad extends Model
{
    use SoftDeletes;

	public $table = "pads";

	public $primaryKey = "id";
    
	protected $dates = ['deleted_at'];

	public $timestamps = true;

	public $fillable = [
	    "title",
		"desc"
	];

	public static $rules = [
	    "title" => "required"
	];

}
