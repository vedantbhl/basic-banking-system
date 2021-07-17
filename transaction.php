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
        <h1 class="py-4 bg-dark text-light rounded"><i class="fa fa-swatchbook""></i> Transaction History</h1>
      
        <div class="d-flex justify-content-center">
         
         
        <div class="d-flex justify-content-center table-data">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                <tr>
                    <th>Sender</th>
                    <th>Receiver</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody id="tbody">
                <?php
                    $servername = "127.0.0.1:3333";
                    $username = "root";
                    $password = "";
                    $dbname = "banking";

                    $conn = new mysqli($servername, $username, $password,$dbname);
                    if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT * FROM transfer";
                    $result = mysqli_query($conn,"SELECT * FROM transfer");
                                        
                    while($row = mysqli_fetch_array($result))
                    {
                    echo "<tr>";
                    echo "<td>" . $row['Sender'] . "</td>";
                    echo "<td>" . $row['Receiver'] . "</td>";
                    echo "<td>" . $row['Amount'] . "</td>";
                    echo "<td>" . $row['Date'] . "</td>";
                    echo "</tr>";
                    }
                    

                    mysqli_close($conn);
                ?>
                </tbody>
            </table>
    </div>
    </div>

</body>
</html>