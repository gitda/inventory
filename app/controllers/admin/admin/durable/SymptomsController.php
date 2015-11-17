<?php
namespace admin\durable;

use Input;
use RuinTypeStatus;
use View;
use Symptoms;
use DB;

class SymptomsController extends \BaseController {

	public function getIndex()
	{
		$ruin_type = RuinTypeStatus::leftJoin('symptom','symptom.ruin_type_id','=','tb_ruin_type.ruin_type_id')
						->select('tb_ruin_type.*',DB::raw('count(distinct symptom.symptom_id) as child_count'))
						->groupBy('tb_ruin_type.ruin_type_id')
						->orderBy('ruin_type_status','desc')->orderBy('ruin_type_order','asc')->get();

		return View::make('admin.durable.symptoms.index')
				->with(compact('ruin_type'));
	}

	public function getInitSymptomForm($sid="")
	{
		return Symptoms::find($sid);

	}
	public function postInitSymptomForm()
	{
		if(Input::get('hdd-mode')=="edit")
		{
			$sym = Symptoms::find(Input::get('hdd-symptom-id'));
			$sym->symptom_name = Input::get('frm-symptoms-name');
			$sym->ruin_type_id = Input::get('hdd-ruin-type');
			$sym->is_status = Input::get('frm-symptoms-status',0);
			$sym->save();
			return $sym;
		}else if(Input::get('hdd-mode')=="new")
		{
			$sym = new Symptoms;
			$sym->symptom_name = Input::get('frm-symptoms-name');
			$sym->ruin_type_id = Input::get('hdd-ruin-type');
			$sym->is_status = Input::get('frm-symptoms-status',0);
			$sym->save();
			return $sym;
		}

		return Input::all();

	}

	public function getRuinsubtype($ruin_type="")
	{
		$search = Input::get('search.value');
		$start = Input::get('start',0);
		$draw = Input::get('draw',0);
		// first initial 
		$result = array('draw'=>Input::get('draw'),'recordsTotal'=>0,'recordsFiltered'=>0 ,'data'=>array());
		if(is_null($ruin_type))
			return $result;

		// on click top table
		$data_count = Symptoms::where('ruin_type_id','=',$ruin_type)->count();

		$symptom = Symptoms::where('ruin_type_id','=',$ruin_type);
		if(is_null($search)==false)
			$symptom->where('symptom_name','like','%'.$search.'%');

		$symptom =	$symptom->get()->toArray();
		$recordsFiltered = count($symptom);

		$result = array('draw'=>$draw,'recordsTotal'=>$data_count,'recordsFiltered'=>$recordsFiltered  ,'data'=>$symptom);
		return $result;
	}



}