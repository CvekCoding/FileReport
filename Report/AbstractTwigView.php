<?php

declare(strict_types=1);

namespace App\Utils\ExportService;

use Symfony\Component\Templating\EngineInterface;

/**
 * To represent report object.
 *
 * @see AbstractReportBuilder
 */
abstract class AbstractTwigView
{
    protected $twig;

    public function __construct(EngineInterface $twig)
    {
        $this->twig = $twig;
    }
}
