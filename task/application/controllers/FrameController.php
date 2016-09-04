<?php
require_once APPLICATION_PATH.'/models/Schedule.php';
class FrameController extends Zend_Controller_Action
{

    public function mangerAction()
    {
        $staff = $_SESSION['staff'];
        $user_id = $_SESSION['user_id'];
        $schedule = new Schedule();
        $user = $schedule->check($user_id);
        $date=0;
        for($i=0;$i<count($user);$i++)
        {
            if($user[$i]['date']==date('Y-m-d'))
            {
                $date=1;
            }
        }
        $this->view->date=$date;
        $this->view->staff=$staff;
    }
    public function userAction()
    {
        $staff = $_SESSION['staff'];
        $user_id = $_SESSION['user_id'];
        $schedule = new Schedule();
        $user = $schedule->check($user_id);
        $date=0;
        for($i=0;$i<count($user);$i++)
        {
            if($user[$i]['date']==date('Y-m-d'))
            {
                $date=1;
            }
        }
        $this->view->date=$date;
        $this->view->staff=$staff;
    }
    public function adminAction()
    {}
}

