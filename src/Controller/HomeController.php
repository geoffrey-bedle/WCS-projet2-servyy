<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Model\ServiceManager;
use App\Model\UserManager;

class HomeController extends AbstractController
{

    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $serviceManager = new ServiceManager();
        $services = $serviceManager->selectRandom();

        $userManager = new UserManager();
        $users = $userManager->selectBestRate();

        return $this->twig->render('Home/index.html.twig', [
            'services' => $services,
            'users' => $users
        ]);
    }
}
