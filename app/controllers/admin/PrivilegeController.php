<?php
namespace admin;

use View;

class PrivilegeController extends \BaseController {

	public function getIndex()
	{
		return View::make('admin.privilege.index');
	}
}