<?php
 
namespace App\Controller;
 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\TelegramNote;
use Libern\QRCodeReader\QRCodeReader;
 
class TelegramController extends Controller
{
    /**
     * @var string 
     */
    private $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * @Route(
     *      "/{token}", 
     *       defaults={"token"="%telegram_token%"},
     *       requirements={"token"="%telegram_token%"}
     *   )
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function telegram(Request $request)
    {
        $result = json_decode($request->getContent(), true);

        $chatId = $result["message"]["chat"]["id"];
        $userId = $result["message"]["from"]["id"];
        $username = $result["message"]["from"]["first_name"].' '.$result["message"]["from"]["last_name"];

        $date = new \DateTime();
        $date->setTimestamp($result["message"]["date"]);
        $date->format('Y-m-d H:i:s');

        $image = $result["message"]["photo"];
   
        // If telegram respond photo
        if (isset($image)) {

            $imagePath = "https://api.telegram.org/file/".$this->token."/".$image[0]["file_path"];

            $qrcode = new QRCodeReader();
            $decode = $qrcode->decode($imagePath);
            if (isset($decode)) {
                $text = $decode;
            } else {
                $text = "No decode this!";
            }

        // If telegram respond something
        } else {
            $text = 'Upload photo with QR Code';

        }

        $telegramNote = new TelegramNote();
        $telegramNote->setBotId($userId);
        $telegramNote->setChannelId($chatId);
        $telegramNote->setUsername($username);
        $telegramNote->setDatetime($date);
        $telegramNote->setDecode($text);

        $em = $this->getDoctrine()->getManager();

        $em->persist($telegramNote);    
        $em->flush();

        $response = new JsonResponse([
            'method' => 'sendMessage',
            'chat_id' => $chatId,
            'text'  => $text,
        ], 200);
        
        return $response;
    }
}