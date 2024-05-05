<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatepopoRequest;
use App\Libraries\Repositories\popoRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class popoController extends AppBaseController
{

	/** @var  popoRepository */
	private $popoRepository;

	function __construct(popoRepository $popoRepo)
	{
		$this->popoRepository = $popoRepo;
	}

	/**
	 * Display a listing of the popo.
	 *
	 * @return Response
	 */
	public function index()
	{
		$popos = $this->popoRepository->all();

		return view('admin.popos.index')->with('popos', $popos);
	}

	/**
	 * Show the form for creating a new popo.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.popos.create');
	}

	/**
	 * Store a newly created popo in storage.
	 *
	 * @param CreatepopoRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatepopoRequest $request)
	{
        $input = $request->all();

		$popo = $this->popoRepository->store($input);

		$name  = reset($input);
        Flash::success("popo $name created successfully");

		return redirect(route('myadmin.popos.index'));
	}

	/**
	 * Display the specified popo.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$popo = $this->popoRepository->findpopoById($id);

		if(empty($popo))
		{
			Flash::error('popo not found');
			return redirect(route('myadmin.popos.index'));
		}

		return view('admin.popos.show')->with('popo', $popo);
	}

	/**
	 * Show the form for editing the specified popo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$popo = $this->popoRepository->findpopoById($id);

		if(empty($popo))
		{
			Flash::error('popo not found');
			return redirect(route('myadmin.popos.index'));
		}

		return view('admin.popos.edit')->with('popo', $popo);
	}

	/**
	 * Update the specified popo in storage.
	 *
	 * @param  int    $id
	 * @param CreatepopoRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatepopoRequest $request)
	{
		$popo = $this->popoRepository->findpopoById($id);

		if(empty($popo))
		{
			Flash::error('popo not found');
			return redirect(route('myadmin.popos.index'));
		}

		$popo = $this->popoRepository->update($popo, $request->all());

		$name  = reset($input);
        Flash::message("popo $name updated successfully");

		return redirect(route('myadmin.popos.index'));
	}

	/**
	 * Remove the specified popo from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$popo = $this->popoRepository->findpopoById($id);

		if(empty($popo))
		{
			Flash::error('popo not found');
			return redirect(route('myadmin.popos.index'));
		}

		$popo->delete();

		Flash::message('popo deleted successfully.');

		return redirect(route('myadmin.popos.index'));
	}




}
