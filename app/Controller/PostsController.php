<?php
class PostsController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');
    public $layout = 'BootstrapPost';

    public $paginate = array(
        'fields' => array('Post.id', 'Post.title', 'Post.created', 'Post.created', 'Post.user_id', 'Post.body', 'Post.ativo'),
        'conditions' => array(),
        'limit' => 10,
        'order' => array('Post.id' => 'asc')
    );
    public function index() {   
        if ($this->request->isPost() && !empty($this->request->data['Post']['title'])) {
            $this->paginate['conditions']['Post.title LIKE'] = trim($this->request->data['Post']['title']) . '%';
        }
        //Filtro de data
        if (!empty($this->request->data['Post']['created'])) {
            $this->paginate['conditions']['Post.created'] = $this->request->data['Post']['created'];
        }

        $posts = $this->paginate();
        $this->set('posts', $posts);
    }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Postagem inválida'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Postagem inválida'));
        }
        $this->set('post', $post);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success(__('Sua postagem foi salva.'));
                return $this->redirect(array('action' => 'index'));
            }
        }
    }
    
    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Postagem inválida'));
        }
    
        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Postagem inválida'));
        }
    
        if ($this->request->is(array('post', 'put'))) {
            $this->Post->id = $id;
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success(__('Postagem aterado com sucesso.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Post não pode ser alterado.'));
        }
    
        if (!$this->request->data) {
            $this->request->data = $post;
        }
    }
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Post->delete($id)) {
            $this->Flash->success(
                __('A postagem com id: %s foi excluída.', h($id))
            );
        } else {
            $this->Flash->error(
                __('A postagem com id: %s não pôde ser excluída..', h($id))
            );
        }
        return $this->redirect(array('action' => 'index'));
    }
    public function isAuthorized($user) {
        // All registered users can add posts
        if ($this->action === 'add') {
            return true;
        }
    
        // The owner of a post can edit and delete it
        if (in_array($this->action, array('edit', 'delete', 'ativar', 'desativar'))) {
            $postId = (int) $this->request->params['pass'][0];
            if ($this->Post->isOwnedBy($postId, $user['id'])) {
                return true;
            }
        }
    
        return parent::isAuthorized($user);
    }

}