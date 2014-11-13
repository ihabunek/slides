- coveralls.io
- badges
- continuous deployment
- Travis Web Lint: http://yaml.travis-ci.org/
- commit your composer.lock to speed up testing
- PHP defaults: https://github.com/travis-ci/travis-build/blob/master/lib/travis/build/script/php.rb
- CLI
- PHP is tested on Travis

API endpoints:
GET    /
GET    /accounts
GET    /config
GET    /users

POST   /auth/github
POST   /authorizations
DELETE /authorizations/{auth}


GET   /repos/{repository.id}
GET   /repos/{repository.id}/branches
GET   /repos/{repository.id}/branches/{branch}
GET   /repos/{repository.id}/settings
PATCH /repos/{repository.id}/settings
GET /repos/{repository.id}/branches

GET  /builds
GET  /builds/{build.id}
POST /builds/{build.id}/cancel
POST /builds/{build.id}/restart

GET /repos/{repository.id}/caches
DELETE /repos/{repository.id}/caches

GET /hooks
PUT /hooks
PUT /hooks/{hook.id}

GET  /jobs/{job.id}
POST /jobs/{job.id}/cancel
POST /jobs/{job.id}/restart
GET  /jobs/{job.id}/annotations
POST /jobs/{job.id}/annotations

GET  /users/
GET  /users/{user.id}
POST /users/sync