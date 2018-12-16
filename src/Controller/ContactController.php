<?php
namespace App\Controller;
use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact")
     */
    public function contact()
    {
        return $this->render('contact.html.twig');

    }

    public function post(Request $request, $errors)
    {
        /*if(isset($_POST['Submit']))*/
        if ($request->isMethod('POST')){
            $name= $_POST['name'];
            $email= $_POST['email'];
            $message= $_POST['message'];


            if ($email != ""){
                $email= filter_var($email, FILTER_SANITIZE_EMAIL);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors .= 'Adresse mail invalide. <br/><br/>';
                }
            } else {
                $errors .= 'Veuillez entrer votre adresse mail. <br/>';
            }

            if ($name != ""){
                $name = var_dump(filter_var($name, FILTER_SANITIZE_STRING));
                if ($name == "") {
                    $errors .= 'Nom invalide.<br/><br/>';
                }
            }
            else {
                $errors .= 'Veuillez entrer votre nom.<br/>';
            }

            if ($message != ""){
                $message = var_dump(filter_var($message, FILTER_SANITIZE_STRING));
                if ($message == "") {
                    $errors .= 'Veuillez entrer votre message.<br/>';
                }
            }
            else {
                $errors .= 'Veuillez entrer votre message.<br/>';
            }

            if (!$errors) {
                $mail_to = 'esther.m.meyer@wanadoo.fr';
                $subject = 'Nouveau mail envoyé depuis le site';
                $message  = 'Mail de: ' . $_POST['name'] . "\n";
                $message .= 'Email: ' . $_POST['email'] . "\n";
                $message .= "Message:\n" . $_POST['message'] . "\n\n";
                mail($to, $subject, $message);

                echo "Merci pour votre email<br/><br/>";
            } else {
                echo '<div style="color: red">' . $errors . '<br/></div>';
            }


        }
    }


}
?>