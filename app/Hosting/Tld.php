<?php

namespace App\Hosting;

use Illuminate\Database\Eloquent\Model;

class Tld extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql_hosting';
}
