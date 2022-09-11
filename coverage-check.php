<?php

declare(strict_types=1);

const REPORT_PATH = './clover.xml';
const MINIMUM_COVERAGE = 100;

$reportPath = REPORT_PATH;
$minimumCoverage = MINIMUM_COVERAGE;

if (isset($argv[1]))
{
    $reportPath = $argv[1];
}
if (isset($argv[2]))
{
    $minimumCoverage = max(0, min((int) $argv[2], 100));
}

if (!file_exists($reportPath))
{
    echo 'File `' . $reportPath . '` does not exist.' . PHP_EOL;
    exit(1);
}

try
{
    $xml = new SimpleXMLElement(file_get_contents($reportPath));
    $metrics = $xml->xpath('//metrics');
}
catch (Exception $e)
{
    echo $e->getMessage() .PHP_EOL;
    exit(1);
}

$coverTypes = [
    'elements',
    'statements',
    'methods'
];

$coveredMetrics = 0;
$totalMetrics = 0;

foreach ($metrics as $metric)
{
    foreach ($coverTypes as $coverType)
    {
        $totalMetrics += (int) $metric[$coverType];
        $coveredMetrics += (int) $metric['covered' . $coverType];
    }
}

$totalPercentageCoverage = $coveredMetrics / $totalMetrics * 100;

echo 'Total coverage is ' . round($totalPercentageCoverage, 2) . '%' . PHP_EOL;

if ($totalPercentageCoverage < $minimumCoverage)
{
    echo 'This is lower than the accepted value of ' . round($minimumCoverage, 2) . '%' . PHP_EOL;
    exit(1);
}

echo 'This is higher than the accepted value of ' . round($minimumCoverage, 2) . '%' . PHP_EOL;
