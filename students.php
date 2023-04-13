<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENTS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <section>
            <div class="container">
                <h1>STUDENT LIST</h1>
                <div class="table">
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

                    $sql = "SELECT * FROM users";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<table>";
                        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th></tr>";
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["phone"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }

                    $conn->close();
                ?>

                
                </div>
<a href="index.php"><button>INSERT NEW STUDENTS</button></a>
<a href="modify.php"><button>UPDATE/DELETE</button></a>
<a href="students.php"><button>REFRESH</button></a>
            </div>
        </section>
    </main>

</body>
</html>


