<?php 
require 'connect.php';
$errorMsg = '';
$error = '';
$success = "";



if(isset($_POST['register'])) {

	$name = mysqli_real_escape_string($conn, $_POST["name"]);
	$username = mysqli_real_escape_string($conn, $_POST["username"]);
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
  $password = mysqli_real_escape_string($conn, $_POST["pwd"]);
  $cpassword = mysqli_real_escape_string($conn, $_POST["cpwd"]);
    if (empty($_POST['name'])) {
         $error = "name required  <br/>";
    }

    if (empty($_POST['username'])) {
        $error = "username required  <br/>";
    }  

    if (empty($_POST['email'])) {
         $error = "email is required  <br/>";
    } else {
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "email must be valid address  <br/>";
        }  
		}

    if (empty($_POST['pwd'])) {
         $error = " password required ";
         
    } 

    if($password != $cpassword) {
        $error = "password does not match  <br/>";
    }      
	

			//check if account exist
			$query = "SELECT * FROM users WHERE email = '$email'";
			$query_result = mysqli_query($conn, $query);
			$count = mysqli_num_rows($query_result);

			if ($count > 0) {
				$error = "This email address already exists. Switch tab to log in";
			}

			
			if(empty($error)) {
					$password = password_hash($password, PASSWORD_DEFAULT);
				$sql = "INSERT INTO users(name,username, password_hash, email) VALUES('$name','$username','$password', '$email')";
				$add_user = mysqli_query($conn, $sql);
        $_SESSION['mgs'] = "Registration Successful..";
        header('location: login.php');
				
		} 
		
	
}


    
            
 ?>





<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<meta name="theme-color" content="#333" />
		<title>SpendLess - Home</title>
		<link rel="stylesheet" href="css/index.css" />
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
		/>
		<link
			href="https://fonts.googleapis.com/css?family=Nunito&display=swap"
			rel="stylesheet"
		/>
		<link rel="stylesheet" href="css/style.css" />
		<!-- <link rel="stylesheet" href="css/signup.css"> -->
		<link
			rel="stylesheet"
			href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
			integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="css/danstyles.css" />
		<!-- css file for sign up button pulse animation-->
		<link rel="stylesheet" type="text/css" href="css/animate.css" />
		<link rel="stylesheet" href="./css/signuplogin.css" />
		<link rel="manifest" href="/manifest.json" />
		<style>
			.card-box{
			    padding: 15px;
			    box-shadow: 0 0 10px #CDCDCD;
			    text-align: center;

			}
			.card-box-text{
			    text-align: justify
			}
			.get-started{
			    display: flex;
			    flex-direction: row;
			    justify-content: center;
			}
			index-sign-up{
			   background-color: orange; !important
			}
			.index-sign-up:hover{
			    background-color: orangered;
			    color: white;
			    border: none;

			}
			.animatedPulse {
			    animation: pulse 1s infinite;
			      }

			      .center {
			      	text-align:  center;
			      	font-size: 10px;
			      	padding: 15px;
			      	color:  red;

			      }
		</style>
	</head>
	<body>
		<nav class="flex">
			<figure>
				<a href=""><img
					src="https://res.cloudinary.com/angelae/image/upload/v1569493481/Start-ng-Pre-internship/n2mmwn3pvnbjuaqjjkj3.png"
					alt="Logo"
					style="width: 63px; height: 63px; padding: 10px;"
				/></a>
			</figure>
			<div class="big-nav hidden">
				<ul>
					<a href="" class="toplinks"><li></li></a>
					<a href="" class="toplinks"><li></li></a>
					<a href="" class="toplinks"><li></li></a>
					<a href="" class="toplinks"><li></li></a>
					<a href="" class="toplinks"><li></li></a>
				</ul>
				<div>
					<a
						href="signup-login.html"
						class="toplinks-signup"
						data-toggle="modal"
						data-target="#signup"
						>SIGN UP / LOG IN</a
					>
				</div>
			</div>
			<i class="fa fa-bars"></i>
			<div class="small-nav hidden">
				<a href="" class="toplinks">Why SpendLess?</a>
				<a href="" class="toplinks">Solutions</a>
				<a href="" class="toplinks">Resources</a>
				<a href="" class="toplinks">How it Works</a>
				<a href="" class="toplinks">Support</a>
			</div>
		</nav>

		

		<div class="container container1">
			<header>
				<p>Welcome</p>
			</header>
			

			<form action="" method="POST">
			
		
			
				<?php
						if($error) {
              echo "<p class='text-danger text-center'>$error</p>";
            }
						?>
		
					
				 
			
				<table class="signup-form1">
					<tr>
						<td>
							<label for="name">Name</label>
						</td>
					</tr>
					<tr>
						<td>
							<input
								type="text"
								name="name"
								id="name"
								placeholder="Enter your name"
								
							/>
						
						</td>
					</tr>
					<tr>
						<td>
							<label for="Username">Username</label>
						</td>
					</tr>
					<tr>
						<td>
							<input
								type="text"
								name="username"
								id="username"
								placeholder="Enter username"
								
							/>
							
						</td>
					</tr>
					<tr>
						<td>
							<label for="name">Email</label>
						</td>
					</tr>
					<tr>
						<td>
							<input
								type="email"
								name="email"
								id="email"
								placeholder="Enter your email addresss"
							/>
							
						</td>
					</tr>
					<tr>
						<td>
							<label for="Pass1">Password</label>
						</td>
					</tr>
					<tr>
						<td>
							<input
								type="password"
								name="pwd"
								id="pass1"
								placeholder="Enter password"
								value="<?php echo ""?>"
							/>
							
						</td>
					</tr>
					<tr>
						<td>
							<label for="cpwd">Confirm Password</label>
						</td>
					</tr>
					<tr>
						<td>
							<input
								type="password"
								name="cpwd"
								id="pass2"
								placeholder="Confirm password"
							/>
							
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" value="sign up" name='register' />
						</td>
					</tr>
				</table>
				<div class="signup-login-container">

				<P>Already signup ? <a href="login.php">login</a></P>
				
			</div>
			</form>

		
    </div>
    
		<footer style="padding-top: 1.5%;">
			Team Ganymede - HNGi6 &copy; 2019.
			<a href="#"><i class="fa fa-angle-double-up"></i></a>
		</footer>

		<!-- Scripts should come below here -->
		<script src="./js/signup-login.js"></script>
		<script src="./js/menu-action.js"></script>
		<script
			src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
			integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
			crossorigin="anonymous"
		></script>
		<script
			src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
			integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
			crossorigin="anonymous"
		></script>
		<script
			src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
			integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
			crossorigin="anonymous"
		></script>
		<script>
			$('.popover-dismiss').popover({
				trigger: 'focus'
			});
		</script>
	</body>
</html>
