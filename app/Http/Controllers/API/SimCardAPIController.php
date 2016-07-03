<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\SimCardRepository;
use App\Models\SimCard;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class SimCardAPIController extends AppBaseController
{
	/** @var  SimCardRepository */
	private $simCardRepository;

	function __construct(SimCardRepository $simCardRepo)
	{
		$this->simCardRepository = $simCardRepo;
	}

	/**
	 * Display a listing of the SimCard.
	 * GET|HEAD /simCards
	 *
	 * @return Response
	 */
	public function index()
	{
		$simCards = $this->simCardRepository->all();

		return $this->sendResponse($simCards->toArray(), "SimCards retrieved successfully");
	}

	/**
	 * Show the form for creating a new SimCard.
	 * GET|HEAD /simCards/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created SimCard in storage.
	 * POST /simCards
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(SimCard::$rules) > 0)
			$this->validateRequestOrFail($request, SimCard::$rules);

		$input = $request->all();

		$simCards = $this->simCardRepository->create($input);

		return $this->sendResponse($simCards->toArray(), "SimCard saved successfully");
	}

	/**
	 * Display the specified SimCard.
	 * GET|HEAD /simCards/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$simCard = $this->simCardRepository->apiFindOrFail($id);

		return $this->sendResponse($simCard->toArray(), "SimCard retrieved successfully");
	}

	/**
	 * Show the form for editing the specified SimCard.
	 * GET|HEAD /simCards/{id}/edit
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
	 * Update the specified SimCard in storage.
	 * PUT/PATCH /simCards/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var SimCard $simCard */
		$simCard = $this->simCardRepository->apiFindOrFail($id);

		$result = $this->simCardRepository->updateRich($input, $id);

		$simCard = $simCard->fresh();

		return $this->sendResponse($simCard->toArray(), "SimCard updated successfully");
	}

	/**
	 * Remove the specified SimCard from storage.
	 * DELETE /simCards/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->simCardRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "SimCard deleted successfully");
	}
}
