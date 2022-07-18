<nav class="navbar navbar-default" style="background-color: #810458" >
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">BABY CLOTHES</a>
    </div>
 

 
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
    </ul>
       <ul class="nav navbar-nav navbar-right">
         <li><a href="#" disabled="disabled"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  <?php echo $name; ?> (<?php echo $pos; ?>)</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
          <ul class="dropdown-menu">

            <li><a href="products.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> 
            Products</font></a></li>
            <li><a href="catalogue.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> 
            Catalogue</font></a></li>
            <li><a href="customers.php"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> Customers</font></a></li>
            <li><a href="staffs.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Staffs</a></font></li>
            <li><a href="orders.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Orders</a></font></li>
            <li><a href="change_password.php" ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>   Change Password </a></li>
            <li><a href="logout.php" ><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>   Logout </a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>