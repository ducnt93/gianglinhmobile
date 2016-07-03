<?php namespace App\Http\Controllers\ADMIN;

use App\Http\Requests;
use App\Http\Requests\CreatePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Libraries\Repositories\PaymentRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class PaymentController extends AppBaseController
{

	/** @var  PaymentRepository */
	private $paymentRepository;

	function __construct(PaymentRepository $paymentRepo)
	{
		$this->paymentRepository = $paymentRepo;
	}

	/**
	 * Display a listing of the Payment.
	 *
	 * @return Response
	 */
	public function index()
	{
		$payments = $this->paymentRepository->paginate(10);

		return view('payments.index')
			->with('payments', $payments);
	}

	/**
	 * Show the form for creating a new Payment.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('payments.create');
	}

	/**
	 * Store a newly created Payment in storage.
	 *
	 * @param CreatePaymentRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePaymentRequest $request)
	{
		$input = $request->all();

		$payment = $this->paymentRepository->create($input);

		Flash::success('Payment saved successfully.');

		return redirect(route('payments.index'));
	}

	/**
	 * Display the specified Payment.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$payment = $this->paymentRepository->find($id);

		if(empty($payment))
		{
			Flash::error('Payment not found');

			return redirect(route('payments.index'));
		}

		return view('payments.show')->with('payment', $payment);
	}

	/**
	 * Show the form for editing the specified Payment.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$payment = $this->paymentRepository->find($id);

		if(empty($payment))
		{
			Flash::error('Payment not found');

			return redirect(route('payments.index'));
		}

		return view('payments.edit')->with('payment', $payment);
	}

	/**
	 * Update the specified Payment in storage.
	 *
	 * @param  int              $id
	 * @param UpdatePaymentRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdatePaymentRequest $request)
	{
		$payment = $this->paymentRepository->find($id);

		if(empty($payment))
		{
			Flash::error('Payment not found');

			return redirect(route('payments.index'));
		}

		$this->paymentRepository->updateRich($request->all(), $id);

		Flash::success('Payment updated successfully.');

		return redirect(route('payments.index'));
	}

	/**
	 * Remove the specified Payment from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$payment = $this->paymentRepository->find($id);

		if(empty($payment))
		{
			Flash::error('Payment not found');

			return redirect(route('payments.index'));
		}

		$this->paymentRepository->delete($id);

		Flash::success('Payment deleted successfully.');

		return redirect(route('payments.index'));
	}
}
