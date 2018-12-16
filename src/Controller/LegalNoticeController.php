<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class LegalNoticeController extends AbstractController
{
    /**
     * @Route("/legalnotice")
     */
    public function contact()
    {
        return $this->render('legal-notice.html.twig');
    }


}
?>