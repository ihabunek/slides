## .travis.yml

#### Odabir verzije

```yml
language: php
php: 5.4
```

Note:

- testovi se izvršavaju na zadnjoj dostupnoj pod-verziji u 5.4 branchu



## .travis.yml

#### Više verzija

```yml
language: php

php:
    - 5.3
    - 5.4
    - 5.5
```



![](images/build-versions.png)



## .travis.yml

#### script

```yml
language: php

php:
    - 5.3
    - 5.4
    - 5.5

script: phpunit
```



## .travis.yml

#### script

```yml
language: php

php:
    - 5.3
    - 5.4
    - 5.5

script: phpunit --configuration tests/phpunit.xml
```



## Dependancy management

#### composer.json

```javascript
{
    "require": {
        "symfony/console": "2.3.*"
    }
}
```

#### .travis.yml

```yml
before_script:
    - composer install
```



## .travis.yml

#### notifications

```yml
notifications:
    email:
        - ivan.habunek@gmail.com
        - ivan@bezdomni.net
```



## .travis.yml

#### notifications

```yml
notifications:
    irc:
        - "irc.freenode.org#zgphp"
```

![](images/notify-irc.png)



## .travis.yml

#### notifications

```yml
notifications:
    webhooks:
        urls:
            - http://bezdomni.net/hooks/travis
```

```json
{
    "id": 11127910,
    "repository": {
        "id": 1220417,
        "name": "travis-demo",
        "owner_name": "ihabunek",
        "url": "https:\/\/github.com\/ihabunek\/travis-demo"
    },
    "number": "25",
    "config": {
        "language": "php",
        "php": [
            5.3,
            5.4,
            5.5
        ],
        "before_script": [
            "composer self-update",
            "composer install"
        ],
        "notifications": {
            "webhooks": {
                "urls": [
                    "http:\/\/bezdomni.net\/travis.php"
                ],
                "on_success": "always",
                "on_failure": "always",
                "on_start": true
            },
            "irc": [
                "chat.freenode.net#zgphp"
            ]
        },
        ".result": "configured"
    },
    "status": 1,
    "result": 1,
    "status_message": "Pending",
    "result_message": "Pending",
    "started_at": "2013-09-08T18:25:28Z",
    "finished_at": null,
    "duration": null,
    "build_url": "https:\/\/travis-ci.org\/ihabunek\/travis-demo\/builds\/11127910",
    "commit": "fb757c43a96f6cf8886d612943da57a9c06a616c",
    "branch": "master",
    "message": "Testing IRC notifications",
    "compare_url": "https:\/\/github.com\/ihabunek\/travis-demo\/compare\/59cfd34c860a...fb757c43a96f",
    "committed_at": "2013-09-08T18:24:57Z",
    "author_name": "Ivan Habunek",
    "author_email": "ivan.habunek@gmail.com",
    "committer_name": "Ivan Habunek",
    "committer_email": "ivan.habunek@gmail.com"
}
```



## Build matrix

```yml
language: php

php:
    - 5.3
    - 5.4
    - 5.5
```

3 builda:

    1. PHP 5.3
    2. PHP 5.4
    3. PHP 5.5



## Build matrix

```yml
language: php

env:
  - BLA=tra
  - BLA=mrm

php:
    - 5.3
    - 5.4
    - 5.5
```

6 buildova:

    1. PHP 5.3, BLA=tra
    2. PHP 5.3, BLA=mrm
    3. PHP 5.4, BLA=tra
    4. PHP 5.4, BLA=mrm
    5. PHP 5.5, BLA=tra
    6. PHP 5.5, BLA=mrm

Matrica svih mogućih kombinacija.



## Build matrix

```yml
language: php

env:
  - DB=postgres
  - DB=mysql
  - DB=sqlite

php:
    - 5.3
    - 5.4
    - 5.5

script: phpunit --configuration etc/$DB.phpunit.xml
```

9 buildova:

    1. PHP 5.3, DB=postgres (phpunit --configuration etc/postgres.xml)
    2. PHP 5.3, DB=mysql    (phpunit --configuration etc/mysql.xml)
    3. PHP 5.3, DB=sqlite   (phpunit --configuration etc/sqlite.xml)
    4. PHP 5.4, DB=postgres (phpunit --configuration etc/postgres.xml)
    5. PHP 5.4, DB=mysql    (phpunit --configuration etc/mysql.xml)
    6. PHP 5.4, DB=sqlite   (phpunit --configuration etc/sqlite.xml)
    7. PHP 5.5, DB=postgres (phpunit --configuration etc/postgres.xml)
    8. PHP 5.5, DB=mysql    (phpunit --configuration etc/mysql.xml)
    9. PHP 5.5, DB=sqlite   (phpunit --configuration etc/sqlite.xml)
