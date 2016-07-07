<?php namespace App\Http\Controllers\ADMIN;

use App\Http\Requests;
use App\Http\Requests\CreateAccessoryRequest;
use App\Http\Requests\UpdateAccessoryRequest;
use App\Libraries\Repositories\AccessoryRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class AccessoryController extends AppBaseController
{

    /** @var  AccessoryRepository */
    private $accessoryRepository;

    function __construct(AccessoryRepository $accessoryRepo)
    {
        $this->accessoryRepository = $accessoryRepo;
    }

    /**
     * Display a listing of the Accessory.
     *
     * @return Response
     */
    public function index()
    {
        $accessories = $this->accessoryRepository->paginate(10);

        return view('admin.accessories.index')
            ->with('accessories', $accessories);
    }

    /**
     * Show the form for creating a new Accessory.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.accessories.create');
    }

    /**
     * Store a newly created Accessory in storage.
     *
     * @param CreateAccessoryRequest $request
     *
     * @return Response
     */
    public function store(CreateAccessoryRequest $request)
    {
        $input = $request->all();
        echo $input;
/*
        $accessory = $this->accessoryRepository->create($input);
        if (empty($accessory)) {
            Flash::error('Đã có lỗi xảy ra vui lòng kiểm tra lại.');
        } else {
            Flash::success('1 phụ kiện vừa được thêm thanh công.');

            return redirect(route('admin.accessories.index'));
        }*/
    }

    /**
     * Display the specified Accessory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $accessory = $this->accessoryRepository->find($id);

        if (empty($accessory)) {
            Flash::error('Không tìm thấy phụ kiện này');

            return redirect(route('admin.accessories.index'));
        }

        return view('admin.accessories.show')->with('accessory', $accessory);
    }

    /**
     * Show the form for editing the specified Accessory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $accessory = $this->accessoryRepository->find($id);

        if (empty($accessory)) {
            Flash::error('Accessory not found');

            return redirect(route('accessories.index'));
        }

        return view('admin.accessories.edit')->with('accessory', $accessory);
    }

    /**
     * Update the specified Accessory in storage.
     *
     * @param  int $id
     * @param UpdateAccessoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAccessoryRequest $request)
    {
        $accessory = $this->accessoryRepository->find($id);

        if (empty($accessory)) {
            Flash::error('Accessory not found');

            return redirect(route('admin.accessories.index'));
        }

        $this->accessoryRepository->updateRich($request->all(), $id);

        Flash::success('Accessory updated successfully.');

        return redirect(route('admin.accessories.index'));
    }

    /**
     * Remove the specified Accessory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $accessory = $this->accessoryRepository->find($id);

        if (empty($accessory)) {
            Flash::error('Accessory not found');

            return redirect(route('admin.accessories.index'));
        }

        $this->accessoryRepository->delete($id);

        Flash::success('Accessory deleted successfully.');

        return redirect(route('admin.accessories.index'));
    }
}
