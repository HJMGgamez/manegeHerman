<?php 
//$hospital => true
require(ROOT . "model/hospitalModel.php");

function index()
{
	$PatientsInfo = generatePatients();
	
	render("hospital/index", array(
		'hospital' => true,
		'patients' => $PatientsInfo)
	);
}
function clients()
{
	$ClientsInfo = generateClients();
	
	render("hospital/clients", array(
		'hospital' => true,
		'clients' => $ClientsInfo)
	);
}
function species()
{
	$speciesInfo = generateSpecies();
	
	render("hospital/species", array(
		'hospital' => true,
		'species' => $speciesInfo)
	);
}
function patients()
{
	$PatientsInfo = generatePatients();
	
	render("hospital/patients", array(
		'hospital' => true,
		'patients' => $PatientsInfo)
	);
}
function createPatients()
{
	$ClientsInfo = generateClients();
	$speciesInfo = generateSpecies();
	$genderInfo = generateGender();

	render("hospital/create" , array(
		'patientsPage' => true,
		'species' => $speciesInfo,
		'genders' => $genderInfo,
		'clients' => $ClientsInfo
	));
}
function createNewPatients()
{
	if (createPatient()) {
		header("location:" . URL . "hospital/index");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_db");
		exit();	
	}
}
function createClients()
{
	render("hospital/create" , array(
		'clientPage' => true
	));
}
function createNewClient()
{
	if (createClient()) {
		header("location:" . URL . "hospital/clients");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_db");
		exit();	
	}
}
function createSpecies()
{
	render("hospital/create" , array(
		'speciePage' => true
	));
}
function createNewSpecies()
{
	if (createSpecie()) {
		header("location:" . URL . "hospital/species");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_db");
		exit();	
	}
}
function deleteClients($idC)
{
	if (deleteClient($idC)) {
		header("location:" . URL . "hospital/clients");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_delete");
		exit();	
	}
}
function deleteSpecies($idS)
{
	if (deleteSpecie($idS)) {
		header("location:" . URL . "hospital/species");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_delete");
		exit();	
	}
}
function editClientsPage($idC)
{
	$clients = getClient($idC);
	render("hospital/edit" , array(
		'client' => $clients,
		'clientPage' => true
	));
}
function editClients($idC)
{
	if (editClient($idC)) {
		header("location:" . URL . "hospital/clients");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_delete");
		exit();	
	}
}
function editSpeciesPage($idS)
{
	$species = getSpecie($idS);
	render("hospital/edit" , array(
		'specie' => $species,
		'speciePage' => true
	));
}
function editSpecies($idS)
{
	if (editSpecie($idS)) {
		header("location:" . URL . "hospital/species");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_delete");
		exit();	
	}
}
function editPatientsPage($idP)
{
	$patients = getPatient($idP);
	render("hospital/edit" , array(
		'patient' => $patients,
		'patientPage' => true
	));
}
function editPatients($idP)
{
	if (editPatient($idP)) {
		header("location:" . URL . "hospital/patients");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_delete");
		exit();	
	}
}