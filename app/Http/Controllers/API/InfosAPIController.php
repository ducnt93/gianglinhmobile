<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\InfosRepository;
use App\Models\Infos;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class InfosAPIController extends AppBaseController
{
	/** @var  InfosRepository */
	private $infosRepository;

	function __construct(InfosRepository $infosRepo)
	{
		$this->infosRepository = $infosRepo;
	}

	/**
	 * Display a listing of the Infos.
	 * GET|HEAD /infos
	 *
	 * @return Response
	 */
	public function index()
	{
		$infos = $this->infosRepository->all();

		return $this->sendResponse($infos->toArray(), "Infos retrieved successfully");
	}

	/**
	 * Show the form for creating a new Infos.
	 * GET|HEAD /infos/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Infos in storage.
	 * POST /infos
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Infos::$rules) > 0)
			$this->validateRequestOrFail($request, Infos::$rules);

		$input = $request->all();

		$infos = $this->infosRepository->create($input);

		return $this->sendResponse($infos->toArray(), "Infos saved successfully");
	}

	/**
	 * Display the specified Infos.
	 * GET|HEAD /infos/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$infos = $this->infosRepository->apiFindOrFail($id);

		return $this->sendResponse($infos->toArray(), "Infos retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Infos.
	 * GET|HEAD /infos/{id}/edit
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
	 * Update the specified Infos in storage.
	 * PUT/PATCH /infos/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Infos $infos */
		$infos = $this->infosRepository->apiFindOrFail($id);

		$result = $this->infosRepository->updateRich($input, $id);

		$infos = $infos->fresh();

		return $this->sendResponse($infos->toArray(), "Infos updated successfully");
	}

	/**
	 * Remove the specified Infos from storage.
	 * DELETE /infos/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->infosRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Infos deleted successfully");
	}
}
