<?php
namespace report;

use Durable;
use View;
use DB;

class DurableController extends \BaseController {

	public function getList()
	{

		$list = Durable::leftJoin('tb_durable_kind as tdk', function ($join) {
            $join->on('tdk.durable_type_id', '=', 'tb_durable.durable_type_id')
            	->on('tb_durable.durable_kind_id', '=', 'tdk.durable_kind_id');
        	})
			->leftJoin('tb_sub_dept as tsd','tsd.sub_dept_id','=','tb_durable.sub_dept_id')
			->leftJoin('tb_durable_status as tds','tds.status_id','=','tb_durable.durable_status')
			->select('tb_durable.durable_id','tdk.durable_kind_name','tb_durable.durable_name','tb_durable.durable_date','tb_durable.durable_price','tb_durable.sub_dept_id','tsd.sub_dept_name','tb_durable.durable_location','tb_durable.durable_status','tds.status_name', 'tb_durable.durable_borrow_status')
			->where('tb_durable.durable_id','!=','""')
			->get();




		return  View::make('report.durable.list')
					->with(compact('list'));
	}

	public function getPrintSpecific($durable_id)
	{


		$sql = "SELECT tb_durable.durable_id,tb_durable.durable_com_id, tb_durable_type.durable_type_name, tb_durable.durable_kind_id, tb_durable_kind.durable_kind_name, tb_durable.durable_name, tb_brand.brand_name, tb_durable.durable_model, tb_durable.serial_number, tb_durable.durable_detail, tb_durable.durable_price, tb_durable.durable_date, tb_durable.waranty_check, tb_durable.waranty_date, tb_durable.contract_no, tb_durable.tool_reserve, tb_durable.durable_img, tb_dept.dept_name, tb_sub_dept.sub_dept_name, tb_durable.durable_location, tb_durable.important_id, tb_build.build_name, tb_floor.floor_name, tb_durable.durable_status, tb_durable_status.status_name, tb_durable.gr_doc, tb_durable.gr_date, tb_durable.gr_date_approve, tb_durable.pm, tb_durable.durable_borrow_status, tb_durable.durable_comment,
		tb_system_cpu.cpu_name,tb_system_speed.speed as cpu_cap,tb_system_hdd.hdd_name,hdd.cap as hdd_cap,tb_system_ram.ram_name,ram.cap as ram_cap,tb_system_os.os_name,tb_budget_type.budget_name,
		tb_case_in.case_in_name,tb_store.store_name,tb_durable.contract_no,tb_pm.pm_name,tb_durable.pm_frequency,tb_important.important_name,
		tb_durable.mac_address,tb_durable.ip_address,tb_durable.computer_name,tb_durable.workgroup,tb_snmp.last_scan,tb_snmp.system_type,tb_snmp.netmask,tb_snmp.uptime,tb_snmp.ramsize,tb_snmp.hddsize,tb_snmp.last_ram_used,tb_snmp.last_hdd_used,
		tb_durable.name_own,tb_durable.num_phone,tb_durable.e_mail,tb_durable.durable_barcode

		FROM tb_durable
		LEFT OUTER JOIN tb_durable_type ON tb_durable.durable_type_id = tb_durable_type.durable_type_id
		LEFT OUTER JOIN tb_durable_kind ON tb_durable.durable_type_id = tb_durable_kind.durable_type_id AND tb_durable.durable_kind_id = tb_durable_kind.durable_kind_id
		LEFT OUTER JOIN tb_brand ON tb_durable.brand_id = tb_brand.brand_id
		LEFT OUTER JOIN tb_dept ON tb_durable.dept_id = tb_dept.dept_id
		LEFT OUTER JOIN tb_sub_dept ON tb_durable.sub_dept_id = tb_sub_dept.sub_dept_id
		LEFT OUTER JOIN tb_build ON tb_durable.build_id = tb_build.build_id
		LEFT OUTER JOIN tb_durable_status ON tb_durable.durable_status = tb_durable_status.status_id
		LEFT OUTER JOIN tb_system_cpu on tb_system_cpu.id = tb_durable.cpu
		LEFT OUTER JOIN tb_system_speed on tb_system_speed.id = tb_durable.cpu_speed
		LEFT OUTER JOIN tb_system_hdd on tb_system_hdd.id = tb_durable.hdd
		LEFT OUTER JOIN tb_system_cap as hdd on hdd.id = tb_durable.hdd_cap
		LEFT OUTER JOIN tb_system_ram on tb_system_ram.id = tb_durable.ram
		LEFT OUTER JOIN tb_system_cap as ram on ram.id = tb_durable.ram_cap
		LEFT OUTER JOIN tb_system_os on tb_system_os.id = tb_durable.windows
		LEFT OUTER JOIN tb_budget_type on tb_budget_type.budget_id = tb_durable.budget_id
		LEFT OUTER JOIN tb_case_in on tb_case_in.case_in_id = tb_durable.case_in_id
		LEFT OUTER JOIN tb_store on tb_store.store_id = tb_durable.vender
		LEFT OUTER JOIN tb_pm on tb_pm.pm_id = tb_durable.pm
		LEFT OUTER JOIN tb_important on tb_important.important_id = tb_durable.important_id
		LEFT OUTER JOIN tb_snmp on tb_snmp.durable_id = tb_durable.durable_id

		LEFT OUTER JOIN tb_floor ON tb_durable.floor_id = tb_floor.floor_id WHERE tb_durable.durable_id = '".$durable_id."' GROUP BY tb_durable.durable_id";

		$r = DB::select(DB::raw($sql));
		$durable = $r[0];

		return View::make('report.durable.specification')
				->with(compact('durable'));
	}

}