<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Notification extends Migration
{
    public function up()
    {
        // Create Tabel Notification
        $this->forge->addField([
            'notificationId' => [
                'type' => 'CHAR',
                'constraint' => 36,
            ],
            'userId' => [
                'type'       => 'CHAR',
                'constraint' => 36,
                'null' => true,
            ],
            'postId' => [
                'type'       => 'CHAR',
                'constraint' => 36,
                'null' => true,
            ],
            'contentId' => [
                'type'       => 'CHAR',
                'constraint' => 36,
                'null' => true,
            ],
            'commentId' => [
                'type'       => 'CHAR',
                'constraint' => 36,
                'null' => true,
            ],
            'subId' => [
                'type'       => 'CHAR',
                'constraint' => 36,
                'null' => true,
            ],
            'buyId' => [
                'type'       => 'CHAR',
                'constraint' => 36,
                'null' => true,
            ],
            'milestoneId' => [
                'type'       => 'CHAR',
                'constraint' => 36,
                'null' => true,
            ],
            'donateId' => [
                'type'       => 'CHAR',
                'constraint' => 36,
                'null' => true,
            ],
            'notificationType' => [
                'type'       => 'ENUM',
                'constraint' => ['buser','bpost','bcontent','bcomment','ubuser','ubpost','ubcontent','ubcomment','ndonate', 'nsubscribe', 'nbuy', 'nmilestone'],
            ],
            'notificationMessage' => [
                'type' => 'TEXT',
            ],
            'createdAt' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updatedAt' => [
                'type'    => 'TIMESTAMP',
                'null'    => true,
            ],
        ]);
        $this->forge->addPrimaryKey('notificationId');
        $this->forge->addForeignKey('userId', 'User', 'userId', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('postId', 'Post', 'postId', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('contentId', 'Content', 'contentId', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('commentId', 'Comment', 'commentId', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Notification');

        // Create Trigger Updated At
        $this->db->query("CREATE TRIGGER NotificationUpdatedAt BEFORE UPDATE ON Notification FOR EACH ROW SET NEW.updatedAt = CURRENT_TIMESTAMP");
    }

    public function down()
    {
        // Drop Tabel Notification
        $this->forge->dropTable('Notification');
    }
}
