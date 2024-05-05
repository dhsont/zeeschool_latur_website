<?php

namespace App\Libraries\Repositories;


use App\Models\Staff;

class StaffRepository
{

	/**
	 * Returns all Staff
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Staff::all();
	}

	/**
	 * Stores Staff into database
	 *
	 * @param array $input
	 *
	 * @return Staff
	 */
	public function store($input)
	{
		return Staff::create($input);
	}

	/**
	 * Find Staff by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Staff
	 */
	public function findStaffById($id)
	{
		return Staff::find($id);
	}

	/**
	 * Updates Staff into database
	 *
	 * @param Staff $staff
	 * @param array $input
	 *
	 * @return Staff
	 */
	public function update($staff, $input)
	{
		$staff->fill($input);
		$staff->save();

		return $staff;
	}
}