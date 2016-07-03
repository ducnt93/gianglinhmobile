<?php namespace App\Http\Controllers\ADMIN;

use App\Http\Requests;
use App\Http\Requests\CreateSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Libraries\Repositories\SettingRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class SettingController extends AppBaseController
{

	/** @var  SettingRepository */
	private $settingRepository;

	function __construct(SettingRepository $settingRepo)
	{
		$this->settingRepository = $settingRepo;
	}

	/**
	 * Display a listing of the Setting.
	 *
	 * @return Response
	 */
	public function index()
	{
		$settings = $this->settingRepository->paginate(10);

		return view('settings.index')
			->with('settings', $settings);
	}

	/**
	 * Show the form for creating a new Setting.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('settings.create');
	}

	/**
	 * Store a newly created Setting in storage.
	 *
	 * @param CreateSettingRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateSettingRequest $request)
	{
		$input = $request->all();

		$setting = $this->settingRepository->create($input);

		Flash::success('Setting saved successfully.');

		return redirect(route('settings.index'));
	}

	/**
	 * Display the specified Setting.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$setting = $this->settingRepository->find($id);

		if(empty($setting))
		{
			Flash::error('Setting not found');

			return redirect(route('settings.index'));
		}

		return view('settings.show')->with('setting', $setting);
	}

	/**
	 * Show the form for editing the specified Setting.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$setting = $this->settingRepository->find($id);

		if(empty($setting))
		{
			Flash::error('Setting not found');

			return redirect(route('settings.index'));
		}

		return view('settings.edit')->with('setting', $setting);
	}

	/**
	 * Update the specified Setting in storage.
	 *
	 * @param  int              $id
	 * @param UpdateSettingRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateSettingRequest $request)
	{
		$setting = $this->settingRepository->find($id);

		if(empty($setting))
		{
			Flash::error('Setting not found');

			return redirect(route('settings.index'));
		}

		$this->settingRepository->updateRich($request->all(), $id);

		Flash::success('Setting updated successfully.');

		return redirect(route('settings.index'));
	}

	/**
	 * Remove the specified Setting from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$setting = $this->settingRepository->find($id);

		if(empty($setting))
		{
			Flash::error('Setting not found');

			return redirect(route('settings.index'));
		}

		$this->settingRepository->delete($id);

		Flash::success('Setting deleted successfully.');

		return redirect(route('settings.index'));
	}
}
