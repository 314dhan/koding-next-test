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
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <div class="text-center mt-4">
            <a href="controller/LogoutController.php" class="btn btn-danger">Logout</a>
        </div>
    </div>


</body>

</html>

<?php
// include 'config.php';

// if (isset($_POST['submit_student'])) {
//     $student_name = $_POST['student_name'];
//     $student_age = $_POST['student_age'];
//     $student_grade = $_POST['student_grade'];

//     $sql = "INSERT INTO students (name, age, grade) VALUES (?, ?, ?)";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("sis", $student_name, $student_age, $student_grade);

//     if ($stmt->execute()) {
//         echo "<div class='container mt-3'><div class='alert alert-success'>Student data added successfully!</div></div>";
//     } else {
//         echo "<div class='container mt-3'><div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div></div>";
//     }

//     $stmt->close();
// }

// // Menampilkan data siswa
// $sql = "SELECT * FROM students";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     echo "<div class='card mt-4'>";
//     echo "<div class='card-header text-center'><h3>Student List</h3></div>";
//     echo "<div class='card-body'>";
//     echo "<table class='table table-bordered'>
//                     <thead>
//                         <tr>
//                             <th>ID</th>
//                             <th>Name</th>
//                             <th>Age</th>
//                             <th>Grade</th>
//                         </tr>
//                     </thead>
//                     <tbody>";
//     while ($row = $result->fetch_assoc()) {
//         echo "<tr>
//                         <td>" . $row['id'] . "</td>
//                         <td>" . $row['name'] . "</td>
//                         <td>" . $row['age'] . "</td>
//                         <td>" . $row['grade'] . "</td>
//                     </tr>";
//     }
//     echo "</tbody></table>";
//     echo "</div></div>";
// } else {
//     echo "<div class='container mt-3'><div class='alert alert-info'>No students found.</div></div>";
// }

// $conn->close();
?> 