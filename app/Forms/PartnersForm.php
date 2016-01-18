<?php namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class PartnersForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text',
                [
                    'attr' => ['class' => 'form-control']
                ]
            )
            ->add('description', 'textarea',
                [
                    'attr' => ['class' => 'wysihtml52 form-control']
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