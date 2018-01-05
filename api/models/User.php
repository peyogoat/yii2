<?php

namespace api\models;

use Yii;
use yii\db\ActiveRecord;

//this is for auth and time
use yii\web\IdentityInterface;
use yii\filters\RateLimitInterface;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class User extends ActiveRecord implements IdentityInterface, RateLimitInterface
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'user';
	}




	// 返回在单位时间内允许的请求的最大数目，例如，[10, 60] 表示在60秒内最多请求10次。
	public function getRateLimit($request, $action)
	{
		return [5, 10];
	}
	// 返回剩余的允许的请求数。
	public function loadAllowance($request, $action)
	{
		return [$this->allowance, $this->allowance_updated_at];
	}
	// 保存请求时的UNIX时间戳。
	public function saveAllowance($request, $action, $allowance, $timestamp)
	{
		$this->allowance = $allowance;
		$this->allowance_updated_at = $timestamp;
		$this->save();
	}

	    /** INCLUDE USER LOGIN VALIDATION FUNCTIONS**/
        /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
	public static function findIdentityByAccessToken($token, $type = null)
	{
		//throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
		//findIdentityByAccessToken()方法的实现是系统定义的
		//例如，一个简单的场景，当每个用户只有一个access token, 可存储access token 到user表的access_token列中， 方法可在User类中简单实现，如下所示：
		return static::findOne(['access_token' => $token]);
	}




	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at','access_token',"allowance","allowance_updated_at"], 'required'],
			[['status', 'created_at', 'updated_at','allowance','allowance_updated_at'], 'integer'],
			[['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
			[['access_token'], 'string', 'max' => 50],
			[['auth_key'], 'string', 'max' => 32],
//			[['username'], 'unique'],
//			[['email'], 'unique'],
//			[['access_token','unique']],
//			[['password_reset_token'], 'unique'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'username' => 'Username',
			'auth_key' => 'Auth Key',
			'password_hash' => 'Password Hash',
			'password_reset_token' => 'Password Reset Token',
			'email' => 'Email',
			'status' => 'Status',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'access_token' => 'Access Token',
			'allowance' => 'Allowance',
			'allowance_updated_at' => 'Allowance Updated At',
		];
	}


//    /**
//     * Finds user by username
//     *
//     * @param  string      $username
//     * @return static|null
//     */
//    public static function findByUsername($username)
//    {
//        return static::findOne(['username' => $username]);
//    }
//
//    /**
//     * Finds user by password reset token
//     *
//     * @param  string      $token password reset token
//     * @return static|null
//     */
//    public static function findByPasswordResetToken($token)
//    {
//        $expire = \Yii::$app->params['user.passwordResetTokenExpire'];
//        $parts = explode('_', $token);
//        $timestamp = (int) end($parts);
//        if ($timestamp + $expire < time()) {
//            // token expired
//            return null;
//        }
//
//        return static::findOne([
//            'password_reset_token' => $token
//        ]);
//    }
//
//    /**
//     * @inheritdoc
//     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }
//
//    /**
//     * @inheritdoc
//     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }
//
//    /**
//     * @inheritdoc
//     */
    public function validateAuthKey($authKey)
    {
       // return $this->getAuthKey() === $authKey;
    }
//
//    /**
//     * Validates password
//     *
//     * @param  string  $password password to validate
//     * @return boolean if password provided is valid for current user
//     */
//    public function validatePassword($password)
//    {
//        return $this->password === sha1($password);
//    }
//
//    /**
//     * Generates password hash from password and sets it to the model
//     *
//     * @param string $password
//     */
//    public function setPassword($password)
//    {
//        $this->password_hash = Security::generatePasswordHash($password);
//    }
//
//    /**
//     * Generates "remember me" authentication key
//     */
//    public function generateAuthKey()
//    {
//        $this->auth_key = Security::generateRandomKey();
//    }
//
//    /**
//     * Generates new password reset token
//     */
//    public function generatePasswordResetToken()
//    {
//        $this->password_reset_token = Security::generateRandomKey() . '_' . time();
//    }
//
//    /**
//     * Removes password reset token
//     */
//    public function removePasswordResetToken()
//    {
//        $this->password_reset_token = null;
//    }
    /** EXTENSION MOVIE **/
}
