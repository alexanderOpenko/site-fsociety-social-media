<?php include("header.php");
session_start(); ?>
<link rel="stylesheet" href="../assets/direct.css">
<script src='../assets/direct.js'></script>

<div class="direct content">
    <?php include 'View/sidebar.php'; ?>
    <div class="direct_body">
        <div class="message_list-wrapper">
            <div class="message_list">
                <?php foreach ($this->direct_messages as $message_array) : ?>
                    <?php if ($_SESSION['user_id'] != $message_array['user_id']) {
                        $companion = true;
                    } else {
                        $companion = false;
                    }
                    ?>

                    <div class="message_list-item<?php echo !$companion ? ' message_revert' : '' ?>">
                        <?php if ($companion) : ?>
                            <div class="message_avatar">
                                <a href="<?php echo 'profile?profile_id=' . $message_array['user_id']?>">
                                    <img src="<?php echo $message_array['avatar']?>" >
                                </a>
                            </div>
                        <?php endif ?>

                        <div class="message_list-item-body">
                            <?php if ($companion) : ?>
                                <div class="companion_name">
                                    <?php echo $message_array['name'] . ' ' . $message_array['surname'] ?>
                                </div>
                            <?php endif ?>

                            <div class="message_list-item-content">
                                <?php echo $message_array['message'] ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <form class="direct_form" method="POST">
            <textarea class="direct_textarea" name="message" placeholder="Message"></textarea>
        </form>
    </div>
</div>
<?php include("footer.php"); ?>