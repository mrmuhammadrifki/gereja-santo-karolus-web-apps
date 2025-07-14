<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableJemaat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'auto_increment' => true],
            'id_kk'          => ['type' => 'INT', 'null' => false],
            'nama'           => ['type' => 'VARCHAR', 'constraint' => 100],
            'tempat_lahir'   => ['type' => 'VARCHAR', 'constraint' => 100],
            'tanggal_lahir'  => ['type' => 'DATE'],
            'jenis_kelamin'  => ['type' => 'ENUM', 'constraint' => ['L', 'P']],
            'alamat'         => ['type' => 'TEXT'],
            'telp'           => ['type' => 'VARCHAR', 'constraint' => 20],
            'pekerjaan'      => ['type' => 'VARCHAR', 'constraint' => 100],
            'rayon'          => ['type' => 'VARCHAR', 'constraint' => 100],
            'status'         => ['type' => 'VARCHAR', 'constraint' => 50],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
            'updated_at'     => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_kk', 'data_kk', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('jemaat');
    }

    public function down()
    {
        $this->forge->dropTable('jemaat');
    }
}   