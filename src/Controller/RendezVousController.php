<?php
namespace App\Controller;
use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Appointment;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Validator\Constraints\DateTime;

class RendezVousController extends AbstractController
{
    /**
     * @Route("/rendezvous")
     */
    public function rendezVous(Request $request)
    {
        $session=$this->get('session');
        $entityManager = $this->getDoctrine()->getManager();
        $appointment = new Appointment();
        $form = $this->createFormBuilder($appointment)
            ->add('appointment_Name', TextType::class)
            ->add('appointment_Firstname', TextType::class)
            ->add('appointment_Mail', TextType::class)
            ->add('appointmentStart', TextType::class)
            ->add('save', SubmitType::class)
            ->getForm();


        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $appointment = $form->getData();
            try
            {
                if($appointment != null)
                {
                    //$repo = $entityManager->getRepository(Appointment::class);
                    //$member = $repo->findOneBy(['memberMail' => $appointment->getMemberMail()]);
                    //$appointment->setMember($member);
                    $appointment->setAppointmentDuration(15.0);
                    $appointment->setAppointmentPrice(15.0);
                    //$aa = $entityManager->getRepository(Prestationtemplate::class);
                    //$prestationTemplate = $aa->findOneBy(['prestationtemplateHair' => "RAS", 'prestationtemplateSize' => "TPETIT", 'prestationtemplateVersion' => 1]);
                    //$appointment->setPrestationTemplate($prestationTemplate);
                    $entityManager->persist($appointment);
                    $entityManager->flush();
                    return $this->redirectToRoute('rendezVous');
                }
            }
            catch(Exception $e)
            {
                //if($pdo->inTransaction() != null)
                  //  $pdo->rollback();
            }
        }
        return $this->render('rendezvous.html.twig', array('form' => $form->createView(),));
    }
}
?>