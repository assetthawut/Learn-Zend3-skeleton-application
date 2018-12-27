<?php

namespace Learn\Form;

use Zend\Form\Form;


class LearnForm extends Form
{
    public function __construct()
    {
        parent::__construct('client-form');
        
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'client',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Client Name',
            ),
            'attributes' => array(
                'type' => 'text',
            ),

        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Add'
            ),
        ));
    }
}
