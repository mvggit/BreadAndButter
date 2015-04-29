<?php

/* 
 * MySQLi.
 * Connection to MySQL 
 * class and implements methods
 * to escape data from Db.
 * 
  * Trash code must be refactoring
 */

namespace Db;
use Db\IDataBase;
use Service\ImplodeArray;

class MySQLi implements IDataBase 
{
    use ImplodeArray;
    
    public $MySQLi;
    
    function __construct( $host, $uname, $upass, $udbname ) 
    {
        $this->connect( $host, $uname, $upass, $udbname );
    }
    
    function connect( $host, $uname, $upass, $udbname ) 
    {
        $this -> MySQLi = new \mysqli( $host, $uname, $upass, $udbname );
        $this -> MySQLi -> set_charset( 'utf8' );
        return $this -> MySQLi;
    }
    
    function select( $items, $from, $where, $orderby = 'id ASC', $limit = '100' )
    {
        $sql = ( !$items ) ? "" : " SELECT DISTINCT $items ";
        $sql .= ( !empty($sql) && $where ) ? " FROM $from " : "";
        $sql .= ( !empty($sql) && $where ) ? " WHERE $where " : "";
        $sql .= ( !empty($sql) && $orderby ) ? " ORDER BY $orderby " : "";
        $sql .= ( !empty($sql) && $limit ) ? " LIMIT $limit " : "";
        
        return $sql;
    }
    
    function insert( $table, $items ) 
    {
        $string = array();
        $this -> explodeAssocArray( $items, $string, $this -> MySQLi );
        
        return $sql = "INSERT INTO $table (". $string[0] .") VALUES (". $string[1] .")";
    }
    
    //TODO посмотреть как можно упростить и улучшить дизайн кода    
    
    function update( $table, $items, $where = 1 ) 
    {
        $itemstoset = '';
        $this->implplodeAssocArrayWithPattern($items, $itemstoset, '=', ' AND ', $this -> MySQLi);        
        
        return $sql = "UPDATE $table "
                    . "SET $itemstoset "
                    . "WHERE $where";
    }

    function delete( $table, $where = 1 ) 
    {
        return $sql = "DELETE FROM $table "
                    . "WHERE $where";
    }
    
    
    function fetch( $method )
    {
        $fetch = $this -> MySQLi -> query($method);

        if (empty($fetch))
        {
            return false;
        }
        
        $fields = array();
        
        while ($row = $fetch -> fetch_assoc())
        {
            $fields[] = $row;
        }
        
        return $fields;
    }
    
    function run( $method )
    {
        $this->MySQLi->query($method);
        
        if ($this->MySQLi->errno)
        {
            throw new \Exception( $this->MySQLi->error."<br />" );
        }
        
        $last_insert_id = $this -> MySQLi -> insert_id;
        
        return empty( $last_insert_id ) ? true : $last_insert_id;
    }
}
