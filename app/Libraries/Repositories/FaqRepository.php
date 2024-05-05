<?php

namespace App\Libraries\Repositories;


use App\Models\Faq;

class FaqRepository
{

	/**
	 * Returns all Faqs
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Faq::all();
	}

	/**
	 * Stores Faq into database
	 *
	 * @param array $input
	 *
	 * @return Faq
	 */
	public function store($input)
	{
		return Faq::create($input);
	}

	/**
	 * Find Faq by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Faq
	 */
	public function findFaqById($id)
	{
		return Faq::find($id);
	}

	/**
	 * Updates Faq into database
	 *
	 * @param Faq $faq
	 * @param array $input
	 *
	 * @return Faq
	 */
	public function update($faq, $input)
	{
		$faq->fill($input);
		$faq->save();

		return $faq;
	}
}