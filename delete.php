<?php
$con=new mysqli('localhost','root','','practice');
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="DELETE FROM data WHERE id='$id'";
    $result=mysqli_query($con,$query);
    if($result){
        header('location : display.php');
    }
    else{
        echo "error:". mysqli_error($con);
    }  
}
?>