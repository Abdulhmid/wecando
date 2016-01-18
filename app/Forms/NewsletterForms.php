<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class NewsletterForms extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', 'text',
                [
                    'attr' => ['class' => 'form-control']
                ]
            )
            ->add('content', 'textarea',
                [
                    'attr' => ['class' => 'wysihtml52 form-control','id' => 'content']
                ]
            )
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
