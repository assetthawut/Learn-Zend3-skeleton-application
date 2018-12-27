<?php 

namespace Learn\Controller;

use Learn\Form\LearnForm;
use Learn\Form\NextForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Learn\Model\Question;



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

    public function testgetAction(){


        $form = new LearnForm();
        
        if($this->getRequest()->isPost()) {
      
            // Retrieve form data from POST variables
            $data = $this->params()->fromPost();     
            
            // ... Do something with the data ...
            var_dump($data);	  
          } 

        return array('form' =>  $form);
        

    }

    public function question2Action(){

        $quest2 = new Question();

        echo $quest2->question2();
        echo "Question 2";
    }

    public function nextAction(){

        $form = new NextForm();
        $answer = array('a','b','c','d');

        if($this->getRequest()->isPost()) {
      
            // Retrieve form data from POST variables
            $data = $this->params()->fromPost();     
            
            // ... Do something with the data ...
           ;	
            // $data['key'];
            // echo $data['next'] . "5555"; 

            var_dump($data);
             
          } 


        return array('form' =>  $form,'answer' => $answer);
    } 
}