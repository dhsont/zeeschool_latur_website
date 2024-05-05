<?php

namespace App\Libraries\Repositories;


use App\Models\mmm;

class mmmRepository
{

	/**
	 * Returns all mmms
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return mmm::all();
	}

	/**
	 * Stores mmm into database
	 *
	 * @param array $input
	 *
	 * @return mmm
	 */
	public function store($input)
	{
		return mmm::create($input);
	}

	/**
	 * Find mmm by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|mmm
	 */
	public function findmmmById($id)
	{
		return mmm::find($id);
	}

	/**
	 * Updates mmm into database
	 *
	 * @param mmm $mmm
	 * @param array $input
	 *
	 * @return mmm
	 */
	public function update($mmm, $input)
	{
		$mmm->fill($input);
		$mmm->save();

		return $mmm;
	}
}