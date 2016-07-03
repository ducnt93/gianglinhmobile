<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\SupplierRepository;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class SupplierAPIController extends AppBaseController
{
	/** @var  SupplierRepository */
	private $supplierRepository;

	function __construct(SupplierRepository $supplierRepo)
	{
		$this->supplierRepository = $supplierRepo;
	}

	/**
	 * Display a listing of the Supplier.
	 * GET|HEAD /suppliers
	 *
	 * @return Response
	 */
	public function index()
	{
		$suppliers = $this->supplierRepository->all();

		return $this->sendResponse($suppliers->toArray(), "Suppliers retrieved successfully");
	}

	/**
	 * Show the form for creating a new Supplier.
	 * GET|HEAD /suppliers/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Supplier in storage.
	 * POST /suppliers
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Supplier::$rules) > 0)
			$this->validateRequestOrFail($request, Supplier::$rules);

		$input = $request->all();

		$suppliers = $this->supplierRepository->create($input);

		return $this->sendResponse($suppliers->toArray(), "Supplier saved successfully");
	}

	/**
	 * Display the specified Supplier.
	 * GET|HEAD /suppliers/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$supplier = $this->supplierRepository->apiFindOrFail($id);

		return $this->sendResponse($supplier->toArray(), "Supplier retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Supplier.
	 * GET|HEAD /suppliers/{id}/edit
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
	 * Update the specified Supplier in storage.
	 * PUT/PATCH /suppliers/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Supplier $supplier */
		$supplier = $this->supplierRepository->apiFindOrFail($id);

		$result = $this->supplierRepository->updateRich($input, $id);

		$supplier = $supplier->fresh();

		return $this->sendResponse($supplier->toArray(), "Supplier updated successfully");
	}

	/**
	 * Remove the specified Supplier from storage.
	 * DELETE /suppliers/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->supplierRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Supplier deleted successfully");
	}
}
