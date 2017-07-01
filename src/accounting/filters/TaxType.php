<?php

namespace Xero\accounting\filters;


/**
 * Interface TaxType
 * @package Xero\accounting\filters
 */
interface TaxType
{
    const OUTPUT = 'OUTPUT';
    const INPUT = 'INPUT';
    const CAPEXINPUT = 'CAPEXINPUT';
    const EXEMPTEXPORT = 'EXEMPTEXPORT';
    const EXEMPTEXPENSES = 'EXEMPTEXPENSES';
    const EXEMPTCAPITAL = 'EXEMPTCAPITAL';
    const EXEMPTOUTPUT = 'EXEMPTOUTPUT';
    const INPUTTAXED = 'INPUTTAXED';
    const BASEXCLUDED = 'BASEXCLUDED';
    const GSTONCAPIMPORTS = 'GSTONCAPIMPORTS';
    const GSTONIMPORTS = 'GSTONIMPORTS';

    /**
     * @param $type
     * @return mixed
     */
    public function taxType($type);
}