<?php
require_once 'dbconfig.php';

if($user->is_loggedin()!="")
{
    $user->redirect('home.php');
}

if(isset($_POST['btn-signup']))
{
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']); 
    $uname = trim($_POST['uname']);
    $city = trim($_POST['city']);
    $birthday= trim($_POST['birthday']);
    $creditCardNumber = trim($_POST['creditCardNumber']); 
    $ccv = trim($_POST['ccv']);
    
   $uemail = trim($_POST['email']);
   $upassword = trim($_POST['pwd']); 
    
    if($uname=="") {
      $error[] = "provide username !"; 
   }else if($uemail=="") {
      $error[] = "provide email id !"; 
   }
   else if(!filter_var($uemail, FILTER_VALIDATE_EMAIL)) {
      $error[] = 'Please enter a valid email address !';
   }
   else if($upassword=="") {
      $error[] = "provide password !";
   }
   else if(strlen($upassword) < 6){
      $error[] = "Password must be atleast 6 characters"; 
   }
   else
   {
      try
      {
         $stmt = $DB_con->prepare("SELECT username,email FROM user WHERE username=:uname OR email=:email");
         $stmt->execute(array(':uname'=>$uname, ':email'=>$uemail));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);
    
         if($row['username']==$uname) {
            $error[] = "sorry username already taken !";
         }
          else if($row['email']==$uemail) {
            $error[] = "sorry email id already taken !";
         }
        
         else
         {
            if($user->register($fname,$lname,$uname,$city,$birthday,$creditCardNumber,$ccv,$uemail,$upassword)) 
            {
                $user->redirect('sign-up.php?joined');
            }
         }
     }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }
  } 
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign up : cleartuts</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css"  />
</head>
<body>
<div class="container">
     <div class="form-container">
        <form method="post">
            <h2>Sign up.</h2><hr />
            <?php
            if(isset($error))
            {
               foreach($error as $error)
               {
                  ?>
                  <div class="alert alert-danger">
                      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                  </div>
                  <?php
               }
            }
            else if(isset($_GET['joined']))
            {
                 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here
                 </div>
                 <?php
            }
            ?>
           
            <div class="form-group">
             <input type="text" class="form-control" name="fname" placeholder="Enter First Name" />
            </div>
            <div class="form-group">
             <input type="text" class="form-control" name="lname" placeholder="Enter Last Name" />
            </div>
            <div class="form-group">
             <input type="text" class="form-control" name="uname" placeholder="Enter UserName" />
            </div>
            <div class="form-group">
             <input type="text" class="form-control" name="city" placeholder="Enter city" />
            </div>
            <div class="form-group">
             <input type="text" class="form-control" name="birthday" placeholder="Enter your birthday" />
            </div>
            <div class="form-group">
             <input type="text" class="form-control" name="creditCardNumber" placeholder="Enter credit card details" />
            </div>
            <div class="form-group">
             <input type="text" class="form-control" name="ccv" placeholder="Enter ccv" />
            </div>
            <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Enter E-Mail ID" value="<?php if(isset($error)){echo $uemail;}?>" />
            </div>
            <div class="form-group">
             <input type="password" class="form-control" name="pwd" placeholder="Enter Password" />
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-signup">
                 <i class="glyphicon glyphicon-open-file"></i>&nbsp;SIGN UP
                </button>
            </div>
            <br />
            <label>have an account ! <a href="index.php">Sign In</a></label>
        </form>
       </div>
</div>

</body>
</html>