<!doctype <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

// define('LBROOT',getcwd()); // LegoBox Root ... the server root
// include("core/controller/Database.php");

if(!isset($_SESSION["user_id"])) {
$user = $_POST['username'];
$pass = sha1(md5($_POST['password']));

$base = new Database();
$con = $base->connect();
 $sql = "select * from user where (email= \"".$user."\" or username= \"".$user."\") and password= \"".$pass."\" and is_active=1";
//print $sql;
$query = $con->query($sql);
$found = "";
$userid = null;
while($r = $query->fetch_array()){
	$found = true ;
	$userid = $r['id'];
}

if ($found==false) { 
	print "<center><h1>Error: El usuario o la contraseña es incorrecto <br>¡!Intenta nuevamente¡!</br></h1></center>";
        header("Refresh:10; url=index.php");
        exit;
}

if($found==true) {
//	session_start();
//	print $userid;
	$_SESSION['user_id']=$userid ;
//	setcookie('userid',$userid);
//	print $_SESSION['userid'];
	print "Cargando ... $user";
	print "<script>window.location='index.php?view=home';</script>";
}else {
	print "<script>window.location='index.php?view=login'; </script>";
}

}else {
	print "<script>window.location='index.php?view=home';</script>";
}

?>

</body>
</html>
