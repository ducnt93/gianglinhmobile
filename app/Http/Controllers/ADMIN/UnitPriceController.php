<?php namespace App\Http\Controllers\ADMIN;

use App\Http\Requests;
use App\Http\Requests\CreateUnitPriceRequest;
use App\Http\Requests\UpdateUnitPriceRequest;
use App\Libraries\Repositories\UnitPriceRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class UnitPriceController extends AppBaseController
{

	/** @var  UnitPriceRepository */
	private $unitPriceRepository;

	function __construct(UnitPriceRepository $unitPriceRepo)
	{
		$this->unitPriceRepository = $unitPriceRepo;
	}

	/**
	 * Display a listing of the UnitPrice.
	 *
	 * @return Response
	 */
	public function index()
	{
		$unitPrices = $this->unitPriceRepository->paginate(10);

		return view('unitPrices.index')
			->with('unitPrices', $unitPrices);
	}

	/**
	 * Show the form for creating a new UnitPrice.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('unitPrices.create');
	}

	/**
	 * Store a newly created UnitPrice in storage.
	 *
	 * @param CreateUnitPriceRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateUnitPriceRequest $request)
	{
		$input = $request->all();

		$unitPrice = $this->unitPriceRepository->create($input);

		Flash::success('UnitPrice saved successfully.');

		return redirect(route('unitPrices.index'));
	}

	/**
	 * Display the specified UnitPrice.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$unitPrice = $this->unitPriceRepository->find($id);

		if(empty($unitPrice))
		{
			Flash::error('UnitPrice not found');

			return redirect(route('unitPrices.index'));
		}

		return view('unitPrices.show')->with('unitPrice', $unitPrice);
	}

	/**
	 * Show the form for editing the specified UnitPrice.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$unitPrice = $this->unitPriceRepository->find($id);

		if(empty($unitPrice))
		{
			Flash::error('UnitPrice not found');

			return redirect(route('unitPrices.index'));
		}

		return view('unitPrices.edit')->with('unitPrice', $unitPrice);
	}

	/**
	 * Update the specified UnitPrice in storage.
	 *
	 * @param  int              $id
	 * @param UpdateUnitPriceRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateUnitPriceRequest $request)
	{
		$unitPrice = $this->unitPriceRepository->find($id);

		if(empty($unitPrice))
		{
			Flash::error('UnitPrice not found');

			return redirect(route('unitPrices.index'));
		}

		$this->unitPriceRepository->updateRich($request->all(), $id);

		Flash::success('UnitPrice updated successfully.');

		return redirect(route('unitPrices.index'));
	}

	/**
	 * Remove the specified UnitPrice from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$unitPrice = $this->unitPriceRepository->find($id);

		if(empty($unitPrice))
		{
			Flash::error('UnitPrice not found');

			return redirect(route('unitPrices.index'));
		}

		$this->unitPriceRepository->delete($id);

		Flash::success('UnitPrice deleted successfully.');

		return redirect(route('unitPrices.index'));
	}
}
