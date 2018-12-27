<?php 

namespace Learn\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class LearnController extends AbstractActionController
{
    public function indexAction()
    {

        echo "Test xxx 12344567";
        $test = "Jojobaolio";
        $this->layout()->myParameter = 'foo';
    }

    public function addAction()
    {
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }

    public function testAction(){

        // echo "Test xxx 12344567";
        $test = "Jojobaolio";
        
        $this->layout()->myParameter = 'foo';

        $view = new ViewModel(array('test' => $test));
        return $view;
    }
}