<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\Pad;
use Illuminate\Http\Request;
use App\Libraries\Repositories\PadRepository;
use Response;
use Schema;

class PadAPIController extends AppBaseController
{

	/** @var  PadRepository */
	private $padRepository;

	function __construct(PadRepository $padRepo)
	{
		$this->padRepository = $padRepo;
	}

	/**
	 * Display a listing of the Pad.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->padRepository->search($input);

		$pads = $result[0];

		return Response::json(ResponseManager::makeResult($pads->toArray(), "Pads retrieved successfully."));
	}

	public function search($input)
    {
        $query = Pad::query();

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
	 * Show the form for creating a new Pad.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created Pad in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Pad::$rules) > 0)
            $this->validateRequest($request, Pad::$rules);

        $input = $request->all();

		$pad = $this->padRepository->store($input);

		return Response::json(ResponseManager::makeResult($pad->toArray(), "Pad saved successfully."));
	}

	/**
	 * Display the specified Pad.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$pad = $this->padRepository->findPadById($id);

		if(empty($pad))
			$this->throwRecordNotFoundException("Pad not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($pad->toArray(), "Pad retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified Pad.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified Pad in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$pad = $this->padRepository->findPadById($id);

		if(empty($pad))
			$this->throwRecordNotFoundException("Pad not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$pad = $this->padRepository->update($pad, $input);

		return Response::json(ResponseManager::makeResult($pad->toArray(), "Pad updated successfully."));
	}

	/**
	 * Remove the specified Pad from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$pad = $this->padRepository->findPadById($id);

		if(empty($pad))
			$this->throwRecordNotFoundException("Pad not found", ERROR_CODE_RECORD_NOT_FOUND);

		$pad->delete();

		return Response::json(ResponseManager::makeResult($id, "Pad deleted successfully."));
	}
}
