<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterLektorAddTempatTanggal extends Migration
{
    public function up()
    {
        // Tambah kolom tempat_lahir & tanggal_lahir
        $this->forge->addColumn('lektor', [
            'tempat_lahir' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'after'      => 'nama',
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
                'after'=> 'tempat_lahir',
            ],
        ]);

        // Hapus kolom ttl
        $this->forge->dropColumn('lektor', 'ttl');
    }

    public function down()
    {
        // Kembalikan kolom ttl
        $this->forge->addColumn('lektor', [
            'ttl' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'after'      => 'nama',
            ],
        ]);

        // Hapus kolom tempat_lahir & tanggal_lahir
        $this->forge->dropColumn('lektor', ['tempat_lahir', 'tanggal_lahir']);
    }
}