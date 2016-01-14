<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class UsersForm extends Form
{
    public function buildForm()
    {
    	$this
            ->add('title','text')
            ->add('id', 'hidden');
    }
}
