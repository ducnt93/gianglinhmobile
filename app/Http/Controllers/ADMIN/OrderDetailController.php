<?php namespace App\Http\Controllers\ADMIN;

use App\Http\Requests;
use App\Http\Requests\CreateOrderDetailRequest;
use App\Http\Requests\UpdateOrderDetailRequest;
use App\Libraries\Repositories\OrderDetailRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class OrderDetailController extends AppBaseController
{

	/** @var  OrderDetailRepository */
	private $orderDetailRepository;

	function __construct(OrderDetailRepository $orderDetailRepo)
	{
		$this->orderDetailRepository = $orderDetailRepo;
	}

	/**
	 * Display a listing of the OrderDetail.
	 *
	 * @return Response
	 */
	public function index()
	{
		$orderDetails = $this->orderDetailRepository->paginate(10);

		return view('orderDetails.index')
			->with('orderDetails', $orderDetails);
	}

	/**
	 * Show the form for creating a new OrderDetail.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('orderDetails.create');
	}

	/**
	 * Store a newly created OrderDetail in storage.
	 *
	 * @param CreateOrderDetailRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateOrderDetailRequest $request)
	{
		$input = $request->all();

		$orderDetail = $this->orderDetailRepository->create($input);

		Flash::success('OrderDetail saved successfully.');

		return redirect(route('orderDetails.index'));
	}

	/**
	 * Display the specified OrderDetail.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$orderDetail = $this->orderDetailRepository->find($id);

		if(empty($orderDetail))
		{
			Flash::error('OrderDetail not found');

			return redirect(route('orderDetails.index'));
		}

		return view('orderDetails.show')->with('orderDetail', $orderDetail);
	}

	/**
	 * Show the form for editing the specified OrderDetail.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$orderDetail = $this->orderDetailRepository->find($id);

		if(empty($orderDetail))
		{
			Flash::error('OrderDetail not found');

			return redirect(route('orderDetails.index'));
		}

		return view('orderDetails.edit')->with('orderDetail', $orderDetail);
	}

	/**
	 * Update the specified OrderDetail in storage.
	 *
	 * @param  int              $id
	 * @param UpdateOrderDetailRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateOrderDetailRequest $request)
	{
		$orderDetail = $this->orderDetailRepository->find($id);

		if(empty($orderDetail))
		{
			Flash::error('OrderDetail not found');

			return redirect(route('orderDetails.index'));
		}

		$this->orderDetailRepository->updateRich($request->all(), $id);

		Flash::success('OrderDetail updated successfully.');

		return redirect(route('orderDetails.index'));
	}

	/**
	 * Remove the specified OrderDetail from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$orderDetail = $this->orderDetailRepository->find($id);

		if(empty($orderDetail))
		{
			Flash::error('OrderDetail not found');

			return redirect(route('orderDetails.index'));
		}

		$this->orderDetailRepository->delete($id);

		Flash::success('OrderDetail deleted successfully.');

		return redirect(route('orderDetails.index'));
	}
}
