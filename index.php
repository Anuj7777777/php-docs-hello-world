<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background: #007BFF;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Student Portal</h2>

    <?php
        // Hardcoded student information
        $student_name = "John Doe";
        $student_id = "STU12345";
        $courses = ["Mathematics", "Physics", "Computer Science"];
        $attendance = ["Mathematics" => "90%", "Physics" => "85%", "Computer Science" => "95%"];
        $schedule = [
            "Monday" => "Mathematics - 10:00 AM",
            "Tuesday" => "Physics - 12:00 PM",
            "Wednesday" => "Computer Science - 2:00 PM"
        ];
    ?>

    <h3>📌 Student Info</h3>
    <p><strong>Name:</strong> <?php echo $student_name; ?></p>
    <p><strong>ID:</strong> <?php echo $student_id; ?></p>

    <h3>📚 Enrolled Courses</h3>
    <ul>
        <?php foreach ($courses as $course) {
            echo "<li>$course</li>";
        } ?>
    </ul>

    <h3>📊 Attendance</h3>
    <table>
        <tr>
            <th>Course</th>
            <th>Attendance</th>
        </tr>
        <?php foreach ($attendance as $course => $percent) {
            echo "<tr><td>$course</td><td>$percent</td></tr>";
        } ?>
    </table>

    <h3>📅 Weekly Schedule</h3>
    <table>
        <tr>
            <th>Day</th>
            <th>Class</th>
        </tr>
        <?php foreach ($schedule as $day => $class) {
            echo "<tr><td>$day</td><td>$class</td></tr>";
        } ?>
    </table>
</div>

</body>
</html>
