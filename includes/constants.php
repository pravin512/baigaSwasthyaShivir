<?php

$patient_situation_at_PSK = [
    'PSKTAC'=>'शिविर में ही इलाज हो गया',
    'PSKTAPSC'=>'प्राथमिक स्वास्थ्य केंद्र में ही इलाज हो गया',
    'PSKSTDH'=>'जिला अस्पताल भेंजे',
    'PSKSTHC'=>'हायर सेंटर भेंजे',
    'other'=>'Other'
];

$patient_situation_at_DH = [
    'DHTADH'=>'जिला अस्पताल में ही इलाज हो गया',
    'DHSTHC'=>'हायर सेंटर भेंजे',
    'other'=>'Other'
];

$patient_situation_at_ACT = [
    'ACTTAHC'=>'हायर सेंटर में ही इलाज हो गया',
    'other'=>'Other'
];

$patientStatusForListing = [
    'PSKTAC'=>'शिविर में ही इलाज हो गया',
    'PSKTAPSC'=>'प्राथमिक स्वास्थ्य केंद्र में ही इलाज हो गया',
    'PSKSTDH'=>'जिला अस्पताल भेजा गया',
    'PSKSTHC'=>'प्राथमिक स्वास्थ्य केंद्र से हायर सेंटर भेजा गया',
    'DHTADH'=>'जिला अस्पताल में ही इलाज हो गया',
    'DHSTHC'=>'जिला अस्पताल से हायर सेंटर भेजा गया',
    'ACTTAHC'=>'हायर सेंटर में ही इलाज हो गया',
    'other'=>'Other'
    ];

$patientStatusForListingEng = [
        'PSKTAC'=>'Treated At Camp',
        'PSKTAPSC'=>'Treated At PHC',
        'PSKSTDH'=>'Sent to District Hospital from PHC',
        'PSKSTHC'=>'Sent to Higher center from PHC',
        'DHTADH'=>'Treated At District Hospital',
        'DHSTHC'=>'Sent to Higher Center from District Hospital',
        'ACTTAHC'=>'Treated At Higher Center',
        'other'=>'Other'
        ];

$patientStatus = ['PHC'=>$patient_situation_at_PSK, 'DH'=>$patient_situation_at_DH, 'ACT'=>$patientStatusForListing];

$tahsils = [
    'kawardha'=>'कवर्धा', 
    'bodla'=>'बोडला',
    'pandariya'=>'पंडरिया',
    'saLohara'=>'स.लोहारा',
    'rengakhar'=>'रेंगाखार',
    'kunda'=>'कुंडा',
    'pipariya'=>'पिपरिया'
];

$vibhags = [
    'child'=>'बाल रोग',
    'gynecology'=>'स्त्री रोग',
    'orthopedic'=>'हड्डी रोग',
    'eye'=>'नेत्र रोग',
    'medicine'=>'मेडिसिन',
    'neurology'=>'न्यूरोलॉजी',
    'ENT'=>'ENT',
    'generalSurgery'=>'General Surgery',
    'other'=>'अन्य'
];

$CommonStatus = [0=>'Disabled', 1=>'Active'];

?>