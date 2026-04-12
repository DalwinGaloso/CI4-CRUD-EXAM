<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class GenerateAdminToken extends BaseCommand
{
    protected $group       = 'custom';
    protected $name        = 'api:admin-token';
    protected $description = 'Generate a token for admin@school.edu';

    public function run(array $params)
    {
        $db   = db_connect();
        $user = $db->table('users u')
            ->select('u.id, u.fullname, u.username, r.name AS role_name')
            ->join('roles r', 'r.id = u.role_id', 'left')
            ->where('u.username', 'admin@school.edu')
            ->get()->getRowArray();

        if (! $user) {
            CLI::write('admin@school.edu not found!', 'red');
            return;
        }

        $token     = bin2hex(random_bytes(32));
        $expiresAt = date('Y-m-d H:i:s', time() + 86400);

        $db->table('api_tokens')->insert([
            'user_id'    => $user['id'],
            'token'      => $token,
            'expires_at' => $expiresAt,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        CLI::write('=== USE THIS TOKEN IN POSTMAN ===', 'green');
        CLI::write('User: ' . $user['fullname'] . ' (' . $user['role_name'] . ')', 'yellow');
        CLI::write('Token: ' . $token, 'green');
        CLI::write('Expires: ' . $expiresAt, 'yellow');
    }
}
