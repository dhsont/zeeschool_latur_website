<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateNewsRequest;
use App\Libraries\Repositories\NewsRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class NewsController extends AppBaseController
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

		return view('admin.news.index')->with('news', $news);
	}

	/**
	 * Show the form for creating a new News.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.news.create');
	}

	/**
	 * Store a newly created News in storage.
	 *
	 * @param CreateNewsRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateNewsRequest $request)
	{
        //$input = $request->all();

		$input = array_except($request->all(), '_method');
		//$input = $request->all();
		$input['slug '] = str_slug($input['title'], "-");



		$news = $this->newsRepository->store($input);

		$name  = reset($input);
        Flash::success("News $name created successfully");

		return redirect(route('myadmin.news.index'));
	}

	/**
	 * Display the specified News.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$news = $this->newsRepository->findNewsById($id);

		if(empty($news))
		{
			Flash::error('News not found');
			return redirect(route('myadmin.news.index'));
		}

		return view('admin.news.show')->with('news', $news);
	}

	/**
	 * Show the form for editing the specified News.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$news = $this->newsRepository->findNewsById($id);

		if(empty($news))
		{
			Flash::error('News not found');
			return redirect(route('myadmin.news.index'));
		}

		return view('admin.news.edit')->with('news', $news);
	}

	/**
	 * Update the specified News in storage.
	 *
	 * @param  int    $id
	 * @param CreateNewsRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateNewsRequest $request)
	{
		$news = $this->newsRepository->findNewsById($id);

		if(empty($news))
		{
			Flash::error('News not found');
			return redirect(route('myadmin.news.index'));
		}

		$news = $this->newsRepository->update($news, $request->all());

		$input = array_except($request->all(), '_method');
		$name  = reset($input);
        Flash::message("News $name updated successfully");

		return redirect(route('myadmin.news.index'));
	}

	/**
	 * Remove the specified News from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$news = $this->newsRepository->findNewsById($id);

		if(empty($news))
		{
			Flash::error('News not found');
			return redirect(route('myadmin.news.index'));
		}

		$news->delete();

		Flash::message('News deleted successfully.');

		return redirect(route('myadmin.news.index'));
	}




}
