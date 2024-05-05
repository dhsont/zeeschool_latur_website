<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Exceptions\AppValidationException;
use Mitul\Generator\Exceptions\RecordNotFoundException;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\News;
use Illuminate\Http\Request;
use App\Libraries\Repositories\NewsRepository;
use Response;

class NewsAPIController extends AppBaseController
{

	/** @var  NewsRepository */
	private $newsRepository;

	function __construct(NewsRepository $newsRepo)
	{
		$this->newsRepository = $newsRepo;
	}

	/**
	 * Display a listing of the News.
	 *
	 * @return Response
	 */
	public function index()
	{
		$news = $this->newsRepository->all();

		return Response::json(ResponseManager::makeResult($news->toArray(), "News retrieved successfully."));
	}

	/**
	 * Show the form for creating a new News.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created News in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 * @throws AppValidationException
	 */
	public function store(Request $request)
	{
		if(sizeof(News::$rules) > 0)
            $this->validateRequest($request, News::$rules);

        $input = $request->all();

		$news = $this->newsRepository->store($input);

		return Response::json(ResponseManager::makeResult($news->toArray(), "News saved successfully."));
	}

	/**
	 * Display the specified News.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function show($id)
	{
		$news = $this->newsRepository->findNewsById($id);

		if(empty($news))
			throw new RecordNotFoundException("News not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($news->toArray(), "News retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified News.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified News in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function update($id, Request $request)
	{
		$news = $this->newsRepository->findNewsById($id);

		if(empty($news))
			throw new RecordNotFoundException("News not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$news = $this->newsRepository->update($news, $input);

		return Response::json(ResponseManager::makeResult($news->toArray(), "News updated successfully."));
	}

	/**
	 * Remove the specified News from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function destroy($id)
	{
		$news = $this->newsRepository->findNewsById($id);

		if(empty($news))
			throw new RecordNotFoundException("News not found", ERROR_CODE_RECORD_NOT_FOUND);

		$news->delete();

		return Response::json(ResponseManager::makeResult($id, "News deleted successfully."));
	}

}
