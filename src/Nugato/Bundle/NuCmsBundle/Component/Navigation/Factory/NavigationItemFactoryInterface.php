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

namespace Nugato\Bundle\NuCmsBundle\Component\Navigation\Factory;

use Nugato\Bundle\NuCmsBundle\Component\Navigation\Entity\NavigationInterface;
use Nugato\Bundle\NuCmsBundle\Component\Navigation\Entity\NavigationItemInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

interface NavigationItemFactoryInterface extends FactoryInterface
{
    /**
     * @param NavigationInterface $navigation
     * @param NavigationItemInterface|null $parent
     *
     * @return NavigationItemInterface
     */
    public function createForNavigation(
        NavigationInterface $navigation,
        ?NavigationItemInterface $parent
    ): NavigationItemInterface;
}
