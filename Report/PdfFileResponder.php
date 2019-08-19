<?php

declare(strict_types=1);

namespace App\Utils\ExportService;

use App\Utils\Security\Security;
use App\Utils\Tools\Normalizer;
use App\Utils\Tools\PdfBaseTemplate;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Knp\Snappy\Pdf;

/**
 * @internal
 */
final class PdfFileResponder
{
    public const FILE_EXTENSION = 'pdf';

    private $pdfGenerator;
    private $pdfTemplate;
    private $security;

    public function __construct(Pdf $pdfGenerator, PdfBaseTemplate $pdfTemplate, Security $security)
    {
        $this->pdfGenerator = $pdfGenerator;
        $this->pdfTemplate = $pdfTemplate;
        $this->security = $security;
    }

    /**
     * @param string      $html
     * @param string      $reportName
     * @param string|null $caption
     * @param bool|null   $landscape
     *
     * @return PdfResponse
     */
    public function getPdfResponse(string $html,
                                   string $reportName,
                                   string $caption = null,
                                   bool $landscape = null): PdfResponse
    {
        $landscape = $landscape ?? false;
        $orientation = $landscape ? 'Landscape' : 'Portrait';

        $this->pdfGenerator->setOption('orientation', $orientation);

        return new PdfResponse($this->pdfGenerator->getOutputFromHtml($html, [
            'header-html' => $this->getPdfHeaderHtml($this->pdfTemplate, $reportName, $caption),
            'footer-html' => $this->getPdfFooterHtml($this->pdfTemplate),
        ]), $this->getFileName($reportName));
    }

    /**
     * Name of file to be downloaded.
     *
     * @param string $reportName
     *
     * @return string
     */
    private function getFileName(string $reportName): string
    {
        return Normalizer::snakeString($reportName).'.'.self::FILE_EXTENSION;
    }

    /**
     * @param PdfBaseTemplate $pdfTemplate
     * @param string          $reportName
     * @param string          $caption
     *
     * @return string
     */
    private function getPdfHeaderHtml(PdfBaseTemplate $pdfTemplate, string $reportName, string $caption = null): string
    {
        return $pdfTemplate->getPdfHeader($this->security->getUser(), $reportName, $caption);
    }

    /**
     * @param PdfBaseTemplate $pdfTemplate
     *
     * @return string
     */
    private function getPdfFooterHtml(PdfBaseTemplate $pdfTemplate): string
    {
        return $pdfTemplate->getPdfFooter();
    }
}
