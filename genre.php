<?php
    include_once 'products_crud.php';
    include_once 'db.php';
    include_once 'session.php';
 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BABY CLOTHES : Catalogue</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/jquery.bxslider.css">
        <link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" /> 
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
        <link href="css/prettyPhoto.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />  
       <style type="text/css">

        .thumbnail {
            color : black;
        }

        .thumbnail img {
            height: 150px;
            width: 50%;
        }

        .warna {
          color: #795548;
        }

        .warna h2, p {
          font : 14px white bold;

        }

        .table-striped>tbody>tr:nth-of-type(odd) {
          background-color: #808080;
      }

      .searchSingle {
        margin : 2px 10px 10px 2px;

      }


      .list-group-item {
        position: relative;
        display: block;
        padding: 10px 15px;
        margin-bottom: -1px;
        color : white;
        background-color: #fff;
        border: 1px solid #ddd;
        }
    </style>
    </head>
    <body style="background-color:#DCDCDC;">

        <?php include_once 'nav_bar.php'; ?>
            <br>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
            
                    <!-- Advance search button -->
                    <div type="button" id="btnAdvanceSearch" class="btn btn-primary btn-lg btn-block" style="width: 95.5%; background-color: #000000;">
                            <font color="#ffffff"><span class="glyphicon glyphicon-search" aria-hidden="true"></span><font color="#ffffff"> Search</font>
                    </div>
                    <br>
                        <p class="lead"><font size="5" color="#000000">Material</font></p>
                        <div class="list-group">
                            <a href="catalogue.php" class="list-group-item">All Material</a>
                            <a href="genre.php?boot=Cotton Blend" class="list-group-item">Cotton Blend</a>
                            <a href="genre.php?boot=Cotton" class="list-group-item">Cotton</a>
                            <a href="genre.php?boot=Polyester" class="list-group-item">Polyester</a>
                        </div> 
                        <p class="lead"><font size="5" color="#000000">Gender</font></p>
                        <div class="list-group">
                            <a href="catalogue.php" class="list-group-item">All Gender</a>
                            <a href="genre.php?boot=Boy" class="list-group-item">Boy</a>
                            <a href="genre.php?boot=Girl" class="list-group-item">Girl</a>
                            <a href="genre.php?boot=Unisex" class="list-group-item">Unisex</a>
                        </div>  
                    </div>   
                    <br>
                    <br>
                        <div class="col-md-9">
                            <div class="row">
                                <?php
                                // Read
                                $per_page = 9;
                                if (isset($_GET["page"]))
                                { 
                                    $page = $_GET["page"] ;
                                }
                                    else
                                {
                                    $page = 1;
                                }
                                    $start_from = ($page-1) * $per_page;
                                try {
                                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $boot = $_GET['boot'];
                                    $stmt = $conn->prepare("SELECT * FROM tbl_products_a167688_pt2 WHERE fld_product_name = '$boot' OR fld_product_material = '$boot' OR fld_product_gender = '$boot' LIMIT $start_from, $per_page");
                                    $stmt->execute();
                                    $result = $stmt->fetchAll();
                                }
                                catch(PDOException $e){
                                    echo "Error: " . $e->getMessage();
                                }
                                foreach($result as $readrow) {
                                ?> 
                                <div class="col-sm-4 col-lg-4 col-md-4">
                                    <div class="thumbnail" style="height: 340px; position: relative;">
                                        <img src="products/<?php echo $readrow['fld_product_image'] ?>" class="img-responsive" width="10%" height="5%">
                                        <div class="caption">
                                            <h4 class="pull-right"><td>RM<?php echo $readrow['fld_product_price']; ?></h4>
                                            <h4><a href="products_details.php?pid=<?php echo $readrow['fld_product_name']; ?>"?> <?php echo $readrow['fld_product_name']; ?></a></h4>
                                            <p style="color:black"><?php echo $readrow['fld_product_gender']; ?></p>
                                        </div>
                                        <a href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>" role="button" class="btn btn-primary btn-lg btn-block" style="vertical-align: bottom;position: absolute; bottom: 10px; right: 7px; width: 95%; background-color: #000000">View Product</a>
                                    </div>
                                </div>
                                <?php
                                    }
                                    $conn = null;
                                    ?> 
                                <div class="row">
                                    <div class="col-xs-12 col-sm-10 col-sm-offset-4 col-md-8 col-md-offset-4">
                                        <nav>
                                            <ul class="pagination">
                                            <?php
                                            try {
                                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                $boot = $_GET['boot'];
                                                $stmt = $conn->prepare("SELECT * FROM tbl_products_a167688_pt2 WHERE fld_product_name = '$boot' OR fld_product_material = '$boot' OR fld_product_gender = '$boot'");
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
                                                <li><a href="catalogue.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                            <?php } ?>
                                            <?php
                                            for ($i=1; $i<=$total_pages; $i++)
                                                if ($i == $page)
                                                    echo "<li class=\"active\"><a href=\"catalogue.php?page=$i\">$i</a></li>";
                                                else
                                                    echo "<li><a href=\"catalogue.php?page=$i\">$i</a></li>";
                                            ?>
                                            <?php if ($page==$total_pages) { ?>
                                                <li class="disabled"><span aria-hidden="true">»</span></li>
                                            <?php } else { ?>
                                                <li><a href="catalogue.php?page=<?php echo $page+1 ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                            <?php } ?>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div> 
            </div>   
                <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script>
        function myFunction() {
          // Declare variables 
          var input, filter, table, tr, td, i;
          input = document.getElementById("search");
          filter = input.value.toUpperCase();
          table = document.getElementById("searchtable");
          tr = table.getElementsByTagName("tr");

          // Loop through all table rows, and hide those who don't match the search query
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            } 
          }
        }
        function getUsers(type,val){
            $.ajax({
                type: 'POST',
                url: 'get_user_data.php',
                data: 'type='+type+'&val='+val,
                beforeSend:function(html){
                    $('.loading-overlay').show();
                },
                success:function(html){
                    $('.loading-overlay').hide();
                    $('#userData').html(html);
                }
            });
        }
        </script>

        <script type="text/javascript">
            $(document).ready(function(){

                $("#advanceSearch").hide();

                $("#btnAdvanceSearch").click(function(){
                    $("#advanceSearch").slideDown(500);
                });
                $("#searchCancel").click(function(){
                    $("#advanceSearch").slideUp(500);
                });
            });
          </script>

    </body>
    </body>
</html>
