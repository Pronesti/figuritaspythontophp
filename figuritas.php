function crear_album($n){
    $i=0;
    $album = array();
    while (i < n){
        $album[]=0;
        $i = $i + 1;
    return $album;
}

function esta_completo($unAlbum){
    $i=0;
    while (i < count($unAlbum)){
        if ($unAlbum[i] == 0){
            return False;
        }
        $i = $i + 1;
    }
    return True;
}

function comprar_figurita($n){
    return random_int(0,n);
}

function comprar_paquete_figuritas($fig_por_paquete, $n){
    $paquete=array();
    $i=0;
    while (i < fig_por_paquete){
        paquete[] = comprar_figurita($n);
        $i = $i + 1;
    }
    return paquete;
}

function esta_figurita($figurita, $unAlbum):
    if ($unAlbum[$figurita] === 1){
        return True;
    }
    return False;

function pegar_figurita($figurita, $unAlbum):
    $unAlbum[$figurita] = 1;
    return unAlbum;

function llenar_album($unAlbum):
    $total= count($unAlbum);
    $repetidas=array();
    while (!(esta_completo($unAlbum))){
        $fig = comprar_figurita($total-1);
        if (esta_figurita($fig, $unAlbum) === True){
            repetidas[]= $fig;
        }else{
            $unAlbum = pegar_figurita($fig, $unAlbum);
        }
    }
   // print("Figuritas compradas: ", (len(unAlbum)+len(repetidas)))
    return (count($unAlbum)+count($repetidas))

function llenar_varios_albumes($cantidad_albumes, $cantidad_figuritas):
    $i=0;
    $lista= array();
    while ($i < $cantidad_albumes){
        lista[]=(llenar_album(crear_album($cantidad_figuritas)));
        $i = $i + 1;
    }
    return $lista;

function llenar_album_con_paquetes($unAlbum){
    $total= count($unAlbum);
    $repetidas= array();
    while (!(esta_completo($unAlbum))){
        $paquete = comprar_paquete_figuritas(5,$total-1);
        $i=0;
        while ($i < count($paquete)){
            $fig = $paquete[$i]
            if (esta_figurita($fig, $unAlbum) === True){
                repetidas[]=($fig);
            }else{
                $unAlbum = pegar_figurita($fig, $unAlbum);
            $i = $i + 1;
            }
    }
    //print("Figuritas compradas: ", (len(unAlbum)+len(repetidas)))
    //print("Paquetes comprados: ", (len(unAlbum)+len(repetidas))/5)
    return (count($unAlbum)+count($repetidas))/5;
}

def llenar_varios_albumes_con_paquetes(cantidad_albumes, cantidad_figuritas):
    i=0
    lista=[]
    while i < cantidad_albumes:
        lista.append(llenar_album_con_paquetes(crear_album(cantidad_figuritas)))
        i+=1
    return lista
    
#resultado = llenar_album(crear_album(6))
resultado2 = llenar_varios_albumes_con_paquetes(100,669)
print(np.mean(resultado2))