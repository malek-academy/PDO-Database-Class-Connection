<?php

/**
 * PDO Models Interface
 *
 * @category  N/A
 * @package   N/A
 * @author    Malek alawamrh <malek.alawamrh@gmail.com>
 * @copyright 2017 Malek Academy.co
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version   1.0
 * @website   http://malek-academy.com
 */

interface PDO_Intserface{
    
    public function query($sql , $table , $other);
    
    public function execute();
    
    public function rowCount();
    
    public function lastInsertId();
    
    public function fetch();
    
    public function fetchAll();
    
    public function bind($param);
    
    public function update($table , $values ,$colum, $value);
    
    public function delete($table,$colum , $value);
    
}

?>
