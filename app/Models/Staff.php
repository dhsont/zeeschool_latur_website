<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Staff extends \Eloquent implements StaplerableInterface {
	use EloquentTrait;

	public $table = "staff";

	public $primaryKey = "id";

	public $timestamps = true;

	public $fillable = [
		"name",
		"avatar",
		"designation",
		"qualification",
		"experience",
		"description",
		"category",
		"category_id",
		"likes"
	];


	public function __construct(array $attributes = array()) {
		$this->hasAttachedFile('avatar', [
			'styles' => [
				'medium' => '300x300',
				'thumb' => '100x100'
			]
		]);

		parent::__construct($attributes);
	}



	public static $rules = [
	    "name" => "required",
		"designation" => "required",
		//"qualification" => "required",
		//"experience" => "required",
		//"avatar" =>'required',
		"category" => "required"
	];

}
