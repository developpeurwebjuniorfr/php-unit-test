    <?php
    if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])) {
        echo '<div class="alert alert-success container" role="alert">';
        foreach ($_SESSION['messages'] as $message) {
            echo $message . "<br>";
        }
        echo '</div>';
        $_SESSION['messages'] = [];
    }

    ?>

    