<?php
namespace App\Model\Table;

use App\Model\Entity\Prestamo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Prestamos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Usuarios
 */
class PrestamosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('prestamos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Usuarios', [
            'foreignKey' => 'usuarios_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('aquien');

        $validator
            ->allowEmpty('apellido');

        $validator
            ->allowEmpty('tipoobjeto');

        $validator
            ->allowEmpty('objeto');

        $validator
            ->add('fechaPrestamo', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('fechaPrestamo');

        $validator
            ->add('cantidaddias', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('cantidaddias');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['usuarios_id'], 'Usuarios'));
        return $rules;
    }
}
