<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateContactRequest;
use App\Libraries\Repositories\ContactRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class ContactController extends AppBaseController
{

	/** @var  ContactRepository */
	private $contactRepository;

	function __construct(ContactRepository $contactRepo)
	{
		$this->contactRepository = $contactRepo;
	}

	/**
	 * Display a listing of the Contact.
	 *
	 * @return Response
	 */
	public function index()
	{
		$contacts = $this->contactRepository->all();

		return view('admin.contacts.index')->with('contacts', $contacts);
	}

	/**
	 * Show the form for creating a new Contact.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('front.contact');
	}

	/**
	 * Store a newly created Contact in storage.
	 *
	 * @param CreateContactRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateContactRequest $request)
{
	dd();
	$input = $request->all();

	$contact = $this->contactRepository->store($input);

	$name  = reset($input);
	Flash::success("Contact $name created successfully");

	//return redirect(route('contacts-us'));
}

	public function rrrr(CreateContactRequest $request)
	{
		dd();
		$input = $request->all();

		$contact = $this->contactRepository->store($input);

		$name  = reset($input);
		Flash::success("Contact $name created successfully");

		//return redirect(route('contacts-us'));
	}

	/**
	 * Display the specified Contact.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
//		$contact = $this->contactRepository->findContactById($id);
//
//		if(empty($contact))
//		{
//			Flash::error('Contact not found');
//			return redirect(route('myadmin.contacts.index'));
//		}
//
//		return view('admin.contacts.show')->with('contact', $contact);
	}

	/**
	 * Show the form for editing the specified Contact.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$contact = $this->contactRepository->findContactById($id);

		if(empty($contact))
		{
			Flash::error('Contact not found');
			return redirect(route('myadmin.contacts.index'));
		}

		return view('admin.contacts.edit')->with('contact', $contact);
	}

	/**
	 * Update the specified Contact in storage.
	 *
	 * @param  int    $id
	 * @param CreateContactRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateContactRequest $request)
	{
		$contact = $this->contactRepository->findContactById($id);

		if(empty($contact))
		{
			Flash::error('Contact not found');
			return redirect(route('myadmin.contacts.index'));
		}

		$contact = $this->contactRepository->update($contact, $request->all());

		$input = array_except($request->all(), '_method');
		$name  = reset($input);
        Flash::message("Contact $name updated successfully");

		return redirect(route('myadmin.contacts.index'));
	}

	/**
	 * Remove the specified Contact from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$contact = $this->contactRepository->findContactById($id);

		if(empty($contact))
		{
			Flash::error('Contact not found');
			return redirect(route('myadmin.contacts.index'));
		}

		$contact->delete();

		Flash::message('Contact deleted successfully.');

		return redirect(route('myadmin.contacts.index'));
	}




}
