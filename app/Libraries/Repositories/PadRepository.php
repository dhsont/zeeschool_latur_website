<?php

namespace App\Libraries\Repositories;


use App\Models\Pad;
use Illuminate\Support\Facades\Schema;

class PadRepository
{

	/**
	 * Returns all Pads
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Pad::all();
	}

	public function search($input)
    {
        $query = Pad::query();

        $columns = Schema::getColumnListing('pads');
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
	 * Stores Pad into database
	 *
	 * @param array $input
	 *
	 * @return Pad
	 */
	public function store($input)
	{
		return Pad::create($input);
	}

	/**
	 * Find Pad by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Pad
	 */
	public function findPadById($id)
	{
		return Pad::find($id);
	}

	/**
	 * Updates Pad into database
	 *
	 * @param Pad $pad
	 * @param array $input
	 *
	 * @return Pad
	 */
	public function update($pad, $input)
	{
		$pad->fill($input);
		$pad->save();

		return $pad;
	}
}