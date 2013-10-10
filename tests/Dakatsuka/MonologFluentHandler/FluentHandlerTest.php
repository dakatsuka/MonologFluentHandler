<?php

namespace Dakatsuka\MonologFluentHandler\Tests;

use Dakatsuka\MonologFluentHandler\FluentHandler;
use Monolog\Logger;

class FluentHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    protected $record;

    protected function setUp()
    {
        $record = array();
        $record['channel']   = 'debug';
        $record['message']   = 'monolog.fluent';
        $record['context']   = ['foo' => 'bar'];
        $record['formatted'] = 'formatted message';
        $record['level']     = Logger::DEBUG;

        $this->record = $record;
    }

    public function testWrite()
    {
        $context = $this->record['context'];
        $context['level'] = Logger::getLevelName($this->record['level']);

        $loggerMock = $this->getMockBuilder('Fluent\Logger\FluentLogger')
            ->disableOriginalConstructor()
            ->getMock();
        $loggerMock
            ->expects($this->once())
            ->method('post')
            ->with('debug.monolog.fluent', $context);

        $handler = new FluentHandler($loggerMock);
        $handler->write($this->record);
    }
}
