<?php include("header.php") ?>
<link rel="stylesheet" href="./assets/sign_in_sign_up.css">
</head>

<body>
<div class="createUser_form form">
    <h1 class="formTitle">
        Create an account
    </h1>

    <form action="./create_user.php" method="post">
        <div class="inputField flex-column">
            <span class="inputField_title">
                Name
            </span>
            <input class="inputField_input" name='user_name' />
        </div>

        <div class="inputField flex-column">
            <span class="inputField_title">
                Surname
            </span>
            <input class="inputField_input" name='user_surname' />
        </div>

        <div class="inputField flex-column">
            <span class="inputField_title">
                Email
            </span>
            <input class="inputField_input" name='user_email' />
        </div>

        <div class="inputField flex-column">
            <span class="inputField_title">
                Password
            </span>
            <input class="inputField_input" name='user_password' />
        </div>

        <div class="inputField flex-column">
            <span class="inputField_title">
                Confirm password
            </span>
            <input class="inputField_input" name='confirm_password'/>
        </div>

        <button  class="primaryBtn createUser_form-submit" type='submit'>
            submit
        </button>
    </form>

    <div class="switchForm flex-column">
       <span class="ref_title">Already have an account?</span>
       <a href="login.php">
            Log in
       </a>
    </div>

    <?php
        session_start();

        if ($_SESSION['message']) {
            echo "<div>" . $_SESSION['message'] . "</div>";
            unset($_SESSION['message']);
        } 
    ?>
</div>
</body>