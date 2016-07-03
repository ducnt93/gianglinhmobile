<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ContactRepository;
use App\Models\Contact;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ContactAPIController extends AppBaseController
{
	/** @var  ContactRepository */
	private $contactRepository;

	function __construct(ContactRepository $contactRepo)
	{
		$this->contactRepository = $contactRepo;
	}

	/**
	 * Display a listing of the Contact.
	 * GET|HEAD /contacts
	 *
	 * @return Response
	 */
	public function index()
	{
		$contacts = $this->contactRepository->all();

		return $this->sendResponse($contacts->toArray(), "Contacts retrieved successfully");
	}

	/**
	 * Show the form for creating a new Contact.
	 * GET|HEAD /contacts/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Contact in storage.
	 * POST /contacts
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Contact::$rules) > 0)
			$this->validateRequestOrFail($request, Contact::$rules);

		$input = $request->all();

		$contacts = $this->contactRepository->create($input);

		return $this->sendResponse($contacts->toArray(), "Contact saved successfully");
	}

	/**
	 * Display the specified Contact.
	 * GET|HEAD /contacts/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$contact = $this->contactRepository->apiFindOrFail($id);

		return $this->sendResponse($contact->toArray(), "Contact retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Contact.
	 * GET|HEAD /contacts/{id}/edit
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
	 * Update the specified Contact in storage.
	 * PUT/PATCH /contacts/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Contact $contact */
		$contact = $this->contactRepository->apiFindOrFail($id);

		$result = $this->contactRepository->updateRich($input, $id);

		$contact = $contact->fresh();

		return $this->sendResponse($contact->toArray(), "Contact updated successfully");
	}

	/**
	 * Remove the specified Contact from storage.
	 * DELETE /contacts/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->contactRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Contact deleted successfully");
	}
}
