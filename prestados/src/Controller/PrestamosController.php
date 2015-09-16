<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Prestamos Controller
 *
 * @property \App\Model\Table\PrestamosTable $Prestamos
 */
class PrestamosController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Usuarios']
        ];
        $this->set('prestamos', $this->paginate($this->Prestamos));
        $this->set('_serialize', ['prestamos']);
    }

    /**
     * View method
     *
     * @param string|null $id Prestamo id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prestamo = $this->Prestamos->get($id, [
            'contain' => ['Usuarios']
        ]);
        $this->set('prestamo', $prestamo);
        $this->set('_serialize', ['prestamo']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $prestamo = $this->Prestamos->newEntity();
        if ($this->request->is('post')) {
            $prestamo = $this->Prestamos->patchEntity($prestamo, $this->request->data);
            if ($this->Prestamos->save($prestamo)) {
                $this->Flash->success(__('The prestamo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The prestamo could not be saved. Please, try again.'));
            }
        }
        $usuarios = $this->Prestamos->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('prestamo', 'usuarios'));
        $this->set('_serialize', ['prestamo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Prestamo id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $prestamo = $this->Prestamos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prestamo = $this->Prestamos->patchEntity($prestamo, $this->request->data);
            if ($this->Prestamos->save($prestamo)) {
                $this->Flash->success(__('The prestamo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The prestamo could not be saved. Please, try again.'));
            }
        }
        $usuarios = $this->Prestamos->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('prestamo', 'usuarios'));
        $this->set('_serialize', ['prestamo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Prestamo id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $prestamo = $this->Prestamos->get($id);
        if ($this->Prestamos->delete($prestamo)) {
            $this->Flash->success(__('The prestamo has been deleted.'));
        } else {
            $this->Flash->error(__('The prestamo could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
