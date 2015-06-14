- coveralls.io
- badges
- continuous deployment
- Travis Web Lint: http://yaml.travis-ci.org/
- commit your composer.lock to speed up testing
- PHP defaults: https://github.com/travis-ci/travis-build/blob/master/lib/travis/build/script/php.rb
- CLI
- PHP is tested on Travis

API endpoints:

&nbsp; | &nbsp;
------------------------------------------------------

`GET    /accounts`                      | GET    /repos/{repository.id}
`POST   /auth/github`                   | GET    /repos/{repository.id}/branches
`GET    /broadcasts`                    | GET    /repos/{repository.id}/branches/{branch}
`GET    /config`                        | GET    /repos/{repository.id}/settings
                                        | PATCH  /repos/{repository.id}/settings
`POST   /authorizations`                | GET    /repos/{repository.id}/keys
`DELETE /authorizations/{auth`}         | POST   /repos/{repository.id}/keys
                                        | GET    /repos/{repository.id}/caches
`GET    /builds`                        | DELETE /repos/{repository.id}/caches
`GET    /builds/{build.id`}             | GET    /repos/{repository.id}/builds
`POST   /builds/{build.id}/cancel`      | GET    /repos/settings/env_vars
`POST   /builds/{build.id}/restart`     | POST   /repos/settings/env_vars
                                        | PATCH  /repos/settings/env_vars
`GET    /hooks`                         | DELETE /repos/settings/env_vars
`PUT    /hooks`                         |
`PUT    /hooks/{hook.id`}               | GET    /requests
                                        | GET    /requests/{request.id}
`GET    /jobs/{job.id`}                 |
`POST   /jobs/{job.id}/cancel`          | GET    /users/
`POST   /jobs/{job.id}/restart`         | GET    /users/{user.id}
`GET    /jobs/{job.id}/logs`            | GET    /users/permissions
`GET    /jobs/{job.id}/annotations`     | POST   /users/sync
`POST   /jobs/{job.id}/annotations`     |

