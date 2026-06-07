<?php include 'header.php'; ?>

<div id="main-content">
    <h2>Edit Record</h2>

    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>

<?php
if (isset($_POST['showbtn'])) {

    $conn = mysqli_connect("localhost", "root", "", "crud") or die("failed");
    $stu_id = $_POST['sid'];

    $sql = "SELECT * FROM student WHERE sid={$stu_id}";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        while ($student = mysqli_fetch_assoc($result)) {
?>

    <form class="post-form" action="updatedata.php" method="post">

        <div class="form-group">
            <label>Name</label>
            <input type="hidden" name="sid" value="<?php echo $student['sid']; ?>" />
            <input type="text" name="sname" value="<?php echo $student['sname']; ?>" />
        </div>

        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" value="<?php echo $student['saddress']; ?>" />
        </div>

        <div class="form-group">
            <label>Class</label>
            <select name="sclass">

                <?php
                $conn2 = mysqli_connect("localhost", "root", "", "crud") or die("failed");
                $sql2 = "SELECT * FROM studentclass";
                $result2 = mysqli_query($conn2, $sql2);

                while ($class = mysqli_fetch_assoc($result2)) {
                ?>
                    <option value="<?php echo $class['cid']; ?>">
                        <?php echo $class['cname']; ?>
                    </option>
                <?php } ?>

            </select>
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" value="<?php echo $student['sphone']; ?>" />
        </div>

        <input class="submit" type="submit" value="Update" />

    </form>

<?php
        } // end while student
    } // end if rows
} // end showbtn
?>

</div>

</body>
</html>