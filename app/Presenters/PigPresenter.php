<?php declare(strict_types = 1);

namespace App\Presenters;

use Nette;


final class PigPresenter extends Nette\Application\UI\Presenter
{
    /** @var \IPigLangFormComponent @inject */
    public $pigLangFormControl;
    
    protected function createComponentPigLangForm(): \PigLangFormComponent
    {
        $component = $this->pigLangFormControl->create();
        $component->onPigLangFormSave[] = function($data) {
            $this->redirect('Pig:default',$data['translate']);
        };

        return $component;
    }
    
    public function renderDefault($translate=null): void
    {
        $this->template->translate = $translate;
        
    }
}
