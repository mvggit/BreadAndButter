<?php

/* 
 * Класс реализующий интерфейс вывода страницы
 * html в браузер.
 */

namespace View;

class View {
    
    private $view;
    
    public $data;
    public $filename;
    
    function __construct($data = array()) {
        
        $this->data = $data;
        
    }
    
    function getView( ) {
        
        $this->filename = !empty($this->data['filename']) ? $this->data['filename'] : NULL;
        
        ob_start();
        
        $this->filename = empty($this->filename) ? dirname(__FILE__) . "/../../../views/main/index.php" : $this->filename;
        include_once $this->filename;
        
        $this->view = ob_get_clean();

        
    }
    
    function render() {
        
        $this->getView();
        
        if ($this->view) {
            echo $this->view;
        } else {
            throw new Exception("Ошибка чтения шаблона");
        }
        
        
    }    
    
    
}