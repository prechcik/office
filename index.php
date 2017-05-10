<?php include('header.php');

function get_customer($id, $conn) {
    $sql = "SELECT name FROM customers WHERE id=".$id;
    $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      return $row['name'];
}
function get_status($id, $conn) {
    $sql = "SELECT name FROM status WHERE id=".$id;
    $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      return $row['name'];
}



?>

            <div id="tablecontainer">
                
                <div id="table_row">
                    <div id="table_col" class="table_col_header empty">ID</div>
                    <div id="table_col" class="table_col_header customer">Customer</div>
                    <div id="table_col" class="table_col_header description">Description</div>
                    <div id="table_col" class="table_col_header total">Total</div>
                    <div id="table_col" class="table_col_header status">Status</div>
                </div>
                <?php
                $orders_sql = "SELECT * FROM orders WHERE status>=1";
$result = mysqli_query($conn,$orders_sql);
      
      if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        ?>
            <div id="table_row">
                    <div id="table_col" class="table_col empty"><?php echo $row['id']; ?></div>
                    <div id="table_col" class="table_col customer"><?php echo get_customer($row['customerid'],$conn); ?></div>
                    <div id="table_col" class="table_col description"><?php echo $row['description']; ?></div>
                    <div id="table_col" class="table_col total"><?php echo money_format('%.2n', $row['total']);; ?></div>
                    <div id="table_col" class="table_col status"><?php echo get_status($row['status'],$conn); ?></div>
                </div>
<?php
    }
} else {
    echo "0 results";
}
                ?>
            </div>
<div id="righttoolbar">
                    <a href="#">Import</a>
                    <a href="#">Export</a>
                    <a href="#">Load custom view</a>
                    <a href="#">Delete</a>
                </div>
<?php include('footer.php'); ?>

