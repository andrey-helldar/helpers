## Helpers for Laravel 5.5+

Functions that simplify the development process.

![helpers](https://user-images.githubusercontent.com/10347617/40196790-3d3d3e52-5a1a-11e8-98fc-12232e75b24b.png)

<p align="center">
    <a href="https://styleci.io/repos/103963472"><img src="https://styleci.io/repos/103963472/shield" alt="StyleCI" /></a>
    <a href="https://packagist.org/packages/andrey-helldar/helpers"><img src="https://poser.pugx.org/andrey-helldar/helpers/downloads?format=flat-square" alt="Total Downloads" /></a>
    <a href="https://packagist.org/packages/andrey-helldar/helpers"><img src="https://poser.pugx.org/andrey-helldar/helpers/version?format=flat-square" alt="Latest Stable Version" /></a>
    <a href="https://packagist.org/packages/andrey-helldar/helpers"><img src="https://poser.pugx.org/andrey-helldar/helpers/v/unstable?format=flat-square" alt="Latest Unstable Version" /></a>
    <a href="https://packagist.org/packages/andrey-helldar/helpers"><img src="https://poser.pugx.org/andrey-helldar/helpers/license?format=flat-square" alt="License" /></a>
</p>


## Installation

To get the latest version of Helpers, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require andrey-helldar/helpers
```

Instead, you may of course manually update your require block and run `composer update` if you so choose:

```json
{
    "require": {
        "andrey-helldar/helpers": "^1.0"
    }
}
```

If you don't use auto-discovery, add the ServiceProvider to the providers array in `config/app.php`:

```php
Helldar\Helpers\LaravelServiceProvider::class,
```

You can also publish the config file to change implementations (ie. interface to specific class):

```
php artisan vendor:publish --provider="Helldar\Helpers\ServiceProvider"
```

Now you can use helpers or access directly to interfaces.

Enjoy!


## Documentation

### Menu

* [Arrays](#arrays)
    * [array_item_value_max_length](#array_item_value_max_length)
    * [array_add_unique](#array_add_unique)
    * [array_rename_keys](#array_rename_keys)
    * [array_size_max_value](#array_size_max_value)
    * [array_sort_by_keys_array](#array_sort_by_keys_array)
* [Digits](#digits)
    * [factorial](#factorial)
    * [short_number](#short_number)
* [Dumper](#dumper)
    * [dd_sql](#dd_sql)
* [Files](#files)
    * [url_file_exists](#url_file_exists)
* [Http](#http)
    * [mix_url](#mix_url)
    * [base_url](#base_url)
    * [build_url](#build_url)
    * [subdomain_name](#subdomain_name)
* [Jsonable](#jsonable)
* [Images](#images)
    * [image_or_default](#image_or_default)
* [Notifications](#notifications)
    * [using](#notify-using)
    * [slack](#notify-slack)
    * [mail](#notify-mail)
* [Strings](#strings)
    * [str_choice](#str_choice)
    * [e](#e)
    * [de](#de)
    * [str_replace_spaces](#str_replace_spaces)
* [Systems](#systems)
    * [is_windows](#is_windows)
    * [is_linux](#is_linux)


### Arrays

#### array_item_value_max_length()

Returns the number of characters of the longest element in the array:

```php
echo array_item_value_max_length(array $array = []) : int

echo (new \Helldar\Helpers\Support\Arr(array $array = []))
    ->arrayItemValueMaxLength() : int
```


#### array_add_unique()

Push one a unique element onto the end of array:

```php
array_add_unique(array &$array, $value)

(new \Helldar\Helpers\Support\Arr())
    ->addUnique(&$array, $value = 'value')

(new \Helldar\Helpers\Support\Arr())
    ->addUnique(&$array, $value = ['value1', 'value2', ...])
```


#### array_rename_keys()

Renaming array keys.
As the first parameter, a callback function is passed, which determines the actions for processing the value.
The output of the function must be a string with a name.

```php
return array_rename_keys($callback, array $array = []) : array

return (new \Helldar\Helpers\Support\Arr(array $array = []))
    ->arrayRenameKeys($callback) : array
```


#### array_size_max_value()

Get the size of the longest text element of the array:

```php
return array_size_max_value(array $array = []) : int

return (new \Helldar\Helpers\Support\Arr((array $array = []))
    ->arraySizeOfMaxValue() : int
```


#### array_sort_by_keys_array()

Sort an associative array in the order specified by an array of keys.

```php
array_sort_by_keys_array($array, $sorter) : void

(new \Helldar\Helpers\Support\Arr())
    ->sortByKeysArray($array, $sorter) : void
```

    Example:

```php
$arr = ['q' => 1, 'r' => 2, 's' => 5, 'w' => 123];

array_sort_by_keys_array($arr, ['q', 'w', 'e']);

print_r($arr);

/*
Array
(
    [q] => 1
    [w] => 123
    [r] => 2
    [s] => 5
)
```

[ [to top](#) | [to menu](#menu) ]


### Digits

#### factorial()

Calculating the factorial of a number:

```php
echo factorial(int $n = 0) : int

echo (new \Helldar\Helpers\Support\Digits())
    ->factorial(int $n = 0) : int
```


#### short_number()

Converts a number into a short version:

```php
echo short_number($n = 0, $precision = 1) : int|string

echo (new \Helldar\Helpers\Support\Digits($n = 0))
    ->shortNumber($precision = 1) : int|string
```

    Example:

```php
short_number(576);
// returns: 576

short_number(1000);
// returns: 1K

short_number(1440);
// returns: 1.4K

short_number(3000000);
// returns: 3M

short_number(3000000000);
// returns: 3B

short_number(3000000000000);
// returns: 3T+
```

[ [to top](#) | [to menu](#menu) ]


### Dumper

#### dd_sql()

Dump the passed variables and end the script.

```php
return dd_sql($query, bool $is_short = false, bool $is_return = false) : array|string|void

return (new \Helldar\Helpers\Support\Dumper($query))
    ->ddSql($is_short, $is_return) : array|string|void
```

[ [to top](#) | [to menu](#menu) ]


### Files

#### url_file_exists()

Checks whether a file or directory exists on URL:

```php
return url_file_exists($path) : bool

return (new \Helldar\Helpers\Support\Files($path))
    ->urlFileExists() : bool
```

[ [to top](#) | [to menu](#menu) ]


### Http

#### mix_url()

Convert the relative path of a versioned Mix files to absolute.

```php
return mix_url($path) : string

return (new \Helldar\Helpers\Support\Http($path))
    ->mixUrl() : string
```


#### base_url()

Get the domain name from the URL.

```php
return base_url($url) : string

return (new \Helldar\Helpers\Support\Http($url))
    ->baseUrl() : string
```


#### build_url()

Reverse function for parse_url() (http://php.net/manual/en/function.parse-url.php).

The code is taken from [gist.github.com/Ellrion](https://gist.github.com/Ellrion/f51ba0d40ae1d62eeae44fd1adf7b704)

```php
$parts1 = [
    'scheme' => 'http',
    'host'   => 'mysite.dev',
];

$parts2 = [
    'scheme'   => 'https',
    'host'     => 'mysite.dev',
    'port'     => 1234,
    'user'     => 'foo',
    'pass'     => 'bar',
    'path'     => '/category/subcategory',
    'query'    => 'page=1',
    'fragment' => 'section=5',
];

return build_url($parts1) : string
return (new \Helldar\Helpers\Support\Http($parts2))
    ->buildUrl();

// returned 1: http://mysite.dev
// returned 2: https://foo:bar@mysite.dev:1234/category/subcategory?page=1#section=5
```


#### subdomain_name()

Retrieving the current subdomain name.

```php
return subdomain_name();

return (new \Helldar\Helpers\Support\Http())
    ->getSubdomain();

// from domain `test.mysite.local` will return `test` (string).
// from domain `mysite.local` will return `null` (null).
```

[ [to top](#) | [to menu](#menu) ]


### Jsonable

Convert the object to its JSON representation.

The code is taken from [gist.github.com/Ellrion](https://gist.github.com/Ellrion/2c7648d3ebdef2cd8ed24ffa78cf1d3d)

```php
use Helldar\Traits\Jsonable;

class MyClass
{
    use Jsonable;

    public function __construct($data)
    {
        $this->setData($data);
    }
}

$obj = new MyClass($data);
echo $obj->toJson();
```

[ [to top](#) | [to menu](#menu) ]


### Images

#### image_or_default()

Check the existence of the file and return the default value if it is missing:

```php
echo image_or_default(string $filename, $default = null) : string

echo (new \Helldar\Helpers\Support\Images($filename))
    ->imageOrDefault($default = null) : string
```

[ [to top](#) | [to menu](#menu) ]


### Notifications

#### Notify Using

To send error notifications, use the `notify()` helper:

```php
try {
    $foo = $bar
} catch(\Exception $exception) {
    notify($exception);
}
```

#### notify slack

To send notifications to the Slack channel, add a link to the webhook in the env file:

```
SLACK_WEBHOOK_LOGS=https://hooks.slack.com/services/xxxxxxxxx/yyyyyyyyy/zzzzzzzzz
```


If an error occurs in the Slack channel, a message like this will appear:

![2018-05-05 01-19-30 slack](https://user-images.githubusercontent.com/10347617/39655465-6258e780-5002-11e8-8952-fdcacd1bd7cf.png)

To specify a link to a channel, see the [settings file](src/config/helpers.php) (`config/helpers.php` in your app).

#### notify mail

To send error notifications to the email, we use the [squareboat/sneaker](https://github.com/squareboat/sneaker) package.

Use its settings to send notifications to the mail.

[ [to top](#) | [to menu](#menu) ]


### Strings

#### str_choice()

The str_choice function translates the given language line with inflection:

```php
echo str_choice(int $num, array $choice = [], string $additional = '') : string

echo (new \Helldar\Helpers\Support\Str($num))
    ->choice(array $choice = [], string $additional = '') : string
```

    Example:
```php
echo str_choice(1, ['пользователь', 'пользователя', 'пользователей']);
// returned "пользователь"

echo str_choice(3, ['пользователь', 'пользователя', 'пользователей']);
// returned "пользователя"

echo str_choice(20, ['пользователь', 'пользователя', 'пользователей']);
// returned "пользователей"

echo str_choice(20, ['пользователь', 'пользователя', 'пользователей'], 'здесь');
// returned "пользователей здесь"
```


#### e()

Escape HTML special characters in a string:

```php
echo e($value) : string

echo (new \Helldar\Helpers\Support\Str($value))
    ->e() : string
```


#### de()

Convert special HTML entities back to characters:

```php
echo de($value) : string

echo (new \Helldar\Helpers\Support\Str($value))
    ->de() : string
```


#### str_replace_spaces()

Replacing multiple spaces with a single space.

```php
echo str_replace_spaces($value) : string

echo (new \Helldar\Helpers\Support\Str($value))
    ->replaceSpaces() : string
```

[ [to top](#) | [to menu](#menu) ]


### Systems

#### is_windows()

Determine whether the current environment is Windows based:

```php
return is_windows() : bool

return (new \Helldar\Helpers\Support\System())
    ->isWindows() : bool
```


#### is_linux()

Determine whether the current environment is Linux based:

```php
return is_linux() : bool

return (new \Helldar\Helpers\Support\System())
    ->isLinux() : bool
```

[ [to top](#) | [to menu](#menu) ]


## Copyright and License

Helpers was written by Andrey Helldar for the Laravel framework 5.5 or later, and is released under the MIT License. See the [LICENSE](LICENSE) file for details.


## Translation

Translations of text and comment by Google Translate. Help with translation +1 in karma :)
