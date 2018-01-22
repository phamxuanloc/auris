<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int             $id
 * @property string          $username
 * @property string          $email
 * @property string          $password_hash
 * @property string          $auth_key
 * @property int             $confirmed_at
 * @property string          $unconfirmed_email
 * @property int             $blocked_at
 * @property string          $registration_ip
 * @property int             $created_at
 * @property int             $updated_at
 * @property int             $flags
 * @property int             $role_id
 * @property int             $last_login_at
 *
 * @property Profile         $profile
 * @property SocialAccount[] $socialAccounts
 * @property Token[]         $tokens
 * @property Role            $role
 */
class User extends \navatech\role\models\User {

	public function rules() {
		$rules = parent::rules();
		// add some rules
		return $rules;
	}

	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'user';
	}

	/**
	 * @inheritdoc
	 */
	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id'                => 'ID',
			'username'          => 'Username',
			'email'             => 'Email',
			'password_hash'     => 'Password Hash',
			'auth_key'          => 'Auth Key',
			'confirmed_at'      => 'Confirmed At',
			'unconfirmed_email' => 'Unconfirmed Email',
			'blocked_at'        => 'Blocked At',
			'registration_ip'   => 'Registration Ip',
			'created_at'        => 'Created At',
			'updated_at'        => 'Updated At',
			'flags'             => 'Flags',
			'role_id'           => 'Role ID',
			'last_login_at'     => 'Last Login At',
		];
	}
}
