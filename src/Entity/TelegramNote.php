<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TelegramNoteRepository")
 */
class TelegramNote
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $bot_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $channel_id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $username;

    /**
     * @ORM\Column(type="datetimetz")
     */
    private $datetime;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $decode;

    public function getId()
    {
        return $this->id;
    }

    public function getBotId(): ?int
    {
        return $this->bot_id;
    }

    public function setBotId(int $bot_id): self
    {
        $this->bot_id = $bot_id;

        return $this;
    }

    public function getChannelId(): ?int
    {
        return $this->channel_id;
    }

    public function setChannelId(int $channel_id): self
    {
        $this->channel_id = $channel_id;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getDatetime(): ?\DateTimeInterface
    {
        return $this->datetime;
    }

    public function setDatetime(\DateTimeInterface $datetime): self
    {
        $this->datetime = $datetime;

        return $this;
    }

    public function getDecode(): ?string
    {
        return $this->decode;
    }

    public function setDecode(?string $decode): self
    {
        $this->decode = $decode;

        return $this;
    }
}
