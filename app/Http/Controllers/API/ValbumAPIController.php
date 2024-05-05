<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\Valbum;
use Illuminate\Http\Request;
use App\Libraries\Repositories\ValbumRepository;
use Response;
use Schema;

class ValbumAPIController extends AppBaseController
{

	/** @var  ValbumRepository */
	private $valbumRepository;

	function __construct(ValbumRepository $valbumRepo)
	{
		$this->valbumRepository = $valbumRepo;
	}

	/**
	 * Display a listing of the Valbum.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->valbumRepository->search($input);

		$valbums = $result[0];

		return Response::json(ResponseManager::makeResult($valbums->toArray(), "Valbums retrieved successfully."));
	}

	public function search($input)
    {
        $query = Valbum::query();

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
	 * Show the form for creating a new Valbum.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created Valbum in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Valbum::$rules) > 0)
            $this->validateRequest($request, Valbum::$rules);

        $input = $request->all();

		$valbum = $this->valbumRepository->store($input);

		return Response::json(ResponseManager::makeResult($valbum->toArray(), "Valbum saved successfully."));
	}

	/**
	 * Display the specified Valbum.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$valbum = $this->valbumRepository->findValbumById($id);

		if(empty($valbum))
			$this->throwRecordNotFoundException("Valbum not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($valbum->toArray(), "Valbum retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified Valbum.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified Valbum in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$valbum = $this->valbumRepository->findValbumById($id);

		if(empty($valbum))
			$this->throwRecordNotFoundException("Valbum not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$valbum = $this->valbumRepository->update($valbum, $input);

		return Response::json(ResponseManager::makeResult($valbum->toArray(), "Valbum updated successfully."));
	}

	/**
	 * Remove the specified Valbum from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$valbum = $this->valbumRepository->findValbumById($id);

		if(empty($valbum))
			$this->throwRecordNotFoundException("Valbum not found", ERROR_CODE_RECORD_NOT_FOUND);

		$valbum->delete();

		return Response::json(ResponseManager::makeResult($id, "Valbum deleted successfully."));
	}
}
