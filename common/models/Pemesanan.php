<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pemesanan".
 *
 * @property integer $id_pemesanan
 * @property string $status_pemesanan
 * @property integer $guru_id
 * @property integer $murid_id
 * @property string $matpel
 * @property integer $jumlah_pertemuan
 * @property double $durasi
 * @property string $alamat
 * @property double $lat
 * @property double $lng
 * @property string $jadwal
 * @property string $pesan_tambahan
 * @property double $harga
 * @property double $harga_total
 * @property string $tgl_pemesanan
 * @property integer $rating
 * @property string $rating_isi
 */
class Pemesanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pemesanan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_pemesanan', 'alamat', 'pesan_tambahan'], 'string'],
            [['guru_id', 'murid_id', 'jumlah_pertemuan', 'rating'], 'integer'],
            [['durasi', 'lat', 'lng', 'harga', 'harga_total'], 'number'],
            [['tgl_pemesanan'], 'safe'],
            [['matpel', 'jadwal'], 'string', 'max' => 100],
            [['rating_isi'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pemesanan' => 'Id Pemesanan',
            'status_pemesanan' => 'Status Pemesanan',
            'guru_id' => 'Guru ID',
            'murid_id' => 'Murid ID',
            'matpel' => 'Matpel',
            'jumlah_pertemuan' => 'Jumlah Pertemuan',
            'durasi' => 'Durasi',
            'alamat' => 'Alamat',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'jadwal' => 'Jadwal',
            'pesan_tambahan' => 'Pesan Tambahan',
            'harga' => 'Harga',
            'harga_total' => 'Harga Total',
            'tgl_pemesanan' => 'Tgl Pemesanan',
            'rating' => 'Rating',
            'rating_isi' => 'Rating Isi',
        ];
    }
}
