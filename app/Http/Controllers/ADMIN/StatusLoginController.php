<?php namespace App\Http\Controllers\ADMIN;

use App\Http\Requests;
use App\Http\Requests\CreateStatusLoginRequest;
use App\Http\Requests\UpdateStatusLoginRequest;
use App\Libraries\Repositories\StatusLoginRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class StatusLoginController extends AppBaseController
{

	/** @var  StatusLoginRepository */
	private $statusLoginRepository;

	function __construct(StatusLoginRepository $statusLoginRepo)
	{
		$this->statusLoginRepository = $statusLoginRepo;
	}

	/**
	 * Display a listing of the StatusLogin.
	 *
	 * @return Response
	 */
	public function index()
	{
		$statusLogins = $this->statusLoginRepository->paginate(10);

		return view('statusLogins.index')
			->with('statusLogins', $statusLogins);
	}

	/**
	 * Show the form for creating a new StatusLogin.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('statusLogins.create');
	}

	/**
	 * Store a newly created StatusLogin in storage.
	 *
	 * @param CreateStatusLoginRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateStatusLoginRequest $request)
	{
		$input = $request->all();

		$statusLogin = $this->statusLoginRepository->create($input);

		Flash::success('StatusLogin saved successfully.');

		return redirect(route('statusLogins.index'));
	}

	/**
	 * Display the specified StatusLogin.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$statusLogin = $this->statusLoginRepository->find($id);

		if(empty($statusLogin))
		{
			Flash::error('StatusLogin not found');

			return redirect(route('statusLogins.index'));
		}

		return view('statusLogins.show')->with('statusLogin', $statusLogin);
	}

	/**
	 * Show the form for editing the specified StatusLogin.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$statusLogin = $this->statusLoginRepository->find($id);

		if(empty($statusLogin))
		{
			Flash::error('StatusLogin not found');

			return redirect(route('statusLogins.index'));
		}

		return view('statusLogins.edit')->with('statusLogin', $statusLogin);
	}

	/**
	 * Update the specified StatusLogin in storage.
	 *
	 * @param  int              $id
	 * @param UpdateStatusLoginRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateStatusLoginRequest $request)
	{
		$statusLogin = $this->statusLoginRepository->find($id);

		if(empty($statusLogin))
		{
			Flash::error('StatusLogin not found');

			return redirect(route('statusLogins.index'));
		}

		$this->statusLoginRepository->updateRich($request->all(), $id);

		Flash::success('StatusLogin updated successfully.');

		return redirect(route('statusLogins.index'));
	}

	/**
	 * Remove the specified StatusLogin from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$statusLogin = $this->statusLoginRepository->find($id);

		if(empty($statusLogin))
		{
			Flash::error('StatusLogin not found');

			return redirect(route('statusLogins.index'));
		}

		$this->statusLoginRepository->delete($id);

		Flash::success('StatusLogin deleted successfully.');

		return redirect(route('statusLogins.index'));
	}
}
