<?php

/*
 * This file is part of the NuCms package.
 *
 * (c) Jacek Bednarek
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Nugato\Bundle\NuCmsBundle\Component\User\Entity;

use Sylius\Component\User\Model\UserInterface as BaseUserInterface;

interface UserInterface extends BaseUserInterface
{
    public const ROLE_ADMIN_ACCESS = 'ROLE_ADMIN_ACCESS';
    public const ROLE_API_ACCESS = 'ROLE_API_ACCESS';
    public const DEFAULT_ROLE_ADMIN = self::ROLE_ADMIN_ACCESS;

    /**
     * @return string
     */
    public function getFirstName(): string;

    /**
     * @return string
     */
    public function getLastName(): string;

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName);

    /**
     * @return string
     */
    public function getLocaleCode(): ?string;

    /**
     * @param string $localeCode
     */
    public function setLocaleCode(string $localeCode);

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName);
}
