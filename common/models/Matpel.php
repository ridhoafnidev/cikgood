<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "guru_bahan_ajar_matpel".
 *
 * @property integer $id_guru_bahan_ajar_matpel
 * @property integer $guru_id
 * @property integer $matpel_id
 * @property integer $tarif
 */
class Matpel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guru_bahan_ajar_matpel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guru_id', 'matpel_id', 'tarif'], 'required'],
            [['guru_id', 'matpel_id', 'tarif'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_guru_bahan_ajar_matpel' => 'Id Guru Bahan Ajar Matpel',
            'guru_id' => 'Guru ID',
            'matpel_id' => 'Matpel ID',
            'tarif' => 'Tarif',
        ];
    }
}
