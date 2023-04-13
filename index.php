<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>INSERT STUDENT</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <main>
            <section>
                <div class="container">
                    <div class="container-form">
                        <h1>INSERT A STUDENT</h1>
                        <form action="" method="post">
                            <label for="id">ID:</label>
                            <input type="number" name="id" class="no-arrows">

                            <label for="name">NAME:</label>
                            <input type="text" name="name">

                            <label for="email">EMAIL:</label>
                            <input type="email" name="email">

                            <label for="phone">PHONE:</label>
                            <input type="number" name="phone" class="no-arrows">

                            <input type="submit" value="INSERT" name="submit" class="Btn">
                        </form>
                        <a href="students.php"><button>VIEW STUDENTS</button></a>
                    </div>
                </div>
            </section>
        </main>
        <?php 
$servername = "localhost";
$password = "";
$username = "root";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Create the database if it does not exist
$dbname = "mydb";
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(4) UNSIGNED PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(20)
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }


if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST["phone"];

    if(!($id == "" && $name == "" && $email == "" && $phone == "")){
        // Check if the ID already exists
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "ID already exists in the database";
        } else {
            // Insert the new record
            $sql = "INSERT INTO users (id, name, email, phone) VALUES ($id, '$name', '$email', $phone)";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
          
        $conn->close();
    }
    else {
        echo "All fields are required";
    }
}
?>
    </body>
</html>