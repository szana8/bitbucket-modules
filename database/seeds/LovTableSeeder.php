<?php

use Illuminate\Database\Seeder;

class LovTableSeeder extends Seeder
{

    /**
     * @var array
     */
    protected $_lovs = [
        [
            "lov_name"         => "User List",
            "lov_type"         => 2,
            "lov_source_table" => NULL,
            "lov_column_name"  => NULL,
        ],
        [
            "lov_name"         => "SQL",
            "lov_type"         => 2,
            "lov_source_table" => NULL,
            "lov_column_name"  => NULL,
        ],
        [
            "lov_name"         => "Operations",
            "lov_type"         => 2,
            "lov_source_table" => NULL,
            "lov_column_name"  => NULL,
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
