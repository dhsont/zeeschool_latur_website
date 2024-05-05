<?php

namespace App\Libraries\Repositories;


use App\Models\Complaint;

class ComplaintRepository
{

	/**
	 * Returns all Complaints
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Complaint::all();
	}

	/**
	 * Stores Complaint into database
	 *
	 * @param array $input
	 *
	 * @return Complaint
	 */
	public function store($input)
	{
		return Complaint::create($input);
	}

	/**
	 * Find Complaint by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Complaint
	 */
	public function findComplaintById($id)
	{
		return Complaint::find($id);
	}

	/**
	 * Updates Complaint into database
	 *
	 * @param Complaint $complaint
	 * @param array $input
	 *
	 * @return Complaint
	 */
	public function update($complaint, $input)
	{
		$complaint->fill($input);
		$complaint->save();

		return $complaint;
	}
}