<?php header('Access-Control-Allow-Origin: *'); ?>
<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; 
$id_cat=(isset($_GET['id'])) ? $_GET['id'] : "";
$nombre_cat=(isset($_GET['name'])) ? $_GET['name'] : "";
require_once ("conexion/Conexion.php");
        $sql="SELECT * FROM `draft_category`";
        $datos_cat = null;
        $datos_personas = null;
        try {
            $comando = "";
            $comando = Conexion::getInstance()->getDb()->prepare($sql);
            $comando->execute();
            $datos_cat = $comando->fetchAll();

            $sql="SELECT * FROM `personas` ";
            $comando = "";
            $comando = Conexion::getInstance()->getDb()->prepare($sql);
            $comando->execute();
            $datos_personas = $comando->fetchAll();

        }catch (PDOException $e) {echo "ERROR ".$e->getMessage(); exit(); }
        $html_Type="";
        $html_Type2="";
        $i=1;
        foreach ($datos_cat as $lista) {
            $html_Type.='{"id":"'.$lista['id'].'","label":"'.$lista['Clasificacion'].'","tipo":"0"}';
            if($i<count($datos_cat))$html_Type.=',';
            $i++;
        }

        $html_Type2="";
        $i=1;
        foreach ($datos_personas as $lista) {
            $html_Type2.='{"id":"'.$lista['id'].'","label":"'.$lista['Nombre'].'","tipo":"1"}';
            if($i<count($datos_personas))$html_Type2.=',';
            $i++;
        }


    ?>
<style>
    @font-face {
        font-family: "AvenirNextLTPro-Bold";
        src: url(http://www.misimon.com/tipografia/AvenirNextLTPro-Bold.otf) format("truetype");
    }

    @font-face {
        font-family: "AvenirNextLTPro-BoldCn";
        src: url(http://www.misimon.com/tipografia/AvenirNextLTPro-BoldCn.otf) format("truetype");
    }


    @font-face {
        font-family: "AvenirNextLTPro-BoldCnIt";
        src: url(http://www.misimon.com/tipografia/AvenirNextLTPro-BoldCnIt.otf) format("truetype");
    }

    @font-face {
        font-family: "AvenirNextLTPro-Cn";
        src: url(http://www.misimon.com/tipografia/AvenirNextLTPro-Cn.otf) format("truetype");
    }

    @font-face {
        font-family: "AvenirNextLTPro-CnIt";
        src: url(http://www.misimon.com/tipografia/AvenirNextLTPro-CnIt.otf) format("truetype");
    }


    @font-face {
        font-family: "AvenirNextLTPro-Demi";
        src: url(http://www.misimon.com/tipografia/AvenirNextLTPro-Demi.otf) format("truetype");
    }

    @font-face {
        font-family: "AvenirNextLTPro-DemiCn";
        src: url(http://www.misimon.com/tipografia/AvenirNextLTPro-DemiCn.otf) format("truetype");
    }

    @font-face {
        font-family: "AvenirNextLTPro-DemiCnIt";
        src: url(http://www.misimon.com/tipografia/AvenirNextLTPro-DemiCnIt.otf) format("truetype");
    }

    @font-face {
        font-family: "AvenirNextLTPro-DemiIt";
        src: url(http://www.misimon.com/tipografia/AvenirNextLTPro-DemiIt.otf) format("truetype");
    }


    @font-face {
        font-family: "AvenirNextLTPro-HeavyCn";
        src: url(http://www.misimon.com/tipografia/AvenirNextLTPro-HeavyCn.otf) format("truetype");
    }


    @font-face {
        font-family: "AvenirNextLTPro-HeavyCnIt";
        src: url(http://www.misimon.com/tipografia/AvenirNextLTPro-HeavyCnIt.otf) format("truetype");
    }

    @font-face {
        font-family: "AvenirNextLTPro-It";
        src: url(http://www.misimon.com/tipografia/AvenirNextLTPro-It.otf) format("truetype");
    }

    @font-face {
        font-family: "AvenirNextLTPro-MediumCn";
        src: url(http://www.misimon.com/tipografia/AvenirNextLTPro-MediumCn.otf) format("truetype");
    }

    @font-face {
        font-family: "AvenirNextLTPro-MediumCn";
        src: url(http://www.misimon.com/tipografia/AvenirNextLTPro-MediumCn.otf) format("truetype");
    }

    @font-face {
        font-family: "AvenirNextLTPro-MediumCn";
        src: url(http://www.misimon.com/tipografia/AvenirNextLTPro-MediumCn.otf) format("truetype");
    }

    @font-face {
        font-family: "AvenirNextLTPro-MediumCn";
        src: url(http://www.misimon.com/tipografia/AvenirNextLTPro-MediumCn.otf) format("truetype");
    }

    @font-face {
        font-family: "AvenirNextLTPro-MediumCnIt";
        src: url(http://www.misimon.com/tipografia/AvenirNextLTPro-MediumCnIt.otf) format("truetype");
    }

    @font-face {
        font-family: "AvenirNextLTPro-Regular";
        src: url(http://www.misimon.com/tipografia/AvenirNextLTPro-Regular.otf) format("truetype");
    }

    @font-face {
        font-family: "AvenirNextLTPro-UltLtCn";
        src: url(http://www.misimon.com/tipografia/AvenirNextLTPro-UltLtCn.otf) format("truetype");
    }

    @font-face {
        font-family: "AvenirNextLTPro-UltLtCnIt";
        src: url(http://www.misimon.com/tipografia/AvenirNextLTPro-UltLtCnIt.otf) format("truetype");
    }
    body, h1, h2, h3, h4, h5, h6, p, blockquote, li, a,ul ,button, div,button, input, optgroup, select, textarea{
        font-family: AvenirNextLTPro-Regular !important;
    }
    div#eleblock {
        padding: 20px 15px 1px;
        background-color: rgba(0, 0, 0, 0.81);
        border: 1px solid #000000;
        margin-top: 0px;
        margin-right: 50px;
        margin-bottom: 10px;
        margin-left: 50px;
    } 
    header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    min-width: 320px;
    padding: 25px 0;
    color: #ffffff;
    background: #000;
    z-index: 1000;
    -webkit-transition: all ease-out 0.25s;
    transition: all ease-out 0.25s;
}

    .block-title {
        margin: -20px -15px 20px;
        background-color: rgba(0,0,0,0.075);
        border-bottom: 1px solid rgba(0,0,0,0.075);
        text-align: center;
    }

    h2#eleh2 {
        padding-top: 30px;
        padding-right: 90px;
        line-height: 40px;
        padding-left: 90px;
        text-align: left;
        font-size: 22px;
    }

    .eleh2 {
        padding-right: 20px;
        padding-left: 77px;
        font-size: 18.66px;
    }
    
    input#buscar_por,input#buscar_cercade {
        border-radius: 20px;
    }

    .form-group.elegroup {
        padding-right: 80px;
        padding-left: 80px;
        text-align: justify;
    }


    header.header-scroll {
        padding: 20px 0;
        background: rgba(0, 0, 0, 0.86);
    }

    button.btn.btn-info.btn-lg.elebtn {
        background-color: #F5DC34;
        border-color: #F5DC34;
        color: #4F1896;
        border-radius: 25px;
        height: 50px;
    }

    nav {
        display: none;
    }

    #buscar_por::-webkit-input-placeholder { color:#999999;font-size: 10px }
    #buscar_cercade::-webkit-input-placeholder { color:#999999;font-size: 10px }

    hr#elehr {
        width: 220px;
        margin-left: 90px;
        margin-top: -10px;
    }

    h5#eleh5 {
        padding-top: 0px;
        padding-right: 90px;
        line-height: 28px;
        padding-left: 90px;
        text-align: left;
        font-size: 22px;
        padding-bottom: 0px;
    }
    h5#eleh51 {
        font-size: 15px;
        line-height: 18px;
        width: 300px;
    }

    div#eleblockgris {
        padding: 20px 15px 1px;
        background-color: rgba(255, 255, 255, 0.81);
        border: 1px solid rgba(253, 245, 245, 0.075);
        margin-top: 0px;
        margin-right: 50px;
        margin-bottom: 10px;
        margin-left: 50px;
        opacity: 1;
        color: black;
        margin-top: -10px;
    }
    
    button#contacto {
        margin-top: 20px;
        background-color: #4F1896;
        margin-bottom: 20px;
    }
   
    div#eleangelid {
        /*margin-right: 10px;
        margin-left: 10px;
        padding-left: 0px;
        padding-right: 0px;*/
    }

    .col-sm-1.elesm {
        /*margin-right: 10px;*/
    }

    section.site-content.site-section.parallax-image {
        padding-bottom: 40px;
    }

    .elesm button.btn.btn-lg.btn-info {
        background-color: #fffbf1;
        border-color: #fff9e8;
        color: #4f1896;
        font-size: 12px;
    }

    div#eleangelid {
       /* width: 95% !important;*/
    }


    .block-title.ele {
        background-color: rgb(255, 255, 255);
        border-bottom: 1px solid rgb(255, 255, 255);
        text-align: center;
        margin-top: -20px;
        margin-right: -15px;
        margin-bottom: 20px;
        margin-left: -15px;
    }
    

    img#imagen_redonda {
        /*margin-left: 80px;
        margin-top: 8px;
        width: 128px;*/
    }

    p#elep {
        font-size: 18px;
    }

    p.elep2 {
        font-size: 22px;
        text-align: center;
        color: #5a0f9a;
    }

    span#enlistar {
        font-size: 22px;
        font-family: AvenirNextLTPro-Regular;
    }

    h5#eleh511 {
        font-size: 14.66px;
    }

    @media (max-width: 768px){
         .col-sm-1 {
            width: 100%;
        }

        .col-sm-1.elesm {
            padding-right: 10px;
            padding-left: 10px;
        }

        .elesm button.btn.btn-lg.btn-info {
            background-color: #fffbf1;
            border-color: #fff9e8;
            color: #4f1896;
            font-size: 12px;
            width: 100%;
            margin-top: 10px;
        }

        h2#eleh2 {
            padding-top: 30px;
            padding-right: 10px;
            line-height: 25px;
            padding-left: 10px;
            text-align: left;
            font-size: 22px;
        }

        .form-group.elegroup {
            padding-right: 0px;
            padding-left: 0px;
            text-align: justify;
        }

        hr#elehr {
            width: 100%;
            margin-left: 0px;
            margin-top: -10px;
            text-align: center;
        }

        h5#eleh5 {
            padding-top: 0px;
            padding-right: 5px;
            line-height: 28px;
            padding-left: 5px;
            text-align: left;
            font-size: 22px;
            padding-bottom: 0px;
        }

        .visibility-none {
            visibility: initial;
        }

        h2#eleh3 {
            /*text-align: center;*/
            margin-left: 10px;
        }

        p#elep {
            padding-left: 10px;
            padding-right: 10px;
        }

        img#imagen_redonda {
            /*margin-left: 0px;
            margin-top: 8px;
            width: 128px;*/
        }

        div#eleblock {
            padding: 20px 15px 1px;
            background-color: rgba(0, 0, 0, 0.81);
            border: 1px solid #000000;
            margin-top: 0px;
            margin-right: 25px;
            margin-bottom: 10px;
            margin-left: 25px;
        }

        div#eleblockgris {
            padding: 20px 15px 1px;
            background-color: rgba(255, 255, 255, 0.81);
            border: 1px solid rgba(253, 245, 245, 0.075);
            margin-top: 0px;
            margin-right: 25px;
            margin-bottom: 10px;
            margin-left: 25px;
            opacity: 1;
            color: black;
            margin-top: -10px;
        }
    }

    @media (min-width: 768px){
         .col-sm-1 {
           /* width: 8.33333333%;*/
            width: 20%;
        }

        .elesm button.btn.btn-lg.btn-info {
            background-color: #fffbf1;
            border-color: #fff9e8;
            color: #4f1896;
            font-size: 12px;
            width: 100%;
            margin-top: 10px;
        }
    }

    @media (min-width: 992px){
        .container {
            width: 100%;;
        }
        .col-sm-1 {
            width: 33.33%;
        }
    }


    @media (min-width: 992px){
        .container {
            width: 100%;
        }

        .col-sm-1 {
            width: 8.33%;
        }

    }
    
    @media screen and (max-width: 1300px) and (min-width: 992px) {
        .container {
            width: 100%;
        }

        .col-sm-1 {
            width: 16.66%;
        }
    }


    @media screen and (min-width: 1301px)  {
        .container {
            width: 100%;
        }

        .col-sm-1 {
            width: 8.33%;
        }

        .col-sm-1.elesm {
            margin-right: 9px;
        }
    }
     
</style>      
<div class="modal fade modal-side-fall" id="md_contacto" aria-hidden="true"
  aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header text-center">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">×</span>
            </button>
            <h2 class="modal-title"><i class="fa fa-envelope"></i> Contacto</h2>
        </div>
        <div class="modal-body">
        <form method="post" accept-charset="utf-8" id="fm_contacto">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" id="nombre" name="nombre" class="form-control input-lg" placeholder="Nombre" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" id="apellido" name="apellido" class="form-control input-lg" placeholder="Apellido" required="">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" id="negocio" name="negocio" class="form-control input-lg" placeholder="Negocio" required="">
                    </div>
                    <div class="form-group">
                        <textarea rows="3" id="direccion" name="direccion" class="form-control input-lg" placeholder="Dirección (negocio)" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" id="correo" name="correo" class="form-control input-lg" placeholder="Correo Electrónico" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" id="tel" name="tel" class="form-control input-lg" placeholder="Número Telefónico (negocio)" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" id="nacionalidad" name="nacionalidad" class="form-control input-lg" placeholder="Nacionalidad" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" id="url" name="url" class="form-control input-lg" placeholder="URL (si tiene)">
                    </div>
                </div>
            </div>
        </form>
        </div>
        <div class="modal-footer"><!-- margin-0 -->
            <button type="button" class="btn btn-primary btn-lg" id="btn_enviar">Enviar</button>
        </div>
    </div>
  </div>
</div>          
<!-- Intro -->
<section class="site-section site-section-light site-section-top parallax-image" style="background-image: url('img/background_ele.jpg');">
    <div class="container">
        <h1 class="text-center animation-slideDown hidden-xs"><strong> </strong></h1>
        <h2 class="text-center animation-slideUp push hidden-xs ele"></h2>
    </div>
     
</section>
<!-- END Intro -->

<!-- END Quick Stats -->

<div class="row">
        <div class="col-sm-6">
            <!-- Satellite Map Block -->
            <div class="block full">
                <!-- Satellite Map Title -->
                <div class="block-title">
                    <h4><strong>Satellite</strong> Map</h4>
                </div>
                <!-- END Satellite Map Title -->

                <!-- Satellite Map Content -->
                <!-- Gmaps.js (initialized in js/pages/compMaps.js), for more examples you can check out http://hpneo.github.io/gmaps/examples.html -->
                <div id="gmap-satellite" class="gmap"></div>
                <!-- END Satellite Map Content -->
            </div>
            <!-- END Satellite Map Block -->
        </div>
        <div class="col-sm-6">
            <!-- Terrain Map Block -->
            <div class="block full">
                <!-- Terrain Map Title -->
                <div class="block-title">
                    <h4><strong>Terrain</strong> Map</h4>
                </div>
                <!-- END Terrain Map Title -->

                <!-- Terrain Map Content -->
                <!-- Gmaps.js (initialized in js/pages/compMaps.js), for more examples you can check out http://hpneo.github.io/gmaps/examples.html -->
                <div id="gmap-terrain" class="gmap"></div>
                <!-- END Terrain Map Content -->
            </div>
            <!-- END Terrain Map Block -->
        </div>
    </div>

<!-- Promo #5 -->
<section class="site-content site-section site-slide-content">
    <div class="container">
        <div class="row">
            
            <div class="col-sm-8 col-md-7 site-block visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInRight" data-element-offset="-180">

                <div class="row">
                    <div class="col-xs-4">
                        <div class="text-right"><img src="img/logo_redondo.png" id="imagen_redonda" alt=""></div>
                    </div>
                    <div class="col-xs-8">
                        <div class="block-title ele">
                            <h2 id="eleh3" class="text-left"><strong>Descargue nuestra App</strong></h2>
                            <p class="text-left" id="elep">Simón App es la forma más fácil de acceder a todo lo que su comunidad tiene para ofrecer, desde negocios hasta cupones, eventos y más.</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-4 col-md-offset-1 site-block visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInLeft" data-element-offset="-180">
                <div class="row">
                    <div class="col-xs-6">
                         <a href="https://play.google.com/store/apps/details?id=com.misimon.www&hl=es"><img src="img/logo_play-01.png" alt="Promo #4" class="img-responsive"></a>
                        <p class="elep2">¡Descárgala hoy!</p>
                    </div>
                    <div class="col-xs-6">
                        <img src="img/logo_app-01.png" alt="Promo #4" class="img-responsive">
                        <p class="elep2">¡Próximamente!</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- END Promo #5 -->

 


<?php //include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>
<script src="https://maps.googleapis.com/maps/api/js?key="></script>
<script src="js/helpers/gmaps.min.js"></script>
<script type="text/javascript">
	$(function () {
      jQuery.extend(jQuery.validator.messages, {
        required: "Este campo es obligatorio.",
        remote: "Por favor, rellena este campo.",
        email: "Por favor, escribe una dirección de correo válida",
        url: "Por favor, escribe una URL válida.",
        date: "Por favor, escribe una fecha válida.",
        dateISO: "Por favor, escribe una fecha (ISO) válida.",
        number: "Por favor, escribe un número entero válido.",
        digits: "Por favor, escribe sólo dígitos.",
        creditcard: "Por favor, escribe un número de tarjeta válido.",
        equalTo: "Por favor, escribe el mismo valor de nuevo.",
        accept: "Por favor, escribe un valor con una extensión aceptada.",
        maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
        minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
        rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
        range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
        max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
        min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
      });
    });
   $(function () {
        $(document).on("click", "#btn_enviar", function (e) {
            var valid = $("#fm_contacto").valid();
            if(valid){
                var datos=$("#fm_contacto").serialize();
                $.ajax({
                    url:"formulario.php",
                    dataType: "html", 
                    data: datos,
                    method: "POST",
                    success: function(json) {
                        console.log(json);
                        $.bootstrapGrowl('<h4>Su mensaje ha sido enviado con éxito!</h4>', {
                            type: "success",
                            delay: 2500,
                            allow_dismiss: true
                        });
                        timer=setInterval(function(){
                            location.reload();
                            clearTimeout(timer);
                        },2000);
                    }
                });
            }
        });
   });
</script>
<?php include 'inc/template_end.php'; ?>