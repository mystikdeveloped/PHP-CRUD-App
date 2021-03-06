<html>
    <head>
    <title>PHP CRUD App</title>
    <?php 
    require __DIR__ . '/vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    //db credentials from .env
    $servername = getenv('SERVER');
    $username = getenv('USERNAME');
    $password = getenv('PASSWORD');
    $dbname = getenv('DATABASE'); 

    //establish db connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_POST['fname'] != NULL){$fName = $_POST['fname'];}
    if ($_POST['lname'] != NULL){$lName = $_POST['lname'];}
    if ($_POST['age'] != NULL){$age = $_POST['age'];}
    if ($_POST['gender'] != NULL){$gender = $_POST['gender'];}

    //structure sql query
    $sql = "INSERT INTO project9
    VALUES ('', '$fName', '$lName', '$age', '$gender')";

    ?>
    <!-- render nav -->
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class='navbar'>
    <a href='search.php'>Search</a>
    <a href='add.php'>Add</a>
    <a href='delete.php'>Delete</a>
    </div>
     <div class="container">
        <div class="content">
            <?php 
            if ($conn->query($sql) === TRUE) {
        echo "Record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
            ?>
        </div>
     </div>
    </body>
    </html>