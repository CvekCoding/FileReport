<?php
declare(strict_types=1);

namespace App\Utils\ExportService;

interface FileResponderInterface
{
    public function getHtmlConverter(): HtmlConverterInterface;
}
