<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatemodRequest;
use App\Libraries\Repositories\modRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class modController extends AppBaseController
{

	/** @var  modRepository */
	private $modRepository;

	function __construct(modRepository $modRepo)
	{
		$this->modRepository = $modRepo;
	}

	/**
	 * Display a listing of the mod.
	 *
	 * @return Response
	 */
	public function index()
	{
		$mods = $this->modRepository->all();

		return view('admin.mods.index')->with('mods', $mods);
	}

	/**
	 * Show the form for creating a new mod.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.mods.create');
	}

	/**
	 * Store a newly created mod in storage.
	 *
	 * @param CreatemodRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatemodRequest $request)
	{
        $input = $request->all();

		$mod = $this->modRepository->store($input);

		$name  = reset($input);
        Flash::success("mod $name created successfully");

		return redirect(route('myadmin.mods.index'));
	}

	/**
	 * Display the specified mod.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$mod = $this->modRepository->findmodById($id);

		if(empty($mod))
		{
			Flash::error('mod not found');
			return redirect(route('myadmin.mods.index'));
		}

		return view('admin.mods.show')->with('mod', $mod);
	}

	/**
	 * Show the form for editing the specified mod.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$mod = $this->modRepository->findmodById($id);

		if(empty($mod))
		{
			Flash::error('mod not found');
			return redirect(route('myadmin.mods.index'));
		}

		return view('admin.mods.edit')->with('mod', $mod);
	}

	/**
	 * Update the specified mod in storage.
	 *
	 * @param  int    $id
	 * @param CreatemodRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatemodRequest $request)
	{
		$mod = $this->modRepository->findmodById($id);

		if(empty($mod))
		{
			Flash::error('mod not found');
			return redirect(route('myadmin.mods.index'));
		}

		$mod = $this->modRepository->update($mod, $request->all());

		//dd($mod['attributes']);

		$name = array_except($request->all(), '_method');
		//$name =  $request->all();
		$name  = reset($name);
        Flash::message("mod $name updated successfully");

		return redirect(route('myadmin.mods.index'));
	}

	/**
	 * Remove the specified mod from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$mod = $this->modRepository->findmodById($id);

		if(empty($mod))
		{
			Flash::error('mod not found');
			return redirect(route('myadmin.mods.index'));
		}

		$mod->delete();

		Flash::message('mod deleted successfully.');

		return redirect(route('myadmin.mods.index'));
	}




}
