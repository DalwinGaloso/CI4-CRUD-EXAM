<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class DebugApi extends BaseCommand
{
    protected $group       = 'custom';
    protected $name        = 'api:debug';
    protected $description = 'Debug roles and users for API';

    public function run(array $params)
    {
        $db = db_connect();

        CLI::write('=== ROLES TABLE ===', 'yellow');
        $roles = $db->table('roles')->get()->getResultArray();
        foreach ($roles as $r) {
            CLI::write(json_encode($r));
        }

        CLI::write('=== USERS WITH ROLES ===', 'yellow');
        $users = $db->table('users u')
            ->select('u.id, u.fullname, u.username, u.role_id, r.name AS role_name')
            ->join('roles r', 'r.id = u.role_id', 'left')
            ->get()->getResultArray();
        foreach ($users as $u) {
            CLI::write(json_encode($u));
        }
    }
}
