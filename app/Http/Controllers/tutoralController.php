<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatetutoralRequest;
use App\Libraries\Repositories\tutoralRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class tutoralController extends AppBaseController
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

		return view('admin.tutorals.index')->with('tutorals', $tutorals);
	}

	/**
	 * Show the form for creating a new tutoral.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.tutorals.create');
	}

	/**
	 * Store a newly created tutoral in storage.
	 *
	 * @param CreatetutoralRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatetutoralRequest $request)
	{
        $input = $request->all();

		$tutoral = $this->tutoralRepository->store($input);

		Flash::message('tutoral saved successfully.');

		return redirect(route('tutorals.index'));
	}

	/**
	 * Display the specified tutoral.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$tutoral = $this->tutoralRepository->findtutoralById($id);

		if(empty($tutoral))
		{
			Flash::error('tutoral not found');
			return redirect(route('tutorals.index'));
		}

		return view('admin.tutorals.show')->with('tutoral', $tutoral);
	}

	/**
	 * Show the form for editing the specified tutoral.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tutoral = $this->tutoralRepository->findtutoralById($id);

		if(empty($tutoral))
		{
			Flash::error('tutoral not found');
			return redirect(route('tutorals.index'));
		}

		return view('admin.tutorals.edit')->with('tutoral', $tutoral);
	}

	/**
	 * Update the specified tutoral in storage.
	 *
	 * @param  int    $id
	 * @param CreatetutoralRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatetutoralRequest $request)
	{
		$tutoral = $this->tutoralRepository->findtutoralById($id);

		if(empty($tutoral))
		{
			Flash::error('tutoral not found');
			return redirect(route('tutorals.index'));
		}

		$tutoral = $this->tutoralRepository->update($tutoral, $request->all());

		Flash::message('tutoral updated successfully.');

		return redirect(route('tutorals.index'));
	}

	/**
	 * Remove the specified tutoral from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$tutoral = $this->tutoralRepository->findtutoralById($id);

		if(empty($tutoral))
		{
			Flash::error('tutoral not found');
			return redirect(route('tutorals.index'));
		}

		$tutoral->delete();

		Flash::message('tutoral deleted successfully.');

		return redirect(route('tutorals.index'));
	}

}
