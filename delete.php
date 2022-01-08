<?php 
    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM task WHERE id = $id";
        $reesult = mysqli_query($conn, $query);

        if(!$reesult){
            die ("Query Failed");
        }

        $_SESSION['message'] = 'Task Removed Successfully';
        $_SESSION['message_type'] = 'danger'; 
        header("Location: index.php");
    }
?>