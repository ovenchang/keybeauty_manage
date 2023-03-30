
/********排假******/
$restArr=array();
$startDay='2023-04-20'; //開始上班日
$restMonth='2023-04'; //排假月份
for($i=1;$i<=daysInMonth($restMonth);$i++){
	$theDay=$restMonth.'-'.str_pad($i,2,'0',STR_PAD_LEFT);
	
	if(calculateModulo4($startDay, $theDay)==0){
		if($i==1){
			$theDay=$restMonth.'-'.str_pad('2',2,'0',STR_PAD_LEFT);
		}elseif($i==15){
			$theDay=$restMonth.'-'.str_pad('14',2,'0',STR_PAD_LEFT);
		}elseif($i==25){
			$theDay=$restMonth.'-'.str_pad('24',2,'0',STR_PAD_LEFT);
		}
		
		array_push($restArr,$theDay);
	}
}
var_dump($restArr);die;


function getRestDayDefault($startDay,$restMonth){
	
}

function daysInMonth($dateString) {
  // 使用 strtotime() 將日期字串轉換為 Unix timestamp
  $timestamp = strtotime($dateString);
  
  // 使用 date() 函式取得該月份的天數
  $daysInMonth = date('t', $timestamp);

  return $daysInMonth;
}
function calculateModulo4($date1, $date2) {
	if($date2<$date1) return 'not';
  $timestamp1 = strtotime($date1);
  $timestamp2 = strtotime($date2);
  $diff = abs($timestamp2 - $timestamp1);
  $days = floor($diff / (60 * 60 * 24)) + 1;
  return $days % 4;
}


/**************/
