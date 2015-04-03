<?php namespace App\Http\Controllers;

use \App\City, \App\Province, \App\Commands\UploadFile;
use Input, Session;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminCityController extends AdminController {

	protected $controller_name = 'city';

	function __construct(City $model) 
	{
		parent::__construct();

		$this->model = $model;
	}
	
	function getIndex()
	{
		// ---------------------- LOAD DATA ----------------------
		$data = $this->model->with(['province', 'province.country'])->name('*'. Input::get('q') . '*')->orderBy('name')->paginate(25);

		// ---------------------- CREATE PAGE TEMPLATE ----------------------
		// Layout
		$this->layout->page_title = strtoupper(str_plural($this->controller_name));

		// Page Template
		$this->layout->content = view('admin.templates.table_page');
		$this->layout->content->controller_name = $this->controller_name;

		$this->layout->content->table = view('admin.widgets.' . $this->controller_name . '.table_basic');
		$this->layout->content->table->data = $data;

		return $this->layout;
	}

	function getCreate($id = null)
	{
		// ---------------------- LOAD DATA ----------------------
		if (!is_null($id))
		{
			$data = $this->model->findorfail($id);
		}
		else
		{
			$data = $this->model->newInstance();
		}

		$provinces = Province::with('country')->orderBy('name')->get();
		foreach ($provinces as $province)
		{
			$province_list[$province->id] = $province->name . ', ' . $province->country->name;
		}
	
		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title = strtoupper($this->controller_name);

		$this->layout->content = view('admin.'.$this->controller_name.'.create');
		$this->layout->content->controller_name = $this->controller_name;
		$this->layout->content->data = $data;
		$this->layout->content->province_list = $province_list;

		return $this->layout;
	}

	function postStore($id = null)
	{
		// ---------------------- LOAD DATA ----------------------
		if (!is_null($id))
		{
			$data = $this->model->findorfail($id);
		}
		else
		{
			$data = $this->model->newInstance();
		}

		// ---------------------- HANDLE INPUT ----------------------
		$input = Input::all();
		$data->fill($input);
		$data->province_id = Input::get('province');

		if ($data->save())
		{
			return redirect()->route('admin.' . $this->controller_name . '.index')->with('alert_success', ucwords($this->controller_name) . ' "' . $data->name . '" has been saved');
		}
		else
		{
			return redirect()->back()->withInput()->withErrors($data->getErrors());
		}
	}

	function getShow($id)
	{
		// ---------------------- LOAD DATA ----------------------
		if (!is_null($id))
		{
			$data = $this->model->findorfail($id);
		}
		else
		{
			$data = $this->model->newInstance();
		}

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title = strtoupper($this->controller_name);

		$this->layout->content = view('admin.'.$this->controller_name.'.show');
		$this->layout->content->controller_name = $this->controller_name;
		$this->layout->content->data = $data;

		return $this->layout;
	}

	function getDelete($id)
	{
		// ---------------------- LOAD DATA ----------------------
		if (!is_null($id))
		{
			$data = $this->model->findorfail($id);
		}
		else
		{
			App::abort(404);
		}
		
		if (str_is('Delete', Input::get('type2confirm')))
		{
			if ($data->delete())
			{
				return redirect()->route('admin.'.$this->controller_name.'.index')->with('alert_success', 'Data "' . $data->name . '" has been deleted');
			}
			else
			{
				return redirect()->back()->withErrors($data->getErrors());
			}
		}
		else
		{
			return redirect()->back()->with('alert_danger', 'Invalid delete confirmation text');
		}
	}
}
