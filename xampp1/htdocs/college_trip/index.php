<?php
$insert=false;
    if(isset($_POST['name'])){
        $server="localhost";
        $username="root";
        $password="";
        
        $conn=mysqli_connect($server,$username,$password);
        if(!$conn){
            die("Connection to mysql failed due to: ".mysqli_connect_error());
        }
        $name=$_POST['name'];
        $fname=$_POST['fname'];
        $num=$_POST['num'];
        $address=$_POST['address'];
        $dept=$_POST['dept'];
        $rollno=$_POST['rollno'];
        $sql="INSERT INTO `stamford_bridge`.`trip` (`name`, `fname`, `no`, `address`, `dept`, `rollno`, `date`) VALUES ('$name','$fname','$num','$address','$dept','$rollno',current_timestamp());";
        if ($conn->query($sql) === TRUE) {
            $insert=true;
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          $conn->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200&family=Indie+Flower&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Trip to Stamford Bridge</title>
</head>
<body>
    <img src="chelsea.jpg" alt="Stamford Bridge" >
    <div class="container bg">
        <h1>Annual Trip to Stamford Bridge, London</h1>
        <h3>Come with us to visit the most beautiful football stadium in England!</h3>
        <?php
        if($insert==true){
            echo "<h3>Thanks for submitting this form and accompanying us on this trip.</h3>"; 
        }
        ?>
    </div>
    <form class="container" action="index.php" method="post">
        <input type="name" name="name" placeholder="Enter your name"><br>
        <input type="fname" name="fname" placeholder="Enter your father's name"><br>
        <input type="number" name="num" placeholder="Enter your phone number"><br>
        <input type="address" name="address" placeholder="Enter your address"><br>
        <input type="text" name="dept" placeholder="Enter your department"><br>
        <input type="number" name="rollno" placeholder="Enter your roll number"><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>