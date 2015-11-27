<?php

namespace Olesnica\AdminBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

class CheckFinishDateTime extends Constraint
{
    public $message = 'Konec akce musí být pozdější než začátek akce.';

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
