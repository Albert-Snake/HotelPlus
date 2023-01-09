<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Estadias $model */

$this->title = 'Nova Reserva';
//$this->params['breadcrumbs'][] = ['label' => 'Estadias', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estadias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <script>

        // window.onload = function() {
        //     localStorage.setItem("idSuarto", $('#estadias-idquarto').val());
        //     localStorage.setItem("dataInicio", $("#estadias-datainicio").val());
        //     localStorage.setItem("dataTermo", $('#estadias-datatermo').val());
        //     localStorage.setItem("duracao", $('#estadias-duracao').val());
        //     localStorage.setItem("lotacao", $('#estadias-lotacao').val());
        //     localStorage.setItem("valorTotal", $('#estadias-valortotal').val());
        //
        //     localStorage.getItem('duracao');
        //     var lot = localStorage.getItem('lotacao');
        //     console.log(lot);
        // }


        // document.getElementById("estadias-duracao").onclick = function() {
        //     localStorage.setItem("lotacao", $("#estadias-lotacao").val());
        //     fun()
        // };
        // function fun() {
        //     window.location.reload();
        //     // document.location.reload();
        // }

        //CALCULO DATAS
        /*onselect
        onselectionchange*/

        //var dataInicio = new Date(document.getElementById("estadias-datainicio").value);
        // var dataTermo = new Date(document.getElementById("estadias-datatermo").value);

        // var dataInicio = DateTime.parse(document.getElementById("estadias-datainicio").value);
        // var dataTermo = DateTime.parse(document.getElementById("estadias-datatermo").value);
        // var dataInicio = new Date("2023-01-04");
        // var dataTermo = new Date ("2023-01-07");

        // var Difference_In_Time = dataTermo.getTime() - dataInicio.getTime();
        // var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);





        //CALCULO do TOTAL
        var valorTotal = document.getElementById("estadias-valortotal");
        var duracao = document.getElementById("estadias-duracao");
        var total;
        var vt;


        vt = valorTotal.value;
        document.getElementById("estadias-duracao").onclick = function() {

            if(duracao.value >= 1){
                total = duracao.value * vt;
                valorTotal.value = total;
            }else{
                alert("O nº de noites não pode ser inferior a 1.");
                duracao.value = 1;
            }

            // console.log(vt);
            // console.log(total);
            // console.log(valorTotal.value);
            // console.log(dataInicio);
            // console.log("----------------");
        };


        //VERIFICAÇAO LOTAÇAO
        var lotacaouser = document.getElementById("estadias-lotacao");
        var lt;

        lt = lotacaouser.value;
        document.getElementById("estadias-lotacao").onchange = function() {

            if(lotacaouser.value <= lt){

            }
            else{
                alert("Excedeu a lotação máxima do quarto.");
                lotacaouser.value = lt;
            }
        };

    </script>

</div>
