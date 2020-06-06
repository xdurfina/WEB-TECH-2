<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if (isset($_GET['modelData']) && $_GET['modelData'] === 'kyvadlo') {
    if(isset($_GET['r']) && isset($_GET['pos'])){
        $pos = $_GET['pos'];
        $hodnota = $_GET['r'];
        $cmd = "octave -H octave-modely/kyvadlo.m $hodnota $pos 2>&1";
        exec($cmd, $output);
        $finalout = array();

        foreach ($output as $value) {
            $localstring = substr($value, 2);
            array_push($finalout, $localstring);
        }

        unset($finalout[0]);
        unset($finalout[1]);

        $cas = array_slice($finalout, 0, 201);
        $kyvadlo = array_slice($finalout, -402, 201);
        $uholKyvadla = array_slice($finalout, 402);
        $res=[];
        $res['cas'] = $cas;
        $res['kyvadlo'] = $kyvadlo;
        $res['uholKyvadla'] = $uholKyvadla;
        echo json_encode($res);
    }
}
elseif (isset($_GET['modelData']) && $_GET['modelData'] === 'lietadlo') {
    if(isset($_GET['r']) && isset($_GET['pos'])) {
        $pos = $_GET['pos'];
        $hodnota = $_GET['r'];
        $cmd = "octave -H octave-modely/lietadlo.m $hodnota $pos 2>&1";
        exec($cmd, $output);
        $finalout = array();

        foreach ($output as $value) {
            $localstring = substr($value, 2);
            array_push($finalout, $localstring);
        }

        unset($finalout[0]);
        unset($finalout[1]);

        $cas = array_slice($finalout, 0, 401);
        $vozidlo = array_slice($finalout, -802, 401);
        $tlmic = array_slice($finalout, 802);
        $res['cas'] = $cas;
        $res['vozidlo'] = $vozidlo;
        $res['tlmic'] = $tlmic;
        echo json_encode($res);
    }
}
elseif (isset($_GET['modelData']) && $_GET['modelData'] === 'tlmic') {
    if(isset($_GET['r']) && isset($_GET['pos'])) {
        $pos = $_GET['pos'];
        $hodnota = $_GET['r'];
        $cmd = "octave -H octave-modely/tlmic.m $hodnota $pos 2>&1";
        exec($cmd, $output);
        $finalout = array();

        foreach ($output as $value) {
            $localstring = substr($value, 2);
            array_push($finalout, $localstring);
        }

        unset($finalout[0]);
        unset($finalout[1]);

        $cas = array_slice($finalout, 0, 501);
        $vozidlo = array_slice($finalout, -1002, 501);
        $tlmic = array_slice($finalout, 1002);
        $res=[];
        $res['cas'] = $cas;
        $res['vozidlo'] = $vozidlo;
        $res['tlmic'] = $tlmic;
        echo json_encode($res);
    }
}
elseif (isset($_GET['modelData']) && $_GET['modelData'] === 'gulicka') {
    if(isset($_GET['r']) && isset($_GET['pos'])) {
        $pos = $_GET['pos'];
        $hodnota = $_GET['r'];
        $cmd = "octave -H octave-modely/gulicka.m $hodnota $pos 2>&1";
        exec($cmd, $output);
        $finalout = array();

        foreach ($output as $value) {
            $localstring = substr($value, 2);
            array_push($finalout, $localstring);
        }

        unset($finalout[0]);
        unset($finalout[1]);
        unset($finalout[2]);
        unset($finalout[3]);
        unset($finalout[4]);
        unset($finalout[5]);

        $cas = array_slice($finalout, 0, 501);
        $poziciaGulicky = array_slice($finalout, -1002, 501);
        $naklonTyce = array_slice($finalout, 1002);

        $res['cas'] = $cas;
        $res['poziciaGulicky'] = $poziciaGulicky;
        $res['naklonTyce'] = $naklonTyce;
        echo json_encode($res);
    }
}