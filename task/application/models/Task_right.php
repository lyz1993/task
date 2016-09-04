<?php

class Right extends Zend_Db_Table
{
    protected $_name = 'task_right';
    protected $_primary = 'right_id';

    function change($data)
    {
        $db = $this->getAdapter();
        $right_id = $data['right_id'];
        $where = $db->quoteInto('right_id=?',$right_id);
        $row = $this->update($data,$where);
        return $row;
    }
    function delete($data)
    {
        $db = $this->getAdapter();
        $sql = "delete from `task_right` where right_id =".$data['right_id'];
        $rowCount = $db->query($sql)->rowCount();
        return $rowCount;
    }
    function insertright($data)
    {
        $row = $this->insert($data);
        return $row;
    }
    function getRowCount()
    {
        $db = $this->getAdapter();
        $sql="select * from `task_right`";
        $rowCount = $db->query($sql)->rowCount();
        return $rowCount;
    }
    function rightMessage($pageSize,$page)
    {
        $db = $this->getAdapter();
        $sql="select * from `task_right` LIMIT ". ($page - 1) * $pageSize . ",".$pageSize;
        $message = $db->query($sql)->fetchAll();
        return $message;
    }

    function test()
    {
        $db = $this->getAdapter();
        $sql ="select * from task_right";
        $message = $db->query($sql)->fetchAll();
        return $message;
    }
}