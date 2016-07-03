<?php namespace App\Http\Controllers\ADMIN;

use App\Http\Requests;
use App\Http\Requests\CreateFQAsRequest;
use App\Http\Requests\UpdateFQAsRequest;
use App\Libraries\Repositories\FQAsRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class FQAsController extends AppBaseController
{

	/** @var  FQAsRepository */
	private $fQAsRepository;

	function __construct(FQAsRepository $fQAsRepo)
	{
		$this->fQAsRepository = $fQAsRepo;
	}

	/**
	 * Display a listing of the FQAs.
	 *
	 * @return Response
	 */
	public function index()
	{
		$fQAs = $this->fQAsRepository->paginate(10);

		return view('fQAs.index')
			->with('fQAs', $fQAs);
	}

	/**
	 * Show the form for creating a new FQAs.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('fQAs.create');
	}

	/**
	 * Store a newly created FQAs in storage.
	 *
	 * @param CreateFQAsRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateFQAsRequest $request)
	{
		$input = $request->all();

		$fQAs = $this->fQAsRepository->create($input);

		Flash::success('FQAs saved successfully.');

		return redirect(route('fQAs.index'));
	}

	/**
	 * Display the specified FQAs.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$fQAs = $this->fQAsRepository->find($id);

		if(empty($fQAs))
		{
			Flash::error('FQAs not found');

			return redirect(route('fQAs.index'));
		}

		return view('fQAs.show')->with('fQAs', $fQAs);
	}

	/**
	 * Show the form for editing the specified FQAs.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$fQAs = $this->fQAsRepository->find($id);

		if(empty($fQAs))
		{
			Flash::error('FQAs not found');

			return redirect(route('fQAs.index'));
		}

		return view('fQAs.edit')->with('fQAs', $fQAs);
	}

	/**
	 * Update the specified FQAs in storage.
	 *
	 * @param  int              $id
	 * @param UpdateFQAsRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateFQAsRequest $request)
	{
		$fQAs = $this->fQAsRepository->find($id);

		if(empty($fQAs))
		{
			Flash::error('FQAs not found');

			return redirect(route('fQAs.index'));
		}

		$this->fQAsRepository->updateRich($request->all(), $id);

		Flash::success('FQAs updated successfully.');

		return redirect(route('fQAs.index'));
	}

	/**
	 * Remove the specified FQAs from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$fQAs = $this->fQAsRepository->find($id);

		if(empty($fQAs))
		{
			Flash::error('FQAs not found');

			return redirect(route('fQAs.index'));
		}

		$this->fQAsRepository->delete($id);

		Flash::success('FQAs deleted successfully.');

		return redirect(route('fQAs.index'));
	}
}
