<?php
include_once './public/navbarCliente.php';
?>
<br><br>
<div class="container">
    <div class="row">
        <div class="col col-8" style="border: 2px solid;">
            <article>
                <section>
                    Contenido...
                </section>
            </article>
        </div>
        <div class="col col-4">
            <div class="container-fluid">
                <aside style="font-style:italic;width:80%;border:2px solid; float:right !important; padding-left: 20%;padding-right: 10%">
                    <h5>Ofertas</h5>
                    
                    <?php 
                    require_once 'data/OfertaData.php';
                    $ofertaData = new OfertaData();
                    $resultado["ofertas"] = $ofertaData->obtenerOfertas();
                    if($resultado != NULL){

                        foreach($resultado["ofertas"] as $oferta){?>
                            <h6><?php echo $oferta["ofertanombre"]?></h6>
                            <h6>Inicio: <?php echo $oferta["ofertafechainicio"]?></h6>
                            <h6>Fin: <?php echo $oferta["ofertafechafin"]?></h6>
                            <br>
                            <h7>Precio: <b><?php echo $oferta["ofertaprecio"]?></b></h7>
                            <hr>
                        <?php }
                        }?>                        
                </aside>
            </div>
        </div>
    </div>
</div>