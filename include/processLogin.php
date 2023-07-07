<?php
session_start();
include 'connect.php';
/*
$name = $_POST["user"];
$pass = $_POST["pw"];

//$query = "CALL check_match($name,$pass);";
$query = "CALL check_match('" . $name . "','" . $pass . "');";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $res = (isset($row["qres"])) ? $row["qres"] : " ";
        $user_id = (isset($row['id'])) ? $row['id'] : "0";
        $approver = (isset($row['approver'])) ? $row['approver'] : "0";

        if ($res == "MATCH") {
            $_SESSION['current_user'] = $user_id;
            $_SESSION['approver'] = $approver;

            $response = array(
                "res" => "Match",
                "approver" => $approver
            );
        } else if ($res == "UNMATCH") {
            $response = array(
                "res" => "Unmatch",
                "approver" => $approver,
                "em" => "Incorrect Username/Password"
            );
        } else {
            $response = array(
                "res" => "other",
                "approver" => $approver,
                "em" => "User Does Not Exist"
            );
        }

        $jsonResponse = json_encode($response);
        echo $jsonResponse;
    }
}
*/

echo "success";
?>
