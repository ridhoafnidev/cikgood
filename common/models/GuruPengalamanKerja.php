<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "guru_pengalaman_kerja".
 *
 * @property integer $id_pengalaman_kerja
 * @property integer $guru_id
 * @property string $jabatan
 * @property string $perusahaan
 * @property string $tgl_masuk
 * @property string $tgl_selesai
 */
class GuruPengalamanKerja extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guru_pengalaman_kerja';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guru_id', 'jabatan', 'perusahaan', 'tgl_masuk'], 'required'],
            [['guru_id'], 'integer'],
            [['tgl_masuk', 'tgl_selesai'], 'safe'],
            [['jabatan'], 'string', 'max' => 20],
            [['perusahaan'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pengalaman_kerja' => 'Id Pengalaman Kerja',
            'guru_id' => 'Guru ID',
            'jabatan' => 'Jabatan',
            'perusahaan' => 'Perusahaan',
            'tgl_masuk' => 'Tgl Masuk',
            'tgl_selesai' => 'Tgl Selesai',
        ];
    }
}
