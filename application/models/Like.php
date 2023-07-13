<?php

namespace app\models;

use app\managers\LikeManager;
use app\models\query\LikeQuery;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * @author Alexander Kononenko <contact@hauntd.me>
 * @package app\models
 * @property int $id
 * @property int $from_user_id
 * @property int $to_user_id
 * @property int $created_at
 * @property int $is_read
 *
 * @property User $fromUser
 * @property User $toUser
 */
class Like extends \app\base\ActiveRecord
{
    /**
     * @inheritdoc
     * @return LikeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LikeQuery(get_called_class());
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%like}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from_user_id', 'to_user_id'], 'required'],
            [['from_user_id', 'to_user_id', 'created_at'], 'integer'],
            [
                ['from_user_id'], 'exist', 'skipOnError' => true,
                'targetClass' => User::class,
                'targetAttribute' => ['from_user_id' => 'id']
            ],
            [
                ['to_user_id'], 'exist', 'skipOnError' => true,
                'targetClass' => User::class,
                'targetAttribute' => ['to_user_id' => 'id']
            ],
            [['from_user_id', 'to_user_id'], 'unique', 'targetAttribute' => ['from_user_id', 'to_user_id']],
            [['is_read'], 'integer'],
        ];
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'updatedAtAttribute' => false,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from_user_id' => Yii::t('app', 'From User'),
            'to_user_id' => Yii::t('app', 'To User'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFromUser()
    {
        return $this->hasOne(User::class, ['id' => 'from_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getToUser()
    {
        return $this->hasOne(User::class, ['id' => 'to_user_id']);
    }


    public static function readLikes($type, $id)
    {
        $query = "update `like` ";
        switch ($type) {
            case LikeManager::TYPE_TO_CURRENT_USER:
                $query .= "set is_read=1 where to_user_id = {$id} and is_read=0";
                break;
            // case 'mutual':
            //     $query.="inner join `like` as likeMutual on likeMutual.from_user_id = l.to_user_id and l.is_read=0 ";
            //     $query.="set l.is_read=1 ";
            //     $query.="where likeMutual.to_user_id={$id} and l.from_user_id={$id}";
            //     break;
            default:
                return 'default';
                break;
        }
        // return $query;
        return Yii::$app->db->createCommand($query)->execute();
    }

}
