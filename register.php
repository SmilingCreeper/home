$db_host="192.168.0.9";
$db_name="SmilingCreeper";
$db_pwd="20130203Edward:;
$link=mysqli_connect($db_host,$db_name,$db_pwd);
if($link){
  echo "success";
}else{
  echo "fail";
}
