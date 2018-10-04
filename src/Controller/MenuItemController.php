<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class MenuItemController extends AbstractController
{
    /**
     * @Route("/menu")
     */
    use PDO;
    public function menu()
    {
        $pdo = PDO::getInstance();
        $req= "";
        $pdo->prepare($req);
        $pdo->execute();

         return $this->render('menu.html.twig');
    }
}


?>