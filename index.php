<?php
    # message vars
    $msg = '';
    $msgClass = '';

    # check for submit
if(filter_has_var(INPUT_POST, 'submit')){
    # get the form data
    $email = htmlspecialchars($_POST['email']);
    $name = htmlspecialchars($_POST['name']);
    $message = htmlspecialchars($_POST['message']);

    # check required fields
    if(!empty($email) AND !empty($name) && !empty($message)){
        // check email
        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
            // failed
            $msg = 'Please use a valid email';
            $msgClass = 'alert-danger';
        } else {
            // passed
            $toEmail = 'lang40cal@hotmail.com';
            $subject = 'Contact Request From '.$name;
            $body = '<h2>Contact Request</h2
                    <h4>Name</h4><p>'.$name.'</p>
                    <h4>Email</h4><p>'.$email.'</p>
                    <h4>Message</h4><p>'.$message.'</p>
                    ';

            // email header
            $headers = "MIME-Version: 1.0" ."\r\n";
            $headers .= "Content-Type: test/html;charset=UTF-8" ."\r\n";

            // additional headers
        }
    } else {
        // failed
        $msg = 'Please fill in all fields';
        $msgClass = 'alert-danger';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://bootswatch.com/4/cyborg/bootstrap.min.css">
    <title>Contact Us</title>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">My Website</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php if ($msg != ''): ?>
            <div class="alert <?php echo $msgClass; ?>">
                <?php echo $msg; ?>
            </div>
        <?php endif; ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
            </div>
            <div class="form-group">
                <label>Message</label>
                <textarea name="message" class="form-control"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
            </div>
            <br />
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>