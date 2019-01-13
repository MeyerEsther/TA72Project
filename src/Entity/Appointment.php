<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Appointment
 *
 * @ORM\Table(name="appointment")
 * @ORM\Entity
 */
class Appointment
{
    /**
     * @var int
     *
     * @ORM\Column(name="APPOINTMENT_ID", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $appointmentId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="APPOINTMENT_START", type="string", nullable=false)
     */
    private $appointmentStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="APPOINTMENT_END", type="string", nullable=false)
     */
    private $appointmentEnd;

    /**
     * @var string
     *
     * @ORM\Column(name="APPOINTMENT_NAME", type="string", length=255, nullable=false)
     */
    private $appointmentName;

    /**
     * @var string
     *
     * @ORM\Column(name="APPOINTMENT_FIRSTNAME", type="string", length=255, nullable=false)
     */
    private $appointmentFirstname;

    /**
     * @var string
     *
     * @ORM\Column(name="APPOINTMENT_MAIL", type="string", length=255, nullable=false)
     */
    private $appointmentMail;

    /**
     * @var string
     *
     * @ORM\Column(name="APPOINTMENT_NUMBER", type="string", length=255, nullable=false)
     */
    private $appointmentNumber;

    /**
     * @return int
     */
    public function getAppointmentId(): int
    {
        return $this->appointmentId;
    }

    /**
     * @param int $appointmentId
     */
    public function setAppointmentId(int $appointmentId)
    {
        $this->appointmentId = $appointmentId;
    }

    /**
     * @return string
     */
    public function getAppointmentStart()
    {
        return $this->appointmentStart;
    }

    /**
     * @param \DateTime $appointmentStart
     */
    public function setAppointmentStart(\DateTime $appointmentStart)
    {
        $this->appointmentStart = $appointmentStart;
    }

    /**
     * @return \DateTime
     */
    public function getAppointmentEnd(): \DateTime
    {
        return $this->appointmentEnd;
    }

    /**
     * @param \DateTime $appointmentEnd
     */
    public function setAppointmentEnd(\DateTime $appointmentEnd)
    {
        $this->appointmentEnd = $appointmentEnd;
    }

    /**
     * @return string
     */
    public function getAppointmentName()
    {
        return $this->appointmentName;
    }

    /**
     * @param string $appointmentName
     */
    public function setAppointmentName(string $appointmentName)
    {
        $this->appointmentName = $appointmentName;
    }

    /**
     * @return string
     */
    public function getAppointmentFirstname()
    {
        return $this->appointmentFirstname;
    }

    /**
     * @param string $appointmentFirstname
     */
    public function setAppointmentFirstname(string $appointmentFirstname)
    {
        $this->appointmentFirstname = $appointmentFirstname;
    }

    /**
     * @return string
     */
    public function getAppointmentMail()
    {
        return $this->appointmentMail;
    }

    /**
     * @param string $appointmentMail
     */
    public function setAppointmentMail(string $appointmentMail)
    {
        $this->appointmentMail = $appointmentMail;
    }

    /**
     * @return string
     */
    public function getAppointmentNumber()
    {
        return $this->appointmentNumber;
    }

    /**
     * @param string $appointmentNumber
     */
    public function setAppointmentNumber(string $appointmentNumber)
    {
        $this->appointmentNumber = $appointmentNumber;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->feature = new \Doctrine\Common\Collections\ArrayCollection();
    }

/**
* @return Collection|Featuretemplate[]
*/
    public function getFeature(): Collection
    {
        return $this->feature;
    }
    public function addFeature(Featuretemplate $feature): self
    {
        if (!$this->feature->contains($feature)) {
            $this->feature[] = $feature;
        }
        return $this;
    }
    public function removeFeature(Featuretemplate $feature): self
    {
        if ($this->feature->contains($feature)) {
            $this->feature->removeElement($feature);
        }
        return $this;
    }


}
