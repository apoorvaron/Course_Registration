<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Content-Type: application/json; charset=UTF-8");

    // include_once '/admin/dBconnection/database.php';
    include_once './database.php';
    // include_once './apiFunc.php';
    $method = $_SERVER['REQUEST_METHOD'];


function checkCred(){
    
    
        $database = new Database();
        $db = $database->connect();
       
        echo $db;
        // $post = new POST($db);
        // echo "2";
        $username = $_GET['username'];
        $password = $_GET['password'];

        $result = $post->checkCredentials();
    
        if ($result) {
            $posts_arr = array();
    
            while ($row = $result->fetch_assoc()) {
                $post_item = array(
                    'username' => $row["username"],
                    'password' => $row["password"],
                );
                array_push($posts_arr, $post_item);
            }
    
            // Turn to JSON & output
            echo json_encode(utf8ize($posts_arr));
        } else {
            // No Posts
            echo json_encode(
                array('message' => 'Invalid password or Username')
            );
        }
};

function submitReg()
{
    // echo "<script>alert('aa')</script>";
// echo "ertyt";
    $database = new Database();
    // print_r($database);
    $db = $database->connect();
    // print_r($db);
// echo $db;
    $fName = $_POST["fName"];
    $lName =  $_POST["lName"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $course = $_POST["course"];

    // echo "qwewredtffsfgdhfdrafdf";

    $sql = "INSERT INTO `courseReg` (`fName`, `lName`, `email`, `phone`, `gender` , `course`) VALUES ('$fName', '$lName', '$email','$phone','$gender','$course');";
    // print_r($sql);
    // echo json_encode($sql);
        if ($db->query($sql) == true) {
            echo json_encode(
                array('message' => 'Form has been submitted')
            );
        } else {
            echo json_encode(
                array('message' => 'Internal Server Error. Try Again')
            );
        }

};


$q = $_GET['q'];
// echo $q;
switch ($q) {
    case 'checkCred':
        checkCred();
        break;
    case 'submitReg':
        submitReg();

        break;
    default:
        echo "Invalid Query";
}
?>