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
            "parent_id" => 2,
            "type"      => 2,
            "name"      => "APP.MENU.PLUGINS",
            "sequence"  => 70,
            "enabled"   => "Y",
        ],
        [
            "parent_id" => 0,
            "type"      => 1,
            "name"      => "APP.MENU.ISSUES",
            "sequence"  => 40,
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
            "parent_id" => 3,
            "type"      => 3,
            "name"      => "APP.MENU.INSTALL_MODULE",
            "sequence"  => 40,
            "enabled"   => "Y",
        ],
        [
            "parent_id" => 2,
            "type"      => 2,
            "name"      => "APP.MENU.SERVER_MANAGEMENT",
            "sequence"  => 10,
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
            "name"      => "APP.MENU.MANAGE_RESPONSIBILITY",
            "sequence"  => 40,
            "enabled"   => "Y",
        ],
        [
            "parent_id" => 2,
            "type"      => 2,
            "name"      => "APP.MENU.MANAGE_RESPONSIBILITY_LOOKUP",
            "sequence"  => 50,
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
            "parent_id" => 5,
            "type"      => 2,
            "name"      => "APP.MENU.PROJECT",
            "sequence"  => 10,
            "enabled"   => "Y",
        ],
        [
            "parent_id" => 4,
            "type"      => 2,
            "name"      => "APP.MENU.ISSUE",
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
