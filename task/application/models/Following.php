<?php

class Following extends Zend_Db_Table
{
    protected $_name = 'following';
    protected $_primary = 'following_id';

    function getFollowingMessage($task_id)
    {
        $db = $this->getAdapter();
        $sql="select state,Fdescribe from `following` WHERE task_id=".$task_id;
        $message = $db->query($sql)->fetchAll();
        return $message;
    }
    function insertFollowingMessage($task_id,$Fdescribe,$state)
    {
        $db = $this->getAdapter();
        $sql="INSERT INTO `following` (task_id,state,Fdescribe) VALUES ('".$task_id."','".$state."','".$Fdescribe."')";
        $rowCount = $db->query($sql)->rowCount();
        return $rowCount;
    }
}