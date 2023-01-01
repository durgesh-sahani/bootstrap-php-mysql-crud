<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users list</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <?php
        include('db/connection.php');
        $stmt = $conn->prepare("SELECT id, name, email FROM users");
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //echo '<pre>';
        //print_r($users);

        echo '<div class="row">
                <div class="col-md-10">
                    <h2>Users list</h2>
                </div>
                <div class="col-md-2 text-end">
                    <a href="create.php" class="text-decoration-none btn btn-primary">Create</a>
                </div>
            </div>
        ';
        echo "<table class='table table-striped table-light table-hover'>
            <tr>
                <th> ID </th>
                <th> Name </th>
                <th> EMail </th>
                <th class='text-end'> Actions </th>
            </tr>";

        foreach($users as $user) {
            echo "<tr>
                <th>" . $user['id'] . "</th>
                <th> " . $user['name'] . " </th>
                <th> " . $user['email'] . " </th>
                <th class='text-end'> 
                    <a href='update.php?id=" . $user['id'] . "' class='text-decoration-none btn btn-success'>Update</a> 
                    <form action='db/action.php' method='post' class='d-inline'>
                        <input type='hidden' name='id' value='".$user['id']."'>
                        <button class='btn btn-danger' type='submit' name='delete'>Delete</button>
                    </form>
                </th>
            </tr>";
        }
        echo "</table>";

    ?>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

