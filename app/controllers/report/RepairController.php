<?php
namespace report;

use DB;
use DurableRepair;
use Input;
use View;
use Helpers\Helper;

class RepairController extends \BaseController {


	public function getRecieve()
	{
		return View::make('report.recieve');
	}
	public function getRecieveData($ds1,$ds2)
	{
		$search = Input::get('search.value');
		$start = Input::get('start',0);
		$draw = Input::get('draw',0);

		$drepair = DurableRepair::whereBetween('repair_date',array($ds1,$ds2))
				->select('tb_durable_kind.durable_kind_name','tb_durable_repair.durable_id','tb_sub_dept.sub_dept_name','tb_durable.durable_name','tb_durable.brand_id','tb_durable.durable_model','tb_durable.serial_number','symptom.symptom_name','tb_durable_repair.ruin','tb_durable_repair.repair_id')
				->leftJoin('tb_durable','tb_durable.durable_id','=','tb_durable_repair.durable_id')
				->leftJoin('tb_sub_dept','tb_sub_dept.sub_dept_id','=','tb_durable_repair.sub_dept_id')
				->leftJoin('symptom','symptom.symptom_id','=','tb_durable_repair.symptom')
				->leftJoin('tb_durable_kind', function($join)
		        {
		            $join->on('tb_durable_kind.durable_kind_id', '=', 'tb_durable.durable_kind_id')
		            	->on('tb_durable_kind.durable_type_id', '=', 'tb_durable.durable_type_id');
		        })
		        ->orderBy('tb_durable_repair.repair_id','desc')
				->skip($start)->take(20);

		$drepair =	$drepair->get()->toArray();

		$data_count = DurableRepair::whereBetween('repair_date',array($ds1,$ds2))->count();
		$recordsfiltered = $data_count;


		$result = array('draw'=>$draw,'recordsTotal'=>$data_count ,'recordsFiltered'=>$recordsfiltered ,'data'=>$drepair);
		return $result;
	}
	public function postRecieveExport()
	{
		$ds1 = Helper::fromFullDate(Input::get('ds1'));
		$ds2 = Helper::fromFullDate(Input::get('ds2'));


		$drepair = DurableRepair::whereBetween('repair_date',array($ds1,$ds2))
				->select('tb_durable_kind.durable_kind_name','tb_durable_repair.durable_id','tb_sub_dept.sub_dept_name','tb_durable.durable_name','tb_durable.brand_id','tb_durable.durable_model','tb_durable.serial_number','symptom.symptom_name','tb_durable_repair.ruin','tb_durable_repair.repair_id')
				->leftJoin('tb_durable','tb_durable.durable_id','=','tb_durable_repair.durable_id')
				->leftJoin('tb_sub_dept','tb_sub_dept.sub_dept_id','=','tb_durable_repair.sub_dept_id')
				->leftJoin('symptom','symptom.symptom_id','=','tb_durable_repair.symptom')
				->leftJoin('tb_durable_kind', function($join)
		        {
		            $join->on('tb_durable_kind.durable_kind_id', '=', 'tb_durable.durable_kind_id')
		            	->on('tb_durable_kind.durable_type_id', '=', 'tb_durable.durable_type_id');
		        })
		        ->orderBy('tb_durable_repair.repair_id','desc')->get()->toArray();

		if(Input::get('export')=='excel')
		{
			$export = 'recieve_excel';
		}else{
			$export = 'recieve_print';
		}

		return View::make('report.'.$export)
						->with(compact('drepair'))
						->withInput(Input::all());
	}

	public function getTechnician()
	{
		$technician = DB::table('tb_technical')->select('technic_id','technic_name')->where('technic_status','=','1')->get();
		return View::make('report.technician', compact('technician'));
	}

	public function getTechnicianData($tech="",$ds1="",$ds2="")
	{
		$search = Input::get('search.value');
		$start = Input::get('start',0);
		$draw = Input::get('draw',0);
		$technician = $tech;

		$drepair = DurableRepair::whereBetween('repair_date',array($ds1,$ds2))
				->select('tb_durable_kind.durable_kind_name','tb_durable_repair.durable_id','tb_sub_dept.sub_dept_name','tb_durable.durable_name','tb_durable.brand_id','tb_durable.durable_model','tb_durable.serial_number','symptom.symptom_name','tb_durable_repair.ruin','tb_durable_repair.repair_id','tb_technical.technic_name','tb_durable_repair.repair_technician_get_date',DB::raw('concat(tb_durable_repair.close_job_date," ",tb_durable_repair.close_job_time) as close_job_date'),DB::raw('datediff(concat(tb_durable_repair.close_job_date," ",tb_durable_repair.close_job_time),tb_durable_repair.repair_technician_get_date) as datediffs'))
				->leftJoin('tb_durable','tb_durable.durable_id','=','tb_durable_repair.durable_id')
				->leftJoin('tb_sub_dept','tb_sub_dept.sub_dept_id','=','tb_durable_repair.sub_dept_id')
				->leftJoin('symptom','symptom.symptom_id','=','tb_durable_repair.symptom')
				->leftJoin('tb_technical','tb_technical.technic_id','=','tb_durable_repair.repair_technician_name')
				->leftJoin('tb_durable_kind', function($join)
		        {
		            $join->on('tb_durable_kind.durable_kind_id', '=', 'tb_durable.durable_kind_id')
		            	->on('tb_durable_kind.durable_type_id', '=', 'tb_durable.durable_type_id');
		        })
		        ->where('repair_technician_name','=',$technician)
		        ->whereNotNull('close_job_date')
		        ->orderBy('tb_durable_repair.repair_id','desc')
				->skip($start)->take(20);

		$drepair =	$drepair->get()->toArray();

		$data_count = DurableRepair::whereBetween('repair_date',array($ds1,$ds2))->whereNotNull('close_job_date')->where('repair_technician_name','=',$technician)->count();
		$recordsfiltered = $data_count;


		$result = array('draw'=>$draw,'recordsTotal'=>$data_count ,'recordsFiltered'=>$recordsfiltered ,'data'=>$drepair);
		return $result;
	}

	public function postTechnicianExport()
	{
	    $ds1 = Helper::fromFullDate(Input::get('ds1'));
		$ds2 = Helper::fromFullDate(Input::get('ds2'));
		$technician = Input::get('technician');

		$drepair = DurableRepair::whereBetween('repair_date',array($ds1,$ds2))
				->select('tb_durable_kind.durable_kind_name','tb_durable_repair.durable_id','tb_sub_dept.sub_dept_name','tb_durable.durable_name','tb_durable.brand_id','tb_durable.durable_model','tb_durable.serial_number','symptom.symptom_name','tb_durable_repair.ruin','tb_durable_repair.repair_id','tb_technical.technic_name','tb_durable_repair.repair_technician_get_date',DB::raw('concat(tb_durable_repair.close_job_date," ",tb_durable_repair.close_job_time) as close_job_date'),DB::raw('datediff(concat(tb_durable_repair.close_job_date," ",tb_durable_repair.close_job_time),tb_durable_repair.repair_technician_get_date) as datediffs'))
				->leftJoin('tb_durable','tb_durable.durable_id','=','tb_durable_repair.durable_id')
				->leftJoin('tb_sub_dept','tb_sub_dept.sub_dept_id','=','tb_durable_repair.sub_dept_id')
				->leftJoin('symptom','symptom.symptom_id','=','tb_durable_repair.symptom')
				->leftJoin('tb_technical','tb_technical.technic_id','=','tb_durable_repair.repair_technician_name')
				->leftJoin('tb_durable_kind', function($join)
		        {
		            $join->on('tb_durable_kind.durable_kind_id', '=', 'tb_durable.durable_kind_id')
		            	->on('tb_durable_kind.durable_type_id', '=', 'tb_durable.durable_type_id');
		        })
		        ->where('repair_technician_name','=',$technician)
		        ->whereNotNull('close_job_date')
		        ->orderBy('tb_durable_repair.repair_id','desc')->get()->toArray();

		if(Input::get('export')=='excel')
		{
			$export = 'technician_excel';
		}else{
			$export = 'technician_print';
		}

		return View::make('report.'.$export)
						->with(compact('drepair'))
						->withInput(Input::all());
	}


	public function getJobDept()
	{
		$subdept = DB::table('tb_sub_dept')->select('sub_dept_id','sub_dept_name')->where('sub_dept_status','=','1')->get();
		return View::make('report.jobdept', compact('subdept'));
	}

	public function getJobDeptData($dept="",$ds1="",$ds2="")
	{
		$search = Input::get('search.value');
		$start = Input::get('start',0);
		$draw = Input::get('draw',0);
		$subdept = $dept;

		$drepair = DurableRepair::whereBetween('repair_date',array($ds1,$ds2))
				->select('tb_durable_kind.durable_kind_name','tb_durable_repair.repair_cost','tb_durable_repair.durable_id','tb_sub_dept.sub_dept_name','tb_durable.durable_name','tb_durable.brand_id','tb_durable.durable_model','tb_durable.serial_number','symptom.symptom_name','tb_durable_repair.ruin','tb_durable_repair.repair_id','tb_technical.technic_name','tb_durable_repair.repair_technician_get_date',DB::raw('concat(tb_durable_repair.close_job_date," ",tb_durable_repair.close_job_time) as close_job_date'),DB::raw('datediff(concat(tb_durable_repair.close_job_date," ",tb_durable_repair.close_job_time),tb_durable_repair.repair_technician_get_date) as datediffs'))
				->leftJoin('tb_durable','tb_durable.durable_id','=','tb_durable_repair.durable_id')
				->leftJoin('tb_sub_dept','tb_sub_dept.sub_dept_id','=','tb_durable_repair.sub_dept_id')
				->leftJoin('symptom','symptom.symptom_id','=','tb_durable_repair.symptom')
				->leftJoin('tb_technical','tb_technical.technic_id','=','tb_durable_repair.repair_technician_name')
				->whereNotNull('close_job_date')
				->leftJoin('tb_durable_kind', function($join)
		        {
		            $join->on('tb_durable_kind.durable_kind_id', '=', 'tb_durable.durable_kind_id')
		            	->on('tb_durable_kind.durable_type_id', '=', 'tb_durable.durable_type_id');
		        });

		if($subdept!="all"){
			$drepair = $drepair->where('tb_durable_repair.sub_dept_id','=',$subdept);
		}
		$drepair = $drepair->orderBy('tb_durable_repair.sub_dept_id','desc')->skip($start)->take(20);

		$drepair =	$drepair->get()->toArray();

		$data_count = DurableRepair::whereBetween('repair_date',array($ds1,$ds2))->whereNotNull('close_job_date');
		if($subdept!="all"){
			$data_count = $data_count->where('sub_dept_id','=',$subdept);
		}
		$data_count = $data_count->count();

		$recordsfiltered = $data_count;


		$result = array('draw'=>$draw,'recordsTotal'=>$data_count ,'recordsFiltered'=>$recordsfiltered ,'data'=>$drepair);
		return $result;
	}

	public function postJobDeptExport()
	{
		$ds1 = Helper::fromFullDate(Input::get('ds1'));
		$ds2 = Helper::fromFullDate(Input::get('ds2'));
		$subdept = Input::get('subdept');

		$drepair = DurableRepair::whereBetween('repair_date',array($ds1,$ds2))
				->select('tb_durable_kind.durable_kind_name','tb_durable_repair.repair_cost','tb_durable_repair.durable_id','tb_sub_dept.sub_dept_name','tb_durable.durable_name','tb_durable.brand_id','tb_durable.durable_model','tb_durable.serial_number','symptom.symptom_name','tb_durable_repair.ruin','tb_durable_repair.repair_id','tb_technical.technic_name','tb_durable_repair.repair_technician_get_date',DB::raw('concat(tb_durable_repair.close_job_date," ",tb_durable_repair.close_job_time) as close_job_date'),DB::raw('datediff(concat(tb_durable_repair.close_job_date," ",tb_durable_repair.close_job_time),tb_durable_repair.repair_technician_get_date) as datediffs'))
				->leftJoin('tb_durable','tb_durable.durable_id','=','tb_durable_repair.durable_id')
				->leftJoin('tb_sub_dept','tb_sub_dept.sub_dept_id','=','tb_durable_repair.sub_dept_id')
				->leftJoin('symptom','symptom.symptom_id','=','tb_durable_repair.symptom')
				->leftJoin('tb_technical','tb_technical.technic_id','=','tb_durable_repair.repair_technician_name')
				->whereNotNull('close_job_date')
				->leftJoin('tb_durable_kind', function($join)
		        {
		            $join->on('tb_durable_kind.durable_kind_id', '=', 'tb_durable.durable_kind_id')
		            	->on('tb_durable_kind.durable_type_id', '=', 'tb_durable.durable_type_id');
		        });

		if($subdept!="all"){
			$drepair = $drepair->where('tb_durable_repair.sub_dept_id','=',$subdept);
		}
		$drepair = $drepair->orderBy('tb_durable_repair.sub_dept_id','desc')->get()->toArray();

		if(Input::get('export')=='excel')
		{
			$export = 'jobdept_excel';
		}else{
			$export = 'jobdept_print';
		}

		return View::make('report.'.$export)
						->with(compact('drepair'))
						->withInput(Input::all());
	}







	public function getTechnicianNotsummary()
	{
		$technician = DB::table('tb_technical')->select('technic_id','technic_name')->where('technic_status','=','1')->get();
		return View::make('report.technician_notsummary', compact('technician'));
	}

	public function getTechnicianNotsummaryData($tech="",$ds1="",$ds2="")
	{
		$search = Input::get('search.value');
		$start = Input::get('start',0);
		$draw = Input::get('draw',0);
		$technician = $tech;

		$drepair = DurableRepair::whereBetween('repair_date',array($ds1,$ds2))
				->select('tb_durable_kind.durable_kind_name','tb_durable_repair.durable_id','tb_sub_dept.sub_dept_name','tb_durable.durable_name','tb_durable.brand_id','tb_durable.durable_model','tb_durable.serial_number','symptom.symptom_name','tb_durable_repair.ruin','tb_durable_repair.repair_id','tb_technical.technic_name','tb_durable_repair.repair_technician_get_date',DB::raw('concat(tb_durable_repair.close_job_date," ",tb_durable_repair.close_job_time) as close_job_date'),DB::raw('datediff(concat(tb_durable_repair.close_job_date," ",tb_durable_repair.close_job_time),tb_durable_repair.repair_technician_get_date) as datediffs'))
				->leftJoin('tb_durable','tb_durable.durable_id','=','tb_durable_repair.durable_id')
				->leftJoin('tb_sub_dept','tb_sub_dept.sub_dept_id','=','tb_durable_repair.sub_dept_id')
				->leftJoin('symptom','symptom.symptom_id','=','tb_durable_repair.symptom')
				->leftJoin('tb_technical','tb_technical.technic_id','=','tb_durable_repair.repair_technician_name')
				->leftJoin('tb_durable_kind', function($join)
		        {
		            $join->on('tb_durable_kind.durable_kind_id', '=', 'tb_durable.durable_kind_id')
		            	->on('tb_durable_kind.durable_type_id', '=', 'tb_durable.durable_type_id');
		        })
		        ->where('repair_technician_name','=',$technician)
		        ->whereNull('close_job_date')
		        ->orderBy('tb_durable_repair.repair_id','desc')
				->skip($start)->take(20);

		$drepair =	$drepair->get()->toArray();

		$data_count = DurableRepair::whereBetween('repair_date',array($ds1,$ds2))->whereNull('close_job_date')->where('repair_technician_name','=',$technician)->count();
		$recordsfiltered = $data_count;


		$result = array('draw'=>$draw,'recordsTotal'=>$data_count ,'recordsFiltered'=>$recordsfiltered ,'data'=>$drepair);
		return $result;
	}

	public function postTechnicianNotsummaryExport()
	{
	    $ds1 = Helper::fromFullDate(Input::get('ds1'));
		$ds2 = Helper::fromFullDate(Input::get('ds2'));
		$technician = Input::get('technician');

		$drepair = DurableRepair::whereBetween('repair_date',array($ds1,$ds2))
				->select('tb_durable_kind.durable_kind_name','tb_durable_repair.durable_id','tb_sub_dept.sub_dept_name','tb_durable.durable_name','tb_durable.brand_id','tb_durable.durable_model','tb_durable.serial_number','symptom.symptom_name','tb_durable_repair.ruin','tb_durable_repair.repair_id','tb_technical.technic_name','tb_durable_repair.repair_technician_get_date',DB::raw('concat(tb_durable_repair.close_job_date," ",tb_durable_repair.close_job_time) as close_job_date'),DB::raw('datediff(concat(tb_durable_repair.close_job_date," ",tb_durable_repair.close_job_time),tb_durable_repair.repair_technician_get_date) as datediffs'))
				->leftJoin('tb_durable','tb_durable.durable_id','=','tb_durable_repair.durable_id')
				->leftJoin('tb_sub_dept','tb_sub_dept.sub_dept_id','=','tb_durable_repair.sub_dept_id')
				->leftJoin('symptom','symptom.symptom_id','=','tb_durable_repair.symptom')
				->leftJoin('tb_technical','tb_technical.technic_id','=','tb_durable_repair.repair_technician_name')
				->leftJoin('tb_durable_kind', function($join)
		        {
		            $join->on('tb_durable_kind.durable_kind_id', '=', 'tb_durable.durable_kind_id')
		            	->on('tb_durable_kind.durable_type_id', '=', 'tb_durable.durable_type_id');
		        })
		        ->where('repair_technician_name','=',$technician)
		        ->whereNull('close_job_date')
		        ->orderBy('tb_durable_repair.repair_id','desc')->get()->toArray();

		if(Input::get('export')=='excel')
		{
			$export = 'technician_notsummary_excel';
		}else{
			$export = 'technician_notsummary_print';
		}

		return View::make('report.'.$export)
						->with(compact('drepair'))
						->withInput(Input::all());
	}



	public function getJobDeptNotsummary()
	{
		$subdept = DB::table('tb_sub_dept')->select('sub_dept_id','sub_dept_name')->where('sub_dept_status','=','1')->get();
		return View::make('report.jobdept_notsummary', compact('subdept'));
	}

	public function getJobDeptNotsummaryData($dept="",$ds1="",$ds2="")
	{
		$search = Input::get('search.value');
		$start = Input::get('start',0);
		$draw = Input::get('draw',0);
		$subdept = $dept;

		$drepair = DurableRepair::whereBetween('repair_date',array($ds1,$ds2))
				->select('tb_durable_kind.durable_kind_name','tb_durable_repair.repair_cost','tb_durable_repair.durable_id','tb_sub_dept.sub_dept_name','tb_durable.durable_name','tb_durable.brand_id','tb_durable.durable_model','tb_durable.serial_number','symptom.symptom_name','tb_durable_repair.ruin','tb_durable_repair.repair_id','tb_technical.technic_name','tb_durable_repair.repair_technician_get_date',DB::raw('concat(tb_durable_repair.close_job_date," ",tb_durable_repair.close_job_time) as close_job_date'),DB::raw('datediff(concat(tb_durable_repair.close_job_date," ",tb_durable_repair.close_job_time),tb_durable_repair.repair_technician_get_date) as datediffs'))
				->leftJoin('tb_durable','tb_durable.durable_id','=','tb_durable_repair.durable_id')
				->leftJoin('tb_sub_dept','tb_sub_dept.sub_dept_id','=','tb_durable_repair.sub_dept_id')
				->leftJoin('symptom','symptom.symptom_id','=','tb_durable_repair.symptom')
				->leftJoin('tb_technical','tb_technical.technic_id','=','tb_durable_repair.repair_technician_name')
				->whereNull('close_job_date')
				->leftJoin('tb_durable_kind', function($join)
		        {
		            $join->on('tb_durable_kind.durable_kind_id', '=', 'tb_durable.durable_kind_id')
		            	->on('tb_durable_kind.durable_type_id', '=', 'tb_durable.durable_type_id');
		        });

		if($subdept!="all"){
			$drepair = $drepair->where('tb_durable_repair.sub_dept_id','=',$subdept);
		}
		$drepair = $drepair->orderBy('tb_durable_repair.sub_dept_id','desc')->skip($start)->take(20);

		$drepair =	$drepair->get()->toArray();

		$data_count = DurableRepair::whereBetween('repair_date',array($ds1,$ds2))->whereNull('close_job_date');
		if($subdept!="all"){
			$data_count = $data_count->where('sub_dept_id','=',$subdept);
		}
		$data_count = $data_count->count();

		$recordsfiltered = $data_count;


		$result = array('draw'=>$draw,'recordsTotal'=>$data_count ,'recordsFiltered'=>$recordsfiltered ,'data'=>$drepair);
		return $result;
	}

	public function postJobDeptNotsummaryExport()
	{
		$ds1 = Helper::fromFullDate(Input::get('ds1'));
		$ds2 = Helper::fromFullDate(Input::get('ds2'));
		$subdept = Input::get('subdept');

		$drepair = DurableRepair::whereBetween('repair_date',array($ds1,$ds2))
				->select('tb_durable_kind.durable_kind_name','tb_durable_repair.repair_cost','tb_durable_repair.durable_id','tb_sub_dept.sub_dept_name','tb_durable.durable_name','tb_durable.brand_id','tb_durable.durable_model','tb_durable.serial_number','symptom.symptom_name','tb_durable_repair.ruin','tb_durable_repair.repair_id','tb_technical.technic_name','tb_durable_repair.repair_technician_get_date',DB::raw('concat(tb_durable_repair.close_job_date," ",tb_durable_repair.close_job_time) as close_job_date'),DB::raw('datediff(concat(tb_durable_repair.close_job_date," ",tb_durable_repair.close_job_time),tb_durable_repair.repair_technician_get_date) as datediffs'))
				->leftJoin('tb_durable','tb_durable.durable_id','=','tb_durable_repair.durable_id')
				->leftJoin('tb_sub_dept','tb_sub_dept.sub_dept_id','=','tb_durable_repair.sub_dept_id')
				->leftJoin('symptom','symptom.symptom_id','=','tb_durable_repair.symptom')
				->leftJoin('tb_technical','tb_technical.technic_id','=','tb_durable_repair.repair_technician_name')
				->whereNull('close_job_date')
				->leftJoin('tb_durable_kind', function($join)
		        {
		            $join->on('tb_durable_kind.durable_kind_id', '=', 'tb_durable.durable_kind_id')
		            	->on('tb_durable_kind.durable_type_id', '=', 'tb_durable.durable_type_id');
		        });

		if($subdept!="all"){
			$drepair = $drepair->where('tb_durable_repair.sub_dept_id','=',$subdept);
		}
		$drepair = $drepair->orderBy('tb_durable_repair.sub_dept_id','desc')->get()->toArray();

		if(Input::get('export')=='excel')
		{
			$export = 'jobdept_notsummary_excel';
		}else{
			$export = 'jobdept_notsummary_print';
		}

		return View::make('report.'.$export)
						->with(compact('drepair'))
						->withInput(Input::all());
	}
}