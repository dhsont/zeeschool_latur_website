<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateBottleRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\BottleRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class BottleController extends AppBaseController
{

	/** @var  BottleRepository */
	private $bottleRepository;

	function __construct(BottleRepository $bottleRepo)
	{
		$this->bottleRepository = $bottleRepo;
	}

	/**
	 * Display a listing of the Bottle.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->bottleRepository->search($input);

		$bottles = $result[0];

		$attributes = $result[1];

		return view('bottles.index')
		    ->with('bottles', $bottles)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Bottle.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('bottles.create');
	}

	/**
	 * Store a newly created Bottle in storage.
	 *
	 * @param CreateBottleRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateBottleRequest $request)
	{
        $input = $request->all();

		$bottle = $this->bottleRepository->store($input);

		Flash::message('Bottle saved successfully.');

		return redirect(route('bottles.index'));
	}

	/**
	 * Display the specified Bottle.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$bottle = $this->bottleRepository->findBottleById($id);

		if(empty($bottle))
		{
			Flash::error('Bottle not found');
			return redirect(route('bottles.index'));
		}

		return view('bottles.show')->with('bottle', $bottle);
	}

	/**
	 * Show the form for editing the specified Bottle.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bottle = $this->bottleRepository->findBottleById($id);

		if(empty($bottle))
		{
			Flash::error('Bottle not found');
			return redirect(route('bottles.index'));
		}

		return view('bottles.edit')->with('bottle', $bottle);
	}

	/**
	 * Update the specified Bottle in storage.
	 *
	 * @param  int    $id
	 * @param CreateBottleRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateBottleRequest $request)
	{
		$bottle = $this->bottleRepository->findBottleById($id);

		if(empty($bottle))
		{
			Flash::error('Bottle not found');
			return redirect(route('bottles.index'));
		}

		$bottle = $this->bottleRepository->update($bottle, $request->all());

		Flash::message('Bottle updated successfully.');

		return redirect(route('bottles.index'));
	}

	/**
	 * Remove the specified Bottle from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$bottle = $this->bottleRepository->findBottleById($id);

		if(empty($bottle))
		{
			Flash::error('Bottle not found');
			return redirect(route('bottles.index'));
		}

		$bottle->delete();

		Flash::message('Bottle deleted successfully.');

		return redirect(route('bottles.index'));
	}

}
