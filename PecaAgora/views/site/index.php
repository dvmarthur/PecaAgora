<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';

?>
<div class="site-index">
    <form action="/index.php?r=site/obter" method="POST">
        <div class="jumbotron text-center bg-transparent">
            <h1 class="display-4">Bem-vindo!</h1>
            <p class="lead">Digite o meli_id do produto que deseja consultar!</p>
            <input type="text" class="btn btn-lg btn-success" name="meli_id">
            <input type="submit" class="btn btn-lg btn-success" value="Consultar" name="envia">
        </div>
    </form>
</div>

<div class="body-content">
    <?php if (!empty($thumbnail)) {  ?>
        <div class="container mt-5 mb-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="images p-3">
                                    <div class="text-center p-4"> <img id="main-image" src=<?php echo $thumbnail ?> width="250" /> </div>
                                    <div class="thumbnail text-center"> <img  src=<?php echo $thumbnail ?> width="70"> <img  src=<?php echo $thumbnail ?> width="70"> </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product p-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i> <span class="ml-1"><?php echo $id ?></span> </div> <i class="fa fa-shopping-cart text-muted"></i>
                                    </div>
                                    <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand"><?php echo $categoria ?></span>
                                        <h5 class="text-uppercase"><?php echo $title ?></h5>
                                        <div class="price d-flex flex-row align-items-center"> <span class="act-price">R$<?php echo number_format($price, 2, ",", "."); ?></span>
                                            <div class="ml-2"> <small class="dis-price">R$<?php echo number_format(($price + 10), 2, ",", "."); ?></small> <span> APROVEITE O DESCONTO!</span> </div>
                                        </div>
                                    </div>
                                    <p class="about">Efetue sua compra o mais r??pido poss??vel pois restam apenas <?php echo $available_quantity ?> unidades!</p>

                                    <div class="cart mt-4 align-items-center"> <a href="<?php echo $permalink ?>" target="_blank"><button class="btn btn-danger text-uppercase mr-2 px-4">Comprar</button></a> <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<style>
    body {
        background-color: gray;
    }

    .card {
        border: none
    }

    .product {
        background-color: #eee
    }

    .brand {
        font-size: 13px
    }

    .act-price {
        color: red;
        font-weight: 700
    }

    .dis-price {
        text-decoration: line-through
    }

    .about {
        font-size: 14px
    }

    .color {
        margin-bottom: 10px
    }

    label.radio {
        cursor: pointer
    }

    label.radio input {
        position: absolute;
        top: 0;
        left: 0;
        visibility: hidden;
        pointer-events: none
    }

    label.radio span {
        padding: 2px 9px;
        border: 2px solid #ff0000;
        display: inline-block;
        color: #ff0000;
        border-radius: 3px;
        text-transform: uppercase
    }

    label.radio input:checked+span {
        border-color: #ff0000;
        background-color: #ff0000;
        color: #fff
    }

    .btn-danger {
        background-color: #ff0000 !important;
        border-color: #ff0000 !important
    }

    .btn-danger:hover {
        background-color: #da0606 !important;
        border-color: #da0606 !important
    }

    .btn-danger:focus {
        box-shadow: none
    }

    .cart i {
        margin-right: 10px
    }
</style>

