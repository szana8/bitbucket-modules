<?php

use Illuminate\Database\Seeder;

class LovTableSeeder extends Seeder
{

    /**
     * @var array
     */
    protected $_lovs = [
        [
            "name"         => "User List",
            "type"         => 2,
            "source_table" => NULL,
            "column_name"  => NULL,
        ],
        [
            "name"         => "SQL",
            "type"         => 2,
            "source_table" => NULL,
            "column_name"  => NULL,
        ],
        [
            "name"         => "Operations",
            "type"         => 2,
            "source_table" => NULL,
            "column_name"  => NULL,
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->_lovs as $lov) {
            DB::table('list_of_values')->insert($lov);
        }
    }
}
