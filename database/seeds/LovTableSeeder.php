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
            "datatype"         => 2,
            "table" => NULL,
            "column"  => NULL,
            "condition" => NULL
        ],
        [
            "name"         => "SQL",
            "datatype"         => 2,
            "table" => NULL,
            "column"  => NULL,
            "condition" => NULL
        ],
        [
            "name"         => "Operations",
            "datatype"         => 2,
            "table" => NULL,
            "column"  => NULL,
            "condition" => NULL
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
