<?php
// $check=false;
if(isset($_POST['email'])){
$server="localhost";
$username="root";
$password="tabiaserver2002!";
$db="phpdb";

$con=mysqli_connect($server,$username,$password,$db);
if(!$con){
    die("The connection failed" . mysqli_connect_error());
}

$email=$_POST['email'];
$desc=$_POST['desc'];

$sql="INSERT INTO phpdb.form (email, description) VALUES ('$email', '$desc')";
// echo $sql;

if($con->query($sql)==true){
    // $check=True;
    header("Location: index.php?submitted=true");
    exit();
}
else{
echo "Error: $sql <BR> $con->error";
}

$con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>PHP PRACTICE</title>
</head>
<style>
   body {
    background-image: url('bg.jpg');  
    background-size: cover;                  
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;            
    min-height: 100vh;
    margin: 0;
    overflow: hidden;                         
}

   .container {
    box-sizing: border-box;
    background-color: rgba(0, 0, 0, 0.4);  
    color: white;
    padding: 50px;
    margin: 60px auto; 
    max-width: 500px;   
    border-radius: 10px;
}
    #btnn{
       margin-top: 20px;
       /* text-align: center; */
    }
    h2{
        text-align: center;       
    }
    label{
        margin-top: 25px;
    }
</style>
<body>
    <div class="container">
        <h2>FILL IN THE FORM BELOW </h2>
        <!-- <?php
        if ($check==True){
            echo "<h3>Thanks for submitting the form</h3>";
        }
        ?> -->
        <?php
        if (isset($_GET['submitted']) && $_GET['submitted'] == 'true') {
            echo "<div class='alert alert-success'>Thanks for submitting!</div>";
            echo "<script>
            setTimeout(function() {
                window.location.href = 'index.php';
            }, 2000); // 2 seconds
          </script>";
        }
        ?>

        <form action="index.php" method="POST">
        <label for="exampleInputText" class="form-label">Your EMAIL</label>
            <input name="email" type="email" class="form-control" id="emal" placeholder="name@example.com">
            <label for="exampleInputText" class="form-label">DESCRIPTION</label>
            <textarea name="desc" class="form-control" id="desc" ></textarea>
            <div class="text-center">
  <button type="submit" class="btn btn-danger" id="btnn">SUBMIT</button>
</div>

        </form>
    </div>
</body>
</html>