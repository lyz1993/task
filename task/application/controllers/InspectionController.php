<?php
require_once APPLICATION_PATH.'/models/User.php';
require_once APPLICATION_PATH.'/models/Inspection.php';
require_once APPLICATION_PATH.'/models/Schedule.php';
class InspectionController extends Zend_Controller_Action
{

    public function inspectionAction()
    {
        session_start();
        $staff = $_SESSION['staff'];
        $user_id = $_SESSION['user_id'];
        $this->view->staff=$staff;
        $this->view->user_id=$user_id;
    }
    public function subinspectionAction()
    {
        /*$message['user_id'] = $this->getRequest()->getParam('user_id', '');
        $message['airConditioner_Host'] = $this->getRequest()->getParam('airConditioner_Host', '');
        $message['UPS'] = $this->getRequest()->getParam('UPS', '');
        $message['Battery'] = $this->getRequest()->getParam('Battery', '');
        $message['Blower'] = $this->getRequest()->getParam('Blower', '');
        $message['Electric'] = $this->getRequest()->getParam('Electric', '');
        $message['airConditioner_UPS'] = $this->getRequest()->getParam('airConditioner_UPS', '');
        $message['Cylinder'] = $this->getRequest()->getParam('Cylinder', '');
        $message['PressureReliefValve'] = $this->getRequest()->getParam('PressureReliefValve', '');
        $message['Server'] = $this->getRequest()->getParam('Server', '');
        $message['storager'] = $this->getRequest()->getParam('storager', '');
        $message['Vmware'] = $this->getRequest()->getParam('Vmware', '');
        $message['zabbix'] = $this->getRequest()->getParam('zabbix', '');
        $message['Access'] = $this->getRequest()->getParam('Access', '');
        $message['network'] = $this->getRequest()->getParam('network', '');
        $message['LoopControl'] = $this->getRequest()->getParam('LoopControl', '');
        $message['Remarks'] = $this->getRequest()->getParam('Remarks', '');
        $message['date'] = date('Y-m-d');
        $message['FireEngine'] = $this->getRequest()->getParam('FireEngine', '');
        $message['networkEquipment'] = $this->getRequest()->getParam('networkEquipment', '');
        $message['safety'] = $this->getRequest()->getParam('safety', '');
        $message['airConditioner_Access'] = $this->getRequest()->getParam('airConditioner_Access', '');
        $message['Surveillance'] = $this->getRequest()->getParam('Surveillance', '');
        $message['PAU'] = $this->getRequest()->getParam('PAU', '');
        $message['ATS'] = $this->getRequest()->getParam('ATS', '');
        $message['PrecisionColumnHeadCabinet'] = $this->getRequest()->getParam('PrecisionColumnHeadCabinet', '');
        $message['Switch'] = $this->getRequest()->getParam('Switch', '');
        $message['NetworkManagement'] = $this->getRequest()->getParam('NetworkManagement', '');*/
        $data = $this->getRequest()->getParam('data', '');
        $data['date'] = date('Y-m-d');
        $inspection = new Inspection();
        $row = $inspection->insertm($data);
        echo $row;die;
    }

    public function reportAction()
    {
        $year=isset($_GET['year'])?intval($_GET['year']):date('Y');
        $month=isset($_GET['month'])?intval($_GET['month']):date('n');
        if($month<10)
        {
            $date = $year."-0".$month;
        }else{
            $date = $year."-".$month;
        }
        $this->view->year=$year;
        $this->view->month=$month;

        $inspection = new Inspection();
        $message = $inspection->getreport($date);
        $this->view->message=$message;

    }

    public function scheduleAction()
    {
        $year=isset($_GET['year'])?intval($_GET['year']):date('Y');
        $month=isset($_GET['month'])?intval($_GET['month']):date('n');
        if($month<10)
        {
            $date = $year."-0".$month;
        }else{
            $date = $year."-".$month;
        }

        $user = new User();
        $userMessage = $user->getMessage(-1);
        $this->view->message=$userMessage;

        $schedule = new Schedule();
        $scheduleMessage = $schedule->getschedule($date);
        $this->view->scheduleMessage=$scheduleMessage;

        $this->view->year=$year;
        $this->view->month=$month;

    }
    public function insertscheduleAction()
    {
        $scheduleMessage = $this->getRequest()->getParam('schedule', '');
        $date = $this->getRequest()->getParam('date', '');

        $schedule = new Schedule();
        $result = $schedule->insertschedule($scheduleMessage,$date);
        echo $result;
        die;
    }

    public function schedulemessageAction()
    {
        $year=isset($_GET['year'])?intval($_GET['year']):date('Y');
        $month=isset($_GET['month'])?intval($_GET['month']):date('n');
        if($month<10)
        {
            $date = $year."-0".$month;
        }else{
            $date = $year."-".$month;
        }

        $this->view->year=$year;
        $this->view->month=$month;

        $schedule = new Schedule();
        $scheduleMessage = $schedule->getschedule($date);
        $this->view->scheduleMessage=$scheduleMessage;

    }

}

