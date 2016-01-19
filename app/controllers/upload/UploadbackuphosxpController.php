<?php 

namespace upload;
use Config;
use Input;
use View;
use DB;
use Helper;
use DateTime;
use Backup;
use Sentry; 

class UploadbackuphosxpController extends \BaseController {

	public function getIndex($year=null,$month=null)
	{
		return View::make('upload.upload_bkhosxp');
	}

	public function postUploadify()
	{
		$directory = public_path(Config::get('app.scan_path'));
		$file = Input::file('Filedata');
		$ymd =  date('Ymd');
		$his = date('His');
		$ss = $file->getSize();

		#$filename = "HOSxp_Master-daily".$ymd.$his.".".$file->getClientOriginalExtension();
		$filename = $file->getClientOriginalName();

		$file->move($directory, $filename);

		$insertSQL = DB::table('tb_backup')
			->insert(array(
						'db_name' 		=> 'HOSxp_Master-daily',
						'file_name' 	=> $filename,
						'file_size' 	=> $ss,
						'backup_date' 	=> date('Y-m-d'),
						'backup_time' 	=> date('H:i:s'),
						'user_insert'	=> Sentry::getUser()->id
					));
	}

}