<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Class JobController
 * @package AppBundle\Controller
 * @RouteResource("job")
 */
class JobController extends Controller
{


    /**
     * @ApiDoc(
     *     section="job",
     *     description="list jobs"
     * )
     * @View()
     */
    public function cgetAction($project)
    {
        return $this->get('scrapy_helper')->getJobs($project);
    }

    /**
     * @ApiDoc(
     *     section="job",
     *     description="run job",
     *     parameters={{"name"="project", "dataType"="string", "required"=true},{"name"="spider","dataType"="string","required"=true}}
     * )
     * @View()
     */
    public function postAction(Request $request)
    {
        $project = $request->request->get('project');
        $spider = $request->request->get('spider');
        return $this->get('scrapy_helper')->runSpider($project, $spider);
    }

    /**
     * @ApiDoc(
     *     section="job",
     *     description="cancel job",
     *     parameters={{"name"="project", "dataType"="string", "required"=true},{"name"="job","dataType"="string","required"=true}}
     * )
     * @View()
     */
    public function deleteAction(Request $request)
    {
        $project = $request->request->get('project');
        $job = $request->request->get('job');
        return $this->get('scrapy_helper')->cancelJob($project, $job);
    }
}