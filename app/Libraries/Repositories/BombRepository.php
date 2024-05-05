<?php

namespace App\Libraries\Repositories;


use App\Models\Bomb;
use Illuminate\Support\Facades\Schema;

class BombRepository
{

	/**
	 * Returns all Bombs
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Bomb::all();
	}

	public function search($input)
    {
        $query = Bomb::query();

        $columns = Schema::getColumnListing('bombs');
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
	 * Stores Bomb into database
	 *
	 * @param array $input
	 *
	 * @return Bomb
	 */
	public function store($input)
	{
		return Bomb::create($input);
	}

	/**
	 * Find Bomb by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Bomb
	 */
	public function findBombById($id)
	{
		return Bomb::find($id);
	}

	/**
	 * Updates Bomb into database
	 *
	 * @param Bomb $bomb
	 * @param array $input
	 *
	 * @return Bomb
	 */
	public function update($bomb, $input)
	{
		$bomb->fill($input);
		$bomb->save();

		return $bomb;
	}
}