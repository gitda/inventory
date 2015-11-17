<?php

class HelpdeskController extends BaseController {

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
	public function getHelpList()
	{
		return View::make('helpdesk.help_list');
	}

	public function getHelpCreate($timestamp="0")
	{
		$reslove_type = DB::table('reslove_type')->get();
		$technician = DB::table('tb_technical')->where('technic_status','=','1')->get();
		$sub_dept = DB::table('tb_sub_dept')->select('sub_dept_id','sub_dept_name')->where('sub_dept_status','=','1')->get();
		$cause = DB::table('tb_cause')->get();
		$workbench = DB::table('tb_workbench')->where('is_status','=','1')->get();
		$helptype = DB::table('helpdesk_type')->get();
		$help_result = DB::table('help_result')->get();

		$forward_type = ForwardType::where('is_status','=','1')->get();
		$ruin_type = RuinTypeStatus::where('ruin_type_status','=','1')->get();



		return View::make('helpdesk.help_create')
					->with(compact('technician','reslove_type','sub_dept','cause','workbench','helptype','help_result','ruin_type','forward_type'));
	}
	public function getAjax()
	{
		$search = Input::get('search.value');
		$start = Input::get('start',0);
		$draw = Input::get('draw',0);

		$helpdesk = Helpdesk::leftJoin('reslove_type as rt','rt.reslove_type','=','helpdesk.reslove_type')
					->leftJoin('tb_technical as tt','tt.technic_id','=','helpdesk.staff_id')
					->orderBy('id','desc')
					->skip($start)->take(20);

		if(is_null($search)==false)
			$helpdesk->where('helpdesk.help_description','like','%'.$search.'%');

		$helpdesk =	$helpdesk->get()->toArray();

		$data_count = Helpdesk::count();
		$result_helpdesk = array();
		$recordsfiltered = $data_count;

		if(Input::has('search.value')==true)
			$recordsfiltered = count($helpdesk);

		$result = array('draw'=>$draw,'recordsTotal'=>$data_count ,'recordsFiltered'=>$recordsfiltered ,'data'=>$helpdesk);
		return $result;
	}

	public function postHelpCreate($_timestamp=0)
	{
		//return Input::all();

		$reslove_type = Input::get('reslove_type');
		$workbench =  Input::get('workbench');
		$timestamp = Crypt::decrypt($_timestamp);
		$dept_id =  DB::table('tb_sub_dept')->where('sub_dept_id','=', Input::get('sub_dept_id'))->pluck('dept_id');//Input::all();
		
		$helpdesk = new Helpdesk;
		$helpdesk->help_description = Input::get('help_description');
		$helpdesk->helpdesk_type_id = Input::get('ruin_type_id');
		$helpdesk->symptom_id = Input::get('symptoms_id');
		$helpdesk->dept_id = $dept_id;
		$helpdesk->sub_dept_id = Input::get('sub_dept_id');
		$helpdesk->help_date = date('Y-m-d H:i:s');
		if($timestamp>0)
			$helpdesk->callcenter_date = \Carbon\Carbon::createFromTimeStamp($timestamp)->toDateTimeString();
		$helpdesk->contact_name = Input::get('contact_name');
		$helpdesk->reslove_type = $reslove_type;
		$helpdesk->staff_id = Input::get('staff_id');
		$helpdesk->help_note = Input::get('help_note');
		$helpdesk->cause = null;
		$helpdesk->workbench = null;
		$helpdesk->help_result = Input::get('help_result');
		$helpdesk->forward_type = Input::get('forward_type');
		$helpdesk->helpdesk_web_type = 1;

		if($reslove_type=='1')
		{
			$helpdesk->cause = Input::get('cause');
		}
		else if($reslove_type=='2')
		{
			$helpdesk->workbench = $workbench;
		}

		$helpdesk->save();



		if($reslove_type=='2')
		{
			switch($workbench)
			{
				case "1":

					$redirect = "helpdesk/help-fix/".Crypt::encrypt($helpdesk->id);
					break;
				case "2":
					$redirect = "helpdesk/help-list";
					break;
				case "3":
					$redirect = "helpdesk/help-list";
					break;
				default:
					$redirect = "helpdesk/help-list";
					break;
			}
			return Redirect::to($redirect);
		}	



		return Redirect::to('helpdesk/help-list');
	}
	public function getHelpEdit($helpdesk_id)
	{
		$helpid = Crypt::decrypt($helpdesk_id);

		$reslove_type = DB::table('reslove_type')->get();
		$technician = DB::table('tb_technical')->where('technic_status','=','1')->get();
		$sub_dept = DB::table('tb_sub_dept')->select('sub_dept_id','sub_dept_name')->where('sub_dept_status','=','1')->get();
		$cause = DB::table('tb_cause')->get();
		$workbench = DB::table('tb_workbench')->where('is_status','=','1')->get();
		$helpdesk = Helpdesk::find($helpid);
		$helptype = DB::table('helpdesk_type')->get();
		$help_result = DB::table('help_result')->get();
		$ruin_type = RuinTypeStatus::where('ruin_type_status','=','1')->get();
		$forward_type = ForwardType::where('is_status','=','1')->get();

		return View::make('helpdesk.help_edit')
					->with(compact('technician','reslove_type','sub_dept','cause','workbench','helpdesk','helptype','help_result','ruin_type','forward_type'));

	}
	public function getHelpEditRedirect($helpdesk_id)
	{
		return Redirect::to('helpdesk/help-edit/'.Crypt::encrypt($helpdesk_id));
	}
	public function postHelpEdit($helpid)
	{
		$reslove_type = Input::get('reslove_type');
		$workbench =  Input::get('workbench');
		$forward_type = Input::get('forward_type');
		$dept_id =  DB::table('tb_sub_dept')->where('sub_dept_id','=', Input::get('sub_dept_id'))->pluck('dept_id');//Input::all();
		
		$helpdesk = Helpdesk::find(Crypt::decrypt($helpid));

		$wb = $helpdesk->workbench;
		$helpdesk->help_description = Input::get('help_description');
		$helpdesk->dept_id = $dept_id;
		$helpdesk->helpdesk_type_id = Input::get('ruin_type_id');
		$helpdesk->symptom_id = Input::get('symptoms_id');
		$helpdesk->sub_dept_id = Input::get('sub_dept_id');
		$helpdesk->contact_name = Input::get('contact_name');
		$helpdesk->reslove_type = $reslove_type;
		$helpdesk->staff_id = Input::get('staff_id');
		$helpdesk->help_note = Input::get('help_note');
		$helpdesk->cause = null;
		$helpdesk->workbench = null;
		$helpdesk->help_result = Input::get('help_result');
		$helpdesk->forward_type = null;
		$helpdesk->help_date = date('Y-m-d H:i:s');

		if(!is_null($forward_type))
		{
			$helpdesk->forward_type = $forward_type;
		}

		if($reslove_type=='1')
		{
			$helpdesk->cause = Input::get('cause');
		}
		else if($reslove_type=='2')
		{
			$helpdesk->workbench = $workbench;
		}

		$helpdesk->save();
		if($reslove_type=='2')
		{
			switch($workbench)
			{
				case "1":
					if($wb<>null){
						$redirect = "helpdesk/help-list";
					}else{
						$redirect = "helpdesk/help-fix/".Crypt::encrypt($helpdesk->id);
					}
					break;
				case "2":
					$redirect = "helpdesk/help-list";
					break;
				case "3":
					$redirect = "helpdesk/help-list";
					break;
				default:
					$redirect = "helpdesk/help-list";
					break;
			}
			return Redirect::to($redirect);
		}	



		return Redirect::to('helpdesk/help-list');
	}

	public function getHelpFix($helpdesk_id,$repair_id="")
	{

		$helpdesk = Helpdesk::find(Crypt::decrypt($helpdesk_id));
		$ruin_type = DB::table('tb_ruin_type')->where('ruin_type_status','=','1')->orderBy('ruin_type_order','asc')->get();
		$dept = DB::table('tb_dept')->where('dept_status','=','1')->orderBy('dept_name','asc')->get();
		
		$urgency = DB::table('tb_urgency')->get();
		$risk = DB::table('tb_risk')->get();
		$important_work = DB::table('tb_important_work')->get();


		$hsub_dept = DB::table('tb_sub_dept')->where('sub_dept_id','=',$helpdesk->sub_dept_id)->first();
		$hdept = DB::table('tb_dept')->where('dept_id','=',$hsub_dept->dept_id)->first();

		$repair = "";
		if($repair_id != ""){
			$repair = DurableRepair::find($repair_id)->toArray();
		}
		
		return View::make('helpdesk.help_fix')
					->with(compact('helpdesk','ruin_type','hsub_dept','hdept','dept','repair','urgency','risk','important_work'));
	}
	public function postHelpFix()
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

		$s = $num."/".$slash;
		$get_id = str_pad($num, 5, '0', STR_PAD_LEFT);

		$dr = new DurableRepair;
		$dr->id_get_year = $num;
		$dr->repair_id_get = $get_id."/".$slash;
		$dr->repair_date = $dd->format('Y-m-d');
		$dr->dept_id = $input['dept_id'];
		$dr->sub_dept_id = $input['sub_dept_id'];
		$dr->sub_dept2 = $input['sub_dept_name'];
		$dr->tel = $input['tel'];
		$dr->repair_type = '1';
		$dr->ruin_type = $input['ruin_type_id'];
		$dr->ruin = $input['ruin'];
		$dr->repair_name = $input['contact_name'];
		$dr->repair_status_report = '0';
		$dr->repair_status = '0';
		$dr->insert_date = $dd->format('Y-m-d');
		$dr->insert_time = $dd->format('H:i:s');
		$dr->insert_from_ip = $_SERVER['REMOTE_ADDR'];
		$dr->auto_set_get_name = $next_auto_set;
		$dr->symptom = $input['symptoms_id'];
		$dr->urgency = $input['urgency'];
		$dr->important_work = $input['important_work'];
		$dr->risk = $input['risk'];
		$dr->save();

		$helpdesk = Helpdesk::find($input['helpdesk_id']);
		$helpdesk->repair_id = $dr->repair_id;
		$helpdesk->save();


		return Redirect::to('helpdesk/help-message/'.Crypt::encrypt($dr->repair_id));

	}
	public function getHelpMessage($id)
	{
		$repair = DurableRepair::find(Crypt::decrypt($id));
		$dept_name = DB::table('tb_dept')->where('dept_id','=',$repair->dept_id)->first()->dept_name;
		$technical_name = DB::table('tb_technical')->where('technic_id','=',$repair->repair_technician_name)->first();

		return View::make('helpdesk.help_message')
					->with(compact('repair','dept_name','technical_name'));
	}
	public function getHelpElerning()
	{
		
	}
	public function getHelpInfo()
	{
		
	}




}