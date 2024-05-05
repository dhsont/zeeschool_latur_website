<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePcategoryRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\PcategoryRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class PcategoryController extends AppBaseController
{

	/** @var  PcategoryRepository */
	private $pcategoryRepository;

	function __construct(PcategoryRepository $pcategoryRepo)
	{
		$this->pcategoryRepository = $pcategoryRepo;
	}

	/**
	 * Display a listing of the Pcategory.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->pcategoryRepository->search($input);

		$pcategories = $result[0];

		$attributes = $result[1];

		return view('admin.pcategories.index')
		    ->with('pcategories', $pcategories)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Pcategory.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.pcategories.create');
	}

	/**
	 * Store a newly created Pcategory in storage.
	 *
	 * @param CreatePcategoryRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePcategoryRequest $request)
	{
        $input = $request->all();

		$pcategory = $this->pcategoryRepository->store($input);

		Flash::message('Pcategory saved successfully.');

		return redirect(route('myadmin.pcategories.index'));
	}

	/**
	 * Display the specified Pcategory.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$pcategory = $this->pcategoryRepository->findPcategoryById($id);

		if(empty($pcategory))
		{
			Flash::error('Pcategory not found');
			return redirect(route('myadmin.pcategories.index'));
		}

		return view('admin.pcategories.show')->with('pcategory', $pcategory);
	}

	/**
	 * Show the form for editing the specified Pcategory.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pcategory = $this->pcategoryRepository->findPcategoryById($id);

		if(empty($pcategory))
		{
			Flash::error('Pcategory not found');
			return redirect(route('myadmin.pcategories.index'));
		}

		return view('admin.pcategories.edit')->with('pcategory', $pcategory);
	}

	/**
	 * Update the specified Pcategory in storage.
	 *
	 * @param  int    $id
	 * @param CreatePcategoryRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatePcategoryRequest $request)
	{
		$pcategory = $this->pcategoryRepository->findPcategoryById($id);

		if(empty($pcategory))
		{
			Flash::error('Pcategory not found');
			return redirect(route('myadmin.pcategories.index'));
		}

		$pcategory = $this->pcategoryRepository->update($pcategory, $request->all());

		Flash::message('Pcategory updated successfully.');

		return redirect(route('myadmin.pcategories.index'));
	}

	/**
	 * Remove the specified Pcategory from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$pcategory = $this->pcategoryRepository->findPcategoryById($id);

		if(empty($pcategory))
		{
			Flash::error('Pcategory not found');
			return redirect(route('myadmin.pcategories.index'));
		}

		$pcategory->delete();

		Flash::message('Pcategory deleted successfully.');

		return redirect(route('myadmin.pcategories.index'));
	}

}
