<?php session_start() ?>
<?php include("header.php") ?>
<link rel="stylesheet" href="./assets/sign_in_sign_up.css">
</head>

<body>
    <div class='signin_signup_card form'>
        <div class='signin'>
            <h1 class="formTitle">
                Sign in
            </h1>

            <form action='./login.php' method="post">
                <div class="inputField flex-column">
                    <span class="inputField_title">
                        Email
                    </span>
                    <input class="inputField_input" type="email" name='user_email' />
                </div>

                <div class="inputField flex-column">
                    <span class="inputField_title">
                        Password
                    </span>
                    <input class="inputField_input" name='user_password' />
                </div>
                <button class="primaryBtn" type='submit'>
                    submit
                </button>
            </form>

            <?php
            if ($_SESSION['message']) {
                echo '<div>' . $_SESSION['message'] . '</div>';
                unset($_SESSION['message']);
            }
            ?>
        </div>

        <div class="switchForm flex-column">
            <span class="ref_title">Don't have an account?</span>
            <a href="registration.php">
                Sign up
            </a>
        </div>
    </div>