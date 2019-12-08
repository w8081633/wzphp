<?php


namespace core\lib;


use Medoo\Medoo;

class model extends Medoo
{

   public function __construct()
   {
       $options=config::all('database');
       parent::__construct($options);

   }

}