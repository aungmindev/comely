<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class createMigrationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:table {tableName} {columns}';

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
         try {
        $tableName = $this->argument(('tableName'));
        $columns = json_decode($this->argument(('columns')));
        $table_name = 'create_'.$tableName.'_table';
        Log::debug(gettype($columns));
        $name = Artisan::call('make:migration '.$table_name);

        $output = Artisan::output();
        Log::debug('table created');
        $migration_file_name = explode(': ' , $output);

        $migration_file_name[1] = str_replace("\n","",$migration_file_name[1].'.php');
       
        $filepath = base_path('database/migrations/'.$migration_file_name[1]);

        foreach($columns as $key => $column){
                $nullable = $column->nullable != '' ? '->nullable()' : '';
                $default  = $column->default  != '' ? '->default('.$column->default.')' : '';
                $index    = $column->index    != '' ? '->index()' : '';
                
            if($key == 0){
                $column   = '            $table->'.$column->type.'('.'"'.$column->name.'"'.')'.$nullable.$default.$index.';';
                file_put_contents($filepath, str_replace('$table->id();', '$table->id();' ."\n" .$column."\n" .'            //newline' , file_get_contents($filepath)));
            }else{
                $column   = '$table->'.$column->type.'('.'"'.$column->name.'"'.')'.$nullable.$default.$index.';';
                file_put_contents($filepath, str_replace('//newline', $column ."\n" .'            //newline' , file_get_contents($filepath)));
            }
        }
        Artisan::call('config:clear');
        Artisan::call('optimize:clear');
        Artisan::call('migrate');
        return 200;
        } catch (\Throwable $th) {
           Log::debug(json_encode($th->getMessage()));
        }//newline//newline
    }
}
