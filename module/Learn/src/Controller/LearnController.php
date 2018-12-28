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
            $tempData = explode("|",$data['my-hidden']); 
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
    
    public function next2Action(){

        $form = new NextForm();
        $answer = array('1' => 5,'2' => 25,'3' => 325,'4' => 4325);
        // print_r($answer);

        if($this->getRequest()->isPost()) {
       
            $data = $this->params()->fromPost();     

            $tempData = $data['my-hidden'];
            $tempData = json_decode($tempData);

            $answerObj = [];

            foreach( $tempData as $key => $value){

                // echo("KEY => ".$key);
                // echo("Value => ".$value);
                $answerObj[$key] = $value;
                

            }

            $quest3 = new Question();
            $answer = $quest3->question3($answerObj);
            
            // print_r($tempData);

            var_dump($answer);

            
        }

        return array('form' =>  $form,'answer' => $answer);
    } 
}