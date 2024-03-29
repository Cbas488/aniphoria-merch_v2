<?php
/**
 * @var App\View\AppView $this
 */


if (!$cart->isEmpty()) {
    $allItems = $cart->getItems();
?>

<div class="content">
    <h2><?= __('Carrito de compras') ?></h2>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= __('Imagen') ?></th>
                <th class="actions">Articulo</th>
                <th class="actions">Cantidad</th>
                <th class="actions">Precio</th>
                <th class="actions">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach ($allItems as $id => $items) {
                    foreach ($items as $item) {
                        foreach ($merchandising as $merch) {
                            if ($id == $merch->id) {
                        break;
                    }
                }
            ?>
                <tr>
                    <?php $imageName=empty($merch->imagen[0]->nombre)?'default.jpg':$merch->imagen[0]->nombre; ?>
                    <td><?= @$this->Html->image('/img/productos/'.$imageName, ['width' => '100', 'height' => '100', 'alt' => 'Imagen Articulo']) ?></td>
                    <td><?= h($merch->articulo) ?></td>
                    <td><?= h($item['quantity']) ?></td>
                    <td><?= h($item['attributes']['price']) ?></td><?= $this->Form->create(null); ?>
                    <?= $this->Form->control('qty', ['type' => 'hidden', 'value' => $item['quantity']]); ?>
                    <?= $this->Form->control('imagen', ['type' => 'hidden', 'value' => $merch->imagen[0]->nombre]) ?>
                    <?= $this->Form->control('id', ['type' => 'hidden', 'value' => $merch->id]) ?>
                    <td><?= $this->Form->postButton('Sacar del carrito', ['controller' => 'Merchandising', 'action' => 'cart'], ['name' => 'remove']) ?></td>
                    <?= $this->Form->end(); ?>
                </tr>
            <?php
                }
            }
            ?>
            </tbody>
        </table>
        <div class="text-right">
            <h3>Total:<br /><?= '$' . number_format($cart->getAttributeTotal('price'), 2, '.', ',') ?></h3>
        </div>
        <p>
        <div class="pull-left">
            <?= $this -> Form -> postButton('Vaciar carrito', ['controller' => 'Merchandising', 'action' => 'cart'], ['class' => 'btn btn-danger btn-empty-cart', 'escape' => false, 'name' => 'clear']) ?>
        </div>
        <div class="pull-right text-right">
            <?= $this -> Html -> link(__('Continue Shopping'), ['_name' => 'index', 'class' => 'btn btn-default']) ?>
            <?= $this -> Html -> link(__('Checkout'), ['_name' => 'checkout', 'class' => 'btn btn-default']) ?>
        </div>
        </p>
    </div>
</div>

<?php
}
else {
?>
    <div class="col-md-2 container-fluid justify-content-center" style="padding: 20px">
        <?= $this -> Html -> image('general/empty_cart.jpg', ['height' => '300px', 'width' => '300px']) ?>
    </div>
<?php
}
?>
