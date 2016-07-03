<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\InfoTypeRepository;
use App\Models\InfoType;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class InfoTypeAPIController extends AppBaseController
{
	/** @var  InfoTypeRepository */
	private $infoTypeRepository;

	function __construct(InfoTypeRepository $infoTypeRepo)
	{
		$this->infoTypeRepository = $infoTypeRepo;
	}

	/**
	 * Display a listing of the InfoType.
	 * GET|HEAD /infoTypes
	 *
	 * @return Response
	 */
	public function index()
	{
		$infoTypes = $this->infoTypeRepository->all();

		return $this->sendResponse($infoTypes->toArray(), "InfoTypes retrieved successfully");
	}

	/**
	 * Show the form for creating a new InfoType.
	 * GET|HEAD /infoTypes/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created InfoType in storage.
	 * POST /infoTypes
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(InfoType::$rules) > 0)
			$this->validateRequestOrFail($request, InfoType::$rules);

		$input = $request->all();

		$infoTypes = $this->infoTypeRepository->create($input);

		return $this->sendResponse($infoTypes->toArray(), "InfoType saved successfully");
	}

	/**
	 * Display the specified InfoType.
	 * GET|HEAD /infoTypes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$infoType = $this->infoTypeRepository->apiFindOrFail($id);

		return $this->sendResponse($infoType->toArray(), "InfoType retrieved successfully");
	}

	/**
	 * Show the form for editing the specified InfoType.
	 * GET|HEAD /infoTypes/{id}/edit
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
	 * Update the specified InfoType in storage.
	 * PUT/PATCH /infoTypes/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var InfoType $infoType */
		$infoType = $this->infoTypeRepository->apiFindOrFail($id);

		$result = $this->infoTypeRepository->updateRich($input, $id);

		$infoType = $infoType->fresh();

		return $this->sendResponse($infoType->toArray(), "InfoType updated successfully");
	}

	/**
	 * Remove the specified InfoType from storage.
	 * DELETE /infoTypes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->infoTypeRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "InfoType deleted successfully");
	}
}
