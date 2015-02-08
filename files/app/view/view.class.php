<?php

/* 
 * View класс реализующий интерфейс вывода страницы
 * html в браузер.
 */

namespace View;

class View
{
    public $data;
    public $filename;
    
    public function __construct($data = array())
    {
        $this->data = $data;
    }
    
    private function makeView( )
    {
        $this->filename = 
                !empty($this->data['filename']) 
                        ? 
                $this->data['filename'] 
                        : 
                dirname(__FILE__) . "/../../../views/main/404.php";
        
        ob_start();
        
        include_once $this->filename;
        
        return ob_get_clean();
    }
    
    public function render()
    {
        if ( empty($view = $this->makeView()) ) 
        {
            throw new \Exception("Ошибка чтения шаблона");
        } 
        else 
        {
            echo $view;
        }        
    }    
    

    
}