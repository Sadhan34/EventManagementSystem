<?php
include('db.php');
echo $_GET['id'];
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $sql="DELETE FROM event_register WHERE eventRegId=$id";
    if(mysqli_query($conn,$sql))
    {
        echo "Item deleted";
        header('location:registered_user.php');

    }
    else{
        echo "Item did not deleted".mysqli_error($conn);
        header('location:admin_home.php');
    }

}

?>