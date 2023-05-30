<!DOCTYPE html>
<html>

<head>
    <title>Course Registration</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="script.js"></script>
</head>

<body>
    <style>
        body {
            background: white !important;
            font-family: 'Helvetica', sans-serif;
        }


        h1,
        h2 {
            padding-top: 50px;
        }

        .student-info {
            text-align: center;
            margin: auto;
            margin-bottom: 50px;
        }

        .logo{
            padding-top: 50PX;
            text-align: center;
        }
        .course-selection {
            text-align: center;
        }

        .comments-section {
            text-align: center;
            padding-bottom: 50px;
        }

        select {
            background: rgb(216, 212, 212);
            margin: auto;
            width: 50%;
            text-align: center;
            border: none;
            border-radius: 5px;
            box-shadow:2px 2px 4px rgba(0, 0, 0, 0.2);
            padding: 10px;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        button {
            margin-top: 10px;
        }


        button {
            color: white;
            background: #007bff !important;
            border: none;
            border-radius: 5px;
            width: 70px;
            height: 30px;
        }

        button:hover {
            background: #013c7a !important;
        }

        textarea{
            background: rgb(216, 212, 212);
            width: 50%;
            border: none;
            border-radius: 5px;
            padding: 10px;
        }

        hr{
            border: 0.5px solid #007bff;
            width: 50%;
            margin: auto;
        }
    </style>
    <div class="logo">
        <img src="logo.jpeg" width="60px" height="60px" alt="logo"/>
    </div>

    <h1 class="student-info">Course Registration</h1>

    <div class="student-info">
        <img src="student_photo.jpg" alt="Student Photo">
        <p>Department: Computer Science</p>
        <p>Semester: 5th</p>
        <p>CGPA: 3.5</p>
    </div>
<hr>
    <div class="course-selection">
        <h2>Select Courses</h2>

        <form id="course-form" method="post" action="">
            <div class="container">
                <select id="course-list" name="courses[]" multiple>
                    <option value="course1">ENGINEERING MATHEMATICS</option>
                    <option value="course2">INTERNET PROGRAMMING</option>
                    <option value="course3">JAVA PROGRAMMING</option>
                    <option value="course4">ENGINEERING ETHICS</option>
                    <option value="course5">DIGITAL LOGIC</option>
                    <option value="course6">ANALYSIS OF ALGORITHMS</option>
                    <option value="course7">PHYSICS</option>
                    <option value="course8">DATABASE MANAGEMENT SYSTEMS</option>
                    <option value="course9">OBJECT ORIENTED PROGRAMMING</option>
                    <option value="course10">DATA STRUCTURES</option>
                </select>
                <button type="button" onclick="addCourses()">Add</button>
            </div>
        </form>

        <div id="selected-courses">

            <h2>Reserved Courses</h2>

            <?php
            // PHP code to retrieve and display selected courses
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["courses"])) {
                $selectedCourses = $_POST["courses"];

                foreach ($selectedCourses as $course) {
                    ?>
                    <p>
                        <?php echo $course; ?>
                        <?php if (!empty($selectedCourses)): ?>
                            <button onclick="removeCourse(this)">Delete</button>
                        <?php endif; ?>
                    </p>
                    <?php
                }
            }
            ?>


        </div>
    </div>
<HR>
    <div class="comments-section">

        <h2>Comments</h2>

        <form id="comment-form" method="post" action="send_comment.php">
            <textarea name="comment" placeholder="Enter your comment"></textarea>
            <br>
            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        // JavaScript code for adding selected courses and displaying them
        function addCourses() {
            var courseList = document.getElementById('course-list');
            var selectedCourses = document.getElementById('selected-courses');

            // Get the selected options
            var selectedOptions = Array.from(courseList.selectedOptions);

            // Move selected options to the selected courses section
            selectedOptions.forEach(function (option) {
                selectedCourses.innerHTML += '<p>' + option.text + '<button onclick="removeCourse(this)">Delete</button></p>';
            });

            // Clear the selected options
            selectedOptions.forEach(function (option) {
                option.selected = false;
            });
        }

        // JavaScript code for removing a course from the selected courses section
        function removeCourse(button) {
            button.parentNode.remove();
        }
    </script>
</body>

</html>