<?php

return [

    'is_admin' => 1,
    'is_client' => 1,
    'route' => '',
    'icon' => 'fa-user',
    'name' => 'Ibportal',
    'icon' => 'fa-user',
    'route' => '',
    'type' => [
        '50' => 'type',
        '100' => 'type',
        '150' => 'type',
    ],
    'agreemment'=>'<p>please agee to the agreement to be agent</p>
','allowAgentTransferToAll'=>0,

    'allowAgentTransferToHisAgentUsers'=>1,
    'allowAgentTransferToHisAgent'=>1

    ,
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
//        [
//            'route' => 'admin.ibportal.agentsCommission',
//            'title' => 'agentsCommission',
//            'icon' => 'fa fa-money',
//        ],
        [
            'route' => 'admin.ibportal.agentMoney',
            'title' => 'agentMoney',
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
            'route' => 'clients.ibportal.agentSummary',
            'title' => 'summary',
            'icon' => 'fa fa-bar-chart-o',
        ], [
            'route' => 'client.ibportal.agentUser',
            'title' => 'agent_users',
            'icon' => 'fa fa-user',
        ],[
            'route' => 'clients.ibportal.agentMoney',
            'title' => 'agentMoney',
            'icon' => 'fa fa-money',
        ],
//
//        [
//            'route' => 'client.ibportal.agentCommission',
//            'title' => 'agentCommission',
//            'icon' => 'fa fa-money',
//        ],
        [
            'route' => 'clients.ibportal.openOrders',
            'title' => 'OpenOrders',
            'icon' => 'fa-folder-open-o',
        ],
        [
            'route' => 'clients.ibportal.closedOrders',
            'title' => 'ClosedOrders',
            'icon' => 'fa-briefcase',
        ],
        [
            'route' => 'client.ibportal.planList',
            'title' => 'plans',
            'icon' => 'fa-briefcase',
        ]
    ]

];