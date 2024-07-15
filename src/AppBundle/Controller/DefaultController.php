<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     */
    public function testAction()
    {
        $html = file_get_contents($this->get('kernel')->getRootDir() . '/../web/api_ajax/index.html');
        return new Response($html);
    }
}
