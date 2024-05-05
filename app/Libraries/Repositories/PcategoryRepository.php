<?php

namespace App\Libraries\Repositories;


use App\Models\Pcategory;
use Illuminate\Support\Facades\Schema;

class PcategoryRepository
{

	/**
	 * Returns all Pcategories
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Pcategory::all();
	}

	public function search($input)
    {
        $query = Pcategory::query();

        $columns = Schema::getColumnListing('pcategories');
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
	 * Stores Pcategory into database
	 *
	 * @param array $input
	 *
	 * @return Pcategory
	 */
	public function store($input)
	{
		return Pcategory::create($input);
	}

	/**
	 * Find Pcategory by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Pcategory
	 */
	public function findPcategoryById($id)
	{
		return Pcategory::find($id);
	}

	/**
	 * Updates Pcategory into database
	 *
	 * @param Pcategory $pcategory
	 * @param array $input
	 *
	 * @return Pcategory
	 */
	public function update($pcategory, $input)
	{
		$pcategory->fill($input);
		$pcategory->save();

		return $pcategory;
	}
}