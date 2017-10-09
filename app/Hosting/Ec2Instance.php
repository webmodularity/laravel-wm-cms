<?php

namespace App\Hosting;

use Illuminate\Database\Eloquent\Model;

class Ec2Instance extends Model
{
    public $timestamps = false;

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql_hosting';
}
