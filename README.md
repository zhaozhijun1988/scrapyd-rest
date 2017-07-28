scrapyd-rest
============

A Symfony project created on July 28, 2017, 12:50 pm.

scrapyd server restful api created by symfony


/api/doc

service
GET /api/v1/service service status

project
GET /api/v1/projects list project
DELETE /api/v1/projects/{project}

spider
GET /api/v1/projects/{project}/spiders list spider

job
DELETE /api/v1/projects/{project}/job cancel job
GET /api/v1/projects/{project}/jobs list jobs
POST /api/v1/projects/{project}/jobs run job




