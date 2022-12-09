<?php
include "include/header.php";
include 'database.php';
$obj = new Database();
?>
<?php
if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin']) != true) {
    header("location: login.php");
    exit;
}
?>
<div class="dashboard producer">
    <div class="dash_title">
        <H3>PRODUCER'S DASHBOARD</H3>
        <H3>WELCOME <?php echo $_SESSION['fullname'] ?></H3>
    </div>
    <div class="dashboard_writer_bottom">
            <table style="width:100%">
                <tr>
                    <th>WRITER</th>
                    <th>TITLE</th>
                    <th>SUMMARY</th>
                    <th>LIKE/DISLIKE</th>
                </tr>
                <?php

                $table = "upload";
                $res = $obj->select($table,null,null,null);
                while ($row = mysqli_fetch_array($res)) {
                ?>
                    <tr>
                        <td><?php echo $row['fullname'] ?><br><?php echo $row['email'] ?></td>
                        <td><a href="payment.php?id=<?php echo $row['file'] ?>"><?php echo $row['title'] ?></a></td>
                        <td><?php echo $row['summary'] ?></td>
                        <td><i class="fas fa-sort-up"></i><br><?php echo $row['sno'] ?><br><i class="fas fa-sort-down"></i></td>
                    </tr>
                <?php
                }

                ?>
            </table>
        </div>
</div>
<?php
include "include/footer.php";
?>