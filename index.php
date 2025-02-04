<?php
// index.php
session_start();

// Database connection (replace with your credentials)
$host = 'localhost';
$db = 'student_portal';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        header {
            background: #0078d4;
            color: white;
            padding: 1rem;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 1rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 0.5rem;
            text-align: left;
        }
        table th {
            background: #0078d4;
            color: white;
        }
        button {
            background: #0078d4;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            cursor: pointer;
            border-radius: 4px;
        }
        button:hover {
            background: #005a9e;
        }
    </style>
</head>
<body>
    <header>
        <h1>Student Portal</h1>
    </header>
    <div class="container">
        <h2>Manage Courses</h2>
        <form method="POST" action="">
            <input type="text" name="course_name" placeholder="Course Name" required>
            <button type="submit" name="add_course">Add Course</button>
        </form>

        <h3>Enrolled Courses</h3>
        <table>
            <tr>
                <th>Course Name</th>
                <th>Actions</th>
            </tr>
            <?php
            if (isset($_POST['add_course'])) {
                $course_name = $conn->real_escape_string($_POST['course_name']);
                $conn->query("INSERT INTO courses (name) VALUES ('$course_name')");
            }

            $result = $conn->query("SELECT * FROM courses");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>
                            <form method='POST' style='display:inline;'>
                                <input type='hidden' name='course_id' value='{$row['id']}'>
                                <button type='submit' name='delete_course'>Delete</button>
                            </form>
                        </td>
                      </tr>";
            }

            if (isset($_POST['delete_course'])) {
                $course_id = $_POST['course_id'];
                $conn->query("DELETE FROM courses WHERE id=$course_id");
                header("Location: index.php");
            }
            ?>
        </table>

        <h2>Attendance</h2>
        <form method="POST">
            <input type="text" name="student_name" placeholder="Student Name" required>
            <button type="submit" name="mark_attendance">Mark Attendance</button>
        </form>

        <h3>Attendance Records</h3>
        <table>
            <tr>
                <th>Student Name</th>
                <th>Date</th>
            </tr>
            <?php
            if (isset($_POST['mark_attendance'])) {
                $student_name = $conn->real_escape_string($_POST['student_name']);
                $date = date('Y-m-d');
                $conn->query("INSERT INTO attendance (student_name, date) VALUES ('$student_name', '$date')");
            }

            $result = $conn->query("SELECT * FROM attendance");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['student_name']}</td>
                        <td>{$row['date']}</td>
                      </tr>";
            }
            ?>
        </table>

        <h2>Schedules</h2>
        <p>Feature under development...</p>
    </div>
</body>
</html>
