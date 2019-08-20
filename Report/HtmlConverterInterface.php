<?php
declare(strict_types=1);

namespace App\Utils\ExportService;

use Symfony\Component\HttpFoundation\Response;

interface HtmlConverterInterface
{
	public function getResponse(string $html, string $reportName, array $optionals = null): Response;
}
