<?php
namespace App\Controller;

use App\Entity\Users;
use App\Entity\Post;
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
	private $users;
	private $postApi;
	
    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }
	/**
	 * @Route("/new")
	 */
	public function newUser(): Response
	{
		$this->users = new Users();
		$this->postApi = new Post();
		
		$this->users
		    ->setName(str_repeat('UserName', 1))
            ->setPassword(str_repeat('asd123', 2))
            ->setPostId(random_int(1, $this->postApi->getId))
			->setCreatedAt(new \DateTime())
			->setRole("ROLE_USER");
			
		$entityManager->persist($this->users);
		$entityManager->flush();
		
		return new Response($this->users->getId);
	}


	/**
	 * @Route("")
     */
    public function users(): Response
    {
        $this->users = $this->usersRepository->findAll();
        dd($this->users);
        return new Response();
    }
}
