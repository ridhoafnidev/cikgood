<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "guru_bahan_ajar_lokasi".
 *
 * @property integer $id_bahan_ajar_lokasi
 * @property integer $guru_id
 * @property string $provinsi
 * @property string $kota
 * @property string $kecamatan
 */
class GuruBahanAjarLokasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guru_bahan_ajar_lokasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guru_id', 'provinsi', 'kota', 'kecamatan'], 'required'],
            [['guru_id'], 'integer'],
            [['provinsi', 'kota', 'kecamatan'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_bahan_ajar_lokasi' => 'Id Bahan Ajar Lokasi',
            'guru_id' => 'Guru ID',
            'provinsi' => 'Provinsi',
            'kota' => 'Kota',
            'kecamatan' => 'Kecamatan',
        ];
    }
}
