<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Exceptions\AppValidationException;
use Mitul\Generator\Exceptions\RecordNotFoundException;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\page;
use Illuminate\Http\Request;
use App\Libraries\Repositories\pageRepository;
use Response;

class pageAPIController extends AppBaseController
{

	/** @var  pageRepository */
	private $pageRepository;

	function __construct(pageRepository $pageRepo)
	{
		$this->pageRepository = $pageRepo;
	}

	/**
	 * Display a listing of the page.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pages = $this->pageRepository->all();

		return Response::json(ResponseManager::makeResult($pages->toArray(), "pages retrieved successfully."));
	}

	/**
	 * Show the form for creating a new page.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created page in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 * @throws AppValidationException
	 */
	public function store(Request $request)
	{
		if(sizeof(page::$rules) > 0)
            $this->validateRequest($request, page::$rules);

        $input = $request->all();

		$page = $this->pageRepository->store($input);

		return Response::json(ResponseManager::makeResult($page->toArray(), "page saved successfully."));
	}

	/**
	 * Display the specified page.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function show($id)
	{
		$page = $this->pageRepository->findpageById($id);

		if(empty($page))
			throw new RecordNotFoundException("page not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($page->toArray(), "page retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified page.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified page in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function update($id, Request $request)
	{
		$page = $this->pageRepository->findpageById($id);

		if(empty($page))
			throw new RecordNotFoundException("page not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$page = $this->pageRepository->update($page, $input);

		return Response::json(ResponseManager::makeResult($page->toArray(), "page updated successfully."));
	}

	/**
	 * Remove the specified page from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function destroy($id)
	{
		$page = $this->pageRepository->findpageById($id);

		if(empty($page))
			throw new RecordNotFoundException("page not found", ERROR_CODE_RECORD_NOT_FOUND);

		$page->delete();

		return Response::json(ResponseManager::makeResult($id, "page deleted successfully."));
	}

}
