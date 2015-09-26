<?php

class GapController extends BaseController {

	public function getIndex(){
		return View::make("report/report_gap");
	}
}