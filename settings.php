<?php include('header.php'); ?>

<?php
$notification = "";
        
      
      if (count($_POST)>0) {
          if($_POST['changetype']=="adduser") {
              
            if (check_user_exist($_POST['username'], $conn)==1) {
    $notification = "<span style='color: red;'>Username already exists!</span>";
            } else {
            $sql = "INSERT INTO users (username, password, groupid)
                VALUES ('".$_POST['username']."', '".md5($_POST['password'])."', 2)";
            if (mysqli_query($conn, $sql)) {
                $notification = "User added successfuly!";
            } else {
                $notification = "Error: " . $sql . "<br>" . mysqli_error($conn);
                echo $sql;
            }
            }
          }
      if ($_POST['changetype']=="deleteuser") {
          $sql = "DELETE FROM users WHERE username='".$_POST['username']."'";

        if (mysqli_query($conn, $sql)) {
            $notification = "User deleted!";
        } else {
            $notification = "Error: " . $sql . "<br>" . mysqli_error($conn);
            echo $sql;
        }
      }
      }
      
      
      
      
      
if ($notification!="") {
?>
<div id="notification">
    <?php echo $notification; ?>
</div>
<?php 
}
?>
<div id="settings_container">
    <div id="tabcontainer">
        <div id="tab_general">
            <h2>General</h2>
            <form action="settings.php" method="POST" id="general_form">
            <label for="companyname">Company Name</label>
            <input name="companyname" placeholder="<?php echo $companyname; ?>" />
            <label for="companyname">Logo URL</label>
            <input name="logourl" placeholder="<?php echo $logourl; ?>" />
            <label for="companyname">Units</label>
            <input name="units" placeholder="<?php echo $units; ?>" />
            <input type="hidden" name="changetype" value="sql" />
            <input type="submit" value="Submit" class="general_form_submit"/>
            </form>
        </div>
        <div id="tab_database">
            <h2>Database</h2>
        </div>
        <div id="tab_users">
            <h2>User Management</h2>
            <div id="tab_users_add">
                <h3>Add user</h3>
                <form action="settings.php" method="POST">
                  <label>Username</label><input type="text" name="username" class="box"/>
                  <div id="clr"></div>
                  <label>Password</label><input type="password" name="password" class="box" />
                  <div id="clr"></div>
                  <input type="hidden" name="changetype" value="adduser" />
                  <input type="submit" value="Submit"/>
               </form>
                
            </div>
            <div id="tab_users_manage">
                <h3>Existing Users</h3>
                <div id="users_table">
                    <div id="users_table_row" class="users_table_row_header">
                        <div id="users_table_column">
                            <p>Username</p>
                        </div>
                        <div id="users_table_column">
                            <p>Usergroup</p>
                        </div>
                        <div id="users_table_column">
                            <p>Operations</p>
                        </div>
                    </div>
                    <div id="users_rows">
                        <div id="clr"></div>
                        <?php fetchusers($conn); ?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include('footer.php'); ?>