<?php

use Illuminate\Database\Seeder;

class MetadataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $metadata = [
            [
                "type"          => "label",
                "key"           => "APP_NAME",
                "value"         => "Laravel Issue Tracker",
                "description"   => "-"
            ],
            [
                "type"          => "setting",
                "key"           => "ATTACHMENT_PATH",
                "value"         => "/data/attachments/",
                "description"   => "This folder stores the issue attachments"
            ],
            [
                "type"          => "setting",
                "key"           => "ATTACHMENT_MAX_SIZE",
                "value"         => "100",
                "description"   => "This settings for the max file size."
            ],
            [
                "type"          => "setting",
                "key"           => "ATTACHMENT_WIDTH",
                "value"         => "200",
                "description"   => "This setting stores the width of the images for the crop."
            ],
            [
                "type"          => "setting",
                "key"           => "ATTACHMENT_HEIGHT",
                "value"         => "200",
                "description"   => "This setting stores the height of the images for the crop."
            ]
        ];


        DB::table('metadata')->insert($metadata);
    }
}
