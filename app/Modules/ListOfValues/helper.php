<?php namespace App\Modules\ListOfValues;
 /**
 *	Listofvalues Helper  
 */
 class ListOfValueHelper {

     public static function getTables()
     {
         return \DB::table('information_schema.tables')->where('table_schema', 'laravel-package')->get();
     }

 }