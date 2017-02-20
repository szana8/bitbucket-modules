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
            "lov_key"   => "action",
            "lov_value" => "Action",
        ],
        [
            "lov_id"    => "SQL",
            "lov_key"   => "and",
            "lov_value" => "AND",
        ],
        [
            "lov_id"    => "SQL",
            "lov_key"   => "or",
            "lov_value" => "OR",
        ],
        [
            "lov_id"    => "SQL",
            "lov_key"   => "in",
            "lov_value" => "IN",
        ],
        [
            "lov_id"    => "SQL",
            "lov_key"   => "not in",
            "lov_value" => "NOT IN",
        ],
        [
            "lov_id"    => "SQL",
            "lov_key"   => "not",
            "lov_value" => "NOT",
        ],
        [
            "lov_id"    => "Operations",
            "lov_key"   => "=",
            "lov_value" => "=",
        ],
        [
            "lov_id"    => "Operations",
            "lov_key"   => "<",
            "lov_value" => "<",
        ],
        [
            "lov_id"    => "Operations",
            "lov_key"   => ">",
            "lov_value" => ">",
        ],
        [
            "lov_id"    => "Operations",
            "lov_key"   => "<=",
            "lov_value" => "<=",
        ],
        [
            "lov_id"    => "Operations",
            "lov_key"   => ">=",
            "lov_value" => ">=",
        ],
        [
            "lov_id"    => "Operations",
            "lov_key"   => "in",
            "lov_value" => "IN",
        ],
        [
            "lov_id"    => "Operations",
            "lov_key"   => "!=",
            "lov_value" => "!=",
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
            $lovValue["list_of_values_id"] = ListOfValues::where("lov_name", $lovValue["lov_id"])->first()->id;
            unset($lovValue['lov_id']);
            DB::table('list_of_values_lookups')->insert($lovValue);
        }
    }
}
