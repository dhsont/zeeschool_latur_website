<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Exceptions\AppValidationException;
use Mitul\Generator\Exceptions\RecordNotFoundException;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\tutorial;
use Illuminate\Http\Request;
use App\Libraries\Repositories\tutorialRepository;
use Response;

class tutorialAPIController extends AppBaseController
{

	/** @var  tutorialRepository */
	private $tutorialRepository;

	function __construct(tutorialRepository $tutorialRepo)
	{
		$this->tutorialRepository = $tutorialRepo;
	}

	/**
	 * Display a listing of the tutorial.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tutorials = $this->tutorialRepository->all();

		return Response::json(ResponseManager::makeResult($tutorials->toArray(), "tutorials retrieved successfully."));
	}

	/**
	 * Show the form for creating a new tutorial.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created tutorial in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 * @throws AppValidationException
	 */
	public function store(Request $request)
	{
		if(sizeof(tutorial::$rules) > 0)
            $this->validateRequest($request, tutorial::$rules);

        $input = $request->all();

		$tutorial = $this->tutorialRepository->store($input);

		return Response::json(ResponseManager::makeResult($tutorial->toArray(), "tutorial saved successfully."));
	}

	/**
	 * Display the specified tutorial.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function show($id)
	{
		$tutorial = $this->tutorialRepository->findtutorialById($id);

		if(empty($tutorial))
			throw new RecordNotFoundException("tutorial not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($tutorial->toArray(), "tutorial retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified tutorial.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified tutorial in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function update($id, Request $request)
	{
		$tutorial = $this->tutorialRepository->findtutorialById($id);

		if(empty($tutorial))
			throw new RecordNotFoundException("tutorial not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$tutorial = $this->tutorialRepository->update($tutorial, $input);

		return Response::json(ResponseManager::makeResult($tutorial->toArray(), "tutorial updated successfully."));
	}

	/**
	 * Remove the specified tutorial from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function destroy($id)
	{
		$tutorial = $this->tutorialRepository->findtutorialById($id);

		if(empty($tutorial))
			throw new RecordNotFoundException("tutorial not found", ERROR_CODE_RECORD_NOT_FOUND);

		$tutorial->delete();

		return Response::json(ResponseManager::makeResult($id, "tutorial deleted successfully."));
	}

}
