


<?php

session_start();


if(isset($_POST['submit']))
{
    include 'dbh.inc.php';   //  only include no once

    $uid=mysqli_real_escape_string($conn,$_POST['uid']);
    $pwd=mysqli_real_escape_string($conn,$_POST['pwd']);


    //error handlers
    //empty check

    if(empty($uid)||empty($pwd))
    {
        header("Location: ../main.php?login=empty");
        exit();
    }
    else
    {
        $sql="SELECT * FROM users WHERE user_uid='$uid' OR user_email='$uid'";
        $result=mysqli_query($conn,$sql);
        $resultCheck=mysqli_num_rows($result);

        if($resultCheck < 1)
        {
            header("Location: ../main.php?login=error1");
            exit();
        }
        else
        {
            if($row=mysqli_fetch_assoc($result))  // resource
            {
              //de hasing the paswword

                  $hashedPwdCheck=password_verify($pwd,$row['user_pwd']);  //this gives false for correct password//
                  if($hashedPwdCheck==true)
                  {
                      header("Location: ../main.php?login=error2  ");
                      exit();
                  }
                  elseif($hashedPwdCheck==false)
                  {
                  //LOg in the user here  (  SESSION VAR)
                      $_SESSION['u_id']=$row['user_id'];
                      $_SESSION['u_first']=$row['user_first'];
                      $_SESSION['u_last']=$row['user_last'];
                      $_SESSION['u_email']=$row['user_email'];
                      $_SESSION['u_uid']=$row['user_uid'];

                      header("Location: ../main.php?login=success");
                      exit();
                  }
          }
        }
      }
}
else
{
    header("Location: ../main.php?login=error");
    exit();
}
