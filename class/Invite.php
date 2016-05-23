<?php
require_once 'Db.php';

class Invite
{
    /**
     * Returns an array of invites
     */
    public static function getInvitesList()
    {
        $db = Db::getConnection();

        $invitesList = [];

        $result = $db->query('SELECT invite, status, date_status ' .
            'FROM invites ' .
            'ORDER BY date_status DESC');

        $i = 0;
        while($row = $result->fetch()) {
            $invitesList[$i]['invite'] = $row['invite'];
            $invitesList[$i]['status'] = $row['status'];
            $invitesList[$i]['date_status'] = $row['date_status'];
            $i++;
        }

        return $invitesList;
    }

    public static function getArrayOfInvites()
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT invite FROM invites WHERE status = 0");

        $i = 0;
        while($row = $result->fetch()) {
            $invitesArray[$i]['invite'] = $row['invite'];
            $i++;
        }
        return $invitesArray;
    }

    public static function updateStatusInvite($invite)
    {
        $db = Db::getConnection();
        $result = $db->exec("UPDATE invites SET status = 1" .
            " WHERE invite = '$invite'");
        if ($result) {
            return true;
        }
    }
}