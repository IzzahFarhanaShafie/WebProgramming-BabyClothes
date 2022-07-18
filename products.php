<?php
  include_once 'products_crud.php';
  include_once 'session.php';
?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>BABY CLOTHES : Products</title>
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

<?php if($pos==="Admin" || $pos==="Supervisor" ){ ?> 
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Create New Product</h2>
      </div>
    <form action="products.php" method="post" class="form-horizontal">
      <div class="form-group">
          <label for="productid" class="col-sm-3 control-label">ID</label>
          <div class="col-sm-9">
          <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_id']; ?>" required> 
      </div>
        </div>
      <div class="form-group">
          <label for="productname" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
          <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>" required>
      </div>
        </div>
        <div class="form-group">
          <label for="productprice" class="col-sm-3 control-label">Price</label>
          <div class="col-sm-9">
      <input name="price" type="text" class="form-control" id="productprice" placeholder="Product Price" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>" required> 
      </div>
        </div>
      <div class="form-group">
          <label for="productbrand" class="col-sm-3 control-label">Brand</label>
          <div class="col-sm-9">
      <select name="brand" class="form-control" id="productbrand" required>
        <option value="">Please select</option>
        <option value="Yangkiddo" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Yangkiddo") echo "selected"; ?>>Yangkiddo</option>
        <option value="Babykiva" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Babykiva") echo "selected"; ?>>Babykiva</option>
        <option value="Babybol" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Babybol") echo "selected"; ?>>Babybol</option>
        <option value="Nature Colored" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Nature Colored") echo "selected"; ?>>Nature Colored</option>
        <option value="MANGO BABY" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="MANGO BABY") echo "selected"; ?>>MANGO BABY</option>
        <option value="OVS" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="OVS") echo "selected"; ?>>OVS</option>
        <option value="Gap" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Gap") echo "selected"; ?>>Gap</option>
        <option value="Toy Story" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Toy Story") echo "selected"; ?>>Toy Story</option>
        <option value="PONEY" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="PONEY") echo "selected"; ?>>PONEY</option>
        <option value="Top" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Top") echo "selected"; ?>>Top</option>
      </select> 
      </div>
        </div>
      <div class="form-group">
          <label for="producttype" class="col-sm-3 control-label">Type</label>
          <div class="col-sm-9">
        <select name="type" class="form-control" id="producttype" required><option value="Select" selected>Select</option>
            <option value="Bodysuit" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Bodysuit") echo "selected"; ?>>Bodysuit</option>
            <option value="Jogger" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Jogger") echo "selected"; ?>>Jogger</option>
            <option value="Pants" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Pants") echo "selected"; ?>>Pants</option>
            <option value="Shirt" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Shirt") echo "selected"; ?>>Shirt</option>
            <option value="Shorts"<?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Shorts") echo "selected"; ?>>Shorts</option>
            <option value="Leggings" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Leggings") echo "selected"; ?>>Leggings</option>
            <option value="Top" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Top") echo "selected"; ?>>Top</option>
            <option value="Jacket" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Jacket") echo "selected"; ?>>Jacket</option>
            <option value="Coat" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Coat") echo "selected"; ?>>Coat</option>
            <option value="Blouse" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Blouse") echo "selected"; ?>>Blouse</option>
            <option value="Sweatshirt" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Sweatshirt") echo "selected"; ?>>Sweatshirt</option>
            <option value="Romper" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Romper") echo "selected"; ?>>Romper</option>
            <option value="Jumper" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Jumper") echo "selected"; ?>>Jumper</option>
            <option value="Jumpsuit" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Jumpsuit") echo "selected"; ?>>Jumpsuit</option>
            <option value="Dress" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Dress") echo "selected"; ?>>Dress</option>
            <option value="Sweater" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Sweater") echo "selected"; ?>>Sweater</option>
            <option value="Cardigan" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Cardigan") echo "selected"; ?>>Cardigan</option>
            <option value="Top & Bottom" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Top & Bottom") echo "selected"; ?>>Top & Bottom</option>
            <option value="Pajamas" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Pajamas") echo "selected"; ?>>Pajamas</option>
        </select> 
      </div>
        </div>    
        <div class="form-group">
          <label for="productgender" class="col-sm-3 control-label">Gender</label>
          <div class="col-sm-9">
          <div class="radio">
            <label>
      <input name="gender" type="radio" id="productgender" value="Boy" <?php if(isset($_GET['edit'])) if($editrow['fld_product_gender']=="Boy") echo "checked"; ?> required > Boy
       </label>
          </div>
          <div class="radio">
            <label>
      <input name="gender" type="radio" id="productgender" value="Girl" <?php if(isset($_GET['edit'])) if($editrow['fld_product_gender']=="Girl") echo "checked"; ?>> Girl
      </label>
          </div>
          <div class="radio">
            <label>
      <input name="gender" type="radio" id="productgender" value="Unisex" <?php if(isset($_GET['edit'])) if($editrow['fld_product_gender']=="Unisex") echo "checked"; ?>> Unisex 
      </label>
            </div>
          </div>
      </div>
      <div class="form-group">
          <label for="productmaterial" class="col-sm-3 control-label">Material</label>
          <div class="col-sm-9">
      <input name="material" type="text" class="form-control" id="productmaterial" placeholder="Product Material" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_material']; ?>" required> 
      </div>
        </div>

      <div class="form-group">
          <label for="productimage" class="col-sm-3 control-label">Image</label>
          <div class="col-sm-9">
          <input name="image" type="text" class="form-control" id="productimage" placeholder="Product Image" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_image']; ?>"  min="0" required>
        </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
      <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_id']; ?>">
      <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
      <?php } else { ?>
      <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
      <?php } ?>
      <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
    </div>
  </div>
    </form>
  </div>
  </div>
  <?php } ?>

  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Products List</h2>
      </div>
      <table class="table table-striped table-bordered">
      <tr>
        <th>Product ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Brand</th>
        <th>Type</th>
        <th>Gender</th>
        <th>Material</th>
        <th></th>
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
          $stmt = $conn->prepare("SELECT * FROM tbl_products_a167688_pt2 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>   
      <tr>
        <td><?php echo $readrow['fld_product_id']; ?></td>
        <td><?php echo $readrow['fld_product_name']; ?></td>
        <td><?php echo $readrow['fld_product_price']; ?></td>
        <td><?php echo $readrow['fld_product_brand']; ?></td>
        <td><?php echo $readrow['fld_product_type']; ?></td>
        <td><?php echo $readrow['fld_product_gender']; ?></td>
        <td><?php echo $readrow['fld_product_material']; ?></td>
        <td>
          <button data-href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-warning btn-xs" role="button">Details</button>

          <?php if($pos==="Admin" || $pos==="Supervisor" ){ ?>
          <a href="products.php?edit=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-success btn-xs" role="button">Edit</a>
          <a href="products.php?delete=<?php echo $readrow['fld_product_id']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
        </td>
        <?php } ?>
      </tr>
      <?php } ?>
 
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
            $stmt = $conn->prepare("SELECT * FROM tbl_products_a167688_pt2");
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
            <li><a href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"products.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>

     </div>
  <div class="bs-example">
    <!-- Button HTML (to Trigger Modal) -->
   
    <!-- Modal HTML -->
    <div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Product Details</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>
</div>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
   <!--  for modal popup -->
   <script>
    $(document).ready(function(){
        $(".btn").click(function(){
           var dataURL = $(this).attr( "data-href" )
            $('.modal-body').load(dataURL,function(){
        $('#myModal').modal({show:true});
    });
        });
    });
</script>
 <style>
    .bs-example{
      margin: 20px;
    }
</style>
</head>
</html>