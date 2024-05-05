<?php

namespace App\Libraries\Repositories;


use App\Models\resume;

class resumeRepository
{

	/**
	 * Returns all resumes
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return resume::all();
	}

	/**
	 * Stores resume into database
	 *
	 * @param array $input
	 *
	 * @return resume
	 */
	public function store($input)
	{
		return resume::create($input);
	}

	/**
	 * Find resume by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|resume
	 */
	public function findresumeById($id)
	{
		return resume::find($id);
	}

	/**
	 * Updates resume into database
	 *
	 * @param resume $resume
	 * @param array $input
	 *
	 * @return resume
	 */
	public function update($resume, $input)
	{
		$resume->fill($input);
		$resume->save();

		return $resume;
	}
}