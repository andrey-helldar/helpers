## Helpers for Laravel 5.5+

Functions that simplify the development process.

![Helpers for Laravel 5.5+](https://user-images.githubusercontent.com/10347617/30551794-67b9d35e-9ca4-11e7-8e86-1db1b456a2a5.jpg)

<p align="center">
<a href="https://travis-ci.org/andrey-helldar/helpers"><img src="https://travis-ci.org/andrey-helldar/helpers.svg?branch=master&style=flat-square" alt="Build Status" /></a>
<a href="https://packagist.org/packages/andrey-helldar/helpers"><img src="https://img.shields.io/packagist/dt/andrey-helldar/helpers.svg?style=flat-square" alt="Total Downloads" /></a>
<a href="https://packagist.org/packages/andrey-helldar/helpers"><img src="https://poser.pugx.org/andrey-helldar/helpers/v/stable?format=flat-square" alt="Latest Stable Version" /></a>
<a href="https://packagist.org/packages/andrey-helldar/helpers"><img src="https://poser.pugx.org/andrey-helldar/helpers/v/unstable?format=flat-square" alt="Latest Unstable Version" /></a>
<a href="https://github.com/andrey-helldar/helpers"><img src="https://poser.pugx.org/andrey-helldar/helpers/license?format=flat-square" alt="License" /></a>
</p>


<p align="center">
<a href="https://github.com/andrey-helldar/helpers"><img src="https://img.shields.io/scrutinizer/g/andrey-helldar/helpers.svg?style=flat-square" alt="Quality Score" /></a>
<a href="https://php-eye.com/package/andrey-helldar/helpers"><img src="https://php-eye.com/badge/andrey-helldar/helpers/tested.svg?style=flat" alt="PHP-Eye" /></a>
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

Now, use our Helpers :)


## Documentation

### Menu

* [Arrays](#arrays)
* [Digits](#digits)
* [Images](#images)
* [Strings](#strings)
* [Systems](#systems)


### Arrays

Returns the number of characters of the longest element in the array:

    echo array_item_value_max_length(array $array = []) : int
    echo \Helldar\Helpers\Support\Arr::arrayItemValueMaxLength(array $array = []) : int


Get the first element of an array. Useful for method chaining:

    return array_first(array $array = []) : mixed
    return \Helldar\Helpers\Support\Arr::arrayFirst(array $array = []) : mixed


Get the last element from an array:

    return array_last(array $array = []) : mixed
    return \Helldar\Helpers\Support\Arr::arrayLast(array $array = []) : mixed

[ [to top](#) | [to menu](#menu) ]


### Digits

Calculating the factorial of a number:

    echo factorial(int $n = 0) : int
    echo \Helldar\Helpers\Support\Digits::factorial(int $n = 0) : int

[ [to top](#) | [to menu](#menu) ]


### Images

Check the existence of the file and return the default value if it is missing:

    echo image_or_default(string $filename, $default = null) : string
    echo \Helldar\Helpers\Support\Images::imageOrDefault(string $filename, $default = null) : string

[ [to top](#) | [to menu](#menu) ]


### Strings

The str_choice function translates the given language line with inflection:

    echo str_choice(int $num, array $choice = [], string $additional = '') : string
    echo \Helldar\Helpers\Support\Str::choice(int $num, array $choice = [], string $additional = '') : string

    Example:
        echo str_choice(1, ['пользователь', 'пользователя', 'пользователей']);
        // returned "1 пользователь"

        echo str_choice(3, ['пользователь', 'пользователя', 'пользователей']);
        // returned "3 пользователя"

        echo str_choice(20, ['пользователь', 'пользователя', 'пользователей']);
        // returned "20 пользователей"

        echo str_choice(20, ['пользователь', 'пользователя', 'пользователей'], 'здесь');
        // returned "20 пользователей здесь"


Escape HTML special characters in a string:

    echo e($value) : string
    echo \Helldar\Helpers\Support\Str::e($value) : string


Convert special HTML entities back to characters:

    echo de($value) : string
    echo \Helldar\Helpers\Support\Str::de($value) : string

[ [to top](#) | [to menu](#menu) ]


### Systems

Determine whether the current environment is Windows based:

    return is_windows() : bool
    return \Helldar\Helpers\Support\System::isWindows() : bool


Determine whether the current environment is Linux based:

    return is_linux() : bool
    return \Helldar\Helpers\Support\System::isLinux() : bool

[ [to top](#) | [to menu](#menu) ]


## Support Package

You can donate via [PayPal](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=94B8LCPAPJ5VG), [Yandex Money](https://money.yandex.ru/quickpay/shop-widget?account=410012608840929&quickpay=shop&payment-type-choice=on&mobile-payment-type-choice=on&writer=seller&targets=Andrey+Helldar%3A+Open+Source+Projects&targets-hint=&default-sum=&button-text=04&mail=on&successURL=), WebMoney (Z124862854284, R343524258966) and [Patreon](https://www.patreon.com/helldar)

## Copyright and License

Helpers was written by Andrey Helldar for the Laravel framework 5.5 or later, and is released under the MIT License. See the [LICENSE](LICENSE) file for details.

## Translation

Translations of text and comment by Google Translate. Help with translation +1 in karma :)
