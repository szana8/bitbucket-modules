<?php namespace App\Modules\ListOfValues;
 /**
 *	Listofvalues Helper  
 */
 class ListOfValueHelper {

     public static function getTables()
     {
         return \DB::table('information_schema.tables')->where('table_schema', env('DB_DATABASE'))->get();
     }

     public function getColumns($table) {
         return \DB::table('information_schema.columns')->select('column_name as name')->where('table_schema',
             env('DB_DATABASE'))->where('table_name', $table)->get();
     }

 }