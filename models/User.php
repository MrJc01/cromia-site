<?php

declare(strict_types=1);

namespace app\models;

use yii\base\BaseObject;
use yii\web\IdentityInterface;

class User extends BaseObject implements IdentityInterface
{
    public int|string $id = '';
    public string $username = '';
    public string $passwordHash = '';
    public string $authKey = '';
    public string $accessToken = '';
    public string $role = ''; // 'admin' or 'member'

    private static array $_users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'passwordHash' => '$2y$10$YjQh2Lvp5Ckc3JkuVhD8oOH3Y0ArG6E/3wp6zp.yWoJ8vjgxMCpSG',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
            'role' => 'admin',
        ],
        '101' => [
            'id' => '101',
            'username' => 'cromia',
            'passwordHash' => '$2y$10$MzQbg1cSY91MdWJaaz95Te2bpjRuS9nxG4/ARThg.H7nhKn2caIXy',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
            'role' => 'member',
        ],
    ];
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id): static|null
    {
        return isset(self::$_users[$id]) ? new static(self::$_users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null): static|null
    {
        foreach (self::$_users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername(string $username): static|null
    {
        foreach (self::$_users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId(): int|string
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey(): string|null
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey): bool
    {
        return $this->authKey === $authKey;
    }
}
