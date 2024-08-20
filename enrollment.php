<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Enrollment</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <ul>
            <img style="float:left" src="images/logo.PNG" alt="logo">
            <li><a href="SIGN IN.html">Sign In</a></li>
            <li><a href="SIGN UP.html">Sign Up</a></li>
            <li><a href="HOME.html">Home</a></li>
        </ul>
    </header>

    <main>
        <div class="container">
            <h1>College Course Enrollment</h1>


            <div class="paragraph">Welcome! Enroll in exciting courses and expand your knowledge.</div><br>
            <form id="enrollment-form" action="indexPage1.php" method="post">
                <fieldset>
                    <legend>Student Information</legend>
                    <div class="form-group">
                        <label for="std_id">Student ID:
                            <input type="number" name="std_id" id="std_id" required >
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="std_name">Student Name:
                            <input type="text" name="std_name" id="std_name" required >
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:
                            <input type="password" name="password" id="password" required>
                        </label>
                    </div>
                </fieldset>
                <br><br>
                <fieldset>
                    <legend>Course Selection</legend>
                    <div class="form-group">
                        <label for="course-category">Course Category:
                            <select name="course-category" id="course-category" required>
                                <option value="">Select a Category</option>
                                <option value="arts">Arts & Humanities</option>
                                <option value="business">Business</option>
                                <option value="science">Science & Math</option>
                                <option value="BS IT">BS IT</option>
                                <option value="BS English">BS English</option>
                                <option value="BS Urdu">BS Urdu</option>
                                <option value="BS Zoology">BS Zoology</option>
                                <option value="BS Islamiyat">BS Islamiyat</option>
                                <option value="BS Chemistry">BS Chemistry</option>
                                <option value="BS Physics">BS Physics</option>
                                <option value="BS Math">BS Math</option>
                            </select>
                        </label>
                    </div>
                </fieldset>
                <br><br>
                <div class="form-actions">
                    <button type="submit">Enroll Now</button>
                    <button type="reset">Clear Form</button>
                </div>
            </form>
        </div>
    </main>
    <br>
    <hr>
    <br>
    <footer>
        <div class="paragraph"><strong>&copy; 2024 Government Graduate College, Civil Lines, Sheikhupura</strong>
            <h3>Contact Information:</h3>
            <b>Address:</b> Government Graduate College, Civil Lines, Sheikhupura 39350
            <br><br>
            <b>Phone:</b> (056)3783030
            <br><br>
            <b>Email:</b> info@gcbskp.edu.pk
        </div>
    </footer>
    <?php
            
            $host = 'localhost';
            $db_username = 'root'; 
            $db_password = '';
            $db_name = 'college';
            try {  
                $dsn = "mysql:host=$host;dbname=$db_name;charset=utf8mb4"; 
                $options = [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false ]; 
                $conn = new PDO($dsn, $db_username, $db_password, $options); 
            } catch (PDOException $e) 
            { 
                
                die("Connection failed: " . $e->getMessage());
            }
            
            // $conn = mysqli_connect($servername, $username, $password, $dbname);

		
            // if ($conn->connect_error) {
            //     die("Connection failed: " . $conn->connect_error);
            // }
    

            
            $std_id = $std_name = $father_name = $cnic_number = $gender = $d_o_f = $address = $email = $ph_no = $matric_from = $matric_year = $matric_number = $intermediate_from = $intermediate_year = $intermediate_number = '';

            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $std_id = $_POST['std_id'];
                $std_name = $_POST['std_name'];
                $father_name = $_POST['father_name'];
                $cnic_number = $_POST['cnic_number'];
                $gender = $_POST['gender'];
                $d_o_f = $_POST['d_o_f'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $ph_no = $_POST['ph_no'];
                $matric_from = $_POST['matric_from'];
                $matric_year = $_POST['matric_year'];
                $matric_number = $_POST['matric_number'];
                $intermediate_from = $_POST['intermediate_from'];
                $intermediate_year = $_POST['intermediate_year'];
                $intermediate_number = $_POST['intermediate_number'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

                
                
            } else {
                echo "<h2>Please go back and fill out the Sign Up form first.</h2>";
                exit;
            }
            ?>

</body>

</html>