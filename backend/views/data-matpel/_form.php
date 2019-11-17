<?php

use yii\helpers\Html;
use common\models\Tingkatan;
use common\models\MasterMatpel;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DataMatpel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-matpel-form">

    <?php $form = ActiveForm::begin(); ?>
    <?=
        $form->field($model, 'tingkatan')->dropDownList(
            ArrayHelper::map(Tingkatan::find()->all(),'id','tingkatan'),
            ['prompt'=>'Pilih Jenjang','required'=>'required', 'id' => 'id']
        )->label(false)
    ?>

    <?=
        $form->field($model, 'matpel')->dropDownList(
            ArrayHelper::map(MasterMatpel::find()->all(),'id_master_matpel','nama'),
            ['prompt'=>'Pilih Mata Pelajaran','required'=>'required']
        )->label(false)
    ?>

    <?= $form->field($model, 'matpel_detail')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">
	var e = document.getElementById("id");
var strUser = e.options[e.selectedIndex].text;
</script>
