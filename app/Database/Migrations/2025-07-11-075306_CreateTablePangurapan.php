<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengurapanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'              => ['type'=>'INT',    'constraint'=>11, 'unsigned'=>true, 'auto_increment'=>true],
            'nama'            => ['type'=>'VARCHAR','constraint'=>100],
            'umur'            => ['type'=>'INT',    'constraint'=>3],
            'alamat'          => ['type'=>'VARCHAR','constraint'=>255],
            'tgl_pengurapan'  => ['type'=>'DATE'],
            'petugas'         => ['type'=>'VARCHAR','constraint'=>100],
            'kondisi'         => ['type'=>'VARCHAR','constraint'=>255],
            'created_at'      => ['type'=>'DATETIME','null'=>true],
            'updated_at'      => ['type'=>'DATETIME','null'=>true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pengurapan');
    }

    public function down()
    {   
        $this->forge->dropTable('pengurapan');
    }
}