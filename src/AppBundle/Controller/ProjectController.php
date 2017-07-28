<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Class ProjectController
 * @package AppBundle\Controller
 * @RouteResource("project")
 */
class ProjectController extends Controller
{
    /**
     * @ApiDoc(
     *     section="project",
     *     description="list project"
     * )
     * @View()
     */
    public function cgetAction()
    {
        return $this->get('scrapy_helper')->getProjects();
    }
}