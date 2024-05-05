<?php

namespace App\Libraries\Repositories;


use App\Models\Palbum;
use Illuminate\Support\Facades\Schema;

class PalbumRepository
{

	/**
	 * Returns all Palbums
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Palbum::all();
	}

	public function search($input)
    {
        $query = Palbum::query();

        $columns = Schema::getColumnListing('palbums');
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
	 * Stores Palbum into database
	 *
	 * @param array $input
	 *
	 * @return Palbum
	 */
	public function store($input)
	{
		return Palbum::create($input);
	}

	/**
	 * Find Palbum by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Palbum
	 */
	public function findPalbumById($id)
	{
		return Palbum::find($id);
	}

	/**
	 * Updates Palbum into database
	 *
	 * @param Palbum $palbum
	 * @param array $input
	 *
	 * @return Palbum
	 */
	public function update($palbum, $input)
	{
		$palbum->fill($input);
		$palbum->save();

		return $palbum;
	}
}