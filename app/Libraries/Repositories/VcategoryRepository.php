<?php

namespace App\Libraries\Repositories;


use App\Models\Vcategory;
use Illuminate\Support\Facades\Schema;

class VcategoryRepository
{

	/**
	 * Returns all Vcategories
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Vcategory::all();
	}

	public function search($input)
    {
        $query = Vcategory::query();

        $columns = Schema::getColumnListing('vcategories');
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
	 * Stores Vcategory into database
	 *
	 * @param array $input
	 *
	 * @return Vcategory
	 */
	public function store($input)
	{
		return Vcategory::create($input);
	}

	/**
	 * Find Vcategory by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Vcategory
	 */
	public function findVcategoryById($id)
	{
		return Vcategory::find($id);
	}

	/**
	 * Updates Vcategory into database
	 *
	 * @param Vcategory $vcategory
	 * @param array $input
	 *
	 * @return Vcategory
	 */
	public function update($vcategory, $input)
	{
		$vcategory->fill($input);
		$vcategory->save();

		return $vcategory;
	}
}