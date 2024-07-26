    <?php
    $con=new mysqli('localhost','root','','practice');
    $id=$_GET['id'];
    $query="SELECT * FROM data WHERE id='$id'";
    $result=mysqli_query($con,$query);
    $rows=mysqli_fetch_assoc($result);
    ?>
    <?php
    if(isset($_POST['update'])){
        $name=$_POST['name'];
        $age=$_POST['age'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $gender=$_POST['gender'];
        $qualification=implode(",",$_POST['qualification']);
        $skill=implode(",",$_POST['skill']);
        $city=$_POST['city'];


    $query="UPDATE data SET name='$name',age='$age',email='$email',password='$password',gender='$gender',qualification='$qualification',skill='$skill',city='$city' WHERE id='$id'";
    $result=mysqli_query($con,$query);
    if($result){
        header ('location:display.php');
    }
    else{
        echo "error:".mysqli_error($result);
    }
    }
    ?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <form action="insert.php" method="post">
        <label>Name:</label>
        <input type="text" name="name" placeholder="Enter your name" value="<?php echo $rows['name'];?>"><br><br>
        <label>Age:</label>
        <input type="text" name="age" placeholder="Enter your age" value="<?php echo $rows['age'];?>"><br><br>
        <label>Email:</label>
        <input type="text" name="email" placeholder="Enter your email" value="<?php echo $rows['email'];?>"><br><br>
        <label>Password:</label>
        <input type="text" name="password" placeholder="Enter your password" value="<?php echo $rows['password'];?>"><br><br>
        <label >Gender:</label>
            <label>Male</label>
            <input type="radio" name="gender" value="male"
            <?php if($rows['gender']=="male") echo "checked";?>>
            <label>Female</label>
            <input type="radio" name="gender" value="female"
            <?php if($rows['gender']=="female") echo "checked";?>>
        <br><br>
        <label>Qualification:</label>
        <input type="checkbox" name="qualification[]" value="10th"
        <?php if(in_array('10th',explode("," ,$rows['qualification']))) echo "selected";?>>10th
        <input type="checkbox" name="qualification[]" value="12th"
        <?php if(in_array('12th',explode("," ,$rows['qualification']))) echo "selected";?>>12th
        <input type="checkbox" name="qualification[]" value="UG"
        <?php if(in_array('UG',explode("," ,$rows['qualification']))) echo"selected";?>>UG
        <input type="checkbox" name="qualification[]" value="PG"
        <?php if(in_array('PG',explode("," ,$rows['qualification']))) echo "selected";?>>PG
        <br><br>
        <label>Skills:</label>
            <select name="skill[]" multiple >
                <option value="html"
                <?php if(in_array('html',explode(',',$rows['skill']))) echo "selected";?>>
                Html</option>
                <option value="php"
                <?php if(in_array('php',explode(',',$rows['skill']))) echo "selected";?>>
                Php</option>
                <option value="laravel"
                <?php if(in_array('laravel',explode(',',$rows['skill']))) echo "selected";?>>
                laravel</option>
            </select>
        <br><br>
        <label>City:</label>
            <select name="city">
                <option value="coimbatore"
                <?php if($rows['city']=='coimbatore' ) echo "selected";?>
                >Coimbatore</option>
                <option value="chennai"
                <?php if($rows['city']=='chennai') echo "selected"?>
                >Chennai</option>
                <option value="bangalore"
                <?php if($rows['city']=='bangalore') echo "selected"?>
                >Bangalore</option>
            </select>
        <br><br>

        <input type="submit" name="submit" value="Update">
    </form>
    </body>
    </html>