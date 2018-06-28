<?PHP
  if( !empty($_FILES['uploaded_file']))
  {
    $path = "upload/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      echo "The file ".  basename( $_FILES['uploaded_file']['name']).
      " has been uploaded";
    } else{
        echo "There was an error uploading the file, please try again!";
    }
    $uid = $_POST["uid"];
    $name = $_POST["name"];
    $date = $_POST["date"];;
    $money = $_POST["money"];
    $reason  = $_POST["reason"];
    $item = $_POST["item"];
    $file =  basename( $_FILES['uploaded_file']['name']);
    echo "<br>";
    echo $uid;
    echo "<br>";
    echo $name;
    echo "<br>";
    echo $date;
    echo "<br>";
    echo $money;
    echo "<br>";
    echo $reason;
    echo "<br>";
    echo $item;
    echo "<br>";

    $conn = new mysqli("localhost","hcy_utlms","utaipei8362","hcy_utlms");
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    mysqli_set_charset($conn,"utf8");
    $sql = "INSERT INTO finance (eventid, uid, item, semester, mydate, mymoney, reason, status, filename) VALUES ( NULL,'$uid','$item','$semester','$date','$money','$reason','0','$file' )";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();




}else{

    echo "ERROR";
}
?>
