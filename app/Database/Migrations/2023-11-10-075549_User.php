<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        // Create Tabel User
        $this->forge->addField([
            'userId' => [
                'type' => 'CHAR',
                'constraint' => 36,
            ],
            'userName' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'userFullName' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'userEmail' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'userPassword' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'userStatus' => [
                'type' => 'INT',
                'constraint' => 2,
                'default' => 1,
            ],
        ]);
        $this->forge->addPrimaryKey('userId');
        $this->forge->createTable('User');
    }

    public function down()
    {
        // Drop Tabel User
        $this->forge->dropTable('User');
    }
}
