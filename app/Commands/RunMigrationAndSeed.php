<?php
namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class RunMigrationAndSeed extends BaseCommand
{
    protected $group       = 'custom';
    protected $name        = 'run:migration-seed';
    protected $description = 'Run migration and seeder';

    public function run(array $params)
    {
        // Menjalankan migration
        $migrateStatus = $this->migrateDatabase();
        if ($migrateStatus === false) {
            CLI::error('Migration failed.');
            return;
        }

        // Menjalankan seeder
        $seedStatus = $this->seedDatabase();
        if ($seedStatus === false) {
            CLI::error('Seeder failed.');
            return;
        }

        CLI::write('Migration and seeder run successfully.');
    }

    protected function migrateDatabase()
    {
        $migrate = \Config\Services::migrations();
        try {
            $migrate->regress(0);
            $migrate->latest();
            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }


    protected function seedDatabase()
    {
        $seeder = \Config\Database::seeder();
        try {
            $seeder->call('GroupSeeder');
            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }
}
