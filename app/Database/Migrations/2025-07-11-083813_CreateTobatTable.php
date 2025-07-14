<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTobatTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type'=>'INT',     'constraint'=>11, 'unsigned'=>true, 'auto_increment'=>true],
            'nama'           => ['type'=>'VARCHAR', 'constraint'=>100],
            'tempat_tobat'   => ['type'=>'VARCHAR', 'constraint'=>150],
            'tgl_tobat'      => ['type'=>'DATE'],
            'paroki_asal'    => ['type'=>'VARCHAR', 'constraint'=>150],
            'created_at'     => ['type'=>'DATETIME', 'null'=>true],
            'updated_at'     => ['type'=>'DATETIME', 'null'=>true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tobat');
    }

    public function down()
    {
        $this->forge->dropTable('tobat');
    }
}