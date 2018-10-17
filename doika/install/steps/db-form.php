<form method="post" action="<?php echo $action ?>">
    <p>Введите здесь информацию о подключении к базе данных. Если вы в ней не уверены, свяжитесь с хостинг-провайдером.</p>
    <table class="form-table">
        <tbody>
            <tr>
                <th scope="row"><label for="dbhost">Сервер базы данных</label></th>
                <td><input name="dbhost" id="dbhost" type="text" size="25" value="<?php echo isset($_SESSION['dbhost']) ? $_SESSION['dbhost']: 'localhost'; ?>"></td>
                <td>Если <code>localhost</code> не работает, нужно узнать правильный адрес в службе поддержки хостинг-провайдера.</td>
            </tr>
            <tr>
                <th scope="row"><label for="dbtype">Тип базы данных</label></th>
                <td><input name="dbtype" id="dbtype" type="text" size="25" value="<?php echo isset($_SESSION['dbtype']) ? $_SESSION['dbtype'] : 'mysql'; ?>"></td>
                <td>Тип базы данных</td>
            </tr>
            <tr>
                <th scope="row"><label for="dbtype">Порт базы данных</label></th>
                <td><input name="dbport" pattern="[0-9]+" id="dbport" type="dbport" size="25" value="<?php echo isset($_SESSION['dbport']) ? $_SESSION['dbport'] : '3306'; ?>"></td>
                <td>Порт базы данных</td>
            </tr> 
            <tr>
                <th scope="row"><label for="dbname">Имя базы данных</label></th>
                <td><input name="dbname" id="dbname" type="text" size="25" value="<?php echo isset($_SESSION['dbname']) ? $_SESSION['dbname'] : 'doika'; ?>"></td>
                <td>Имя базы данных, в которую вы хотите установить Doika.</td>
            </tr>
            <tr>
                <th scope="row"><label for="uname">Имя пользователя</label></th>
                <td><input name="uname" id="uname" type="text" size="25" value="<?php echo isset($_SESSION['uname']) ? $_SESSION['uname'] : ''; ?>"></td>
                <td>Имя пользователя базы данных.</td>
            </tr>
            <tr>
                <th scope="row"><label for="pwd">Пароль</label></th>
                <td><input name="pwd" id="pwd" type="text" size="25" value="<?php echo isset($_SESSION['pwd']) ? $_SESSION['pwd'] : ''; ?>" autocomplete="off"></td>
                <td>Пароль пользователя базы данных.</td>
            </tr>
        </tbody>
    </table>
    <p class="step"><input name="submit" type="submit" value="Проверить соединение и устновить" class="button button-large"></p>
</form>