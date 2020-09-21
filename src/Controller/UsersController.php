<?php
namespace App\Controller;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/users")
 */
class PostController extends AbstractController
{
    private $usersRepository;

    public function __construct(PostRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function posts(): Response
    {
        $users = $this->usersRepository->findAll();
        dd($users);
        return new Response();
    }
}
