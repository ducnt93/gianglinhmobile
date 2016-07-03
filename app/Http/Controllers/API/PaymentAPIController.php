<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\PaymentRepository;
use App\Models\Payment;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class PaymentAPIController extends AppBaseController
{
	/** @var  PaymentRepository */
	private $paymentRepository;

	function __construct(PaymentRepository $paymentRepo)
	{
		$this->paymentRepository = $paymentRepo;
	}

	/**
	 * Display a listing of the Payment.
	 * GET|HEAD /payments
	 *
	 * @return Response
	 */
	public function index()
	{
		$payments = $this->paymentRepository->all();

		return $this->sendResponse($payments->toArray(), "Payments retrieved successfully");
	}

	/**
	 * Show the form for creating a new Payment.
	 * GET|HEAD /payments/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Payment in storage.
	 * POST /payments
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Payment::$rules) > 0)
			$this->validateRequestOrFail($request, Payment::$rules);

		$input = $request->all();

		$payments = $this->paymentRepository->create($input);

		return $this->sendResponse($payments->toArray(), "Payment saved successfully");
	}

	/**
	 * Display the specified Payment.
	 * GET|HEAD /payments/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$payment = $this->paymentRepository->apiFindOrFail($id);

		return $this->sendResponse($payment->toArray(), "Payment retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Payment.
	 * GET|HEAD /payments/{id}/edit
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
	 * Update the specified Payment in storage.
	 * PUT/PATCH /payments/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Payment $payment */
		$payment = $this->paymentRepository->apiFindOrFail($id);

		$result = $this->paymentRepository->updateRich($input, $id);

		$payment = $payment->fresh();

		return $this->sendResponse($payment->toArray(), "Payment updated successfully");
	}

	/**
	 * Remove the specified Payment from storage.
	 * DELETE /payments/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->paymentRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Payment deleted successfully");
	}
}
