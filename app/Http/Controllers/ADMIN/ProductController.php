<?php namespace App\Http\Controllers\ADMIN;

use App\Http\Requests;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Libraries\Repositories\ProductRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ProductController extends AppBaseController
{

	/** @var  ProductRepository */
	private $productRepository;

	function __construct(ProductRepository $productRepo)
	{
		$this->productRepository = $productRepo;
	}

	/**
	 * Display a listing of the Product.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = $this->productRepository->paginate(10);

		return view('products.index')
			->with('products', $products);
	}

	/**
	 * Show the form for creating a new Product.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('products.create');
	}

	/**
	 * Store a newly created Product in storage.
	 *
	 * @param CreateProductRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateProductRequest $request)
	{
		$input = $request->all();

		$product = $this->productRepository->create($input);

		Flash::success('Product saved successfully.');

		return redirect(route('products.index'));
	}

	/**
	 * Display the specified Product.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$product = $this->productRepository->find($id);

		if(empty($product))
		{
			Flash::error('Product not found');

			return redirect(route('products.index'));
		}

		return view('products.show')->with('product', $product);
	}

	/**
	 * Show the form for editing the specified Product.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$product = $this->productRepository->find($id);

		if(empty($product))
		{
			Flash::error('Product not found');

			return redirect(route('products.index'));
		}

		return view('products.edit')->with('product', $product);
	}

	/**
	 * Update the specified Product in storage.
	 *
	 * @param  int              $id
	 * @param UpdateProductRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateProductRequest $request)
	{
		$product = $this->productRepository->find($id);

		if(empty($product))
		{
			Flash::error('Product not found');

			return redirect(route('products.index'));
		}

		$this->productRepository->updateRich($request->all(), $id);

		Flash::success('Product updated successfully.');

		return redirect(route('products.index'));
	}

	/**
	 * Remove the specified Product from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$product = $this->productRepository->find($id);

		if(empty($product))
		{
			Flash::error('Product not found');

			return redirect(route('products.index'));
		}

		$this->productRepository->delete($id);

		Flash::success('Product deleted successfully.');

		return redirect(route('products.index'));
	}
}
