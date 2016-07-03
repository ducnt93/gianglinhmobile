<?php namespace App\Http\Controllers\ADMIN;

use App\Http\Requests;
use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Libraries\Repositories\NewsRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class NewsController extends AppBaseController
{

	/** @var  NewsRepository */
	private $newsRepository;

	function __construct(NewsRepository $newsRepo)
	{
		$this->newsRepository = $newsRepo;
	}

	/**
	 * Display a listing of the News.
	 *
	 * @return Response
	 */
	public function index()
	{
		$news = $this->newsRepository->paginate(10);

		return view('news.index')
			->with('news', $news);
	}

	/**
	 * Show the form for creating a new News.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('news.create');
	}

	/**
	 * Store a newly created News in storage.
	 *
	 * @param CreateNewsRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateNewsRequest $request)
	{
		$input = $request->all();

		$news = $this->newsRepository->create($input);

		Flash::success('News saved successfully.');

		return redirect(route('news.index'));
	}

	/**
	 * Display the specified News.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$news = $this->newsRepository->find($id);

		if(empty($news))
		{
			Flash::error('News not found');

			return redirect(route('news.index'));
		}

		return view('news.show')->with('news', $news);
	}

	/**
	 * Show the form for editing the specified News.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$news = $this->newsRepository->find($id);

		if(empty($news))
		{
			Flash::error('News not found');

			return redirect(route('news.index'));
		}

		return view('news.edit')->with('news', $news);
	}

	/**
	 * Update the specified News in storage.
	 *
	 * @param  int              $id
	 * @param UpdateNewsRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateNewsRequest $request)
	{
		$news = $this->newsRepository->find($id);

		if(empty($news))
		{
			Flash::error('News not found');

			return redirect(route('news.index'));
		}

		$this->newsRepository->updateRich($request->all(), $id);

		Flash::success('News updated successfully.');

		return redirect(route('news.index'));
	}

	/**
	 * Remove the specified News from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$news = $this->newsRepository->find($id);

		if(empty($news))
		{
			Flash::error('News not found');

			return redirect(route('news.index'));
		}

		$this->newsRepository->delete($id);

		Flash::success('News deleted successfully.');

		return redirect(route('news.index'));
	}
}
