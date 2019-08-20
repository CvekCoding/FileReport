<?php

declare(strict_types=1);

namespace App\Utils\ExportService;

trait ImportPdfResponderTrait
{
    /** @var PdfFileConverter */
    protected $pdfConverter;

    /**
     * @required
     *
     * @param PdfFileConverter $pdfConverter
     */
    public function setPdfConverter(PdfFileConverter $pdfConverter): void
    {
        $this->pdfConverter = $pdfConverter;
    }

    /**
     * @return PdfFileConverter
     */
    public function getPdfConverter(): HtmlConverterInterface
    {
        return $this->pdfConverter;
    }
}
