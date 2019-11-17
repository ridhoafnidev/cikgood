<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "guru_identitas".
 *
 * @property integer $id_identitas
 * @property integer $guru_id
 * @property string $nomor_ktp
 * @property string $photo_ktp
 * @property string $npwp
 * @property string $photo_npwp
 * @property string $nama_bank
 * @property string $nomor_rekening
 * @property string $nama_pemilik_rekening
 */
class GuruIdentitas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guru_identitas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guru_id', 'nomor_ktp', 'photo_ktp', 'npwp', 'photo_npwp', 'nama_bank', 'nomor_rekening', 'nama_pemilik_rekening'], 'required'],
            [['guru_id'], 'integer'],
            [['nomor_ktp'], 'string', 'max' => 16],
            [['photo_ktp', 'photo_npwp'], 'string', 'max' => 225],
            [['npwp'], 'string', 'max' => 15],
            [['nama_bank', 'nama_pemilik_rekening'], 'string', 'max' => 50],
            [['nomor_rekening'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_identitas' => 'Id Identitas',
            'guru_id' => 'Guru ID',
            'nomor_ktp' => 'Nomor Ktp',
            'photo_ktp' => 'Photo Ktp',
            'npwp' => 'Npwp',
            'photo_npwp' => 'Photo Npwp',
            'nama_bank' => 'Nama Bank',
            'nomor_rekening' => 'Nomor Rekening',
            'nama_pemilik_rekening' => 'Nama Pemilik Rekening',
        ];
    }
}
