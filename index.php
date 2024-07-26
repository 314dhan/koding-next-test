<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Student Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container">
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <h3>Student Form</h3>
    <form action="index.php" method="post">
        Student Name: <input type="text" name="student_name" required><br>
        Student Age: <input type="number" name="student_age" required><br>
        Student Grade: <input type="text" name="student_grade" required><br>
        <input type="submit" name="submit_student" value="Submit">
    </form>

    <?php
    include 'config.php';

    if (isset($_POST['submit_student'])) {
        $student_name = $_POST['student_name'];
        $student_age = $_POST['student_age'];
        $student_grade = $_POST['student_grade'];

        $sql = "INSERT INTO students (name, age, grade) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sis", $student_name, $student_age, $student_grade);

        if ($stmt->execute()) {
            echo "Student data added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();
    }

    // Menampilkan data siswa
    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>Student List</h3>";
        echo "<table class='table table-dark table-striped'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Grade</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['age'] . "</td>
                    <td>" . $row['grade'] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No students found.";
    }

    $conn->close();
    ?>

    <p><a href="logout.php">Logout</a></p>
</body>

</html>