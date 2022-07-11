<?php

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "project";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

    if(isset($_POST['logbut'])){
        $emailid = $_POST['email'];
        $password = $_POST['pass'];

        $sql = "SELECT * FROM login WHERE email = '$emailid' AND password = '$password' ";
        $result = mysqli_query($conn,$sql);
        if(isset($result)){
            echo "working";
            if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_array($result);
            }
            else{
                echo "no";
            }
        }
        else{
            echo "not working";

        }

        if($row['email'] == $emailid && $row['password'] == $password){
            echo "<script>window.location='afterlog.html'</script>";
        }
        else{
            echo "<script>alert('Check your credentials')</script>";
            echo "<script>location.replace('index.html') </script>";
        }
    }
    if(isset($_POST['sibut'])){
      $emailid = $_POST['email'];
      $password = $_POST['pass'];
      $repassword= $_POST['repass'];
      if($password==$repassword){
        $sql="INSERT INTO login(email,password) values ('$emailid','$password')";
        $result=mysqli_query($conn,$sql);
        if(isset($result)){

          echo "<script> alert ('Account ccreated Successfully'); window.location='  afterlog.html'; </script> ";
        }
        else{
          echo "<script> alert ('Not created contact admin'); </script> ";
        }
      }
      else {
        echo " <script> alert ('Re-password is wrong'); </script>";
      }

    }
    if(isset($_POST['change'])){
      $emailid = $_POST['email'];
      $password = $_POST['npass'];
      $repassword= $_POST['repass'];
      if($password==$repassword){
        $sql="INSERT INTO login(password) values ('$password')";
        $result=mysqli_query($conn,$sql);
        if(isset($result)){

          echo "<script> alert ('Password changed Successfully'); window.location='  afterlog.html'; </script> ";
        }
        else{
          echo "<script> alert ('Not created contact admin'); </script> ";
        }
      }
      else {
        echo " <script> alert ('Re-password is wrong'); </script>";
      }

    }
?>