<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Exceptions\AppValidationException;
use Mitul\Generator\Exceptions\RecordNotFoundException;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\resume;
use Illuminate\Http\Request;
use App\Libraries\Repositories\resumeRepository;
use Response;

class resumeAPIController extends AppBaseController
{

	/** @var  resumeRepository */
	private $resumeRepository;

	function __construct(resumeRepository $resumeRepo)
	{
		$this->resumeRepository = $resumeRepo;
	}

	/**
	 * Display a listing of the resume.
	 *
	 * @return Response
	 */
	public function index()
	{
		$resumes = $this->resumeRepository->all();

		return Response::json(ResponseManager::makeResult($resumes->toArray(), "resumes retrieved successfully."));
	}

	/**
	 * Show the form for creating a new resume.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resume in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 * @throws AppValidationException
	 */
	public function store(Request $request)
	{
		if(sizeof(resume::$rules) > 0)
            $this->validateRequest($request, resume::$rules);

        $input = $request->all();

		$resume = $this->resumeRepository->store($input);

		return Response::json(ResponseManager::makeResult($resume->toArray(), "resume saved successfully."));
	}

	/**
	 * Display the specified resume.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function show($id)
	{
		$resume = $this->resumeRepository->findresumeById($id);

		if(empty($resume))
			throw new RecordNotFoundException("resume not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($resume->toArray(), "resume retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified resume.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resume in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function update($id, Request $request)
	{
		$resume = $this->resumeRepository->findresumeById($id);

		if(empty($resume))
			throw new RecordNotFoundException("resume not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$resume = $this->resumeRepository->update($resume, $input);

		return Response::json(ResponseManager::makeResult($resume->toArray(), "resume updated successfully."));
	}

	/**
	 * Remove the specified resume from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function destroy($id)
	{
		$resume = $this->resumeRepository->findresumeById($id);

		if(empty($resume))
			throw new RecordNotFoundException("resume not found", ERROR_CODE_RECORD_NOT_FOUND);

		$resume->delete();

		return Response::json(ResponseManager::makeResult($id, "resume deleted successfully."));
	}

}
