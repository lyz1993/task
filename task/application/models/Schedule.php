<?php

class Schedule extends Zend_Db_Table
{
    protected $_name = 'schedule';
    protected $_primary = 'schedule_id';

    function insertschedule($schedule,$date)
    {
        $db = $this->getAdapter();
        $select="select * from `schedule` where date like '%".$date."%'";
        $rowCount = $db->query($select)->rowCount();
        if($rowCount)
        {//已经添加过巡检表
            for($i=1;$i<=count($schedule);$i++)
            {
                if($schedule[$i]['user_id'])//需要添加或修改巡检人
                {
                    $getScheduleId = "select schedule_id from `schedule` where date= '".$schedule[$i]['date']."'";
                    $schedule_id = $db->query($getScheduleId)->fetch();
                    $schedule_id = $schedule_id['schedule_id'];
                    $where = $db->quoteInto('schedule_id=?',$schedule_id);
                    $affected_rows = $this->update($schedule[$i],$where);
                }
            }
            return $affected_rows;
        }else{//未添加过巡检表
            try{
                for($i=1;$i<=count($schedule);$i++)
                {
                    $affected_rows = $this->insert($schedule[$i]);
                }
                return $affected_rows;
            }catch (Exception $e)
            {
                return $e;
            }
        }
    }

    function test()
    {
        $schedule['user_id'] = 3;

        $db = $this->getAdapter();
        $where = $db->quoteInto('schedule_id=?',286);
        $affected_rows = $this->update($schedule,$where);
        return $affected_rows;

    }
    function getschedule($date)
    {
        $db = $this->getAdapter();
        $sql="select `schedule`.date,`schedule`.user_id,`user`.staff
            from (select date,user_id from `schedule` where date like '%".$date."%')`schedule`
            left JOIN `user`
            on `user`.user_id = `schedule`.user_id ORDER BY date Asc";
        $message = $db->query($sql)->fetchAll();
        return $message;
    }
    function check($user_id)
    {
        $db = $this->getAdapter();
        $sql="SELECT date FROM `schedule` WHERE user_id=".$user_id;
        $message = $db->query($sql)->fetchAll();
        return $message;
    }
}