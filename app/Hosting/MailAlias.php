<?php

namespace App\Hosting;

use Illuminate\Database\Eloquent\Model;

class MailAlias extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql_hosting';

    /**
     * Get the tld record for this mail alias
     */
    public function tld()
    {
        return $this->belongsTo('App\Hosting\Tld');
    }

    /**
     * Get the MailAliasDestination record for this mail alias
     */
    public function destination()
    {
        return $this->belongsTo('App\Hosting\MailAliasDestination');
    }
}
