<?php declare(strict_types = 1);

use Nette\Application\UI\Form;

final class PigLangFormComponent extends Nette\Application\UI\Control
{
    public $onPigLangFormSave;
    
    public function __construct() 
    {

    }
    
    public function createComponentPigLangForm(): Form

    {
        $form = new Form();
        
        $form->addTextArea('text','Text')
            ->setRequired('Zadejte text')
            ->setHtmlAttribute('id', 'text');
         
        $form->addSubmit('send', 'Uložit')
            ->setAttribute('class', 'btn btn-info btn-sm');   

       
        $form->onSuccess[] = [$this, 'processForm'];

        return $form;
    }
    
    public function processForm($form): void
    {   
        $data['translate'] = null;
        $text_input = $form['text']->getValue();
        $text_array = explode(' ', $text_input);
        $vocals = array('a','e','i','o','u');
        
        foreach($text_array as $word){
            if (in_array($word[0], $vocals)) 
            {
                bdump('jelo');
            }
        }
        
        $this->onPigLangFormSave($data);
    }
    
    public function render(): void
    {
        $this->template->render(__DIR__ . '/piglangform.latte');
    }
}

interface IPigLangFormComponent
{
    /** @return \PigLangFormComponent */
    public function create();
}

