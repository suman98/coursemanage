<?php
if(isset($_POST['submit']))
{
$con=mysqli_connect("localhost","root","","project");
session_start();
$id=$_POST['id'];
if(isset($_POST['u']))
{
	$operation=$_POST['u'];
	switch ($operation) {
		case 'teacher':
			$type="teacher_rec";
			goto teacher;
			break;

		case 'student':
			$type="student";
			goto student;
			break;
	}
}


else {
	echo "please select any option to delete";
	exit(1);
}
student:
$result=$con->query("SELECT * FROM  $type WHERE sid='$id' ");
$check=mysqli_num_rows($result);
if($check>0){
   $sql="DELETE FROM student WHERE sid='$id' ";
   mysqli_query($con,$sql);
   $sql1="DELETE FROM fee WHERE sid='$id' ";
   mysqli_query($con,$sql1);
   echo "deleted!!!!!!";
}
else
{
	echo "no such record";
}
exit(1);
teacher:
$result=$con->query("SELECT * FROM  $type WHERE tid='$id' ");
$check=mysqli_num_rows($result);
if($check>0){
   $sql="DELETE FROM teacher_rec WHERE tid='$id' ";
   mysqli_query($con,$sql);
    $sql1="DELETE FROM course WHERE tid='$id' ";
   mysqli_query($con,$sql1);
   echo "deleted!!!!!!";
}
else
{
	echo "no such record";
}
}
?>