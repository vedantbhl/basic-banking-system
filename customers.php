<?php
$servername = "127.0.0.1:3333";
$username = "root";
$password = "";
$dbname = "banking";

$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT uname,Email,Balance FROM customer";
$result = mysqli_query($conn,"SELECT * FROM customer");
$result1 = mysqli_query($conn,"SELECT * FROM customer");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />
  <script src="https://kit.fontawesome.com/035b8fb014.js" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <a class="navbar-brand" href="#">Bank Management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="customers.php">View Customers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Transaction History</a>
            </li>
            </ul>
        </div>
    </nav>
        <br>
    <div class="container text-center" >
        <h1 class="py-4 bg-dark text-light rounded">Transfer Money</h1>
      
        <div class="d-flex justify-content-center">
         <form action="" method="POST" class="w-50"> 

            <div class="pt-2">
                <div class="input-group mb-7 justify-content-center">
                <select class="form1" type="text" name="sender" id="">
                    <option value="">FROM</option>
                    <?php
                        while($tname=mysqli_fetch_array($result)){
                        echo "<option value='".$tname['uname']."'>".$tname['uname']."</option>";
                        }
                    ?>
                </Select>
                </div>
             </div>
             <div class="pt-2">
                <div class="input-group mb-7 justify-content-center">
                <select class="form1" type="text" name="receiver" id="">
                    <option value="">TO</option>
                    <?php
                        while($tname=mysqli_fetch_array($result1)){
                        echo "<option value='".$tname['uname']."'>".$tname['uname']."</option>";
                        }
                    ?>
                </Select>
                </div>
             </div>
             <div class="pt-2">
                <div class="input-group mb-7 justify-content-center">
                <input type="text" name="amount" placeholder="amount"></input>
                </div>
             </div>
             <div class="pt-2">
                <div class="input-group mb-7 justify-content-center">
                <input class="btn btn-primary " type="submit" name="transfer" value="transfer">
                </div>
             </div>
         </form>
         <?php
          
          if(isset($_POST['transfer']))
          {
            $sender=$_POST['sender'];
            $receiver=$_POST['receiver'];
            $amount=$_POST['amount'];

          if($sender!="" && $receiver!="" && $amount!=""){
            $q1="UPDATE  customer SET Balance = Balance + '$amount' WHERE uname='$receiver' ";
            $d1=mysqli_query($conn,$q1);

            $q2="UPDATE  customer SET Balance= Balance - '$amount' WHERE uname='$sender' ";
            $d2=mysqli_query($conn,$q2);

            
            $dt = date('Y-m-d h:i:s');
            $tr="INSERT INTO transfer (Sender,Receiver,Amount,Date) VALUES('$sender','$receiver','$amount','$dt')";
            $res=mysqli_query($conn,$tr);

                if($res){
                  $user1="SELECT * FROM customer WHERE uname='$sender'";
                  $res2=mysqli_query($conn,$user1);
                  $row_count=mysqli_num_rows($res2);
                }

                

            if($d1 && $d2){
              echo '<script>alert("Transaction Successfull ")</script>';
            }
            else{
              echo '<script>alert("Transaction Failed")</script>';
            }

          }
          }
          ?>

    </div>
    </div>

</body>
</html>