<meta charset="UTF-8">
<?php
$username = 'root';
$password = 'root';
$ip = '127.0.0.1';
$database = 'database';
$conn = new mysqli($ip,$username,$password,$database);
$logname = $_GET['name'];
$password1 = $_GET['password1'];
$password2 = $_GET['password2'];
 
$sql = "select * from table_1 where username = '$logname';";
$res = mysqli_query($conn,$sql);
 
if($res->num_rows > 0){
	echo '用户已存在,3秒后跳转,请重新输入。';
	header('Refresh:3,https://smilingcreeper.github.io/home/reg.html');
}else{
	if($password1 != $password2){
		echo'密码不一致。';
	}else{
		$sql = "insert into table_1 value('$logname','$password1');";
		if(mysqli_query($conn,$sql)){
			echo'注册成功,3秒后返回登录页面。';
			header('Refresh:3,http://smilingcreeper.github.io/home/login.html');
		}else{
			echo'注册失败。';
		}
	}
}
?>
