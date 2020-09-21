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
class UsersController extends AbstractController
{

    private $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

	/**
     * @Route("/new", name="users", methods={"GET", "POST"})
     */
    public function addPost(Request $request, EntityManagerInterface $entityManager)
	{
	    $users = new Users();
	    $users
            ->setName('Foo')
            ->setPassword(str_repeat('Qwerty',2))
            ->setCreatedAt(new \DateTime())
			->setRole('ROLE_USER');
			
	    $entityManager->persist($users);
        $entityManager->flush();

        return new Response($users->getId());
    }

    /**
     * @Route("", methods={"GET"})
     */
    public function users(): Response
    {
        $users = $this->usersRepository->findAll();
        dd($users);
        return new Response();
    }
}
