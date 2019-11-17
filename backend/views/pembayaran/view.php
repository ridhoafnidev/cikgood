<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SaldoMidtrans */

$this->title = $model->id_mitrans;
$this->params['breadcrumbs'][] = ['label' => 'Saldo Midtran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saldo-midtrans-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_mitrans',
            'status_code',
            'status_message',
            'transaction_id',
            'masked_card',
            'order_id',
            'payment_type',
            'transaction_time',
            'transaction_status',
            'fraud_status',
            'approval_code',
            'bank',
            'gross_amount',
            'channel_response_message',
            'card_type',
        ],
    ]) ?>

</div>
