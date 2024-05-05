<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\Bottle;
use Illuminate\Http\Request;
use App\Libraries\Repositories\BottleRepository;
use Response;
use Schema;

class BottleAPIController extends AppBaseController
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

		return Response::json(ResponseManager::makeResult($bottles->toArray(), "Bottles retrieved successfully."));
	}

	public function search($input)
    {
        $query = Bottle::query();

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
	 * Show the form for creating a new Bottle.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created Bottle in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Bottle::$rules) > 0)
            $this->validateRequest($request, Bottle::$rules);

        $input = $request->all();

		$bottle = $this->bottleRepository->store($input);

		return Response::json(ResponseManager::makeResult($bottle->toArray(), "Bottle saved successfully."));
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
			$this->throwRecordNotFoundException("Bottle not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($bottle->toArray(), "Bottle retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified Bottle.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified Bottle in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$bottle = $this->bottleRepository->findBottleById($id);

		if(empty($bottle))
			$this->throwRecordNotFoundException("Bottle not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$bottle = $this->bottleRepository->update($bottle, $input);

		return Response::json(ResponseManager::makeResult($bottle->toArray(), "Bottle updated successfully."));
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
			$this->throwRecordNotFoundException("Bottle not found", ERROR_CODE_RECORD_NOT_FOUND);

		$bottle->delete();

		return Response::json(ResponseManager::makeResult($id, "Bottle deleted successfully."));
	}
}
