<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class MailController extends AbstractController
{
    /**
     * @Route("/contact/mail")
     */
    public function menu($message)
    {

        return $this->render('confirm-mail.html.twig');
    }
}


?>