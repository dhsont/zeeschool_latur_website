<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Exceptions\AppValidationException;
use Mitul\Generator\Exceptions\RecordNotFoundException;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Libraries\Repositories\ContactRepository;
use Response;

class ContactAPIController extends AppBaseController
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

		return Response::json(ResponseManager::makeResult($contacts->toArray(), "Contacts retrieved successfully."));
	}

	/**
	 * Show the form for creating a new Contact.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created Contact in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 * @throws AppValidationException
	 */
	public function store(Request $request)
	{
		if(sizeof(Contact::$rules) > 0)
            $this->validateRequest($request, Contact::$rules);

        $input = $request->all();

		$contact = $this->contactRepository->store($input);

		return Response::json(ResponseManager::makeResult($contact->toArray(), "Contact saved successfully."));
	}

	/**
	 * Display the specified Contact.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function show($id)
	{
		$contact = $this->contactRepository->findContactById($id);

		if(empty($contact))
			throw new RecordNotFoundException("Contact not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($contact->toArray(), "Contact retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified Contact.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified Contact in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function update($id, Request $request)
	{
		$contact = $this->contactRepository->findContactById($id);

		if(empty($contact))
			throw new RecordNotFoundException("Contact not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$contact = $this->contactRepository->update($contact, $input);

		return Response::json(ResponseManager::makeResult($contact->toArray(), "Contact updated successfully."));
	}

	/**
	 * Remove the specified Contact from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function destroy($id)
	{
		$contact = $this->contactRepository->findContactById($id);

		if(empty($contact))
			throw new RecordNotFoundException("Contact not found", ERROR_CODE_RECORD_NOT_FOUND);

		$contact->delete();

		return Response::json(ResponseManager::makeResult($id, "Contact deleted successfully."));
	}

}
