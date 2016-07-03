<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\InfoSupplierTypeRepository;
use App\Models\InfoSupplierType;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class InfoSupplierTypeAPIController extends AppBaseController
{
	/** @var  InfoSupplierTypeRepository */
	private $infoSupplierTypeRepository;

	function __construct(InfoSupplierTypeRepository $infoSupplierTypeRepo)
	{
		$this->infoSupplierTypeRepository = $infoSupplierTypeRepo;
	}

	/**
	 * Display a listing of the InfoSupplierType.
	 * GET|HEAD /infoSupplierTypes
	 *
	 * @return Response
	 */
	public function index()
	{
		$infoSupplierTypes = $this->infoSupplierTypeRepository->all();

		return $this->sendResponse($infoSupplierTypes->toArray(), "InfoSupplierTypes retrieved successfully");
	}

	/**
	 * Show the form for creating a new InfoSupplierType.
	 * GET|HEAD /infoSupplierTypes/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created InfoSupplierType in storage.
	 * POST /infoSupplierTypes
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(InfoSupplierType::$rules) > 0)
			$this->validateRequestOrFail($request, InfoSupplierType::$rules);

		$input = $request->all();

		$infoSupplierTypes = $this->infoSupplierTypeRepository->create($input);

		return $this->sendResponse($infoSupplierTypes->toArray(), "InfoSupplierType saved successfully");
	}

	/**
	 * Display the specified InfoSupplierType.
	 * GET|HEAD /infoSupplierTypes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$infoSupplierType = $this->infoSupplierTypeRepository->apiFindOrFail($id);

		return $this->sendResponse($infoSupplierType->toArray(), "InfoSupplierType retrieved successfully");
	}

	/**
	 * Show the form for editing the specified InfoSupplierType.
	 * GET|HEAD /infoSupplierTypes/{id}/edit
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
	 * Update the specified InfoSupplierType in storage.
	 * PUT/PATCH /infoSupplierTypes/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var InfoSupplierType $infoSupplierType */
		$infoSupplierType = $this->infoSupplierTypeRepository->apiFindOrFail($id);

		$result = $this->infoSupplierTypeRepository->updateRich($input, $id);

		$infoSupplierType = $infoSupplierType->fresh();

		return $this->sendResponse($infoSupplierType->toArray(), "InfoSupplierType updated successfully");
	}

	/**
	 * Remove the specified InfoSupplierType from storage.
	 * DELETE /infoSupplierTypes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->infoSupplierTypeRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "InfoSupplierType deleted successfully");
	}
}
