<?php namespace App\Http\Controllers\ADMIN;

use App\Http\Requests;
use App\Http\Requests\CreateSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Libraries\Repositories\SupplierRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class SupplierController extends AppBaseController
{

	/** @var  SupplierRepository */
	private $supplierRepository;

	function __construct(SupplierRepository $supplierRepo)
	{
		$this->supplierRepository = $supplierRepo;
	}

	/**
	 * Display a listing of the Supplier.
	 *
	 * @return Response
	 */
	public function index()
	{
		$suppliers = $this->supplierRepository->paginate(10);

		return view('suppliers.index')
			->with('suppliers', $suppliers);
	}

	/**
	 * Show the form for creating a new Supplier.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('suppliers.create');
	}

	/**
	 * Store a newly created Supplier in storage.
	 *
	 * @param CreateSupplierRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateSupplierRequest $request)
	{
		$input = $request->all();

		$supplier = $this->supplierRepository->create($input);

		Flash::success('Supplier saved successfully.');

		return redirect(route('suppliers.index'));
	}

	/**
	 * Display the specified Supplier.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$supplier = $this->supplierRepository->find($id);

		if(empty($supplier))
		{
			Flash::error('Supplier not found');

			return redirect(route('suppliers.index'));
		}

		return view('suppliers.show')->with('supplier', $supplier);
	}

	/**
	 * Show the form for editing the specified Supplier.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$supplier = $this->supplierRepository->find($id);

		if(empty($supplier))
		{
			Flash::error('Supplier not found');

			return redirect(route('suppliers.index'));
		}

		return view('suppliers.edit')->with('supplier', $supplier);
	}

	/**
	 * Update the specified Supplier in storage.
	 *
	 * @param  int              $id
	 * @param UpdateSupplierRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateSupplierRequest $request)
	{
		$supplier = $this->supplierRepository->find($id);

		if(empty($supplier))
		{
			Flash::error('Supplier not found');

			return redirect(route('suppliers.index'));
		}

		$this->supplierRepository->updateRich($request->all(), $id);

		Flash::success('Supplier updated successfully.');

		return redirect(route('suppliers.index'));
	}

	/**
	 * Remove the specified Supplier from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$supplier = $this->supplierRepository->find($id);

		if(empty($supplier))
		{
			Flash::error('Supplier not found');

			return redirect(route('suppliers.index'));
		}

		$this->supplierRepository->delete($id);

		Flash::success('Supplier deleted successfully.');

		return redirect(route('suppliers.index'));
	}
}
