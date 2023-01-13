<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Sobre Nós';

?>
<br>
<div class="site-about text-center">



    <H1>Sobre Nós</H1>
    <br>
    <br>
    <div class="container" style="border: 2px; border-style: solid; border-color: #4e555b; border-radius: 15px; padding-top: 10px">
        <div class="row">
            <div class="col-4 text-center">
<!--                <img style="width:75%; border-radius: 15px" src="/imgs/HPLogo48x48.svg">-->
                <?= Html::img('@web/imgs/HPLogo48x48.svg', ['alt'=>'Hotel Plus', 'width'=>'400px', 'height'=>'400px']); ?>
            </div>
            <div class="col-8 text-left">
                <h2>Quem Somos</h2>
                <p>Nós, a HotelPlus, somos uma entidade Hoteleira que entrega soluções tecnológicas dentro do nosso estabelecimento para melhorar e/ou criar um ambiente de descanso mais eficaz sem precisar de qualquer contacto com nosso o staff </p>
                <br>
                <h4>Como o fazemos?</h4>
                <p>Conseguimos simplesmente tornando os nossos sistemas o mais simples para o utilizador. Precisando apenas que o nosso cliente crie a sua própria conta e faça uma marcação de estadia no nosso estabelecimento. No check-in será entregue um dispositivo móvel para facilitar ainda mais a sua estadia e maximizar a esperiencia de relaxamento apenas com a distância de um clique.</p>
                <br>
                <h4>O que o Sistema permite fazer?</h4>
                <p>Com um simples clique os nosso clientes podem ver a partir do programa, o cardapio do restaurante do nosso Hotel, podem fazer uma marcação de mesa, Visualizar as suas marcações, pedir uma limpeza para o seu quarto e permitir perturbar ou não perturbar o quarto. Muito Simples </p>
            </div>
        </div>
    </div>
    <br>
    <!-- <div class="container" style="border: 2px; border-style: solid; border-color: #4e555b; border-radius: 15px; padding-top: 10px">
         <div class="row">
             <div class="col-8 text-left">
                 <h2>Repositórios dos Projetos</h2>
                 <p>Apresentamos todos os repositórios do Projeto Final do Curso Superior Técnico Programador de Sistemas de Informação. Todos os repositórios estarão disponiveis </p>
             </div>
             <div class="col-4 text-center">
                 <a href="https://github.com/Albert-Snake">
                     <img style="width:75%; border-radius: 15px" src="/css/imgs/githublogo.png">
                     <figcaption>GitHub</figcaption>
                 </a>
                 <a href="https://www.linkedin.com/in/alberto-alves-correia-916a381aa/">
                     <img style="width:75%; border-radius: 15px" src="/css/imgs/linkedinlogo.png">
                     <figcaption>Linkedin</figcaption>
                 </a>
             </div>
         </div>
    </div>--!>
    <br>
    <div class="container text-center" id="contactos" style="border: 2px; border-style: solid; border-color: #4e555b; border-radius: 15px; padding-top: 10px">
        <h2>Contactos</h2>
        <h5><strong>📞 Telemóvel: </strong><a href="tel:265 530 650">265 530 650</a></h5>
        <h5><strong>✉ E-mail: </strong><a href="mailto:geral@hotelplus.pt">geral@hotelplus.pt</a></h5>
        <h5><strong>🗺 Morada: </strong><a href="https://www.google.com/maps/search/Avenida+da+Pra%C3%A7a+P%C3%BAblica,+n%C2%BA15,+Torres+Vedras/@39.0865493,-9.2688746,15z/data=!3m1!4b1">Avenida da Praça Pública, nº15, Torres Vedras</a></h5>

    </div>
