<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePalbumRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\PalbumRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class PalbumController extends AppBaseController
{

	/** @var  PalbumRepository */
	private $palbumRepository;

	function __construct(PalbumRepository $palbumRepo)
	{
		$this->palbumRepository = $palbumRepo;
	}

	/**
	 * Display a listing of the Palbum.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->palbumRepository->search($input);

		$palbums = $result[0];

		$attributes = $result[1];

		return view('admin.palbums.index')
		    ->with('palbums', $palbums)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Palbum.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.palbums.create');
	}

	/**
	 * Store a newly created Palbum in storage.
	 *
	 * @param CreatePalbumRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePalbumRequest $request)
	{
        $input = $request->all();



        $file = \Request::file('photo');

        $newName = time()."_".$file->getClientOriginalName();

        if ($file->move('uploading', $newName )) {

            $input['photo']= '/uploading/' . $newName;
        } else {
            return FALSE;
        }




         $input['link'] =  "<img src='".$input['photo']."'>    ".$input['link'];




		$palbum = $this->palbumRepository->store($input);

		Flash::message('Palbum saved successfully.');

		return redirect(route('myadmin.palbums.index'));
	}

	/**
	 * Display the specified Palbum.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$palbum = $this->palbumRepository->findPalbumById($id);

		if(empty($palbum))
		{
			Flash::error('Palbum not found');
			return redirect(route('myadmin.palbums.index'));
		}

		return view('admin.palbums.show')->with('palbum', $palbum);
	}

	/**
	 * Show the form for editing the specified Palbum.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$palbum = $this->palbumRepository->findPalbumById($id);

		if(empty($palbum))
		{
			Flash::error('Palbum not found');
			return redirect(route('myadmin.palbums.index'));
		}

		return view('admin.palbums.edit')->with('palbum', $palbum);
	}

	/**
	 * Update the specified Palbum in storage.
	 *
	 * @param  int    $id
	 * @param CreatePalbumRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatePalbumRequest $request)
	{
		$palbum = $this->palbumRepository->findPalbumById($id);

		if(empty($palbum))
		{
			Flash::error('Palbum not found');
			return redirect(route('myadmin.palbums.index'));
		}

		$palbum = $this->palbumRepository->update($palbum, $request->all());

		Flash::message('Palbum updated successfully.');

		return redirect(route('myadmin.palbums.index'));
	}

	/**
	 * Remove the specified Palbum from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$palbum = $this->palbumRepository->findPalbumById($id);

		if(empty($palbum))
		{
			Flash::error('Palbum not found');
			return redirect(route('myadmin.palbums.index'));
		}

		$palbum->delete();

		Flash::message('Palbum deleted successfully.');

		return redirect(route('myadmin.palbums.index'));
	}

}
