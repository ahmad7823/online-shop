<?php
$conn = mysqli_connect('localhost', 'root', '', 'shopping');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

<form method="post" action="process_form.php" onsubmit="return validateForm()">
<script>
function validateForm() {
    // Add your validation logic here
    
    var fname = document.getElementById('fname').value;
    var lname = document.getElementById('lname').value;
    var email = document.getElementById('email').value;
    var genderMale = document.getElementById('male').checked;
    var genderFemale = document.getElementById('female').checked;
    var city = document.getElementById('city').value;
    var contact = document.getElementById('contact').value;
    var age = document.getElementById('age').value;
    var langEnglish = document.getElementById('English').checked;
    var langUrdu = document.getElementById('Urdu').checked;
    var password = document.getElementById('password').value;

    // Example: Check if the first name is empty
    if (fname.trim() == "") {
        alert("Please enter your first name");
        return false;
    }

    // Add more validation checks as needed
    
    return true; // If all validation checks pass
}
</script>
// Server Side Validation
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate form data
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $email = htmlspecialchars($_POST['Email']);
    $gender = isset($_POST['Gender']) ? htmlspecialchars($_POST['Gender']) : "";
    $city = htmlspecialchars($_POST['City']);
    $contact = htmlspecialchars($_POST['contact']);
    $age = htmlspecialchars($_POST['Age']);
    $languages = isset($_POST['lang']) ? $_POST['lang'] : [];
    $password = htmlspecialchars($_POST['Password']);

    // Add server-side validation checks here
    // Example: Check if the first name is not empty
    if (empty($fname)) {
        echo "First name is required";
        exit;
    }

    // Add more validation checks as needed

    // If all validation checks pass, you can proceed with further processing
    // For example, you can insert data into a database, send emails, etc.

    echo "Form submitted successfully!";
} else {
    echo "Invalid request";
}
?>
