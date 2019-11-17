<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "guru_riwayat_pendidikan".
 *
 * @property integer $id_riwayat_pendidikan
 * @property integer $guru_id
 * @property string $gelar
 * @property string $jenis_institusi
 * @property string $nama_institusi
 * @property string $jurusan
 * @property string $tahun_masuk
 * @property string $tahun_selesai
 * @property string $photo_ijazah
 */
class GuruRiwayatPendidikan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guru_riwayat_pendidikan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guru_id', 'jenis_institusi', 'nama_institusi', 'jurusan', 'tahun_masuk'], 'required'],
            [['guru_id'], 'integer'],
            [['tahun_masuk', 'tahun_selesai'], 'safe'],
            [['gelar', 'jenis_institusi'], 'string', 'max' => 20],
            [['nama_institusi', 'jurusan'], 'string', 'max' => 30],
            [['photo_ijazah'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_riwayat_pendidikan' => 'Id Riwayat Pendidikan',
            'guru_id' => 'Guru ID',
            'gelar' => 'Gelar',
            'jenis_institusi' => 'Jenis Institusi',
            'nama_institusi' => 'Nama Institusi',
            'jurusan' => 'Jurusan',
            'tahun_masuk' => 'Tahun Masuk',
            'tahun_selesai' => 'Tahun Selesai',
            'photo_ijazah' => 'Photo Ijazah',
        ];
    }
}
