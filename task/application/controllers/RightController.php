<?php
require_once APPLICATION_PATH.'/models/Task_right.php';
require_once APPLICATION_PATH.'/models/Uright.php';
require_once APPLICATION_PATH.'/models/Gright.php';
class RightController extends Zend_Controller_Action
{
    public function rightAction(){}
    public function rightmessageAction()
    {
        $page = $this->getParam('page');

        $pageSize = $this->getParam('rows');
        $right = new Right();
        $rightMessage = $right->rightMessage($pageSize,$page);
        $total = $right->getRowCount();
        $arr = array('total' => $total,'rows'=>$rightMessage);
        echo json_encode($arr);
        die;
    }
    public function changerightAction()
    {
        $data = $this->getRequest()->getParam('data', '');

        $right = new Right();
        $row = $right->change($data);
        if($row)
        {
            echo 1;
        }else{
            echo 0;
        }
        die;
    }
    public function deleterightAction()
    {
        $data = $this->getRequest()->getParam('data', '');

        $right = new Right();
        $row = $right->delete($data);
        if($row)
        {
            echo 1;
        }else{
            echo 0;
        }
        die;
    }
    public function insertrightAction()
    {
        $data = $this->getRequest()->getParam('data', '');

        $right = new Right();
        $row = $right->insertright($data);
        if($row)
        {
            echo 1;
        }else{
            echo 0;
        }
        die;
    }

    public function urightAction()
    {
        $uright = new Uright();
        $urightMessage = $uright->urightMessage();
    }
    public function changeurightAction()
    {
        $data = $this->getRequest()->getParam('data', '');

        $uright = new Uright();
        $row = $uright->change($data);
        if($row)
        {
            echo 1;
        }else{
            echo 0;
        }
        die;
    }

    public function grightAction()
    {
        $right = new Right();
        $message=$right->test();
        $this->view->right=$message;
    }
    public function grightmessageAction()
    {
        $message = $this->testAction();
        $total = count($message);
        $arr = array('total' => $total,'rows'=>$message);
        echo json_encode($arr);
        die;
    }
    public function changegrightAction()
    {
        $data = $this->getRequest()->getParam('data', '');

        $gright = new Gright();
        $row = $gright->change($data);
        if($row)
        {
            echo 1;
        }else{
            echo 0;
        }
        die;
    }
    public function deletegrightAction()
    {
        $data = $this->getRequest()->getParam('data', '');

        $gright = new Gright();
        $row = $gright->delete($data);
        if($row)
        {
            echo 1;
        }else{
            echo 0;
        }
        die;
    }
    public function insertgrightAction()
    {
        $data = $this->getRequest()->getParam('data', '');

        $gright = new Gright();
        $row = $gright->insertgright($data);
        if($row)
        {
            echo 1;
        }else{
            echo 0;
        }
        die;
    }

    public function testAction()
    {
        $gright = new Gright();
        $right = new Right();
        $gmessage=$gright->test();
        $message=$right->test();

        $result[0]['gright_name'] = $gmessage[0]['gright_name'];
        $j=0;
        for($i=0;$i<count($gmessage);$i++)
        {
            if($result[$j]['gright_name']!= $gmessage[$i]['gright_name'])
            {
                $result[$j+1]['gright_name'] = $gmessage[$i]['gright_name'];
                $j=$j+1;
            }
        }
/*------------------------需优化代码------------------------------------------------------*/
        for($m=0;$m<count($result);$m++)
        {
            for($k=0;$k<count($message);$k++)
            {
                for($n=0;$n<count($gmessage);$n++)
                {
                    if(($result[$m]['gright_name']==$gmessage[$n]['gright_name'])&&($message[$k]['right_id']==$gmessage[$n]['right_id']))
                    {
                        $result[$m][$message[$k]['right_name']]= 1;
                        break;
                    }else{
                        $result[$m][$message[$k]['right_name']]= 0;
                    }

                }

            }
        }
/*------------------------------------------------------------------------------------*/
        return $result;
    }
}

