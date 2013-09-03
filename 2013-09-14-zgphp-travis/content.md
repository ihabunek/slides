![Travis CI](images/travis-logo.png)

### Testiranje open source projekata

Ivan Habunek

@ihabunek




## Kontinuirana integracija

- svi koji rade na projektu integriraju svoje izmjene često (dnevno ili češće)
- integracija = merge na zajednički branch (npr. master ili develop)
- svaku integraciju provjerava automatizirano testiranje (e.g. phpunit) kako bi
  se greške otkrile što prije
- rano otkrivanje i eliminacija grešaka

Note:

- bla
- tra



![Travis CI](images/travis-logo.png)

- hosted CI
- besplatan za sve javne projekte na GitHubu




![Travis CI](images/travis-logo.png)

- automatsko testiranje
    - svakog pusha
    - svakog pull requesta
- u čistoj okolini



## Organizacija projekta

```
root
+-- phpunit.xml
+-- README.md
|
+---src
|   \-- Random.php
|
\---tests
    \-- RandomTest.php
```



## Write Code

```
/src/Random.php
```

```
class Random
{
    public function getRandomNumber()
    {
        // Choosen by a fair dice roll.
        // Guaranteed to be random.
        return 4;
    }
}
```



## Write tests

```
/tests/RandomTest.php
```

```
require __DIR__ . '/../src/Random.php';

class RandomTest extends PHPUnit_Framework_TestCase
{
    public function testGetRandomNumber()
    {
        $random = new Random();
        $actual = $random->getRandomNumber();
        $this->assertSame(4, $actual);
    }
}
```



## Configure PHPUnit

```
/phpunit.xml
```

```
<phpunit>
    <testsuite>
        <directory>tests</directory>
    </testsuite>
</phpunit>
```



## Run phpunit

```
D:\Projects\git\travis-demo>phpunit
```

```
PHPUnit 3.7.21 by Sebastian Bergmann.

Configuration read from D:\Projects\git\travis-demo\phpunit.xml

.

Time: 0 seconds, Memory: 2.75Mb

OK (1 test, 1 assertion)
```



## Kontinuirana integracija




## GitHub Service Hook

`https://travis-ci.org/profile`

![Travis profile](images/travis-profile.png)



