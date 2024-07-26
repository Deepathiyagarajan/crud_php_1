<?php
$con=new mysqli('localhost','root','','practice');
$query="SELECT * FROM data";
$result=mysqli_query($con,$query);

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
  <table border=1>
  <tr> 
  <th>Id</th> 
  <th>Name</th>
  <th>Age</th>
  <th>Email</th>
  <th>Password</th>
  <th>Gender</th>
  <th>Qualification</th>
  <th>Skill</th>
  <th>City</th>
</tr>

<?php
while($rows=mysqli_fetch_assoc($result))
{
    ?>
    <tr>
    <td><?php echo $rows['id'];?></td>
    <td><?php echo $rows['name'];?></td>
    <td><?php echo $rows['age'];?></td>
    <td><?php echo $rows['email'];?></td>
    <td><?php echo $rows['password'];?></td>
    <td><?php echo $rows['gender'];?></td>
    <td><?php echo $rows['qualification'];?></td>
    <td><?php echo $rows['skill'];?></td>
    <td><?php echo $rows['city'];?></td>
<td>
<a href="update.php?id=<?php echo $rows['id'];?>">Update</a>
<a href="delete.php?id=<?php echo $rows['id'];?>">Delete</a>
</td>
</tr>
<?php
}
?>

</table>
</body>
</html>