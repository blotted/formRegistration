<?php
include 'layouts/header.php';
require_once 'class/User.php';

$usersList = User::getUsersList();
?>


    <!-- FORM -->
    <div id="main" class="container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-hover">
                    <tr>
                        <th>Логин</th>
                        <th>Пароль</th>
                        <th>Телефон</th>
                        <th>Город</th>
                        <th>Инвайт</th>
                    </tr>
                    <?php foreach($usersList as $userItem):?>
                        <tr>
                            <td><?=$userItem['login']?></td>
                            <td><?=$userItem['password']?></td>
                            <td><?=$userItem['phone']?></td>
                            <td><?=$userItem['city_name']?></td>
                            <td><?=$userItem['invite']?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

<?php
include 'layouts/footer.php';
?>