<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {
    public $layout = 'BootstrapPost';
    

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('add', 'logout');
    }
    
    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl('/Posts'));
            }
            $this->Flash->error(__('Nome de usuário ou senha inválidos, tente novamente'));
        }
    }
    
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
        
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário invalido'));
        }
        $this->set('user', $this->User->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('O usuário foi salvo'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('O usuário não pôde ser salvo. Por favor, tente novamente.')
            );
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário invalido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('O usuário foi salvo'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('O usuário não pôde ser salvo. Por favor, tente novamente.')
            );
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        // Prior to 2.5 use
        // $this->request->onlyAllow('post');

        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário invalido'));
        }
        if ($this->User->delete()) {
            $this->Flash->success(__('Usuário excluído'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('O usuário não foi excluído'));
        return $this->redirect(array('action' => 'index'));
    }

}

