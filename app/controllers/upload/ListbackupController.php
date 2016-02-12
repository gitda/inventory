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
use LocalReplicateLock;
use ModelNotFoundException;

class ListbackupController extends \BaseController {

	public function getIndex($year=null,$month=null)
	{
		if(is_null($year))
        	$year = date('Y');
    	if(is_null($month))
        	$month = date('m');

        $fullmy = Helper::monththai(($month))." ".Helper::toYearThai($year);

		$datetoday= $year.'-'.$month.'-'.'01'; 
		
		$arr_day= $this->toDayMonth($datetoday);
		$backup = $this->backup($arr_day);
		$all_db = $this->getDbName();
		$result = array();
		// :p

		foreach($all_db as $db){
			$result[$db] = array();

			foreach ($arr_day as $dt) {
				$result[$db][$dt] = array("has_backup"=>false);

				foreach($backup as $bk){
					if($bk->backup_date==$dt && $bk->db_name == $db){
						$bk->has_backup = true;
						$result[$db][$dt] = (array)$bk;
					}
				}
			}
		}

		$last_replicate = $this->getLastReplicate();

		return View::make('upload.listbackup')
		  	->with(compact('result','datetoday','fullmy','last_replicate'));
	}

	private function backup($arr_day)
	{
		$data = DB::table('tb_backup')
				->select(
					DB::raw('db_name,file_name,file_size,backup_date,backup_time,users.technic_name')
				)
				->join('users','tb_backup.user_insert','=','users.id')
				->whereIn(DB::raw('date(backup_date)'),$arr_day)

				->groupBy('db_name','backup_date')
				->get();

		//$data = Backup::whereIn(DB::raw('date(backup_date)'), $arr_day)->get();
		return $data;
	}
	private function getDbName()
	{
		return array('HOSxp_Master-daily','Webserver','Myaccount'/*,'Hosxp','Server999'*/);
	}

	private function getLastReplicate()
	{
		$master = \Hosxp\Master\ReplicateLock::all();

		foreach ($master as $key => $value) {
			$lrl = LocalReplicateLock::firstOrNew(array('computer_name'=>$value->computer_name));
			$lrl->last_active = $value->last_active;
			$lrl->save();
		}
		$result = LocalReplicateLock::select('computer_name','last_active',DB::raw('NOW() as currenttime'))->get();

		return $result;
	}

	private function toDayMonth($dt)
	{
		$date = new DateTime($dt.' 00:00:00');
		$d = sprintf("%02d", $date->format('d'));
		$m = $date->format('m');
	    $y = $date->format('Y');
	    $numDays = cal_days_in_month(CAL_GREGORIAN,$m,$y);
	    $result = array();
		    for($i=1;$i<=$numDays;$i++)
    			array_push($result, $y."-".$m."-".sprintf("%02d", $i));

		return $result;
	}

}