<?php

use Illuminate\Database\Seeder;
use LaravelIssueTracker\ListOfValues\Models\ListOfValues;

class LovValuesTableSeeder extends Seeder {

    /**
     * @var array
     */
    protected $_lovValues = [
        [
            "lov_id"    => "User List",
            "key"   => "action",
            "value" => "Action",
        ],
        [
            "lov_id"    => "SQL",
            "key"   => "and",
            "value" => "AND",
        ],
        [
            "lov_id"    => "SQL",
            "key"   => "or",
            "value" => "OR",
        ],
        [
            "lov_id"    => "SQL",
            "key"   => "in",
            "value" => "IN",
        ],
        [
            "lov_id"    => "SQL",
            "key"   => "not in",
            "value" => "NOT IN",
        ],
        [
            "lov_id"    => "SQL",
            "key"   => "not",
            "value" => "NOT",
        ],
        [
            "lov_id"    => "Operations",
            "key"   => "=",
            "value" => "=",
        ],
        [
            "lov_id"    => "Operations",
            "key"   => "<",
            "value" => "<",
        ],
        [
            "lov_id"    => "Operations",
            "key"   => ">",
            "value" => ">",
        ],
        [
            "lov_id"    => "Operations",
            "key"   => "<=",
            "value" => "<=",
        ],
        [
            "lov_id"    => "Operations",
            "key"   => ">=",
            "value" => ">=",
        ],
        [
            "lov_id"    => "Operations",
            "key"   => "in",
            "value" => "IN",
        ],
        [
            "lov_id"    => "Operations",
            "key"   => "!=",
            "value" => "!=",
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->_lovValues as $lovValue)
        {
            $lovValue["list_of_values_id"] = ListOfValues::where("name", $lovValue["lov_id"])->first()->id;
            unset($lovValue['lov_id']);
            DB::table('list_of_values_lookups')->insert($lovValue);
        }
    }
}
