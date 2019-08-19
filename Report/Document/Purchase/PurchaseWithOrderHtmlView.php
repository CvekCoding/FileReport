<?php

declare(strict_types=1);

namespace App\Utils\ExportService\Document\Purchase;

use App\Entity\Main\Purchase;
use App\Utils\Exception\RuntimeException;
use App\Utils\ExportService\AbstractTwigView;

final class PurchaseWithOrderHtmlView extends AbstractTwigView
{
    public const TEMPLATE_PATH = 'order/print/orders.details.html.twig';

    public function getHtml(Purchase $purchase): string
    {
        if (null === $order = $purchase->getOrder()) {
            throw new RuntimeException('Can not generate output, purchase has no related order.');
        }

        return $this->twig->render(self::TEMPLATE_PATH, [
            'orders' => [$order],
            'selectedPurchase' => $purchase,
        ]);
    }
}
