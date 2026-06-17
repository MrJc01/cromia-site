<?php

use yii\db\Migration;

class m260617_184440_create_user_table_and_add_author extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // 1. Create User table
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'password_hash' => $this->string()->notNull(),
            'email' => $this->string()->unique(),
            'role' => $this->string(30)->notNull()->defaultValue('member'),
            'bio_description' => $this->text(),
            'auth_key' => $this->string(32),
            'access_token' => $this->string(100),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // 2. Insert Default Users
        $time = time();
        $this->insert('{{%user}}', [
            'id' => 100,
            'username' => 'admin',
            'password_hash' => '$2y$10$YjQh2Lvp5Ckc3JkuVhD8oOH3Y0ArG6E/3wp6zp.yWoJ8vjgxMCpSG',
            'email' => 'admin@cromia.run',
            'role' => 'admin',
            'bio_description' => 'Administrador Geral do Portal CromIA. Engenheiro de prompt e Swarms autônomos.',
            'auth_key' => 'test100key',
            'access_token' => '100-token',
            'created_at' => $time,
            'updated_at' => $time,
        ]);

        $this->insert('{{%user}}', [
            'id' => 101,
            'username' => 'cromia',
            'password_hash' => '$2y$10$MzQbg1cSY91MdWJaaz95Te2bpjRuS9nxG4/ARThg.H7nhKn2caIXy',
            'email' => 'pesquisa@cromia.run',
            'role' => 'member',
            'bio_description' => 'Pesquisador e Engenheiro de Software da divisão CromIA Core.',
            'auth_key' => 'test101key',
            'access_token' => '101-token',
            'created_at' => $time,
            'updated_at' => $time,
        ]);

        // 3. Add author_id to Article table
        $this->addColumn('{{%article}}', 'author_id', $this->integer()->defaultValue(100));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%article}}', 'author_id');
        $this->dropTable('{{%user}}');
    }
}
