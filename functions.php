<?php
defined("code") or die("No access!");

function check_user_exist($name, $conn) {
    $check_username = mysqli_query($conn, "SELECT * FROM users WHERE username='".$name."'");
    if(mysqli_num_rows($check_username) > 0){
        return 1;
    } else {
        return 0;
    }
}

function fetchusers($conn) {
      $sql = "SELECT * FROM users";
      $result = mysqli_query($conn,$sql);
      if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) { ?>
            <div id="users_table_column"><p><?php echo $row['username']; ?></p></div>
            <div id="users_table_column"><p><?php echo get_usergroup($row['groupid'], $conn); ?></p></div>
            <div id="users_table_column">
                <form id="usermanagement" action="settings.php" method="POST">
                    <input type="hidden" name="changetype" value="deleteuser" />
                    <input type="hidden" name="username" value="<?php echo $row['username']; ?>" />
                    <input type="submit" value="Delete" name="DeleteBtn" />
                </form>
            </div>
<?php
    }
} else {
    echo "0 results";
}
}

function get_usergroup($id, $conn) {
            $sql = "SELECT groupname FROM usergroups WHERE id=".$id;
            $result = mysqli_query($conn,$sql);
      
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                return $row['groupname'];
            }
      }
      
      


