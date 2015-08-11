<?php namespace Fxweb\Helpers;

use Excel;

class Export
{
	private $aHeaders;

	private $aData;

	private $sFilename;

	public function __construct($aHeaders, $aData, $sFilename='')
	{
		$this->aHeaders = $aHeaders;
		$this->aData = $aData;

		if (empty($sFilename)) {
			$sFilename = 'Export-'.date('Y-m-d-H-i-s');
		}

		$this->sFilename = $sFilename;
	}

	public function export($sType)
	{
		switch (strtolower($sType)){
			case 'xls':
				$this->toXls();
				break;
		}

	}

	private function toXls()
	{
		$aHeaders = $this->aHeaders;
		$aData = $this->aData;
		$aLetters = [
			'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L',
			'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X',
			'Y', 'Z'
		];

		Excel::create($this->sFilename, function($oExcel) use ($aLetters, $aHeaders, $aData)
		{
			$oExcel->sheet('Sheet1', function ($oSheet) use ($aLetters, $aHeaders, $aData) {

				foreach ($aHeaders as $dKey => $sHeader) {
					$oSheet->setCellValue($aLetters[$dKey].'1', $sHeader);
				}

				foreach ($aData as $dRowKey => $aRow) {
					$dRowKey += 2;
					foreach ($aRow as $dKey => $_aRow) {
						$oSheet->setCellValue($aLetters[$dKey].($dRowKey), $_aRow);

					}
				}
/*
				foreach ($aData as $dKey => $aData) {
					$oSheet->setCellValue($aLetters[$dKey].$dKey, $sHeader);
				}

				foreach ($oProjects as $dKey => $oProject) {
					$dKey += 2;
					$oSheet->setCellValue('A' . $dKey, $oProject->id_project);
					$oSheet->setCellValue('B' . $dKey, $oProject->id_client);
					$oSheet->setCellValue('C' . $dKey, $oProject->service);
					$oSheet->setCellValue('D' . $dKey, $oProject->price);
					$oSheet->setCellValue('E' . $dKey, $oProject->finishing_date);
					$oSheet->setCellValue('F' . $dKey, $oProject->status);
					$oSheet->setCellValue('G' . $dKey, $oProject->created_at);
					$oSheet->setCellValue('H' . $dKey, $oProject->updated_at);
				}
*/
			});
		})->export('xls');
	}

}