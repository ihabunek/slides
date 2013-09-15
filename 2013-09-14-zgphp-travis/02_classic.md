## Organizacija projekta

```
D:\Projects\travis-demo
+-- phpunit.xml
+-- README.md
|
+---src
|   \-- Random.php
|
\---tests
    \-- RandomTest.php
```

<small>omg windowz wtf n00b</small>



## Kôd

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

<small>http://xkcd.com/221/</small>

Note:
- minimalan primjer
- nedostaje napespace




## Testovi

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

Note:
- poklonici Test Driven Developmenta rade obrnuto



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

Note:
- minimalistički pristup
- nećemo ulaziti u dubinu, nije tema



## Run phpunit

```
> phpunit
```

```
PHPUnit 3.7.21 by Sebastian Bergmann.

Configuration read from D:\Projects\travis-demo\phpunit.xml

.

Time: 0 seconds, Memory: 2.75Mb

OK (1 test, 1 assertion)
```

Note:
- znamo da kod radi (100% pokrivenost)
- dovoljno za 1 osobu


