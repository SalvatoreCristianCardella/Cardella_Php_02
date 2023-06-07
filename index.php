<?php

/*Extra 1: Implementare un metodo che faccia reinserire la password qualora le regole non fossero rispettate e 
    che interrompa il programma in caso di password accettata.
-Extra 2:visualizzare eventualmente quale campo non e’ stato inserito
-Extra 3: provare a rifattorizzare il codice tramite l'uso delle funzioni*/
//verifica lunghezza caratteri (minimo 8)
function lengthChar($password){
    $check1=false;
    if (strlen($password)>=8) {
        $check1=true;
    }else {
        echo'La password deve lunga almeno di 8 caratteri, riprova' . "\n";
    }
    return $check1;
}
//verifica almeno un numero nella password
function verifyNumber($password){
    $check2 = false;
    for ($i=0; $i < strlen($password); $i++) { 
        if (is_numeric($password[$i])) {
            $check2=true;
        }
        else if ($i==strlen($password)-1 && $check2==false) {
            echo 'la password non contiene numeri, riprova' . "\n";
        }  
    }
    return $check2;
}
//verifica che la password contenga almeno una lettera maiuscola
function verifyUpper($password){
    $check3 = false;
    for ($i=0; $i < strlen($password); $i++) { 
        if (ctype_upper($password[$i])) {
            $check3=true;
        }
        else if ($i==strlen($password)-1 && $check3==false) {
            echo 'la password non contiene lettere maiuscole, riprova' . "\n";
        }  
    }
    return $check3;
}

//verifica che la password contenga almeno un carattere speciale
function verifySpecial($password){
    $check4=false;
    $char = ['!',' # ',' $ ',' % ', '&' , '*' , '+' , '-' , '.' , '/'];
    for ($i=0; $i < strlen($password); $i++) { 
        if (in_array($password[$i],$char)) {
            $check4=true;
        }
        else if ($i==strlen($password)-1 && $check4==false) {
            echo 'la password non contiene caratteri speciali, riprova' . "\n";
        }
    }
    return $check4;
}
//do while per reinserire la password
do {
    $password = readline('inserire password: ');
    $check1 = lengthChar($password);
    $check2 = verifyNumber($password);
    $check3 = verifyUpper($password);
    $check4 = verifySpecial($password);
    if ($check1 == true && $check2 == true && $check3 == true && $check4== true) {
        echo "password corretta";
        $i=0;
    }
    else {
        echo "password scorretta \n";
        $i=1;
    }
} while ($i>0);

?>