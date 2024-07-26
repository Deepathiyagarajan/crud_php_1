<?php
$con=new mysqli('localhost','root','','practice');
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $age=$_POST['age'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];
    $qualification=$_POST['qualification'];
    $qualification_str=implode(",",$qualification);
    $skills=$_POST['skill'];
    $skills_str=implode(",",$skills);
    $city=$_POST['city'];
    $query="INSERT INTO data (name,age,email,password,gender,qualification,skill,city) VALUES ('$name','$age','$email','$password','$gender','$qualification_str','$skills_str','$city')";
    $result=mysqli_query($con,$query);
    if($result){
        header('location:display.php');
    }
    else{
        echo "error:".mysqli_error($con);
    }
}
?>