<?php

/* 
 * Interface to use DataBases class.
 * 
 * @select
 * @insert
 * 
 * This methods returned object query
 * who is a param query's method's.
 * 
 */

namespace Db;
include_once dirname( __CLASS__ ) . 'DataBaseInterface.class.php';

interface DataBaseInterface {
    public function connect( $host, $uname, $upass, $udbname );
    public function select( $items, $where, $limit );
    public function insert( $table, $items );
    public function update( $table, $items, $where);
    public function fetch( $method );
}