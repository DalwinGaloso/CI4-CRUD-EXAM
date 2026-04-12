<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class CreateApiTokensTable extends BaseCommand
{
    protected $group       = 'custom';
    protected $name        = 'api:create-tokens-table';
    protected $description = 'Creates the api_tokens table';

    public function run(array $params)
    {
        $db = db_connect();

        $db->query("CREATE TABLE IF NOT EXISTS api_tokens (
            id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            user_id INT(11) UNSIGNED NOT NULL,
            token VARCHAR(64) NOT NULL UNIQUE,
            expires_at DATETIME NULL,
            created_at DATETIME NULL,
            PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        CLI::write('api_tokens table created successfully.', 'green');

        // Mark pending migrations as run to prevent re-execution errors
        $batch = $db->table('migrations')->selectMax('batch')->get()->getRowArray()['batch'] ?? 1;
        $toMark = [
            ['version' => '2024-01-01-000001', 'class' => 'App\Database\Migrations\CreateRolesTable'],
            ['version' => '2024-01-01-000002', 'class' => 'App\Database\Migrations\AddRoleIdToUsers'],
            ['version' => '2026-02-25-000001', 'class' => 'App\Database\Migrations\AddUpdatedAtToStudents'],
            ['version' => '2026-03-20-000001', 'class' => 'App\Database\Migrations\ApiTokens'],
        ];
        foreach ($toMark as $m) {
            $exists = $db->table('migrations')->where('version', $m['version'])->countAllResults();
            if (! $exists) {
                $db->table('migrations')->insert([
                    'version'   => $m['version'],
                    'class'     => $m['class'],
                    'group'     => 'default',
                    'namespace' => 'App',
                    'time'      => time(),
                    'batch'     => $batch,
                ]);
            }
        }
        CLI::write('Migration records updated.', 'green');
    }
}
