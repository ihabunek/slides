## Kontinuirana integracija

> Continuous Integration is a software development practice where members of a team integrate their work frequently, usually each person integrates at least daily - leading to multiple integrations per day. Each integration is verified by an automated build (including test) to detect integration errors as quickly as possible.

#### Martin Fowler (2006)

<small>http://www.martinfowler.com/articles/continuousIntegration.html</small>

Note:

- integracija = merge na zajednički branch (npr. master ili develop)
- rano otkrivanje i eliminacija grešaka
- prije su ljudi radili cijeli feature, pa imali dugu i kompleksnu integraciju



## Ručna provedba CI

- okolina na razvojnom stroju je potencijalno kontaminirana
- testiranje ovisi o developeru ("ma bit će ok" sindrom)
- zahtjevno testiranje pull requestova

Note:
-problemi kod "ručne" provedbe kontinuirane integracije



![Travis CI](images/travis-logo.png)

> a hosted continuous integration service for the open source community

- distribuiran
- otvorenog kôda
- besplatan za sve javne projekte na GitHubu



![Travis CI](images/travis-logo.png)

Programski jezici:

C C++ Clojure Erlang Go Groovy Haskell Java JavaScript Objective-C Perl ***PHP*** Python Ruby Scala



![Travis CI](images/travis-logo.png)

Servisi i baze podataka:

MySQL PostgreSQL MongoDB CouchDB Redis Riak RabbitMQ Memcached Cassandra Neo4J ElasticSearch Kestrel SQLite3



![Travis CI](images/travis-logo.png)

PHP moduli:

bcmath bz2 Core ctype curl date dom ereg exif fileinfo filter ftp gd gettext hash iconv intl json libxml mbstring mcrypt mysql mysqli mysqlnd openssl pcntl pcre PDO pdo_mysql pdo_pgsql pdo_sqlite pgsql Phar posix readline Reflection session shmop SimpleXML soap sockets SPL sqlite3 standard sysvsem sysvshm tidy tokenizer xdebug xml xmlreader xmlrpc xmlwriter xsl zip zlib
