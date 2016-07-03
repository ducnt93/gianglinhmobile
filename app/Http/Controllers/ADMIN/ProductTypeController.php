<?php namespace App\Http\Controllers\ADMIN;

use App\Http\Requests;
use App\Http\Requests\CreateProductTypeRequest;
use App\Http\Requests\UpdateProductTypeRequest;
use App\Libraries\Repositories\ProductTypeRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ProductTypeController extends AppBaseController
{

	/** @var  ProductTypeRepository */
	private $productTypeRepository;

	function __construct(ProductTypeRepository $productTypeRepo)
	{
		$this->productTypeRepository = $productTypeRepo;
	}

	/**
	 * Display a listing of the ProductType.
	 *
	 * @return Response
	 */
	public function index()
	{
		$productTypes = $this->productTypeRepository->paginate(10);

		return view('productTypes.index')
			->with('productTypes', $productTypes);
	}

	/**
	 * Show the form for creating a new ProductType.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('productTypes.create');
	}

	/**
	 * Store a newly created ProductType in storage.
	 *
	 * @param CreateProductTypeRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateProductTypeRequest $request)
	{
		$input = $request->all();

		$productType = $this->productTypeRepository->create($input);

		Flash::success('ProductType saved successfully.');

		return redirect(route('productTypes.index'));
	}

	/**
	 * Display the specified ProductType.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$productType = $this->productTypeRepository->find($id);

		if(empty($productType))
		{
			Flash::error('ProductType not found');

			return redirect(route('productTypes.index'));
		}

		return view('productTypes.show')->with('productType', $productType);
	}

	/**
	 * Show the form for editing the specified ProductType.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$productType = $this->productTypeRepository->find($id);

		if(empty($productType))
		{
			Flash::error('ProductType not found');

			return redirect(route('productTypes.index'));
		}

		return view('productTypes.edit')->with('productType', $productType);
	}

	/**
	 * Update the specified ProductType in storage.
	 *
	 * @param  int              $id
	 * @param UpdateProductTypeRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateProductTypeRequest $request)
	{
		$productType = $this->productTypeRepository->find($id);

		if(empty($productType))
		{
			Flash::error('ProductType not found');

			return redirect(route('productTypes.index'));
		}

		$this->productTypeRepository->updateRich($request->all(), $id);

		Flash::success('ProductType updated successfully.');

		return redirect(route('productTypes.index'));
	}

	/**
	 * Remove the specified ProductType from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$productType = $this->productTypeRepository->find($id);

		if(empty($productType))
		{
			Flash::error('ProductType not found');

			return redirect(route('productTypes.index'));
		}

		$this->productTypeRepository->delete($id);

		Flash::success('ProductType deleted successfully.');

		return redirect(route('productTypes.index'));
	}
}
