<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\NewsRepository;
use App\Models\News;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class NewsAPIController extends AppBaseController
{
	/** @var  NewsRepository */
	private $newsRepository;

	function __construct(NewsRepository $newsRepo)
	{
		$this->newsRepository = $newsRepo;
	}

	/**
	 * Display a listing of the News.
	 * GET|HEAD /news
	 *
	 * @return Response
	 */
	public function index()
	{
		$news = $this->newsRepository->all();

		return $this->sendResponse($news->toArray(), "News retrieved successfully");
	}

	/**
	 * Show the form for creating a new News.
	 * GET|HEAD /news/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created News in storage.
	 * POST /news
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(News::$rules) > 0)
			$this->validateRequestOrFail($request, News::$rules);

		$input = $request->all();

		$news = $this->newsRepository->create($input);

		return $this->sendResponse($news->toArray(), "News saved successfully");
	}

	/**
	 * Display the specified News.
	 * GET|HEAD /news/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$news = $this->newsRepository->apiFindOrFail($id);

		return $this->sendResponse($news->toArray(), "News retrieved successfully");
	}

	/**
	 * Show the form for editing the specified News.
	 * GET|HEAD /news/{id}/edit
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
	 * Update the specified News in storage.
	 * PUT/PATCH /news/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var News $news */
		$news = $this->newsRepository->apiFindOrFail($id);

		$result = $this->newsRepository->updateRich($input, $id);

		$news = $news->fresh();

		return $this->sendResponse($news->toArray(), "News updated successfully");
	}

	/**
	 * Remove the specified News from storage.
	 * DELETE /news/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->newsRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "News deleted successfully");
	}
}
