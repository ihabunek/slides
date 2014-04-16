## Password hashing functions

<hr />

### Ivan Habunek

#### @ihabunek

<hr />

### ZgPHP Meetup 17.04.2014.



### Before 5.5

```php
string crypt ( string $str [, string $salt ] )
```



### "Salt"

`$salt` determines the algorithm:

* CRYPT_STD_DES
* CRYPT_EXT_DES
* CRYPT_MD5
* CRYPT_SHA256
* CRYPT_SHA512
* CRYPT_BLOWFISH



### Standard DES

<small>Data Encryption Standard</small>

```php
echo crypt('zgphprules', 'XX');
```

```
XXafed7kmVc6I
```

* $salt - two character of salt
* short key length, considered unsafe



### Extended DES

```php
echo crypt('zgphprules', '_J9..salt');
```

```
_J9..saltBaTWhT6gQoc
```

* `$salt`
    * an underscore
    * 4 bytes of iteration count
    * 4 bytes of salt
* short key length, considered unsafe



### Extended DES

#### Iteration count

> These are encoded as printable characters, 6 bits per character, least
> significant character first. The values 0 to 63 are encoded as `./0-9A-Za-z`.

<small>http://www.php.net/manual/en/function.crypt.php</small>

> So you pass in 9 chars. The first char is an _. After that things get a little
> dicey.

<small>http://arstechnica.com/civis/viewtopic.php?f=20&t=1125143</small>



### MD5

```php
echo crypt('zgphprules', '$1$saltyphp$');
```

```
$1$saltyphp$EFZQyVvbLGNqYX0KtkFQm.
```

* `$salt`
    * Starts with `$1$`
    * 8 characters salt
* not cryptographically secure
* too fast, can be bruteforced



### SHA256

```php
echo crypt('zgphprules', '$5$rounds=5000$saltyphpelephant$');
```

```
$5$rounds=5000$saltyphpelephant$
x0Ppf6aWyRVva1xbhdC/1/kyAVje3LV65wZAwmH38A3
```

* `$salt`
    * starts with `$5$`
    * cost specified by `rounds=n`
    * 16 characters salt



### SHA512

```php
echo crypt('zgphprules', '$6$rounds=5000$saltyphpelephant$');
```

```
$6$rounds=5000$saltyphpelephant$
HLJIcTsP7Ih1V0YNY/I0Hsrd1F2y/G7QhETdRx10ton
SmuZ9XXE7R0MktSHGJ13UgK2/pOxqtrHOfN7scgL3x0
```

* `$salt`
    * starts with `$6$`
    * cost specified by `rounds=n`
    * 16 characters salt



### Bcrypt (Blowfish)

```php
echo crypt('zgphprules', '$2y$07$saltyphpelephantwins$');
```

```
$2y$07$saltyphpelephantwins$enUZQQrMTEUxVU8w0B01h1O/4vNNJiN2
```

* `$salt`
    * starts with `$2a$`, `$2x$` or `$2y$`
    * a two digit cost parameter
    * 16 characters salt
* established, proven
* expensive to brute force



### Bcrypt

Cost `7` instead of `07`.

```php
echo crypt('zgphprules', '$2y$7$saltyphpelephantwins$');
```

```
$2GR95JaY.7oY
```

## WTF?



### Bcrypt

Salt shorter than 20 characters.

```php
echo crypt('zgphprules', '$2y$07$salty$');
```

```
$2y$07$salty$
```

## WTF?



### Bcrypt

Invalid characters in salt.

```php
echo crypt('zgphprules', '$2y$07$!!!!!!$');
```

```
*0
```

<small>No error, no warning, no notice</small>

## WTF?



## Password Hashing Functions

```
string password_hash(string $password, integer $algo [, array $options ])
```

```
boolean password_verify(string $password , string $hash)
```

Introduced in PHP 5.5



## Available algorithms

* `PASSWORD_BCRYPT`<br />
  the Blowfish algorithm

* `PASSWORD_DEFAULT`<br />
  the default algorithm (`PASSWORD_BCRYPT`)



## Hash password

```php
echo password_hash('zgphprules', PASSWORD_DEFAULT);
```

```
$2y$10$voUu8Q3uJXrZqjotlZ81GeYCL0ztmQBewg7HS35EBXwE97FPMaE6i
```

* strong algorithm
* automatic random salt
* cost set to 10 by default



## Check password

```php
// From login form
$password = 'zgphprules';

// From database
$hash = '$2y$10$voUu8Q3uJXrZqjotlZ81GeYCL0ztmQBewg7HS35EBXwE97FPMaE6i';

if (password_verify($password, $hash)) {
  echo "In you go."
} else {
  throw new Exception("Sod off");
}
```



## Optional settings

```php
password_hash('zgphprules', PASSWORD_DEFAULT, [
    'salt' => "iwantmyownsaltyphpsalt",
    'cost' => 12
])
```



## Warnings

```php
password_hash('zgphprules', PASSWORD_DEFAULT, array(
    'salt' => "too_short"
))
```

```
Warning: password_hash(): Provided salt is too short: 9 expecting 22
```



## Warnings

```php
password_hash('zgphprules', PASSWORD_DEFAULT, array(
    'cost' => 2
))
```

```
Warning: password_hash(): Invalid bcrypt cost parameter specified: 2
```



### But I can't use PHP 5.5 :(



Community has you covered.

https://github.com/ircmaxell/password_compat

Thank you Anthony Ferrara (@ircmaxell)



# Questions?

Please rate my talk

https://joind.in/talk/view/11197



### References

* PHP documentation
  http://www.php.net/manual/en/function.crypt.php
  http://www.php.net/manual/en/book.password.php
  http://www.php.net/manual/en/faq.passwords.php

* Creating an Extended DES Salt
  http://arstechnica.com/civis/viewtopic.php?f=20&t=1125143

* password_compat
  https://github.com/ircmaxell/password_compat
