<?php

namespace App\Libraries\Repositories;


use App\Models\Valbum;
use Illuminate\Support\Facades\Schema;

class ValbumRepository
{

	/**
	 * Returns all Valbums
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Valbum::all();
	}

	public function search($input)
    {
        $query = Valbum::query();

        $columns = Schema::getColumnListing('valbums');
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
	 * Stores Valbum into database
	 *
	 * @param array $input
	 *
	 * @return Valbum
	 */
	public function store($input)
	{
		return Valbum::create($input);
	}

	/**
	 * Find Valbum by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Valbum
	 */
	public function findValbumById($id)
	{
		return Valbum::find($id);
	}

	/**
	 * Updates Valbum into database
	 *
	 * @param Valbum $valbum
	 * @param array $input
	 *
	 * @return Valbum
	 */
	public function update($valbum, $input)
	{
		$valbum->fill($input);
		$valbum->save();

		return $valbum;
	}
}