<?php
namespace LaravelIssueTracker\Metadata\Models;

/**
 * Git location: $Id$
 * Package: dao DAO
 *
 * Description: This class for the Metadata DAO.
 *
 * Modification History
 * Version  Date          Author                 Description
 * -------  ------------  ---------------------  --------------------------------
 * 1.0      29-AUG-16     Istvan Szana           Created
 */

use Illuminate\Database\Eloquent\Model;

class Metadata extends Model {

    /**
     * @var string
     */
    protected $table = "metadata";

    /**
     * @var array
     */
    protected $fillable = [
        "type",
        "key",
        "value",
        "description",
        "enabled"
    ];

}