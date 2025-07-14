<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKeuanganTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'jenis'       => [
                'type'       => 'ENUM',
                'constraint' => ['pemasukan','pengeluaran'],
            ],
            'harga'       => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'default'    => 0,
            ],
            'kategori'    => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'keterangan'  => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at'  => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at'  => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('keuangan');
    }

    public function down()
    {
        $this->forge->dropTable('keuangan');
    }
}