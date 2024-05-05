<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Exceptions\AppValidationException;
use Mitul\Generator\Exceptions\RecordNotFoundException;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\popo;
use Illuminate\Http\Request;
use App\Libraries\Repositories\popoRepository;
use Response;

class popoAPIController extends AppBaseController
{

	/** @var  popoRepository */
	private $popoRepository;

	function __construct(popoRepository $popoRepo)
	{
		$this->popoRepository = $popoRepo;
	}

	/**
	 * Display a listing of the popo.
	 *
	 * @return Response
	 */
	public function index()
	{
		$popos = $this->popoRepository->all();

		return Response::json(ResponseManager::makeResult($popos->toArray(), "popos retrieved successfully."));
	}

	/**
	 * Show the form for creating a new popo.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created popo in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 * @throws AppValidationException
	 */
	public function store(Request $request)
	{
		if(sizeof(popo::$rules) > 0)
            $this->validateRequest($request, popo::$rules);

        $input = $request->all();

		$popo = $this->popoRepository->store($input);

		return Response::json(ResponseManager::makeResult($popo->toArray(), "popo saved successfully."));
	}

	/**
	 * Display the specified popo.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function show($id)
	{
		$popo = $this->popoRepository->findpopoById($id);

		if(empty($popo))
			throw new RecordNotFoundException("popo not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($popo->toArray(), "popo retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified popo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified popo in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function update($id, Request $request)
	{
		$popo = $this->popoRepository->findpopoById($id);

		if(empty($popo))
			throw new RecordNotFoundException("popo not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$popo = $this->popoRepository->update($popo, $input);

		return Response::json(ResponseManager::makeResult($popo->toArray(), "popo updated successfully."));
	}

	/**
	 * Remove the specified popo from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function destroy($id)
	{
		$popo = $this->popoRepository->findpopoById($id);

		if(empty($popo))
			throw new RecordNotFoundException("popo not found", ERROR_CODE_RECORD_NOT_FOUND);

		$popo->delete();

		return Response::json(ResponseManager::makeResult($id, "popo deleted successfully."));
	}

}
