<?php
session_start();
// Create connection
include("database.php");
//$link2=generateRandomString(10);
// Check connection
$fname=$_POST['fname'];
$pname=$_POST['pname'];
$price=$_POST['price'];
$pic=$_POST['pic'];
$amt=$_POST['amt'];
$unit=$_POST['unit'];
$stock=$_POST['stock'];
$con=$_SESSION['country'];
$tp=$_POST['tp'];
$nr=$_POST['nr'];
$stock=$stock+$amt;
$nr=$nr+1;
$tp=$tp+$price;
$avprice=$tp/$nr;
//echo "$stock $nr $tp $avprice";
mysqli_query($link,"insert into farmcards values(0,'$fname','$pname',$amt,'$unit',$price,'$pic','$con')" )or die('Could not select database'.mysqli_error($link));

$result3 = mysqli_query($link,"select * from localprod where  name='$pname'")or die('Could not select database'.mysqli_error($link));
$num_rows = mysqli_num_rows($result3);
//echo $num_rows;
if($num_rows==0)
{
mysqli_query($link,"insert into  localprod values(0,'$pname',$stock,$avprice,'$con' ,'$pic')")or die('Could not select database'.mysqli_error($link));
}
else
{
mysqli_query($link,"update  localprod  set stock=$stock,avp=$avprice where name='$pname'")or die('Could not select database'.mysqli_error($link));	
}
?>
<script>
window.location.href = "mystock.php";
</script>