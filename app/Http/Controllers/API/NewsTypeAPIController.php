<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\NewsTypeRepository;
use App\Models\NewsType;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class NewsTypeAPIController extends AppBaseController
{
	/** @var  NewsTypeRepository */
	private $newsTypeRepository;

	function __construct(NewsTypeRepository $newsTypeRepo)
	{
		$this->newsTypeRepository = $newsTypeRepo;
	}

	/**
	 * Display a listing of the NewsType.
	 * GET|HEAD /newsTypes
	 *
	 * @return Response
	 */
	public function index()
	{
		$newsTypes = $this->newsTypeRepository->all();

		return $this->sendResponse($newsTypes->toArray(), "NewsTypes retrieved successfully");
	}

	/**
	 * Show the form for creating a new NewsType.
	 * GET|HEAD /newsTypes/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created NewsType in storage.
	 * POST /newsTypes
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(NewsType::$rules) > 0)
			$this->validateRequestOrFail($request, NewsType::$rules);

		$input = $request->all();

		$newsTypes = $this->newsTypeRepository->create($input);

		return $this->sendResponse($newsTypes->toArray(), "NewsType saved successfully");
	}

	/**
	 * Display the specified NewsType.
	 * GET|HEAD /newsTypes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$newsType = $this->newsTypeRepository->apiFindOrFail($id);

		return $this->sendResponse($newsType->toArray(), "NewsType retrieved successfully");
	}

	/**
	 * Show the form for editing the specified NewsType.
	 * GET|HEAD /newsTypes/{id}/edit
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
	 * Update the specified NewsType in storage.
	 * PUT/PATCH /newsTypes/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var NewsType $newsType */
		$newsType = $this->newsTypeRepository->apiFindOrFail($id);

		$result = $this->newsTypeRepository->updateRich($input, $id);

		$newsType = $newsType->fresh();

		return $this->sendResponse($newsType->toArray(), "NewsType updated successfully");
	}

	/**
	 * Remove the specified NewsType from storage.
	 * DELETE /newsTypes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->newsTypeRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "NewsType deleted successfully");
	}
}
