<?php

namespace App\Libraries\Repositories;


use App\Models\Bottle;
use Illuminate\Support\Facades\Schema;

class BottleRepository
{

	/**
	 * Returns all Bottles
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Bottle::all();
	}

	public function search($input)
    {
        $query = Bottle::query();

        $columns = Schema::getColumnListing('bottles');
        $attributes = array();

        foreach($columns as $attribute){
            if(isset($input[$attribute]))
            {
                $query->where($attribute, $input[$attribute]);
                $attributes[$attribute] =  $input[$attribute];
            }else{
                $attributes[$attribute] =  null;
            }
        };

        return [$query->get(), $attributes];

    }

	/**
	 * Stores Bottle into database
	 *
	 * @param array $input
	 *
	 * @return Bottle
	 */
	public function store($input)
	{
		return Bottle::create($input);
	}

	/**
	 * Find Bottle by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Bottle
	 */
	public function findBottleById($id)
	{
		return Bottle::find($id);
	}

	/**
	 * Updates Bottle into database
	 *
	 * @param Bottle $bottle
	 * @param array $input
	 *
	 * @return Bottle
	 */
	public function update($bottle, $input)
	{
		$bottle->fill($input);
		$bottle->save();

		return $bottle;
	}
}