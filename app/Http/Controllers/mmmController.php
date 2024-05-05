<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatemmmRequest;
use App\Libraries\Repositories\mmmRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class mmmController extends AppBaseController
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

		return view('admin.mmms.index')->with('mmms', $mmms);
	}

	/**
	 * Show the form for creating a new mmm.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.mmms.create');
	}

	/**
	 * Store a newly created mmm in storage.
	 *
	 * @param CreatemmmRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatemmmRequest $request)
	{
        $input = $request->all();

		$mmm = $this->mmmRepository->store($input);

		$name  = reset($input);
        Flash::success("mmm $name created successfully");

		return redirect(route('mmms.index'));
	}

	/**
	 * Display the specified mmm.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$mmm = $this->mmmRepository->findmmmById($id);

		if(empty($mmm))
		{
			Flash::error('mmm not found');
			return redirect(route('mmms.index'));
		}

		return view('admin.mmms.show')->with('mmm', $mmm);
	}

	/**
	 * Show the form for editing the specified mmm.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$mmm = $this->mmmRepository->findmmmById($id);

		if(empty($mmm))
		{
			Flash::error('mmm not found');
			return redirect(route('mmms.index'));
		}

		return view('admin.mmms.edit')->with('mmm', $mmm);
	}

	/**
	 * Update the specified mmm in storage.
	 *
	 * @param  int    $id
	 * @param CreatemmmRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatemmmRequest $request)
	{
		$mmm = $this->mmmRepository->findmmmById($id);

		if(empty($mmm))
		{
			Flash::error('mmm not found');
			return redirect(route('mmms.index'));
		}

		$mmm = $this->mmmRepository->update($mmm, $request->all());

		$name  = reset($input);
        Flash::message("mmm $name updated successfully");

		return redirect(route('mmms.index'));
	}

	/**
	 * Remove the specified mmm from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$mmm = $this->mmmRepository->findmmmById($id);

		if(empty($mmm))
		{
			Flash::error('mmm not found');
			return redirect(route('mmms.index'));
		}

		$mmm->delete();

		Flash::message('mmm deleted successfully.');

		return redirect(route('mmms.index'));
	}




}
