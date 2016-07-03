<?php namespace App\Http\Controllers\ADMIN;

use App\Http\Requests;
use App\Http\Requests\CreateInfoTypeRequest;
use App\Http\Requests\UpdateInfoTypeRequest;
use App\Libraries\Repositories\InfoTypeRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class InfoTypeController extends AppBaseController
{

	/** @var  InfoTypeRepository */
	private $infoTypeRepository;

	function __construct(InfoTypeRepository $infoTypeRepo)
	{
		$this->infoTypeRepository = $infoTypeRepo;
	}

	/**
	 * Display a listing of the InfoType.
	 *
	 * @return Response
	 */
	public function index()
	{
		$infoTypes = $this->infoTypeRepository->paginate(10);

		return view('infoTypes.index')
			->with('infoTypes', $infoTypes);
	}

	/**
	 * Show the form for creating a new InfoType.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('infoTypes.create');
	}

	/**
	 * Store a newly created InfoType in storage.
	 *
	 * @param CreateInfoTypeRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateInfoTypeRequest $request)
	{
		$input = $request->all();

		$infoType = $this->infoTypeRepository->create($input);

		Flash::success('InfoType saved successfully.');

		return redirect(route('infoTypes.index'));
	}

	/**
	 * Display the specified InfoType.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$infoType = $this->infoTypeRepository->find($id);

		if(empty($infoType))
		{
			Flash::error('InfoType not found');

			return redirect(route('infoTypes.index'));
		}

		return view('infoTypes.show')->with('infoType', $infoType);
	}

	/**
	 * Show the form for editing the specified InfoType.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$infoType = $this->infoTypeRepository->find($id);

		if(empty($infoType))
		{
			Flash::error('InfoType not found');

			return redirect(route('infoTypes.index'));
		}

		return view('infoTypes.edit')->with('infoType', $infoType);
	}

	/**
	 * Update the specified InfoType in storage.
	 *
	 * @param  int              $id
	 * @param UpdateInfoTypeRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateInfoTypeRequest $request)
	{
		$infoType = $this->infoTypeRepository->find($id);

		if(empty($infoType))
		{
			Flash::error('InfoType not found');

			return redirect(route('infoTypes.index'));
		}

		$this->infoTypeRepository->updateRich($request->all(), $id);

		Flash::success('InfoType updated successfully.');

		return redirect(route('infoTypes.index'));
	}

	/**
	 * Remove the specified InfoType from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$infoType = $this->infoTypeRepository->find($id);

		if(empty($infoType))
		{
			Flash::error('InfoType not found');

			return redirect(route('infoTypes.index'));
		}

		$this->infoTypeRepository->delete($id);

		Flash::success('InfoType deleted successfully.');

		return redirect(route('infoTypes.index'));
	}
}
