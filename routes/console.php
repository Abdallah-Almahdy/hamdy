<?php

use Illuminate\Support\Facades\Artisan;

use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\File;

// Define the db:backup command
Artisan::command('db:backup', function () {
    $backupPath = storage_path('app/backups/backup_' . now()->format('Y_m_d_H_i_s') . '.sql');

    $this->info('Database backup started...');
    // Ensure the backup directory exists
    if (!File::exists(storage_path('app/backups'))) {
        File::makeDirectory(storage_path('app/backups'), 0755, true);
    }

    exec('mysqldump -u kolYoumFinalDB -p488dzhzQKPTBMwdCO8yM -h localhost kolYoumFinalDB > ' . escapeshellarg($backupPath));

    $this->info('Database backup completed: ' . $backupPath);
})->purpose('Backup the database');

// Schedule the db:backup command to run daily at midnight
Schedule::command('db:backup')->hourly();

// Schedule another command (for example 'inspire')
Schedule::command('inspire')->hourly();
