
<?php 

session_start();

$conn = mysqli_connect(
    'localhost' ,
    'root' ,
    '123456' ,
    'crud'
);
if(isset($conn)){
    // echo 'Data base online';
}

?>