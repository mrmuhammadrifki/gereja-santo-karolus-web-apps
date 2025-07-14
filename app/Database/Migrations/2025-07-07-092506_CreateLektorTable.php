<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLektorTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'           => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama'         => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'ttl'          => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'jenis_kelamin'=> [
                'type'       => 'ENUM',
                'constraint' => ['L','P'],
                'default'    => 'L',
            ],
            'status'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'tahun_masuk'  => [
                'type'       => 'YEAR',
                'null'       => false,
            ],
            'created_at'   => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at'   => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('lektor');
    }

    public function down()
    {
        $this->forge->dropTable('lektor');
    }
}