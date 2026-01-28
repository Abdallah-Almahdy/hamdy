<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Carbon\Carbon;

class DatabaseBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a backup of the database';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // Get the database connection details from your config
        $database = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $host = env('DB_HOST', '127.0.0.1');

        // Set the backup file name with current date
        $fileName = "backup_" . Carbon::now()->format('Y_m_d_H_i_s') . ".sql";
        $filePath = storage_path('app/backups/' . $fileName);  // Store the backup in the storage folder

        // Create the backup using mysqldump
        $command = "mysqldump -u $username -p$password -h $host $database > $filePath";

        // Execute the command
        exec($command, $output, $returnVar);

        if ($returnVar === 0) {
            $this->info('Database backup successful: ' . $fileName);
        } else {
            $this->error('Database backup failed.');
        }
    }
}
