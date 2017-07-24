<?php
class PopupHelper extends AppHelper {
    public function __construct(View $view, $settings = array()) {
        parent::__construct($view, $settings);
        
    }
    
    public function gera_popup(){
        echo 'popup';
    }
    
}
?>