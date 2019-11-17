<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "guru_pengalaman_mengajar".
 *
 * @property integer $id_pengalaman_mengajar
 * @property integer $guru_id
 * @property string $pengalaman
 * @property string $tgl_masuk
 * @property string $tgl_selesai
 */
class GuruPengalamanMengajar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guru_pengalaman_mengajar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guru_id', 'pengalaman', 'tgl_masuk', 'tgl_selesai'], 'required'],
            [['guru_id'], 'integer'],
            [['pengalaman'], 'string'],
            [['tgl_masuk', 'tgl_selesai'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pengalaman_mengajar' => 'Id Pengalaman Mengajar',
            'guru_id' => 'Guru ID',
            'pengalaman' => 'Pengalaman',
            'tgl_masuk' => 'Tgl Masuk',
            'tgl_selesai' => 'Tgl Selesai',
        ];
    }
}
