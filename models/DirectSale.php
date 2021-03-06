<?php

namespace app\models;

use app\components\Model;
use Yii;

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
class DirectSale extends Model {

	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'user';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[
				[
					'username',
					'email',
					'password_hash',
//					'auth_key',
//					'created_at',
//					'updated_at',
				],
				'required',
			],
			[
				[
					'confirmed_at',
					'blocked_at',
					'created_at',
					'updated_at',
					'flags',
					'role_id',
					'last_login_at',
				],
				'integer',
			],
			[
				[
					'username',
					'email',
					'unconfirmed_email',
				],
				'string',
				'max' => 255,
			],
			[
				['password_hash'],
				'string',
				'max' => 60,
			],
			[
				['auth_key'],
				'string',
				'max' => 32,
			],
			[
				['registration_ip'],
				'string',
				'max' => 45,
			],
			[
				['username'],
				'unique',
			],
			[
				['email'],
				'unique',
			],
			//            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['role_id' => 'id']],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'id'                => 'ID',
			'username'          => 'Username',
			'email'             => 'Email',
			'password_hash'     => 'Password',
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

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getProfile() {
		return $this->hasOne(Profile::className(), ['user_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getSocialAccounts() {
		return $this->hasMany(SocialAccount::className(), ['user_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getTokens() {
		return $this->hasMany(Token::className(), ['user_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getRole() {
		return $this->hasOne(Role::className(), ['id' => 'role_id']);
	}
}
