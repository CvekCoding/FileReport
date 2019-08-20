<?php

declare(strict_types=1);

namespace App\Utils\ExportService\Document\Purchase;

use App\Utils\ExportService\FileResponderInterface;

abstract class AbstractPurchaseWithOrderResponder implements FileResponderInterface
{
	public const REPORT_NAME = 'Order Details';

    protected $purchaseWithOrderHtmlView;

    public function __construct(PurchaseWithOrderHtmlView $purchaseWithOrderHtmlView)
    {
        $this->purchaseWithOrderHtmlView = $purchaseWithOrderHtmlView;
    }

	/**
	 * @param Purchase $purchase
	 *
	 * @return StreamedResponse
	 * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
	 */
	public function getResponse(Purchase $purchase): Response
	{
		$html = $this->purchaseWithOrderHtmlView->getHtml($purchase);

		return $this->getHtmlConverter()->getResponse($html, self::REPORT_NAME);
	}
}
