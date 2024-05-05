<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\Vcategory;
use Illuminate\Http\Request;
use App\Libraries\Repositories\VcategoryRepository;
use Response;
use Schema;

class VcategoryAPIController extends AppBaseController
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

		return Response::json(ResponseManager::makeResult($vcategories->toArray(), "Vcategories retrieved successfully."));
	}

	public function search($input)
    {
        $query = Vcategory::query();

        $columns = Schema::getColumnListing('$TABLE_NAME$');
        $attributes = array();

        foreach($columns as $attribute)
        {
            if(isset($input[$attribute]))
            {
                $query->where($attribute, $input[$attribute]);
            }
        }

        return $query->get();
    }

	/**
	 * Show the form for creating a new Vcategory.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created Vcategory in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Vcategory::$rules) > 0)
            $this->validateRequest($request, Vcategory::$rules);

        $input = $request->all();

		$vcategory = $this->vcategoryRepository->store($input);

		return Response::json(ResponseManager::makeResult($vcategory->toArray(), "Vcategory saved successfully."));
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
			$this->throwRecordNotFoundException("Vcategory not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($vcategory->toArray(), "Vcategory retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified Vcategory.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified Vcategory in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$vcategory = $this->vcategoryRepository->findVcategoryById($id);

		if(empty($vcategory))
			$this->throwRecordNotFoundException("Vcategory not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$vcategory = $this->vcategoryRepository->update($vcategory, $input);

		return Response::json(ResponseManager::makeResult($vcategory->toArray(), "Vcategory updated successfully."));
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
			$this->throwRecordNotFoundException("Vcategory not found", ERROR_CODE_RECORD_NOT_FOUND);

		$vcategory->delete();

		return Response::json(ResponseManager::makeResult($id, "Vcategory deleted successfully."));
	}
}
