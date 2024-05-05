<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\Pcategory;
use Illuminate\Http\Request;
use App\Libraries\Repositories\PcategoryRepository;
use Response;
use Schema;

class PcategoryAPIController extends AppBaseController
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

		return Response::json(ResponseManager::makeResult($pcategories->toArray(), "Pcategories retrieved successfully."));
	}

	public function search($input)
    {
        $query = Pcategory::query();

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
	 * Show the form for creating a new Pcategory.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created Pcategory in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Pcategory::$rules) > 0)
            $this->validateRequest($request, Pcategory::$rules);

        $input = $request->all();

		$pcategory = $this->pcategoryRepository->store($input);

		return Response::json(ResponseManager::makeResult($pcategory->toArray(), "Pcategory saved successfully."));
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
			$this->throwRecordNotFoundException("Pcategory not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($pcategory->toArray(), "Pcategory retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified Pcategory.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified Pcategory in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$pcategory = $this->pcategoryRepository->findPcategoryById($id);

		if(empty($pcategory))
			$this->throwRecordNotFoundException("Pcategory not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$pcategory = $this->pcategoryRepository->update($pcategory, $input);

		return Response::json(ResponseManager::makeResult($pcategory->toArray(), "Pcategory updated successfully."));
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
			$this->throwRecordNotFoundException("Pcategory not found", ERROR_CODE_RECORD_NOT_FOUND);

		$pcategory->delete();

		return Response::json(ResponseManager::makeResult($id, "Pcategory deleted successfully."));
	}
}
