<!DOCTYPE html>

<?php
session_start();

if (file_exists('install.php')) {
    die ("Delete the 'install.php' file to be able to access this page");
}

if (isset($_POST['login'])) {
    $username = $_POST['username']; // Setting password variable
    $password = $_POST['password']; // Setting password variable
    $admin_file = '../MALL ADMIN/admin_data.csv';
    $open_file = fopen($admin_file, "r"); // Open the file and read it
    $head_row = fgetcsv($open_file); // Get header row
    $admin_data = []; //Create a blank array
    while ($row = fgetcsv($open_file)) { //Avoid get data from blank row
        $count = 0;
        $admin_row = [];
        foreach ($head_row as $data_column) { // Get the data in each column of a row
            $admin_row[$data_column] = $row[$count];
            $count++;
        }
    $admin_data[] = $admin_row; // Add sub array into the total array
    }
}

echo '<pre>';
print_r($admin_data);
print_r($admin_row['Username']);
echo '</pre>';

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="authors" content="Group 8">
    <meta name="description" content="admin login">
    <link rel="stylesheet" href="install.css">
    <script src="https://kit.fontawesome.com/5143a5dc4e.js" crossorigin="anonymous"></script>
    <title>Admin Login | Infinis Mall</title>
</head>

<body>
    <div id="container" class="site-container">
        <!--Making the container-->
        <header>
            <h1>The <span>Infinis</span> Mall | CONTENT MANAGEMENT SYSTEM</h1>
        </header>

        <div class="content">
            <div class="login-section">
                <div class="login-form">
                    <form method="POST" action="admin_login.php">
                        <h2>WELCOME</h2>

                        <div class="form-row">
                            <div class="form-label">
                                <label for="username">Admin Username</label>
                            </div>
                            <!--Form Label-->
                            <div class="form-field">
                                <input required id="username" type="text" name="username" placeholder="Username" maxlength="50">
                            </div>
                            <!--Form Field-->
                        </div>
                        <!--Form Row-->

                        <div class="form-row">
                            <div class="form-label">
                                <label for="password">Password</label>
                            </div>
                            <!--Form Label-->
                            <div class="form-field">
                                <input required id="password" type="password" name="password" placeholder="Password">
                            </div>
                            <!--Form Field-->
                        </div>
                        <!--Form Row-->

                        <button class="submit-button" type="submit" value="Login" name="login">Login</button>
                    </form>
                </div>
                <!--Login Form-->

                <div class="login-image">
                    <img src="images/workspace.jpg" alt="Workspace" title="Workspace">
                </div>
                <!--Login Image-->
            </div>
            <!--Login Section-->
        </div>
        <!--Content-->

        <footer>
            <p>Powered by KING POWER</p>
            <p>© 2021 The Infinis Mall</p>
        </footer>
    </div>
    <!--Container-->
</body>

</html>