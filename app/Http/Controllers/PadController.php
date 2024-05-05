<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePadRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\PadRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class PadController extends AppBaseController
{

	/** @var  PadRepository */
	private $padRepository;

	function __construct(PadRepository $padRepo)
	{
		$this->padRepository = $padRepo;
	}

	/**
	 * Display a listing of the Pad.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->padRepository->search($input);

		$pads = $result[0];

//dd($pads);
		$attributes = $result[1];

	//	dd($attributes);

		return view('pads.index')
		    ->with('pads', $pads)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Pad.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('pads.create');
	}

	/**
	 * Store a newly created Pad in storage.
	 *
	 * @param CreatePadRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePadRequest $request)
	{
        $input = $request->all();

		$pad = $this->padRepository->store($input);

		Flash::message('Pad saved successfully.');

		return redirect(route('pads.index'));
	}

	/**
	 * Display the specified Pad.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$pad = $this->padRepository->findPadById($id);

		if(empty($pad))
		{
			Flash::error('Pad not found');
			return redirect(route('pads.index'));
		}

		return view('pads.show')->with('pad', $pad);
	}

	/**
	 * Show the form for editing the specified Pad.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pad = $this->padRepository->findPadById($id);

		if(empty($pad))
		{
			Flash::error('Pad not found');
			return redirect(route('pads.index'));
		}

		return view('pads.edit')->with('pad', $pad);
	}

	/**
	 * Update the specified Pad in storage.
	 *
	 * @param  int    $id
	 * @param CreatePadRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatePadRequest $request)
	{
		$pad = $this->padRepository->findPadById($id);

		if(empty($pad))
		{
			Flash::error('Pad not found');
			return redirect(route('pads.index'));
		}

		$pad = $this->padRepository->update($pad, $request->all());

		Flash::message('Pad updated successfully.');

		return redirect(route('pads.index'));
	}

	/**
	 * Remove the specified Pad from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$pad = $this->padRepository->findPadById($id);

		if(empty($pad))
		{
			Flash::error('Pad not found');
			return redirect(route('pads.index'));
		}

		$pad->delete();

		Flash::message('Pad deleted successfully.');

		return redirect(route('pads.index'));
	}

}
