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

        $postContent = new View('one_post');
        $one_post = '';
        if($post = $stmt->fetchAll())
        {
            $id = $post[0]['id'];
            $title = $post[0]['title'];
            $content = $post[0]['content'];
            $one_post = $one_post.
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

            $stmt = $pdo->prepare('select * from comments where post_id = :id');
            $stmt->execute(array('id' => $id));
            $comments_string = '';
            if($comments = $stmt->fetchAll())
            {
                foreach($comments as $comment)
                {
                    $comment_title = $comment['judul'];
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
        }

        $postContent->set('post', $one_post, false);

        $comment_form = new View('comment_form');
        $comment_form->set('form_url','/comment/create');

        $postContent->set('comment_form', $comment_form->output(),false);
        $view = new View('layout');
        $view->inject('navbar', 'navbar');
        $view->set('content', $postContent->output(), false);
        echo $view->output();
    }
    public function getCreate()
    {
        $view = new View('layout');
        $view->inject('navbar', 'navbar');

        $post_form = new View('post_form');
        $post_form->set('form_title', 'Membuat post');
        $post_form->set('form_url', '/post/create');
        $post_form->set('title_value', '');
        $post_form->set('content_value', '', false);

        $view->set('content', $post_form->output(), false);
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
        $view = new View('layout');
        $view->inject('navbar', 'navbar');

        $connection = PDOConnection::getInstance();
        $pdo = $connection->getDriver();
        $stmt = $pdo->prepare('select * from posts where id = :id');
        $stmt->execute(array('id' => $id));

        if($post = $stmt->fetchAll())
        {
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

        echo $view->output();
    }

    public function postEdit($id)
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
        // TODO: ganti 1 jadi user idnya username;
        $user_id = 1;

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
}