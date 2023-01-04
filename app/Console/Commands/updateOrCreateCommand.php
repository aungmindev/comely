<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class updateOrCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:updateorcreate {tableName} {updateColumnName} {updateColumnValue}  {data}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $table = $this->argument(('tableName'));
        $updateColumnName = $this->argument(('updateColumnName'));
        $updateColumnValue = $this->argument(('updateColumnValue'));
        $data = json_decode($this->argument(('data')) , true);
            DB::table($table)->updateOrInsert([
                $updateColumnName => $updateColumnValue
            ],
            $data
        );//newline
    }
}
