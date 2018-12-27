<?php

namespace Learn\Form;

use Zend\Form\Form;
use Zend\Form\Element;


class NextForm extends Form
{
    public function __construct()
    {
        parent::__construct('next-form');
        
        $this->setAttribute('method', 'post');

        // $this->add(array(
        //     'name' => 'client',
        //     'type' => 'Zend\Form\Element\Text',
        //     'options' => array(
        //         'label' => 'Client Name',
        //     ),
        //     'attributes' => array(
        //         'type' => 'text',
        //     ),

        // ));

        // $this->add(array(
        //     'name' => 'submit',
        //     'attributes' => array(
        //         'type'  => 'submit',
        //         'value' => 'Add'
        //     ),
        // ));

        $this->add(array(

            'name' => 'next',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Next'
            )

        ));

        $this->add([
            
            'type' => Element\Hidden::class,
            'name' => 'my-hidden',
            'attributes' => [
                'value' => '',
            ],
        ]);


    }
}
