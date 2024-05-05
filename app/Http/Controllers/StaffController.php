<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateStaffRequest;
use App\Libraries\Repositories\StaffRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use App\Models;

class StaffController extends AppBaseController
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

		return view('admin.staff.index')->with('staff', $staff);
	}

	/**
	 * Show the form for creating a new Staff.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.staff.create');
	}

	/**
	 * Store a newly created Staff in storage.
	 *
	 * @param CreateStaffRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateStaffRequest $request)
	{
        $input = $request->all();

		$staff = $this->staffRepository->store($input);

		$name  = reset($input);
        Flash::success("Staff $name created successfully");

		return redirect(route('myadmin.staff.index'));
	}

	/**
	 * Display the specified Staff.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$staff = $this->staffRepository->findStaffById($id);

		if(empty($staff))
		{
			Flash::error('Staff not found');
			return redirect(route('myadmin.staff.index'));
		}

		return view('admin.staff.show')->with('staff', $staff);
	}

	/**
	 * Show the form for editing the specified Staff.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$staff = $this->staffRepository->findStaffById($id);

		if(empty($staff))
		{
			Flash::error('Staff not found');
			return redirect(route('myadmin.staff.index'));
		}

		return view('admin.staff.edit')->with('staff', $staff);
	}

	/**
	 * Update the specified Staff in storage.
	 *
	 * @param  int    $id
	 * @param CreateStaffRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateStaffRequest $request)
	{
		$staff = $this->staffRepository->findStaffById($id);

		if(empty($staff))
		{
			Flash::error('Staff not found');
			return redirect(route('myadmin.staff.index'));
		}

		$staff = $this->staffRepository->update($staff, $request->all());

		$input = array_except($request->all(), '_method');
		$name  = reset($input);
        Flash::message("Staff $name updated successfully");

		return redirect(route('myadmin.staff.index'));
	}

	/**
	 * Remove the specified Staff from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$staff = $this->staffRepository->findStaffById($id);

		if(empty($staff))
		{
			Flash::error('Staff not found');
			return redirect(route('myadmin.staff.index'));
		}

		$staff->delete();

		Flash::message('Staff deleted successfully.');

		return redirect(route('myadmin.staff.index'));
	}




}
