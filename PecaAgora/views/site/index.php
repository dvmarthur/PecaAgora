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
            <input type="submit" class="btn btn-lg btn-success" name="envia">
        </div>
    </form>
</div>

<div class="body-content">

    <div class="row">
        <div class="col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">available quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($id)){ ?>
                    <tr>
                        <th scope="row"><?php echo $id ?></th>
                        <td><?php echo $title ?></td>
                        <td><?php echo $categoria ?></td>
                        <td>R$<?php echo number_format($price,2,",","."); ?></td>
                        <td><?php echo $available_quantity ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
