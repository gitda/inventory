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

		$data = DB::table("helpdesk")
				->select(
					DB::raw("'HELPDESK' AS 'name',COUNT(*) AS 'cc', SUM(IF(reslove_type=1,1,0)) AS 'ok', SUM(IF(reslove_type=2,1,0)) AS 'not', SUM(IF(help_result is null,1,0)) AS 'null',reslove_type")
				)
				->whereBetween("help_date",array($t1, $t2))->get();
		return $data;

	}

	public function getSelecthelpdeskok(){

			$data = DB::table(DB::raw("helpdesk as h"))
				->select(
					DB::raw("ht.helpdesk_type_name, h.help_description, h.help_note")
				)
				->join('helpdesk_type as ht', 'ht.helpdesk_type_id', '=', 'h.helpdesk_type_id', 'left outer')->get();
			return $data;

	}

	public function getSelecthelpdeskpost($a){
		return \Helpers\Helper::fromJSDate($a);
	}
}
