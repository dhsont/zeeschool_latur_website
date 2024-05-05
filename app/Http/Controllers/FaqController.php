<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateFaqRequest;
use App\Libraries\Repositories\FaqRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class FaqController extends AppBaseController
{

	/** @var  FaqRepository */
	private $faqRepository;

	function __construct(FaqRepository $faqRepo)
	{
		$this->faqRepository = $faqRepo;
	}

	/**
	 * Display a listing of the Faq.
	 *
	 * @return Response
	 */
	public function index()
	{
		$faqs = $this->faqRepository->all();

		return view('admin.faqs.index')->with('faqs', $faqs);
	}

	/**
	 * Show the form for creating a new Faq.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.faqs.create');
	}

	/**
	 * Store a newly created Faq in storage.
	 *
	 * @param CreateFaqRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateFaqRequest $request)
	{
        $input = $request->all();

		$faq = $this->faqRepository->store($input);

		$name  = reset($input);
        Flash::success("Faq $name created successfully");

		return redirect(route('myadmin.faqs.index'));
	}

	/**
	 * Display the specified Faq.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$faq = $this->faqRepository->findFaqById($id);

		if(empty($faq))
		{
			Flash::error('Faq not found');
			return redirect(route('myadmin.faqs.index'));
		}

		return view('admin.faqs.show')->with('faq', $faq);
	}

	/**
	 * Show the form for editing the specified Faq.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$faq = $this->faqRepository->findFaqById($id);

		if(empty($faq))
		{
			Flash::error('Faq not found');
			return redirect(route('myadmin.faqs.index'));
		}

		return view('admin.faqs.edit')->with('faq', $faq);
	}

	/**
	 * Update the specified Faq in storage.
	 *
	 * @param  int    $id
	 * @param CreateFaqRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateFaqRequest $request)
	{
		$faq = $this->faqRepository->findFaqById($id);

		if(empty($faq))
		{
			Flash::error('Faq not found');
			return redirect(route('myadmin.faqs.index'));
		}

		$faq = $this->faqRepository->update($faq, $request->all());

		$input = array_except($request->all(), '_method');
		$name  = reset($input);
        Flash::message("Faq $name updated successfully");

		return redirect(route('myadmin.faqs.index'));
	}

	/**
	 * Remove the specified Faq from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$faq = $this->faqRepository->findFaqById($id);

		if(empty($faq))
		{
			Flash::error('Faq not found');
			return redirect(route('myadmin.faqs.index'));
		}

		$faq->delete();

		Flash::message('Faq deleted successfully.');

		return redirect(route('myadmin.faqs.index'));
	}




}
