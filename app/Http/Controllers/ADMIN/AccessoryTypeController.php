<?php namespace App\Http\Controllers\ADMIN;

use App\Http\Requests;
use App\Http\Requests\CreateAccessoryTypeRequest;
use App\Http\Requests\UpdateAccessoryTypeRequest;
use App\Libraries\Repositories\AccessoryTypeRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class AccessoryTypeController extends AppBaseController
{

	/** @var  AccessoryTypeRepository */
	private $accessoryTypeRepository;

	function __construct(AccessoryTypeRepository $accessoryTypeRepo)
	{
		$this->accessoryTypeRepository = $accessoryTypeRepo;
	}

	/**
	 * Display a listing of the AccessoryType.
	 *
	 * @return Response
	 */
	public function index()
	{
		$accessoryTypes = $this->accessoryTypeRepository->paginate(10);

		return view('accessoryTypes.index')
			->with('accessoryTypes', $accessoryTypes);
	}

	/**
	 * Show the form for creating a new AccessoryType.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('accessoryTypes.create');
	}

	/**
	 * Store a newly created AccessoryType in storage.
	 *
	 * @param CreateAccessoryTypeRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateAccessoryTypeRequest $request)
	{
		$input = $request->all();

		$accessoryType = $this->accessoryTypeRepository->create($input);

		Flash::success('AccessoryType saved successfully.');

		return redirect(route('accessoryTypes.index'));
	}

	/**
	 * Display the specified AccessoryType.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$accessoryType = $this->accessoryTypeRepository->find($id);

		if(empty($accessoryType))
		{
			Flash::error('AccessoryType not found');

			return redirect(route('accessoryTypes.index'));
		}

		return view('accessoryTypes.show')->with('accessoryType', $accessoryType);
	}

	/**
	 * Show the form for editing the specified AccessoryType.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$accessoryType = $this->accessoryTypeRepository->find($id);

		if(empty($accessoryType))
		{
			Flash::error('AccessoryType not found');

			return redirect(route('accessoryTypes.index'));
		}

		return view('accessoryTypes.edit')->with('accessoryType', $accessoryType);
	}

	/**
	 * Update the specified AccessoryType in storage.
	 *
	 * @param  int              $id
	 * @param UpdateAccessoryTypeRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateAccessoryTypeRequest $request)
	{
		$accessoryType = $this->accessoryTypeRepository->find($id);

		if(empty($accessoryType))
		{
			Flash::error('AccessoryType not found');

			return redirect(route('accessoryTypes.index'));
		}

		$this->accessoryTypeRepository->updateRich($request->all(), $id);

		Flash::success('AccessoryType updated successfully.');

		return redirect(route('accessoryTypes.index'));
	}

	/**
	 * Remove the specified AccessoryType from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$accessoryType = $this->accessoryTypeRepository->find($id);

		if(empty($accessoryType))
		{
			Flash::error('AccessoryType not found');

			return redirect(route('accessoryTypes.index'));
		}

		$this->accessoryTypeRepository->delete($id);

		Flash::success('AccessoryType deleted successfully.');

		return redirect(route('accessoryTypes.index'));
	}
}
