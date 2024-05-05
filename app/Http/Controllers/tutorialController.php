<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatetutorialRequest;
use App\Libraries\Repositories\tutorialRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class tutorialController extends AppBaseController
{

	/** @var  tutorialRepository */
	private $tutorialRepository;

	function __construct(tutorialRepository $tutorialRepo)
	{
		$this->tutorialRepository = $tutorialRepo;
	}

	/**
	 * Display a listing of the tutorial.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tutorials = $this->tutorialRepository->all();

		return view('admin.tutorials.index')->with('tutorials', $tutorials);
	}

	/**
	 * Show the form for creating a new tutorial.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.tutorials.create');
	}

	/**
	 * Store a newly created tutorial in storage.
	 *
	 * @param CreatetutorialRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatetutorialRequest $request)
	{
        $input = $request->all();

		$tutorial = $this->tutorialRepository->store($input);

		//var_dump($tutorial['attributes']);


		$name  = reset($input);
		Flash::success("tutorial $name created successfully");
		//Flash::message('tutorial saved successfully.');

		echo ("tutorial $name created successfully");
		dd($name);
		return redirect(route('myadmin.tutorials.index'));
	}

	/**
	 * Display the specified tutorial.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$tutorial = $this->tutorialRepository->findtutorialById($id);

		if(empty($tutorial))
		{
			Flash::error('tutorial not found');
			return redirect(route('myadmin.tutorials.index'));
		}

		return view('admin.tutorials.show')->with('tutorial', $tutorial);
	}

	/**
	 * Show the form for editing the specified tutorial.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tutorial = $this->tutorialRepository->findtutorialById($id);

		if(empty($tutorial))
		{
			Flash::error('tutorial not found');
			return redirect(route('myadmin.tutorials.index'));
		}

		return view('admin.tutorials.edit')->with('tutorial', $tutorial);
	}

	/**
	 * Update the specified tutorial in storage.
	 *
	 * @param  int    $id
	 * @param CreatetutorialRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatetutorialRequest $request)
	{
		$tutorial = $this->tutorialRepository->findtutorialById($id);

		if(empty($tutorial))
		{
			Flash::error('tutorial not found');
			return redirect(route('myadmin.tutorials.index'));
		}

		$tutorial = $this->tutorialRepository->update($tutorial, $request->all());

		$name  = reset($request->all());
		Flash::message("tutorial $name updated successfully.");

		return redirect(route('myadmin.tutorials.index'));
	}

	/**
	 * Remove the specified tutorial from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$tutorial = $this->tutorialRepository->findtutorialById($id);

		if(empty($tutorial))
		{
			Flash::error('tutorial not found');
			return redirect(route('myadmin.tutorials.index'));
		}

		$tutorial->delete();

		Flash::message('tutorial deleted successfully.');

		return redirect(route('myadmin.tutorials.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 *
	 * @return Response
	 */

	public function getDatatable()
	{
		return Datatable::collection($this->tutorialRepository->all())
//			->addColumn('name',function($model){
//				return "name";
//			})
			->showColumns('name')
 			->showColumns('date')
			->showColumns('desc')
			->searchColumns('name','id')
			->orderColumns('name','id')
			->make();
	}

}
