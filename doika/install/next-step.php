<?php 
    if (!$error) {
        echo '<p class="step"><a href="' . $nextStep . '" class="button button-large">Вперёд!</a></p>';
    } else {
        echo "<p class='error'>Вы сможете продолжить после того,как исправите ошибки</p>";
        echo '<p class="step"><a href="' . $repeatStep . '" class="button button-large">Повторить проверку</a></p>';
    }
