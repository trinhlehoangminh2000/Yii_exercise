<?php

namespace app\models;
class ArticleListWorkflow implements \raoul2000\workflow\source\file\IWorkflowDefinitionProvider
{
    public function getDefinition()
    {
        return [
            'initialStatusId' => 'draft',
            'status' => [
                'draft' => [
                    'label' => 'Draft state',
                    'transition' => ['published', 'archived']
                ],
                'published' => [
                    'label' => 'Published state',
                    'transition' => ['archived', 'draft']
                ],
                'archived' => [
                    'label' => 'Archived state',
                    'transition' => ['draft', 'published']
                ]
            ]
        ];
    }
}