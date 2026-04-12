<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class DebugToken extends BaseCommand
{
    protected $group       = 'custom';
    protected $name        = 'api:debug-token';
    protected $description = 'Debug latest API token and user role';

    public function run(array $params)
    {
        $db = db_connect();

        CLI::write('=== LATEST TOKENS ===', 'yellow');
        $tokens = $db->table('api_tokens t')
            ->select('t.token, t.expires_at, u.fullname, u.username, r.name AS role_name')
            ->join('users u', 'u.id = t.user_id')
            ->join('roles r', 'r.id = u.role_id', 'left')
            ->orderBy('t.id', 'DESC')
            ->limit(5)
            ->get()->getResultArray();

        foreach ($tokens as $t) {
            CLI::write(json_encode($t));
        }
    }
}
