<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\FqsaRepository;
use App\Models\Fqsa;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class FqsaAPIController extends AppBaseController
{
	/** @var  FqsaRepository */
	private $fqsaRepository;

	function __construct(FqsaRepository $fqsaRepo)
	{
		$this->fqsaRepository = $fqsaRepo;
	}

	/**
	 * Display a listing of the Fqsa.
	 * GET|HEAD /fqsas
	 *
	 * @return Response
	 */
	public function index()
	{
		$fqsas = $this->fqsaRepository->all();

		return $this->sendResponse($fqsas->toArray(), "Fqsas retrieved successfully");
	}

	/**
	 * Show the form for creating a new Fqsa.
	 * GET|HEAD /fqsas/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Fqsa in storage.
	 * POST /fqsas
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Fqsa::$rules) > 0)
			$this->validateRequestOrFail($request, Fqsa::$rules);

		$input = $request->all();

		$fqsas = $this->fqsaRepository->create($input);

		return $this->sendResponse($fqsas->toArray(), "Fqsa saved successfully");
	}

	/**
	 * Display the specified Fqsa.
	 * GET|HEAD /fqsas/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$fqsa = $this->fqsaRepository->apiFindOrFail($id);

		return $this->sendResponse($fqsa->toArray(), "Fqsa retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Fqsa.
	 * GET|HEAD /fqsas/{id}/edit
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
	 * Update the specified Fqsa in storage.
	 * PUT/PATCH /fqsas/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Fqsa $fqsa */
		$fqsa = $this->fqsaRepository->apiFindOrFail($id);

		$result = $this->fqsaRepository->updateRich($input, $id);

		$fqsa = $fqsa->fresh();

		return $this->sendResponse($fqsa->toArray(), "Fqsa updated successfully");
	}

	/**
	 * Remove the specified Fqsa from storage.
	 * DELETE /fqsas/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->fqsaRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Fqsa deleted successfully");
	}
}
