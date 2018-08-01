<html>
<head>
Result:
<title>
search result
</title>
</head>
<style>
body{
	font-size: 25px;

}
head{
	text-align: center;
}
</style>
<body>
<?php
ini_set("display_errors", 0);
if(isset($_POST['submit']))
{
$con=mysqli_connect("localhost","root","","project");
session_start();
$id=$_POST['id'];
$result=$con->query("SELECT first ,last ,course,level,total
                     FROM student,fee
                     WHERE  fee.sid='$id' AND student.sid=fee.sid");
$check=mysqli_num_rows($result);
if($check>0){
while($rows=$result->fetch_assoc())
{
	echo "<p>";
	echo "first Name: " .$rows['first']."<br>";
	echo "last Name: " .$rows['last']."<br>";
	echo "Faculty: ".$rows['course']."<br>";
	echo "level :".$rows['level']." year<br>";
	echo "total fee paid".$rows['total'];
  $_SESSION['fee'] = $rows['total'];
  $_SESSION['id'] = $id;

}
}
else{
	echo "no such record found";
	exit(1);
}

 echo '<a href="feeupdate.php">UPDATE FEE</a>';  
}
?>
</body>
</html>