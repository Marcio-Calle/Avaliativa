
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <select name="categoria_produto" id="">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ny_coffe";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM categorias";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
        // output data of each row
     
        } else {
        echo "0 results";
        }

        mysqli_close($conn);
        ?>

    </select>
</body>
</html>

