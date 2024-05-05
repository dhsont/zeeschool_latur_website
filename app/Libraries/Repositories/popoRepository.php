<?php

namespace App\Libraries\Repositories;


use App\Models\popo;

class popoRepository
{

	/**
	 * Returns all popos
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return popo::all();
	}

	/**
	 * Stores popo into database
	 *
	 * @param array $input
	 *
	 * @return popo
	 */
	public function store($input)
	{
		return popo::create($input);
	}

	/**
	 * Find popo by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|popo
	 */
	public function findpopoById($id)
	{
		return popo::find($id);
	}

	/**
	 * Updates popo into database
	 *
	 * @param popo $popo
	 * @param array $input
	 *
	 * @return popo
	 */
	public function update($popo, $input)
	{
		$popo->fill($input);
		$popo->save();

		return $popo;
	}
}