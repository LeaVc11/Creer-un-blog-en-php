<?php

namespace App\models\Manager;

class FlashManager
{
//    public static function displayFlash():void
//    {
//        if (!empty($_SESSION['flash'])) {
//            foreach ($_SESSION['flash'] as $flash) {
//                echo "<div class='text-dark text-center mt-2 mb-2 alert alert-danger'>$flash</div>";
//            }
//            $_SESSION['flash'] = [];
//        }
//    }


    public static function setFlash($message, $type = 'error')
    {
        $_SESSION['flash'] = array(
            'message' => $message,
            'type' => $type
        );
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            ?>
            <div class="alert alert-<?php echo $_SESSION['flash']['type']; ?>">
                <?php echo $_SESSION['flash']['message'] ?>
            </div>
            <?php
            unset($_SESSION['flash']);

        }
    }
}

