<?php

namespace App\Libraries\Repositories;


use App\Models\tutoral;

class tutoralRepository
{

	/**
	 * Returns all tutorals
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return tutoral::all();
	}

	/**
	 * Stores tutoral into database
	 *
	 * @param array $input
	 *
	 * @return tutoral
	 */
	public function store($input)
	{
		return tutoral::create($input);
	}

	/**
	 * Find tutoral by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|tutoral
	 */
	public function findtutoralById($id)
	{
		return tutoral::find($id);
	}

	/**
	 * Updates tutoral into database
	 *
	 * @param tutoral $tutoral
	 * @param array $input
	 *
	 * @return tutoral
	 */
	public function update($tutoral, $input)
	{
		$tutoral->fill($input);
		$tutoral->save();

		return $tutoral;
	}
}