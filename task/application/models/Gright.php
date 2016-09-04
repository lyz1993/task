<?php

class Gright extends Zend_Db_Table
{
    protected $_name = 'gright';
    protected $_primary = 'gright_id';

    function change($data)
    {
        $db = $this->getAdapter();
        $gright_id = $data['gright_id'];
        $where = $db->quoteInto('gright_id=?',$gright_id);
        $row = $this->update($data,$where);
        return $row;
    }
    function delete($data)
    {
        $db = $this->getAdapter();
        $sql = "delete from `gright` where gright_id =".$data['gright_id'];
        $rowCount = $db->query($sql)->rowCount();
        return $rowCount;
    }
    function insertgright($data)
    {
        $row = $this->insert($data);
        return $row;
    }
    function getRowCount()
    {
        $db = $this->getAdapter();
        $sql="select * from `gright`";
        $rowCount = $db->query($sql)->rowCount();
        return $rowCount;
    }
    function grightMessage($pageSize,$page)
    {
        $db = $this->getAdapter();

        $sql="select * from `gright` LIMIT ". ($page - 1) * $pageSize . ",".$pageSize;

        $message = $db->query($sql)->fetchAll();
        return $message;
    }

    function test()
    {
        $db = $this->getAdapter();
        $sql ="select * from gright";
        $message = $db->query($sql)->fetchAll();
        return $message;
    }
}