<?php
namespace App\Controller;
use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;

ini_set("SMTP", "smtp.gmail.com");
ini_set("smtp_port",465);
ini_set("smtp_username","esther.m.e.meyer@gamil.com");
ini_set("smtp_password","ornithorynque");
ini_set("smtpSecure","ssl");



class ContactController extends AbstractController
{
    /**
     * @Route("/contact")
     */
    public function contact()
    {
        return $this->render('contact.html.twig');

    }

    /**
     * @Route("/contact/form")
     */
    public function post(Request $request, $errors = null, \Swift_Mailer $mailer)
    {
        /*if(isset($_POST['Submit']))*/
        if ($request->isMethod('POST')){
            $name= $_POST['name'];
            $email= $_POST['email'];
            $message = $_POST['message'];



            if ($email != ""){
                $email= filter_var($email, FILTER_SANITIZE_EMAIL);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors .= 'Adresse mail invalide. <br/><br/>';
                }
            } else {
                $errors .= 'Veuillez entrer votre adresse mail. <br/>';
            }

            if ($name != ""){
                $name = filter_var($name, FILTER_SANITIZE_STRING);
                if ($name == "") {
                    $errors .= 'Nom invalide.<br/><br/>';
                }
            }
            else {
                $errors .= 'Veuillez entrer votre nom.<br/>';
            }

            if ($message != ""){
                $message = filter_var($message, FILTER_SANITIZE_STRING);
                if ($message == "") {
                    $errors .= 'Message invalide.<br/>';
                }
            }
            else {
                $errors .= 'Veuillez entrer votre message.<br/>';
            }

            if (!$errors) {

                $mail = (new \Swift_Message('Prise de contact depuis le site'))
                    ->setFrom($email, $name)
                    ->setTo('sarah.meyer.osteo@gmail.com')
                    ->setBody("\n Nom de l'expéditeur: \n".$name ."\n Adresse e-mail de l'expéditeur: \n" .$email ."\n \n \n Message: \n" .$message);


                $mailer->send($mail);
            } else {
                echo '<div style="color: red">' . $errors . '<br/></div>';
            }


            return $this->redirectToRoute('contact');

        }
    }


}
?>