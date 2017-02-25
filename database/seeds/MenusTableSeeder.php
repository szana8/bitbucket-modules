<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    private $_menus = [
        [
            "parent_id" => 0,
            "type"      => 1,
            "name"      => "APP.MENU.DASHBOARDS",
            "sequence"  => 10,
            "enabled"   => "Y",
        ],
        [
            "parent_id" => 0,
            "type"      => 1,
            "name"      => "APP.MENU.SYSTEM",
            "sequence"  => 20,
            "enabled"   => "Y",
        ],
        [
            "parent_id" => 0,
            "type"      => 1,
            "name"      => "APP.MENU.PROJECTS",
            "sequence"  => 30,
            "enabled"   => "Y",
        ],
        [
            "parent_id" => 2,
            "type"      => 2,
            "name"      => "APP.MENU.USER_MANAGEMENT",
            "sequence"  => 30,
            "enabled"   => "Y",
        ],
        [
            "parent_id" => 2,
            "type"      => 2,
            "name"      => "APP.MENU.MANAGE_METADATA",
            "sequence"  => 60,
            "enabled"   => "Y",
        ],
        [
            "parent_id" => 2,
            "type"      => 2,
            "name"      => "APP.MENU.LIST_OF_VALUES",
            "sequence"  => 70,
            "enabled"   => "Y",
        ],
        [
            "parent_id" => 3,
            "type"      => 2,
            "name"      => "APP.MENU.PROJECT",
            "sequence"  => 10,
            "enabled"   => "Y",
        ],
    ];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->_menus as $menu) {
            \DB::table('menus')->insert($menu);
        }
    }
}
