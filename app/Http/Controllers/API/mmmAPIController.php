<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Exceptions\AppValidationException;
use Mitul\Generator\Exceptions\RecordNotFoundException;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\mmm;
use Illuminate\Http\Request;
use App\Libraries\Repositories\mmmRepository;
use Response;

class mmmAPIController extends AppBaseController
{

	/** @var  mmmRepository */
	private $mmmRepository;

	function __construct(mmmRepository $mmmRepo)
	{
		$this->mmmRepository = $mmmRepo;
	}

	/**
	 * Display a listing of the mmm.
	 *
	 * @return Response
	 */
	public function index()
	{
		$mmms = $this->mmmRepository->all();

		return Response::json(ResponseManager::makeResult($mmms->toArray(), "mmms retrieved successfully."));
	}

	/**
	 * Show the form for creating a new mmm.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created mmm in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 * @throws AppValidationException
	 */
	public function store(Request $request)
	{
		if(sizeof(mmm::$rules) > 0)
            $this->validateRequest($request, mmm::$rules);

        $input = $request->all();

		$mmm = $this->mmmRepository->store($input);

		return Response::json(ResponseManager::makeResult($mmm->toArray(), "mmm saved successfully."));
	}

	/**
	 * Display the specified mmm.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function show($id)
	{
		$mmm = $this->mmmRepository->findmmmById($id);

		if(empty($mmm))
			throw new RecordNotFoundException("mmm not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($mmm->toArray(), "mmm retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified mmm.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified mmm in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function update($id, Request $request)
	{
		$mmm = $this->mmmRepository->findmmmById($id);

		if(empty($mmm))
			throw new RecordNotFoundException("mmm not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$mmm = $this->mmmRepository->update($mmm, $input);

		return Response::json(ResponseManager::makeResult($mmm->toArray(), "mmm updated successfully."));
	}

	/**
	 * Remove the specified mmm from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function destroy($id)
	{
		$mmm = $this->mmmRepository->findmmmById($id);

		if(empty($mmm))
			throw new RecordNotFoundException("mmm not found", ERROR_CODE_RECORD_NOT_FOUND);

		$mmm->delete();

		return Response::json(ResponseManager::makeResult($id, "mmm deleted successfully."));
	}

}
