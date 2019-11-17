<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "murid".
 *
 * @property integer $id
 * @property string $nama
 * @property string $token
 * @property string $no_hp
 * @property string $email
 * @property string $password
 * @property string $alamat
 * @property double $lat
 * @property double $lng
 * @property string $jk
 * @property string $nisn
 * @property string $kelas
 * @property string $nama_sekolah
 * @property string $photo
 * @property string $status
 */
class Murid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'murid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['token', 'status'], 'string'],
            [['token', 'jk', 'nisn', 'kelas', 'nama_sekolah'], 'string'],
            [['lat', 'lng'], 'number'],
            [['nama', 'email', 'password', 'alamat', 'photo'], 'string', 'max' => 255],
            [['no_hp'], 'string', 'max' => 12],
            [['status'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'token' => 'Token',
            'no_hp' => 'No Hp',
            'email' => 'Email',
            'password' => 'Password',
            'alamat' => 'Alamat',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'jk' => 'Jk',
            'nisn' => 'Nisn',
            'kelas' => 'Kelas',
            'nama_sekolah' => 'Nama Sekolah',
            'photo' => 'Photo',
            'status' => 'Status',
        ];
    }
}