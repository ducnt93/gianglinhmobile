<?php namespace App\Http\Controllers\ADMIN;

use App\Http\Requests;
use App\Http\Requests\CreateMaillerRequest;
use App\Http\Requests\UpdateMaillerRequest;
use App\Libraries\Repositories\MaillerRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class MaillerController extends AppBaseController
{

	/** @var  MaillerRepository */
	private $maillerRepository;

	function __construct(MaillerRepository $maillerRepo)
	{
		$this->maillerRepository = $maillerRepo;
	}

	/**
	 * Display a listing of the Mailler.
	 *
	 * @return Response
	 */
	public function index()
	{
		$maillers = $this->maillerRepository->paginate(10);

		return view('maillers.index')
			->with('maillers', $maillers);
	}

	/**
	 * Show the form for creating a new Mailler.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('maillers.create');
	}

	/**
	 * Store a newly created Mailler in storage.
	 *
	 * @param CreateMaillerRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateMaillerRequest $request)
	{
		$input = $request->all();

		$mailler = $this->maillerRepository->create($input);

		Flash::success('Mailler saved successfully.');

		return redirect(route('maillers.index'));
	}

	/**
	 * Display the specified Mailler.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$mailler = $this->maillerRepository->find($id);

		if(empty($mailler))
		{
			Flash::error('Mailler not found');

			return redirect(route('maillers.index'));
		}

		return view('maillers.show')->with('mailler', $mailler);
	}

	/**
	 * Show the form for editing the specified Mailler.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$mailler = $this->maillerRepository->find($id);

		if(empty($mailler))
		{
			Flash::error('Mailler not found');

			return redirect(route('maillers.index'));
		}

		return view('maillers.edit')->with('mailler', $mailler);
	}

	/**
	 * Update the specified Mailler in storage.
	 *
	 * @param  int              $id
	 * @param UpdateMaillerRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateMaillerRequest $request)
	{
		$mailler = $this->maillerRepository->find($id);

		if(empty($mailler))
		{
			Flash::error('Mailler not found');

			return redirect(route('maillers.index'));
		}

		$this->maillerRepository->updateRich($request->all(), $id);

		Flash::success('Mailler updated successfully.');

		return redirect(route('maillers.index'));
	}

	/**
	 * Remove the specified Mailler from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$mailler = $this->maillerRepository->find($id);

		if(empty($mailler))
		{
			Flash::error('Mailler not found');

			return redirect(route('maillers.index'));
		}

		$this->maillerRepository->delete($id);

		Flash::success('Mailler deleted successfully.');

		return redirect(route('maillers.index'));
	}
}
