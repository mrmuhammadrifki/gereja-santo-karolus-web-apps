<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePerkawinanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                  => ['type'=>'INT',     'constraint'=>11, 'unsigned'=>true, 'auto_increment'=>true],
            'nama_pria'           => ['type'=>'VARCHAR','constraint'=>100],
            'tempat_lhr_pria'     => ['type'=>'VARCHAR','constraint'=>100],
            'tgl_lhr_pria'        => ['type'=>'DATE'],
            'paroki_pria'         => ['type'=>'VARCHAR','constraint'=>150],
            'ortu_pria'           => ['type'=>'VARCHAR','constraint'=>150],

            'nama_wanita'         => ['type'=>'VARCHAR','constraint'=>100],
            'tempat_lhr_wanita'   => ['type'=>'VARCHAR','constraint'=>100],
            'tgl_lhr_wanita'      => ['type'=>'DATE'],
            'paroki_wanita'       => ['type'=>'VARCHAR','constraint'=>150],
            'ortu_wanita'         => ['type'=>'VARCHAR','constraint'=>150],

            'tempat_nikah'        => ['type'=>'VARCHAR','constraint'=>150],
            'tgl_nikah'           => ['type'=>'DATE'],
            'petugas'             => ['type'=>'VARCHAR','constraint'=>100],
            'status_pria'         => ['type'=>'VARCHAR','constraint'=>50],
            'status_wanita'       => ['type'=>'VARCHAR','constraint'=>50],
            'saksi'               => ['type'=>'VARCHAR','constraint'=>255],

            'created_at'          => ['type'=>'DATETIME','null'=>true],
            'updated_at'          => ['type'=>'DATETIME','null'=>true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('perkawinan');
    }

    public function down()
    {
        $this->forge->dropTable('perkawinan');
    }
}