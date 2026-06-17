<?php

declare(strict_types=1);

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password_hash
 * @property string|null $email
 * @property string $role
 * @property string|null $bio_description
 * @property string|null $auth_key
 * @property string|null $access_token
 * @property int $created_at
 * @property int $updated_at
 */
class User extends ActiveRecord implements IdentityInterface
{
    public ?string $new_password = null;
    public ?string $confirm_password = null;

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['username'], 'required'],
            [['username'], 'unique'],
            [['email'], 'email'],
            [['email'], 'unique'],
            [['bio_description'], 'string'],
            [['role'], 'string', 'max' => 30],
            [['new_password', 'confirm_password'], 'string', 'min' => 4],
            ['confirm_password', 'compare', 'compareAttribute' => 'new_password', 'message' => 'As senhas não coincidem.'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'username' => 'Usuário',
            'email' => 'E-mail',
            'role' => 'Função',
            'bio_description' => 'Biografia / Descrição',
            'new_password' => 'Nova Senha',
            'confirm_password' => 'Confirmar Nova Senha',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function beforeSave($insert): bool
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->created_at = time();
                if (empty($this->auth_key)) {
                    $this->auth_key = Yii::$app->security->generateRandomString();
                }
            }
            $this->updated_at = time();

            if (!empty($this->new_password)) {
                $this->password_hash = Yii::$app->security->generatePasswordHash($this->new_password);
            }
            return true;
        }
        return false;
    }

    // Compatibility getters for LoginForm and other legacy code
    public function getPasswordHash(): string
    {
        return $this->password_hash;
    }

    public function getAuthKey(): string|null
    {
        return $this->auth_key;
    }

    public function getAccessToken(): string|null
    {
        return $this->access_token;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id): static|null
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null): static|null
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername(string $username): static|null
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId(): string|int|null
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey): bool
    {
        return $this->auth_key === $authKey;
    }
}
