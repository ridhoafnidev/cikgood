<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "data_matpel".
 *
 * @property integer $id_matpel
 * @property string $tingkatan
 * @property string $matpel
 * @property integer $matpel_detail
 */
class DataMatpel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_matpel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tingkatan', 'matpel'], 'required'],
            [['matpel_detail'], 'string', 'max' => 50],
            [['tingkatan', 'matpel'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_matpel' => 'Id Matpel',
            'tingkatan' => 'Tingkatan',
            'matpel' => 'Matpel',
            'matpel_detail' => 'Matpel Detail',
        ];
    }
}
