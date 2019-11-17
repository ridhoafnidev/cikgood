<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "guru_dokumen".
 *
 * @property integer $id_dokumen
 * @property integer $guru_id
 * @property string $jenis_dokumen
 * @property string $nama_dokumen
 * @property string $tahun
 * @property string $photo_dokumen
 */
class GuruDokumen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guru_dokumen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guru_id', 'jenis_dokumen', 'nama_dokumen', 'tahun', 'photo_dokumen'], 'required'],
            [['guru_id'], 'integer'],
            [['tahun'], 'safe'],
            [['jenis_dokumen', 'nama_dokumen'], 'string', 'max' => 50],
            [['photo_dokumen'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_dokumen' => 'Id Dokumen',
            'guru_id' => 'Guru ID',
            'jenis_dokumen' => 'Jenis Dokumen',
            'nama_dokumen' => 'Nama Dokumen',
            'tahun' => 'Tahun',
            'photo_dokumen' => 'Photo Dokumen',
        ];
    }
}
