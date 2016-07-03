<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ProductTypeRepository;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ProductTypeAPIController extends AppBaseController
{
	/** @var  ProductTypeRepository */
	private $productTypeRepository;

	function __construct(ProductTypeRepository $productTypeRepo)
	{
		$this->productTypeRepository = $productTypeRepo;
	}

	/**
	 * Display a listing of the ProductType.
	 * GET|HEAD /productTypes
	 *
	 * @return Response
	 */
	public function index()
	{
		$productTypes = $this->productTypeRepository->all();

		return $this->sendResponse($productTypes->toArray(), "ProductTypes retrieved successfully");
	}

	/**
	 * Show the form for creating a new ProductType.
	 * GET|HEAD /productTypes/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created ProductType in storage.
	 * POST /productTypes
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(ProductType::$rules) > 0)
			$this->validateRequestOrFail($request, ProductType::$rules);

		$input = $request->all();

		$productTypes = $this->productTypeRepository->create($input);

		return $this->sendResponse($productTypes->toArray(), "ProductType saved successfully");
	}

	/**
	 * Display the specified ProductType.
	 * GET|HEAD /productTypes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$productType = $this->productTypeRepository->apiFindOrFail($id);

		return $this->sendResponse($productType->toArray(), "ProductType retrieved successfully");
	}

	/**
	 * Show the form for editing the specified ProductType.
	 * GET|HEAD /productTypes/{id}/edit
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
	 * Update the specified ProductType in storage.
	 * PUT/PATCH /productTypes/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var ProductType $productType */
		$productType = $this->productTypeRepository->apiFindOrFail($id);

		$result = $this->productTypeRepository->updateRich($input, $id);

		$productType = $productType->fresh();

		return $this->sendResponse($productType->toArray(), "ProductType updated successfully");
	}

	/**
	 * Remove the specified ProductType from storage.
	 * DELETE /productTypes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->productTypeRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "ProductType deleted successfully");
	}
}
