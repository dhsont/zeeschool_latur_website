<?php

namespace App\Libraries\Repositories;


use App\Models\tutorial;

class tutorialRepository
{

	/**
	 * Returns all tutorials
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return tutorial::all();
	}

	/**
	 * Stores tutorial into database
	 *
	 * @param array $input
	 *
	 * @return tutorial
	 */
	public function store($input)
	{
		return tutorial::create($input);
	}

	/**
	 * Find tutorial by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|tutorial
	 */
	public function findtutorialById($id)
	{
		return tutorial::find($id);
	}

	/**
	 * Updates tutorial into database
	 *
	 * @param tutorial $tutorial
	 * @param array $input
	 *
	 * @return tutorial
	 */
	public function update($tutorial, $input)
	{
		$tutorial->fill($input);
		$tutorial->save();

		return $tutorial;
	}
}