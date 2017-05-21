<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .error {color: #FF0000;}
    </style>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
// define variables and set to empty values
$nameErr = $emailErr = $radioErr = $timeErr = "";
$name = $email = $radio = $comment = $time = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    }else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["time"])) {
        $timeErr = "Time is required";
    }else {
        $time = test_input($_POST["time"]);
        if (!preg_match("/(2[0-3]|[01][0-9]):([0-5][0-9])/", $time)) {
            $timeErr = "Wrong time format.";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    }else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["comment"])) {
        $comment = "";
    }else {
        $comment = test_input($_POST["comment"]);
    }

    if (empty($_POST["prio"])) {
        $radioErr = "Required";
    }else {
        $radio = test_input($_POST["prio"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>Add Booking</h2>

<p><span class = "error">* required field.</span></p>

<form method = "post" action = "<?php
         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table>
    <tr>
        <td>Name:</td>
        <td><input type = "text" name = "name">
            <span class = "error">* <?php echo $nameErr;?></span>
        </td>
    </tr>

    <tr>
        <td>E-mail:</td>
        <td><input type = "text" name = "email">
            <span class = "error">* <?php echo $emailErr;?></span>
        </td>
    </tr>

    <tr>
        <td>Time:</td>
        <td> <input type = "text" name = "time">
            <span class = "error">* <?php echo $timeErr;?></span>
        </td>
    </tr>

    <tr>
        <td>Comment:</td>
        <td> <textarea name = "comment" rows = "5" cols = "40"></textarea></td>
    </tr>

    <tr>
        <td>Priority print:</td>
        <td>
            <input type = "radio" name = "prio" value = "Yes">Yes
            <input type = "radio" name = "prio" value = "No">No
            <span class = "error">* <?php echo $radioErr;?></span>
        </td>
    </tr>

    <td>
        <input type = "submit" name = "submit" value = "Submit">
    </td>

</table>

</form>

<?php
echo "<h2>Your booking:</h2>";
echo $name;
echo "<br>";

echo $email;
echo "<br>";

echo $time;
echo "<br>";

echo $comment;
echo "<br>";

echo $radio;
?>
<form action="../index.html" method="get">
    <input type="submit" value="To startpage">
</form>
</body>
</html>