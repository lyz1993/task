<?php
require_once APPLICATION_PATH.'/models/User.php';
class LoginController extends Zend_Controller_Action
{
    //登录界面显示
    public function loginviewAction()
    {
        $this->render('login');
    }

    //登录控制,登录成功后显示主页，失败后返回登录页面
    public function loginAction()
    {
        $user_name = $this->getRequest()->getParam('user_name', '');
        $password = $this->getRequest()->getParam('password', '');

        $password = md5($password);
        $user = new User();
        $result = $user->user_login($user_name, $password);


        if($result){
            session_start();
            $_SESSION['staff'] = $result['staff'];
            $_SESSION['user_id'] = $result['user_id'];
            if($result['power']==5)
            {
                $this->forward('manger','frame');
            }elseif($result['power']==1)
            {
                $this->forward('user','frame');
            }elseif($result['power']==9)
            {
                $this->forward('admin','frame');
            }
        }else{
            if(!isset($_GET['flag']))
            {
                $error = 1;
                $this->view->error=$error;
            }
        }


    }
}
