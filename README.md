# Avensome CommonMark Bundle

Provides seamless integration of [CommonMark](https://github.com/thephpleague/commonmark) with Symfony and Twig.

Requires PHP 7.0+ and Symfony 4.0+.


## Installation

Install with Composer:

```
composer require avensome/commonmark-bundle
```

Then add `Avensome\CommonMarkBundle\AvensomeCommonMarkBundle` to `config/bundles.php`:

```php
<?php

return [
    // ...
    Avensome\CommonMarkBundle\AvensomeCommonMarkBundle::class => ['all' => true],
];
```


## Usage in services

`CommonMarkConverter` is an injectable service:

```php
<?php
use League\CommonMark\CommonMarkConverter;

class MyService
{
    public function __construct(CommonMarkConverter $converter)
    {
        // Do something with $converter
        // https://github.com/thephpleague/commonmark#basic-usage
    }
}
```


## Usage in Twig

The `markdown` filter and tag are available in Twig.

```twig
{{ '# This string will be turned into HTML' | markdown }}

{% markdown %}
Contents of *these tags* will become HTML!

- Nunquam locus lanista.
- Neuter, barbatus solems aegre prensionem de secundus, salvus galatae.
- Rumor moris, tanquam castus verpa.
{% endmarkdown %}
```


## Configuration

The `CommonMarkConverter` accepts [configuration](https://commonmark.thephpleague.com/configuration/) as one of its parameters. With this package you can adjust these in your Symfony configuration (`config.yaml` or similar). Just add the `avensome_commonmark` key, everything under it will be passed directly to the Converter.

```yaml
# ...

avensome_commonmark:
    html_input: allow
    allow_unsafe_links: true
```


# Extensions

To enable a CommonMark extension, just register it as a service and tag it with `avensome_commonmark.extension`.

For example to enable [WebUni Table Extension](https://github.com/webuni/commonmark-table-extension), install it and edit your `services.yaml`:

```yaml
services:
    # ...
    
    Webuni\CommonMark\TableExtension\TableExtension:
        tags:
            - name: avensome_commonmark.extension
```
