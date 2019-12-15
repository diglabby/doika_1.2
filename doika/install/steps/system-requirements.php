<?php
    $php_version = '7.0.0';
    $php_extensions = array (
        'openssl',
        'pdo',
        'mbstring',
        'tokenizer',
        'JSON',
        'cURL',
    );
?>
<h2>Системные требования</h2>
<table>
    <thead>
        <tr>
            <th>PHP</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>PHP версии <?php echo $php_version; ?> или выше </th>
            <td>
            <?php
            if (version_compare(PHP_VERSION, $php_version, '>=')) {
                echo "✔ ";
            }else{
                echo "✘ ";
                $error = true;
            }
            echo 'текущая('.PHP_VERSION.')';
            ?>
            </td>
        </tr>

        <?php
        foreach ($php_extensions as $extension) {
            echo "<tr><th>$extension</th><td>";
            if (extension_loaded($extension)) {
                echo "✔";
            } else {
                echo "✘";
                $error = true;
            }
            echo "</td></tr>";
        }
        ?>
    </tbody>
    <thead>
        <tr>
            <th>Apache</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>mod_rewrite</th>
            <td>
                <?php
                if (function_exists('apache_get_modules')) {
                    echo "✔";
                } else {
                    "✘";
                }
                ?>
            </td>
        </tr>
    </tbody>
</table>
