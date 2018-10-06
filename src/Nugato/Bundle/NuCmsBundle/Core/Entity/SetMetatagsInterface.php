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

namespace Nugato\Bundle\NuCmsBundle\Core\Entity;

interface SetMetatagsInterface
{
    public function getMetaTitle(): ?string;

    public function setMetaTitle(string $metaTitle): void;

    public function getMetaDescription(): ?string;

    public function setMetaDescription(string $metaDescription): void;
}
