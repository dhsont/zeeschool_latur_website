<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\ppp;
use Illuminate\Http\Request;
use App\Libraries\Repositories\pppRepository;
use Response;

class pppAPIController extends AppBaseController
{

	/** @var  pppRepository */
	private $pppRepository;

	function __construct(pppRepository $pppRepo)
	{
		$this->pppRepository = $pppRepo;
	}

	/**
	 * Display a listing of the ppp.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ppps = $this->pppRepository->all();

		return Response::json(ResponseManager::makeResult($ppps->toArray(), "ppps retrieved successfully."));
	}

	/**
	 * Show the form for creating a new ppp.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created ppp in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(ppp::$rules) > 0)
            $this->validateRequest($request, ppp::$rules);

        $input = $request->all();

		$ppp = $this->pppRepository->store($input);

		return Response::json(ResponseManager::makeResult($ppp->toArray(), "ppp saved successfully."));
	}

	/**
	 * Display the specified ppp.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$ppp = $this->pppRepository->findpppById($id);

		if(empty($ppp))
			$this->throwRecordNotFoundException("ppp not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($ppp->toArray(), "ppp retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified ppp.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified ppp in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$ppp = $this->pppRepository->findpppById($id);

		if(empty($ppp))
			$this->throwRecordNotFoundException("ppp not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$ppp = $this->pppRepository->update($ppp, $input);

		return Response::json(ResponseManager::makeResult($ppp->toArray(), "ppp updated successfully."));
	}

	/**
	 * Remove the specified ppp from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$ppp = $this->pppRepository->findpppById($id);

		if(empty($ppp))
			$this->throwRecordNotFoundException("ppp not found", ERROR_CODE_RECORD_NOT_FOUND);

		$ppp->delete();

		return Response::json(ResponseManager::makeResult($id, "ppp deleted successfully."));
	}

}
