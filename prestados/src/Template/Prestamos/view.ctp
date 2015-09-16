<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Prestamo'), ['action' => 'edit', $prestamo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Prestamo'), ['action' => 'delete', $prestamo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prestamo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Prestamos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prestamo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="prestamos view large-10 medium-9 columns">
    <h2><?= h($prestamo->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Apellido') ?></h6>
            <p><?= h($prestamo->apellido) ?></p>
            <h6 class="subheader"><?= __('Usuario') ?></h6>
            <p><?= $prestamo->has('usuario') ? $this->Html->link($prestamo->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $prestamo->usuario->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($prestamo->id) ?></p>
            <h6 class="subheader"><?= __('Cantidaddias') ?></h6>
            <p><?= $this->Number->format($prestamo->cantidaddias) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('FechaPrestamo') ?></h6>
            <p><?= h($prestamo->fechaPrestamo) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Aquien') ?></h6>
            <?= $this->Text->autoParagraph(h($prestamo->aquien)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Tipoobjeto') ?></h6>
            <?= $this->Text->autoParagraph(h($prestamo->tipoobjeto)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Objeto') ?></h6>
            <?= $this->Text->autoParagraph(h($prestamo->objeto)) ?>
        </div>
    </div>
</div>
