<?php
require_once APPLICATION_PATH.'/models/KB.php';
require_once APPLICATION_PATH.'/models/Type.php';
class KbController extends Zend_Controller_Action
{
    public function kbAction()
    {
        $type = new type();
        $typeMessage = $type->getMessage();
        $this->view->typemessage=$typeMessage;
    }
    public function kbmessageAction()
    {
        $page = $this->getParam('page');
        $pageSize = $this->getParam('rows');
        $kb = new KB();
        $kbMessage = $kb->getMessage($pageSize,$page);
        $total = $kb->getRowCount();
        $arr = array('total' => $total,'rows'=>$kbMessage);
        echo json_encode($arr);
        die;
    }
    public function searchAction()
    {
        $point = $this->getRequest()->getParam('point', '');
        $type = $this->getRequest()->getParam('type', '');

        $kb = new KB();
        $message = $kb->selectkb($point,$type);
        $this->view->message=$message;

    }
    public function viewAction()
    {
        $KB_id = $this->getRequest()->getParam('id', '');
        $f = $this->getRequest()->getParam('f', '');
        $kb = new KB();
        $message = $kb->viewkb($KB_id);
        $this->view->message=$message;
        $this->view->f=$f;
    }
}

