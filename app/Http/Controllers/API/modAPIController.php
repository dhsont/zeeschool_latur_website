<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Exceptions\AppValidationException;
use Mitul\Generator\Exceptions\RecordNotFoundException;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\mod;
use Illuminate\Http\Request;
use App\Libraries\Repositories\modRepository;
use Response;

class modAPIController extends AppBaseController
{

	/** @var  modRepository */
	private $modRepository;

	function __construct(modRepository $modRepo)
	{
		$this->modRepository = $modRepo;
	}

	/**
	 * Display a listing of the mod.
	 *
	 * @return Response
	 */
	public function index()
	{
		$mods = $this->modRepository->all();

		return Response::json(ResponseManager::makeResult($mods->toArray(), "mods retrieved successfully."));
	}

	/**
	 * Show the form for creating a new mod.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created mod in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 * @throws AppValidationException
	 */
	public function store(Request $request)
	{
		if(sizeof(mod::$rules) > 0)
            $this->validateRequest($request, mod::$rules);

        $input = $request->all();

		$mod = $this->modRepository->store($input);

		return Response::json(ResponseManager::makeResult($mod->toArray(), "mod saved successfully."));
	}

	/**
	 * Display the specified mod.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function show($id)
	{
		$mod = $this->modRepository->findmodById($id);

		if(empty($mod))
			throw new RecordNotFoundException("mod not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($mod->toArray(), "mod retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified mod.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified mod in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function update($id, Request $request)
	{
		$mod = $this->modRepository->findmodById($id);

		if(empty($mod))
			throw new RecordNotFoundException("mod not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$mod = $this->modRepository->update($mod, $input);

		return Response::json(ResponseManager::makeResult($mod->toArray(), "mod updated successfully."));
	}

	/**
	 * Remove the specified mod from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function destroy($id)
	{
		$mod = $this->modRepository->findmodById($id);

		if(empty($mod))
			throw new RecordNotFoundException("mod not found", ERROR_CODE_RECORD_NOT_FOUND);

		$mod->delete();

		return Response::json(ResponseManager::makeResult($id, "mod deleted successfully."));
	}

}
