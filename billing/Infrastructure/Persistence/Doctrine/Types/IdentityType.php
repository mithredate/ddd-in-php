<?php
/**
 * Filename: IdentityType.
 * User: Mithredate
 * Date: May, 2020
 */

namespace Podro\TMS\Billing\Infrastructure\Persistence\Doctrine\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\Type;
use Podro\TMS\Billing\Domain\Entity\AbstractIdentifier;

class IdentityType extends Type
{

    public const ID = 'id';

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (!$value instanceof AbstractIdentifier) {
            throw ConversionException::conversionFailed(
                $value,
                self::ID
            );
        }

        return implode(
            '|',
            [
                get_class($value),
                $value->getId(),
            ]
        );
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $value = parent::convertToPHPValue($value, $platform);
        if (is_null($value)) {
            throw ConversionException::conversionFailed($value, self::ID);
        }

        [$class, $id] = explode('|', $value);

        return new $class($id);
    }

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $platform->getVarcharTypeDeclarationSQL($fieldDeclaration);
    }

    public function getName()
    {
        return self::ID;
    }
}