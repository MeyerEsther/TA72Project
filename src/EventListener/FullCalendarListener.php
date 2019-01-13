<?php

namespace App\EventListener;

use App\Entity\Appointment;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Config\Definition\Exception\Exception;
use Toiba\FullCalendarBundle\Entity\Event;
use Toiba\FullCalendarBundle\Event\CalendarEvent;
use Symfony\Component\Validator\Constraints\DateTime;

class FullCalendarListener
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function loadEvents(CalendarEvent $calendar)
    {
        $startDate = $calendar->getStart();
        $endDate = $calendar->getEnd();
        $filters = $calendar->getFilters();

        $appointments = $this->em->getRepository(Appointment::class)->findAll();


        try {
            foreach ($appointments as $appointment) {

                $dateDebut = \DateTime::createFromFormat('Y-m-d  H:i:s', $appointment->getAppointmentStart());
                $heureDebut = $dateDebut->format('H:i:s');
                $heureFinale = $this->HeureDeFinEstimee($heureDebut);
                $date = $dateDebut->format('Y-m-d');
                $dateFinale = $date . " " . $heureFinale;
                $Finale = \DateTime::createFromFormat('Y-m-d H:i:s', $dateFinale);
                //var_dump($Finale);

                $calendar->addEvent(new Event('Rendez-vous', $dateDebut, $Finale));
          }
       }catch(Exception $e){
            var_dump($e);
        }
    }

    public function HeureDeFinEstimee($heureDebut)
    {
        $hourPrestation = 1;
        $heureCalcul = explode(":", $heureDebut);
        $heureFinale = $hourPrestation + intval($heureCalcul[0]);
        $minuteFinale = 60 + intval($heureCalcul[1]);
        $heureFinale = floor($minuteFinale/60) + $heureFinale;
        $minuteFinale = $minuteFinale%60;

        if(strlen($heureFinale) < 2)
            $heureFinale = "0{$heureFinale}";
        if(strlen($minuteFinale) < 2)
            $minuteFinale = "0{$minuteFinale}";
        // if(strlen($second) < 2)
        //     $second = "0{$second}";
        return $heureFinale.":".$minuteFinale.":00";
    }
}