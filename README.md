## Helpers for Laravel 5.5+

Functions that simplify the development process.

![Helpers for Laravel 5.5+](https://user-images.githubusercontent.com/10347617/30551794-67b9d35e-9ca4-11e7-8e86-1db1b456a2a5.jpg)

<p align="center">
<a href="https://travis-ci.org/andrey-helldar/helpers"><img src="https://travis-ci.org/andrey-helldar/helpers.svg?branch=master&style=flat-square" alt="Build Status" /></a>
<a href="https://packagist.org/packages/andrey-helldar/helpers"><img src="https://img.shields.io/packagist/dt/andrey-helldar/helpers.svg?style=flat-square" alt="Total Downloads" /></a>
<a href="https://poser.pugx.org/show/andrey-helldar/helpers"><img src="https://poser.pugx.org/andrey-helldar/helpers/v/stable?format=flat-square" alt="Latest Stable Version" /></a>
<a href="https://poser.pugx.org/show/andrey-helldar/helpers"><img src="https://poser.pugx.org/andrey-helldar/helpers/v/unstable?format=flat-square" alt="Latest Unstable Version" /></a>
<a href="https://poser.pugx.org/show/andrey-helldar/helpers"><img src="https://poser.pugx.org/andrey-helldar/helpers/license?format=flat-square" alt="License" /></a>
</p>


<p align="center">
<a href='https://www.versioneye.com/user/projects/59bff8eb0fb24f003d2ef836'><img src='https://www.versioneye.com/user/projects/59bff8eb0fb24f003d2ef836/badge.svg?style=flat-square' alt="Dependency Status" /></a>
<a href="https://styleci.io/repos/103963472"><img src="https://styleci.io/repos/103963472/shield" alt="StyleCI" /></a>
<a href="https://php-eye.com/package/andrey-helldar/helpers"><img src="https://php-eye.com/badge/andrey-helldar/helpers/tested.svg?style=flat-square" alt="PHP-Eye" /></a>
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

    Helldar\Helpers\LaravelServiceProvider::class,

Now you can use helpers or access directly to interfaces.

Enjoy!


## Documentation

### Menu

* [Arrays](#arrays)
* [Digits](#digits)
* [Dumper](#dumper)
* [Files](#files)
* [Http](#http)
* [Images](#images)
* [Messages](#messages)
* [Strings](#strings)
* [Systems](#systems)


### Arrays

Returns the number of characters of the longest element in the array:

    echo array_item_value_max_length(array $array = []) : int
    echo (new \Helldar\Helpers\Support\Arr(array $array = []))
            ->arrayItemValueMaxLength() : int


Get the first element of an array. Useful for method chaining:

    return array_first(array $array = []) : mixed
    return (new \Helldar\Helpers\Support\Arr(array $array = []))
            ->arrayFirst() : mixed


Get the last element from an array:

    return array_last(array $array = []) : mixed
    return (new \Helldar\Helpers\Support\Arr(array $array = []))
            ->arrayLast() : mixed


Push one or more elements onto the end of array:

    array_add(array &$array, $value)
    (new \Helldar\Helpers\Support\Arr())
            ->add(&$array, $value)


Push one a unique element onto the end of array:

    array_add_unique(array &$array, $value)

    (new \Helldar\Helpers\Support\Arr())
            ->addUnique(&$array, $value = 'value')

    (new \Helldar\Helpers\Support\Arr())
            ->addUnique(&$array, $value = ['value1', 'value2', ...])


Renaming array keys.
As the first parameter, a callback function is passed, which determines the actions for processing the value.
The output of the function must be a string with a name.

    return array_rename_keys($callback, array $array = []) : array
    return (new \Helldar\Helpers\Support\Arr(array $array = []))
            ->arrayRenameKeys($callback) : array


Get the size of the longest text element of the array:

    return array_size_max_value(array $array = []) : int
    return (new \Helldar\Helpers\Support\Arr((array $array = []))
            ->arraySizeOfMaxValue() : int


Sort an associative array in the order specified by an array of keys.

    array_sort_by_keys_array($array, $sorter) : void
    (new \Helldar\Helpers\Support\Arr())
            ->sortByKeysArray($array, $sorter) : void

    Example:

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


[ [to top](#) | [to menu](#menu) ]


### Digits

Calculating the factorial of a number:

    echo factorial(int $n = 0) : int
    echo (new \Helldar\Helpers\Support\Digits())
            ->factorial(int $n = 0) : int


Converts a number into a short version:

    echo short_number($n = 0, $precision = 1) : int|string
    echo (new \Helldar\Helpers\Support\Digits($n = 0))
            ->shortNumber($precision = 1) : int|string

    Example:

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

[ [to top](#) | [to menu](#menu) ]


### Dumper

Dump the passed variables and end the script.

    return dd_sql($query, bool $is_short = false, bool $is_return = false) : array|string|void
    return (new \Helldar\Helpers\Support\Dumper($query))
            ->ddSql($is_short, $is_return) : array|string|void

[ [to top](#) | [to menu](#menu) ]


### Files

Checks whether a file or directory exists on URL:

    return url_file_exists($path) : bool
    return (new \Helldar\Helpers\Support\Files($path))
            ->urlFileExists() : bool

[ [to top](#) | [to menu](#menu) ]


### Http

Convert the relative path of a versioned Mix files to absolute.

    return mix_url($path) : string
    return (new \Helldar\Helpers\Support\Http($path))
            ->mixUrl() : string


Get the domain name from the URL.

    return base_url($url) : string
    return (new \Helldar\Helpers\Support\Http($url))
            ->baseUrl() : string

[ [to top](#) | [to menu](#menu) ]


### Images

Check the existence of the file and return the default value if it is missing:

    echo image_or_default(string $filename, $default = null) : string
    echo (new \Helldar\Helpers\Support\Images($filename))
            ->imageOrDefault($default = null) : string

[ [to top](#) | [to menu](#menu) ]


### Messages

The code is taken from [gist.github.com/Ellrion](https://gist.github.com/Ellrion/7ee8085b35f0de8c6d386255f9dd16bb)

In Controllers:

```php
flash('Some info message');
flash()->error('This is some error!')
//flash()->warning
//flash()->success
//flash()->info
```

In Template:

```
@foreach(flash()->messages() as $message)
<div>{{ $message->level }}: {{ $message->text }}</div>
@endforeach
```

Or only one message level:

```
@foreach(flash()->messages('danger') as $message)
<div class="alert-danger">{{ $message->text }}</div>
@endforeach
@foreach($errors->all() as $message)
<div class="alert-danger">{{ $message }}</div>
@endforeach
```

## Multiple messages

```php
flash()->warning('Warning One');
flash()->warning('Warning Two');
flash()->success('But we did it')
```

## Extra data for messages

And possible add some extra data with message:

```php
flash()->error('This error show in modal', ['important' => true])
```

and read it in view

```
@foreach(flash()->messages() as $message)
<div class="message" @if(!empty($message->important)) data-modal="" @endif>
  {{ $message->text }}
</div>
@endforeach
```

[ [to top](#) | [to menu](#menu) ]


### Strings

The str_choice function translates the given language line with inflection:

    echo str_choice(int $num, array $choice = [], string $additional = '') : string
    echo (new \Helldar\Helpers\Support\Str($num))
            ->choice(array $choice = [], string $additional = '') : string

    Example:
        echo str_choice(1, ['пользователь', 'пользователя', 'пользователей']);
        // returned "пользователь"

        echo str_choice(3, ['пользователь', 'пользователя', 'пользователей']);
        // returned "пользователя"

        echo str_choice(20, ['пользователь', 'пользователя', 'пользователей']);
        // returned "пользователей"

        echo str_choice(20, ['пользователь', 'пользователя', 'пользователей'], 'здесь');
        // returned "пользователей здесь"


Escape HTML special characters in a string:

    echo e($value) : string
    echo (new \Helldar\Helpers\Support\Str($value))
            ->e() : string


Convert special HTML entities back to characters:

    echo de($value) : string
    echo (new \Helldar\Helpers\Support\Str($value))
            ->de() : string


Replacing multiple spaces with a single space.

    echo str_replace_spaces($value) : string
    echo (new \Helldar\Helpers\Support\Str($value))
            ->replaceSpaces() : string

[ [to top](#) | [to menu](#menu) ]


### Systems

Determine whether the current environment is Windows based:

    return is_windows() : bool
    return (new \Helldar\Helpers\Support\System())
            ->isWindows() : bool


Determine whether the current environment is Linux based:

    return is_linux() : bool
    return (new \Helldar\Helpers\Support\System())
            ->isLinux() : bool

[ [to top](#) | [to menu](#menu) ]


## Donate

You can donate via [PayPal](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=94B8LCPAPJ5VG), [Yandex Money](https://money.yandex.ru/quickpay/shop-widget?account=410012608840929&quickpay=shop&payment-type-choice=on&mobile-payment-type-choice=on&writer=seller&targets=Andrey+Helldar%3A+Open+Source+Projects&targets-hint=&default-sum=&button-text=04&mail=on&successURL=), WebMoney (Z124862854284, R343524258966) and [Patreon](https://www.patreon.com/helldar)

## Copyright and License

Helpers was written by Andrey Helldar for the Laravel framework 5.5 or later, and is released under the MIT License. See the [LICENSE](LICENSE) file for details.

## Translation

Translations of text and comment by Google Translate. Help with translation +1 in karma :)
