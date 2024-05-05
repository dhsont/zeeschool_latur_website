<?php

namespace App\Libraries\Repositories;


use App\Models\ppp;

class pppRepository
{

	/**
	 * Returns all ppps
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return ppp::all();
	}

	/**
	 * Stores ppp into database
	 *
	 * @param array $input
	 *
	 * @return ppp
	 */
	public function store($input)
	{
		return ppp::create($input);
	}

	/**
	 * Find ppp by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|ppp
	 */
	public function findpppById($id)
	{
		return ppp::find($id);
	}

	/**
	 * Updates ppp into database
	 *
	 * @param ppp $ppp
	 * @param array $input
	 *
	 * @return ppp
	 */
	public function update($ppp, $input)
	{
		$ppp->fill($input);
		$ppp->save();

		return $ppp;
	}
}