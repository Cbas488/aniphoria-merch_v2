<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categorium[]|\Cake\Collection\CollectionInterface $categoria
 */
?>
<div class="categoria index content">
    <?= $this->Html->link(__('Nueva Categoría'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h2><?= __('Categorias') ?></h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('categoria') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categoria as $categorium): ?>
                <tr>
                    <td><?= h($categorium->categoria) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="fas fa-pen pr-2"></i>', ['action' => 'edit', $categorium->id], ['escape' => false, 'title' => 'Editar Categoría']) ?>
                        <?= $this->Form->postLink('<i class="fas fa-trash pr-2"></i>', ['action' => 'delete', $categorium->id], ['confirm' => __('¿Seguro que desea hacer la eliminación?', $categorium->id), 'escape' => false,]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primero')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página{{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} en total')) ?></p>
    </div>
</div>
