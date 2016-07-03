<?php namespace App\Http\Controllers\ADMIN;

use App\Http\Requests;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Libraries\Repositories\OrderRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class OrderController extends AppBaseController
{

	/** @var  OrderRepository */
	private $orderRepository;

	function __construct(OrderRepository $orderRepo)
	{
		$this->orderRepository = $orderRepo;
	}

	/**
	 * Display a listing of the Order.
	 *
	 * @return Response
	 */
	public function index()
	{
		$orders = $this->orderRepository->paginate(10);

		return view('orders.index')
			->with('orders', $orders);
	}

	/**
	 * Show the form for creating a new Order.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('orders.create');
	}

	/**
	 * Store a newly created Order in storage.
	 *
	 * @param CreateOrderRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateOrderRequest $request)
	{
		$input = $request->all();

		$order = $this->orderRepository->create($input);

		Flash::success('Order saved successfully.');

		return redirect(route('orders.index'));
	}

	/**
	 * Display the specified Order.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$order = $this->orderRepository->find($id);

		if(empty($order))
		{
			Flash::error('Order not found');

			return redirect(route('orders.index'));
		}

		return view('orders.show')->with('order', $order);
	}

	/**
	 * Show the form for editing the specified Order.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$order = $this->orderRepository->find($id);

		if(empty($order))
		{
			Flash::error('Order not found');

			return redirect(route('orders.index'));
		}

		return view('orders.edit')->with('order', $order);
	}

	/**
	 * Update the specified Order in storage.
	 *
	 * @param  int              $id
	 * @param UpdateOrderRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateOrderRequest $request)
	{
		$order = $this->orderRepository->find($id);

		if(empty($order))
		{
			Flash::error('Order not found');

			return redirect(route('orders.index'));
		}

		$this->orderRepository->updateRich($request->all(), $id);

		Flash::success('Order updated successfully.');

		return redirect(route('orders.index'));
	}

	/**
	 * Remove the specified Order from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$order = $this->orderRepository->find($id);

		if(empty($order))
		{
			Flash::error('Order not found');

			return redirect(route('orders.index'));
		}

		$this->orderRepository->delete($id);

		Flash::success('Order deleted successfully.');

		return redirect(route('orders.index'));
	}
}
