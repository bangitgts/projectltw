<?php


if (isset($_POST['monphu'])) {
    require '../../connect/connectdb.php';
    require '../../auth/auth.php';

    $monphu = $_POST['monphu'];
    $monchinh = $_POST['monchinh'];
    $user = $_SESSION['username'];
  
    $sql = "SELECT *
    FROM anchinh
    WHERE username = '$user'
    ORDER BY RAND()
    LIMIT 7";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo $row["tenmonan"];
            echo "<br>";
        }
    } else {
        echo "0 results";
    }
    $con->close();
}



