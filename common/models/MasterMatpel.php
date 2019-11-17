<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "master_matpel".
 *
 * @property integer $id_master_matpel
 * @property string $nama
 */
class MasterMatpel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master_matpel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_master_matpel' => 'Id Master Matpel',
            'nama' => 'Nama',
        ];
    }
}
