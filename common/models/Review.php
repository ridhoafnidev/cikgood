<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property integer $id_review
 * @property integer $pemesanan_id
 * @property string $isi
 * @property double $rating
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pemesanan_id', 'isi', 'rating'], 'required'],
            [['pemesanan_id'], 'integer'],
            [['isi'], 'string'],
            [['rating'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_review' => 'Id Review',
            'pemesanan_id' => 'Pemesanan ID',
            'isi' => 'Isi',
            'rating' => 'Rating',
        ];
    }
}