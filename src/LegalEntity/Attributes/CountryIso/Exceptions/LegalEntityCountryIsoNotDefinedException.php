<?php

namespace Railken\LaraOre\LegalEntity\Attributes\CountryIso\Exceptions;

use Railken\LaraOre\LegalEntity\Exceptions\LegalEntityAttributeException;

class LegalEntityCountryIsoNotDefinedException extends LegalEntityAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'country_iso';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'LEGALENTITY_COUNTRY_ISO_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
