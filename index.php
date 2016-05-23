<?php
include "layouts/header.php";
require_once 'class/Country.php';

$countriesList = Country::getCountriesList();
?>


    <!-- FORM -->
    <div id="main" class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-reg">
                    <div id="links">
                        <a href="users.php">Пользователи</a>
                        <a href="invites.php">Инавайты</a>
                    </div>
                    <div id="reg-title">
                        <h1>Регистрация</h1>
                        <form action="" method="post" id="registration">
                            <label for="login">Логин</label>
                            <input type="text" id="login" name="login" required><br>
                            <label for="password">Пароль</label>
                            <input type="password" id="password" name="password" required><br>
                            <label for="repassword">Еще раз пароль</label>
                            <input type="password" id="repassword" name="repassword"><br>
                            <label for="phone">Телефон</label>
                            <input type="text" id="phone" name="phone" placeholder="+38 (093) 937-99-92" required><br>
                            <label for="country">Страна</label>
                            <select id="country" name="country">
                                <?php foreach( $countriesList as $countryItem ):?>
                                    <option value="<?=$countryItem['country_name']?>"><?=$countryItem['country_name']?></option>
                                <?php endforeach; ?>
                            </select><br>
                            <label for="city">Город</label>
                            <select id="city" name="city">
                                <option value=""></option>
                            </select><br>
                            <label for="invite">Инвайт</label>
                            <input type="text" id="invite" name="invite" required><br>
                            <input type="button" id="send" value="Регистрация">
                            <input type="button" id="reset" value="Очистить">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include "layouts/footer.php";
?>