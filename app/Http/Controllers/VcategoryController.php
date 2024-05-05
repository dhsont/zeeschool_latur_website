<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateVcategoryRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\VcategoryRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class VcategoryController extends AppBaseController
{

	/** @var  VcategoryRepository */
	private $vcategoryRepository;

	function __construct(VcategoryRepository $vcategoryRepo)
	{
		$this->vcategoryRepository = $vcategoryRepo;
	}

	/**
	 * Display a listing of the Vcategory.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->vcategoryRepository->search($input);

		$vcategories = $result[0];

		$attributes = $result[1];

		return view('admin.vcategories.index')
		    ->with('vcategories', $vcategories)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Vcategory.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.vcategories.create');
	}

	/**
	 * Store a newly created Vcategory in storage.
	 *
	 * @param CreateVcategoryRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateVcategoryRequest $request)
	{
        $input = $request->all();

		$vcategory = $this->vcategoryRepository->store($input);

		Flash::message('Vcategory saved successfully.');

		return redirect(route('myadmin.vcategories.index'));
	}

	/**
	 * Display the specified Vcategory.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$vcategory = $this->vcategoryRepository->findVcategoryById($id);

		if(empty($vcategory))
		{
			Flash::error('Vcategory not found');
			return redirect(route('myadmin.vcategories.index'));
		}

		return view('admin.vcategories.show')->with('vcategory', $vcategory);
	}

	/**
	 * Show the form for editing the specified Vcategory.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$vcategory = $this->vcategoryRepository->findVcategoryById($id);

		if(empty($vcategory))
		{
			Flash::error('Vcategory not found');
			return redirect(route('myadmin.vcategories.index'));
		}

		return view('admin.vcategories.edit')->with('vcategory', $vcategory);
	}

	/**
	 * Update the specified Vcategory in storage.
	 *
	 * @param  int    $id
	 * @param CreateVcategoryRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateVcategoryRequest $request)
	{
		$vcategory = $this->vcategoryRepository->findVcategoryById($id);

		if(empty($vcategory))
		{
			Flash::error('Vcategory not found');
			return redirect(route('myadmin.vcategories.index'));
		}

		$vcategory = $this->vcategoryRepository->update($vcategory, $request->all());

		Flash::message('Vcategory updated successfully.');

		return redirect(route('myadmin.vcategories.index'));
	}

	/**
	 * Remove the specified Vcategory from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$vcategory = $this->vcategoryRepository->findVcategoryById($id);

		if(empty($vcategory))
		{
			Flash::error('Vcategory not found');
			return redirect(route('myadmin.vcategories.index'));
		}

		$vcategory->delete();

		Flash::message('Vcategory deleted successfully.');

		return redirect(route('myadmin.vcategories.index'));
	}

}
