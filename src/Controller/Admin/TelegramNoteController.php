<?php

namespace App\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\TelegramNote;

class TelegramNoteController extends Controller
{
    /**
     * @Route("/admin", name="telegram-note-index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $telegramNotes = $em->getRepository(TelegramNote::class)->findAll();

        return $this->render('admin/index.html.twig', ['telegramNotes' => $telegramNotes]);
    }
}