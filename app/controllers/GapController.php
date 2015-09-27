<?php

class GapController extends BaseController {

	public function getIndex(){
		return View::make("report/report_gap");
	}

	public function postIndex(){
		$hdd_con = Input::get("hdd_con");
		$hdd_per = Input::get("hdd_per");
		$ram_con = Input::get("ram_con");
		$ram_per = Input::get("ram_per");

		$data = DB::table(DB::raw("tb_durable AS td"))
				->select(
					DB::raw("tsd.sub_dept_name, td.durable_id, td.ip_address, tso.os_name,CONCAT('RAM',' ',tscr.cap) AS ram_g, CONCAT('Harddisk',' ',tsch.cap) AS hdd_g, CONCAT('RAM',' ',ROUND(ts.last_ram_used/1024/1024,2),' GB ','( ',ROUND((ts.last_ram_used*100)/ts.ramsize,2),'%',' Utilization',' )') AS ram_c, CONCAT('Harddisk',' ',ROUND(ts.last_hdd_used*4096/1024/1024/1024,2),' GB ','( ',ROUND((ts.last_hdd_used*100)/ts.hddsize,2),'%',' use',' )') AS hdd_c, ROUND((ts.last_ram_used*100)/ts.ramsize,2) AS ram_h, ROUND((ts.last_hdd_used*100)/ts.hddsize,2) AS hdd_h") 
					)
					->join('tb_sub_dept AS tsd', 'td.sub_dept_id', '=', 'tsd.sub_dept_id', 'left outer')
					->join('tb_system_cap AS tscr', 'td.ram_cap', '=', 'tscr.id', 'left outer')
					->join('tb_system_cap AS tsch', 'td.hdd_cap', '=', 'tsch.id', 'left outer')
					->join('tb_system_os AS tso', 'td.windows', '=', 'tso.id', 'left outer')
					->join('tb_snmp AS ts', 'td.durable_id', '=', 'ts.durable_id', 'left outer')->get();
		
		return View::make("report/report_gap")
		->with(compact('data'));

	}
}