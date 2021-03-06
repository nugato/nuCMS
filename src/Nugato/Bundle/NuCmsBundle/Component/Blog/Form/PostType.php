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

namespace Nugato\Bundle\NuCmsBundle\Component\Blog\Form;

use Nugato\Bundle\NuCmsBundle\Entity\File\File;
use Nugato\Bundle\NuCmsBundle\Component\Taxon\Entity\Taxon;
use Sylius\Bundle\ResourceBundle\Form\EventSubscriber\AddCodeFormSubscriber;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;

final class PostType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->addEventSubscriber(new AddCodeFormSubscriber())
            ->add(
                'mainTaxon',
                EntityType::class,
                [
                    'class' => Taxon::class,
                    'choice_label' => 'name',
                    'label' => 'nucms.ui.main_taxon',
                    'required' => false
                ]
            )
            ->add(
                'taxons',
                EntityType::class,
                [
                    'class' => Taxon::class,
                    'choice_label' => 'name',
                    'label' => 'nucms.ui.taxons',
                    'multiple' => true,
                    'expanded' => true,
                ]
            )
            ->add(
                'image',
                EntityType::class,
                [
                    'class' => File::class,
                    'choice_label' => 'title',
                    'label' => 'nucms.ui.image',
                    'required' => false
                ]
            )
            ->add(
                'translations',
                ResourceTranslationsType::class,
                [
                    'entry_type' => PostTranslationType::class,
                ]
            );
    }

    public function getBlockPrefix()
    {
        return 'nucms_blog_post';
    }
}
