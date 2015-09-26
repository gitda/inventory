<?php
namespace report;

use Durable;
use View;
use DB;

class DurableController extends \BaseController {

	public function getList()
	{
		return "asd";
	}

	public function getPrintSpecific($durable_id)
	{


		$sql = "SELECT tb_durable.durable_id,tb_durable.durable_com_id, tb_durable_type.durable_type_name, tb_durable.durable_kind_id, tb_durable_kind.durable_kind_name, tb_durable.durable_name, tb_brand.brand_name, tb_durable.durable_model, tb_durable.serial_number, tb_durable.durable_detail, tb_durable.durable_price, tb_durable.durable_date, tb_durable.waranty_check, tb_durable.waranty_date, tb_durable.contract_no, tb_durable.tool_reserve, tb_durable.durable_img, tb_dept.dept_name, tb_sub_dept.sub_dept_name, tb_durable.durable_location, tb_durable.important_id, tb_build.build_name, tb_floor.floor_name, tb_durable.durable_status, tb_durable_status.status_name, tb_durable.gr_doc, tb_durable.gr_date, tb_durable.gr_date_approve, tb_durable.pm, tb_durable.durable_borrow_status, tb_durable.durable_comment
		FROM tb_durable
		LEFT OUTER JOIN tb_durable_type ON tb_durable.durable_type_id = tb_durable_type.durable_type_id
		LEFT OUTER JOIN tb_durable_kind ON tb_durable.durable_type_id = tb_durable_kind.durable_type_id AND tb_durable.durable_kind_id = tb_durable_kind.durable_kind_id
		LEFT OUTER JOIN tb_brand ON tb_durable.brand_id = tb_brand.brand_id
		LEFT OUTER JOIN tb_dept ON tb_durable.dept_id = tb_dept.dept_id
		LEFT OUTER JOIN tb_sub_dept ON tb_durable.sub_dept_id = tb_sub_dept.sub_dept_id
		LEFT OUTER JOIN tb_build ON tb_durable.build_id = tb_build.build_id
		LEFT OUTER JOIN tb_durable_status ON tb_durable.durable_status = tb_durable_status.status_id
		LEFT OUTER JOIN tb_floor ON tb_durable.floor_id = tb_floor.floor_id WHERE tb_durable.durable_id = '".$durable_id."'";

		$r = DB::select(DB::raw($sql));
		$durable = $r[0];

		return View::make('report.durable.specification')
				->with(compact('durable'));
	}

}