<?php
    $dirsNeedWritePermissions = array (
        'storage/framework/'     => '775',
        'storage/logs/'          => '775',
        'bootstrap/cache/'       => '775',
        'public/images/'         => '775'
    );
    if (file_exists($install_folder)) {
        ?>
        <table>
            <tbody>
                <?php
                foreach ($dirsNeedWritePermissions as $dirname => $permission) {
                    echo "<tr><th>$install_folder$folder</th><td>";
                    if (intval(substr(sprintf('%o', fileperms($install_folder . $dirname)), -3)) >= intval($permission)) {
                        echo "✔";
                    } else {
                        echo "✘";
                        $error = true;
                    }
                    echo "</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <?php
    } else {
        echo "Папка $install_folder не существует. Попробуйте заново скачать и разархивировать <a href='https://github.com/cema93/doika-instalator/archive/master.zip' target='_blank'>архив</a> в корень вашего сайта. ";
        $error = true;
    }
?>