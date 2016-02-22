<?php

return [

    'is_admin' => 1,
    'is_client' => 1,
    'route' => 'admin.ibportal.planList',
    'icon' => 'fa-briefcase',
    'name' => 'Ibportal',
    'icon' => 'fa-user',
    'route' => '',
    'type' => [
        '50' => 'type',
        '100' => 'type',
        '150' => 'type',
    ],
    'agreemment'=>'Test',
    'admin_menu' => [

        [
            'route' => 'admin.ibportal.plansList',
            'title' => 'plans',
            'icon' => 'fa-briefcase',
        ],
        [
            'route' => 'admin.ibportal.aliasesList',
            'title' => 'aliases',
            'icon' => 'fa-random',
        ],

        [
            'route' => 'admin.ibportal.agentList',
            'title' => 'agent',
            'icon' => 'fa fa-user',
        ],
        [
            'route' => 'admin.ibportal.agentsCommission',
            'title' => 'agentsCommission',
            'icon' => 'fa fa-money',
        ],
        [
            'route' => 'admin.ibportal.ibportalSettings',
            'title' => 'settings',
            'icon' => 'fa fa-gears',
        ]


    ],
    'client_menu' => [
        [
            'route' => 'client.ibportal.planList',
            'title' => 'plans',
            'icon' => 'fa-briefcase',
        ], [
            'route' => 'client.ibportal.agentUser',
            'title' => 'agent',
            'icon' => 'fa fa-user',
        ],

        [
            'route' => 'client.ibportal.agentCommission',
            'title' => 'agentCommission',
            'icon' => 'fa fa-money',
        ]
    ]

];