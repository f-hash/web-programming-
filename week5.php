<?php
 define ( 'DB_NAME', 'fakosile1');
 define ( 'DB_USER', 'fakosile1');
 define ( 'DB_PASSWORD', 'fakosile1');
 define ( 'DB_HOST', 'localhost');  // name of database in PhpmyAdmin 
 function InsertInfo($firstname, $lastname, $telephonenumber){
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    $insert = "INSERT INTO People  SET firstname = '$firstname', lastname ='$lastname',  telephonenumber = '$telephonenumber'";
    $result = $conn->query($insert);
    mysqli_close($conn); //ending exist to database
}
function deleteinfo($id){
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    $del = "DELETE FROM People WHERE id = '$id' "; //the double qoutes make any variable evaluated and single qoutes allows any string to be there
    $result = $conn->query($del);
    mysqli_close($conn); //ending exist to database
}





 function peoplename() {
    // Create connection
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT id, firstname, lastname, telephonenumber FROM People";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $delurl = "[<a href='https://codd.cs.gsu.edu/~fakosile1/week5.php?cmd=delete&id={$row['id']}'>delete</a>]";
        echo "id: " . $row["id"]. " Name: " . $row["firstname"]. " " . $row["lastname"]. " " .$row["telephonenumber"]. " $delurl<br>";
    }
    } else {
    echo "0 results";
    }

    mysqli_close($conn);
}


?>
<form method="get">
      Firstname: <input type=text name ="firstname">
      Lastname: <input type=text name="lastname">
      Telephone number: <input type=text name = "telephonenumber">
    <input type="submit" value="Submit">
</form>
<?php
if($_GET['firstname'] !=''  && $_GET['lastname'] !='' && $_GET['telephonenumber'] !=''){
    InsertInfo($_GET['firstname'], $_GET['lastname'], $_GET['telephonenumber']);
   
    }

if($_GET['cmd'] == 'delete'){
    $id = $_GET['id'];
    deleteinfo($id);
}

peoplename(); 


?>















