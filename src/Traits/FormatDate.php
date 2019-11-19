<?php

namespace App\Traits;

trait FormatDate
{
    /**
     * @param string date
     * @return \DateTimeInterface 
     */
    public function formatDate($date) : \DateTimeInterface
    {
        $formmatedDate = \DateTime::createFromFormat('Y-m-d', $date);

        if(!$formmatedDate instanceof \DateTimeInterface)
        {
            throw new \InvalidArgumentException('A valid launch date is required.');
        }

        return $formmatedDate;
    }
}