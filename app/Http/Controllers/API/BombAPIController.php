<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\Bomb;
use Illuminate\Http\Request;
use App\Libraries\Repositories\BombRepository;
use Response;
use Schema;

class BombAPIController extends AppBaseController
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

		return Response::json(ResponseManager::makeResult($bombs->toArray(), "Bombs retrieved successfully."));
	}

	public function search($input)
    {
        $query = Bomb::query();

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
	 * Show the form for creating a new Bomb.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created Bomb in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Bomb::$rules) > 0)
            $this->validateRequest($request, Bomb::$rules);

        $input = $request->all();

		$bomb = $this->bombRepository->store($input);

		return Response::json(ResponseManager::makeResult($bomb->toArray(), "Bomb saved successfully."));
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
			$this->throwRecordNotFoundException("Bomb not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($bomb->toArray(), "Bomb retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified Bomb.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified Bomb in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$bomb = $this->bombRepository->findBombById($id);

		if(empty($bomb))
			$this->throwRecordNotFoundException("Bomb not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$bomb = $this->bombRepository->update($bomb, $input);

		return Response::json(ResponseManager::makeResult($bomb->toArray(), "Bomb updated successfully."));
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
			$this->throwRecordNotFoundException("Bomb not found", ERROR_CODE_RECORD_NOT_FOUND);

		$bomb->delete();

		return Response::json(ResponseManager::makeResult($id, "Bomb deleted successfully."));
	}
}
