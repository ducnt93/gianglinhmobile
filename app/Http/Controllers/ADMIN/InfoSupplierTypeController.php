<?php namespace App\Http\Controllers\ADMIN;

use App\Http\Requests;
use App\Http\Requests\CreateInfoSupplierTypeRequest;
use App\Http\Requests\UpdateInfoSupplierTypeRequest;
use App\Libraries\Repositories\InfoSupplierTypeRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class InfoSupplierTypeController extends AppBaseController
{

	/** @var  InfoSupplierTypeRepository */
	private $infoSupplierTypeRepository;

	function __construct(InfoSupplierTypeRepository $infoSupplierTypeRepo)
	{
		$this->infoSupplierTypeRepository = $infoSupplierTypeRepo;
	}

	/**
	 * Display a listing of the InfoSupplierType.
	 *
	 * @return Response
	 */
	public function index()
	{
		$infoSupplierTypes = $this->infoSupplierTypeRepository->paginate(10);

		return view('infoSupplierTypes.index')
			->with('infoSupplierTypes', $infoSupplierTypes);
	}

	/**
	 * Show the form for creating a new InfoSupplierType.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('infoSupplierTypes.create');
	}

	/**
	 * Store a newly created InfoSupplierType in storage.
	 *
	 * @param CreateInfoSupplierTypeRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateInfoSupplierTypeRequest $request)
	{
		$input = $request->all();

		$infoSupplierType = $this->infoSupplierTypeRepository->create($input);

		Flash::success('InfoSupplierType saved successfully.');

		return redirect(route('infoSupplierTypes.index'));
	}

	/**
	 * Display the specified InfoSupplierType.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$infoSupplierType = $this->infoSupplierTypeRepository->find($id);

		if(empty($infoSupplierType))
		{
			Flash::error('InfoSupplierType not found');

			return redirect(route('infoSupplierTypes.index'));
		}

		return view('infoSupplierTypes.show')->with('infoSupplierType', $infoSupplierType);
	}

	/**
	 * Show the form for editing the specified InfoSupplierType.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$infoSupplierType = $this->infoSupplierTypeRepository->find($id);

		if(empty($infoSupplierType))
		{
			Flash::error('InfoSupplierType not found');

			return redirect(route('infoSupplierTypes.index'));
		}

		return view('infoSupplierTypes.edit')->with('infoSupplierType', $infoSupplierType);
	}

	/**
	 * Update the specified InfoSupplierType in storage.
	 *
	 * @param  int              $id
	 * @param UpdateInfoSupplierTypeRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateInfoSupplierTypeRequest $request)
	{
		$infoSupplierType = $this->infoSupplierTypeRepository->find($id);

		if(empty($infoSupplierType))
		{
			Flash::error('InfoSupplierType not found');

			return redirect(route('infoSupplierTypes.index'));
		}

		$this->infoSupplierTypeRepository->updateRich($request->all(), $id);

		Flash::success('InfoSupplierType updated successfully.');

		return redirect(route('infoSupplierTypes.index'));
	}

	/**
	 * Remove the specified InfoSupplierType from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$infoSupplierType = $this->infoSupplierTypeRepository->find($id);

		if(empty($infoSupplierType))
		{
			Flash::error('InfoSupplierType not found');

			return redirect(route('infoSupplierTypes.index'));
		}

		$this->infoSupplierTypeRepository->delete($id);

		Flash::success('InfoSupplierType deleted successfully.');

		return redirect(route('infoSupplierTypes.index'));
	}
}
