<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Exceptions\AppValidationException;
use Mitul\Generator\Exceptions\RecordNotFoundException;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Libraries\Repositories\StaffRepository;
use Response;

class StaffAPIController extends AppBaseController
{

	/** @var  StaffRepository */
	private $staffRepository;

	function __construct(StaffRepository $staffRepo)
	{
		$this->staffRepository = $staffRepo;
	}

	/**
	 * Display a listing of the Staff.
	 *
	 * @return Response
	 */
	public function index()
	{
		$staff = $this->staffRepository->all();

		return Response::json(ResponseManager::makeResult($staff->toArray(), "Staff retrieved successfully."));
	}

	/**
	 * Show the form for creating a new Staff.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created Staff in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 * @throws AppValidationException
	 */
	public function store(Request $request)
	{
		if(sizeof(Staff::$rules) > 0)
            $this->validateRequest($request, Staff::$rules);

        $input = $request->all();

		$staff = $this->staffRepository->store($input);

		return Response::json(ResponseManager::makeResult($staff->toArray(), "Staff saved successfully."));
	}

	/**
	 * Display the specified Staff.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function show($id)
	{
		$staff = $this->staffRepository->findStaffById($id);

		if(empty($staff))
			throw new RecordNotFoundException("Staff not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($staff->toArray(), "Staff retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified Staff.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified Staff in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function update($id, Request $request)
	{
		$staff = $this->staffRepository->findStaffById($id);

		if(empty($staff))
			throw new RecordNotFoundException("Staff not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$staff = $this->staffRepository->update($staff, $input);

		return Response::json(ResponseManager::makeResult($staff->toArray(), "Staff updated successfully."));
	}

	/**
	 * Remove the specified Staff from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function destroy($id)
	{
		$staff = $this->staffRepository->findStaffById($id);

		if(empty($staff))
			throw new RecordNotFoundException("Staff not found", ERROR_CODE_RECORD_NOT_FOUND);

		$staff->delete();

		return Response::json(ResponseManager::makeResult($id, "Staff deleted successfully."));
	}

}
