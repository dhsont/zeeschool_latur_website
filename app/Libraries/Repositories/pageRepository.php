<?php

namespace App\Libraries\Repositories;


use App\Models\page;

class pageRepository
{

	/**
	 * Returns all pages
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return page::all();
	}

	/**
	 * Stores page into database
	 *
	 * @param array $input
	 *
	 * @return page
	 */
	public function store($input)
	{
		return page::create($input);
	}

	/**
	 * Find page by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|page
	 */
	public function findpageById($id)
	{
		return page::find($id);
	}

	/**
	 * Updates page into database
	 *
	 * @param page $page
	 * @param array $input
	 *
	 * @return page
	 */
	public function update($page, $input)
	{
		$page->fill($input);
		$page->save();

		return $page;
	}
}