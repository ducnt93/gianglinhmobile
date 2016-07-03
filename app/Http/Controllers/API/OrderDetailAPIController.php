<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\OrderDetailRepository;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class OrderDetailAPIController extends AppBaseController
{
	/** @var  OrderDetailRepository */
	private $orderDetailRepository;

	function __construct(OrderDetailRepository $orderDetailRepo)
	{
		$this->orderDetailRepository = $orderDetailRepo;
	}

	/**
	 * Display a listing of the OrderDetail.
	 * GET|HEAD /orderDetails
	 *
	 * @return Response
	 */
	public function index()
	{
		$orderDetails = $this->orderDetailRepository->all();

		return $this->sendResponse($orderDetails->toArray(), "OrderDetails retrieved successfully");
	}

	/**
	 * Show the form for creating a new OrderDetail.
	 * GET|HEAD /orderDetails/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created OrderDetail in storage.
	 * POST /orderDetails
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(OrderDetail::$rules) > 0)
			$this->validateRequestOrFail($request, OrderDetail::$rules);

		$input = $request->all();

		$orderDetails = $this->orderDetailRepository->create($input);

		return $this->sendResponse($orderDetails->toArray(), "OrderDetail saved successfully");
	}

	/**
	 * Display the specified OrderDetail.
	 * GET|HEAD /orderDetails/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$orderDetail = $this->orderDetailRepository->apiFindOrFail($id);

		return $this->sendResponse($orderDetail->toArray(), "OrderDetail retrieved successfully");
	}

	/**
	 * Show the form for editing the specified OrderDetail.
	 * GET|HEAD /orderDetails/{id}/edit
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
	 * Update the specified OrderDetail in storage.
	 * PUT/PATCH /orderDetails/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var OrderDetail $orderDetail */
		$orderDetail = $this->orderDetailRepository->apiFindOrFail($id);

		$result = $this->orderDetailRepository->updateRich($input, $id);

		$orderDetail = $orderDetail->fresh();

		return $this->sendResponse($orderDetail->toArray(), "OrderDetail updated successfully");
	}

	/**
	 * Remove the specified OrderDetail from storage.
	 * DELETE /orderDetails/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->orderDetailRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "OrderDetail deleted successfully");
	}
}
