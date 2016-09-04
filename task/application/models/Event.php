<?php

class Event extends Zend_Db_Table
{
    protected $_name = 'event';
    protected $_primary = 'event_id';

    function change($data)
    {
        $db = $this->getAdapter();
        $event_id = $data['event_id'];
        $where = $db->quoteInto('event_id=?',$event_id);
        $row = $this->update($data,$where);
        return $row;
    }
    function delete($data)
    {
        $db = $this->getAdapter();
        $sql = "delete from `event` where event_id =".$data['event_id'];
        $rowCount = $db->query($sql)->rowCount();
        return $rowCount;

        /*$db = $this->getAdapter();
        $where = $db->quoteInto('event_id=?',$data['event_id']);
        $row = $this->delete($where);
        return $row;*/
    }
    function insertevent($data)
    {
        $row = $this->insert($data);
        return $row;
    }
    function getRowCount()
    {
        $db = $this->getAdapter();
        $sql="select * from `event`";
        $rowCount = $db->query($sql)->rowCount();
        return $rowCount;
    }
    function eventMessage($pageSize,$page)
    {
        $db = $this->getAdapter();

        $sql="select * from `event` LIMIT ". ($page - 1) * $pageSize . ",".$pageSize;

        $message = $db->query($sql)->fetchAll();
        return $message;
    }

    function getMessage()
    {
        $db = $this->getAdapter();
        $sql="select * from `event`";
        $message = $db->query($sql)->fetchAll();
        return $message;
    }

}