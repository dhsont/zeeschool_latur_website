<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateComplaintRequest;
use App\Libraries\Repositories\ComplaintRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class ComplaintController extends AppBaseController
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

		return view('admin.complaints.index')->with('complaints', $complaints);
	}

	/**
	 * Show the form for creating a new Complaint.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.complaints.create');
	}

	/**
	 * Store a newly created Complaint in storage.
	 *
	 * @param CreateComplaintRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateComplaintRequest $request)
	{
        $input = $request->all();

		$complaint = $this->complaintRepository->store($input);

		$name  = reset($input);
        Flash::success("Complaint $name created successfully");

		return redirect(route('myadmin.complaints.index'));
	}

	/**
	 * Display the specified Complaint.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$complaint = $this->complaintRepository->findComplaintById($id);

		if(empty($complaint))
		{
			Flash::error('Complaint not found');
			return redirect(route('myadmin.complaints.index'));
		}

		return view('admin.complaints.show')->with('complaint', $complaint);
	}

	/**
	 * Show the form for editing the specified Complaint.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$complaint = $this->complaintRepository->findComplaintById($id);

		if(empty($complaint))
		{
			Flash::error('Complaint not found');
			return redirect(route('myadmin.complaints.index'));
		}

		return view('admin.complaints.edit')->with('complaint', $complaint);
	}

	/**
	 * Update the specified Complaint in storage.
	 *
	 * @param  int    $id
	 * @param CreateComplaintRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateComplaintRequest $request)
	{
		$complaint = $this->complaintRepository->findComplaintById($id);

		if(empty($complaint))
		{
			Flash::error('Complaint not found');
			return redirect(route('myadmin.complaints.index'));
		}

		$complaint = $this->complaintRepository->update($complaint, $request->all());

		$input = array_except($request->all(), '_method');
		$name  = reset($input);
        Flash::message("Complaint $name updated successfully");

		return redirect(route('myadmin.complaints.index'));
	}

	/**
	 * Remove the specified Complaint from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$complaint = $this->complaintRepository->findComplaintById($id);

		if(empty($complaint))
		{
			Flash::error('Complaint not found');
			return redirect(route('myadmin.complaints.index'));
		}

		$complaint->delete();

		Flash::message('Complaint deleted successfully.');

		return redirect(route('myadmin.complaints.index'));
	}




}
