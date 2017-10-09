<?php

namespace App\Hosting;

use Illuminate\Database\Eloquent\Model;

class MailAliasDestination extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql_hosting';

    /**
     * Get the MailAlias records for this mail alias destination
     */
    public function mailAliases()
    {
        return $this->hasMany('App\Hosting\MailAlias');
    }
}
