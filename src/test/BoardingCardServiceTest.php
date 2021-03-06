<?php
namespace Application\test;

use Application\BoardingCardEntity;
use Application\BoardingCardEntityCollection;
use Application\Service\BoardingCardService;
use PHPUnit\Framework\TestCase;
use Application\Library\PHPUnitUtil;

class BoardingCardServiceTest extends TestCase
{
    public function test_createBoardingCardEntityCollection_returnBoardingCardEntityCollection()
    {
        $boardingCardServiceMock = $this->getMockBuilder(BoardingCardService::class)
            ->setMethods([])->getMock();

        $this->assertInstanceOf(BoardingCardEntityCollection::class, PHPUnitUtil::callMethod(
            $boardingCardServiceMock,
            'createBoardingCardEntityCollection',
            [])
        );
    }

    public function test_buildBoardingCardEntity_correctArguments_returnBoardingCardEntity()
    {
        $boardingCardServiceMock = $this->getMockBuilder(BoardingCardService::class)
            ->setMethods([])->getMock();

        $from = "pppppppp";
        $to = "ttttttt";
        $transportType = BoardingCardEntity::TRANSPORT_TYPE_FLIGHT;

        $boardingCardEntity = PHPUnitUtil::callMethod($boardingCardServiceMock, 'buildBoardingCardEntity', [
            $from,
            $to,
            $transportType
        ]);

        $this->assertInstanceOf(BoardingCardEntity::class, $boardingCardEntity);
        $this->assertEquals($from, $boardingCardEntity->getFrom());
        $this->assertEquals($to, $boardingCardEntity->getTo());
        $this->assertEquals($transportType, $boardingCardEntity->getTransportType());
    }

    public function test_buildBoardingCardEntity_badArguments_returnException()
    {
        $this->expectException(\InvalidArgumentException::class);

        $boardingCardServiceMock = $this->getMockBuilder(BoardingCardService::class)
            ->setMethods([])->getMock();

        $from = "pppppppp";
        $to = "ttttttt";
        $transportType = "ttttttt";

        PHPUnitUtil::callMethod($boardingCardServiceMock, 'buildBoardingCardEntity', [
            $from,
            $to,
            $transportType
        ]);
    }
}