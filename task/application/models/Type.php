<?php

class Type extends Zend_Db_Table
{
    protected $_name = 'type';
    protected $_primary = 'type_id';

    function getMessage()
    {
        $db = $this->getAdapter();
        $sql="select * from `type`";
        $message = $db->query($sql)->fetchAll();
        return $message;
    }

    function change($data)
    {
        $db = $this->getAdapter();
        $type_id = $data['type_id'];
        $where = $db->quoteInto('type_id=?',$type_id);
        $row = $this->update($data,$where);
        return $row;
    }
    function delete($data)
    {
        $db = $this->getAdapter();
        $sql = "delete from `type` where type_id =".$data['type_id'];
        $rowCount = $db->query($sql)->rowCount();
        return $rowCount;

        /*$db = $this->getAdapter();
        $where = $db->quoteInto('event_id=?',$data['event_id']);
        $row = $this->delete($where);
        return $row;*/
    }
    function inserttype($data)
    {
        $row = $this->insert($data);
        return $row;
    }
    function getRowCount()
    {
        $db = $this->getAdapter();
        $sql="select * from `type`";
        $rowCount = $db->query($sql)->rowCount();
        return $rowCount;
    }
    function typeMessage($pageSize,$page)
    {
        $db = $this->getAdapter();

        $sql="select * from `type` LIMIT ". ($page - 1) * $pageSize . ",$pageSize";

        $message = $db->query($sql)->fetchAll();
        return $message;
    }


}