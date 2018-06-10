<?php

namespace Railken\LaraOre\LegalEntityContact\Attributes\Notes;

use Railken\Laravel\Manager\Attributes\BaseAttribute;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Tokens;
use Respect\Validation\Validator as v;

class NotesAttribute extends BaseAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'notes';

    /**
     * Is the attribute required
     * This will throw not_defined exception for non defined value and non existent model.
     *
     * @var bool
     */
    protected $required = false;

    /**
     * Is the attribute unique.
     *
     * @var bool
     */
    protected $unique = false;

    /**
     * List of all exceptions used in validation.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_DEFINED    => Exceptions\LegalEntityContactNotesNotDefinedException::class,
        Tokens::NOT_VALID      => Exceptions\LegalEntityContactNotesNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\LegalEntityContactNotesNotAuthorizedException::class,
        Tokens::NOT_UNIQUE     => Exceptions\LegalEntityContactNotesNotUniqueException::class,
    ];

    /**
     * List of all permissions.
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'legal_entity_contact.attributes.notes.fill',
        Tokens::PERMISSION_SHOW => 'legal_entity_contact.attributes.notes.show',
    ];

    /**
     * Is a value valid ?
     *
     * @param EntityContract $entity
     * @param mixed          $value
     *
     * @return bool
     */
    public function valid(EntityContract $entity, $value)
    {
        return v::length(1, 255)->validate($value);
    }
}
