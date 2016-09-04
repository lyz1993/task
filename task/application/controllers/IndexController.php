<?php

class IndexController extends Zend_Controller_Action
{
     //初始化
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        //跳转到登录页面
        $this->forward('loginview','login');
    }

}

