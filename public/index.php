<?php
// Composer autoloading
include __DIR__ . '/../vendor/autoload.php';

$klein = new \Klein\Klein();

$klein->respond('POST', '/boarding-cards', function (\Klein\Request $request) {
    //this part all the framwor give as rich
    try {
        $boardingCardServiceFactory = new \Application\Service\BoardingCardServiceFactory();
        $boardingCardService = $boardingCardServiceFactory::createBoardingCardService();
        $orderedBoardingCardEntityCollection = $boardingCardService->orderBoardingCards($request->body());
        success($orderedBoardingCardEntityCollection->getItemsArray());
    } catch (\Exception $e) {
        error($e->getMessage());
    }
});

$klein->respond('GET', '/', function (\Klein\Request $request) {
    echo "<h3>Your Property Finder Test is working</h3>";
});

function success($data)
{
    printResult([
        'status' => 'success',
        'data' => $data
    ]);
}

function error($message)
{
    printResult([
        'status' => 'error',
        'message' => $message
    ]);
}

function printResult(array $result)
{
    header('Content-Type: application/json');
    echo json_encode($result);exit;
}

$klein->dispatch();