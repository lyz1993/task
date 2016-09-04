<?php
require_once APPLICATION_PATH.'/models/Task.php';
require_once APPLICATION_PATH.'/models/Following.php';
require_once APPLICATION_PATH.'/models/Event.php';
require_once APPLICATION_PATH.'/models/Type.php';
require_once APPLICATION_PATH.'/models/User.php';
require_once APPLICATION_PATH.'/models/KB.php';
class TaskController extends Zend_Controller_Action
{

    public function sendtaskAction()
    {
        $event = new Event();
        $eventMessage = $event->getMessage();
        $this->view->event=$eventMessage;
        $type = new Type();
        $typeMessage = $type->getMessage();
        $this->view->type=$typeMessage;
        $user = new User();
        $userMessage = $user->getMessage(-1);
        $this->view->user=$userMessage;
    }
    public function addtaskAction()
    {
        $event = $this->getRequest()->getParam('event', '');
        $Auser = $this->getRequest()->getParam('Auser', '');
        $Huser = $this->getRequest()->getParam('Huser', '');
        $type = $this->getRequest()->getParam('type', '');
        $task_describe = $this->getRequest()->getParam('task_describe', '');

        $task = new Task();
        $row=$task->InsertTaskMessage($event,$Auser,$Huser,$type,$task_describe);

        if($row)
        {
            echo 1;
        }else{
            echo 0;
        }
        die;
    }

    public function registerAction(){
        $state = $this->getRequest()->getParam('state', '');
        if($state)
        {
            $this->view->state=$state;
        }
    }
    public function registermessageAction()
    {
        $state = $this->getRequest()->getParam('state', '');
        $page = $this->getParam('page');
        $pageSize = $this->getParam('rows');
        $task = new Task();
        if($state)
        {
            $registerMessage = $task->getTaskMessage($state,$page,$pageSize);
        }else
        {
            $registerMessage = $task->getTaskMessage(0,$page,$pageSize);
        }
        $total = $task->getRowCount(0,0);
        $arr = array('total' => $total,'rows'=>$registerMessage);
        echo json_encode($arr);
        die;
    }
    public function searchregisterAction()
    {

        $state = $this->getRequest()->getParam('state', '');
        $task = new Task();
        $registerMessage = $task->getTaskMessage($state,0,0);
        $total = $task->getRowCount();
        $arr = array('total' => $total,'rows'=>$registerMessage);
        echo json_encode($arr);
        $this->render('register');
    }
    public function followviewAction()
    {
        $task_id = $_GET['task_id'];
        $following = new Following();
        $message = $following->getFollowingMessage($task_id);
        $this->view->message=$message;
    }
    public function tasklogAction()
    {
        $task_id = $_GET['task_id'];
        $f = $_GET['f'];
        $this->view->f = $f;

        $task = new Task();
        $message = $task->getTasklogMessage($task_id);
        $this->view->message = $message;
    }
    public function checktaskAction()
    {
        $task_id = $this->getRequest()->getParam('task_id', '');

        $task = new Task();
        $result = $task->updatesubmit($task_id);

        if($result){
            echo 1;
        }else{
            echo 0;
        }
        die;
    }
    public function submitkbAction()
    {
        $task_id = $this->getRequest()->getParam('id', '');
        $flag = $this->getRequest()->getParam('flag', '');

        $task = new Task();
        $kb = new KB();
        $task->updatesubmitkb($task_id,$flag);

        if($flag==0)
        {
            $kb->insertkb($task_id);
            $KB_id=$kb->getKB_id($task_id);
            $task->insertKB_id($task_id,$KB_id[0]['KB_id']);
        }else{
            $kb->deletekb($task_id);
        }



        die;
    }
    public function accessAction()
    {
        $task_id = $this->getRequest()->getParam('id', '');
        $flag = $this->getRequest()->getParam('flag', '');

        $task = new Task();
        $row = $task->access($task_id,$flag);
        echo $row;die;
    }
    public function deletetaskAction()
    {
        $task_id = $this->getRequest()->getParam('id', '');

        $task = new Task();
        $row = $task->delete_task($task_id);
        echo $row;die;
    }

    public function unfinishedAction(){}
    public function unfinishedmessageAction()
    {
        session_start();
        $user_id = $_SESSION['user_id'];
        $page = $this->getParam('page');
        $pageSize = $this->getParam('rows');

        $task = new Task();
        $unfinishedmessage = $task->getStaffTaskMessage($user_id,$page,$pageSize);
        $total = $task->getRowCount($user_id,1);
        $arr = array('total' => $total,'rows'=>$unfinishedmessage);
        echo json_encode($arr);
        die;
    }
    public function tasklogmessageAction()
    {
        $task_id = $_GET['task_id'];
        $this->view->task_id=$task_id;
    }
    public function submittaskAction()
    {
        $process = $this->getRequest()->getParam('process', '');
        $result = $this->getRequest()->getParam('result', '');
        $follow_up = $this->getRequest()->getParam('follow_up', '');
        $task_id = $this->getRequest()->getParam('task_id', '');
        $partner = $this->getRequest()->getParam('partner', '');

        $task = new Task();
        $result = $task->SInsertTaskMessage($partner,$task_id,$process,$result,$follow_up);
        if($result)
        {
            echo 1;
        }else{
            echo 0;
        }
        die;
    }
    public function followingAction()
    {
        $task_id = $_GET['task_id'];
        $this->view->task_id=$task_id;
        $following = new Following();
        $message = $following->getFollowingMessage($task_id);

        $this->view->message=$message;
    }
    public function submitfollowingAction()
    {
        $Fdescribe = $this->getRequest()->getParam('Fdescribe', '');
        $state = $this->getRequest()->getParam('state', '');
        $task_id = $this->getRequest()->getParam('task_id', '');

        $following = new Following();
        $result = $following->insertFollowingMessage($task_id,$Fdescribe,$state);
        if($result)
        {
            echo 1;
        }else{
            echo 0;
        }
        die;
    }
    public function viewAction()
    {
        $task_id = $this->getRequest()->getParam('id', '');
        $task = new Task();
        $message=$task->task_describe($task_id);
        $this->view->message=$message;
    }
    public function describeAction()
    {
        $task_id = $this->getRequest()->getParam('id', '');

        $task = new Task();
        $message = $task->gettaskdescribe($task_id);
        echo $message['task_describe'];
        die;
    }

    public function finishedAction(){}
    public function finishedmessageAction()
    {
        session_start();
        $user_id = $_SESSION['user_id'];
        $page = $this->getParam('page');
        $pageSize = $this->getParam('rows');

        $task = new Task();
        $finishedmessage = $task->getFinishedStaffTaskMessage($user_id,$page,$pageSize);
        $total = $task->getRowCount($user_id,2);
        $arr = array('total' => $total,'rows'=>$finishedmessage);
        echo json_encode($arr);
        die;
    }

    public function testAction()
    {
        $year=isset($_POST['year'])?intval($_POST['year']):date('Y');
        $month=isset($_POST['month'])?intval($_POST['month']):date('n');

        if($month<10)
        {
            $date = $year."-0".$month;
        }else{
            $date = $year."-".$month;
        }

    }


}

