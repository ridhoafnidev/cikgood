<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "saldo".
 *
 * @property integer $id_saldo
 * @property integer $pengguna_id
 * @property double $total_saldo
 */
class Saldo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'saldo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pengguna_id', 'total_saldo'], 'required'],
            [['pengguna_id'], 'integer'],
            [['saldo_midtans'], 'number'],
            [['uang_keluar'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_saldo' => 'Id Saldo',
            'pengguna_id' => 'Pengguna ID',
            'saldo_midtrans' => 'Total Saldo',
            'uang_keluar' => 'Total Saldo',
        ];
    }
}
