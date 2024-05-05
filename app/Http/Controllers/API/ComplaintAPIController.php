<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Exceptions\AppValidationException;
use Mitul\Generator\Exceptions\RecordNotFoundException;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Libraries\Repositories\ComplaintRepository;
use Response;

class ComplaintAPIController extends AppBaseController
{

	/** @var  ComplaintRepository */
	private $complaintRepository;

	function __construct(ComplaintRepository $complaintRepo)
	{
		$this->complaintRepository = $complaintRepo;
	}

	/**
	 * Display a listing of the Complaint.
	 *
	 * @return Response
	 */
	public function index()
	{
		$complaints = $this->complaintRepository->all();

		return Response::json(ResponseManager::makeResult($complaints->toArray(), "Complaints retrieved successfully."));
	}

	/**
	 * Show the form for creating a new Complaint.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created Complaint in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 * @throws AppValidationException
	 */
	public function store(Request $request)
	{
		if(sizeof(Complaint::$rules) > 0)
            $this->validateRequest($request, Complaint::$rules);

        $input = $request->all();

		$complaint = $this->complaintRepository->store($input);

		return Response::json(ResponseManager::makeResult($complaint->toArray(), "Complaint saved successfully."));
	}

	/**
	 * Display the specified Complaint.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function show($id)
	{
		$complaint = $this->complaintRepository->findComplaintById($id);

		if(empty($complaint))
			throw new RecordNotFoundException("Complaint not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($complaint->toArray(), "Complaint retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified Complaint.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified Complaint in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function update($id, Request $request)
	{
		$complaint = $this->complaintRepository->findComplaintById($id);

		if(empty($complaint))
			throw new RecordNotFoundException("Complaint not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$complaint = $this->complaintRepository->update($complaint, $input);

		return Response::json(ResponseManager::makeResult($complaint->toArray(), "Complaint updated successfully."));
	}

	/**
	 * Remove the specified Complaint from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function destroy($id)
	{
		$complaint = $this->complaintRepository->findComplaintById($id);

		if(empty($complaint))
			throw new RecordNotFoundException("Complaint not found", ERROR_CODE_RECORD_NOT_FOUND);

		$complaint->delete();

		return Response::json(ResponseManager::makeResult($id, "Complaint deleted successfully."));
	}

}
