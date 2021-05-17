<?php

$function = $_POST["function"];

if($function == 'fetchUser')
{
    fetchUser();
}
else if($function == 'saveUser')
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    saveUser($fname, $lname, $address, $gender);
}
else if($function == 'getById')
{
    $id = $_POST['id'];
    getById($id);
}

////////////////////////////////////////////////////////////////

function fetchUser()
{
    include 'DB.php';
    
    $sql = "SELECT * FROM users ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    $checkResult = mysqli_num_rows($result);

    if($checkResult > 0){
        $i=1;
        while($row = mysqli_fetch_assoc($result)){
            echo "
            <tr>
            <td>".$i++."</td>
            <td>".$row["fname"]."</td>
            <td>".$row["lname"]."</td>
            <td>".$row["address"]."</td>
            <td>".$row["gender"]."</td>
            <td>
            <button class='btn btn-sm btn-primary' onclick='editModal('".$row['id']."')'><span class='glyphicon glyphicon-wrench'></span> EDIT</button> | 
            <button class='btn btn-sm btn-danger'><span class='glyphicon glyphicon-trash'></span> DELETE</button>
            </td>
            </tr>
            
            ";
        }
    }    
}

function saveUser($fname, $lname, $address, $gender)
{
    include 'DB.php';

    $sql = 'INSERT INTO users(fname, lname, address, gender) VALUES("'.$fname.'", "'.$lname.'", "'.$address.'", "'.$gender.'")';
    mysqli_query($conn, $sql);
}

function getById($id)
{
    include 'DB.php';
    $sql = "SELECT * FROM users WHERE id='$id' ";
    mysqli_query($conn, $sql);
}


?>