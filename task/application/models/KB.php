<?php

class KB extends Zend_Db_Table
{
    protected $_name = 'kb';
    protected $_primary = 'KB_id';

    function MInsertTaskMessage($task_describe)
    {
        $db = $this->getAdapter();
        $sql="INSERT INTO `kb` (task_describe) VALUES ('".$task_describe."')";

        $rowCount = $db->query($sql)->rowCount();
        return $rowCount;
    }

    function getkbMessage($pageSize,$page)//管理
    {
        $db = $this->getAdapter();
        $sql="SELECT UK.KB_id,type.type_name,UK.task_id,UK.task_describe,UK.process,UK.staff user_id
                FROM(
                select kb.KB_id,kb.KBtype_id,kb.task_id,kb.task_describe,kb.process,`user`.staff
                from (select * from `kb`  ORDER BY KB_id DESC LIMIT ". ($page - 1) * $pageSize . ",".$pageSize.")`kb`
                left JOIN `user`
                on `user`.user_id=kb.user_id)as UK
                INNER JOIN type
                on type.type_id=UK.KBtype_id";
        $message = $db->query($sql)->fetchAll();
        return $message;
    }

    function getMessage($pageSize,$page)//查阅
    {
        $db = $this->getAdapter();
        $sql="select kb.KB_id,type.type_name,kb.task_describe,kb.process
                from (select * from `kb`  ORDER BY KB_id DESC LIMIT ". ($page - 1) * $pageSize . ",".$pageSize.")`kb`
                INNER JOIN type
                where type.type_id=kb.KBtype_id";
        $message = $db->query($sql)->fetchAll();
        return $message;
    }
    function getRowCount()
    {
        $db = $this->getAdapter();
        $sql="select * from `kb`";
        $rowCount = $db->query($sql)->rowCount();
        return $rowCount;
    }
    /*删除和更新*/
    function change($message)
    {
        $db = $this->getAdapter();
        $KB_id = $message['KB_id'];
        $where = $db->quoteInto('KB_id=?',$KB_id);
        $row = $this->update($message,$where);
        return $row;
    }
    /*function delete($id)
    {
        if (!$id) {
            return 0;
        }

        $db = $this->getAdapter();
        $sql = "delete from `kb` where KB_id =".$id;
        $rowCount = $db->query($sql)->rowCount();
        return $rowCount;
    }*/
    /*插入知识库，默认自动添加*/
    function Ainsertkb($message)
    {
        $row = $this->insert($message);
        return $row;
    }

    /*添加或撤回知识库*/
    function insertkb($task_id)
    {
        $db = $this->getAdapter();
        $sql="insert into  kb(task_id,KBtype_id,task_describe,process,user_id)
            select  task_id,type,task_describe,process,Huser
            from  task  WHERE task_id=".$task_id;
        $rowCount = $db->query($sql)->rowCount();
        return $rowCount;
    }
    function getKB_id($task_id)
    {
        $db = $this->getAdapter();
        $sql="select KB_id from `kb` WHERE task_id=".$task_id;
        $message = $db->query($sql)->fetchAll();
        return $message;
    }
    function deletekb($task_id)
    {
        $db = $this->getAdapter();
        $sql="Delete from kb where task_id = ".$task_id;
        $rowCount = $db->query($sql)->rowCount();
        return $rowCount;
    }

    /*搜索*/
    function selectkb($point,$type)
    {
        $db = $this->getAdapter();
        if($type==0&&$point=="关键字")
        {
            return 0;
        }
        if($type==0)
        {
            $sql="select * from `kb` where task_describe like '%".$point."%' or process like '%".$point."%'";
        }elseif($point=="关键字")
        {
            $sql="select * from `kb` where KBtype_id=".$type;
        }else{
            $sql="select * from `kb` where KBtype_id=".$type." and task_describe like '%".$point."%' or process like '%".$point."%'";
        }

        $message = $db->query($sql)->fetchAll();
        return $message;
    }
    function viewkb($KB_id)
    {
        $db = $this->getAdapter();
        $sql = "select * from `kb` where KB_id=".$KB_id;
        $message = $db->query($sql)->fetchAll();
        return $message;
    }
}