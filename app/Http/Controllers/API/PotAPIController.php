<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\Pot;
use Illuminate\Http\Request;
use App\Libraries\Repositories\PotRepository;
use Response;
use Schema;

class PotAPIController extends AppBaseController
{

	/** @var  PotRepository */
	private $potRepository;

	function __construct(PotRepository $potRepo)
	{
		$this->potRepository = $potRepo;
	}

	/**
	 * Display a listing of the Pot.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->potRepository->search($input);

		$pots = $result[0];

		return Response::json(ResponseManager::makeResult($pots->toArray(), "Pots retrieved successfully."));
	}

	public function search($input)
    {
        $query = Pot::query();

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
	 * Show the form for creating a new Pot.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created Pot in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Pot::$rules) > 0)
            $this->validateRequest($request, Pot::$rules);

        $input = $request->all();

		$pot = $this->potRepository->store($input);

		return Response::json(ResponseManager::makeResult($pot->toArray(), "Pot saved successfully."));
	}

	/**
	 * Display the specified Pot.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$pot = $this->potRepository->findPotById($id);

		if(empty($pot))
			$this->throwRecordNotFoundException("Pot not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($pot->toArray(), "Pot retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified Pot.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified Pot in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$pot = $this->potRepository->findPotById($id);

		if(empty($pot))
			$this->throwRecordNotFoundException("Pot not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$pot = $this->potRepository->update($pot, $input);

		return Response::json(ResponseManager::makeResult($pot->toArray(), "Pot updated successfully."));
	}

	/**
	 * Remove the specified Pot from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$pot = $this->potRepository->findPotById($id);

		if(empty($pot))
			$this->throwRecordNotFoundException("Pot not found", ERROR_CODE_RECORD_NOT_FOUND);

		$pot->delete();

		return Response::json(ResponseManager::makeResult($id, "Pot deleted successfully."));
	}
}
