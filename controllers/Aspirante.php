<?php

Class Aspirante extends Controller{
	public function __construct(){
		parent::__construct();
	}

	public function perfil(){
		//$this->
		$this->view->render($this, 'perfil');
	}

	public function configSection($view){
		$section = $view;

		switch ($section) {
			case 'informacion-personal':
				$countries = $this->model->getAllCountries();
				$provinces = $this->model->getAllProvinces();
				$candidate = $this->model->getDataCandidate(1)[0];
				$this->view->data = ['countries' => $countries, 'provinces' => $provinces, 'candidate' => $candidate];
			break;

			case 'emergency-contact':
				$StatuStageId = $this->model->queryStatuStageId(Session::getValue('email'));
				$user =  $this->model->checkUE($StatuStageId[2], 1); //Set 1 for query all fields
				$this->view->data = ['status-stage' => $StatuStageId, 'user' => $user];
			break;

		}

		$this->view->render($this, $section);

	}

	public function controller(){

		switch ($_POST['ID']) {

			case 'informacion-personal':
				$data = $this->processData('informacion-personal');
				$this->model->updatePersonalInformation($data, 1);



//discapacidad
$data = [
	"ADI_FK_ASID" => 1,
	"ADI_FK_TIDI" => $_POST["DETIDI"],
	"ADI_CONA"    => $_POST["DECONA"],
	"ADI_PORC"    => $_POST["DEPORC"],
	"ADI_FK_TIFA"    => $_POST["DESUST"]
];

		

        	break;

        	default:
        	break;

		}
	}

	public function processData($id){
		switch ($id) {
			case 'informacion-personal':

			$data = [
				"ASP_CEDU" => $_POST["IPCEDU"], 
				"ASP_NOM1" => $_POST["IPNOM1"], 
				"ASP_NOM2" => $_POST["IPNOM2"], 
				"ASP_APE1" => $_POST["IPAPE1"], 
				"ASP_APE2" => $_POST["IPAPE2"], 
				"ASP_DISC" => $_POST["IPDISC"], 
				"ASP_ETNI" => $_POST["IPETNI"], 
				"ASP_ESCI" => $_POST["IPESCI"], 
				"ASP_FENA" => $_POST["IPFENA"], 
				"ASP_GENE" => $_POST["IPGENE"], 
				"ASP_EMAP" => $_POST["IPEMAP"],
				"ASP_EMAI" => $_POST["IPEMAI"],
				"ASP_ESTA" => $_POST["IPESTA"], 
				"ASP_PESO" => $_POST["IPPESO"], 
				"ASP_TEL1" => $_POST["IPTEL1"], 
				"ASP_TEL2" => $_POST["IPTEL2"], 
				"ASP_TILI" => $_POST["IPTILI"], 
				"ASP_TISA" => $_POST["IPTISA"],

				"ASP_CAPR" => $_POST["DDCAPR"],
				"ASP_CASE" => $_POST["DDSECT"],
				"ASP_NCAS"    => $_POST["DDNCAS"],
				"ASP_SECT"    => $_POST["DDSECT"],
				"ASP_REFE"    => $_POST["DDREFE"],

				"ASP_FK_LOCD"    => $_POST["DDPARR"],
				"ASP_FK_LOCN"    => $_POST["IPLOCN"],

				"ASP_FK_ENCA" => $_POST["DEENFE"]
			];
				
			break;
			
			default:
				
			break;
		}
	return $data;
	}







}

?>

