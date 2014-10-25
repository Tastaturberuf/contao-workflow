<?php

namespace spec\Netzmacht\Contao\Workflow\Flow;

use Netzmacht\Contao\Workflow\Data\Data;
use Netzmacht\Contao\Workflow\Flow\Step;
use Netzmacht\Contao\Workflow\Flow\Transition;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StateSpec extends ObjectBehavior
{
    const SUCCESS = true;
    const TRANSITION = 'transition';

    private static $data = array(
        'foo' => true,
        'bar' => false
    );

    const STEP_TO = 'step-to';

    function it_is_initializable()
    {
        $this->shouldHaveType('Netzmacht\Contao\Workflow\Flow\State');
    }

    function let(Transition $transition, \DateTime $dateTime, Step $stepTo)
    {
        $transition
            ->getName()
            ->willReturn(static::TRANSITION);

        $transition
            ->getStepTo()
            ->willReturn($stepTo);

        $stepTo
            ->getName()
            ->willReturn(self::STEP_TO);

        $this->beConstructedWith(
            static::TRANSITION,
            static::STEP_TO,
            static::SUCCESS,
            static::$data,
            $dateTime
        );
    }

    function it_knows_current_step()
    {
        $this->getStepName()->shouldReturn(static::STEP_TO);
    }

    function it_knows_last_transition()
    {
        $this->getTransitionName()->shouldReturn(static::TRANSITION);
    }

    function it_knows_reached_time()
    {
        $this->getReachedAt()->shouldBeAnInstanceOf('DateTime');
    }

    function it_stores_data()
    {
        $this->getData()->shouldReturn(static::$data);
    }

    function it_transits_to_next_state(Transition $transition)
    {
        $this->transit($transition, false, array())->shouldBeAnInstanceOf('Netzmacht\Contao\Workflow\Flow\State');

    }
}
