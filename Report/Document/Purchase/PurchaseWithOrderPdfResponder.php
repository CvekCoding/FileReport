<?php

declare(strict_types=1);

namespace App\Utils\ExportService\Document\Purchase;

use App\Entity\Main\Purchase;
use App\Utils\ExportService\ImportPdfResponderTrait;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;

final class PurchaseWithOrderPdfResponder extends AbstractPurchaseWithOrderResponder
{
	use ImportPdfResponderTrait;

	/**
	 * @param Purchase $purchase
	 *
	 * @return PdfResponse
	 */
    public function getResponse(Purchase $purchase): PdfResponse
    {
        $html = $this->htmlView->getHtml($purchase);
        $caption = "Vendor: {$purchase->getLocationVendor()->getName()}";

        return $this->pdfFileResponder->getPdfResponse($html, $this->htmlView->getName(), $caption);
    }
}
