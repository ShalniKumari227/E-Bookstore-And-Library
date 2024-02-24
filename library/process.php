<?php 

    if(isset($_POST['btn-send']))
    {
       $UserName = $_POST['UName'];
       $Email = $_POST['Email'];
       $header= [
                    "from: $Email"
                ];
       $Subject = $_POST['Subject'];
       $Msg = $_POST['msg'];

       $to = "shalnikumari227@gmail.com";

        if(mail($to,$Subject,$Msg,$header))
        {
           echo "mail sent.";
        }else{
            echo "email failed.";
        }
    }
    else
    {
        header("location:contactus.php");
    }
?>