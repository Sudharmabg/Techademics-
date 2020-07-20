<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
  	array_push($errors, "email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['email'] = $email;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index1.html');
  	}else {
  		array_push($errors, "Wrong email/password combination");
  	}
  }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Anusha">
    <meta name="description" content="This is my fist web page ">
    
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>Registration system PHP and MySQL</title>
  <style>
  * {
  margin: 0px;
  padding: 0px;
}
body {
  font-size: 120%;
  background: #F8F8FF;
  background-image:url(literature-3091212_1920.jpg);
}

.header {
  width: 30%;
  margin: 50px auto 0px;
  color: white;
  background: #5F9EA0;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}
form, .content {
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #5F9EA0;
  border: none;
  border-radius: 5px;
}
.error {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
}
.success {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
}
</style>
</head>
<body>
<header>
       <nav class="navbar" style="background-color:#CCC">
          <div class="navbar-brand">
             <img src="logo-new.png" width="190px" height="110px" >
          </div>
          <ul class="navbar nav">
            <!-- <div class="row"> -->
    <ul class="navbar nav">
     
                <li class="nav-item"><a href="index.html#home" class="nav-link" style="font-family:'Comic Sans MS', cursive"><img src="icons8-home-page-50.png">HOME</a></li>                
           
  

 <!--<li class="nav-item"><a href="#" class="nav-link" style="font-family:'Comic Sans MS', cursive"><img src="img/logo/icons8-add-user-male-50.png">SIGN UP</a></li>-->
          <!--  </div>   -->            
         </ul>
     </nav>
   </header>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('error.php'); ?>
  	<div class="input-group">
  		<label>Email</label>
  		<input type="text" name="email">
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="server.php">Sign up</a>
  	</p>
  </form>
</body>
<br>
 <footer style="background-color:#999">
     	<br>
 
         
         <div class="row">
     	
        	<div class="col-3">
            	
            <h3>Customer Care</h3>
                
                             <!--modal(pop up) code-->
                <a id="myBtn" style="background-color:#999">Contact us</a>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p style="color:#FFF"> <h3 align="center" style="color:#603">Contact us</h3>
    <br>
    For any queries regarding the website, availability of courses or issues in accessing courses, please contact
<br>
<br>
<h6> Administrator,<h6>

IC & SR, 3rd floor<br>
Jayanagar 7th Block<br>
Bangalore - 560050<br>
Tel : (044) 2257 5905 ; (044) 2257 5908<br>
 support@techademics.ac.in<br>

</p>
  
</div>
</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";

}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<br>
                
<a id="myBtn1" style="background-color:#999">About us</a>

<!-- The Modal -->
<div id="myModal1" class="modal" >

  <!-- Modal content -->
  <div class="modal1-content">
    <span class="close">&times;</span>
    <p style="color:#FFF">  <h3 align="center" style="color:#603"> About us</h3>
    <br>
   Techademics was founded in 2012 by two Stanford computer science professors with a vision to provide anyone, anywhere with access to the world’s best education. 
   <br>Some experts put their courses online for anyone to take— and taught more learners in a few months than they could over an entire lifetime in the classroom. 
   <br>
   <br>Today, Techademics has expanded to reach more than 40 million people and 1,900 businesses around the world. On this website you can find online courses, Specializations, certificates and degrees from 190+ world-class universities and companies.
   <br>
   <br>
   Techademics employees live out our values every day as learners and teachers ourselves. Our culture is diverse, inclusive, and committed to personal and professional development. We’re not afraid to take on a new challenge, and we love taking Techademics courses!
                        </p>
  </div>

</div>

<script>
// Get the modal
var modal1 = document.getElementById("myModal1");

// Get the button that opens the modal
var btn1 = document.getElementById("myBtn1");

// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("close")[1];

// When the user clicks the button, open the modal 
btn1.onclick = function() {
  modal1.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span1.onclick = function() {
  modal1.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = "none";
  }
}
</script>                             
    <br>
    <a id="myBtn2" style="background-color:#999">Help/FAQ</a>

<!-- The Modal -->
<div id="myModal2" class="modal" >

  <!-- Modal content -->
  <div class="modal2-content">
    <span class="close">&times;</span>
    <p>  <h3 align="center" style="color:#000"> Help/FAQ</h3>

<button class="accordion">How to take a course on this website?</button>
<div class="panel">
  <h6>To take a course on Techademics, you'll need to enroll. 

When you enroll in a course, you'll be able to start right away.</h6>
</div>
<br>
<button class="accordion">How to enroll in a single course in a Specialization</button>
<div class="panel">

  <h6>Some courses are part of Specializations, a series of related courses designed to help you master a specific topic.
<br>
<br>
You can take individual courses in a Specialization without having to complete the entire Specialization. You will get a Course Certificate for every individual course you complete, whether or not you finish the rest of the Specialization.</h6>
</div>
<br>
<button class="accordion">How to re-take a course</button>
<div class="panel">
  <h6>If you want to take a course again, you can re-take quizzes and exams and re-do assignments. Only your most recent grade will be counted. You can’t delete your coursework or reset your progress in a course you’ve already started.</h6>
</div>
<button class="accordion">What if I don’t like a course I purchased?</button>
<div class="panel">
  <h6>We want you to be satisfied, so if you're not happy with a course, you can even request a full refund within 30 days of purchasing a course.</h6>
</div>
<button class="accordion">Is there any way to preview a course?</button>
<div class="panel">
  <h6>Yes! If you're not sure if a course is right for you, you can start a free preview and watch a handful of lectures the instructor has selected. </h6>
</div>
<button class="accordion">How long do I have to complete a course?</button>
<div class="panel">
  <h6>As noted above, there are no deadlines to begin or complete the course. Even after you complete the course, you will continue to have access to it, provided that your account’s in good standing, and continues to have a license to the course. </h6>
</div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

                        </p>
  </div>

</div>

<script>
// Get the modal
var modal2 = document.getElementById("myModal2");

// Get the button that opens the modal
var btn2 = document.getElementById("myBtn2");

// Get the <span> element that closes the modal
var span2 = document.getElementsByClassName("close")[2];

// When the user clicks the button, open the modal 
btn2.onclick = function() {
  modal2.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span2.onclick = function() {
  modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal2) {
    modal2.style.display = "none";
  }
}
</script>
<br>
                                     
</div>

<div class="col-3">
<h3>Reach us</h3>
                <h6>For any query please email us</h6>
                <h6>student@techademics.com</h6>
                
            </div>



 <div class="col-3">
                <h3>Find us on</h3>
                <div class="row">
                   <span class="fa fa-facebook fa-2x"></span>
                   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <h3><a href="www.facebook.com" class="text-primary"> </a> </h3>
                   
                   <span class="fa fa-instagram fa-2x"></span>
                   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <h3><a href="www.instagram.com" class="text-primary"></a> </h3>
                   
                   <span class="fa fa-twitter fa-2x"></span>
                   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <h3><a href="www.twitter.com" class="text-primary"> </a> </h3>
                    
                    <span class="fa fa-snapchat fa-2x"></span>
                   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <h3><a href="www.snapchat.com" class="text-primary"> </a> </h3>
                    
                    <span class="fa fa-pinterest fa-2x"></span>
                   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <h3><a href="www.pinterest.com" class="text-primary"> </a> </h3>
                 </div>
                 <br>
                 <br>
                
            </div>
            
            <div class="col-3">
             <h3>Download the app on</h3>
                 <div class="row" align="center">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <span class="fa fa-android fa-2x"></span>
                  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <h3><a href="www.android.com" class="text-primary"> </a> </h3>
                  <span class="fa fa-apple fa-2x"></span>
                  
                  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <h3><a href="www.apple.com" class="text-primary"> </a> </h3>
                  </div>
                 
                 </div>
                 

</div>
           
            <div class="row bg-dark text-light">
            	<div class="col-12 text-center">
                	<h6 class="text-center">&copy;Techademics 2020 &reg;all rights reserved</h6>
                 </div>
            </div>
            
      



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</footer>
       
	
       
                
</body>
</html>
