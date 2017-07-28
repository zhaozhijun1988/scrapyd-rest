<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Class SpiderController
 * @package AppBundle\Controller
 * @RouteResource("spider")
 */
class SpiderController extends Controller
{
    /**
     * @ApiDoc(
     *     section="spider",
     *     description="list spider"
     * )
     * @View()
     */
    public function cgetAction($project)
    {
        return $this->get('scrapy_helper')->getSpiders($project);
    }
}