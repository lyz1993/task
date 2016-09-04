<?php
require_once APPLICATION_PATH.'/models/Following.php';
class Task extends Zend_Db_Table
{
    protected $_name = 'task';
    protected $_primary = 'task_id';

    function InsertTaskMessage($event,$Auser,$Huser,$type,$task_describe)
    {
        $db = $this->getAdapter();
        $sql="INSERT INTO `task` (event,Auser,Huser,start_time,task_describe,type) VALUES ('".$event."','".$Auser."','".$Huser."','".date('Y-'.'m-'.'j '.'H:'.'i:'.'s')."','".$task_describe."','".$type."')";

        $rowCount = $db->query($sql)->rowCount();
        return $rowCount;
    }
    function getStaffTaskMessage($user_id,$page,$pageSize)
    {
        $db = $this->getAdapter();
        $sql="select TET.event,TET.task_id,`user`.staff Auser,TET.type,TET.start_time,TET.submit,TET.access,TET.task_describe
                FROM
                (select TE.event_name event,TE.task_id,TE.Auser,type.type_name type,TE.start_time,TE.submit,TE.access,TE.task_describe
                FROM(
                SELECT `event`.event_name,task.task_id,task.type,task.Auser,task.start_time,task.submit,task.access,task.task_describe
                FROM (select task_id,event,type,start_time,task_describe,submit,access,Auser from `task` WHERE Huser='".$user_id."'and submit !=2 and access !=2 LIMIT ". ($page - 1) * $pageSize . ",".$pageSize.")task
                INNER JOIN event
                on `event`.event_id=task.`event`)as TE
                INNER JOIN type
                on type.type_id=TE.type)as TET
                INNER JOIN `user`
                ON `user`.user_id=TET.Auser";

        $message = $db->query($sql)->fetchAll();
        return $message;
    }
    function SInsertTaskMessage($partner,$task_id,$process,$result,$follow_up)
    {
        $db = $this->getAdapter();
        $sql="update `task` set partner='".$partner."',process='".$process."',result='".$result."',follow_up='".$follow_up."',submit = 1,finish_time='".date('Y-'.'m-'.'j '.'H:'.'i:'.'s')."',date='".date('Y-'.'m-'.'j')."' where task_id =".$task_id;
        $rowCount = $db->query($sql)->rowCount();
        return $rowCount;
    }
    function getTaskMessage($state,$page,$pageSize)
    {
        $db = $this->getAdapter();
        if($state==0)
        {
            $sql="SELECT TETUU.task_id,TETUU.event,TETUU.start_time,TETUU.Auser,TETUU.Huser,follow.Fdescribe,TETUU.finish_time,TETUU.submit,TETUU.submitKB,TETUU.KB_id,TETUU.type,TETUU.access
                    FROM
                    (SELECT TETU.task_id,TETU.event,TETU.start_time,`user`.staff Auser,TETU.Huser,TETU.finish_time,TETU.submit,TETU.submitKB,TETU.KB_id,TETU.type,TETU.access
                    from
                    (select TET.event,TET.task_id,`user`.staff Huser,TET.type,TET.Auser,TET.start_time,TET.finish_time,TET.submit,TET.submitKB,TET.KB_id,TET.access
                    FROM(
                    select TE.event_name event,TE.task_id,TE.Auser,TE.Huser,type.type_name type,TE.start_time,TE.finish_time,TE.submit,TE.submitKB,TE.KB_id,TE.access
                    FROM(
                    SELECT `event`.event_name,task.task_id,task.type,task.Auser,task.Huser,task.start_time,task.finish_time,task.submit,task.submitKB,task.KB_id,task.access
                    FROM (select * from `task`  ORDER BY task_id DESC LIMIT ". ($page - 1) * $pageSize . ",".$pageSize.")task
                    INNER JOIN event
                    on `event`.event_id=task.`event`)as TE
                    INNER JOIN type
                    on type.type_id=TE.type)as TET
                    INNER JOIN `user`
                    ON `user`.user_id=TET.Huser)as TETU
                    INNER JOIN `user`
                    ON `user`.user_id=TETU.Auser)as TETUU
                    left JOIN
                    (select following.task_id,following.state,following.Fdescribe
                    from (SELECT MAX(following_id) following_id from following GROUP BY task_id)as Fid
                    INNER JOIN following
                    on Fid.following_id=following.following_id)as follow
                    on TETUU.task_id=follow.task_id ORDER BY TETUU.start_time DESC";
        }elseif($state==1)
        {
            $sql="SELECT TETUU.task_id,TETUU.event,TETUU.start_time,TETUU.Auser,TETUU.Huser,follow.Fdescribe,TETUU.finish_time,TETUU.submit,TETUU.submitKB,TETUU.KB_id,TETUU.type,TETUU.access
                FROM
                (SELECT TETU.task_id,TETU.event,TETU.start_time,`user`.staff Auser,TETU.Huser,TETU.finish_time,TETU.submit,TETU.submitKB,TETU.KB_id,TETU.type,TETU.access
                from
                (select TET.event,TET.task_id,`user`.staff Huser,TET.type,TET.Auser,TET.start_time,TET.finish_time,TET.submit,TET.submitKB,TET.KB_id,TET.access
                FROM(
                select TE.event_name event,TE.task_id,TE.Auser,TE.Huser,type.type_name type,TE.start_time,TE.finish_time,TE.submit,TE.submitKB,TE.KB_id,TE.access
                FROM(
                SELECT `event`.event_name,task.task_id,task.type,task.Auser,task.Huser,task.start_time,task.finish_time,task.submit,task.submitKB,task.KB_id,task.access
                FROM (select * from `task`  WHERE submit!=2 ORDER BY task_id DESC LIMIT ". ($page - 1) * $pageSize . ",".$pageSize.")task
                INNER JOIN event
                on `event`.event_id=task.`event`)as TE
                INNER JOIN type
                on type.type_id=TE.type)as TET
                INNER JOIN `user`
                ON `user`.user_id=TET.Huser)as TETU
                INNER JOIN `user`
                ON `user`.user_id=TETU.Auser)as TETUU
                left JOIN
                (select following.task_id,following.state,following.Fdescribe
                from (SELECT MAX(following_id) following_id from following GROUP BY task_id)as Fid
                INNER JOIN following
                on Fid.following_id=following.following_id)as follow
                on TETUU.task_id=follow.task_id ORDER BY TETUU.start_time DESC";
        }elseif($state==2)
        {
            $sql="SELECT TETUU.task_id,TETUU.event,TETUU.start_time,TETUU.Auser,TETUU.Huser,follow.Fdescribe,TETUU.finish_time,TETUU.submit,TETUU.submitKB,TETUU.KB_id,TETUU.type,TETUU.access
                FROM
                (SELECT TETU.task_id,TETU.event,TETU.start_time,`user`.staff Auser,TETU.Huser,TETU.finish_time,TETU.submit,TETU.submitKB,TETU.KB_id,TETU.type,TETU.access
                from
                (select TET.event,TET.task_id,`user`.staff Huser,TET.type,TET.Auser,TET.start_time,TET.finish_time,TET.submit,TET.submitKB,TET.KB_id,TET.access
                FROM(
                select TE.event_name event,TE.task_id,TE.Auser,TE.Huser,type.type_name type,TE.start_time,TE.finish_time,TE.submit,TE.submitKB,TE.KB_id,TE.access
                FROM(
                SELECT `event`.event_name,task.task_id,task.type,task.Auser,task.Huser,task.start_time,task.finish_time,task.submit,task.submitKB,task.KB_id,task.access
                FROM (select * from `task`  WHERE submit=2 ORDER BY task_id DESC LIMIT ". ($page - 1) * $pageSize . ",".$pageSize.")task
                INNER JOIN event
                on `event`.event_id=task.`event`)as TE
                INNER JOIN type
                on type.type_id=TE.type)as TET
                INNER JOIN `user`
                ON `user`.user_id=TET.Huser)as TETU
                INNER JOIN `user`
                ON `user`.user_id=TETU.Auser)as TETUU
                left JOIN
                (select following.task_id,following.state,following.Fdescribe
                from (SELECT MAX(following_id) following_id from following GROUP BY task_id)as Fid
                INNER JOIN following
                on Fid.following_id=following.following_id)as follow
                on TETUU.task_id=follow.task_id ORDER BY TETUU.start_time DESC";
        }
        $message=$db->query($sql)->fetchAll();
        return $message;
    }
    function getRowCount($user_id,$state)
    {
        $db = $this->getAdapter();
        if($state==0)
        {
            $sql="select * from `task`";
        }elseif($state==1){
            $sql="select * from `task` where Huser=".$user_id." and submit!=2 and access!=2";
        }else{
            $sql="select * from `task` where Huser=".$user_id." and submit=2";
        }
        $rowCount = $db->query($sql)->rowCount();
        return $rowCount;
    }
    function getTasklogMessage($task_id)
    {
        $db = $this->getAdapter();
        $sql="SELECT TEU.task_id,TEU.`event`,TEU.Huser,task.start_time,task.finish_time,task.date,task.task_describe,task.process,task.result,task.follow_up,task.partner
            FROM
            (SELECT TE.task_id,TE.`event`,`user`.staff Huser
            FROM
            (SELECT task.task_id,`event`.event_name `event`,task.Huser
            from (SELECT * FROM task where task_id = ".$task_id.")task
            INNER JOIN `event`
            on task.`event`=`event`.event_id)as TE
            INNER JOIN `user`
            on `user`.user_id=TE.Huser)as TEU
            INNER JOIN `task`
            on task.task_id=TEU.task_id";
        $message = $db->query($sql)->fetchAll();
        return $message;
    }
    function updatesubmit($task_id)
    {
        $db = $this->getAdapter();
        $sql="update `task` set submit= 2 where task_id =".$task_id;

        $rowCount = $db->query($sql)->rowCount();
        return $rowCount;
    }

    function getFinishedStaffTaskMessage($user_id,$page,$pageSize)
    {
        $db = $this->getAdapter();
        $sql="select TE.event_name event,TE.task_id,type.type_name type,TE.start_time,TE.finish_time,TE.submit,TE.task_describe,TE.process
                FROM(
                SELECT `event`.event_name,task.task_id,task.type,task.start_time,task.finish_time,task.submit,task.task_describe,task.process
                FROM (select task_id,event,type,start_time,finish_time,process,task_describe,submit from `task` WHERE Huser='".$user_id."'and submit=2 LIMIT ". ($page - 1) * $pageSize . ",".$pageSize.")task
                INNER JOIN event
                on `event`.event_id=task.`event`)as TE
                INNER JOIN type
                on type.type_id=TE.type";
        $message = $db->query($sql)->fetchAll();
        return $message;
    }

    function updatesubmitkb($task_id,$flag)
    {
        $db = $this->getAdapter();
        if($flag==0)
        {
            $sql="update `task` set submitKB= 1 where task_id =".$task_id;
        }else{
            $sql="update `task` set KB_id='',submitKB= 0 where task_id =".$task_id;
        }
        $rowCount = $db->query($sql)->rowCount();
        return $rowCount;
    }

    function insertKB_id($task_id,$KB_id)
    {
        $db = $this->getAdapter();
        $sql="update `task` set KB_id=".$KB_id." where task_id =".$task_id;
        $rowCount = $db->query($sql)->rowCount();
        return $rowCount;
    }

    function access($task_id,$flag)
    {
        $db = $this->getAdapter();
        if($flag==0)
        {
            $sql="update `task` set access= 1 where task_id =".$task_id;
        }else{
            $sql="update `task` set access= 2 where task_id =".$task_id;
        }
        $rowCount = $db->query($sql)->rowCount();
        return $rowCount;
    }

    function delete_task($task_id)
    {
        $db = $this->getAdapter();

        $sql="delete  from `task` where task_id=".$task_id;

        $rowCount = $db->query($sql)->rowCount();
        return $rowCount;
    }

    function gettaskdescribe($task_id)
    {
        $db = $this->getAdapter();
        $sql="select task_describe from `task` WHERE task_id=".$task_id;
        $message = $db->query($sql)->fetch();
        return $message;
    }

}