<?php
require_once APPLICATION_PATH.'/models/Task.php';
require_once APPLICATION_PATH.'/models/Following.php';
require_once APPLICATION_PATH.'/models/Event.php';
require_once APPLICATION_PATH.'/models/Type.php';
require_once APPLICATION_PATH.'/models/User.php';
require_once APPLICATION_PATH.'/models/KB.php';
class AdministrationController extends Zend_Controller_Action
{
    public function eventAction(){}
    public function eventmessageAction()
    {
        $page = $this->getParam('page');
        $pageSize = $this->getParam('rows');
        $event = new Event();
        $evenMessage = $event->eventMessage($pageSize,$page);
        $total = $event->getRowCount();
        $arr = array('total' => $total,'rows'=>$evenMessage);
        echo json_encode($arr);
        die;
    }
    public function changeeventAction()
    {
        $data = $this->getRequest()->getParam('data', '');
        /*echo $data['event_id'];die; //可输出*/
        /*echo $data['event_name'];die; //不可输出*/

        $event = new Event();
        $row = $event->change($data);
        if($row)
        {
            echo 1;
        }else{
            echo 0;
        }
        die;
    }
    public function deleteeventAction()
    {
        $data = $this->getRequest()->getParam('data', '');

        $event = new Event();
        $row = $event->delete($data);
        if($row)
        {
            echo 1;
        }else{
            echo 0;
        }
        die;
    }
    public function inserteventAction()
    {
        $data = $this->getRequest()->getParam('data', '');

        $event = new Event();
        $row = $event->insertevent($data);
        if($row)
        {
            echo 1;
        }else{
            echo 0;
        }
        die;
    }

    public function typeAction(){}
    public function typemessageAction()
    {
        $page = $this->getParam('page');
        $pageSize = $this->getParam('rows');
        $type = new type();
        $typeMessage = $type->typeMessage($pageSize,$page);
        $total = $type->getRowCount();
        $arr = array('total' => $total,'rows'=>$typeMessage);
        echo json_encode($arr);
        die;
    }
    public function changetypeAction()
    {
        $data = $this->getRequest()->getParam('data', '');

        $type = new type();
        $row = $type->change($data);
        if($row)
        {
            echo 1;
        }else{
            echo 0;
        }
        die;
    }
    public function deletetypeAction()
    {
        $data = $this->getRequest()->getParam('data', '');

        $type = new type();
        $row = $type->delete($data);
        if($row)
        {
            echo 1;
        }else{
            echo 0;
        }
        die;
    }
    public function inserttypeAction()
    {
        $data = $this->getRequest()->getParam('data', '');

        $type = new type();
        $row = $type->inserttype($data);
        if($row)
        {
            echo 1;
        }else{
            echo 0;
        }
        die;
    }

    public function kbAction(){}
    public function kbmessageAction()
    {
        $page = $this->getParam('page');
        $pageSize = $this->getParam('rows');
        $kb = new KB();
        $kbMessage = $kb->getkbMessage($pageSize,$page);
        $total = $kb->getRowCount();
        $arr = array('total' => $total,'rows'=>$kbMessage);
        echo json_encode($arr);
        die;
    }
    /*不可更改*/
    public function changekbAction()
    {
        $message['KB_id'] = $this->getRequest()->getParam('id', '');
        $message['KBtype_id'] = $this->getRequest()->getParam('type', '');
        $message['task_describe'] = $this->getRequest()->getParam('question', '');
        $message['process'] = $this->getRequest()->getParam('answer', '');

        $kb = new KB();
        $row = $kb->change($message);
        if($row)
        {
            echo 1;
        }else{
            echo 0;
        }
        die;
    }
    /*在添加页面撤回*/
    /*public function deletekbAction()
    {
        $data = $this->getRequest()->getParam('data', '');

        $kb = new KB();
        $row = $kb->delete($data);
        if($row)
        {
            echo 1;
        }else{
            echo 0;
        }
        die;
    }*/
    /*添加知识库，默认自动添加*/
    public function insertkbAction()
    {
        $message['KBtype_id'] = $this->getRequest()->getParam('type', '');
        $message['task_describe'] = $this->getRequest()->getParam('question', '');
        $message['process'] = $this->getRequest()->getParam('answer', '');

        $kb = new KB();
        $row = $kb->Ainsertkb($message);
        if($row)
        {
            echo 1;
        }else{
            echo 0;
        }
        die;
    }
    public function insertAction()
    {
        $type = new Type();
        $message = $type->getMessage();
        $this->view->message=$message;
    }
    public function changeAction()
    {
        $KB_id = $this->getRequest()->getParam('KB_id', '');

        $kb = new KB();
        $kbmessage = $kb->viewkb($KB_id);
        $this->view->kbmessage=$kbmessage;
        $type = new Type();
        $message = $type->getMessage();
        $this->view->message=$message;
    }



    public function usersAction()
    {
        /*$user = new User();
        $userMessage = $user->getMessage(0);
        $total = 7;
        $arr = array('total' => $total,'rows'=>$userMessage);
        echo json_encode($arr);*/
    }
    public function usermessageAction()
{
    $page = $this->getParam('page');
    $pageSize = $this->getParam('rows');
    $user = new User();
    $userMessage = $user->userMessage($pageSize,$page);
    $total = count($userMessage);
    $arr = array('total' => $total,'rows'=>$userMessage);
    echo json_encode($arr);
    die;
}
    public function changeuserAction()
    {
        $data = $this->getRequest()->getParam('data', '');

        $user = new User();
        $row = $user->change($data);
        if($row)
        {
            echo 1;
        }else{
            echo 0;
        }
        die;
    }
    public function insertuserAction()
    {
        $data = $this->getRequest()->getParam('data', '');

        $user = new User();
        $row = $user->insertuser($data);
        if($row)
        {
            echo 1;
        }else{
            echo 0;
        }
        die;
    }
    /*删除用户，一般默认不能删除用户，只有可用和暂停*/
    /*public function deleteuserAction()
    {
        $id = $this->getRequest()->getParam('id', '');

        $users = new User();
        $row = $users->delete($id);
        if($row)
        {
            echo 1;
        }else{
            echo 0;
        }
        die;
    }*/

    public function testAction()
    {
    }

}

