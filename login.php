<?php  

 include_once 'database.php';
 session_start();
 if(isset($_SESSION["staffid"]))  
      {  
        header("location:index.php");
      }

 try  
 {  
       $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["staffid"]) || empty($_POST["password"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM tbl_staffs_a167688_pt2 WHERE fld_staff_id = :staffid AND fld_staff_password = :password";  
                $stmt = $conn->prepare($query);  
                $stmt->execute(  
                     array(  
                          'staffid'     =>     $_POST["staffid"],  
                          'password'     =>     $_POST["password"]  
                     )  
                );  
                $count = $stmt->rowCount();  
                if($count > 0)  
                {  
                	
                    $_SESSION["staffid"] = $_POST["staffid"];  
                   
                  

                     header("location:login_success.php");  
                }  
                else  
                {  
                     $message = '<label>Wrong Password</label>';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
        <?php include_once 'nav_bar_login.php' ?>
           <title>BABY CLOTHES: Login</title>  
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          <link href="css/bootstrap.min.css" rel="stylesheet"> 

             <script src="js/bootstrap.min.js"></script>  
      </head>  
      <body>

           <br />  
           <div class="container" style="width:500px;">  
                <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>
                <a href="logo.jpg"><img src="logo.jpg" alt="Picture of a logo" height="300" width="500"></a>
                <center><h3 align="">BABY COUTURE Store</h3></center><br /> 

                <form method="post">  
                     <label>Username</label>  
                     <input type="text" name="staffid" class="form-control" />  
                     <br />  
                     <label>Password</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <center><input type="submit" name="login" class="btn btn-primary" value="Login" /></center>  
                </form>  
           </div>  
           <br />  
      </body>  
 </html>  