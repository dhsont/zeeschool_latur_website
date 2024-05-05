<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateValbumRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\ValbumRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class ValbumController extends AppBaseController
{

	/** @var  ValbumRepository */
	private $valbumRepository;

	function __construct(ValbumRepository $valbumRepo)
	{
		$this->valbumRepository = $valbumRepo;
	}

	/**
	 * Display a listing of the Valbum.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->valbumRepository->search($input);

		$valbums = $result[0];

		$attributes = $result[1];

		return view('admin.valbums.index')
		    ->with('valbums', $valbums)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Valbum.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.valbums.create');
	}

	/**
	 * Store a newly created Valbum in storage.
	 *
	 * @param CreateValbumRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateValbumRequest $request)
	{
        $input = $request->all();

		$valbum = $this->valbumRepository->store($input);

		Flash::message('Valbum saved successfully.');

		return redirect(route('myadmin.valbums.index'));
	}

	/**
	 * Display the specified Valbum.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$valbum = $this->valbumRepository->findValbumById($id);

		if(empty($valbum))
		{
			Flash::error('Valbum not found');
			return redirect(route('myadmin.valbums.index'));
		}

		return view('admin.valbums.show')->with('valbum', $valbum);
	}

	/**
	 * Show the form for editing the specified Valbum.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$valbum = $this->valbumRepository->findValbumById($id);

		if(empty($valbum))
		{
			Flash::error('Valbum not found');
			return redirect(route('myadmin.valbums.index'));
		}

		return view('admin.valbums.edit')->with('valbum', $valbum);
	}

	/**
	 * Update the specified Valbum in storage.
	 *
	 * @param  int    $id
	 * @param CreateValbumRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateValbumRequest $request)
	{
		$valbum = $this->valbumRepository->findValbumById($id);

		if(empty($valbum))
		{
			Flash::error('Valbum not found');
			return redirect(route('myadmin.valbums.index'));
		}

		$valbum = $this->valbumRepository->update($valbum, $request->all());

		Flash::message('Valbum updated successfully.');

		return redirect(route('myadmin.valbums.index'));
	}

	/**
	 * Remove the specified Valbum from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$valbum = $this->valbumRepository->findValbumById($id);

		if(empty($valbum))
		{
			Flash::error('Valbum not found');
			return redirect(route('myadmin.valbums.index'));
		}

		$valbum->delete();

		Flash::message('Valbum deleted successfully.');

		return redirect(route('myadmin.valbums.index'));
	}

}
