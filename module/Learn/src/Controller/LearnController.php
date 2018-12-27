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
        $answer  = [3,5,9,15];




        if($this->getRequest()->isPost()) {
      
            // Retrieve form data from POST variables
            $data = $this->params()->fromPost();     
            $tempData = \explode("|",$data['my-hidden']); 
            // var_dump( $tempData);


            $quest1 = new Question();
            var_dump($quest1->question1($tempData));

            $answer = $quest1->question1($tempData);

            // ... Do something with the data ...
           ;	
            // $data['key'];
            // echo $data['next'] . "5555"; 
            // convert to  array 

             
          } 


        return array('form' =>  $form,'answer' => $answer);
    } 
}