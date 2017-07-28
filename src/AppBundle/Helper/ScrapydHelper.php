<?php
namespace AppBundle\Helper;


class ScrapydHelper
{
    private $gateway;

    /**
     * @var$client \GuzzleHttp\Client
     */
    private $client;

    /**
     * ScrapydHelper constructor.
     * @param $gateway
     */
    public function __construct($gateway)
    {
        $this->gateway = $gateway;
        $this->client = new \GuzzleHttp\Client();
    }

    public function getServiceStatus()
    {
        $res = $this->client->get($this->gateway . '/daemonstatus.json');
        return $this->format($res);
    }

    public function getJobs($project)
    {
        $res = $this->client->request('get', $this->gateway . '/listjobs.json', [
            'query' => [
                'project' => $project
            ]
        ]);
        return $this->format($res);
    }

    public function getSpiders($project)
    {
        $res = $this->client->request('get', $this->gateway . '/listspiders.json', [
            'query' => [
                'project' => $project
            ]
        ]);
        return $this->format($res);
    }

    /**
     * @return mixed
     */
    public function getProjects()
    {
        $res = $this->client->get($this->gateway . '/listprojects.json');
        return $this->format($res);
    }

    public function deleteProject($project)
    {
        $res = $this->client->request('post', $this->gateway . '/delproject.json', [
            'query' => [
                'project' => $project
            ]
        ]);
        return $this->format($res);
    }

    /**
     * @param $project
     * @param $job
     * @return mixed
     */
    public function cancelJob($project, $job)
    {
        $res = $this->client->request('post', $this->gateway . '/cancel.json', [
            'form_params' => [
                'project' => $project,
                'job' => $job
            ]
        ]);
        return $this->format($res);
    }

    /**
     * @param $project
     * @param $spider
     * @return mixed
     */
    public function runSpider($project, $spider)
    {
        $res = $this->client->request('post', $this->gateway . '/schedule.json', [
            'form_params' => [
                'project' => $project,
                'spider' => $spider
            ]
        ]);
        return $this->format($res);
    }

    private function format($res)
    {
        return \GuzzleHttp\json_decode($res->getBody()->getContents(), 1);
    }
}