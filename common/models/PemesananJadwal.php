<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pemesanan_jadwal".
 *
 * @property integer $id_pemesanan_jadwal
 * @property integer $pemesanan_id
 * @property string $tgl_pertemuan
 * @property string $hari
 * @property string $waktu
 */
class PemesananJadwal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pemesanan_jadwal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pemesanan_id', 'tgl_pertemuan', 'hari', 'waktu'], 'required'],
            [['pemesanan_id'], 'integer'],
            [['tgl_pertemuan'], 'safe'],
            [['hari'], 'string', 'max' => 20],
            [['waktu'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pemesanan_jadwal' => 'Id Pemesanan Jadwal',
            'pemesanan_id' => 'Pemesanan ID',
            'tgl_pertemuan' => 'Tgl Pertemuan',
            'hari' => 'Hari',
            'waktu' => 'Waktu',
        ];
    }
}
