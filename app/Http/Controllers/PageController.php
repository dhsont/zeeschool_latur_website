<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatepageRequest;
use App\Http\Requests\UpdatepageRequest;
use App\Libraries\Repositories\pageRepository;
use App\Models\page;
use Response;
use Flash;

class PageController extends AppBaseController
{

	/** @var  pageRepository */
	private $pageRepository;

	function __construct(pageRepository $pageRepo)
	{
		$this->pageRepository = $pageRepo;
	}


	public function test()
	{
		return 'Hello';
	}

	/**
	 * Display a listing of the page.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pages = $this->pageRepository->all();

		return view('admin.pages.index')->with('pages', $pages);
	}

	/**
	 * Show the form for creating a new page.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.pages.create');
	}

	/**
	 * Store a newly created page in storage.
	 *
	 * @param CreatepageRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatepageRequest $request)
	{
//        $input = $request->all();
//
//		$input->uri = \Str::slug($input->uri);
//
//		dd($input->uri);


		$input = array_except($request->all(), '_method');
		//$input = $request->all();
		$input['uri'] = str_slug($input['uri'], "-");


		$page = $this->pageRepository->store($input);

		$name  = reset($input);
        Flash::success("page $name created successfully");

		return redirect(route('myadmin.pages.index'));
	}

	/**
	 * Display the specified page.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		//$page = $this->pageRepository->findpageById($id);

		$page = page::whereUri($id)->first();

		if(empty($page))
		{
			Flash::error('page not found');
			return redirect('/');
		}

        $leftSidebar = true;
        $rightSidebar = true;

		if ($id == 'annual-function')
        {
            $leftSidebar = false;
            $rightSidebar = false;
        }

		return view('front.page',compact('page','leftSidebar','rightSidebar'));
		//return view('admin.pages.show')->with('page', $page);
	}

	/**
	 * Show the form for editing the specified page.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$page = $this->pageRepository->findpageById($id);

		if(empty($page))
		{
			Flash::error('page not found');
			return redirect(route('myadmin.pages.index'));
		}

		return view('admin.pages.edit')->with('page', $page);
	}

	/**
	 * Update the specified page in storage.
	 *
	 * @param  int    $id
	 * @param UpdatepageRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdatepageRequest $request)
	{
		$page = $this->pageRepository->findpageById($id);

		if(empty($page))
		{
			Flash::error('page not found');
			return redirect(route('myadmin.pages.index'));
		}

		$input = array_except($request->all(), '_method');
		//$input = $request->all();
		$input['uri'] = str_slug($input['uri'], "-");

		$page = $this->pageRepository->update($page, $input);


		$name  = reset($input);
        Flash::message("page $name updated successfully");

		return redirect(route('myadmin.pages.index'));
	}

	/**
	 * Remove the specified page from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$page = $this->pageRepository->findpageById($id);

		if(empty($page))
		{
			Flash::error('page not found');
			return redirect(route('myadmin.pages.index'));
		}

		$page->delete();

		Flash::message('page deleted successfully.');

		return redirect(route('myadmin.pages.index'));
	}




}
