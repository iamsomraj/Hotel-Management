<?php
        
session_start();
$count=2;
if(isset($_SESSION["isformfill"]))
{
    if(($_SESSION["isformfill"]) == 1)
    {

?>


<?php

    $username=$_SESSION['username'];
    $password=$_SESSION['password'];
    include("connection.php");
    $query="select * from admin where user=\"$username\" and pass=\"$password\"";
    $result=mysqli_query($link,$query);
    $databaselog = "";
    if($link)
    {
        
                $databaselog .= "<p>Connection Success!</p>";

    }
    else
    {
                $databaselog .= "<p>Connection Failed!</p>";
                header("location:admin-login-wrong.php");

    }
    $row=mysqli_num_rows($result);
    if($row==1)
    {
            echo "Logged in successfully";
            $_SESSION["isformfill"]++;
            header("location:admin-home.php");
    }
    else
    {
            $databaselog .= "<p>Data is not inserted!</p>";
            header("location:admin-login-wrong.php");
        
    }
        
        
?>


<?php
        
            }
    else
    {
        header("index.php");
    }


}
else
{
    header("index.php");
}




?>
