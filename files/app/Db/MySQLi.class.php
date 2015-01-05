<?php

/* 
 * class MySQLi.
 * Connection to MySQL 
 * class and implements methods
 * to escape data from Db.
 */

namespace Db;
use Db\DataBaseInterface;
use Service\ImplodeArray;

class MySQLi implements DataBaseInterface {
    use ImplodeArray;
    
    public $MySQLi;
    
    function __construct( $host, $uname, $upass, $udbname ) {
        
        $this->connect( $host, $uname, $upass, $udbname );
    }
    
    function connect( $host, $uname, $upass, $udbname ) {
        
        return $this->MySQLi = new \mysqli( $host, $uname, $upass, $udbname );
    }
    
    function select( $items, $from, $where, $orderby = 'id ASC', $limit = 1000 ) {

        //Test trash!!!
        //echo "SELECT DISTINCT $items FROM $from WHERE $where ORDER BY $orderby LIMIT $limit";
        
        return $sql = "SELECT DISTINCT $items FROM $from WHERE $where ORDER BY $orderby LIMIT $limit";
    }
    
    function insert( $table, $items ) {
        
        $string = array();
        $this -> explodeAssocArray( $items, $string );
        
        return $sql = "INSERT INTO $table (". $string[0] .") VALUES (". $string[1] .")";
    }
    
    //TODO посмотреть как можно упростить и улучшить дизайн кода    
    
    function update( $table, $items, $where = 1 ) {
        
        $itemstoset = '';
        $this->implplodeAssocArrayWithPattern($items, $itemstoset, '=', ' AND ');        
        
        return $sql = "UPDATE $table SET $itemstoset WHERE $where";
    }
    
    function fetch( $method ) {
        
        $fetch = $this -> MySQLi -> query($method);
        
        if (empty($fetch)) {
            
            return false;
        }
        
        $fields = array();
        
        while ($row = $fetch -> fetch_assoc()){
            $fields[] = $row;
        }
        
        return $fields;

        
    }
    
    function run( $method ) {
        
        echo $method."<br />";
        $this->MySQLi->query($method);
        
        echo $this->MySQLi->error."<br />";
        
        if ($this->MySQLi->errno) {
            
            return false;
        }
        
        return empty($last_insert_id = $this->MySQLi->insert_id) ? true : $last_insert_id;

        
    }
    
        
}