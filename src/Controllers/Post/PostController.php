<?php

namespace App\Controllers\Post;

use App\Entity\Database;
use App\Repository\PostRepository;
use App\Repository\CommentRepository;
use App\Controllers\Controller;

class PostController extends Controller
{
    private PostRepository $postRepository;

    public function __construct($twig)
    {
        parent::__construct($twig);
        $connection = new Database();
        $this->postRepository = new PostRepository();
        $this->postRepository->connection = $connection;
    }

    public function execute(int $id)
    {
        $post = $this->postRepository->getPost($id);

        $commentRepository = new CommentRepository();
        $commentRepository->connection = $connection;
        $comments = $commentRepository->getComments($id);

        $this->twig->display('post/index.html.twig', [
            'post' => $post,
            'comments' => $comments
        ]);
    }
}
