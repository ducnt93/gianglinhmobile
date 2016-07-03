<?php namespace App\Http\Controllers\ADMIN;

use App\Http\Requests;
use App\Http\Requests\CreateInfosRequest;
use App\Http\Requests\UpdateInfosRequest;
use App\Libraries\Repositories\InfosRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class InfosController extends AppBaseController
{

	/** @var  InfosRepository */
	private $infosRepository;

	function __construct(InfosRepository $infosRepo)
	{
		$this->infosRepository = $infosRepo;
	}

	/**
	 * Display a listing of the Infos.
	 *
	 * @return Response
	 */
	public function index()
	{
		$infos = $this->infosRepository->paginate(10);

		return view('infos.index')
			->with('infos', $infos);
	}

	/**
	 * Show the form for creating a new Infos.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('infos.create');
	}

	/**
	 * Store a newly created Infos in storage.
	 *
	 * @param CreateInfosRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateInfosRequest $request)
	{
		$input = $request->all();

		$infos = $this->infosRepository->create($input);

		Flash::success('Infos saved successfully.');

		return redirect(route('infos.index'));
	}

	/**
	 * Display the specified Infos.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$infos = $this->infosRepository->find($id);

		if(empty($infos))
		{
			Flash::error('Infos not found');

			return redirect(route('infos.index'));
		}

		return view('infos.show')->with('infos', $infos);
	}

	/**
	 * Show the form for editing the specified Infos.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$infos = $this->infosRepository->find($id);

		if(empty($infos))
		{
			Flash::error('Infos not found');

			return redirect(route('infos.index'));
		}

		return view('infos.edit')->with('infos', $infos);
	}

	/**
	 * Update the specified Infos in storage.
	 *
	 * @param  int              $id
	 * @param UpdateInfosRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateInfosRequest $request)
	{
		$infos = $this->infosRepository->find($id);

		if(empty($infos))
		{
			Flash::error('Infos not found');

			return redirect(route('infos.index'));
		}

		$this->infosRepository->updateRich($request->all(), $id);

		Flash::success('Infos updated successfully.');

		return redirect(route('infos.index'));
	}

	/**
	 * Remove the specified Infos from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$infos = $this->infosRepository->find($id);

		if(empty($infos))
		{
			Flash::error('Infos not found');

			return redirect(route('infos.index'));
		}

		$this->infosRepository->delete($id);

		Flash::success('Infos deleted successfully.');

		return redirect(route('infos.index'));
	}
}
