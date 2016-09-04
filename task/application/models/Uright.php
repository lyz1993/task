<?php

class Uright extends Zend_Db_Table
{
    protected $_name = 'uright';
    protected $_primary = 'uright_id';

    function change($data)
    {
        $db = $this->getAdapter();
        $uright_id = $data['uright_id'];
        $where = $db->quoteInto('uright_id=?',$uright_id);
        $row = $this->update($data,$where);
        return $row;
    }
    function getRowCount()
    {
        $db = $this->getAdapter();
        $sql="select * from `uright`";
        $rowCount = $db->query($sql)->rowCount();
        return $rowCount;
    }
    function urightMessage()
    {
        $db = $this->getAdapter();

        $sql="select * from `uright`";

        $message = $db->query($sql)->fetchAll();
        return $message;
    }

}