<?php

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Task
 * 
 * @ApiResource(
 *     attributes={
 *         "filters"={"task.search", "task.range", "task.order", "task.date"},
 *         "normalization_context"={"groups"={"read", "task"}},
 *         "denormalization_context"={"groups"={"write"}},
 *         "pagination_items_per_page"=20
 *     },
 *     itemOperations={
 *          "get"={
 *              "method"="GET"
 *          },
 *          "put"={
 *              "method"="PUT", 
 *              "denormalization_context"={"groups"={"put"}}
 *          }
 *     }
 * )
 * @ORM\Table(name="task")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TaskRepository")
 */
class Task
{
    /**
     * @var int
     *
     * @Groups({"read"})
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\NotBlank(message = "This field must not be blank")
     * @Groups({"read", "write"})
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Groups({"read", "write", "put"})
     * @ORM\Column(name="time", type="string", length=255)
     */
    private $time;

    /**
     * @var string
     * 
     * @Assert\NotBlank()
     * @Assert\Range(
     *      min = 0,
     *      max = 10,
     *      minMessage = "It must be at least {{ limit }}",
     *      maxMessage = "It cannot be greater than {{ limit }}"
     * )
     *
     * @Groups({"read", "write", "put"})
     * @ORM\Column(name="priority", type="integer", length=255)
     */
    private $priority;

     /**
     * @Assert\NotBlank()
     * @Groups({"read", "write", "task"})
     * @ORM\ManyToOne(targetEntity="User")
     */
    private $user;

    /**
     * @var \DateTime
     *
     * @Groups({"read"})
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    public function __construct()
    {
        $this->createdAt = new DateTime();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Task
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set time
     *
     * @param string $time
     *
     * @return Task
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set priority
     *
     * @param string $priority
     *
     * @return Task
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return string
     */
    public function getPriority()
    {
        return $this->priority;
    }

    

    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    

    /**
     * Get the value of createdAt
     *
     * @return  \DateTime
     */ 
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @param  \DateTime  $createdAt
     *
     * @return  self
     */ 
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}

