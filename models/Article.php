<?php

declare(strict_types=1);

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $summary
 * @property string $content
 * @property string $author_group
 * @property int $created_at
 * @property int $updated_at
 */
class Article extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%article}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['title', 'slug', 'content', 'author_group'], 'required'],
            [['summary', 'content'], 'string'],
            [['created_at', 'updated_at', 'author_id'], 'integer'],
            [['title', 'slug', 'author_group'], 'string', 'max' => 255],
            [['slug'], 'unique'],
        ];
    }

    /**
     * @return bool
     */
    public function beforeValidate(): bool
    {
        if (parent::beforeValidate()) {
            if (empty($this->slug) && !empty($this->title)) {
                $this->slug = \yii\helpers\Inflector::slug($this->title);
            }
            if (empty($this->author_id) && !Yii::$app->user->isGuest) {
                $this->author_id = (int)Yii::$app->user->id;
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
            'title' => 'Título',
            'slug' => 'Slug',
            'summary' => 'Resumo',
            'content' => 'Conteúdo',
            'author_group' => 'Grupo Autor',
            'created_at' => 'Criado Em',
            'updated_at' => 'Atualizado Em',
            'author_id' => 'Autor ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::class, ['id' => 'author_id']);
    }
}
