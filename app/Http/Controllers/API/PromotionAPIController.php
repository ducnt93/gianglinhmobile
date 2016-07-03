<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\PromotionRepository;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class PromotionAPIController extends AppBaseController
{
	/** @var  PromotionRepository */
	private $promotionRepository;

	function __construct(PromotionRepository $promotionRepo)
	{
		$this->promotionRepository = $promotionRepo;
	}

	/**
	 * Display a listing of the Promotion.
	 * GET|HEAD /promotions
	 *
	 * @return Response
	 */
	public function index()
	{
		$promotions = $this->promotionRepository->all();

		return $this->sendResponse($promotions->toArray(), "Promotions retrieved successfully");
	}

	/**
	 * Show the form for creating a new Promotion.
	 * GET|HEAD /promotions/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Promotion in storage.
	 * POST /promotions
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Promotion::$rules) > 0)
			$this->validateRequestOrFail($request, Promotion::$rules);

		$input = $request->all();

		$promotions = $this->promotionRepository->create($input);

		return $this->sendResponse($promotions->toArray(), "Promotion saved successfully");
	}

	/**
	 * Display the specified Promotion.
	 * GET|HEAD /promotions/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$promotion = $this->promotionRepository->apiFindOrFail($id);

		return $this->sendResponse($promotion->toArray(), "Promotion retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Promotion.
	 * GET|HEAD /promotions/{id}/edit
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
	 * Update the specified Promotion in storage.
	 * PUT/PATCH /promotions/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Promotion $promotion */
		$promotion = $this->promotionRepository->apiFindOrFail($id);

		$result = $this->promotionRepository->updateRich($input, $id);

		$promotion = $promotion->fresh();

		return $this->sendResponse($promotion->toArray(), "Promotion updated successfully");
	}

	/**
	 * Remove the specified Promotion from storage.
	 * DELETE /promotions/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->promotionRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Promotion deleted successfully");
	}
}
