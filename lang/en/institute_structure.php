<?php

return [
    'title' => 'INSTITUTE STRUCTURE',
    'eyebrow' => 'Institute',
    'subtitle' => 'The Institute\'s organizational structure — centers, offices and units.',

    'director' => 'Head of the Institute',

    'branches' => [
        'trends' => [
            'name' => 'Center for the Study of Crime Trends',
            'role' => 'Deputy Head of the Institute — Head of Center',
            'units' => [
                'cis_asia' => 'Sector for the Study of Crime in CIS and Asian Countries',
                'economy' => 'Office for the Study of Economic Crimes',
                'it_crime' => 'Office for the Study of Crime Committed Using Information Technologies',
                'public_order' => 'Office for the Study of Crimes Against Public Safety and Public Order',
                'person' => 'Office for the Study of Crimes Against the Person',
            ],
        ],
        'factors' => [
            'name' => 'Center for the Study of Crime Factors',
            'role' => 'Deputy Head of the Institute — Head of Center',
            'units' => [
                'europe' => 'Sector for the Study of Crime in Europe and Other Foreign Countries',
                'social_tension' => 'Office for the Study of Social Tension Situations and Media Relations',
                'sectoral' => 'Office for the Study of Sectoral Service Issues',
                'special_persons' => 'Office for the Study of Crime Among Special Categories of Persons',
                'info_analysis' => 'Office for Information-Analytical Work and Research Project Coordination',
                'ratings' => 'Office for the Study of International Rankings',
                'legislation' => 'Office for the Study of Legislative Documents',
                'sociological' => 'Office for Conducting Sociological Research',
            ],
        ],
        'mahalla' => [
            'name' => 'Center for the Scientific Study of Mahalla-Level Crime',
            'role' => 'Head of Center',
            'units' => [
                'admin_territories' => 'Sector for the Study of Crime in Administrative Territories and Mahallas',
                'editorial' => 'Editorial and Publishing Center',
                'laboratory' => 'Scientific-Production Laboratory',
                'info_resource' => 'Information Resource Center',
                'chancery' => 'Chancery',
            ],
        ],
        'secretary' => [
            'name' => 'Scientific Secretary',
            'role' => '',
            'units' => [],
        ],
        'management' => [
            'name' => 'Management and Support Units',
            'role' => '',
            'units' => [
                'organizational' => 'Organizational Department',
                'legal' => 'Legal Support Group',
                'international' => 'International Cooperation Group',
                'finance' => 'Finance and Logistics Department',
                'personnel' => 'Personnel Group',
                'digital' => 'Group for the Introduction of Digital and Information Technologies into Scientific Activity',
            ],
        ],
    ],
];
