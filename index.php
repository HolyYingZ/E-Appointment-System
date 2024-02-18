<?php  
$host="localhost";
$user="root";
$password="";
$database="appointment";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try{
    $con=mysqli_connect($host, $user, $password, $database);
}catch (Exception $ex){
    echo'Error';
}
  if(isset($_POST['insert']))

  {
      $fname=$_POST['fname'];
        $mname=$_POST['mname'];
          $lname=$_POST['lname'];
            $pov=$_POST['pov'];
            $address=$_POST['address'];
              $desig=$_POST['desig'];
                $phone=$_POST['phone'];
                  $aemail=$_POST['aemail'];
            $adate=$_POST['adate'];
            $status=$_POST['status'];
             

    
    $sql_u = "SELECT * FROM entry WHERE aemail='$aemail' AND adate='$adate'";
    
    $res_u = mysqli_query($con, $sql_u);
    

    if (mysqli_num_rows($res_u) > 0) {
      echo "<script>alert('Your data is mismatched')</script>";
    }else{


    move_uploaded_file($_FILES['iproof']['tmp_name'], "upload/".$_FILES['iproof']['name']);
    move_uploaded_file($_FILES['photo']['tmp_name'], "upload/".$_FILES['photo']['name']);
    
    $iproof = $_FILES['iproof']['name'];
    $photo = $_FILES['photo']['name'];
    $sql = "INSERT INTO `entry`(`fname`, `mname`, `lname`, `pov`, `address`, `desig`, `phone`, `aemail`, `adate`, `iproof`, `photo`, `status`) VALUES  ('$fname','$mname','$lname','$pov','$address','$desig','$phone','$aemail','$adate','$iproof','$photo','$status')";
    $res = $con->query($sql);
    if($res){
      //$msg="Send Successful";
        header("location: index.php");
    }else{
      echo "Data not Inserted";;
    }
  }
      }
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>E-Appointment</title>

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">

  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
</head>

<body class="sidebar-menu-collapsed">
<div class="se-pre-con"></div>
<section>
  <!-- sidebar menu start -->
  <div class="sidebar-menu sticky-sidebar-menu">

    <!-- logo start -->
    <div class="logo">
      <h1><a href="index.html">Collective</a></h1>
    </div>

  <!-- if logo is image enable this -->
    <!-- image logo --
    <div class="logo">
      <a href="index.html">
        <img src="image-path" alt="Your logo" title="Your logo" class="img-fluid" style="height:35px;" />
      </a>
    </div>
    <!-- //image logo -->

    <div class="logo-icon text-center">
      <a href="index.html" title="logo"><img src="assets/images/logo.png" alt="logo-icon"> </a>
    </div>
    <!-- //logo end -->

    
  </div>
  <!-- //sidebar menu end -->
  <!-- header-starts -->
  <div class="header sticky-header">

    <!-- notification menu start -->
    <div class="menu-right">
      <center><h1>E-Appointment System</h1></center>
    </div>
    <!--notification menu end -->
  </div>
  <!-- //header-ends -->
<!-- main content start -->
<div class="main-content">

    <!-- content -->
    <div class="container-fluid content-top-gap">

        <!-- breadcrumbs -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb my-breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Take Appointment</li>
            </ol>
        </nav>
        <!-- //breadcrumbs -->
        <!-- forms -->
        <section class="forms">
            <!-- forms 1 -->
            <div class="card card_border py-2 mb-4">
                <div class="card-body">
                  <div class="cards__heading">
                    <h3>Please Fill up the Required fields <span></span></h3>
                </div>
                    <form action="index.php" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputEmail4" class="input__label">Enter First Name</label>
                                <input type="text" class="form-control input-style" id="fname" name="fname">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4" class="input__label">Enter Middle Name</label>
                                <input type="text" class="form-control input-style" id="mname" name="mname" 
                                    >
                            </div>
                             <div class="form-group col-md-3">
                                <label for="inputPassword4" class="input__label">Enter Last Name</label>
                                <input type="text" class="form-control input-style" id="lname" name="lname" 
                                    >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress" class="input__label">Purpose of Visit</label>
                            <textarea class="form-control input-style" id="pov" name="pov" 
                                ></textarea>
                        </div>
                         <div class="form-group">
                            <label for="inputAddress" class="input__label">Address</label>
                            <textarea class="form-control input-style" id="address" name="address" 
                                ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2" class="input__label">Designation/Occupation</label>
                            <input type="text" class="form-control input-style" id="desig" name="desig" 
                                >
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity" class="input__label">Phone Number</label>
                                <input type="text" class="form-control input-style" id="phone" name="phone">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity" class="input__label">Email</label>
                                <input type="text" class="form-control input-style" id="aemail" name="aemail">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity" class="input__label">Appointment Expected Date</label>
                                <input type="date" class="form-control input-style" id="adate" name="adate">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity" class="input__label">ID Proof</label>
                                <input type="file" class="form-control input-style" id="iproof" name="iproof">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity" class="input__label">Photo</label>
                                <input type="file" class="form-control input-style" id="photo" name="photo">
                                <input type="text" name="status" value="Applied">
                            </div>
                            
                            
                        </div>
                       
                        <button type="submit" name="insert" class="btn btn-primary btn-style mt-4">Apply</button>
                    </form>
                </div>
            </div>
          
            <!-- //forms 1 -->

            <!-- forms 2 -->
            
            <!-- //forms 2 -->

            <!-- horizontal forms-->
            <!-- forms 3 -->
          
            <!-- //forms 3 -->
            <!-- //horizontal forms-->

            <!-- supported elements -->
            <!--  -->
          
            <!-- // -->
            <!-- supported elements -->

        </section>
        <!-- //forms -->
        </section>
        <!-- //forms  -->

    </div>
    <!-- //content -->

</div>
<!-- main content end-->
</section>
<!--footer section start-->
<footer class="dashboard">
  <p>&copy 2020 Collective. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank"
      class="text-primary">W3layouts.</a></p>
</footer>
<!--footer section end-->
<!-- move top -->
<button onclick="topFunction()" id="movetop" class="bg-primary" title="Go to top">
  <span class="fa fa-angle-up"></span>
</button>
<script>
  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () {
    scrollFunction()
  };

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.getElementById("movetop").style.display = "block";
    } else {
      document.getElementById("movetop").style.display = "none";
    }
  }

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
</script>
<!-- /move top -->


<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/jquery-1.10.2.min.js"></script>

<!-- chart js -->
<script src="assets/js/Chart.min.js"></script>
<script src="assets/js/utils.js"></script>
<!-- //chart js -->

<!-- Different scripts of charts.  Ex.Barchart, Linechart -->
<script src="assets/js/bar.js"></script>
<script src="assets/js/linechart.js"></script>
<!-- //Different scripts of charts.  Ex.Barchart, Linechart -->


<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/scripts.js"></script>

<!-- close script -->
<script>
  var closebtns = document.getElementsByClassName("close-grid");
  var i;

  for (i = 0; i < closebtns.length; i++) {
    closebtns[i].addEventListener("click", function () {
      this.parentElement.style.display = 'none';
    });
  }
</script>
<!-- //close script -->

<!-- disable body scroll when navbar is in active -->
<script>
  $(function () {
    $('.sidebar-menu-collapsed').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- disable body scroll when navbar is in active -->

 <!-- loading-gif Js -->
 <script src="assets/js/modernizr.js"></script>
 <script>
     $(window).load(function () {
         // Animate loader off screen
         $(".se-pre-con").fadeOut("slow");;
     });
 </script>
 <!--// loading-gif Js -->

<!-- Bootstrap Core JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>


</body>

</html>