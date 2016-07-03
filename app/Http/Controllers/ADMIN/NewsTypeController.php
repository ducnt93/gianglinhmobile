<?php namespace App\Http\Controllers\ADMIN;

use App\Http\Requests;
use App\Http\Requests\CreateNewsTypeRequest;
use App\Http\Requests\UpdateNewsTypeRequest;
use App\Libraries\Repositories\NewsTypeRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class NewsTypeController extends AppBaseController
{

	/** @var  NewsTypeRepository */
	private $newsTypeRepository;

	function __construct(NewsTypeRepository $newsTypeRepo)
	{
		$this->newsTypeRepository = $newsTypeRepo;
	}

	/**
	 * Display a listing of the NewsType.
	 *
	 * @return Response
	 */
	public function index()
	{
		$newsTypes = $this->newsTypeRepository->paginate(10);

		return view('newsTypes.index')
			->with('newsTypes', $newsTypes);
	}

	/**
	 * Show the form for creating a new NewsType.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('newsTypes.create');
	}

	/**
	 * Store a newly created NewsType in storage.
	 *
	 * @param CreateNewsTypeRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateNewsTypeRequest $request)
	{
		$input = $request->all();

		$newsType = $this->newsTypeRepository->create($input);

		Flash::success('NewsType saved successfully.');

		return redirect(route('newsTypes.index'));
	}

	/**
	 * Display the specified NewsType.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$newsType = $this->newsTypeRepository->find($id);

		if(empty($newsType))
		{
			Flash::error('NewsType not found');

			return redirect(route('newsTypes.index'));
		}

		return view('newsTypes.show')->with('newsType', $newsType);
	}

	/**
	 * Show the form for editing the specified NewsType.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$newsType = $this->newsTypeRepository->find($id);

		if(empty($newsType))
		{
			Flash::error('NewsType not found');

			return redirect(route('newsTypes.index'));
		}

		return view('newsTypes.edit')->with('newsType', $newsType);
	}

	/**
	 * Update the specified NewsType in storage.
	 *
	 * @param  int              $id
	 * @param UpdateNewsTypeRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateNewsTypeRequest $request)
	{
		$newsType = $this->newsTypeRepository->find($id);

		if(empty($newsType))
		{
			Flash::error('NewsType not found');

			return redirect(route('newsTypes.index'));
		}

		$this->newsTypeRepository->updateRich($request->all(), $id);

		Flash::success('NewsType updated successfully.');

		return redirect(route('newsTypes.index'));
	}

	/**
	 * Remove the specified NewsType from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$newsType = $this->newsTypeRepository->find($id);

		if(empty($newsType))
		{
			Flash::error('NewsType not found');

			return redirect(route('newsTypes.index'));
		}

		$this->newsTypeRepository->delete($id);

		Flash::success('NewsType deleted successfully.');

		return redirect(route('newsTypes.index'));
	}
}
