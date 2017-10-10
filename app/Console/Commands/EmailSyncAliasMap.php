<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
use App\Hosting\MailAlias;
use Storage;

class EmailSyncAliasMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wm:sync-alias-map';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Build and save to S3 bucket an email alias map using data stored in MySQL hosting DB.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $putAlias = Storage::disk('s3')->put('_alias_map.json', json_encode($this->getAliasMap()));
    }

    protected function getAliasMap()
    {
        $aliases = MailAlias::with(['destination', 'tld'])->get();
        $aliasMap = [];
        foreach ($aliases as $alias) {
            $fullEmail = $alias->user . '@' . $alias->tld->name;
            if (array_key_exists($fullEmail, $aliasMap)) {
                array_push($aliasMap[$fullEmail], $alias->destination->destination);
            } else {
                $aliasMap[$fullEmail] = [$alias->destination->destination];
            }
        }
        return $aliasMap;
    }
}
