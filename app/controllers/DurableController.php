<?php

class DurableController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getRepairList()
	{




		return View::make('durable.repair_list');
	}

	public function getRepairEdit($id)
	{
		$dept = DB::table('tb_dept')->where('dept_status','=','1')->orderBy('dept_name','asc')->get();
		$urgency = DB::table('tb_urgency')->get();
		$risk = DB::table('tb_risk')->get();
		$important_work = DB::table('tb_important_work')->get();
		$ruin_type = DB::table('tb_ruin_type')->where('ruin_type_status','=','1')->orderBy('ruin_type_order','asc')->get();
		$technician = DB::table('tb_technical')->where('technic_status','=','1')->get();
		$repair = DurableRepair::leftJoin('tb_durable','tb_durable.durable_id','=','tb_durable_repair.durable_id')
								->selectRaw('tb_durable_repair.*,tb_durable.durable_barcode,tb_durable.durable_name,tb_durable.durable_id')
								->where('tb_durable_repair.repair_id','=',$id)->first();

		return View::make('durable.repair_edit')
					->with(compact('dept','urgency','risk','important_work','ruin_type','technician','repair'));
	}

	public function postRepairEdit($id)
	{
		$input = Input::all();
		$dd = new DateTime('NOW');
		$y = $dd->format('Y');
		$m = $dd->format('m');
		$d = $dd->format('d');


		$repair = DurableRepair::find($id);
		$repair->repair_id_dept = $input['repair_id_dept'];
		$repair->dept_id = $input['dept_id'];
		$repair->sub_dept_id = $input['sub_dept_id'];
		$repair->repair_date = \Helpers\Helper::fromJSDate(Input::get('hdd_repair_date'));
		// $repair->sub_dept2 = $input['sub_dept2'];
		// $repair->tel = $input['tel'];
		if(Input::has('urgency')) $repair->urgency = $input['urgency'];
		if(Input::has('risk')) $repair->risk = $input['risk'];
		if(Input::has('important_work')) $repair->important_work = $input['important_work'];
		if(Input::has('amount')) $repair->amount = $input['amount'];
		$repair->repair_type = $input['repair_type'];
		$repair->ruin_type = $input['ruin_type'];
		$repair->symptom = $input['symptoms_id'];
		$repair->ruin = $input['ruin'];
		$repair->durable_id = $input['durable_id'];
		$repair->repair_name = $input['repair_name'];
		$repair->repair_get_name = $input['repair_get_name'];
		$repair->repair_status_report = '0';
		$repair->repair_status = '0';
		$repair->insert_from_ip = $_SERVER['REMOTE_ADDR'];
		$repair->insert_id = 1;/////
		$repair->repair_technician_name = $input['repair_techician_name'];

		$repair->save();


		
		return Redirect::to('durable/repair-list');
	}

	public function getRepairCreate($timestamp="0")
	{
		$dept = DB::table('tb_dept')->where('dept_status','=','1')->orderBy('dept_name','asc')->get();
		$urgency = DB::table('tb_urgency')->get();
		$risk = DB::table('tb_risk')->get();
		$important_work = DB::table('tb_important_work')->get();
		$ruin_type = DB::table('tb_ruin_type')->where('ruin_type_status','=','1')->orderBy('ruin_type_order','asc')->get();
		$technician = DB::table('tb_technical')->where('technic_status','=','1')->get();

		return View::make('durable.repair_create')
					->with(compact('dept','urgency','risk','important_work','ruin_type','technician'));
	}

	public function postRepairCreate($timestamp="0")
	{
		$input = Input::all();
		$dd = new DateTime('NOW');
		$y = $dd->format('Y');
		$m = $dd->format('m');
		$d = $dd->format('d');

		

		if($m >= 10){
			$btw1 = $y."-10-01";
			$btw2 = ($y+1)."-09-30";
			$slash = substr($y+544,2,2);
		}
		if($m < 10){
			$btw1 = ($y-1)."-10-01";
			$btw2 = ($y)."-09-30";
			$slash = substr($y+543,2,2);
		}	
		$num = DB::table('tb_durable_repair')->whereBetween('repair_date',array($btw1,$btw2))->max('id_get_year')+1;
		$auto_set = DB::table('tb_durable_repair')->select('auto_set_get_name')->orderBy('repair_id','desc')->take(1)->get();

		switch ($auto_set) {
			case '':
				$next_auto_set = "1";
				break;
			case '1':
				$next_auto_set = "2";
				break;

			default:
				$next_auto_set = "1";
				break;
		}

		
		$get_id = str_pad($num, 5, '0', STR_PAD_LEFT);
		$s = $get_id."/".$slash;


		$repair = new DurableRepair;
		$repair->id_get_year = $num;
		$repair->repair_id_get = $s;
		$repair->repair_id_dept = $input['repair_id_dept'];
		$repair->repair_date = \Helpers\Helper::fromJSDate(Input::get('hdd_repair_date'));
		$repair->dept_id = $input['dept_id'];
		$repair->sub_dept_id = $input['sub_dept_id'];
		// $repair->sub_dept2 = $input['sub_dept2'];
		// $repair->tel = $input['tel'];
		if(Input::has('urgency')) $repair->urgency = $input['urgency'];
		if(Input::has('risk')) $repair->risk = $input['risk'];
		if(Input::has('important_work')) $repair->important_work = $input['important_work'];
		if(Input::has('amount')) $repair->amount = $input['amount'];
		$repair->repair_type = $input['repair_type'];
		$repair->ruin_type = $input['ruin_type'];
		$repair->ruin = $input['ruin'];
		$repair->durable_id = $input['durable_id'];
		$repair->repair_name = $input['repair_name'];
		$repair->repair_get_name = $input['repair_get_name'];
		$repair->repair_status_report = '0';
		$repair->repair_status = '0';
		$repair->insert_date = $dd->format('Y-m-d');
		$repair->insert_time = $dd->format('H:i:s');
		$repair->insert_from_ip = $_SERVER['REMOTE_ADDR'];
		$repair->insert_id = 1;/////
		$repair->auto_set_get_name = $next_auto_set;
		$repair->callcenter_date = \Carbon\Carbon::createFromTimeStamp(Crypt::decrypt($timestamp))->toDateTimeString();
		$repair->repair_technician_name = $input['repair_techician_name'];

		$repair->save();

		return Redirect::to('durable/repair-list'.'#'.$repair->repair_id);
	}
	

	public function getRepairReportAdd($repair_id)
	{

		$dept = DB::table('tb_dept')->where('dept_status','=','1')->orderBy('dept_name','asc')->get();
		$urgency = DB::table('tb_urgency')->get();
		$risk = DB::table('tb_risk')->get();
		$important_work = DB::table('tb_important_work')->get();
		$ruin_type = DB::table('tb_ruin_type')->where('ruin_type_status','=','1')->orderBy('ruin_type_order','asc')->get();
		$technician = DB::table('tb_technical')->where('technic_status','=','1')->get();

		$cause_id = DB::table('tb_cause')->where('cause_status','=','1')->orderBy('cause_id','asc')->get();
		$repair_out_status = DB::table('repair_out_status')->get();
		$repair_status = DB::table('tb_repair_status')->orderBy('repair_status_id')->get();
		$store = DB::table('tb_store')->where('store_status','=','1')->orderBy('store_name','desc')->get();
		$repair = DurableRepair::leftJoin('tb_durable','tb_durable.durable_id','=','tb_durable_repair.durable_id')
								->selectRaw('tb_durable_repair.*,tb_durable.durable_barcode,tb_durable.durable_name,tb_durable.durable_id')
								->where('tb_durable_repair.repair_id','=',$repair_id)->first();

		if($repair->repair_technician_get_date== ""){
			$repair->repair_technician_get_date = date('Y-m-d H:i:s');
			$repair->save();
		}

		return View::make('durable.repair_report_add')
					->with(compact('dept','urgency','risk','important_work','repair_status','store',
									'ruin_type','technician','repair','repair_out_status','cause_id'));


	}
	public function postRepairReportAdd($repair_id)
	{
		$repair =  DurableRepair::find($repair_id);
		$repair->repair_opr = Input::get('repair_opr');
		$repair->repair_result = Input::get('repair_result');
		$repair->repair_result_detail1 = Input::get('repair_result_detail1');
		$repair->repair_device_type = Input::get('repair_device_type','');
		$repair->repair_result_detail3 = Input::get('repair_result_detail3');
		
		
		$repair->repair_out = Input::get('repair_out','0');
		$repair->repair_in = Input::get('repair_in','0');
		$repair->buy_replace = Input::get('buy_replace','0');
		
		$repair->repair_location = Input::get('repair_location');
		$repair->repair_location_name = Input::get('repair_location_name');
		$repair->repair_location_tel = Input::get('repair_location_tel');
		if(Input::has('hdd_repair_date_end')){
			$repair->repair_date_end = \Helpers\Helper::fromJSDate(Input::get('hdd_repair_date_end'));
		}
		$repair->repair_price_about = Input::get('repair_price_about');
		$repair->repair_out_status = Input::get('repair_out_status');
		$repair->repair_out_problem = Input::get('repair_out_problem');
		$repair->cause_id = Input::get('cause_id');
		$repair->repair_cost = 0;
		if(Input::has('repair_cost'))
			$repair->repair_cost = Input::get('repair_cost');

		$repair->repair_comment = Input::get('repair_comment');
		$repair->insert_report_date = date("Y-m-d");
		$repair->insert_report_time = date("H:i:s");
		$repair->insert_report_id = Sentry::getUser()->id;

		$repair->repair_status_report = '1';
		$repair->repair_status = Input::get('repair_status');

		$repair->ruin_type = Input::get('ruin_type');
		$repair->symptom = Input::get('symptoms_id');


		$repair->save();


		if($repair->repair_result == "3" && $repair->repair_out == "1")
		{
			return Redirect::to('durable/repair-out');
		}

		return Redirect::to('durable/repair-list'.'#'.$repair->repair_id);
	}

	public function getRepairOut()
	{
		return View::make('durable.repair_out');
	}

	public function getRepairOutList($status_id)
	{
		$search = Input::get('search.value');
		$start = Input::get('start',0);
		$draw = Input::get('draw',0);

		$data  =  DurableRepair::leftJoin('tb_durable as td','tb_durable_repair.durable_id','=','td.durable_id')
								->leftJoin('tb_sub_dept as tsd','tb_durable_repair.sub_dept_id','=','tsd.sub_dept_id')
								->select('tb_durable_repair.repair_id','tb_durable_repair.repair_date','tb_durable_repair.durable_id','td.durable_name','tb_durable_repair.repair_name','tb_durable_repair.sub_dept_id','tsd.sub_dept_name','tb_durable_repair.sub_dept2','tb_durable_repair.repair_status_report')
								->where('tb_durable_repair.repair_out','=','1')
								->where('repair_out_status',"=",'')->orderBy('tb_durable_repair.repair_id','desc')
								->skip($start)->take(20)->get()->toArray();
								
		$data_count = DurableRepair::where('repair_out','=','1')->where('repair_out_status',"=",'')->count();
		$result_user = array();
		$recordsfiltered = $data_count;
		if(Input::has('search.value')==true)
			$recordsfiltered = count($data);
		
		$result = array('draw'=>$draw,'recordsTotal'=>$data_count ,'recordsFiltered'=>$recordsfiltered ,'data'=>$data);
		return $result;
	}

	public function getRepairOutPrint($repair_id)
	{

		$repair  =  DurableRepair::leftJoin('tb_durable','tb_durable_repair.durable_id','=','tb_durable.durable_id')
								->leftJoin('tb_brand','tb_brand.brand_id','=','tb_durable.brand_id')
								->select('tb_durable_repair.durable_id','tb_durable_repair.repair_location','tb_durable_repair.repair_location_name','tb_durable_repair.repair_location_tel','tb_durable.durable_name','tb_brand.brand_name','tb_durable.durable_model','tb_durable_repair.ruin','tb_durable.serial_number')
								->where('tb_durable_repair.repair_id','=',$repair_id)
								->first();

		return View::make('durable.repair_out_print')
					->with(compact('repair'));
	}

	public function getRepairReportAddAjax($repair_id)
	{

		$device  = DurableRepairDevice::where('repair_id','=',$repair_id)->get()->toArray();
		$result = array('draw'=>Input::get('draw'),'recordsTotal'=>count($device) ,'recordsFiltered'=>count($device) ,'data'=>$device);
		return $result;
	}

	public function getRepairPrint($repair_id)
	{
		$ymdnow = date("Y-m-d");
		$tnow = date("H:i:s");
		$job = DurableRepair::find($repair_id);
		if ($job->close_job_time == "" || $job->close_job_time == "00:00:00") {
			$sqlu = "UPDATE tb_durable_repair SET close_job_date = '$ymdnow', close_job_time = '$tnow'";
			$job->close_job_date = $ymdnow;
			$job->close_job_time = $tnow;
			$job->save();
		}

		$repair  = DurableRepair::leftJoin('tb_sub_dept','tb_sub_dept.sub_dept_id','=','tb_durable_repair.sub_dept_id')
								->leftJoin('tb_durable','tb_durable.durable_id','=','tb_durable_repair.durable_id')
								->leftJoin('tb_durable_kind', function($join)
						        {
						            $join->on('tb_durable_kind.durable_type_id', '=', 'tb_durable.durable_type_id')
						            	->on('tb_durable.durable_kind_id','=','tb_durable_kind.durable_kind_id');
						        })
						        ->leftJoin('tb_brand','tb_brand.brand_id','=','tb_durable.brand_id')
						        ->leftJoin('tb_technical','tb_technical.technic_id','=','tb_durable_repair.repair_get_name')
						        ->leftJoin('tb_technical as t2','t2.technic_id','=','tb_durable_repair.repair_care')
						        ->leftJoin('tb_cause','tb_cause.cause_id','=','tb_durable_repair.cause_id')
						        ->select('tb_durable_repair.repair_id_get','tb_durable_repair.repair_date','tb_durable_repair.insert_time','tb_durable.sub_dept_id','tb_sub_dept.sub_dept_name','tb_durable_repair.sub_dept2','tb_durable_repair.repair_type','tb_durable_kind.durable_kind_sname','tb_durable_repair.amount','tb_durable.durable_date','tb_durable.durable_price','tb_brand.brand_name','tb_durable.durable_model','tb_durable_repair.durable_id','tb_durable_repair.ruin','tb_durable_repair.repair_name','tb_durable_repair.repair_device_send',DB::raw('tb_technical.technic_name AS get_name'),'tb_durable_repair.repair_opr','tb_durable_repair.repair_result','tb_durable_repair.repair_result_detail1','tb_durable_repair.repair_device_type','tb_durable_repair.repair_result_detail3','tb_durable_repair.repair_out','tb_durable_repair.repair_in','tb_durable_repair.buy_replace','tb_durable.durable_location','tb_durable_repair.repair_location_tel','tb_durable_repair.repair_date_end','tb_durable_repair.repair_price_about','t2.technic_name','tb_durable_repair.close_job_date','tb_durable_repair.close_job_time','tb_cause.cause_name','tb_durable_repair.approve_status','tb_durable_repair.approve_detail','tb_durable_repair.approve_name','tb_durable_repair.approve_date')
						        ->where('tb_durable_repair.repair_id','=',$repair_id)->first();
		$device = DurableRepairDevice::select('device_list','device_size','device_amount')->where('repair_id','=',$repair_id)->get();

		return View::make('durable.repair_print')
				->with(compact('repair','device'));
	}

	public function deleteRepairReportDevice($device_id)
	{
		return DurableRepairDevice::destroy($device_id);
	}
	public function putRepairReportDevice($repair_id)
	{
		try {
			$device = new DurableRepairDevice;
			$device->repair_id = $repair_id;
			$device->device_list = Input::get('device_list');
			$device->device_size = Input::get('device_size');
			$device->device_amount = Input::get('device_amount');
			$device->price_unit = Input::get('price_unit');
			$device->price_total = Input::get('price_total');
			$device->confirm_device_date = date('Y-m-d');
			$device->status_device = 0;
			$device->save();

		} catch (Exception $e) {
			return json_encode(array('record'=>false));
		}
		return json_encode(array('record'=>true));
	}
	

	public function getDurableInfo()
	{
		if(Request::ajax())
		{
			$result =  DB::table('tb_durable')
				->select('durable_barcode','durable_id','durable_name','sub_dept_name')
				->leftJoin('tb_sub_dept','tb_durable.sub_dept_id','=','tb_sub_dept.sub_dept_id')
				->where('durable_status','=','1')
				->orderBy('sub_dept_name','durable_name');

				if(Input::has('dept_id'))
					$result->where('tb_durable.dept_id','=',Input::get('dept_id'));
				if(Input::has('sub_dept_id'))
					$result->where('tb_durable.sub_dept_id','=',Input::get('sub_dept_id'));
				if(Input::has('search')){
					$result->whereRaw('(durable_barcode like "%'.Input::get('search').'%" or durable_id like "%'.Input::get('search').'%" or durable_name like "%'.Input::get('search').'%")');
				}

				$result->take(10);
			return $result->get();
		}
	}

	public function getAutocomplete()
	{
		// $array = array(array('id'=>1,'sname'=>'2'),array('id'=>2,'sname'=>'52'));
		// //DB::table('tb_item_complete')->get()

		return Response::json(DB::table('tb_item_complete')->get());

	}
	public function getAjax($status_id)
	{
		$search = Input::get('search.value');
		$start = Input::get('start',0);
		$draw = Input::get('draw',0);
		$length = Input::get('length');

		$users  =  $this->getDurable($status_id,$start,$length,$search)->toArray();


		$user_count = DurableRepair::where('repair_status','=',$status_id)->count();
		$result_user = array();
		$recordsfiltered = $user_count;
		if(Input::has('search.value')==true)
			$recordsfiltered = count($users);
		// foreach ($users as $key => $user) {
		// 	$a = $users[$key];
		// 	array_push($result_user, array_values((array)$a));
		// }

		$result = array('draw'=>$draw,'recordsTotal'=>$user_count ,'recordsFiltered'=>$recordsfiltered ,'data'=>$users);
		return $result;
	}

	private function getDurable($status_id,$skip,$take=20,$search="")
	{
		//sleep(1);
		$durable_repair = DurableRepair::leftJoin('tb_sub_dept as sd','tb_durable_repair.sub_dept_id','=','sd.sub_dept_id')
					->leftJoin('tb_durable as td','tb_durable_repair.durable_id','=','td.durable_id')
					->leftJoin('tb_repair_status as trs','tb_durable_repair.repair_status','=','trs.repair_status_id')
					->select('tb_durable_repair.repair_id', 'tb_durable_repair.repair_date', 'tb_durable_repair.durable_id', 'tb_durable_repair.repair_name', 'tb_durable_repair.sub_dept_id', 'sd.sub_dept_name', 'tb_durable_repair.sub_dept2', 'tb_durable_repair.ruin', 'tb_durable_repair.repair_status_report', 'tb_durable_repair.repair_status', 'tb_durable_repair.repair_result', 'tb_durable_repair.repair_out', 'tb_durable_repair.buy_replace', 'tb_durable_repair.repair_out_status', 'trs.repair_status_name', 'tb_durable_repair.approve_status', 'tb_durable_repair.close_job_date')
					->whereNotNull('tb_durable_repair.repair_id')
					->where('tb_durable_repair.repair_status','=',$status_id)
					->orderBy('tb_durable_repair.repair_date','desc')
					->orderBy('tb_durable_repair.repair_id','desc');

		if(is_null($search)==false){
			$durable_repair->Where(function($query) use ($search)
            {
                $query->where('tb_durable_repair.ruin','like','%'.$search.'%')
                      ->orWhere('tb_durable_repair.repair_id','like','%'.$search.'%');
            });
		}


		return $durable_repair->skip($skip)->take($take)->get();
	}


}