<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Exceptions\AppValidationException;
use Mitul\Generator\Exceptions\RecordNotFoundException;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\tutoral;
use Illuminate\Http\Request;
use App\Libraries\Repositories\tutoralRepository;
use Response;

class tutoralAPIController extends AppBaseController
{

	/** @var  tutoralRepository */
	private $tutoralRepository;

	function __construct(tutoralRepository $tutoralRepo)
	{
		$this->tutoralRepository = $tutoralRepo;
	}

	/**
	 * Display a listing of the tutoral.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tutorals = $this->tutoralRepository->all();

		return Response::json(ResponseManager::makeResult($tutorals->toArray(), "tutorals retrieved successfully."));
	}

	/**
	 * Show the form for creating a new tutoral.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created tutoral in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 * @throws AppValidationException
	 */
	public function store(Request $request)
	{
		if(sizeof(tutoral::$rules) > 0)
            $this->validateRequest($request, tutoral::$rules);

        $input = $request->all();

		$tutoral = $this->tutoralRepository->store($input);

		return Response::json(ResponseManager::makeResult($tutoral->toArray(), "tutoral saved successfully."));
	}

	/**
	 * Display the specified tutoral.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function show($id)
	{
		$tutoral = $this->tutoralRepository->findtutoralById($id);

		if(empty($tutoral))
			throw new RecordNotFoundException("tutoral not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($tutoral->toArray(), "tutoral retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified tutoral.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified tutoral in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function update($id, Request $request)
	{
		$tutoral = $this->tutoralRepository->findtutoralById($id);

		if(empty($tutoral))
			throw new RecordNotFoundException("tutoral not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$tutoral = $this->tutoralRepository->update($tutoral, $input);

		return Response::json(ResponseManager::makeResult($tutoral->toArray(), "tutoral updated successfully."));
	}

	/**
	 * Remove the specified tutoral from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function destroy($id)
	{
		$tutoral = $this->tutoralRepository->findtutoralById($id);

		if(empty($tutoral))
			throw new RecordNotFoundException("tutoral not found", ERROR_CODE_RECORD_NOT_FOUND);

		$tutoral->delete();

		return Response::json(ResponseManager::makeResult($id, "tutoral deleted successfully."));
	}

}
