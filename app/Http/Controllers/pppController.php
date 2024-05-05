<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatepppRequest;
use App\Libraries\Repositories\pppRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class pppController extends AppBaseController
{

	/** @var  pppRepository */
	private $pppRepository;

	function __construct(pppRepository $pppRepo)
	{
		$this->pppRepository = $pppRepo;
	}

	/**
	 * Display a listing of the ppp.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ppps = $this->pppRepository->all();

		return view('ppps.index')->with('ppps', $ppps);
	}

	/**
	 * Show the form for creating a new ppp.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('ppps.create');
	}

	/**
	 * Store a newly created ppp in storage.
	 *
	 * @param CreatepppRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatepppRequest $request)
	{
        $input = $request->all();

		$ppp = $this->pppRepository->store($input);

		Flash::message('ppp saved successfully.');

		return redirect(route('ppps.index'));
	}

	/**
	 * Display the specified ppp.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$ppp = $this->pppRepository->findpppById($id);

		if(empty($ppp))
		{
			Flash::error('ppp not found');
			return redirect(route('ppps.index'));
		}

		return view('ppps.show')->with('ppp', $ppp);
	}

	/**
	 * Show the form for editing the specified ppp.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ppp = $this->pppRepository->findpppById($id);

		if(empty($ppp))
		{
			Flash::error('ppp not found');
			return redirect(route('ppps.index'));
		}

		return view('ppps.edit')->with('ppp', $ppp);
	}

	/**
	 * Update the specified ppp in storage.
	 *
	 * @param  int    $id
	 * @param CreatepppRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatepppRequest $request)
	{
		$ppp = $this->pppRepository->findpppById($id);

		if(empty($ppp))
		{
			Flash::error('ppp not found');
			return redirect(route('ppps.index'));
		}

		$ppp = $this->pppRepository->update($ppp, $request->all());

		Flash::message('ppp updated successfully.');

		return redirect(route('ppps.index'));
	}

	/**
	 * Remove the specified ppp from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$ppp = $this->pppRepository->findpppById($id);

		if(empty($ppp))
		{
			Flash::error('ppp not found');
			return redirect(route('ppps.index'));
		}

		$ppp->delete();

		Flash::message('ppp deleted successfully.');

		return redirect(route('ppps.index'));
	}

}
