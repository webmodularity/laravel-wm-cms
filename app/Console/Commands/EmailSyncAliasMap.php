<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
use App\Hosting\MailAlias;

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
        Log::info('STARTING SYNC >>>>>>>>>>');
        $aliases = MailAlias::with(['destination', 'tld'])->get();
        foreach ($aliases as $alias) {
            echo $alias->user . '@' . $alias->tld->name . " -> " . $alias->destination->destination . "\n";
        }
        Log::info('ENDING SYNC >>>>>>>>>>');
    }
}
