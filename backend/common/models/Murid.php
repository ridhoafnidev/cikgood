<?php

namespace backend\common\models;

use Yii;

/**
 * This is the model class for table "murid".
 *
 * @property integer $id
 * @property string $nama
 * @property string $no_hp
 * @property string $email
 * @property string $password
 * @property string $alamat
 * @property string $jk
 * @property string $nisn
 * @property string $kelas
 * @property string $nama_sekolah
 * @property string $photo
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
            [['nama', 'no_hp', 'email', 'password', 'alamat'], 'required'],
            [['jk', 'nisn', 'kelas', 'nama_sekolah'], 'string'],
            [['nama', 'email', 'password', 'alamat', 'photo'], 'string', 'max' => 255],
            [['no_hp'], 'string', 'max' => 12],
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
            'no_hp' => 'No Hp',
            'email' => 'Email',
            'password' => 'Password',
            'alamat' => 'Alamat',
            'jk' => 'Jk',
            'nisn' => 'Nisn',
            'kelas' => 'Kelas',
            'nama_sekolah' => 'Nama Sekolah',
            'photo' => 'Photo',
        ];
    }
}
