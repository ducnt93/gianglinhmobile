<?php namespace App\Http\Controllers\ADMIN;

use App\Http\Requests;
use App\Http\Requests\CreateInfoSupplierRequest;
use App\Http\Requests\UpdateInfoSupplierRequest;
use App\Libraries\Repositories\InfoSupplierRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class InfoSupplierController extends AppBaseController
{

	/** @var  InfoSupplierRepository */
	private $infoSupplierRepository;

	function __construct(InfoSupplierRepository $infoSupplierRepo)
	{
		$this->infoSupplierRepository = $infoSupplierRepo;
	}

	/**
	 * Display a listing of the InfoSupplier.
	 *
	 * @return Response
	 */
	public function index()
	{
		$infoSuppliers = $this->infoSupplierRepository->paginate(10);

		return view('infoSuppliers.index')
			->with('infoSuppliers', $infoSuppliers);
	}

	/**
	 * Show the form for creating a new InfoSupplier.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('infoSuppliers.create');
	}

	/**
	 * Store a newly created InfoSupplier in storage.
	 *
	 * @param CreateInfoSupplierRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateInfoSupplierRequest $request)
	{
		$input = $request->all();

		$infoSupplier = $this->infoSupplierRepository->create($input);

		Flash::success('InfoSupplier saved successfully.');

		return redirect(route('infoSuppliers.index'));
	}

	/**
	 * Display the specified InfoSupplier.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$infoSupplier = $this->infoSupplierRepository->find($id);

		if(empty($infoSupplier))
		{
			Flash::error('InfoSupplier not found');

			return redirect(route('infoSuppliers.index'));
		}

		return view('infoSuppliers.show')->with('infoSupplier', $infoSupplier);
	}

	/**
	 * Show the form for editing the specified InfoSupplier.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$infoSupplier = $this->infoSupplierRepository->find($id);

		if(empty($infoSupplier))
		{
			Flash::error('InfoSupplier not found');

			return redirect(route('infoSuppliers.index'));
		}

		return view('infoSuppliers.edit')->with('infoSupplier', $infoSupplier);
	}

	/**
	 * Update the specified InfoSupplier in storage.
	 *
	 * @param  int              $id
	 * @param UpdateInfoSupplierRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateInfoSupplierRequest $request)
	{
		$infoSupplier = $this->infoSupplierRepository->find($id);

		if(empty($infoSupplier))
		{
			Flash::error('InfoSupplier not found');

			return redirect(route('infoSuppliers.index'));
		}

		$this->infoSupplierRepository->updateRich($request->all(), $id);

		Flash::success('InfoSupplier updated successfully.');

		return redirect(route('infoSuppliers.index'));
	}

	/**
	 * Remove the specified InfoSupplier from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$infoSupplier = $this->infoSupplierRepository->find($id);

		if(empty($infoSupplier))
		{
			Flash::error('InfoSupplier not found');

			return redirect(route('infoSuppliers.index'));
		}

		$this->infoSupplierRepository->delete($id);

		Flash::success('InfoSupplier deleted successfully.');

		return redirect(route('infoSuppliers.index'));
	}
}
