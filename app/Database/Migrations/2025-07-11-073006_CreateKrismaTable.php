<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKrismaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type'=>'INT',    'constraint'=>11, 'unsigned'=>true, 'auto_increment'=>true],
            'nama'           => ['type'=>'VARCHAR','constraint'=>100],
            'tempat_krisma'  => ['type'=>'VARCHAR','constraint'=>150],
            'tgl_krisma'     => ['type'=>'DATE'],
            'ortu'           => ['type'=>'VARCHAR','constraint'=>100],
            'wali'           => ['type'=>'VARCHAR','constraint'=>100],
            'petugas'        => ['type'=>'VARCHAR','constraint'=>100],
            'paroki_asal'    => ['type'=>'VARCHAR','constraint'=>150],
            'created_at'     => ['type'=>'DATETIME','null'=>true],
            'updated_at'     => ['type'=>'DATETIME','null'=>true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('krisma');
    }

    public function down()
    {
        $this->forge->dropTable('krisma');
    }
}