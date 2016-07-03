<?php namespace App\Http\Controllers\ADMIN;

use App\Http\Requests;
use App\Http\Requests\CreatePromotionRequest;
use App\Http\Requests\UpdatePromotionRequest;
use App\Libraries\Repositories\PromotionRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class PromotionController extends AppBaseController
{

	/** @var  PromotionRepository */
	private $promotionRepository;

	function __construct(PromotionRepository $promotionRepo)
	{
		$this->promotionRepository = $promotionRepo;
	}

	/**
	 * Display a listing of the Promotion.
	 *
	 * @return Response
	 */
	public function index()
	{
		$promotions = $this->promotionRepository->paginate(10);

		return view('promotions.index')
			->with('promotions', $promotions);
	}

	/**
	 * Show the form for creating a new Promotion.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('promotions.create');
	}

	/**
	 * Store a newly created Promotion in storage.
	 *
	 * @param CreatePromotionRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePromotionRequest $request)
	{
		$input = $request->all();

		$promotion = $this->promotionRepository->create($input);

		Flash::success('Promotion saved successfully.');

		return redirect(route('promotions.index'));
	}

	/**
	 * Display the specified Promotion.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$promotion = $this->promotionRepository->find($id);

		if(empty($promotion))
		{
			Flash::error('Promotion not found');

			return redirect(route('promotions.index'));
		}

		return view('promotions.show')->with('promotion', $promotion);
	}

	/**
	 * Show the form for editing the specified Promotion.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$promotion = $this->promotionRepository->find($id);

		if(empty($promotion))
		{
			Flash::error('Promotion not found');

			return redirect(route('promotions.index'));
		}

		return view('promotions.edit')->with('promotion', $promotion);
	}

	/**
	 * Update the specified Promotion in storage.
	 *
	 * @param  int              $id
	 * @param UpdatePromotionRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdatePromotionRequest $request)
	{
		$promotion = $this->promotionRepository->find($id);

		if(empty($promotion))
		{
			Flash::error('Promotion not found');

			return redirect(route('promotions.index'));
		}

		$this->promotionRepository->updateRich($request->all(), $id);

		Flash::success('Promotion updated successfully.');

		return redirect(route('promotions.index'));
	}

	/**
	 * Remove the specified Promotion from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$promotion = $this->promotionRepository->find($id);

		if(empty($promotion))
		{
			Flash::error('Promotion not found');

			return redirect(route('promotions.index'));
		}

		$this->promotionRepository->delete($id);

		Flash::success('Promotion deleted successfully.');

		return redirect(route('promotions.index'));
	}
}
