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
        $connection = PDOConnection::getInstance();
        $pdo = $connection->getDriver();
        $stmt = $pdo->prepare('select * from posts');
        $stmt->execute();

        $list_of_post = '';

        if($posts = $stmt->fetchAll())
        {
            foreach($posts as $post)
            {
                $id = $post['id'];
                $title = $post['title'];
                $content = substr($post['content'],0,200);
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
                                </div>
                            </div>
                        </div>
                    </div>";
            }
        }

        $view = new View('layout');
        $view->inject('navbar', 'navbar');
        $postContent = new View('post');
        $postContent->set('listofpost', $list_of_post, false);
        $view->set('content', $postContent->output(), false);
        echo $view->output();
    }
    public function getView($id)
    {

        $connection = PDOConnection::getInstance();
        $pdo = $connection->getDriver();
        $stmt = $pdo->prepare('select * from posts where id = :id');
        $stmt->execute(array('id' => $id));

        $list_of_post = '';
        if($posts = $stmt->fetchAll())
        {
            foreach($posts as $post)
            {
                $id = $post['id'];
                $title = $post['title'];
                $content = substr($post['content'],0,200);
                $list_of_post = $list_of_post.
                    "<div class=\"row\">
                        <div class=\"col s12\">
                            <div class=\"card\">
                                <div class=\"card-content\">
                                    <span class=\"card-title\">$title</span>
                                    <p>$content</p>
                                </div>
                            </div>
                        </div>
                    </div>";
            }
        }


        $view = new View('layout');
        $view->inject('navbar', 'navbar');
        $postContent = new View('post_content');
        $postContent->set('post', $list_of_post, false);
        $view->set('content', $postContent->output(), false);
        echo $view->output();
    }
    public function getCreate()
    {
        $view = new View('layout');
        $view->inject('navbar', 'navbar');
        $view->inject('content', 'post_form');
        echo $view->output();
    }
    public function postCreate()
    {
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

        $username = $user['username'];

        // Filter input
        $judul = strip_tags($_POST['judul']);
        $konten = $purifier->purify($_POST['konten']);

        $connection = PDOConnection::getInstance();
        $result = $connection->insert('posts', [
            'title' => $judul,
            'content' => $konten,
            // TODO: change 1 jadi id user berdasarkan username
            'user_id' => 1,
        ]);

        if($result)
        {
            header('Location: /', true, 200);
        }
        else {
            $error = $connection->getDriver()->errorInfo();
            var_dump($error);

            throw new \RuntimeException("Cannot create post:", 500);
        }
    }
}