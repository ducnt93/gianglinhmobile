<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\AccessoryRepository;
use App\Models\Accessory;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class AccessoryAPIController extends AppBaseController
{
	/** @var  AccessoryRepository */
	private $accessoryRepository;

	function __construct(AccessoryRepository $accessoryRepo)
	{
		$this->accessoryRepository = $accessoryRepo;
	}

	/**
	 * Display a listing of the Accessory.
	 * GET|HEAD /accessories
	 *
	 * @return Response
	 */
	public function index()
	{
		$accessories = $this->accessoryRepository->all();

		return $this->sendResponse($accessories->toArray(), "Accessories retrieved successfully");
	}

	/**
	 * Show the form for creating a new Accessory.
	 * GET|HEAD /accessories/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Accessory in storage.
	 * POST /accessories
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Accessory::$rules) > 0)
			$this->validateRequestOrFail($request, Accessory::$rules);

		$input = $request->all();

		$accessories = $this->accessoryRepository->create($input);

		return $this->sendResponse($accessories->toArray(), "Accessory saved successfully");
	}

	/**
	 * Display the specified Accessory.
	 * GET|HEAD /accessories/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$accessory = $this->accessoryRepository->apiFindOrFail($id);

		return $this->sendResponse($accessory->toArray(), "Accessory retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Accessory.
	 * GET|HEAD /accessories/{id}/edit
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
	 * Update the specified Accessory in storage.
	 * PUT/PATCH /accessories/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Accessory $accessory */
		$accessory = $this->accessoryRepository->apiFindOrFail($id);

		$result = $this->accessoryRepository->updateRich($input, $id);

		$accessory = $accessory->fresh();

		return $this->sendResponse($accessory->toArray(), "Accessory updated successfully");
	}

	/**
	 * Remove the specified Accessory from storage.
	 * DELETE /accessories/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->accessoryRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Accessory deleted successfully");
	}
}
