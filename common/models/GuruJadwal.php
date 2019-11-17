<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "guru_jadwal".
 *
 * @property integer $id_jadwal
 * @property integer $guru_id
 * @property string $hari
 * @property string $jam
 */
class GuruJadwal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guru_jadwal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guru_id', 'hari', 'jam'], 'required'],
            [['guru_id'], 'integer'],
            [['jam'], 'string'],
            [['hari'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_jadwal' => 'Id Jadwal',
            'guru_id' => 'Guru ID',
            'hari' => 'Hari',
            'jam' => 'Jam',
        ];
    }
}
