<?php

class User extends Zend_Db_Table
{
    protected $_name = 'user';
    protected $_primary = 'user_id';
    function user_login($user_name,$password)
    {
        if (!$user_name) {
            return 0;
        }
        //sql适配器
        $db = $this->getAdapter();
        $sql = "select user_id,staff,power FROM user WHERE user_name = '".$user_name."' and passwd = '".$password."' and effective = 0";
        $result = $db->query($sql)->fetch();
        return $result;
    }

    function getMessage($user_id)
    {
        $db = $this->getAdapter();
        if($user_id==0)
        {
            $sql="select * from `user`";
        }elseif($user_id==-1)
        {
            $sql="select * from `user` where power != 9 and effective=0";//分配任务
        }else{
            $sql="select * from `user` where user_id=".$user_id;//查看修改自己的信息
        }
        $message = $db->query($sql)->fetchAll();
        return $message;
    }

    function change($data)
    {
        $db = $this->getAdapter();
        $user_id = $data['user_id'];
        $where = $db->quoteInto('user_id=?',$user_id);
        $row = $this->update($data,$where);
        return $row;
    }
    function insertuser($data)
    {
        $row = $this->insert($data);
        return $row;
    }
    /*删除用户，一般默认不能删除用户，只有可用和暂停*/
    /*function delete($id)
    {
        if (!$id) {
            return 0;
        }

        $db = $this->getAdapter();
        $sql = "delete from `user` where user_id =".$id;
        $rowCount = $db->query($sql)->rowCount();
        return $rowCount;
    }*/
    function userMessage($pageSize,$page)
    {
        $db = $this->getAdapter();

        $sql="select * from `user` LIMIT ". ($page - 1) * $pageSize . ",$pageSize";

        $message = $db->query($sql)->fetchAll();
        return $message;
    }
    function getRowCount()
    {
        $db = $this->getAdapter();
        $sql="select * from `user`";
        $rowCount = $db->query($sql)->rowCount();
        return $rowCount;
    }


    function updateuser($user_id,$user_name,$passwd,$staff,$phone,$mail)
    {
        $db = $this->getAdapter();
        $sql="update `user` set user_name='".$user_name."',passwd='".$passwd."',staff='".$staff."',phone='".$phone."',mail='".$mail."' where user_id =".$user_id;
        $rowCount = $db->query($sql)->rowCount();
        return $rowCount;
    }
}