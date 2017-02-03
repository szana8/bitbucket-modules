<?php

use Models\Menu;
use Illuminate\Database\Seeder;

class ApplicationsTableSeeder extends Seeder
{
    private $_version = "1.0.0";

    private $_author = "Core";

    private $_auhorEmail = 'admin@localhost.com';

    private $_coreApps = [
        [
            "menu_id"                => "APP.MENU.DASHBOARDS",
            "application_name"       => "Dashboard",
            "application_short_name" => "dashboard",
            "basepath"               => "Dashboard",
            "need_authentication"    => "Y",
            "enabled"                => "Y"
        ],
        [
            "menu_id"                =>  0,
            "application_name"       => "Login",
            "application_short_name" => "login",
            "basepath"               => "login",
            "need_authentication"    => "N",
            "enabled"                => "Y"
        ],
        [
            "menu_id"                => "APP.MENU.SERVER_MANAGEMENT",
            "application_name"       => "Server Management",
            "application_short_name" => "server_management",
            "basepath"               => "ServerManagement",
            "need_authentication"    => "Y",
            "enabled"                => "Y"
        ],
        [
            "menu_id"                => "APP.MENU.MANAGE_USER",
            "application_name"       => "Manage User",
            "application_short_name" => "manage_user",
            "basepath"               => "ManageUser",
            "need_authentication"    => "Y",
            "enabled"                => "Y"
        ],
        [
            "menu_id"                => "APP.MENU.MANAGE_RESPONSIBILITY",
            "application_name"       => "Manage Responsibility",
            "application_short_name" => "manage_responsibility",
            "basepath"               => "ManageResponsibility",
            "need_authentication"    => "Y",
            "enabled"                => "Y"
        ],
        [
            "menu_id"                => "APP.MENU.MANAGE_RESPONSIBILITY_LOOKUP",
            "application_name"       => "Responsibility Lookups",
            "application_short_name" => "responsibility_lookups",
            "basepath"               => "ResponsibilityLookups",
            "need_authentication"    => "Y",
            "enabled"                => "Y"
        ],
        [
            "menu_id"                => "APP.MENU.MANAGE_METADATA",
            "application_name"       => "Metadata",
            "application_short_name" => "metadata",
            "basepath"               => "Metadata",
            "need_authentication"    => "Y",
            "enabled"                => "Y"
        ],
        [
            "menu_id"                => "APP.MENU.INSTALL_MODULE",
            "application_name"       => "Install Module",
            "application_short_name" => "install_module",
            "basepath"               => "InstallModule",
            "need_authentication"    => "Y",
            "enabled"                => "Y"
        ],
        [
            "menu_id"                => "APP.MENU.LIST_OF_VALUES",
            "application_name"       => "List Of Values",
            "application_short_name" => "list_of_values",
            "basepath"               => "ListOfValues",
            "need_authentication"    => "Y",
            "enabled"                => "Y"
        ],
        [
            "menu_id"                => "APP.MENU.PROJECT",
            "application_name"       => "Project",
            "application_short_name" => "project",
            "basepath"               => "Project",
            "need_authentication"    => "Y",
            "enabled"                => "Y"
        ],
        [
            "menu_id"                => "APP.MENU.ISSUE",
            "application_name"       => "Issue",
            "application_short_name" => "issue",
            "basepath"               => "Issue",
            "need_authentication"    => "Y",
            "enabled"                => "Y"
        ]
    ];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->_coreApps as $app) {
            $app["version"]       = $this->_version;
            $app["author"]        = $this->_author;
            $app["author_email"]  = $this->_auhorEmail;

            if(!is_null($app["menu_id"]))
                $app["menu_id"]       = Menu::where('name', $app["menu_id"])->first()->id;
            else
                $app["menu_id"] = 0;

            DB::table('applications')->insert($app);
        }
    }
}
