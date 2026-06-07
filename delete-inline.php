<?php
if (isset) {
    # code...
}
$stu_id=$_GET['id'];
$conn=mysqli_connect("localhost","root","","crud") or die("fasil");
$sql="DELETE FROM student WHERE sid={$stu_id}";
$result=mysqli_query($conn,$sql) or die("fail");
header("Location: http://localhost/crud/index.php");
mysqli_close($conn);

?>