<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "guru_bahan_ajar_matpel".
 *
 * @property integer $id_guru_bahan_ajar_matpel
 * @property integer $guru_id
 * @property string $matpel_id
 * @property integer $tarif
 */
class GuruBahanAjarMatpel extends \yii\db\ActiveRecord
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
            [['guru_id', 'tarif'], 'integer'],
            [['matpel_id'], 'string', 'max' => 100],
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
