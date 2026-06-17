<?php

declare(strict_types=1);

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "project_service".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $type
 * @property string $status
 * @property string $description
 * @property string $icon_emoji
 * @property string $link_url
 * @property int $created_at
 * @property int $updated_at
 */
class ProjectService extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%project_service}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['name', 'slug', 'type', 'status'], 'required'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'slug', 'link_url'], 'string', 'max' => 255],
            [['type', 'status'], 'string', 'max' => 30],
            [['icon_emoji'], 'string', 'max' => 20],
            [['slug'], 'unique'],
        ];
    }

    /**
     * @return bool
     */
    public function beforeValidate(): bool
    {
        if (parent::beforeValidate()) {
            if (empty($this->slug) && !empty($this->name)) {
                $this->slug = \yii\helpers\Inflector::slug($this->name);
            }
            return true;
        }
        return false;
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert): bool
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->created_at = time();
            }
            $this->updated_at = time();
            return true;
        }
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Nome',
            'slug' => 'Slug',
            'type' => 'Tipo',
            'status' => 'Status',
            'description' => 'Descrição',
            'icon_emoji' => 'Emoji',
            'link_url' => 'URL Link',
            'created_at' => 'Criado Em',
            'updated_at' => 'Atualizado Em',
        ];
    }
}
