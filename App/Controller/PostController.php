<?php
/**
 * Created by IntelliJ IDEA.
 * User: akhfa
 * Date: 24/02/16
 * Time: 10:41
 */

namespace App\Controller;

use App\Core\Controller as BaseController;
use App\Core\View;
use App\Core\DB\PDOConnection;
use App\Core\SessionManager;

Class PostController extends BaseController{
    public function index()
    {
        SessionManager::getManager();
        print_r($_SESSION);
        $connection = PDOConnection::getInstance();
        $pdo = $connection->getDriver();
        $stmt = $pdo->prepare('select * from posts ORDER BY created_at DESC');
        $stmt->execute();

        $list_of_post = '';

        $logged_in = $this->isLoggedIn();

        if($posts = $stmt->fetchAll())
        {
            foreach($posts as $post)
            {
                $id = $post['id'];
                $title = $post['title'];
                $date = substr($post['created_at'],0,10);
                $content = "$date<br>".substr($post['content'],0,200);

                // cek logged_in buat link edit dan delete
                $action_edit = '';
                $action_delete = '';
                if($logged_in)
                {
                    $action_edit = "<a href=\"/post/edit/$id\">Edit</a>";
                    $action_delete = "<a href=\"/post/delete/$id\">Delete</a>";
                }

                if($post['files_id'] != NULL && $post['files_id'] != 0)
                {
                    $connection = PDOConnection::getInstance();
                    $pdo = $connection->getDriver();
                    $stmt = $pdo->prepare('select path from files where id = :id');
                    $stmt->execute(array('id' => $post['files_id']));

                    $file = $stmt->fetchAll();
                    $path = substr($file[0]['path'],7);

                    $list_of_post = $list_of_post.
                        "<div class=\"row\">
                        <div class=\"col s12\">
                            <div class=\"card\">
                            <div class=\"card-image\">
                              <img src=\"$path\">
                              <span class=\"card-title\">$title</span>
                            </div>
                                <div class=\"card-content\">
                                    <p>$content</p>
                                </div>
                                <div class=\"card-action\">
                                    <a href=\"/post/view/$id\">Read more</a>
                                    $action_edit
                                    $action_delete
                                </div>
                            </div>
                        </div>
                    </div>";
                }
                else
                {
                    $list_of_post = $list_of_post.
                        "<div class=\"row\">
                        <div class=\"col s12\">
                            <div class=\"card\">
                                <div class=\"card-content\">
                                    <span class=\"card-title\">$title</span>
                                    <p>$content</p>
                                </div>
                                <div class=\"card-action\">
                                    <a href=\"/post/view/$id\">Read more</a>
                                    $action_edit
                                    $action_delete
                                </div>
                            </div>
                        </div>
                    </div>";
                }
            }
        }

        $view = new View('layout');
        if($logged_in)
        {
            $navbar = new View('navbar.auth');
            $navbar->set('username', $_SESSION['user']['username']);
            $view->set('navbar', $navbar->output(),false);
        }
        else
        {
            $view->inject('navbar', 'navbar');
        }
        $postContent = new View('post');
        $postContent->set('listofpost', $list_of_post, false);
        $view->set('content', $postContent->output(), false);
        echo $view->output();
    }
    public function getView($id)
    {
        $logged_in = $this->isLoggedIn();
        $connection = PDOConnection::getInstance();
        $pdo = $connection->getDriver();
        $stmt = $pdo->prepare('select * from posts where id = :id');
        $stmt->execute(array('id' => $id));

        $postContent = new View('one_post');
        $one_post = '';
        if($post = $stmt->fetchAll())
        {
            $id = $post[0]['id'];
            $title = $post[0]['title'];
            $date = substr($post[0]['created_at'],0,10);
            $content = "$date<br>".$post[0]['content'];

            // cek logged_in buat link delete
            $action_edit = '';
            $action_delete = '';
            if($logged_in)
            {
                $action_edit = "<a href=\"/post/edit/$id\">Edit</a>";
                $action_delete = "<a href=\"/post/delete/$id\">Delete</a>";
            }

            if($post[0]['files_id'] != NULL && $post[0]['files_id'] != 0)
            {
                $connection = PDOConnection::getInstance();
                $pdo = $connection->getDriver();
                $stmt = $pdo->prepare('select path from files where id = :id');
                $stmt->execute(array('id' => $post[0]['files_id']));

                $file = $stmt->fetchAll();
                $path = substr($file[0]['path'],7);
                $one_post = $one_post.
                    "<div class=\"row\">
                        <div class=\"col s12\">
                            <div class=\"card\">
                                <div class=\"card-image\">
                                  <img src=\"$path\">
                                  <span class=\"card-title\">$title</span>
                                </div>
                                <div class=\"card-content\">
                                    <p>$content</p>
                                </div>
                                <div class=\"card-action\">
                                    $action_edit
                                    $action_delete
                                </div>
                            </div>
                        </div>
                    </div>";
            }
            else
            {
                $one_post = $one_post.
                    "<div class=\"row\">
                    <div class=\"col s12\">
                        <div class=\"card\">
                            <div class=\"card-content\">
                                <span class=\"card-title\">$title</span>
                                <p>$content</p>
                            </div>
                            <div class=\"card-action\">
                                $action_edit
                                $action_delete
                            </div>
                        </div>
                    </div>
                </div>";
            }

            $stmt = $pdo->prepare('select * from comments where post_id = :id ORDER BY created_at DESC');
            $stmt->execute(array('id' => $id));
            $comments_string = '';
            if($comments = $stmt->fetchAll())
            {
                foreach($comments as $comment)
                {
                    $comment_title = $comment['title'];
                    $comment_body = $comment['content'];
                    $comments_string = $comments_string.
                        "<div class=\"divider\"></div>
                        <div class=\"section\">
                            <h5>$comment_title</h5>
                            <p>$comment_body</p>
                        </div>";
                }
            }
            $postContent->set('comments', $comments_string, false);
            $postContent->set('post', $one_post, false);
            $comment_form = new View('comment_form');
            $comment_form->set('form_url',"/comment/create/$id");

            $postContent->set('comment_form', $comment_form->output(),false);
        }
        else
        {
            $postContent->set('comments', '', false);
            $postContent->inject('post', 'not_found_card');
            $postContent->set('comment_form', '',false);
        }
        $view = new View('layout');
        if($logged_in)
        {
            $navbar = new View('navbar.auth');
            $navbar->set('username', $_SESSION['user']['username']);
            $view->set('navbar', $navbar->output(),false);
        }
        else
        {
            $view->inject('navbar', 'navbar');
        }
        $view->set('content', $postContent->output(), false);

        // csrf
        $manager = SessionManager::getManager();
        $manager->generateCsrfToken();

        echo $view->output();
    }
    public function getCreate()
    {
        $logged_in = $this->isLoggedIn();
        if(!$logged_in)
        {
            $this->redirect('/auth/login');
        }

        $view = new View('layout');

        $navbar = new View('navbar.auth');
        $navbar->set('username', $_SESSION['user']['username']);
        $view->set('navbar', $navbar->output(),false);

        $post_form = new View('post_form');
        $post_form->set('form_title', 'Membuat post');
        $post_form->set('form_url', '/post/create');
        $post_form->set('title_value', '');
        $post_form->set('content_value', '', false);

        $view->set('content', $post_form->output(), false);

        // csrf
        $manager = SessionManager::getManager();
        $manager->generateCsrfToken();

        echo $view->output();
    }
    public function postCreate()
    {
        $logged_in = $this->isLoggedIn();
        if(!$logged_in)
        {
            $this->redirect('/auth/login');
        }

        if(!$this->csrf_valid())
            throw new \RuntimeException("CSRF token error.", 400);

        // Set html purifier
        require_once ROOT_PATH.'/App/library/HTMLPurifier.auto.php';
        $purifier = new \HTMLPurifier();

        if (!isset($_POST)) {
            throw new \RuntimeException("No data posted.", 400);
        }
//
        if (!isset($_POST['judul']) or !isset($_POST['konten'])) {
            throw new \RuntimeException("Missing title or konten.", 400);
        }

        $post_id = 0;
        $files_id = 0;
        $upload_status = 0;

        $session = SessionManager::getManager();
        $user = $session->get('user');
        $user_id = $user['id'];

        $connection = PDOConnection::getInstance();

        if($_FILES['image']['name'] != NULL)
        {
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
            $expensions= array("png");

            if(in_array($file_ext,$expensions)=== false){
                print_r($_FILES);
                throw new \RuntimeException("File not allowed. png only.", 500);
            }

            if(!getimagesize($file_tmp))
            {
                throw new \RuntimeException("File not allowed. png only.", 500);
            }

            if($file_type != 'image/png')
            {
                throw new \RuntimeException("File not allowed. png only.", 500);
            }

            move_uploaded_file($file_tmp,ROOT_PATH."/public/images/$file_name");

            $result = $connection->insert('files', [
                'path' => "/public/images/$file_name",
                'size' => $file_size,
                'mime' => $file_type,
            ]);
            if($result)
            {
                $files_id = $connection->get_last_inserted_id();
            }
        }

        // Filter input
        $judul = strip_tags($_POST['judul']);
        $konten = $purifier->purify($_POST['konten']);

        $result = $connection->insert('posts', [
            'title' => $judul,
            'content' => $konten,
            'files_id' => $files_id,
            'user_id' => $user_id,
        ]);

        if($result)
        {
            header('Location: /post', true, 301);
        }
        else {
            $error = $connection->getDriver()->errorInfo();
            var_dump($error);

            throw new \RuntimeException("Cannot create post:", 500);
        }
    }

    public function getEdit($id)
    {
        $logged_in = $this->isLoggedIn();
        if(!$logged_in)
        {
            $this->redirect('/auth/login');
        }

        $view = new View('layout');
        if($logged_in)
        {
            $navbar = new View('navbar.auth');
            $navbar->set('username', $_SESSION['user']['username']);
            $view->set('navbar', $navbar->output(),false);
        }
        else
        {
            $view->inject('navbar', 'navbar');
        }

        $connection = PDOConnection::getInstance();
        $pdo = $connection->getDriver();
        $stmt = $pdo->prepare('select * from posts where id = :id');
        $stmt->execute(array('id' => $id));

        if($post = $stmt->fetchAll())
        {
            $image_path = NULL;
            //get picture path
            $stmt = $pdo->prepare('select path from files where post_id = :post_id');
            $stmt->execute(array('post_id' => $id));

            if($files = $stmt->fetchAll())
                $image_path = $files[0]['path'];

            $id = $post[0]['id'];
            $title = $post[0]['title'];
            $content = $post[0]['content'];

            $post_form = new View('post_form');
            $post_form->set('form_title', 'Edit post');
            $post_form->set('form_url', "/post/edit/$id");
            $post_form->set('title_value', $title);
            $post_form->set('content_value', $content);

            $view->set('content', $post_form->output(), false);
        }
        else
        {
            $view->inject('content', 'not_found_card');
        }

        // csrf
        $manager = SessionManager::getManager();
        $manager->generateCsrfToken();

        echo $view->output();
    }

    public function postEdit($id)
    {
        $logged_in = $this->isLoggedIn();
        if(!$logged_in)
        {
            $this->redirect('/auth/login');
        }

        if(!$this->csrf_valid())
            throw new \RuntimeException("CSRF token error.", 400);

        // Set html purifier
        require_once ROOT_PATH.'/App/library/HTMLPurifier.auto.php';
        $purifier = new \HTMLPurifier();

        if (!isset($_POST)) {
            throw new \RuntimeException("No data posted.", 400);
        }
//
        if (!isset($_POST['judul']) or !isset($_POST['konten'])) {
            throw new \RuntimeException("Missing title or konten.", 400);
        }

        $session = SessionManager::getManager();
        $user = $session->get('user');
        $user_id = $user['id'];

        // Filter input
        $judul = strip_tags($_POST['judul']);
        $konten = $purifier->purify($_POST['konten']);

        $connection = PDOConnection::getInstance();
        $pdo = $connection->getDriver();
        $stmt = $pdo->prepare('update posts set title = :title, content = :content, user_id = :user_id where id = :id');
        $stmt->bindParam(':title', $judul);
        $stmt->bindParam(':content', $konten);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':id', $id);

        if($stmt->execute())
        {
            header("Location: /post/view/$id", true, 301);
        }
        else
        {
            $error = $connection->getDriver()->errorInfo();
            var_dump($error);

            throw new \RuntimeException("Cannot edit post:", 500);
        }
    }

    public function getDelete($id)
    {
        $logged_in = $this->isLoggedIn();
        if(!$logged_in)
        {
            $this->redirect('/auth/login');
        }

        if (!isset($_POST)) {
            throw new \RuntimeException("No data posted.", 400);
        }

        // inisialisasi files id
        $file_id = 0;
        $connection = PDOConnection::getInstance();
        $pdo = $connection->getDriver();

        // get files id dari post yang mau dihapus
        $stmt = $pdo->prepare('select files_id from posts where id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $files = $stmt->fetchAll();
        $file_id = $files[0]['files_id'];

        // get image path
        $stmt = $pdo->prepare('select path from files where id = :file_id');
        $stmt->bindParam(':file_id', $file_id);
        $stmt->execute();
        $files = $stmt->fetchAll();
        $path = $files[0]['path'];

        //delete image file and database
        $stmt = $pdo->prepare('delete from files where id = :file_id');
        $stmt->bindParam(':file_id', $file_id);
        $stmt->execute();
        unlink(ROOT_PATH.$path);

        // delete post
        $stmt = $pdo->prepare('delete from posts where id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        header("Location: /post", true, 301);
    }

    public function postCreateComment($post_id)
    {
        // Set html purifier
        require_once ROOT_PATH.'/App/library/HTMLPurifier.auto.php';
        $purifier = new \HTMLPurifier();

        if (!isset($_POST)) {
            throw new \RuntimeException("No data posted.", 400);
        }

        if(!$this->csrf_valid())
            throw new \RuntimeException("CSRF token error.", 400);
//
        if (!isset($_POST['name']) or !isset($_POST['title']) or !isset($_POST['email']) or !isset($_POST['content'])) {
            throw new \RuntimeException("Missing name or email or konten.", 400);
        }

        // Filter input
        $name = strip_tags($_POST['name']);
        $title = strip_tags($_POST['title']);
        $email = strip_tags($_POST['email']);
        $content = $purifier->purify($_POST['content']);

        $connection = PDOConnection::getInstance();
        $result = $connection->insert('comments', [
            'name' => $name,
            'title' => $title,
            'email' => $email,
            'content' => $content,
            'post_id' => $post_id,
        ]);

        if($result)
        {
            header("Location: /post/view/$post_id", true, 301);
        }
        else
        {
            print_r($_POST);
            $error = $connection->getDriver()->errorInfo();
            var_dump($error);

            throw new \RuntimeException("Cannot create comment:", 500);
        }
    }

    private function isLoggedIn()
    {
        $logged_in = false;
        $session = SessionManager::getManager();

        if ($session->isLoggedIn()) {
            $logged_in = true;
        }

        $rememberToken = null;
        if (isset($_COOKIE) && isset($_COOKIE['remember_token'])) {
            try {
                $encrypter = Encrypter::getInstance();
                $rememberToken = $encrypter->decrypt($_COOKIE['remember_token']);
            } catch (DecryptException $e) {
                // the cookie is invalid!
                $rememberToken = null;

                // unset the cookie
                setcookie('remember_token', '', 1);
            }
        }

        if ($rememberToken) {
            $connection = PDOConnection::getInstance();
            $user = $connection->selectOne('users', [
                'remember_token' => $rememberToken
            ]);

            if ($user) {
                // log in the user
                $session->destroy();
                $session->start();

                $session->set('user', $user);
                $logged_in = true;
            } else {

                // unset the cookie
                setcookie('remember_token', '', 1);
            }
        }
        return $logged_in;
    }

    private function csrf_valid()
    {
        $session = SessionManager::getManager();
        // check the CSRF token
        $fetchedCsrf = null;
        if (isset($_POST['csrf_token'])) {
            $fetchedCsrf = $_POST['csrf_token'];
        } elseif (isset($_SERVER['HTTP_X_CSRF_TOKEN'])) {
            $fetchedCsrf = $_SERVER['HTTP_X_CSRF_TOKEN'];
        }

        return !$fetchedCsrf || !$session->checkCsrf($fetchedCsrf);
    }
}