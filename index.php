<?php

$error = "";
if ($_POST) {
    if (!$_POST["email"]) {
        $error .= "Email is required.<br>";
    }
    if (!$_POST["subject"]) {
        $error .= "Subject is required.<br>";
    }
    if (!$_POST["content"]) {
        $error .= "Message is required.<br>";
    }

    if ($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL == false)) {
        $error .= "Email is invalid.<br>";
    }

    if ($error != "") {
        $error = '<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' . $error . '</div>';
    } else {
        $emailTo = "me@mydomin.com";
        $subject = $_POST["subject"];
        $content = $_POST["content"];
        $headers = "From: " . $_POST["email"];
        if (mail($emailTo, $subject, $content, $headers)) {
            $error = '<div class="alert alert-success" role="alert">Your message was sent successfully!</div>';
        } else {
            $error = '<div class="alert alert-danger" role="alert">Your message could not be sent. Please try again later.</div>';
        }
    }
};
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <h1>Get In Touch</h1>
        <div class="error">
            <? echo $error; ?>
        </div>
        <form method="post">
            <div class="mb-3">
                <label for="email1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email1" aria-describedby="emailHelp" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Type your message here</label>
                <textarea class="form-control" id="content" rows="3" name="content"></textarea>
            </div>
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $("form").submit(function(e) {
            
            var error = "";
            if ($("#email").val() == "") {
                error += "Email is required<br>";
            }
            if ($("#subject").val() == "") {
                error += "Subject is required<br>";
            }
            if ($("#content").val() == "") {
                error += "Message is required<br>";
            }
            if (error != "") {
                $(".error").html('<div class="alert alert-danger" role="alert"> <strong>There were error(s) in your form: </strong>' + error + '</div>');
                return false;
            } else {
                return true;
            }
        });
    </script>
</body>

</html>