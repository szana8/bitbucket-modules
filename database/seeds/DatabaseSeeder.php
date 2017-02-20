<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(RolesTableSeeder::class);
        //$this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MetadataTableSeeder::class);
        $this->call(LovTableSeeder::class);
        $this->call(LovValuesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(ApplicationsTableSeeder::class);
        //$this->call(ProjectsTableSeeder::class);
        //$this->call(IssueTableSeeder::class);
        //$this->call(UserFilterTableSeeder::class);
        //$this->call(CommentsTableSeeder::class);
    }
}
