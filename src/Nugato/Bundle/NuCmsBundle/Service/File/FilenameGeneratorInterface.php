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

namespace Nugato\Bundle\NuCmsBundle\Service\File;

use Symfony\Component\HttpFoundation\File\UploadedFile;

interface FilenameGeneratorInterface
{
    public function generate(UploadedFile $file): string;
}
