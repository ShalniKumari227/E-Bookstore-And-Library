<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['login']!=''){
$_SESSION['login']='';
}
if(isset($_POST['login']))
{

$email=$_POST['emailid'];
$password=md5($_POST['password']);
$sql ="SELECT EmailId,Password,StudentId,Status FROM tblstudents WHERE EmailId=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
 foreach ($results as $result) {
 $_SESSION['stdid']=$result->StudentId;
if($result->Status==1)
{
$_SESSION['login']=$_POST['emailid'];
echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
} else {
echo "<script>alert('Your Account Has been blocked .Please contact admin');</script>";

}
}

} 

else{
echo "<script>alert('Invalid Details');</script>";
}
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>E-BOOKSTORE & LIBRARY </title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->

<div class="content-wrapper">
<div class="container">
<!--Slider---->
     <div class="row">
              <div class="col-md-10 col-sm-8 col-xs-12 col-md-offset-1">
                    <div id="carousel-example" class="carousel slide slide-bdr" data-ride="carousel" >
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="assets/img/1.jpg" alt="" width="device-width" />
                        </div>
                    </div>
                </div>
              </div>
             </div>
<hr> 

<section class="about_section layout_padding">
    <div class="container ">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="assets/img/about-img.png" alt="" width="100%">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Our E-Bookstore & Library
              </h2>
            </div>
            <p>
              This is a digital bookstore cum library, which is developed for those users/students who can't afford expenses of costly book. It also helps those book worms who can't stay away for book, by providing the book content.<br>

              <br>As the quote given by SIDNEY SHELDON :
              "Libraries store the energy that fuels the imagination. They open up windows to the world and inspire us to explore and achieve and contribute to improving our quality of life. Libraries change lives for the better". Which taught an importance of library(means reading book).
              <br> <hr>Books are the most loyal friends of us they improve our vocabulary, and help us in communication.

            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
<hr>
 <section class="about_section layout_padding">
    <div class="container ">
      <div class="row">
        
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
            <p><br><br>
              Bestest weapon in the world is none other than BOOKS only.<br>
              Education came from self study,<br> so they are equally valueable. 

            </p>
          </div>
        </div>
      </div>
      <div class="col-md-6">
          <div class="img-box">
            <img src="assets/img/Library-Quotes-5.jpg" alt="" width="50%">
          </div>
        </div>
    </div>
  </section>   

  <hr>
<section class="about_section layout_padding">
    <div class="container ">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="assets/img/Library-Quotes-6.jpg" alt="" width="50%">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <p>
              <br><br> Well said by ALBERT EINSTEIN,<br> all you need to know the address of library.
              so, that whenever you are stressed,felt lonely you can went to your best friend <br>i.e., BOOKS.

            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <hr>
<section class="about_section layout_padding">
    <div class="container ">
      <div class="row">
        
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
            <p>
              <br><br>“The library was a doorway to freedom, to free thought. <br>When you’re being taught, <br>“you can’t, you can’t, you can’t” … <br>the library says,<br> “you can, you can, you can.” 

            </p>
          </div>
        </div>
      </div>
      <div class="col-md-6">
          <div class="img-box">
            <img src="assets/img/Library-Quotes-4.jpg" alt="" width="50%">
          </div>
        </div>
    </div>
  </section>

</div>
</div>
  <!-- CONTENT-WRAPPER SECTION END-->
 <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

</body>
</html>