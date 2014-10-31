<?php

/*
 * Backend module
 */
array_insert($GLOBALS['BE_MOD'], 1, array
(
    'workflow' => array(
        'workflow' => array(
            'icon'   => 'system/modules/workflow/assets/img/workflow.png',
            'tables' => array(
                'tl_workflow',
                'tl_workflow_step',
                'tl_workflow_transition',
                'tl_workflow_action',
                'tl_workflow_role',
            ),
        )
    )
));


/*
 * Workflow types
 */
$GLOBALS['WORKFLOW_TYPES']['default'] = '';

/*
 * Event Subscribers
 */
$GLOBALS['TL_EVENT_SUBSCRIBERS'][] = 'Netzmacht\Contao\Workflow\Contao\BackendSubscriber';
$GLOBALS['TL_EVENT_SUBSCRIBERS'][] = 'Netzmacht\Contao\Workflow\Factory\WorkflowBuilder';
$GLOBALS['TL_EVENT_SUBSCRIBERS'][] = 'Netzmacht\Contao\Workflow\Factory\EntityFactory';
$GLOBALS['TL_EVENT_SUBSCRIBERS'][] = 'Netzmacht\Contao\Workflow\Entity\EntityManager';

$GLOBALS['TL_EVENT_SUBSCRIBERS'][] = function() {
    return new Netzmacht\Contao\Workflow\Transaction\DatabaseTransactionHandler(\Database::getInstance());
};

/*
 * Models
 */
$GLOBALS['TL_MODELS']['tl_workflow']            = 'Netzmacht\Contao\Workflow\Contao\Model\WorkflowModel';
$GLOBALS['TL_MODELS']['tl_workflow_action']     = 'Netzmacht\Contao\Workflow\Contao\Model\ActionModel';
$GLOBALS['TL_MODELS']['tl_workflow_role']       = 'Netzmacht\Contao\Workflow\Contao\Model\RoleModel';
$GLOBALS['TL_MODELS']['tl_workflow_step']       = 'Netzmacht\Contao\Workflow\Contao\Model\StepModel';
$GLOBALS['TL_MODELS']['tl_workflow_state']      = 'Netzmacht\Contao\Workflow\Contao\Model\StateModel';
$GLOBALS['TL_MODELS']['tl_workflow_transition'] = 'Netzmacht\Contao\Workflow\Contao\Model\TransitionModel';
