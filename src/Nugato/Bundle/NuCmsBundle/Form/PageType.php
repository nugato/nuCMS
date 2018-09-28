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

namespace Nugato\Bundle\NuCmsBundle\Form;

use Sylius\Bundle\ResourceBundle\Form\EventSubscriber\AddCodeFormSubscriber;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

final class PageType extends AbstractResourceType
{
    /**
     * @var array
     */
    private $templates;

    public function __construct(string $dataClass, $validationGroups = [], array $templates = [])
    {
        $this->templates = $templates;

        parent::__construct($dataClass, $validationGroups);
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->addEventSubscriber(new AddCodeFormSubscriber())
            ->add('template', ChoiceType::class, ['choices' => $this->prepareTemplatesChoices()])
            ->add(
                'translations',
                ResourceTranslationsType::class,
                [
                    'entry_type' => PageTranslationType::class,
                ]
            );
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'nucms_page';
    }

    private function prepareTemplatesChoices(): array
    {
        $choices = [];

        foreach ($this->templates as $template) {
            $choices[$template['label']] = $template['code'];
        }

        return $choices;
    }
}
