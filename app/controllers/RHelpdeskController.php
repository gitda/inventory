<?php

class RHelpdeskController extends BaseController {

	public function getIndex(){

		$m = DATE('m');
			if($m >= 10){
				$a = DATE('Y')."-10-"."01";
				$b = DATE('Y')+(1)."-09-"."30";
			}else{
				$a = DATE('Y')-(1)."-10-"."01";
				$b = DATE('Y')."-09-"."30";
			}

		$query_ReportHelp= $this->queryHelpdesk($a,$b);
		return View::make("report/report_helpdesk")
		->with(compact('query_ReportHelp'));
		

	}

	private function queryHelpdesk($t1,$t2){

		$data1 = DB::table("helpdesk")
				->select(
					DB::raw("'HELPDESK(ส่งต่องาน)' AS 'name',COUNT(*) AS 'cc', SUM(IF(help_result=1,1,0)) AS 'ok', SUM(IF(help_result=0,1,0)) AS 'not', SUM(IF(help_result is null,1,0)) AS 'null',reslove_type")
				)
				->whereBetween("help_date",array($t1, $t2))
				->where('reslove_type','=','2');

		$data2 = DB::table("helpdesk")
				->select(
					DB::raw("'HELPDESK(ตอบเอง)' AS 'name',COUNT(*) AS 'cc', SUM(IF(help_result=1,1,0)) AS 'ok', SUM(IF(help_result=0,1,0)) AS 'not', SUM(IF(help_result is null,1,0)) AS 'null',reslove_type")
				)
				->whereBetween("help_date",array($t1, $t2))
				->where('reslove_type','=','1')->union($data1)->get();
		return $data2;

	}

	public function getSelecthelpdeskok($a){
		if ($a==1) {
			$data = DB::table(DB::raw("helpdesk as h"))
				->select(
					DB::raw("ht.helpdesk_type_name, h.help_description, h.help_note")
				)
				->join('helpdesk_type as ht', 'ht.helpdesk_type_id', '=', 'h.helpdesk_type_id', 'left outer')
				->where('h.reslove_type','=',$a)->get();
			return $data;
		}
		if ($a==2) {
			$data = DB::table(DB::raw("helpdesk as h"))
				->select(
					DB::raw("ht.helpdesk_type_name, h.help_description, IF(tdr.repair_result = 1,tdr.repair_result_detail1,IF(tdr.repair_result = 2,concat(tdr.repair_device_type,' - ',GROUP_CONCAT(tdrd.device_list)),IF(tdr.repair_result = 3,'ไม่สามารถดำเนินการได้เอง','ยังไม่ลงงาน'))) AS help_note")
				)
				->join('helpdesk_type as ht', 'ht.helpdesk_type_id', '=', 'h.helpdesk_type_id', 'left outer')
				->join('tb_durable_repair as tdr', 'tdr.repair_id', '=', 'h.repair_id', 'left outer')
				->join('tb_durable_repair_device AS tdrd', 'tdrd.repair_id', '=', 'h.repair_id', 'left outer')
				->where('h.reslove_type','=',$a)
				->groupBy('h.id')->get();
			return $data;
		}
	}
}
