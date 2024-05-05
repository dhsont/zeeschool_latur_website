<?php

namespace App\Libraries\Repositories;


use App\Models\News;

class NewsRepository
{

	/**
	 * Returns all News
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return News::all();
	}

	/**
	 * Stores News into database
	 *
	 * @param array $input
	 *
	 * @return News
	 */
	public function store($input)
	{
		return News::create($input);
	}

	/**
	 * Find News by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|News
	 */
	public function findNewsById($id)
	{
		return News::find($id);
	}

	/**
	 * Updates News into database
	 *
	 * @param News $news
	 * @param array $input
	 *
	 * @return News
	 */
	public function update($news, $input)
	{
		$news->fill($input);
		$news->save();

		return $news;
	}
}