<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ShortUrls Controller
 *
 * @property \App\Model\Table\ShortUrlsTable $ShortUrls
 */
class ShortUrlsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('shortUrls', $this->paginate($this->ShortUrls));
        $this->set('_serialize', ['shortUrls']);
    }

    /**
     * View method
     *
     * @param string|null $id Short Url id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shortUrl = $this->ShortUrls->get($id, [
            'contain' => []
        ]);
        $this->set('shortUrl', $shortUrl);
        $this->set('_serialize', ['shortUrl']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shortUrl = $this->ShortUrls->newEntity();
        if ($this->request->is('post')) {
            $shortUrl = $this->ShortUrls->patchEntity($shortUrl, $this->request->data);
            $arayka = $this->ShortUrls->find('all');
            $date = date_create();
            $shortUrl['timeStamp'] = date_timestamp_get($date);
           $shortUrl['shortUrl'] = base_convert(count($arayka->all()), 10, 36);;
            if ($this->ShortUrls->save($shortUrl)) {
                $this->Flash->success( 'The short url has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error($shortUrl. 'The short url could not be saved. Please, try again.');
            }


        }
        $this->set(compact('shortUrl')); 
        $this->set('_serialize', ['shortUrl']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Short Url id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shortUrl = $this->ShortUrls->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shortUrl = $this->ShortUrls->patchEntity($shortUrl, $this->request->data);
            if ($this->ShortUrls->save($shortUrl)) {
                $this->Flash->success('The short url has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The short url could not be saved. Please, try again.');
            }
        }
        $this->set(compact('shortUrl'));
        $this->set('_serialize', ['shortUrl']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Short Url id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shortUrl = $this->ShortUrls->get($id);
        if ($this->ShortUrls->delete($shortUrl)) {
            $this->Flash->success('The short url has been deleted.');
        } else {
            $this->Flash->error('The short url could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function jsonadd()
    {
        $this->loadComponent('RequestHandler');

        $shortUrl = $this->ShortUrls->newEntity();
        if ($this->request->is('post')) {
            $shortUrl = $this->ShortUrls->patchEntity($shortUrl, $this->request->data);
            $arayka = $this->ShortUrls->find('all');
            $date = date_create();
            $shortUrl['timeStamp'] = date_timestamp_get($date);
           $shortUrl['shortUrl'] = base_convert(count($arayka->all()), 10, 36);;
            if ($this->ShortUrls->save($shortUrl)) {
                $this->Flash->success( 'The short url has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error($shortUrl. 'The short url could not be saved. Please, try again.');
            }


        }
        $this->layout = false;
        $this->viewClass = '';
        $this->set(compact('shortUrl')); 
        $this->set('_serialize', ['shortUrl']);
    }
    
    
}
