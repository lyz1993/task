<?php

class Inspection extends Zend_Db_Table
{
    protected $_name = 'inspection';
    protected $_primary = 'inspection_id';

    function insertm($data)
    {
        $db = $this->getAdapter();
        $sql="select * from `inspection` where date = '".$data['date']."'";
        $message = $db->query($sql)->fetch();
        if($message)
        {
            $inspection_id = $message['inspection_id'];
            $where = $db->quoteInto('inspection_id=?',$inspection_id);
            $affected_rows = $this->update($data,$where);
            return $affected_rows;
        }else{
            try{
                $affected_rows = $this->insert($data);
                return $affected_rows;
            }catch (Exception $e)
            {
                return $e;
            }
        }
    }

    function getreport($date)
    {
        $db = $this->getAdapter();
        $sql="select * from `inspection` where date like '%".$date."%'";
        $message = $db->query($sql)->fetchAll();
        return $message;
    }

    function test($message)
    {
        $db = $this->getAdapter();
        $sql="select * from `inspection` where date = '".$message['date']."'";
        $a = $db->query($sql)->fetch();
        return $a;
    }
}