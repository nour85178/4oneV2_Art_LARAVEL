<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class dbcreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $schemaName = $this->argument('name') ?: config("database.connections.mysql.database");

$charset = config("database.connections.mysql.charset",'utf8mb4');

$collation = config("database.connections.mysql.collation",'utf8mb4_unicode_ci');

config(["database.connections.mysql.database" => null]);

$query = "CREATE DATABASE IF NOT EXISTS $schemaName CHARACTER SET $charset COLLATE $collation;";

DB::statement($query);

config(["database.connections.mysql.database" => $schemaName]);

}
    }

