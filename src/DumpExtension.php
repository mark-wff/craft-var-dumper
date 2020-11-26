<?php

namespace markwff\craftvardumper;

use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\Template;
use Twig\TokenParser\TokenParserInterface;
use Twig\TwigFunction;

class DumpExtension extends AbstractExtension
{
    private $cloner;
    private $dumper;

    public function __construct()
    {
        $this->cloner = new VarCloner();
        $this->dumper = new HtmlDumper();
    }

    /**
     * @return TwigFunction[]
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('dump', [$this, 'dump'], ['is_safe' => ['html'], 'needs_context' => true, 'needs_environment' => true]),
        ];
    }

    public function getName()
    {
        return 'dump';
    }

    public function dump(Environment $env, $context)
    {
        if (!$env->isDebug()) {
            return null;
        }

        if (2 === \func_num_args()) {
            $vars = [];
            foreach ($context as $key => $value) {
                if (!$value instanceof Template) {
                    $vars[$key] = $value;
                }
            }

            $vars = [$vars];
        } else {
            $vars = \func_get_args();
            unset($vars[0], $vars[1]);
        }

        $dump = fopen('php://memory', 'r+b');
        $this->dumper = $this->dumper ?: new HtmlDumper();
        $this->dumper->setCharset($env->getCharset());

        foreach ($vars as $value) {
            $this->dumper->dump($this->cloner->cloneVar($value), $dump);
        }

        return stream_get_contents($dump, -1, 0);
    }
}
