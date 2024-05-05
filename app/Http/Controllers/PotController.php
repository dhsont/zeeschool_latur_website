<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePotRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\PotRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class PotController extends AppBaseController
{

	/** @var  PotRepository */
	private $potRepository;

	function __construct(PotRepository $potRepo)
	{
		$this->potRepository = $potRepo;
	}

	/**
	 * Display a listing of the Pot.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->potRepository->search($input);

		$pots = $result[0];

		$attributes = $result[1];

		return view('admin.pots.index')
		    ->with('pots', $pots)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Pot.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.pots.create');
	}

	/**
	 * Store a newly created Pot in storage.
	 *
	 * @param CreatePotRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePotRequest $request)
	{
        $input = $request->all();

		$pot = $this->potRepository->store($input);

		Flash::message('Pot saved successfully.');

		return redirect(route('myadmin.pots.index'));
	}

	/**
	 * Display the specified Pot.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$pot = $this->potRepository->findPotById($id);

		if(empty($pot))
		{
			Flash::error('Pot not found');
			return redirect(route('myadmin.pots.index'));
		}

		return view('admin.pots.show')->with('pot', $pot);
	}

	/**
	 * Show the form for editing the specified Pot.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pot = $this->potRepository->findPotById($id);

		if(empty($pot))
		{
			Flash::error('Pot not found');
			return redirect(route('myadmin.pots.index'));
		}

		return view('admin.pots.edit')->with('pot', $pot);
	}

	/**
	 * Update the specified Pot in storage.
	 *
	 * @param  int    $id
	 * @param CreatePotRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatePotRequest $request)
	{
		$pot = $this->potRepository->findPotById($id);

		if(empty($pot))
		{
			Flash::error('Pot not found');
			return redirect(route('myadmin.pots.index'));
		}

		$pot = $this->potRepository->update($pot, $request->all());

		Flash::message('Pot updated successfully.');

		return redirect(route('myadmin.pots.index'));
	}

	/**
	 * Remove the specified Pot from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$pot = $this->potRepository->findPotById($id);

		if(empty($pot))
		{
			Flash::error('Pot not found');
			return redirect(route('myadmin.pots.index'));
		}

		$pot->delete();

		Flash::message('Pot deleted successfully.');

		return redirect(route('myadmin.pots.index'));
	}

}
