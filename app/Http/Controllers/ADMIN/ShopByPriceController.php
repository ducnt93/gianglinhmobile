<?php namespace App\Http\Controllers\ADMIN;

use App\Http\Requests;
use App\Http\Requests\CreateShopByPriceRequest;
use App\Http\Requests\UpdateShopByPriceRequest;
use App\Libraries\Repositories\ShopByPriceRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ShopByPriceController extends AppBaseController
{

	/** @var  ShopByPriceRepository */
	private $shopByPriceRepository;

	function __construct(ShopByPriceRepository $shopByPriceRepo)
	{
		$this->shopByPriceRepository = $shopByPriceRepo;
	}

	/**
	 * Display a listing of the ShopByPrice.
	 *
	 * @return Response
	 */
	public function index()
	{
		$shopByPrices = $this->shopByPriceRepository->paginate(10);

		return view('shopByPrices.index')
			->with('shopByPrices', $shopByPrices);
	}

	/**
	 * Show the form for creating a new ShopByPrice.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('shopByPrices.create');
	}

	/**
	 * Store a newly created ShopByPrice in storage.
	 *
	 * @param CreateShopByPriceRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateShopByPriceRequest $request)
	{
		$input = $request->all();

		$shopByPrice = $this->shopByPriceRepository->create($input);

		Flash::success('ShopByPrice saved successfully.');

		return redirect(route('shopByPrices.index'));
	}

	/**
	 * Display the specified ShopByPrice.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$shopByPrice = $this->shopByPriceRepository->find($id);

		if(empty($shopByPrice))
		{
			Flash::error('ShopByPrice not found');

			return redirect(route('shopByPrices.index'));
		}

		return view('shopByPrices.show')->with('shopByPrice', $shopByPrice);
	}

	/**
	 * Show the form for editing the specified ShopByPrice.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$shopByPrice = $this->shopByPriceRepository->find($id);

		if(empty($shopByPrice))
		{
			Flash::error('ShopByPrice not found');

			return redirect(route('shopByPrices.index'));
		}

		return view('shopByPrices.edit')->with('shopByPrice', $shopByPrice);
	}

	/**
	 * Update the specified ShopByPrice in storage.
	 *
	 * @param  int              $id
	 * @param UpdateShopByPriceRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateShopByPriceRequest $request)
	{
		$shopByPrice = $this->shopByPriceRepository->find($id);

		if(empty($shopByPrice))
		{
			Flash::error('ShopByPrice not found');

			return redirect(route('shopByPrices.index'));
		}

		$this->shopByPriceRepository->updateRich($request->all(), $id);

		Flash::success('ShopByPrice updated successfully.');

		return redirect(route('shopByPrices.index'));
	}

	/**
	 * Remove the specified ShopByPrice from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$shopByPrice = $this->shopByPriceRepository->find($id);

		if(empty($shopByPrice))
		{
			Flash::error('ShopByPrice not found');

			return redirect(route('shopByPrices.index'));
		}

		$this->shopByPriceRepository->delete($id);

		Flash::success('ShopByPrice deleted successfully.');

		return redirect(route('shopByPrices.index'));
	}
}
