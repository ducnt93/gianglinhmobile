<?php namespace App\Http\Controllers\ADMIN;

use App\Http\Requests;
use App\Http\Requests\CreateSimCardRequest;
use App\Http\Requests\UpdateSimCardRequest;
use App\Libraries\Repositories\SimCardRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class SimCardController extends AppBaseController
{

	/** @var  SimCardRepository */
	private $simCardRepository;

	function __construct(SimCardRepository $simCardRepo)
	{
		$this->simCardRepository = $simCardRepo;
	}

	/**
	 * Display a listing of the SimCard.
	 *
	 * @return Response
	 */
	public function index()
	{
		$simCards = $this->simCardRepository->paginate(10);

		return view('simCards.index')
			->with('simCards', $simCards);
	}

	/**
	 * Show the form for creating a new SimCard.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('simCards.create');
	}

	/**
	 * Store a newly created SimCard in storage.
	 *
	 * @param CreateSimCardRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateSimCardRequest $request)
	{
		$input = $request->all();

		$simCard = $this->simCardRepository->create($input);

		Flash::success('SimCard saved successfully.');

		return redirect(route('simCards.index'));
	}

	/**
	 * Display the specified SimCard.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$simCard = $this->simCardRepository->find($id);

		if(empty($simCard))
		{
			Flash::error('SimCard not found');

			return redirect(route('simCards.index'));
		}

		return view('simCards.show')->with('simCard', $simCard);
	}

	/**
	 * Show the form for editing the specified SimCard.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$simCard = $this->simCardRepository->find($id);

		if(empty($simCard))
		{
			Flash::error('SimCard not found');

			return redirect(route('simCards.index'));
		}

		return view('simCards.edit')->with('simCard', $simCard);
	}

	/**
	 * Update the specified SimCard in storage.
	 *
	 * @param  int              $id
	 * @param UpdateSimCardRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateSimCardRequest $request)
	{
		$simCard = $this->simCardRepository->find($id);

		if(empty($simCard))
		{
			Flash::error('SimCard not found');

			return redirect(route('simCards.index'));
		}

		$this->simCardRepository->updateRich($request->all(), $id);

		Flash::success('SimCard updated successfully.');

		return redirect(route('simCards.index'));
	}

	/**
	 * Remove the specified SimCard from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$simCard = $this->simCardRepository->find($id);

		if(empty($simCard))
		{
			Flash::error('SimCard not found');

			return redirect(route('simCards.index'));
		}

		$this->simCardRepository->delete($id);

		Flash::success('SimCard deleted successfully.');

		return redirect(route('simCards.index'));
	}
}
