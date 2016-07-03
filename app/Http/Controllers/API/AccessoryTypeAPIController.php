<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\AccessoryTypeRepository;
use App\Models\AccessoryType;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class AccessoryTypeAPIController extends AppBaseController
{
	/** @var  AccessoryTypeRepository */
	private $accessoryTypeRepository;

	function __construct(AccessoryTypeRepository $accessoryTypeRepo)
	{
		$this->accessoryTypeRepository = $accessoryTypeRepo;
	}

	/**
	 * Display a listing of the AccessoryType.
	 * GET|HEAD /accessoryTypes
	 *
	 * @return Response
	 */
	public function index()
	{
		$accessoryTypes = $this->accessoryTypeRepository->all();

		return $this->sendResponse($accessoryTypes->toArray(), "AccessoryTypes retrieved successfully");
	}

	/**
	 * Show the form for creating a new AccessoryType.
	 * GET|HEAD /accessoryTypes/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created AccessoryType in storage.
	 * POST /accessoryTypes
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(AccessoryType::$rules) > 0)
			$this->validateRequestOrFail($request, AccessoryType::$rules);

		$input = $request->all();

		$accessoryTypes = $this->accessoryTypeRepository->create($input);

		return $this->sendResponse($accessoryTypes->toArray(), "AccessoryType saved successfully");
	}

	/**
	 * Display the specified AccessoryType.
	 * GET|HEAD /accessoryTypes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$accessoryType = $this->accessoryTypeRepository->apiFindOrFail($id);

		return $this->sendResponse($accessoryType->toArray(), "AccessoryType retrieved successfully");
	}

	/**
	 * Show the form for editing the specified AccessoryType.
	 * GET|HEAD /accessoryTypes/{id}/edit
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		// maybe, you can return a template for JS
//		Errors::throwHttpExceptionWithCode(Errors::EDITION_FORM_NOT_EXISTS, ['id' => $id], static::getHATEOAS(['%id' => $id]));
	}

	/**
	 * Update the specified AccessoryType in storage.
	 * PUT/PATCH /accessoryTypes/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var AccessoryType $accessoryType */
		$accessoryType = $this->accessoryTypeRepository->apiFindOrFail($id);

		$result = $this->accessoryTypeRepository->updateRich($input, $id);

		$accessoryType = $accessoryType->fresh();

		return $this->sendResponse($accessoryType->toArray(), "AccessoryType updated successfully");
	}

	/**
	 * Remove the specified AccessoryType from storage.
	 * DELETE /accessoryTypes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->accessoryTypeRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "AccessoryType deleted successfully");
	}
}
