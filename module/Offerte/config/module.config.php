<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'offerteController' => 'Offerte\Controller\OfferteController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'zfcadmin' => array(
                'child_routes' => array(
                    'offerte' => array(
                        'type' => 'Literal',
                        'priority' => 1000,
                        'options' => array(
                            'route' => '/offerte',
                            'defaults' => array(
                                'controller' => 'offerteController',
                                'action'     => 'index',
                            ),
                        ),
                        'child_routes' =>array(
                            'list' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/list[/:p]',
                                    'defaults' => array(
                                        'controller' => 'offerteController',
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
                                        'controller' => 'offerteController',
                                        'action'     => 'create',
                                        'id'         => 0,
                                    ),
                                ),
                            ),
                            'remove' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/remove/:id',
                                    'defaults' => array(
                                        'controller' => 'offerteController',
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
            'Offerte' => __DIR__ . '/../view',
        ),
    ),
);
