<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateBombRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\BombRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class BombController extends AppBaseController
{

	/** @var  BombRepository */
	private $bombRepository;

	function __construct(BombRepository $bombRepo)
	{
		$this->bombRepository = $bombRepo;
	}

	/**
	 * Display a listing of the Bomb.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->bombRepository->search($input);

		$bombs = $result[0];

		$attributes = $result[1];

		return view('bombs.index')
		    ->with('bombs', $bombs)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Bomb.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('bombs.create');
	}

	/**
	 * Store a newly created Bomb in storage.
	 *
	 * @param CreateBombRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateBombRequest $request)
	{
        $input = $request->all();

		$bomb = $this->bombRepository->store($input);

		Flash::message('Bomb saved successfully.');

		return redirect(route('bombs.index'));
	}

	/**
	 * Display the specified Bomb.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$bomb = $this->bombRepository->findBombById($id);

		if(empty($bomb))
		{
			Flash::error('Bomb not found');
			return redirect(route('bombs.index'));
		}

		return view('bombs.show')->with('bomb', $bomb);
	}

	/**
	 * Show the form for editing the specified Bomb.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bomb = $this->bombRepository->findBombById($id);

		if(empty($bomb))
		{
			Flash::error('Bomb not found');
			return redirect(route('bombs.index'));
		}

		return view('bombs.edit')->with('bomb', $bomb);
	}

	/**
	 * Update the specified Bomb in storage.
	 *
	 * @param  int    $id
	 * @param CreateBombRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateBombRequest $request)
	{
		$bomb = $this->bombRepository->findBombById($id);

		if(empty($bomb))
		{
			Flash::error('Bomb not found');
			return redirect(route('bombs.index'));
		}

		$bomb = $this->bombRepository->update($bomb, $request->all());

		Flash::message('Bomb updated successfully.');

		return redirect(route('bombs.index'));
	}

	/**
	 * Remove the specified Bomb from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$bomb = $this->bombRepository->findBombById($id);

		if(empty($bomb))
		{
			Flash::error('Bomb not found');
			return redirect(route('bombs.index'));
		}

		$bomb->delete();

		Flash::message('Bomb deleted successfully.');

		return redirect(route('bombs.index'));
	}

}
