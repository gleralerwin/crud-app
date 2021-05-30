<?php

$function = $_POST["function"];

if($function == 'fetchUser')
{
    fetchUser();
}
elseif($function == 'saveUser')
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    saveUser($fname, $lname, $address, $gender);
}
elseif($function == 'getById')
{
    $id = isset($_POST['id']);
    getById($id);
}
elseif($function == 'countRow')
{
    countRow();
}
elseif($function == 'deleteId')
{   
    $id = $_POST['id'];
    deleteId($id);
}
////////////////////////////////////////////////////////////////

function fetchUser()
{
    include 'DB.php';
    
    $sql = "SELECT * FROM users ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    $checkResult = mysqli_num_rows($result);

    if($checkResult > 0){
        $message = "";
        $i=1;
        while($row = mysqli_fetch_assoc($result)){
            echo '
            <tr>
            <td>'.$i++.'</td>
            <td>'.$row['fname'].'</td>
            <td>'.$row['lname'].'</td>
            <td>'.$row['address'].'</td>
            <td>'.$row['gender'].'</td>
            <td>
            <button class="btn btn-sm btn-info" onclick="editModal('.$row['id'].')"><span class="glyphicon glyphicon-wrench"></span></button> | 
            <button class="btn btn-sm btn-danger" onclick="deleteUser('.$row['id'].')"><span class="glyphicon glyphicon-trash"></span></button>
            </td>
            </tr>
            
            ';
        }
    } 
    else {
        $message = "<center>Database is Empty!</center>";
        echo $message;
            
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
    $sql = "SELECT * FROM users WHERE id='".$id."' ";
    $result = mysqli_query($conn, $sql);
    
    while($row = mysqli_fetch_assoc($result))
    {
        $arr[] = array(
            'id'=>$row[0],
            'fname'=>$row[1],
            'lname'=>$row[2],
            'address'=>$row[3],
            'gender'=>$row[4]
        );
    }
    echo json_encode($arr);
    exit();
}

function countRow()
{
    include 'DB.php';
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    $checkRow = mysqli_num_rows($result);
    echo $checkRow;
}

function deleteId($id)
{
    include 'DB.php';
    $sql = "DELETE FROM users WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if($result){ 
        return true;
    }else {
        return false;
    }
}

?>