<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\InfoSupplierRepository;
use App\Models\InfoSupplier;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class InfoSupplierAPIController extends AppBaseController
{
	/** @var  InfoSupplierRepository */
	private $infoSupplierRepository;

	function __construct(InfoSupplierRepository $infoSupplierRepo)
	{
		$this->infoSupplierRepository = $infoSupplierRepo;
	}

	/**
	 * Display a listing of the InfoSupplier.
	 * GET|HEAD /infoSuppliers
	 *
	 * @return Response
	 */
	public function index()
	{
		$infoSuppliers = $this->infoSupplierRepository->all();

		return $this->sendResponse($infoSuppliers->toArray(), "InfoSuppliers retrieved successfully");
	}

	/**
	 * Show the form for creating a new InfoSupplier.
	 * GET|HEAD /infoSuppliers/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created InfoSupplier in storage.
	 * POST /infoSuppliers
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(InfoSupplier::$rules) > 0)
			$this->validateRequestOrFail($request, InfoSupplier::$rules);

		$input = $request->all();

		$infoSuppliers = $this->infoSupplierRepository->create($input);

		return $this->sendResponse($infoSuppliers->toArray(), "InfoSupplier saved successfully");
	}

	/**
	 * Display the specified InfoSupplier.
	 * GET|HEAD /infoSuppliers/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$infoSupplier = $this->infoSupplierRepository->apiFindOrFail($id);

		return $this->sendResponse($infoSupplier->toArray(), "InfoSupplier retrieved successfully");
	}

	/**
	 * Show the form for editing the specified InfoSupplier.
	 * GET|HEAD /infoSuppliers/{id}/edit
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
	 * Update the specified InfoSupplier in storage.
	 * PUT/PATCH /infoSuppliers/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var InfoSupplier $infoSupplier */
		$infoSupplier = $this->infoSupplierRepository->apiFindOrFail($id);

		$result = $this->infoSupplierRepository->updateRich($input, $id);

		$infoSupplier = $infoSupplier->fresh();

		return $this->sendResponse($infoSupplier->toArray(), "InfoSupplier updated successfully");
	}

	/**
	 * Remove the specified InfoSupplier from storage.
	 * DELETE /infoSuppliers/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->infoSupplierRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "InfoSupplier deleted successfully");
	}
}
