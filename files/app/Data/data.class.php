<?php

/* 
 * Класс Data содержащий реализацию 
 * паттерна абстрактная фабрика 
 * реализующего интерфейс 
 * телефонного и имэйл справочника
 * 
 * Класс Data содержит метод view 
 * реализующий фабричный метод 
 * который осуществляет
 * вывод страницы в браузер.
 */

namespace Data;
use View\View;
use Data\Control\Control;

class Data extends DataExtended {
    
    private static $_Db;
    private static $_request;
    
    function __construct($db, $request) {
        
        self::$_Db = $db;
        self::$_request = $request;
        
        $this->setData(self::$_request);
        
    }    
    
    /*
     * Класс setData реализует обращение
     * к данным используя класс Control
     */

    
    function setData($request) {
        
        if ( empty($request['action']) ) {

            $this->view(new View())->render();
        } else {
            
            $control = new Control(self::$_Db );
            $data = $control -> loadClass( $request['action'] );
            
            (is_object($data)) ?
                    $data -> view(new View(
                                         $data -> loadClass( 'Get' ) -> getFullInfo() 
                                        ))->render()
                               :
                    false;
        }
        
    }


    
    
}