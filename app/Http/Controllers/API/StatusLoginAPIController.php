<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\StatusLoginRepository;
use App\Models\StatusLogin;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class StatusLoginAPIController extends AppBaseController
{
	/** @var  StatusLoginRepository */
	private $statusLoginRepository;

	function __construct(StatusLoginRepository $statusLoginRepo)
	{
		$this->statusLoginRepository = $statusLoginRepo;
	}

	/**
	 * Display a listing of the StatusLogin.
	 * GET|HEAD /statusLogins
	 *
	 * @return Response
	 */
	public function index()
	{
		$statusLogins = $this->statusLoginRepository->all();

		return $this->sendResponse($statusLogins->toArray(), "StatusLogins retrieved successfully");
	}

	/**
	 * Show the form for creating a new StatusLogin.
	 * GET|HEAD /statusLogins/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created StatusLogin in storage.
	 * POST /statusLogins
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(StatusLogin::$rules) > 0)
			$this->validateRequestOrFail($request, StatusLogin::$rules);

		$input = $request->all();

		$statusLogins = $this->statusLoginRepository->create($input);

		return $this->sendResponse($statusLogins->toArray(), "StatusLogin saved successfully");
	}

	/**
	 * Display the specified StatusLogin.
	 * GET|HEAD /statusLogins/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$statusLogin = $this->statusLoginRepository->apiFindOrFail($id);

		return $this->sendResponse($statusLogin->toArray(), "StatusLogin retrieved successfully");
	}

	/**
	 * Show the form for editing the specified StatusLogin.
	 * GET|HEAD /statusLogins/{id}/edit
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
	 * Update the specified StatusLogin in storage.
	 * PUT/PATCH /statusLogins/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var StatusLogin $statusLogin */
		$statusLogin = $this->statusLoginRepository->apiFindOrFail($id);

		$result = $this->statusLoginRepository->updateRich($input, $id);

		$statusLogin = $statusLogin->fresh();

		return $this->sendResponse($statusLogin->toArray(), "StatusLogin updated successfully");
	}

	/**
	 * Remove the specified StatusLogin from storage.
	 * DELETE /statusLogins/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->statusLoginRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "StatusLogin deleted successfully");
	}
}
