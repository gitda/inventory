<?php
namespace api;

use Input;
use Response;
use DurableRepair;

class RepairController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$result = $this->getDurable(0);
		return $result;
	}

	public function getDetail($repiar_id)
	{
		return DurableRepair::find($repiar_id);
	}

	private function getDurable($status_id)
	{
		//sleep(1);
		$durable_repair = DurableRepair::leftJoin('tb_sub_dept as sd','tb_durable_repair.sub_dept_id','=','sd.sub_dept_id')
					->leftJoin('tb_durable as td','tb_durable_repair.durable_id','=','td.durable_id')
					->leftJoin('tb_repair_status as trs','tb_durable_repair.repair_status','=','trs.repair_status_id')
					->select('tb_durable_repair.repair_id', 'tb_durable_repair.repair_date', 'tb_durable_repair.durable_id', 'tb_durable_repair.repair_name', 'tb_durable_repair.sub_dept_id', 'sd.sub_dept_name', 'tb_durable_repair.sub_dept2', 'tb_durable_repair.ruin', 'tb_durable_repair.repair_status_report', 'tb_durable_repair.repair_status', 'tb_durable_repair.repair_result', 'tb_durable_repair.repair_out', 'tb_durable_repair.buy_replace', 'tb_durable_repair.repair_out_status', 'trs.repair_status_name', 'tb_durable_repair.approve_status', 'tb_durable_repair.close_job_date', 'tb_durable_repair.repair_technician_get_date')
					->whereNotNull('tb_durable_repair.repair_id')
					->where('tb_durable_repair.repair_status','=',$status_id)
					->orderBy('tb_durable_repair.repair_date','desc')
					->orderBy('tb_durable_repair.repair_id','desc');



		return $durable_repair->get();
	}



	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		return DurableRepair::find($id);
		return Response::json(array('repair_id'=>$id));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return Input::all();
		return Input::get('dept_id');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}