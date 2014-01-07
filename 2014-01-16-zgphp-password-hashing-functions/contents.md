# Password hashing functions

<hr />

## Ivan Habunek

### @ihabunek

<hr />

## ZgPHP Meetup 16.01.2014.



### Before 5.5

```php
string crypt ( string $str [, string $salt ] )
```

`$salt` determines the algorithm:

* CRYPT_STD_DES
* CRYPT_EXT_DES
* CRYPT_MD5
* CRYPT_SHA256
* CRYPT_SHA512
* CRYPT_BLOWFISH



### DES

<small>Data Encryption Standard</small>

```php
crypt('zgphprules', 'XX')
```

```
XXafed7kmVc6I
```

* $salt - two character of salt




### Extended DES

```php
crypt('zgphprules', '_J9..salt')
```

```
_J9..saltBaTWhT6gQoc
```

* `$salt`
    * an underscore
    * 4 bytes of iteration count
    * 4 bytes of salt



### Extended DES

> These are encoded as printable characters, 6 bits per character, least
> significant character first. The values 0 to 63 are encoded as `./0-9A-Za-z`.

<small>http://www.php.net/manual/en/function.crypt.php</small>

> So you pass in 9 chars. The first char is an _. After that things get a little
> dicey.

<small>http://arstechnica.com/civis/viewtopic.php?f=20&t=1125143</small>



### MD5

```php
crypt('zgphprules', '$1$saltyphp$')
```

```
$1$saltyphp$EFZQyVvbLGNqYX0KtkFQm.
```

* `$salt`
    * Starts with `$1$`
    * 8 characters salt



### SHA256

```php
crypt('zgphprules', '$5$rounds=50000$saltyphpelephant$')
```

```
$5$rounds=50000$saltyphpelephant$
B2ieA3FbPMy5t0pFLg2s/ydoX9eNY7.TDQ2EwmNq3CD
```

* `$salt`
    * starts with `$5$`
    * cost specified by `rounds=n`
    * 16 characters salt



### SHA512

```php
crypt('zgphprules', '$6$rounds=50000$saltyphpelephant$')
```

```
$6$rounds=50000$saltyphpelephant$
Tot2XNPYyQsG..bDp5gF/2QAdcHsVaRUktQs4/QHUA9
rSBYS9Bv8g4/uPYgiQDgWjx0hjap3Q1zsB63mtluGu1
```

* `$salt`
    * starts with `$6$`
    * cost specified by `rounds=n`
    * 16 characters salt



### Bcrypt (Blowfish)

```php
crypt('zgphprules', '$2y$07$saltyphpelephantwins$')
```

```
$2a$07$saltyphpelephantwins$enUZQQrMTEUxVU8w0B01h1O/4vNNJiN2
```

* `$salt`
    * starts with `$2a$`, `$2x$` or `$2y$`
    * a two digit cost parameter
    * 16 characters salt



### Bcrypt

Cost `7` instead of `07`.

```php
crypt('zgphprules', '$2y$7$saltyphpelephantwins$')
```

```
$2GR95JaY.7oY
```

## WTF?



### Bcrypt

Salt shorter than 20 characters.

```php
crypt('zgphprules', '$2y$07$salty$')
```

```
$2y$07$salty$
```

## WTF?



### Bcrypt

Invalid characters in salt.

```php
crypt('zgphprules', '$2y$07$!!!!!!$')
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



## Available algorithms:

* `PASSWORD_BCRYPT`<br />
  the Blowfish algorithm

* `PASSWORD_DEFAULT`<br />
  the default algorithm (also Blowfish)



## Hash password

```php
password_hash('zgphprules', PASSWORD_DEFAULT)
```

```
$2y$10$voUu8Q3uJXrZqjotlZ81GeYCL0ztmQBewg7HS35EBXwE97FPMaE6i
```

* strong algorithm
* random salt generation
* cost set to 10



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



## But I can't use PHP 5.5 :(

Community has you covered.

https://github.com/ircmaxell/password_compat

Thank you Anthony Ferrara (@ircmaxell)



# Questions?



### References

* PHP documentation
  http://www.php.net/manual/en/function.crypt.php
  http://www.php.net/manual/en/book.password.php
  http://www.php.net/manual/en/faq.passwords.php

* Creating an Extended DES Salt
  http://arstechnica.com/civis/viewtopic.php?f=20&t=1125143

* password_compat
  https://github.com/ircmaxell/password_compat