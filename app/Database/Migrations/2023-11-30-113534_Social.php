<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Social extends Migration
{
    public function up()
    {
        // Create Tabel Social
        $this->forge->addField([
            'socialId' => [
                'type' => 'CHAR',
                'constraint' => 36,
            ],
            'creatorId' => [
                'type' => 'CHAR',
                'constraint' => 36,
            ],
            'socialMedia' => [
                'type' => 'ENUM',
                'constraint' => ['facebook', 'twitter', 'instagram', 'tiktok', 'youtube', 'twitch', 'discord', 'website'],
            ],
            'socialLink' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'createdAt' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updatedAt' => [
                'type'    => 'TIMESTAMP',
                'null'    => true,
            ],
        ]);
        $this->forge->addPrimaryKey('socialId');
        $this->forge->addForeignKey('creatorId', 'Creator', 'creatorId', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Social');

        // Create Trigger Updated At
        $this->db->query("CREATE TRIGGER SocialUpdatedAt BEFORE UPDATE ON Social FOR EACH ROW SET NEW.updatedAt = CURRENT_TIMESTAMP");
    }

    public function down()
    {
        // Drop Tabel Social
        $this->forge->dropTable('Social');
    }
}
