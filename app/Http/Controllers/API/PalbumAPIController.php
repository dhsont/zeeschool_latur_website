<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\Palbum;
use Illuminate\Http\Request;
use App\Libraries\Repositories\PalbumRepository;
use Response;
use Schema;

class PalbumAPIController extends AppBaseController
{

	/** @var  PalbumRepository */
	private $palbumRepository;

	function __construct(PalbumRepository $palbumRepo)
	{
		$this->palbumRepository = $palbumRepo;
	}

	/**
	 * Display a listing of the Palbum.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->palbumRepository->search($input);

		$palbums = $result[0];

		return Response::json(ResponseManager::makeResult($palbums->toArray(), "Palbums retrieved successfully."));
	}

	public function search($input)
    {
        $query = Palbum::query();

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
	 * Show the form for creating a new Palbum.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created Palbum in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Palbum::$rules) > 0)
            $this->validateRequest($request, Palbum::$rules);

        $input = $request->all();

		$palbum = $this->palbumRepository->store($input);

		return Response::json(ResponseManager::makeResult($palbum->toArray(), "Palbum saved successfully."));
	}

	/**
	 * Display the specified Palbum.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$palbum = $this->palbumRepository->findPalbumById($id);

		if(empty($palbum))
			$this->throwRecordNotFoundException("Palbum not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($palbum->toArray(), "Palbum retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified Palbum.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified Palbum in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$palbum = $this->palbumRepository->findPalbumById($id);

		if(empty($palbum))
			$this->throwRecordNotFoundException("Palbum not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$palbum = $this->palbumRepository->update($palbum, $input);

		return Response::json(ResponseManager::makeResult($palbum->toArray(), "Palbum updated successfully."));
	}

	/**
	 * Remove the specified Palbum from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$palbum = $this->palbumRepository->findPalbumById($id);

		if(empty($palbum))
			$this->throwRecordNotFoundException("Palbum not found", ERROR_CODE_RECORD_NOT_FOUND);

		$palbum->delete();

		return Response::json(ResponseManager::makeResult($id, "Palbum deleted successfully."));
	}
}
