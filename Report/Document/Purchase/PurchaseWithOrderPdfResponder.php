<?php

declare(strict_types=1);

namespace App\Utils\ExportService\Document\Purchase;

use App\Entity\Main\Purchase;
use App\Utils\ExportService\PdfFileResponder;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;

final class PurchaseWithOrderPdfResponder
{
    private $pdfFileResponder;
    private $htmlView;

    public function __construct(PdfFileResponder $pdfFileResponder, PurchaseWithOrderHtmlView $htmlView)
    {
        $this->pdfFileResponder = $pdfFileResponder;s
        $this->htmlView = $htmlView;
    }

    public function getResponse(Purchase $purchase): PdfResponse
    {
        $html = $this->htmlView->getHtml($purchase);
        $caption = "Vendor: {$purchase->getLocationVendor()->getName()}";

        return $this->pdfFileResponder->getPdfResponse($html, $this->htmlView->getName(), $caption);
    }
}
