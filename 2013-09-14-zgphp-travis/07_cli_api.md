## API

https://api.travis-ci.org/

- HTTP + JSON
- travis-ci.org
- travis CLI



## API

```
GET https://api.travis-ci.org/builds/11127910
```

```
{
    "build": {
        "id": 11127910,
        "repository_id": 1220417,
        "commit_id": 3266048,
        "number": "25",
        "pull_request": false,
        "state": "passed",
        "started_at": "2013-09-08T18:25:28Z",
        "finished_at": "2013-09-08T18:26:03Z",
        "duration": 68,
        ...
    },
    "commit": {
        "id": 3266048,
        "sha": "fb757c43a96f6cf8886d612943da57a9c06a616c",
        "branch": "master",
        "message": "Testing IRC notifications",
        "committed_at": "2013-09-08T18:24:57Z",
        "author_name": "Ivan Habunek",
        "author_email": "ivan.habunek@gmail.com",
        "committer_name": "Ivan Habunek",
        "committer_email": "ivan.habunek@gmail.com",
        "compare_url": "https:\/\/github.com\/ihabunek\/travis-demo\/compare\/59cfd34c860a...fb757c43a96f"
    }
    ...
}
```



## CLI

```
> gem install travis
```

```
> travis help
```

```none
Available commands:

accounts  displays accounts and their subscription status
branches  displays the most recent build for each branch
cancel    cancels a job or build
console   interactive shell
disable   disables a project
enable    enables a project
encrypt   encrypts values for the .travis.yml
endpoint  displays or changes the API endpoint
help      helps you out when in dire need of information
history   displays a projects build history
init      generates a .travis.yml and enables the project
login     authenticates against the API and stores the token
logs      streams test logs
monitor   live monitor for what's going on
open      opens a build or job in the browser
pubkey    prints out a repository's public key
raw       makes an (authenticated) API call and prints out the result
restart   restarts a build or job
setup     sets up an addon or deploy target
show      displays a build or job
status    checks status of the latest build
sync      triggers a new sync with GitHub
token     outputs the secret API token
version   outputs the client version
whatsup   lists most recent builds
whoami    outputs the current user
```



## CLI

```
> travis history
```

```
#25 passed:     master Testing IRC notifications
#21 passed:     master Testing notifications
#20 passed:     master Removed testing on 5.2
#19 errored:    master Added 'composer install' to travis.yml
#18 passed:     master Added dependency on symfony/console
#17 passed:     master Merge pull request #3 from ihabunek/correctamondo
#16 passed:     Pull Request #3 Added a nod to XKCD
```



## CLI

```
> travis show 25
```

```
Build #25: Testing IRC notifications
State:         passed
Type:          push
Branch:        master
Compare URL:   https://github.com/ihabunek/travis-demo/compare/59cfd34c860a...fb757c43a96f
Duration:      1 min 8 sec
Started:       2013-09-08 20:25:28
Finished:      2013-09-08 20:26:03

#25.1 passed:    26 sec         php: 5.3
#25.2 passed:    18 sec         php: 5.4
#25.3 passed:    24 sec         php: 5.5
```



## PHP Travis Client

https://github.com/l3l0/php-travis-client

```php
$client = new Travis\Client();
$repo = $client->fetchRepository('ihabunek/travis-demo');

echo "Builds:\n";
foreach ($repo->getBuilds() as $build) {
    $id = $build->getID();
    $result = $build->getResult() ? "Passed" : "Failed";
    echo " - $id: $result\n";
}
```
