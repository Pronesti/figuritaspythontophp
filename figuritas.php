<?php

function crear_album($n): array {
    $i=0;
    $album = array();
    while ($i < $n){
        $album[] = 0;
        $i = $i + 1;
    }
    return $album;
}

function esta_completo($unAlbum): bool {
    $i=0;
    while ($i < count($unAlbum)){
        if ($unAlbum[$i] == 0){
            return false;
        }
        $i = $i + 1;
    }
    return true;
}

function comprar_figurita($n): int {
    return random_int(0,$n);
}

function comprar_paquete_figuritas($fig_por_paquete, $n): array {
    $paquete=array();
    $i=0;
    while ($i < $fig_por_paquete)
    {
        $paquete[] = comprar_figurita($n);
        $i = $i + 1;
    }
    return $paquete;
}

function esta_figurita($figurita, $unAlbum): bool {
    $res = false;
    if ($unAlbum[$figurita] === 1)
    {
        $res = true;
    }
    return $res;
}

function pegar_figurita($figurita, $unAlbum): array {
    $unAlbum[$figurita] = 1;
    return $unAlbum;
}

function llenar_album($unAlbum) : array{
    $total= count($unAlbum);
    $repetidas=array();
    while (!(esta_completo($unAlbum))){
        $fig = comprar_figurita($total-1);
        if (esta_figurita($fig, $unAlbum) === true){
            $repetidas[]= $fig;
        }else{
            $unAlbum = pegar_figurita($fig, $unAlbum);
        }
    }
    print("Figuritas compradas: " . (count($unAlbum)+count($repetidas)) . "\n");
    return $unAlbum;
}

function llenar_varios_albumes($cantidad_albumes, $cantidad_figuritas): array{
    $i=0;
    $lista= array();
    while ($i < $cantidad_albumes){
        $lista[]=(llenar_album(crear_album($cantidad_figuritas)));
        $i = $i + 1;
    }
    return $lista;
}

function llenar_album_con_paquetes($unAlbum): array{
    $total= count($unAlbum);
    $repetidas= array();

    while (!esta_completo($unAlbum)){
        $paquete = comprar_paquete_figuritas(5,$total-1);
        $i=0;
        while ($i < count($paquete)){
            $fig = $paquete[$i];
            if (esta_figurita($fig, $unAlbum) === true){
                $repetidas[]= $fig;
            }else{
                $unAlbum = pegar_figurita($fig, $unAlbum);
            }
            $i = $i + 1;
        }
    }

    print("Figuritas compradas: " . (count($unAlbum)+count($repetidas)) . "\n");
    print("Paquetes comprados: " . (count($unAlbum)+count($repetidas))/5 . "\n");

    return  $unAlbum;
}

function llenar_varios_albumes_con_paquetes($cantidad_albumes, $cantidad_figuritas): array{
    $i=0;
    $lista= array();
    while ($i < $cantidad_albumes){
        $lista[] = llenar_album_con_paquetes(crear_album($cantidad_figuritas));
        $i= $i + 1;
    }
    return $lista;
}

$resultado = llenar_album_con_paquetes(crear_album(6));
$resultado2 = llenar_varios_albumes_con_paquetes(100,669);
print_r($resultado);
?>