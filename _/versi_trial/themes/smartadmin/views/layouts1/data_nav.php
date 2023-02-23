<?php 
$NAV_TAMU = array(
    "dashboard" => array(
        "title" => "Dashboard",
        "url" => "dashboardv2",
        "icon" => "fa-home"
    ),
    "kemiskinan" => array(
        "title" => "Data Kemiskinan",
        "icon" => "fa fa-building",
        "sub" => array(
            "penduduk_miskin" => array(
                "title" => "Penduduk Miskin",
                "url" => "kemiskinan/penduduk_miskin",      
            ),
            "prasarana_dasar" => array(
                "title" => "Prasarana Dasar",
                "url" => "kemiskinan/prasarana_dasar",      
            )
        ),

    ),

    "fitur_kemiskinan" => array(
        "title" => "Fitur Kemiskinan",
        "icon" => "fa fa-file",
        "sub" => array(
            "export_data" => array(
                "title" => "Export Data",
                "url" => "fitur/export_data",      
            ),
            /*"penanggulangan_kemiskinan" => array(
                "title" => "Penanggulangan Kemiskinan",
                "url" => "fitur/penanggulangan_kemiskinan",      
            ),*/
            "penerimaan_bantuan" => array(
                "title" => "Penerimaan Bantuan",
                "url" => "fitur/penerimaan_bantuan",      
            )
        ),

    ),
    
);

if (Yii::app()->user->isGuest) {
    $page_nav = $NAV_TAMU;
} else {
    $page_nav = $this->menu;
}
