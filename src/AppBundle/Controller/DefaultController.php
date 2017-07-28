<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Class DefaultController
 * @package AppBundle\Controller
 * @RouteResource("service")
 */
class DefaultController extends Controller
{
    /**
     * @ApiDoc(
     *     description="service status",
     *     section="service"
     * )
     * @View()
     */
    public function getAction()
    {
        return $this->get('scrapy_helper')->getServiceStatus();
    }
}
