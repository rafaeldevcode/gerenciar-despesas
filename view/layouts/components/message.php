<?php
    if(isset($_SESSION['message'])){ ?>
        <div class="message <?php echo $_SESSION['type_message'] ?>">
            <p><?php echo $_SESSION['message'] ?></p>
        </div>
    <?php }

    unset($_SESSION['message']);
    unset($_SESSION['type_message']);
?>