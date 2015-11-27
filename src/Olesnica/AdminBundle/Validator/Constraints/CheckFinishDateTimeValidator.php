<?php

namespace Olesnica\AdminBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class CheckFinishDateTimeValidator extends ConstraintValidator
{
    public function validate($event, Constraint $constraint)
    {
        $finishDate = $event->getFinishDate();
        $startDate = $event->getStartDate();
        $startTime = $event->getStartTime();
        $finishTime = $event->getFinishTime();
        if (is_null($finishDate) === false) {
            if ($startDate > $finishDate) {
                $this->context->buildViolation($constraint->message)
                    ->atPath('finishDate')
                    ->addViolation()
                ;
            } else if ($startDate == $finishDate) {
                if (is_null($startTime) && is_null($finishTime)) {
                    $this->context->buildViolation($constraint->message)
                        ->atPath('finishDate')
                        ->addViolation()
                    ;
                } else if (is_null($startTime) === false && is_null($finishTime) === false) {
                    if ($startTime >= $finishTime) {
                      $this->context->buildViolation($constraint->message)
                          ->atPath('finishTime')
                          ->addViolation()
                      ;
                    }
                }
            }
        }
    }
}
