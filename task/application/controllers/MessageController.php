<?php
require_once APPLICATION_PATH.'/models/User.php';
class MessageController extends Zend_Controller_Action
{
    public function messageAction()
    {
        session_start();
        $user_id = $_SESSION['user_id'];
        $user = new User();
        $userMessage = $user->getMessage($user_id);
        $this->view->message=$userMessage;
    }
    public function updatemessageAction()
    {
        $user_id = $this->getRequest()->getParam('user_id', '');
        $user_name = $this->getRequest()->getParam('user_name', '');
        $passwd = $this->getRequest()->getParam('passwd', '');
        $passwd = md5($passwd);
        $staff = $this->getRequest()->getParam('staff', '');
        $phone = $this->getRequest()->getParam('phone', '');
        $mail = $this->getRequest()->getParam('mail', '');

        $user = new User();
        $result = $user->updateuser($user_id,$user_name,$passwd,$staff,$phone,$mail);

        echo $result;die;
    }
}

