<?php

namespace Helldar\Helpers\Factory;

use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Support\Jsonable;
use InvalidArgumentException;
use JsonSerializable;

/**
 * Class JsonFactory
 *
 * @see https://gist.github.com/Ellrion/2c7648d3ebdef2cd8ed24ffa78cf1d3d
 */
class JsonFactory
{
    /**
     * Base Namespace for JsonGenerator classes.
     *
     * @var
     */
    protected $rootNamespace;

    /**
     * @var \Illuminate\Contracts\Container\Container
     */
    private $app;

    /**
     * JsonFactory constructor.
     *
     * @param \Illuminate\Contracts\Container\Container $app
     */
    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    /**
     * Generate (transform) json from data.
     *
     * @param string $generator
     * @param mixed  $data
     * @param int    $options
     *
     * @return string
     */
    public function make($generator, $data, $options = 0)
    {
        $generatorClass = $this->getGeneratorClass($generator);
        $generator      = $this->app->make($generatorClass, compact('data'));

        if ($generator instanceof JsonSerializable) {
            return json_encode($generator->jsonSerialize(), $options);
        }

        if ($generator instanceof Jsonable) {
            return $generator->toJson($options);
        }

        throw new InvalidArgumentException('Builder must implements \Illuminate\Contracts\Support\Jsonable or \JsonSerializable');
    }

    /**
     * Getting name of generator class.
     *
     * @param $generator
     *
     * @return string
     */
    protected function getGeneratorClass($generator)
    {
        if (class_exists($generator)) {
            return $generator;
        }

        $path = collect(explode('.', $generator))->map(function ($str) {
            return ucfirst(camel_case($str));
        });

        return $this->rootNamespace . '\\' . implode('\\', $path->all());
    }

    /**
     * Setting up root namespace for generators classes.
     *
     * @param $rootNamespace
     *
     * @return $this
     */
    public function setRootGeneratorNamespace($rootNamespace)
    {
        $this->rootNamespace = $rootNamespace;

        return $this;
    }
}
