<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Compra $compra
 */
?>
<table class="body-wrap">
    <tbody>
        <tr>
            <td class="container" width="600">
                <div class="content">
                    <table class="main" width="100%" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td class="content-wrap aligncenter">
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td class="content-block">
                                                    <span id="ani" size="50px">Ani</span><span id="phoria">Phoria</span>
                                                    <h2>Factura de Compras</h2>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="content-block">
                                                    <table class="invoice">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <br>RFC<?= ': ' . $compra['fabricante']['rfc'] ?>
                                                                    <br>Razón Social<?= ': ' . $compra['fabricante']['razon_social'] ?>
                                                                    <br>Dirección<?= ': ' . $compra['fabricante']['direccion'] ?>
                                                                    <br>Telefono<?= ': ' . $compra['fabricante']['telefono'] ?>
                                                                    <br>Factura<?= ' #' . $compra['id'] ?>
                                                                    <br><?= $compra['fecha'] ?>
                                                                    <br>Estatus<?= ': ' . $compra['estatus']['estatus'] ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <table class="invoice-items" cellpadding="0" cellspacing="0" style="padding-top: 3rem">
                                                                    <thead>
                                                                        <tr style="background-color: #FFFFFF">
                                                                            <td>Código</td>
                                                                            <td>Artículo</td>
                                                                            <td class="line0 alignright">Cantidad</td>
                                                                            <td class="line0 alignright">Costo</td>
                                                                            <td class="line0 alignright">Monto</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                            $total = 0;
                                                                            foreach($compra['merchandising'] as $key=>$merch){
                                                                                $total += $merch['costo'] * $merch['_joinData']['cantidad'];
                                                                                $total_producto = $merch['costo'] * $merch['_joinData']['cantidad'];
                                                                        ?>
                                                                        <tr>
                                                                            <td class="line0"><?= $merch['id'] ?></td>
                                                                            <td class="line0"><?= $merch['articulo'] ?></td>
                                                                            <td class="line0 alignright"><?= $merch['_joinData']['cantidad'] ?></td>
                                                                            <td class="line0 alignright">$<?= number_format($merch['costo'], 2) ?></td>
                                                                            <td class="line0 alignright">$<?= number_format($total_producto, 2) ?></td>
                                                                        </tr>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        <tr class="total">
                                                                            <td class="alignright" colspan="4">Total</td>
                                                                            <td class="alignright" colspan="4">$<?= number_format($total, 2) ?></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="content-block">
                                                    AniPhoria Merch
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
    </tbody>
</table>





