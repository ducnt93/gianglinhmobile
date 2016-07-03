<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\UnitPriceRepository;
use App\Models\UnitPrice;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class UnitPriceAPIController extends AppBaseController
{
	/** @var  UnitPriceRepository */
	private $unitPriceRepository;

	function __construct(UnitPriceRepository $unitPriceRepo)
	{
		$this->unitPriceRepository = $unitPriceRepo;
	}

	/**
	 * Display a listing of the UnitPrice.
	 * GET|HEAD /unitPrices
	 *
	 * @return Response
	 */
	public function index()
	{
		$unitPrices = $this->unitPriceRepository->all();

		return $this->sendResponse($unitPrices->toArray(), "UnitPrices retrieved successfully");
	}

	/**
	 * Show the form for creating a new UnitPrice.
	 * GET|HEAD /unitPrices/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created UnitPrice in storage.
	 * POST /unitPrices
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(UnitPrice::$rules) > 0)
			$this->validateRequestOrFail($request, UnitPrice::$rules);

		$input = $request->all();

		$unitPrices = $this->unitPriceRepository->create($input);

		return $this->sendResponse($unitPrices->toArray(), "UnitPrice saved successfully");
	}

	/**
	 * Display the specified UnitPrice.
	 * GET|HEAD /unitPrices/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$unitPrice = $this->unitPriceRepository->apiFindOrFail($id);

		return $this->sendResponse($unitPrice->toArray(), "UnitPrice retrieved successfully");
	}

	/**
	 * Show the form for editing the specified UnitPrice.
	 * GET|HEAD /unitPrices/{id}/edit
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
	 * Update the specified UnitPrice in storage.
	 * PUT/PATCH /unitPrices/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var UnitPrice $unitPrice */
		$unitPrice = $this->unitPriceRepository->apiFindOrFail($id);

		$result = $this->unitPriceRepository->updateRich($input, $id);

		$unitPrice = $unitPrice->fresh();

		return $this->sendResponse($unitPrice->toArray(), "UnitPrice updated successfully");
	}

	/**
	 * Remove the specified UnitPrice from storage.
	 * DELETE /unitPrices/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->unitPriceRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "UnitPrice deleted successfully");
	}
}
