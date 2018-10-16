<?php
    error_reporting(E_ERROR | E_PARSE);
    session_start();
    $step = (!empty($_GET['step'])) ? intval($_GET['step']) : 1;
    $error = false;
        
    $install_folder = 'doika/'; // папка установки дойки
    $mysqlImportFilename = 'doika.sql';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <style><?php include($install_folder . 'install/style.css') ?></style>
</head>
<body>
<p id="logo"><a href="http://doika.falanster.by/" tabindex="-1">Doika</a></p>
<?php
switch ($step) {
    case 1: // приветствие
        include($install_folder . 'install/steps/hello.html');
        break;
    case 2: // системные требования
        include($install_folder . 'install/steps/system-requirements.php');
        $nextStep = "?step=3";
        $repeatStep = "?step=2";
        include($install_folder . 'install/next-step.php');
        break;
    case 3: // проверка прав на папки
        include($install_folder . 'install/steps/folder-permisson.php');
        $nextStep = "?step=4";
        $repeatStep = "?step=3";
        include($install_folder . 'install/next-step.php');
        break;
    case 4: // доступ к базе данных
        $action = "?step=5";
        include($install_folder . 'install/steps/db-form.php');
        break;
    case 5:
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // example: mysql:dbname=testdb;host=127.0.0.1
            $dsn = "{$_POST['dbtype']}:host={$_POST['dbhost']};dbname={$_POST['dbname']};port={$_POST['dbport']}";
            try {
                $pdoConnection = new \PDO($dsn, $_POST['uname'], $_POST['pwd']);
            } catch (\PDOException $exception) {
                echo "<q>{$exception->getMessage()}</q>";
                $pdoConnection === null;
            }

            if (!$pdoConnection) {
                $_SESSION['dbhost'] = $_POST['dbhost'];
                $_SESSION['dbtype'] = $_POST['dbtype'];
                $_SESSION['dbport'] = $_POST['dbport'];
                $_SESSION['dbname'] = $_POST['dbname'];
                $_SESSION['uname'] = $_POST['uname'];
                $_SESSION['pwd'] = $_POST['pwd'];
                
                $action = '?step=4';
                include($install_folder . 'install/db-error.php');
            } else {
                echo "Усановка:<br>";
                
                $conn =new mysqli($_POST['dbhost'], $_POST['uname'], $_POST['pwd'], $_POST['dbname']);
                $query = '';
                $sqlScript = file($mysqlImportFilename);
                foreach ($sqlScript as $line) {
                    $startWith = substr(trim($line), 0, 2);
                    $endWith = substr(trim($line), -1, 1);
                    if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
                        continue;
                    }
                    $query = $query . $line;
                    if ($endWith == ';') {
                        try {
                            $pdoConnection->exec($query);
                        } catch (\Exception $exception) {
                            die("<div class=\"error-response sql-import-response\">Problem in executing the SQL query: <b>{$exception->getMessage()}</b></div>");
                        }
                    }
                }
                echo 'Файл $mysqlImportFilename успешно загружен в базу данных<br>';

                $my_file = $install_folder.'.env';
                $handle = fopen($my_file, 'w');
                $params = [
                    'APP_NAME' =>  'Doika',
                    'APP_ENV' => 'production',
                    'APP_KEY' => 'base64:' . base64_encode(random_bytes(32)),
                    'DB_CONNECTION' => $_POST['dbtype'],
                    'DB_HOST' => $_POST['dbhost'],
                    'DB_PORT' => $_POST['dbport'],
                    'DB_DATABASE' => $_POST['dbname'],
                    'DB_USERNAME' => $_POST['uname'],
                    'DB_PASSWORD' => $_POST['pwd']
                ];
                $data = '';
                foreach ($params as $key => $value) {
                    $data .= $key . '=' . $value . PHP_EOL;
                }
                fwrite($handle, $data);
                fclose($handle);

                echo "Файл конфигурации создан<br>";
                if (!$error) {
                    echo '<meta http-equiv="refresh" content="2;URL=?step=6" />';
                } else {
                    echo "<p class='error'>Что-то прошло не так.</p>";
                }
            }
        }
        break;
    case 6:
        include($install_folder . 'install/steps/finish.html');
        session_destroy();
        unlink('install-doika.php');
        unlink('doika.sql');
        break;
    default:
        echo '<meta http-equiv="refresh" content="2;URL=?step=1" />';
}
?>
</body>
</html>