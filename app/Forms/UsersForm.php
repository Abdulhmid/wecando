<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class UsersForm extends Form
{
    public function buildForm()
    {
    	$this
    		->add('username','text')
            ->add('fullname','text')
    		->add('email','text')
    		->add('no_telp','text')
    		->add('password','password')
    		->add('password_confirmation','password')
    		->add('status','choice',[
			'choices' 		=> [1 => 'Active', 0 => 'Not Active'],
			'label'			=> "Status",
			'expanded' 		=> true,
            'multiple'      => false,
      		'choice_options' => [ 
        		'wrapper' => [
        			'class' => 'choice-wrapper'
        		] 
		 	     ]
	        ])
	        ->add('id_group', 'select', [
	            'attr' => ['class' => 'frm-e form-control'],
	            'choices' => \App\Models\Groups::lists("group_name", "id")->toArray(),
	            'empty_value' => '- Select Groups-',
	            'label' => 'Groups'
	        ])
    		->add('image','file',[
                'attr' => [
                    'id' => 'file',
                    'onchange' => 'readUrl(this)'
                ]
            ])
            ->add('upload','button',[
                'label' => '<i class="fa fa-upload"></i> Browse',
                'attr' => [
                    'class' => 'form-control btn bg-gray',
                    'onclick' => 'chooseFile()'
                ] 
            ]);
    }
}
