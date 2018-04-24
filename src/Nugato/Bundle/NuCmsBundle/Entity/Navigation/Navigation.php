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

namespace Nugato\Bundle\NuCmsBundle\Entity\Navigation;

use Sylius\Component\Resource\Model\TimestampableTrait;

class Navigation implements NavigationInterface
{
    use TimestampableTrait;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $name;

    /**
     * {@inheridoc}
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * {@inheridoc}
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * {@inheridoc}
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * {@inheridoc}
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * {@inheridoc}
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}