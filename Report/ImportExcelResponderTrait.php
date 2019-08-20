<?php

declare(strict_types=1);

namespace App\Utils\ExportService;

trait ImportExcelResponderTrait
{
    /** @var ExcelFileConverter */
    protected $excelConverter;

    /**
     * @required
     *
     * @param ExcelFileConverter $excelConverter
     */
    public function setExcelConverter(ExcelFileConverter $excelConverter): void
    {
        $this->excelConverter = $excelConverter;
    }

	/**
	 * @return ExcelFileConverter
	 */
	public function getExcelConverter(): HtmlConverterInterface
	{
		return $this->excelConverter;
	}
}
