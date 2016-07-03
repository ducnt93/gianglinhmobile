<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ProductRepository;
use App\Models\Product;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ProductAPIController extends AppBaseController
{
	/** @var  ProductRepository */
	private $productRepository;

	function __construct(ProductRepository $productRepo)
	{
		$this->productRepository = $productRepo;
	}

	/**
	 * Display a listing of the Product.
	 * GET|HEAD /products
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = $this->productRepository->all();

		return $this->sendResponse($products->toArray(), "Products retrieved successfully");
	}

	/**
	 * Show the form for creating a new Product.
	 * GET|HEAD /products/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Product in storage.
	 * POST /products
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Product::$rules) > 0)
			$this->validateRequestOrFail($request, Product::$rules);

		$input = $request->all();

		$products = $this->productRepository->create($input);

		return $this->sendResponse($products->toArray(), "Product saved successfully");
	}

	/**
	 * Display the specified Product.
	 * GET|HEAD /products/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$product = $this->productRepository->apiFindOrFail($id);

		return $this->sendResponse($product->toArray(), "Product retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Product.
	 * GET|HEAD /products/{id}/edit
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
	 * Update the specified Product in storage.
	 * PUT/PATCH /products/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Product $product */
		$product = $this->productRepository->apiFindOrFail($id);

		$result = $this->productRepository->updateRich($input, $id);

		$product = $product->fresh();

		return $this->sendResponse($product->toArray(), "Product updated successfully");
	}

	/**
	 * Remove the specified Product from storage.
	 * DELETE /products/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->productRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Product deleted successfully");
	}
}
