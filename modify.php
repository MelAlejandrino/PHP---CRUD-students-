<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE AND DELETE</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <section>
            <div class="container">
                <div class="container-form">
                    <h1>MODIFY</h1>
                    <form action="" method="post">
                        <?php 
                            $servername = "localhost";
                            $db = "mydb";
                            $password = "";
                            $username = "root";

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $db);

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT id FROM users";
                            $result = $conn->query($sql);

                            // Step 3: Generate the HTML markup for the dropdown list
                            echo '<label for="user">ID:</label>';
                            echo '<select name="user">';
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['id'] . '">' . $row['id'] . '</option>';
                            }
                            echo '</select>';

                            // Step 4: Close the database connection
                            $conn->close();
                        ?>

                            <label for="name">NAME:</label>
                            <input type="text" name="name">

                            <label for="email">EMAIL:</label>
                            <input type="email" name="email">

                            <label for="phone">PHONE:</label>
                            <input type="number" name="phone" class="no-arrows">

                            <input type="submit" value="UPDATE" name="update" class="Btn">
                            <input type="submit" value="DELETE" name="delete" class="Btn">
                    </form>
                    <a href="students.php"><button>VIEW STUDENTS</button></a>
                </div>
            </div>
        </section>
    </main>

    <?php 
   $servername = "localhost";
   $db = "mydb";
   $password = "";
   $username = "root";

   // Create connection
   $conn = new mysqli($servername, $username, $password, $db);

   // Check connection
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }

    if(isset($_POST['update'])){
        $id = $_POST['user'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $sql = "UPDATE users SET name = '$name', email = '$email', phone = '$phone' where id = $id";
        $result = $conn->query($sql);
    }

    if(isset($_POST['delete'])){
        $id = $_POST['user'];

        $sql = "DELETE FROM users where id = $id";
        $result = $conn->query($sql);
    }
    ?>
</body>
</html>