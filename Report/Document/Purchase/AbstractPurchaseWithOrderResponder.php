<?php

declare(strict_types=1);

namespace App\Utils\ExportService\Document\Purchase;

abstract class AbstractPurchaseWithOrderResponder
{
    protected $purchaseWithOrderHtmlView;

    public function __construct(PurchaseWithOrderHtmlView $purchaseWithOrderHtmlView)
    {
        $this->purchaseWithOrderHtmlView = $purchaseWithOrderHtmlView;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'Order Details';
    }
}
