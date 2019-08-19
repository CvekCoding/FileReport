<?php

declare(strict_types=1);

namespace App\Utils\ExportService;

trait ImportExcelResponderTrait
{
	/** @var ExcelFileResponder */
	protected $excelFileResponder;

	/**
	 * @required
	 *
	 * @param ExcelFileResponder $excelFileResponder
	 */
	public function setExcelFileResponder(ExcelFileResponder $excelFileResponder): void
	{
		$this->excelFileResponder = $excelFileResponder;
	}
}
