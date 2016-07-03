<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\MemberRepository;
use App\Models\Member;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class MemberAPIController extends AppBaseController
{
	/** @var  MemberRepository */
	private $memberRepository;

	function __construct(MemberRepository $memberRepo)
	{
		$this->memberRepository = $memberRepo;
	}

	/**
	 * Display a listing of the Member.
	 * GET|HEAD /members
	 *
	 * @return Response
	 */
	public function index()
	{
		$members = $this->memberRepository->all();

		return $this->sendResponse($members->toArray(), "Members retrieved successfully");
	}

	/**
	 * Show the form for creating a new Member.
	 * GET|HEAD /members/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Member in storage.
	 * POST /members
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Member::$rules) > 0)
			$this->validateRequestOrFail($request, Member::$rules);

		$input = $request->all();

		$members = $this->memberRepository->create($input);

		return $this->sendResponse($members->toArray(), "Member saved successfully");
	}

	/**
	 * Display the specified Member.
	 * GET|HEAD /members/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$member = $this->memberRepository->apiFindOrFail($id);

		return $this->sendResponse($member->toArray(), "Member retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Member.
	 * GET|HEAD /members/{id}/edit
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
	 * Update the specified Member in storage.
	 * PUT/PATCH /members/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Member $member */
		$member = $this->memberRepository->apiFindOrFail($id);

		$result = $this->memberRepository->updateRich($input, $id);

		$member = $member->fresh();

		return $this->sendResponse($member->toArray(), "Member updated successfully");
	}

	/**
	 * Remove the specified Member from storage.
	 * DELETE /members/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->memberRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Member deleted successfully");
	}
}
