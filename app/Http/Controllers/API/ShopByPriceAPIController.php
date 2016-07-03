<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ShopByPriceRepository;
use App\Models\ShopByPrice;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ShopByPriceAPIController extends AppBaseController
{
	/** @var  ShopByPriceRepository */
	private $shopByPriceRepository;

	function __construct(ShopByPriceRepository $shopByPriceRepo)
	{
		$this->shopByPriceRepository = $shopByPriceRepo;
	}

	/**
	 * Display a listing of the ShopByPrice.
	 * GET|HEAD /shopByPrices
	 *
	 * @return Response
	 */
	public function index()
	{
		$shopByPrices = $this->shopByPriceRepository->all();

		return $this->sendResponse($shopByPrices->toArray(), "ShopByPrices retrieved successfully");
	}

	/**
	 * Show the form for creating a new ShopByPrice.
	 * GET|HEAD /shopByPrices/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created ShopByPrice in storage.
	 * POST /shopByPrices
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(ShopByPrice::$rules) > 0)
			$this->validateRequestOrFail($request, ShopByPrice::$rules);

		$input = $request->all();

		$shopByPrices = $this->shopByPriceRepository->create($input);

		return $this->sendResponse($shopByPrices->toArray(), "ShopByPrice saved successfully");
	}

	/**
	 * Display the specified ShopByPrice.
	 * GET|HEAD /shopByPrices/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$shopByPrice = $this->shopByPriceRepository->apiFindOrFail($id);

		return $this->sendResponse($shopByPrice->toArray(), "ShopByPrice retrieved successfully");
	}

	/**
	 * Show the form for editing the specified ShopByPrice.
	 * GET|HEAD /shopByPrices/{id}/edit
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
	 * Update the specified ShopByPrice in storage.
	 * PUT/PATCH /shopByPrices/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var ShopByPrice $shopByPrice */
		$shopByPrice = $this->shopByPriceRepository->apiFindOrFail($id);

		$result = $this->shopByPriceRepository->updateRich($input, $id);

		$shopByPrice = $shopByPrice->fresh();

		return $this->sendResponse($shopByPrice->toArray(), "ShopByPrice updated successfully");
	}

	/**
	 * Remove the specified ShopByPrice from storage.
	 * DELETE /shopByPrices/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->shopByPriceRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "ShopByPrice deleted successfully");
	}
}
