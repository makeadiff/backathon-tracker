<?php
require('../common.php');

$city_id = i($QUERY,'city_id', 0);
$city_name = $sql->getOne("SELECT name FROM City WHERE id=$city_id");

$crud = new Crud('Backathon_Registration');

$crud->title = "Backathon Registrations in $city_name";
$crud->setListingQuery("SELECT id,name,email,phone FROM Backathon_Registration WHERE city_id=$city_id");
$crud->setListingFields('name','email','phone');
$crud->allow['bulk_operations'] = false;
$crud->allow['add'] = false;
$crud->allow['delete'] = false;
$crud->allow['edit'] = false;
$crud->allow['sorting'] = false;
$crud->render();
