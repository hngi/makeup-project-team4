<?php  
include "connect.php";
$msg = '';
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $query = "SELECT * FROM users WHERE email = '$email'";
    $hash_code;
    $search = mysqli_query($conn, $query)
    or die("Error getting email from db");

    if ($search && mysqli_num_rows($search) > 0 ) {
        $result = mysqli_fetch_all($search, MYSQLI_ASSOC);

        foreach ($result as $det) {
            if ($det['email'] == $email) {
            $hash_code = $det['hash_code'];
                 
            }
        }
    $from = "noreply@spendless.com";
    $to = $email;
    $subject = "Recover Your SpendLess Password";
    $msg = "Click the link below to recover your password \n\n
    
    https://spendless-hng.000webhostapp.com/recoverpass.php?email=$email&hash=$hash_code
    
    ";
    $sent = mail($to, $subject, $msg, "From: $from");
    if ($sent) {
        $msg = "Follow the link sent to your email to recover your password";
    }
     
    } else {
        $msg = "There is no record of this email address";
    }
    

 


}

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="theme-color" content="#333"/>
        <link rel="manifest" href="/manifest.json"/>  
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="newcss.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Forgot Password</title>
        <!--- <style>
        body {
            font-family: Nunito, sans-serif;
        }
        .forgot-form {
            margin-left: 5%;
            margin-top: 5%;
            align-items: center;
        }
        .email-input {
            width: 100%;
        }
        .button {
            width: 50%;
            margin-left: 25%;
            background-color: #FF7800;
            border: none;
            outline: 0;
        }
        </style> --->
    </head>

    <body>       
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #32465a;">
            <a class="navbar-brand" href="index.html"><img
					src="https://res.cloudinary.com/angelae/image/upload/v1569493481/Start-ng-Pre-internship/n2mmwn3pvnbjuaqjjkj3.png"
					alt="Logo"
					style="width: 63px; height: 63px; padding: 10px;"
				/></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link py-md-3 px-4" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link py-md-3 px-4" href="content.html#why-spendless">Why SpendLess?</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link py-md-3 px-4" href="content.html#how-it-works">How it Works</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link py-md-3 px-4" href="content.html#support">Support</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link py-md-3 px-4" href="faq.html">FAQ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link py-md-3 px-4" href="index.html#about-us">About Us</a>
                </li>
                <a href="login.php" class="nav-item py-md-3 px-4 btn btn-outline-warning">LOG IN</a>

              </ul>
              
            </div>
          </nav>
        
        <section class="signup">
            <div class="container h-100">
                <div class="signup-content">
                    <form class="formSize" action="forgotpassword.php" method="POST" name="ForgotPasswordForm">
                        <div class="formHeader col-12">Forgot Password?</div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label>Please enter the email address registered to your account.</label>
                                    <input class ="form-control" type="email" placeholder="Enter Email" name="email" id="inputEmail">
                                    <div class="errorMessage" id="email_error"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <button class="btn btn-outline-warning btn-lg btn-block" type="submit" value="Send" name="submit">Send</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div>
                    <p><?php echo $msg ?></p>
                </div>
            </div>
        </section>

        <footer class="footer">
            <div class="footerText"> Team Ganymede - HNGi6 &copy; 2019.  <a href="#"><i class="fa fa-angle-double-up fa-2x"></i></a></div>
        </footer>
<script src="app.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="newjs.js"></script>
<script src="terms.js"></script>
    </body>
</html>