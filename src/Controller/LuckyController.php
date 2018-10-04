<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/number")
     */


    public function number()
    {
        $number = random_int(0,100);

        if($number < 10)
        {
            return $this->render('number.html.twig', ['number' => $number,]);
        }
        else if($number > 10 && $number < 50)
        {
            return $this->render('number.html.twig', ['number' => $number,]);
        }
        else
        {
            return $this->render('number.html.twig', ['number' => $number,]);
        }
    }
}


?>