<?php
if (isset($_POST['submit'])) {
   
              if (!empty($_POST['email']) && !empty($_POST['pass'])) {
        $con=mysqli_connect("localhost:3306","root","","saloonapps") or die(mysqli_error());
        $f_name=$_POST['f_name'];
        $l_name=$_POST['l_name'];
        $dob=$_POST['dob'];
        $m_no=$_POST['m_no'];
        $email=$_POST['email'];
        $pass=md5($_POST['pass']);
        $gender=$_POST['gender'];
        $c_pass=md5($_POST['pass']);
        $slqry = "SELECT * FROM register WHERE email = '$email'";
    $slresult = mysqli_query($con,$slqry);
    if(mysqli_num_rows($slresult)>0)
    {
         echo"email already exists";
    }
    elseif($pass != $c_pass){
         echo"passwords doesn't match";
    }
    else{
          $qry="INSERT INTO `register`(`id`, `f_name`, `l_name`, `dob`, `m_no`, `email`, `pass`, `gender`) VALUES (NULL,'$f_name','$l_name','$dob','$m_no','$email','$pass','$gender')";
         $result=mysqli_query($con,$qry);
        
          if($result){
             echo "User Created Successfully.";
                header("location:login");
          }
    }
       

        /* $qry="INSERT INTO register(f_name,l_name,dob,m_no,email,pass,gender,c_pass) VALUES ('$f_name','$l_name','$dob','$m_no','$email','$pass','$gender','$c_pass')";
         $result=mysqli_query($con,$qry);
        if ($result) {
                
                 echo "Account Created Successfully";
                         header("location:login");    
                    
                     }                                   
                                                          
            else                                                                        
            {                                          
                echo "Failure".mysqli_error($con);
                                                          
            }*/
}
        
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Register Form</title>

    <!-- Icons font CSS-->
    <link href="<?php echo base_url() ?>register/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url() ?>register/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url() ?>register/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url() ?>register/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url() ?>register/css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration Form</h2>
                    <form method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">first name</label>
                                    <input class="input--style-4" type="text" name="f_name">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">last name</label>
                                    <input class="input--style-4" type="text" name="l_name">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                           <div class="col-2">
                                <div class="input-group">   
                                    <label class="label">Birthday</label>
                                    <input class="input--style-4" type="date" name="dob">
                                </div>
                            </div>
                           
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Mobile No</label>
                                    <input class="input--style-4" type="phone" name="m_no">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">   
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" type="password" name="pass">
                                </div>
                            </div>
                        </div>
                              <div class="row row-space">
                            
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" checked="checked" value="male" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" checked="checked"  value="female" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                              <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Confirm Password</label>
                                    <input class="input--style-4" type="password" name="c_pass">
                                </div>
                            </div>

                        </div>
                    
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="<?php echo base_url() ?>register/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="<?php echo base_url() ?>register/vendor/select2/select2.min.js"></script>
    <script src="<?php echo base_url() ?>register/vendor/datepicker/moment.min.js"></script>
    <script src="<?php echo base_url() ?>register/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="<?php echo base_url() ?>register/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->