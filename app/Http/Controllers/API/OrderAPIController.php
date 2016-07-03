<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\OrderRepository;
use App\Models\Order;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class OrderAPIController extends AppBaseController
{
	/** @var  OrderRepository */
	private $orderRepository;

	function __construct(OrderRepository $orderRepo)
	{
		$this->orderRepository = $orderRepo;
	}

	/**
	 * Display a listing of the Order.
	 * GET|HEAD /orders
	 *
	 * @return Response
	 */
	public function index()
	{
		$orders = $this->orderRepository->all();

		return $this->sendResponse($orders->toArray(), "Orders retrieved successfully");
	}

	/**
	 * Show the form for creating a new Order.
	 * GET|HEAD /orders/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Order in storage.
	 * POST /orders
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Order::$rules) > 0)
			$this->validateRequestOrFail($request, Order::$rules);

		$input = $request->all();

		$orders = $this->orderRepository->create($input);

		return $this->sendResponse($orders->toArray(), "Order saved successfully");
	}

	/**
	 * Display the specified Order.
	 * GET|HEAD /orders/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$order = $this->orderRepository->apiFindOrFail($id);

		return $this->sendResponse($order->toArray(), "Order retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Order.
	 * GET|HEAD /orders/{id}/edit
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
	 * Update the specified Order in storage.
	 * PUT/PATCH /orders/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Order $order */
		$order = $this->orderRepository->apiFindOrFail($id);

		$result = $this->orderRepository->updateRich($input, $id);

		$order = $order->fresh();

		return $this->sendResponse($order->toArray(), "Order updated successfully");
	}

	/**
	 * Remove the specified Order from storage.
	 * DELETE /orders/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->orderRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Order deleted successfully");
	}
}
