<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AuthController extends AbstractController
{
    /**
     * @Route("/auth", name="auth")
     */
    /**
     * @var UserRepository $userRepository
     */
    private $userRepository;

    /**
     * AuthController Constructor
     * 
     * @param UserRepository
     */

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Register new user
     * @param Request $request
     * 
     * @return Response 
     */

     public function register(Request $request){
         $newUserData['email'] = $request->get('email');
         $newUserData['password'] = $request->get('password');

         $user = $this->userRepository->createNewUser($newUserData);

         return new Response(sprintf('User %s successfully created', $user->getUsername()));
     }
}
