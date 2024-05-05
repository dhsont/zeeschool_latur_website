<?php

namespace App\Libraries\Repositories;


use App\Models\mod;

class modRepository
{

	/**
	 * Returns all mods
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return mod::all();
	}

	/**
	 * Stores mod into database
	 *
	 * @param array $input
	 *
	 * @return mod
	 */
	public function store($input)
	{
		return mod::create($input);
	}

	/**
	 * Find mod by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|mod
	 */
	public function findmodById($id)
	{
		return mod::find($id);
	}

	/**
	 * Updates mod into database
	 *
	 * @param mod $mod
	 * @param array $input
	 *
	 * @return mod
	 */
	public function update($mod, $input)
	{
		$mod->fill($input);
		$mod->save();

		return $mod;
	}
}