<?php

namespace App\Libraries\Repositories;


use App\Models\Pot;
use Illuminate\Support\Facades\Schema;

class PotRepository
{

	/**
	 * Returns all Pots
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Pot::all();
	}

	public function search($input)
    {
        $query = Pot::query();

        $columns = Schema::getColumnListing('pots');
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
	 * Stores Pot into database
	 *
	 * @param array $input
	 *
	 * @return Pot
	 */
	public function store($input)
	{
		return Pot::create($input);
	}

	/**
	 * Find Pot by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Pot
	 */
	public function findPotById($id)
	{
		return Pot::find($id);
	}

	/**
	 * Updates Pot into database
	 *
	 * @param Pot $pot
	 * @param array $input
	 *
	 * @return Pot
	 */
	public function update($pot, $input)
	{
		$pot->fill($input);
		$pot->save();

		return $pot;
	}
}