<?php
return [
    'template' => [
        'HeaderFile'   => APP_Template . 'HeaderFile.php',
        'CompleteHeader'   => APP_Template . 'CompleteHeader.php',
        ':ContentFile' => ':content_view',
        'FooterFile'   => APP_Template . 'FooterFile.php'
    ],
    'tem_head_resource' => [
        'css' => [
        'maincss' => CSS . 'maincss.css']
        
    ],
    'tem_foot_resource' => [
        
            'mainjs' => JS . 'mainjs.js'
            
    ]
];