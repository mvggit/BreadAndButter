<?php 

/* 
 * class MySQLi.
 * Connection to MySQL 
 * class and implements methods
 * to escape data from Db.
 */

namespace Db;
use Db\DataBaseInterface;


class PDO implements DataBaseInterface
{
    function __construct( $host, $uname, $upass, $udbname )
    {
        $this->connect( $host, $uname, $upass, $udbname );
    }
    
    function connect( $host, $uname, $upass, $udbname )
    {
        return $this->MySQLi = new \mysqli( $host, $uname, $upass, $udbname );
    }
    
    function select( $items, $where, $limit )
    {
        ;
    }
    
    function insert( $items, $values )
    {
        ;
    }

    function update($table, $items, $where)
    {
        ;
    }    
    
    function fetch( $method )
    {
        ;
    }



}