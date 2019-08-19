<?php

declare(strict_types=1);

namespace App\Utils\ExportService\Document\Purchase;

abstract class AbstractPurchaseWithOrderResponder
{
    protected $htmlView;

    public function __construct(PurchaseWithOrderHtmlView $purchaseWithOrderHtmlView)
    {
        $this->htmlView = $purchaseWithOrderHtmlView;
    }

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return 'Order Details';
	}
}
