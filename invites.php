<?php
include "layouts/header.php";
require_once 'class/Invite.php';
$invitesList = Invite::getInvitesList();
?>


    <!-- FORM -->
    <div id="main" class="container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-hover">
                    <tr>
                        <th>Инвайт</th>
                        <th>Статус</th>
                        <th>Дата</th>
                    </tr>
                    <?php foreach($invitesList as $inviteItem):?>
                        <tr>
                            <td><?=$inviteItem['invite']?></td>
                            <td><?php echo $status = ($inviteItem['status']) ? "Зарегистрирован" : "Не зарегистрирован"; ?></td>
                            <td><?=$inviteItem['date_status']?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

<?php
include "layouts/footer.php";
?>