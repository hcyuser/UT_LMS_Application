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

    echo "<br>";
    echo $_POST["uid"];
    echo "<br>";
    echo $_POST["name"];
    echo "<br>";
    echo $_POST["date"];
    echo "<br>";
    echo $_POST["money"];
    echo "<br>";
    echo $_POST["reason"];
    echo "<br>";
    echo $_POST["item"];
    echo "<br>";
}else{


    echo "ERROR";
}
?>
