<?php namespace App\Http\Controllers\ADMIN;

use App\Http\Requests;
use App\Http\Requests\CreateContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Libraries\Repositories\ContactRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ContactController extends AppBaseController
{

	/** @var  ContactRepository */
	private $contactRepository;

	function __construct(ContactRepository $contactRepo)
	{
		$this->contactRepository = $contactRepo;
	}

	/**
	 * Display a listing of the Contact.
	 *
	 * @return Response
	 */
	public function index()
	{
		$contacts = $this->contactRepository->paginate(10);

		return view('contacts.index')
			->with('contacts', $contacts);
	}

	/**
	 * Show the form for creating a new Contact.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('contacts.create');
	}

	/**
	 * Store a newly created Contact in storage.
	 *
	 * @param CreateContactRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateContactRequest $request)
	{
		$input = $request->all();

		$contact = $this->contactRepository->create($input);

		Flash::success('Contact saved successfully.');

		return redirect(route('contacts.index'));
	}

	/**
	 * Display the specified Contact.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$contact = $this->contactRepository->find($id);

		if(empty($contact))
		{
			Flash::error('Contact not found');

			return redirect(route('contacts.index'));
		}

		return view('contacts.show')->with('contact', $contact);
	}

	/**
	 * Show the form for editing the specified Contact.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$contact = $this->contactRepository->find($id);

		if(empty($contact))
		{
			Flash::error('Contact not found');

			return redirect(route('contacts.index'));
		}

		return view('contacts.edit')->with('contact', $contact);
	}

	/**
	 * Update the specified Contact in storage.
	 *
	 * @param  int              $id
	 * @param UpdateContactRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateContactRequest $request)
	{
		$contact = $this->contactRepository->find($id);

		if(empty($contact))
		{
			Flash::error('Contact not found');

			return redirect(route('contacts.index'));
		}

		$this->contactRepository->updateRich($request->all(), $id);

		Flash::success('Contact updated successfully.');

		return redirect(route('contacts.index'));
	}

	/**
	 * Remove the specified Contact from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$contact = $this->contactRepository->find($id);

		if(empty($contact))
		{
			Flash::error('Contact not found');

			return redirect(route('contacts.index'));
		}

		$this->contactRepository->delete($id);

		Flash::success('Contact deleted successfully.');

		return redirect(route('contacts.index'));
	}
}
