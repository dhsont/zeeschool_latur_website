<?php

namespace App\Libraries\Repositories;


use App\Models\Contact;

class ContactRepository
{

	/**
	 * Returns all Contacts
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Contact::all();
	}

	/**
	 * Stores Contact into database
	 *
	 * @param array $input
	 *
	 * @return Contact
	 */
	public function store($input)
	{
		return Contact::create($input);
	}

	/**
	 * Find Contact by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Contact
	 */
	public function findContactById($id)
	{
		return Contact::find($id);
	}

	/**
	 * Updates Contact into database
	 *
	 * @param Contact $contact
	 * @param array $input
	 *
	 * @return Contact
	 */
	public function update($contact, $input)
	{
		$contact->fill($input);
		$contact->save();

		return $contact;
	}
}