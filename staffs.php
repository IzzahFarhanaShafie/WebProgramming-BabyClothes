<?php
  include_once 'staffs_crud.php';
  include_once 'session.php';
?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>BABY CLOTHES : Staffs</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
   
  <?php include_once 'nav_bar.php'; ?>

  <!-- admin ui and supervisor only-->
  <?php if($pos==="Admin" || $pos==="Supervisor" ){ ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <?php if($pos==="Admin"){ ?>
        <h2>Create New Staff</h2>
       <?php }else{ ?>
         <h2>Edit Staffs</h2>
          <?php } ?>
      </div>
    <form action="staffs.php" method="post" class="form-horizontal">
      <div class="form-group">
          <label for="staffid" class="col-sm-3 control-label">ID</label>
          <div class="col-sm-9">
      <input name="sid" type="text" class="form-control" id="staffid" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_id']; ?>" required>
      </div>
      </div>
      <div class = "form-group"> 
      <label for="staffname" class="col-sm-3 control-label">Name</label>
      <div class="col-sm-9">
      <input name="name" type="text" class="form-control" id="staffname" placeholder="Staff Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_name']; ?>" required>
      </div>
      </div>
      <div class="form-group">
          <label for="staffpassword" class="col-sm-3 control-label">Password</label>
          <div class="col-sm-9">
          <input name="password" type="text" class="form-control" id="staffpassword" placeholder="Staff Password" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_password']; ?>" required>
        </div>
        </div>

        <div class="form-group">
          <label for="position" class="col-sm-3 control-label">Position</label>
          <div class="col-sm-9">
          <div class="radio">
            <label>
              <input name="pos" type="radio" id="position" value="Supervisor" <?php if(isset($_GET['edit'])) if($editrow['fld_position']=="Supervisor") echo "checked"; ?>> Supervisor
            </label>
          </div>
          <div class="radio">
            <label>
              <input name="pos" type="radio" id="position" value="Normal Staff" <?php if(isset($_GET['edit'])) if($editrow['fld_position']=="Normal Staff") echo "checked"; ?>required> Normal Staff
            </label>
            </div>

          <div class="radio">
            <label>
              <input name="pos" type="radio" id="position" value="Admin" <?php if(isset($_GET['edit'])) if($editrow['fld_position']=="Admin") echo "checked"; ?>required> Admin
            </label>
            </div>
          </div>
      </div>

      <div class = "form-group"> 
      <label for="staffphone" class="col-sm-3 control-label">Phone Number</label>
      <div class="col-sm-9">
      <input name="phone" type="text" class="form-control" id="staffphone" placeholder="Staff Phone Number" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_phone']; ?>" required>
      </div>
        </div>

      <div class="form-group">
          <label for="staffemail" class="col-sm-3 control-label">Email</label>
          <div class="col-sm-9">
          <input name="email" type="text" class="form-control" id="staffemail" placeholder="Staff Email" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_email']; ?>" required> 
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
      <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldsid" value="<?php echo $editrow['fld_staff_id']; ?>">
      <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Update</button>
      <?php } else { ?>
         <?php if($pos === "Admin") { ?>
      <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Create</button>
      <?php } ?>
      <?php } ?>
      <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span>Clear</button>
    </div>
  </div>
    </form>
  </div>
  </div>
  <?php 
  } 
  ?>

  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Staff List</h2>
      </div>
      <table class="table table-striped table-bordered">

      <tr>
        <th>Staff ID</th>
        <th>Staff Name</th>
        <th>Position</th>
          <th>Password</th>
          <?php  if($pos==="Admin" || $pos==="Supervisor"){?>
          <?php if($pos==="Admin") { ?>
          <th></th>
          <?php } ?> 
          <?php } ?>
        <th>Phone Number</th>
        <th>Email</th>
      </tr>
      <?php
      // Read
       $per_page = 5;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;

      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a167688_pt2 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>
      <tr>
        <td><?php echo $readrow['fld_staff_id']; ?></td>
        <td><?php echo $readrow['fld_staff_name']; ?></td>
        <td><?php echo $readrow['fld_position']; ?></td>
        <td><?php echo $readrow['fld_staff_password']; ?></td>
        <td><?php echo $readrow['fld_staff_phone']; ?></td>
        <td><?php echo $readrow['fld_staff_email']; ?></td>

         <?php if($pos==="Admin" ||$pos==="Supervisor" ){ ?>
        <td>
          <a href="staffs.php?edit=<?php echo $readrow['fld_staff_id']; ?>" class="btn btn-success btn-xs" role="button">Edit</a>
          <?php if($pos==="Admin"){ ?>
          <a href="staffs.php?delete=<?php echo $readrow['fld_staff_id']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
          <?php } ?>
        </td><?php } ?>
      </tr>
      <?php 
      } 
      ?>

      </table>
  </div>
    </div>
    <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <nav>
          <ul class="pagination">
          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a167688_pt2");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $total_records = count($result);
          }
          catch(PDOException $e){
                echo "Error: " . $e->getMessage();
          }
          $total_pages = ceil($total_records / $per_page);
          ?>
          <?php if ($page==1) { ?>
            <li class="disabled"><span aria-hidden="true">«</span></li>
          <?php } else { ?>
            <li><a href="staffs.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"staffs.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"staffs.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="staffs.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  </div>
 
</div>
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
 
</body>
</html>