<?php 
    //including file for the database function
    include '../dbController/dbController.php';
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 80%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            margin: 10px 10%;
        }
        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }
        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }
        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }
        .attendance{
            width: 15px;
            height: 20px;
            padding: 5px 15px;
            border-radius: 25%;
            color: white;
        }
        /* Button Styles */
        .button {
            display: inline-block;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #45a049;
        }
        /* Form Styles */
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form {
            width: 400px;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form label {
            font-weight: bold;
            margin-bottom: 8px;
        }

        .form input[type="date"],
        .form input[type="submit"] {
            width: 40%;
            padding: 12px;
            margin-bottom: 16px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form input[type="submit"]:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>
    <div class="form-container">
        <form class="form" action="showAttendance.php" method="post">
            <label for="date">Date</label>
            <input type="date" name="date" id="date">
            <input type="submit" name="show" value="Show">
        </form>
    </div>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Student Id</th>
                <th>Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Attendance</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if(isset($_POST['show'])){
                    $date = $_POST['date'] ? $_POST['date'] : '0000-00-00';
                    $studentsPresent = getAllStudents($date);

                    while($student = $studentsPresent -> fetch()){
            ?>
                <tr>
                    <td><?php echo $student['id']; ?></td>
                    <td><?php echo $student['name']; ?></td>
                    <td><?php echo $student['date']; ?></td>
                    <td><?php echo $student['time']; ?></td>
                    <td><span class="attendance" style="background-color: <?php echo $student['attendance'] ? 'lawngreen' : 'red' ?>"><?php echo $student['attendance'] ? $student['attendance'] : 'N' ?></span></td>
                </tr>
            <?php      
                    }
                }
            ?>
        </tbody>
    </table>
</body>
</html>

