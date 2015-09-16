<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $prestamo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $prestamo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Prestamos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="prestamos form large-10 medium-9 columns">
    <?= $this->Form->create($prestamo) ?>
    <fieldset>
        <legend><?= __('Edit Prestamo') ?></legend>
        <?php
            echo $this->Form->input('aquien');
            echo $this->Form->input('apellido');
            echo $this->Form->input('tipoobjeto');
            echo $this->Form->input('objeto');
            echo $this->Form->input('fechaPrestamo');
            echo $this->Form->input('cantidaddias');
            echo $this->Form->input('usuarios_id', ['options' => $usuarios]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
