<?php

declare(strict_types=1);
namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function initialize(): void
    {
        $this->Model = $this->loadModel('Posts');
        $this->Model = $this->loadModel('Comments');
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');
    }


    public function index()
        {
            $this->viewBuilder()->setLayout('myprofile');
            $this->paginate = [
                'contain' => ['Users'],
            ];
            $posts = $this->paginate($this->Posts);
            // echo '<pre>';
            // $post = $this->Posts->find('all', ['order' => ['id' => 'DESC']]);
        // print_r($post);
        // die;
            $this->set(compact('posts'));
        }
        public function listuser()
    {
        $this->viewBuilder()->setLayout('myprofile');

        $this->paginate = [
            'contain' => ['Posts'],
        ];
        $users = $this->Users->find('all', ['order' => ['id' => 'DESC']]);
        $users = $this->paginate($this->Users);
        // print_r($users);die;
        $this->set(compact('users'));
    }
    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));
    }
    public function userprofile($uid=null)
    {
        $this->viewBuilder()->setLayout('myprofile');
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $user = $this->Users->get($uid, [
            'contain' => ['Posts'],
        ]);
        // $post=TableRegistry::get("Posts");
        $count= $this->Posts->find()->where(['user_id' => $uid])->count();
        // echo '<pre>';
        // print_r($user);
        // die;
        $this->set(compact('user','count'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
        $this->viewBuilder()->setLayout('mydefault');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {

            // print_r($user);
            // die;
            $data = $this->request->getData();
            $productImage = $this->request->getData("image");
            $fileName = $productImage->getClientFilename();
            $data["image"] = $fileName;
            $user = $this->Users->patchEntity($user, $data);
          
            if ($this->Users->save($user)) {
                $hasFileError = $productImage->getError();

                if ($hasFileError > 0) {
                    // no file uploaded
                    $data["image"] = "";
                } else {
                    // file uploaded
                    $fileType = $productImage->getClientMediaType();

                    if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                        $imagePath = WWW_ROOT . "img/" . $fileName;
                        $productImage->moveTo($imagePath);
                        $data["image"] = $fileName;
                    }
                }
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'addpost']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }


    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('myprofile');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);


          $fileName2 = $user['image'];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $productImage = $this->request->getData("image");
            $fileName = $productImage->getClientFilename();
            // print_r($fileName);die();
            if($fileName == ''){
                $fileName = $fileName2;
            }
            // print_r($file);die();
            $data["image"] = $fileName;
            $user = $this->Users->patchEntity($user, $data);
            // $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $hasFileError = $productImage->getError();
                if ($hasFileError > 0) {
                    // no file uploaded
                    $data["image"] = "";
                } else {
                    // file uploaded
                    $fileType = $productImage->getClientMediaType();
                    if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                        $imagePath = WWW_ROOT . "img/" . $fileName;
                        $productImage->moveTo($imagePath);
                        $data["image"] = $fileName;
                    }
                }
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'userprofile']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        $this->Users->Posts->deleteAll(array('user_id' => $id));
        $this->Users->Comments->deleteAll(array('user_id' => $id));
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    // post  crud


    public function viewpost($id = null, $user_id = null)
    {
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $post = $this->Posts->get($id, [
            'contain' => ['Users', 'Comments'],
        ]);
        // $cname = $this->Comments->get( [
        //     'contain' => ['Users'],
        // ]);
        // echo '<pre>';
        // print_r($cname);
        // die;
        $post['user_id'] = $user_id;
        $comment = $this->Comments->newEmptyEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            
            $data['post_id'] = $id;
            $data['user_id'] = $uid;
            
            
            $comment = $this->Comments->patchEntity($comment, $data);
            if ($this->Comments->save($comment)) {
                $this->Flash->success(__('The comment has been saved.'));
                return $this->redirect(['action' => 'viewpost', $id, $uid]);
            }
            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
        }
        // $comment = $this->Comments->get($uid, [
        //     'contain' => ['Users'],
        // ]);


        $this->set(compact('post', 'comment'));
    }
    // public function viewpost($id = null, $user_id = null)
    // {
    //     $this->paginate = [
    //         'contain' => ['Users'],
    //     ];
    //     $user = $this->Authentication->getIdentity();
    //     $uid = $user->id;
    //     $post = $this->Posts->get($id, [
    //         'contain' => ['Users', 'Comments'],
    //     ]);
    //     // $cname = $this->Comments->find('all', ['order' => ['id' => 'DESC']]);
    //     $cname = $this->paginate($this->Comments);
    //     // echo '<pre>';
    //     // print_r($cname);
    //     // die;
        


    //     $post['user_id'] = $user_id;
    //     $comment = $this->Comments->newEmptyEntity();
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $data = $this->request->getData();
            
    //         $data['post_id'] = $id;
    //         $data['user_id'] = $uid;
            
            
    //         $comment = $this->Comments->patchEntity($comment, $data);
    //         if ($this->Comments->save($comment)) {
    //             $this->Flash->success(__('The comment has been saved.'));
    //             return $this->redirect(['action' => 'viewpost', $id, $uid]);
    //         }
    //         $this->Flash->error(__('The comment could not be saved. Please, try again.'));
    //     }
    //     // $comment = $this->Comments->get($uid, [
    //         //     'contain' => ['Users'],
    //         // ]);


    //     $this->set(compact('post', 'comment','cname'));
    // }


    public function addpost()
    {
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $post = $this->Posts->newEmptyEntity();
        $post['user_id'] = $uid;
        if ($this->request->is('post')) {


            $data = $this->request->getData();
            $productImage = $this->request->getData("image");
            $fileName = $productImage->getClientFilename();
            $data["image"] = $fileName;
            $post = $this->Posts->patchEntity($post, $data);



            
            if ($this->Posts->save($post)) {

                $hasFileError = $productImage->getError();

                if ($hasFileError > 0) {
                    // no file uploaded
                    $data["image"] = "";
                } else {
                    // file uploaded
                    $fileType = $productImage->getClientMediaType();

                    if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                        $imagePath = WWW_ROOT . "img/" . $fileName;
                        $productImage->moveTo($imagePath);
                        $data["image"] = $fileName;
                    }
                }

                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $this->set(compact('post'));
    }
    public function editpost($id = null, $user_id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => [],
        ]);
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $fileName2 = $post['image'];

        // echo '<pre>';print_r($post);die;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $productImage = $this->request->getData("image");
            $fileName = $productImage->getClientFilename();
            if ($fileName == '') {
                $fileName = $fileName2;
            }

            $data["image"] = $fileName;
            $user = $this->Users->patchEntity($post, $data);
            if ($this->Posts->save($post)) {

                $hasFileError = $productImage->getError();
                if ($hasFileError > 0) {
                    $data["image"] = "";
                } else {
                    $fileType = $productImage->getClientMediaType();

                    if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                        $imagePath = WWW_ROOT . "img/" . $fileName;
                        $productImage->moveTo($imagePath);
                        $data["image"] = $fileName;
                    }
                }

                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['controller' => 'users', 'action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $this->set(compact('post'));
    }
    public function postdelete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        $this->Posts->Comments->deleteAll(array('post_id' => $id));
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'users', 'action' => 'index']);
    }




    // login
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login','add','forgot','reset','getotp']);
    }

    public function login()
    {
        $this->viewBuilder()->setLayout('mydefault');
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            // redirect to users after login success
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Users',
                'action' => 'index',
            ]);
            

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }
    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    public function commentdelete($id = null, $post_id)
    {
        {
            $user = $this->Authentication->getIdentity();
            $uid = $user->id;
            $this->request->allowMethod(['post', 'delete']);
            $comment = $this->Comments->get($id);
            if ($this->Comments->delete($comment)) {
                $this->Flash->success(__('The comment has been deleted.'));
            } else {
                $this->Flash->error(__('The comment could not be deleted. Please, try again.'));
            }
    
            return $this->redirect(['action' => 'viewpost', $post_id,$uid]);
        }
    }
    //forgot password
    public function forgot()
    {
        $this->viewBuilder()->setLayout('myprofile');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $email = $this->request->getData('email');
            $user->email = $email;
            $result = $this->Users->checkEmailExist($email);
            if ($result) {
            $token = rand(10000, 99999);
            $result = $this->Users->insertToken($email, $token);

                $mailer = new Mailer('default');
                $mailer->setTransport('gmail'); //your email configuration name
                $mailer->setFrom(['kunal02chd@gmail.com' => 'Code The Pixel']);
                $mailer->setTo($email);
                $mailer->setEmailFormat('html');
                $mailer->setSubject('O.T.P');
                $mailer->deliver("$token is your one time password for animeclub");

                $this->Flash->success(__('Reset email send successfully.'));

                return $this->redirect(['action' => 'getotp']);
            }
            $this->Flash->error(__('Please enter valid credential..'));
        }
        $this->set(compact('user'));
    }

     
    public function getotp()
    {
        
        $this->viewBuilder()->setLayout('myprofile');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            
            $token = $this->request->getData('token');
            $result = $this->Users->checktokenexist($token);
           
            if ($result) {
                $session = $this->getRequest()->getSession(); //get session
                $session->write('token', $token); //write name value to session
                return $this->redirect(['action' => 'reset']);
            }
            $this->Flash->error(__('Please enter valid password'));
        // } else {
        //     return $this->redirect(['action' => 'login']);
        }
        $this->set(compact('user'));
    }
    public function reset()
    {
        $session = $this->request->getSession(); //read session data
        if ($session->read('token') != null) {
        } else {
            $this->redirect(['action' => 'login']);
        } 
            $token=$session->read('token');
            $user = $this->Users->newEmptyEntity();
            if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $password = $this->request->getData('password');
            $confirm_password = $this->request->getData('confirm_password');
            // echo '<pre>';
            // print_r($confirm_password);
            // print_r($password);
            // die;
                if($password == $confirm_password){
                $res = $this->Users->resetPassword($token, $password);
                if ($res) {
                    $session->destroy();
                    $this->Flash->success(__('Password updated successfully.'));
                    return $this->redirect(['action' => 'login']);
                }
            }
                $this->Flash->error(__('Please enter valid password'));   
        }
        $this->set(compact('user'));
    }
    public $paginate = [
        'limit'=>25,
        'order' => [
            'Posts.id' => 'DESC'
        ]
    ];
}
