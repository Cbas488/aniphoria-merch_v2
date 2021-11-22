<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cliente->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Cliente'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive justify-content-center">
        <div class="cliente form content">
            <?= $this->Form->create($cliente, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Edit Cliente') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('apaterno');
                    echo $this->Form->control('amaterno');
                    echo $this->Form->control('fecha_nacimiento');
                    echo $this->Form->control('usuario');
                    echo $this->Form->control('correo', ['type' => 'email']);
                    echo $this->Form->control('contrasenia', ['type' => 'password']);
                    echo $this->Form->control('imagen', ['type' => 'file']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
