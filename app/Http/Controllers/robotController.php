<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreaterobotRequest;
use App\Models\robot;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class robotController extends AppBaseController
{

	/**
	 * Display a listing of the robot.
	 *
	 * @return Response
	 */
	public function index()
	{
		$robots = robot::all();

		return view('admin.robots.index')->with('robots', $robots);
	}

	/**
	 * Show the form for creating a new robot.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.robots.create');
	}

	/**
	 * Store a newly created robot in storage.
	 *
	 * @param CreaterobotRequest $request
	 *
	 * @return Response
	 */
	public function store(CreaterobotRequest $request)
	{
        $input = $request->all();

		$robot = robot::create($input);

		$name  = reset($input);
        Flash::success("robot $name created successfully.");

		return redirect(route('myadmin.robots.index'));
	}

	/**
	 * Display the specified robot.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$robot = robot::find($id);

		if(empty($robot))
		{
			Flash::error('robot not found');
			return redirect(route('myadmin.robots.index'));
		}

		return view('admin.robots.show')->with('robot', $robot);
	}

	/**
	 * Show the form for editing the specified robot.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$robot = robot::find($id);

		if(empty($robot))
		{
			Flash::error('robot not found');
			return redirect(route('myadmin.robots.index'));
		}

		return view('admin.robots.edit')->with('robot', $robot);
	}

	/**
	 * Update the specified robot in storage.
	 *
	 * @param  int    $id
	 * @param CreaterobotRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreaterobotRequest $request)
	{
		/** @var robot $robot */
		$robot = robot::find($id);

		if(empty($robot))
		{
			Flash::error('robot not found');
			return redirect(route('myadmin.robots.index'));
		}

		$robot->fill($request->all());
		$robot->save();

		$name  = reset($input);
        Flash::message("robot $name updated successfully.");

		return redirect(route('myadmin.robots.index'));
	}

	/**
	 * Remove the specified robot from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var robot $robot */
		$robot = robot::find($id);

		if(empty($robot))
		{
			Flash::error('robot not found');
			return redirect(route('myadmin.robots.index'));
		}

		$robot->delete();

		Flash::message('robot deleted successfully.');

		return redirect(route('myadmin.robots.index'));
	}

}
