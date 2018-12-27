<?php

function from(\DateTime $date): \DateTime
{
    return (clone $date)->add(new \DateInterval('PT1000000000S'));
}
