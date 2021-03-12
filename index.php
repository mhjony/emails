<?php
require_once 'collection.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Web Form</title>
        <link rel="stylesheet" href="./css/style.css">
	</head>
	<body>
        <div class="contact-box">
            <form id="login-form" class="form" action="" method="POST">
                <input type="text" name="fullname" class="input-field" placeholder="Your name">
                <input type="text" name="email" class="input-field" placeholder="Your email">
                <input type="submit" name="subscribe" class="btn" value="Subscribe">
                <?php if (count($errors) > 0)
                    {
                        ?>
                            <div class="form-group" style="color: red">
                                <?php foreach($errors as $error)
                                { ?>
                                    <ul style="list-style-type:none;">
                                        <li><?php echo $error; ?></li>
                                    </ul>
                                    <?php 
                                } ?>
                            </div>
                        <?php
                    }
                    if ($success)
                    {
                        ?>
                            <div class="form-group" style="color: green">
                                <ul style="list-style-type:none;">
                                    <li><?php echo "You have subscribed in our website" ?></li>
                                </ul>
                            </div>
                        <?php
                    }
                ?>
            </form>
        </div>
	</body>
</html>