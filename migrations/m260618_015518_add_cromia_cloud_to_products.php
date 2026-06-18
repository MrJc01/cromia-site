<?php

use yii\db\Migration;

class m260618_015518_add_cromia_cloud_to_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('project_service', [
            'title' => 'CromIA Cloud',
            'slug' => 'cromia-cloud',
            'category' => 'product',
            'status' => 'beta',
            'description' => 'A plataforma em nuvem oficial para carteira unificada (PIX e Cartão), gerenciamento de chaves mestras e roteamento seguro para seus agentes locais.',
            'icon' => '☁️',
            'link' => 'https://cloud.ia.crom.run/',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('project_service', ['slug' => 'cromia-cloud']);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m260618_015518_add_cromia_cloud_to_products cannot be reverted.\n";

        return false;
    }
    */
}
