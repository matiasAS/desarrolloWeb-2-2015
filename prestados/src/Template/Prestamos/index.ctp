<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Prestamo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="prestamos index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('apellido') ?></th>
            <th><?= $this->Paginator->sort('fechaPrestamo') ?></th>
            <th><?= $this->Paginator->sort('cantidaddias') ?></th>
            <th><?= $this->Paginator->sort('usuarios_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($prestamos as $prestamo): ?>
        <tr>
            <td><?= $this->Number->format($prestamo->id) ?></td>
            <td><?= h($prestamo->apellido) ?></td>
            <td><?= h($prestamo->fechaPrestamo) ?></td>
            <td><?= $this->Number->format($prestamo->cantidaddias) ?></td>
            <td>
                <?= $prestamo->has('usuario') ? $this->Html->link($prestamo->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $prestamo->usuario->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $prestamo->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $prestamo->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $prestamo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prestamo->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
