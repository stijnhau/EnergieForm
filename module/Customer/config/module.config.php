<?php
return array(
    'router' => array(
        'routes' => array(
            'zfcadmin' => array(
                'child_routes' => array(
                    'customer' => array(
                        'type' => 'Literal',
                        'priority' => 1000,
                        'options' => array(
                            'route' => '/customer',
                            'defaults' => array(
                                'controller' => 'Customer\Controller\CustomerController',
                                'action'     => 'index',
                            ),
                        ),
                        'child_routes' =>array(
                            'list' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/list[/:p]',
                                    'defaults' => array(
                                        'controller' => 'Customer\Controller\CustomerController',
                                        'action'     => 'list',
                                    ),
                                ),
                            ),
                            'create' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/create[/:id]',
                                    'constraints' => array(
                                        'id'         => '[0-9]*',
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Customer\Controller\CustomerController',
                                        'action'     => 'create',
                                        'id'         => 0,
                                    ),
                                ),
                            ),
                            'customerMeter' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/customerMeter[/:id]',
                                    'constraints' => array(
                                        'id'         => '[0-9]*',
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Customer\Controller\CustomerController',
                                        'action'     => 'customerMeter',
                                        'id'         => 0,
                                    ),
                                ),
                            ),
                            'remove' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/remove/:id',
                                    'defaults' => array(
                                        'controller' => 'Customer\Controller\CustomerController',
                                        'action'     => 'remove',
                                        'id'     => 0
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Customer' => __DIR__ . '/../view',
        ),
    ),
);
