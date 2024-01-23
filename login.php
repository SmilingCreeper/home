<meta charset="UTF-8">
<?php
$username = 'root';
$password = 'root';
$ip = 'smilingcreeper.github.io';
$database = 'database';
$conn = new mysqli($ip,$username,$password,$database);
 
$logname = $_GET['name'];
$pw = $_GET['password'];
 
$sql = "select * from table_1 where username = '$logname' and password = '$pw'";
 
$res = mysqli_query($conn,$sql);
 
if($res->num_rows > 0){
	echo '登陆成功。';
}else{
	echo '登录失败。';
}
?>
