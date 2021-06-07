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
    $id = $_POST['id'];
    getById($id);
}
elseif($function == 'getview')
{
    $id = $_POST['id'];
    getview($id);
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
elseif($function == 'insertUpdate')
{
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];


    insertUpdate($id, $fname,$lname,$address, $gender);
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
        while($row = mysqli_fetch_array($result)){
            echo '
            <tr>
            <td>'.$i++.'</td>
            <td>'.$row['fname'].'</td>
            <td>'.$row['lname'].'</td>
            <td>'.$row['address'].'</td>
            <td>'.$row['gender'].'</td>
            <td>
            <button class="btn btn-sm btn-info" onclick="viewModal('.$row['id'].')"><span class="glyphicon glyphicon-user"></span></button> |
            <button class="btn btn-sm btn-primary" onclick="editModal('.$row['id'].')"><span class="glyphicon glyphicon-wrench"></span></button> | 
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

    while($row = mysqli_fetch_row($result))
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

//show view
function getview($id)
{
    include 'DB.php';
    $sql = "SELECT * FROM users WHERE id='".$id."' ";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_row($result))
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

    echo '<button type="button" class="btn btn-warning">
    Total Users <span class="badge badge-light">'.$checkRow.'</span>
    </button>';
}

//save update to database
function insertUpdate($id, $fname,$lname,$address, $gender)
{
    include 'DB.php';
    $sql = "UPDATE users SET id='".$id."', fname='".$fname."', lname='".$lname."', address='".$address."', gender='".$gender."' WHERE id='".$id."' ";
    mysqli_query($conn, $sql);
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