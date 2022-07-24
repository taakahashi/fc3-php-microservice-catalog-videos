<?php

namespace Core\Domain\Entity\Traits;

use Exception;

trait MethodsMagicsTrait
{
    /**
     * @throws Exception
     */
    public function __get($property)
    {
        if($this->{$property})
            return $this->{$property};

        $class = get_class($this);
        throw new Exception("Property {$property} not found in {$class}");
    }
}
