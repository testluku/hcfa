<?php

/*include('consultas/Consultas.Class.php');
include_once('../classes/check.class.php');
include_once('../functions/dbconn.php');
include_once('../ips/Ips.class.php');
include_once('../functions/caracteres.php');*/

$idAutoSave = $_POST["idAutoSave"];
$table = $_POST["tbl"];
$colum = $_POST["col"];
$data = utf8_decode($_POST["info"]);
$data = codeCharacter($data);
$idTable = $_POST["idTable"];
$type = $_POST["type"];
$nameColum;

switch ($colum) {
    case "secuelasPrevias": 
        $nameColum = "secuelasPrevias";
        break;
    case "mejorarContornoCorporal": 
        $nameColum = "mejorarContornoCorporal";
        break;
    case "mejorarFlacidezAbdomen": 
        $nameColum = "mejorarFlacidezAbdomen";
        break;
    case "aumentarProyeccionGluteos": 
        $nameColum = "aumentarProyeccionGluteos";
        break;
    case "mejorarCicatrizLipectomia": 
        $nameColum = "mejorarCicatrizLipectomia";
        break;
    case "deseaTenerHijos": 
        $nameColum = "deseaTenerHijos";
        break;
    case "mejorarAspectoOrejas": 
        $nameColum = "mejorarAspectoOrejas";
        break;
    case "areasMayorInteres": 
        $nameColum = "areasMayorInteres";
        break;
    case "mejorarPigmentacionCara": 
        $nameColum = "mejorarPigmentacionCara";
        break;
    case "disminuirSurcosNasogenianos": 
        $nameColum = "disminuirSurcosNasogenianos";
        break;
    case "disminuirSurcosMarioneta": 
        $nameColum = "disminuirSurcosMarioneta";
        break;
    case "disminuisLineasExpresion": 
        $nameColum = "disminuisLineasExpresion";
        break;
    case "patasGallina": 
        $nameColum = "patasGallina";
        break;
    case "frente": 
        $nameColum = "frente";
        break;
    case "ceno": 
        $nameColum = "ceno";
        break;
    case "secuelasAcne": 
        $nameColum = "secuelasAcne";
        break;
    case "mejorarPielCara": 
        $nameColum = "mejorarPielCara";
        break;
    case "mejorarFlacidezCuello": 
        $nameColum = "mejorarFlacidezCuello";
        break;
    case "depilacionLaser": 
        $nameColum = "depilacionLaser";
        break;
    case "mejorarRitidesLabioS": 
        $nameColum = "mejorarRitidesLabioS";
        break;
    case "mejorarPigmentacionSurcosN": 
        $nameColum = "mejorarPigmentacionSurcosN";
        break;
    case "mejorarArrugasParpadoI": 
        $nameColum = "mejorarArrugasParpadoI";
        break;
    case "mejorarEntrecejo": 
        $nameColum = "mejorarEntrecejo";
        break;
    case "mejorarCodigoBarras": 
        $nameColum = "mejorarCodigoBarras";
        break;
    case "corregirManchasCara": 
        $nameColum = "corregirManchasCara";
        break;
    case "mejorarCelulitis": 
        $nameColum = "mejorarCelulitis";
        break;
    case "disminuirEstriasAbdomen": 
        $nameColum = "disminuirEstriasAbdomen";
        break;
    case "revisionPorSistemas": 
        $nameColum = "revisionPorSistemas";
        break;
    case "aumentarSenos": 
        $nameColum = "aumentarSenos";
        break;
    case "disminuirSenos": 
        $nameColum = "disminuirSenos";
        break;
    case "levantamientoSenos": 
        $nameColum = "levantamientoSenos";
        break;
    case "cambiarImplantesSenos": 
        $nameColum = "cambiarImplantesSenos";
        break;
    case "mejorarCicatricesMamoplastia": 
        $nameColum = "mejorarCicatricesMamoplastia";
        break;
    case "tallaAproximadaDesea": 
        $nameColum = "tallaAproximadaDesea";
        break;
    case "enfermedadActual": 
        $nameColum = "enfermedadActual";
        break;
    case "reseccionNevusCara": 
        $nameColum = "reseccionNevusCara";
        break;
    case "reseccionNevusCuerpo": 
        $nameColum = "reseccionNevusCuerpo";
        break;
    case "corregirLobulosHendidos": 
        $nameColum = "corregirLobulosHendidos";
        break;
    case "mejorarCalidadCicatriz": 
        $nameColum = "mejorarCalidadCicatriz";
        break;
    case "brochureTNQ": 
        $nameColum = "brochureTNQ";
        break;
    case "observaciones": 
        $nameColum = "observaciones";
        break;
    case "otros": 
        $nameColum = "otros";
        break;
    case "mejorarCicatrizAbdomen": 
        $nameColum = "mejorarCicatrizAbdomen";
        break;
    case "mejorarCicatrizCara": 
        $nameColum = "mejorarCicatrizCara";
        break;
    case "reseccionNevusComentario": 
        $nameColum = "reseccionNevusComentario";
        break;
    case "imagenesAportadas": 
        $nameColum = "imagenesAportadas";
        break;
    case "excesoPielParpadoSuperior": 
        $nameColum = "excesoPielParpadoSuperior";
        break;
    case "bolsasParpadoInferior": 
        $nameColum = "bolsasParpadoInferior";
        break;
    case "flacidezParpadoInferior": 
        $nameColum = "flacidezParpadoInferior";
        break;
    case "mejorarLineasExpresion": 
        $nameColum = "mejorarLineasExpresion";
        break;
    case "elevarCejas": 
        $nameColum = "elevarCejas";
        break;
    case "aumentarProyeccionMenton": 
        $nameColum = "aumentarProyeccionMenton";
        break;
    case "mejorarEsteticaNariz": 
        $nameColum = "mejorarEsteticaNariz";
        break;
    case "mejorarSecuelasRino": 
        $nameColum = "mejorarSecuelasRino";
        break;
    case "mejorarCuadroObstructivo": 
        $nameColum = "mejorarCuadroObstructivo";
        break;
    case "respiraBien": 
        $nameColum = "respiraBien";
        break;
    case "respiraMal": 
        $nameColum = "respiraMal";
        break;
    case "FND": 
        $nameColum = "FND";
        break;
    case "FNI": 
        $nameColum = "FNI";
        break;
    case "ambas": 
        $nameColum = "ambas";
        break;
    case "abdomenColgante": 
        $nameColum = "abdomenColgante";
        break;
    case "flacidezAbdominal": 
        $nameColum = "flacidezAbdominal";
        break;
    case "striaeDistensae": 
        $nameColum = "striaeDistensae";
        break;
    case "diastasisRectos": 
        $nameColum = "diastasisRectos";
        break;
    case "gigantomastia": 
        $nameColum = "gigantomastia";
        break;
    case "ptosis": 
        $nameColum = "ptosis";
        break;
    case "asimetriaFormaTamano": 
        $nameColum = "asimetriaFormaTamano";
        break;
    case "acumulacionGrasa": 
        $nameColum = "acumulacionGrasa";
        break;
    case "celulitis": 
        $nameColum = "celulitis";
        break;
    case "flacidezEnfrenteA": 
        $nameColum = "flacidezEnfrenteA";
        break;
    case "blefachalasisPS": 
        $nameColum = "blefachalasisPS";
        break;
    case "cojinesAdipososPS": 
        $nameColum = "cojinesAdipososPS";
        break;
    case "blefachalasisPI": 
        $nameColum = "blefachalasisPI";
        break;
    case "cojinesAdipososPI": 
        $nameColum = "cojinesAdipososPI";
        break;
    case "asimetria": 
        $nameColum = "asimetria";
        break;
    case "ojerasHiperpigmentadas": 
        $nameColum = "ojerasHiperpigmentadas";
        break;
    case "surcoNasoyugalPronunciado": 
        $nameColum = "surcoNasoyugalPronunciado";
        break;
    case "flacidezTarsal": 
        $nameColum = "flacidezTarsal";
        break;
    case "secuelasAcneMotivoC": 
        $nameColum = "secuelasAcneMotivoC";
        break;
    case "gibaOsteocartilaginosa": 
        $nameColum = "gibaOsteocartilaginosa";
        break;
    case "laterorinia": 
        $nameColum = "laterorinia";
        break;
    case "malaDefinicionPunta": 
        $nameColum = "malaDefinicionPunta";
        break;
    case "malaProyeccionPunta": 
        $nameColum = "malaProyeccionPunta";
        break;
    case "ptosisPunta": 
        $nameColum = "ptosisPunta";
        break;
    case "asimetriaPunta": 
        $nameColum = "asimetriaPunta";
        break;
    case "pielGruesa": 
        $nameColum = "pielGruesa";
        break;
    case "alasGruesas": 
        $nameColum = "alasGruesas";
        break;
    case "fosasAmplias": 
        $nameColum = "fosasAmplias";
        break;
    case "asimetriaFosasNasales": 
        $nameColum = "asimetriaFosasNasales";
        break;
    case "deflexionSeptal": 
        $nameColum = "deflexionSeptal";
        break;
    case "hipertrofiaCornetes": 
        $nameColum = "hipertrofiaCornetes";
        break;
    case "hipoplasiaMenton": 
        $nameColum = "hipoplasiaMenton";
        break;
    case "lineaExpresionPronunciadas": 
        $nameColum = "lineaExpresionPronunciadas";
        break;
    case "fotodano": 
        $nameColum = "fotodano";
        break;
    case "protesisColaCeja": 
        $nameColum = "protesisColaCeja";
        break;
    case "cojinMalar": 
        $nameColum = "cojinMalar";
        break;
    case "flacidezCara": 
        $nameColum = "flacidezCara";
        break;
    case "flacidezCuello": 
        $nameColum = "flacidezCuello";
        break;
    case "jowlsPronunciados": 
        $nameColum = "jowlsPronunciados";
        break;
    case "surcosNasogenianos": 
        $nameColum = "surcosNasogenianos";
        break;
    case "surcosMarioneta": 
        $nameColum = "surcosMarioneta";
        break;
    case "codigoBarrasLabios": 
        $nameColum = "codigoBarrasLabios";
        break;
    case "hiperpigmentacionCara": 
        $nameColum = "hiperpigmentacionCara";
        break;
    case "secuelasAcneExamenF": 
        $nameColum = "secuelasAcneExamenF";
        break;
    case "codigoBarras": 
        $nameColum = "codigoBarras";
        break;
    case "flacidezEnfrenteR": 
        $nameColum = "flacidezEnfrenteR";
        break;
    case "tipoPiel": 
        $nameColum = "tipoPiel";
        break;
    case "surcos": 
        $nameColum = "surcos";
        break;
    case "fotodanoCalidadPiel": 
        $nameColum = "fotodanoCalidadPiel";
        break;
    case "ritides": 
        $nameColum = "ritides";
        break;
    case "manchas": 
        $nameColum = "manchas";
        break;
    case "telangiectasias": 
        $nameColum = "telangiectasias";
        break;
    case "telangiectasiasDesc": 
        $nameColum = "telangiectasiasDesc";
        break;
    case "cicatrices": 
        $nameColum = "cicatrices";
        break;
    case "cicatrizHipertrofica": 
        $nameColum = "cicatrizHipertrofica";
        break;
    case "cicatrizQueloide": 
        $nameColum = "cicatrizQueloide";
        break;
    case "areaCicatriz": 
        $nameColum = "areaCicatriz";
        break;
    case "otrasCicatrices": 
        $nameColum = "otrasCicatrices";
        break;
    case "masas": 
        $nameColum = "masas";
        break;
    case "malaDefinicionAntihelix": 
        $nameColum = "malaDefinicionAntihelix";
        break;
    case "hipertrofiaConcha": 
        $nameColum = "hipertrofiaConcha";
        break;
    case "asimetriaOrejas": 
        $nameColum = "asimetriaOrejas";
        break;
    case "deformidades": 
        $nameColum = "deformidades";
        break;
    case "tratamientoSeRealizara": 
        $nameColum = "tratamientoSeRealizara";
        break;
    case "cirugiaPostparto": 
        $nameColum = "cirugiaPostparto";
        break;
    case "lipoesculturaAsistida": 
        $nameColum = "lipoesculturaAsistida";
        break;
    case "lipoinyeccion": 
        $nameColum = "lipoinyeccion";
        break;
    case "abdominoplastia": 
        $nameColum = "abdominoplastia";
        break;
    case "mamoplastiaAumento": 
        $nameColum = "mamoplastiaAumento";
        break;
    case "cambioImplantes": 
        $nameColum = "cambioImplantes";
        break;
    case "mamoplastiaReduccion": 
        $nameColum = "mamoplastiaReduccion";
        break;
    case "pexiaMamaria": 
        $nameColum = "pexiaMamaria";
        break;
    case "pexiaMamariaOpciones": 
        $nameColum = "pexiaMamariaOpciones";
        break;
    case "gluteoplastiaImplantes": 
        $nameColum = "gluteoplastiaImplantes";
        break;
    case "rinoplastia": 
        $nameColum = "rinoplastia";
        break;
    case "rinoplastiaOpc": 
        $nameColum = "rinoplastiaOpc";
        break;
    case "mentoplastia": 
        $nameColum = "mentoplastia";
        break;
    case "otoplastia": 
        $nameColum = "otoplastia";
        break;
    case "blefaroplastia": 
        $nameColum = "blefaroplastia";
        break;
    case "blefaroplastiaOpc": 
        $nameColum = "blefaroplastiaOpc";
        break;
    case "ritidoplastia": 
        $nameColum = "ritidoplastia";
        break;
    case "lipoinyeccionSurcos": 
        $nameColum = "lipoinyeccionSurcos";
        break;
    case "bichectomia": 
        $nameColum = "bichectomia";
        break;
    case "dermoabrasionLabioSuperior": 
        $nameColum = "dermoabrasionLabioSuperior";
        break;
    case "acidoHialuronico": 
        $nameColum = "acidoHialuronico";
        break;
    case "botox": 
        $nameColum = "botox";
        break;
    case "idTratamientosPropuestos": 
        $nameColum = "idTratamientosPropuestos";
        break;
    case "cicatricesExtensas": 
        $nameColum = "cicatricesExtensas";
        break;
    case "ombligoFormaDiferida": 
        $nameColum = "ombligoFormaDiferida";
        break;
    case "acumulosGrasosAbdomen": 
        $nameColum = "acumulosGrasosAbdomen";
        break;
    case "noAbdominoplastia": 
        $nameColum = "noAbdominoplastia";
        break;
    case "persistenciaAcumulosGrasos": 
        $nameColum = "persistenciaAcumulosGrasos";
        break;
    case "persistenciaAlgunasEstrias": 
        $nameColum = "persistenciaAlgunasEstrias";
        break;
    case "persistirFlacidez": 
        $nameColum = "persistirFlacidez";
        break;
    case "mejoriaParcial": 
        $nameColum = "mejoriaParcial";
        break;
    case "interpretacionAreasPaciente": 
        $nameColum = "interpretacionAreasPaciente";
        break;
    case "marcacionAbdominales": 
        $nameColum = "marcacionAbdominales";
        break;
    case "aumentoProyeccionGluteos": 
        $nameColum = "aumentoProyeccionGluteos";
        break;
    case "escurrimientoSenos": 
        $nameColum = "escurrimientoSenos";
        break;
    case "persistirAsimetrias": 
        $nameColum = "persistirAsimetrias";
        break;
    case "dispositivosAprobacionInvima": 
        $nameColum = "dispositivosAprobacionInvima";
        break;
    case "fotografiasParaDescribir": 
        $nameColum = "fotografiasParaDescribir";
        break;
    case "calidadCicatriz": 
        $nameColum = "calidadCicatriz";
        break;
    case "presenciaMalaCicatrizacion": 
        $nameColum = "presenciaMalaCicatrizacion";
        break;
    case "cambiosSensibilidadPiel": 
        $nameColum = "cambiosSensibilidadPiel";
        break;
    case "asimetriaDesviacionNariz": 
        $nameColum = "asimetriaDesviacionNariz";
        break;
    case "asimetriaFosasNasalesR": 
        $nameColum = "asimetriaFosasNasalesR";
        break;
    case "laboratoriosPrequirurgicos": 
        $nameColum = "laboratoriosPrequirurgicos";
        break;
    case "laboratoriosPrequirurgicosOpc": 
        $nameColum = "laboratoriosPrequirurgicosOpc";
        break;
    case "autorizacionTecnicaCirugia": 
        $nameColum = "autorizacionTecnicaCirugia";
        break;
    case "indicacionAsistente": 
        $nameColum = "indicacionAsistente";
        break;
    case "implantesProbables": 
        $nameColum = "implantesProbables";
        break;
}

$query = 'SELECT COUNT(*) FROM ' . $table . ' WHERE ' . $idTable . ' = ' . $idAutoSave;
$objconsulta = new Consultas($query);
$objconsulta->ConsultaSeleccion();
$resultado = json_decode($objconsulta->getRespuesta());

if ($resultado[0] == "0") {
    if ($type == "int") {
        $queryInsert = 'INSERT INTO ' . $table . '(' . $idTable . ',' . $nameColum .') VALUES(' . $idAutoSave . ',' . $data . ')';
    } else {
        $queryInsert = 'INSERT INTO ' . $table . '(' . $idTable . ',' . $nameColum . ') VALUES(' . $idAutoSave . ',"' . $data . ')';
    }
    $objconsulta = new Consultas($queryInsert);
    $objconsulta->ConsultaModificacion();
    $resultado = $objconsulta->getRespuesta();
} else {
    if ($type == "int") {
        $queryUpdate = 'UPDATE ' . $table . ' SET ' . $nameColum . ' = ' . $data . ' WHERE ' . $idTable . ' = ' . $idAutoSave . ' ';
    } else {
        $queryUpdate = 'UPDATE ' . $table . ' SET ' . $nameColum . ' = "' . $data . '" WHERE ' . $idTable . ' = ' . $idAutoSave . ' ';
    }
    
    $objconsulta = new Consultas($queryUpdate);
    $objconsulta->ConsultaModificacion();
    $resultado = $objconsulta->getRespuesta();
}
echo $resultado;


