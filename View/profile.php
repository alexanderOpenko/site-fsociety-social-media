<?php include 'View/header.php'; ?>
<link rel="stylesheet" href="./assets/profile.css">
</head>

<div class="profile">
    <div class="profile_userInfo">
        <div class="profile_image cursor-pointer">
            <?php
            if ($this->user_info['avatar']) {
                $avatar = $this->user_info['avatar'];
            } else {
                $avatar = "../assets/no_avatar.png";
            }
            ?>

            <img src="<?php echo $avatar; ?>" />

            <form class="user_avatar_form">
                <input type="file" name='avatar' class="hidden" />
            </form>
        </div>

        <div class="profile_info">
            <div class="userName">
                <span class="userName_first">
                    <?php echo $this->user_info['name']; ?>
                </span>

                <span class="userName_second">
                    <?php echo $this->user_info['surname']; ?>
                </span>
            </div>
        </div>
    </div>
</div>