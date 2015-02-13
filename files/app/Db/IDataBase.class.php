<?php

/* 
 * Interface to use DataBases class.
 */

namespace Db;

interface IDataBase 
{
    public function connect( $host, $uname, $upass, $udbname );
    public function select( $items, $where, $limit );
    public function insert( $table, $items );
    public function update( $table, $items, $where);
    public function fetch( $method );
}