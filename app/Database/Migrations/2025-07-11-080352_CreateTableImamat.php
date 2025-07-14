<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateImamatTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => ['type'=>'INT',     'constraint'=>11, 'unsigned'=>true, 'auto_increment'=>true],
            'nama'             => ['type'=>'VARCHAR', 'constraint'=>100],
            'tempat_tahbisan'  => ['type'=>'VARCHAR', 'constraint'=>150],
            'tgl_tahbisan'     => ['type'=>'DATE'],
            'penahbis'         => ['type'=>'VARCHAR', 'constraint'=>100],  // Uskup penahbis
            'created_at'       => ['type'=>'DATETIME','null'=>true],
            'updated_at'       => ['type'=>'DATETIME','null'=>true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('imamat');
    }

    public function down()
    {
        $this->forge->dropTable('imamat');
    }
}