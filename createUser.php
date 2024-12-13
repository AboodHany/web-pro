<?php include '1startingcode.php';?>

    <!-- Create user Content -->
    <h1>Create user, <?= $username ?>!</h1>

    <form action="createUser.php" method="post">
        <label>Fullname:</label>
        <input type="text" id="Fullname" name="Fullname"><br><br>

        <label>Username:</label>
        <input type="text" id="Username" name="Username"><br><br>

        <label>Password:</label>
        <input type="password" id="password" name="password"><br><br>

        <label>Role:</label>
        <input type="radio" id="admin" name="role" value="admin" required> Admin
        <input type="radio" id="employee" name="role" value="employee" required> Employee<br><br>

        <label>Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label>Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number"><br><br>

        <label>Profile Picture:</label>
        <input type="file" id="profile_picture" name="profile_picture"><br><br>

        <label>Address:</label>
        <input type="text" id="address" name="address"><br><br>

        <label>Hire Date:</label>
        <input type="date" id="hire_date" name="hire_date" value="<?php echo date('Y-m-d'); ?>">
        <br><br>

        <input type="submit" name="sub" value="Submit!">

    </form>

    <?php
    if (isset($_POST['sub'])) {
        $full_name = $_POST['Fullname'];
        $username = $_POST['Username'];
        $password =$_POST['password'];
        $role = $_POST['role'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];
        $hire_date = $_POST['hire_date'];
        $profile_picture = null;
        // if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        //     $upload_dir = 'uploads/';
        //     if (!file_exists($upload_dir)) {
        //         mkdir($upload_dir, 0777, true);
        //     }
        //     $profile_picture = $upload_dir . basename($_FILES['profile_picture']['name']);
        //     move_uploaded_file($_FILES['profile_picture']['tmp_name'], $profile_picture);
        // }
        $query = "INSERT INTO users (full_name, username, password, role, email, phone_number, address, hire_date) 
        VALUES ('$full_name', '$username', '$password', '$role', '$email', '$phone_number', '$address', '$hire_date')";

if (mysqli_query($conn, $query)) {
  $message = "User registered successfully!";
} else {
  $message = "Error: " . mysqli_error($conn);
}

        // Query to get the username for the selected user ID
// $user_query = "SELECT username FROM users WHERE id = '$assigned_to_id'";
// $user_result = mysqli_query($conn, $user_query);

// if ($user_result && mysqli_num_rows($user_result) > 0) {
//     $user_row = mysqli_fetch_assoc($user_result);
//     $assigned_to = $user_row['username']; // Get the username
// } else {
//     echo "Error: User not found!";
//     exit; // Stop the process if the user is not found
// }

    //     $status = $_POST['status'];
    //     $due_date = $_POST['due_date'];

    //     $query = "INSERT INTO tasks (title, description, assigned_to, status, due_date) 
    //           VALUES ('$title', '$description', '$assigned_to', '$status', '$due_date')";
    
    // if (mysqli_query($conn, $query)) {
    //     echo "Task created successfully!";
    // } else {
    //     echo "Error: " . mysqli_error($conn);
    // }
        // Insert your logic here to handle the task creation.
        // Example: Saving the task into the database.
     }else {
        echo "Error: Form not submitted properly.";
    }

    // Close the connection
    mysqli_close($conn);
    ?>
</body>
</html>
