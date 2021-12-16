<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 9,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'password_hash' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'unique' => true,
            ],
            'gender' => [
                'type' => 'ENUM',
                'constraint' => ['male', 'female', 'unknown'],
                'default' => 'unknown',
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'image_url' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'university' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'major' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'linkedin_account' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'linkedin_url' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'github_account' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'whatsapp_account' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP'
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
