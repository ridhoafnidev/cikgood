<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "saldo_midtrans".
 *
 * @property integer $id_mitrans
 * @property string $custom_field1
 * @property string $custom_field2
 * @property string $status_code
 * @property string $status_message
 * @property string $transaction_id
 * @property string $masked_card
 * @property string $order_id
 * @property string $payment_type
 * @property string $transaction_time
 * @property string $transaction_status
 * @property string $fraud_status
 * @property string $approval_code
 * @property string $signature_key
 * @property string $bank
 * @property string $gross_amount
 * @property string $channel_response_message
 * @property string $card_type
 */
class SaldoMidtrans extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'saldo_midtrans';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transaction_time'], 'required'],
            [['custom_field1'], 'string', 'max' => 20],
            [['custom_field2', 'transaction_status', 'fraud_status', 'bank', 'gross_amount', 'channel_response_message', 'card_type'], 'string', 'max' => 50],
            [['status_code'], 'string', 'max' => 11],
            [['status_message', 'transaction_id', 'masked_card', 'order_id', 'payment_type', 'approval_code', 'signature_key'], 'string', 'max' => 255],
            [['transaction_time'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_mitrans' => 'Id Mitrans',
            'custom_field1' => 'Custom Field1',
            'custom_field2' => 'Custom Field2',
            'status_code' => 'Status Code',
            'status_message' => 'Status Message',
            'transaction_id' => 'Transaction ID',
            'masked_card' => 'Masked Card',
            'order_id' => 'Order ID',
            'payment_type' => 'Payment Type',
            'transaction_time' => 'Transaction Time',
            'transaction_status' => 'Transaction Status',
            'fraud_status' => 'Fraud Status',
            'approval_code' => 'Approval Code',
            'signature_key' => 'Signature Key',
            'bank' => 'Bank',
            'gross_amount' => 'Gross Amount',
            'channel_response_message' => 'Channel Response Message',
            'card_type' => 'Card Type',
        ];
    }
}