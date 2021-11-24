<?php

use techticsja\Database\Connection;
use techticsja\Data\UsersData;
use techticsja\Data\RolesData;
use techticsja\Data\AppointmentsData;
use techticsja\Data\InvoicesData;
use techticsja\Data\GendersData;
use techticsja\Data\PositionsData;
use techticsja\Data\VisitsData;
use techticsja\Data\PaymentsData;
use Slim\Container;

include 'vendor/autoload.php';

$container = new Container();
$app = new \Slim\App($container);


$container = $app->getContainer();

$container['Roles'] = function ($container){
    $conn = new Connection;
    $rolesdata = new RolesData($conn);
    return $rolesdata;
};

$container['Users'] = function ($container){
    $conn = new Connection;
    $usersdata = new UsersData($conn);
    return $usersdata;
};

$container['Appointments'] = function ($container){
    $conn = new Connection;
    $appointmentsdata = new AppointmentsData($conn);
    return $appointmentsdata;
};

$container['Invoices'] = function ($container){
    $conn = new Connection;
    $invoicesdata = new InvoicesData($conn);
    return $invoicesdata;
};

$container['Visits'] = function ($container){
    $conn = new Connection;
    $visitsdata = new VisitsData($conn);
    return $visitsdata;
};


$container['Genders'] = function ($container){
    $conn = new Connection;
    $gendersdata = new GendersData($conn);
    return $gendersdata;
};

$container['Positions'] = function ($container){
    $conn = new Connection;
    $positionsdata = new PositionsData($conn);
    return $positionsdata;
};

$container['Payments'] = function ($container){
    $conn = new Connection;
    $paymentsdata = new PaymentsData($conn);
    return $paymentsdata;
};



$app->get('/', function($request,$response, $argis){
    return $response->withStatus(200)->write('Successfull Connected');

});


//Function for Get ALL roles data from the database
$app->get('/Roles', function ($request, $response, $args) {
    $rolesdata = $this->Roles;
    $roles = $rolesdata->getAllRoles();
    if($roles){
        $response = $response->withJson(
            $roles
        );
        return $response;
    }
});

//Function for Get ALL Users data from the database
$app->get('/Users', function ($request, $response, $args) {
    $userdata = $this->Users;
    $users = $userdata->getAllUsers();
    if($users){
        $response = $response->withJson(
            $users
        );
        return $response;
    }
});


$app->get('/appointments', function ($request, $response, $args) {
    $appointmentsdata = $this->Appointments;
    $appointments = $appointmentsdata->getAllAppointments();
    if($appointments){
        $response = $response->withJson(
            $appointments
        );
        return $response;
    }
});

$app->get('/bills', function ($request, $response, $args) { 
    $billsdata = $this->Bills;  
    $bills = $billsdata->getAllBills();
    if($bills){
        $response = $response->withJson(
            $bills
        );
        return $response;
    }
});

$app->get('/genders', function ($request, $response, $args) {
    $genderdata = $this->Genders;  
    $genders = $genderdata->getAllGenders();
    if($genders){
        $response = $response->withJson(
            $genders
        );
        return $response;
    }
});


$app->get('/positions', function ($request, $response, $args) {
    $positiondata = $this->Positions;  
    $positions = $positiondata->getAllPositions();
    if($positions){
        $response = $response->withJson(
            $positions
        );
        return $response;
    }
});

$app->get('/payments', function ($request, $response, $args) {
    $paymentdata = $this->Payments;  
    $payments = $paymentdata->getAllPayments();
    if($payments){
        $response = $response->withJson(
            $payments
        );
        return $response;
    }
});

$app->get('/visits', function ($request, $response, $args) {
    $visitdata = $this->Visits;  
    $visits = $visitdata->getAllVisit();
    if($visits){
        $response = $response->withJson(
            $visits
        );
        return $response;
    }
});



//Function for Get roles data by id
$app->get('/role/{id}',function($request, $response, $args){
    $roledata = $this->roles;

    $roleID = $args['id'];

    $role = $roledata->getRoleByID($roleID);

    if($role){
        return $response->withJson(
            $role
        );
    }
});

//Function for Get users data by id
$app->get('/user/{id}',function($request, $response, $args){
    $userdata = $this->Users;

    $userID = $args['id'];

    $user = $userdata->getUserByID($userID);

    if($user){
        return $response->withJson(
            $user
        );
    }
});

$app->get('/bill/{id}',function($request, $response, $args){
    $billdata = $this->Bills;

    $billID = $args['id'];

    $bill = $billdata->getBillByID($billID);

    if($bill){
        return $response->withJson(
            $bill
        );
    }
});

$app->get('/appointment/{id}',function($request, $response, $args){
    $appointmentdata = $this->Appointments;

    $appointmentID = $args['id'];

    $appointment = $appointmentdata->getAppointmentByID($appointmentID);

    if($appointment){
        return $response->withJson(
            $appointment
        );
    }
});

$app->get('/gender/{id}',function($request, $response, $args){
    $genderdata = $this->Genders;

    $genderID = $args['id'];

    $gender = $genderdata->getGenderByID($genderID);

    if($gender){
        return $response->withJson(
            $gender
        );
    }
});

$app->get('/position/{id}',function($request, $response, $args){
    $positiondata = $this->Positions;

    $positionID = $args['id'];

    $position = $positiondata->getPositionByID($positionID);

    if($position){
        return $response->withJson(
            $position
        );
    }
});

$app->get('/visit/{id}',function($request, $response, $args){
    $visitdata = $this->Visits;

    $visitID = $args['id'];

    $visit = $visitdata->getVisitByID($visitID);

    if($visit){
        return $response->withJson(
            $visit
        );
    }
});

$app->get('/payment/{id}',function($request, $response, $args){
    $paymentdata = $this->Payments;

    $paymentID = $args['id'];

    $payment = $paymentdata->getPaymentByID($paymentID);

    if($payment){
        return $response->withJson(
            $payment
        );
    }
});



//Functions for role login
$app->post('/Rolelogin', function($request, $response, $args){ 
    $roledata = $this->Roles;
    $params = $request->getParams();
    $login = $roledata->getloginRole($params);

       if($login){
           print_r($login); exit;
        $message= array("message"=>"Successfully Validated");
        $response= $response->withJson(
            array($login,$message)
        );
        return $response;
    }else{
        $message= array("message"=>"Not Validated");
        $response= $response->withJson(
            $message);
        return $response;
    }
    
});

//Functions for user login
$app->post('/Userlogin', function($request, $response, $args){ 
    $userdata = $this->Users;
    $params = $request->getParams();
    $login = $userdata->getloginUser($params);

       if($login){
           print_r($login); exit;
        $message= array("message"=>"Successfully Validated");
        $response= $response->withJson(
            array($login,$message)
        );
        return $response;
    }else{
        $message= array("message"=>"Not Validated");
        $response= $response->withJson(
            $message);
        return $response;
    }
    
});

//Functions for adding data
$app->post('/role', function ($request, $response, $args) {
    $roledata = $this->Roles;

    $params = $request->getParams(); 
    
    $roleadd = $roledata->addNewRole($params);
    
    if($roleadd){
        return $response->withJson(
            [
            "error" => false,   
            "message" =>$params['FirstName'] . ' ' . $params['LastName'] . ' ' . "was successfully added"
            ]
        );
    }else {
        return $response->withJson(
            [
                "error"=> true,
                "message" => "Role was not added"
            ]
        );
    }
});

$app->post('/user', function ($request, $response, $args) {
    $userdata = $this->users;

    $params = $request->getParams(); 
    
    $useradd = $userdata->addNewUser($params);
    
    if($useradd){
        return $response->withJson(
            [
            "error" => false,   
            "message" =>$params['FirstName'] . ' ' . $params['LastName'] . ' ' . "was successfully added"
            ]
        );
    }else {
        return $response->withJson(
            [
                "error"=> true,
                "message" => "User was not added"
            ]
        );
    }
});

$app->post('/bill', function ($request, $response, $args) {
    $billdata = $this->Bills;

    $params = $request->getParams();
    
    $billadd = $billdata->addNewBill($params);
    
    if($billadd){
        return $response->withJson(
            [
            "error" => false,   
            "message" => "Bill was successfully added"
            ]
        );
    }else {
        return $response->withJson(
            [
                "error"=> true,
                "message" => "Bill was not added"
            ]
        );
    }
});

$app->post('/appointment', function ($request, $response, $args) {
    $appointmentdata = $this->Appointment;

    $params = $request->getParams();
    
    $appointmentadd = $appointmentdata->addNewAppointment($params);
    
    if($appointmentadd){
        return $response->withJson(
            [
            "error" => false,   
            "message" =>" Appointment was successfully added"
            ]
        );
    }else {
        return $response->withJson(
            [
                "error"=> true,
                "message" => "Appointment was not added"
            ]
        );
    }
});

$app->post('/gender', function ($request, $response, $args) {
    $genderdata = $this->Genders;

    $params = $request->getParams();
    
    $genderadd = $genderdata->addNewGender($params);
    
    if($genderadd){
        return $response->withJson(
            [
            "error" => false,   
            "message" => "Gender was successfully added"
            ]
        );
    }else {
        return $response->withJson(
            [
                "error"=> true,
                "message" => "Gender was not added"
            ]
        );
    }
});

$app->post('/position', function ($request, $response, $args) {
    $positiondata = $this->Positions;

    $params = $request->getParams();
    
    $positionadd = $positiondata->addNewPosition($params);
    
    if($positionadd){
        return $response->withJson(
            [
            "error" => false,   
            "message" => "Position was successfully added"
            ]
        );
    }else {
        return $response->withJson(
            [
                "error"=> true,
                "message" => "Position was not added"
            ]
        );
    }
});

$app->post('/visit', function ($request, $response, $args) {
    $visitdata = $this->Visits;

    $params = $request->getParams();
    
    $visitadd = $visitdata->addNewVisit($params);
    
    if($visitadd){
        return $response->withJson(
            [
            "error" => false,   
            "message" => "Visit was successfully added"
            ]
        );
    }else {
        return $response->withJson(
            [
                "error"=> true,
                "message" => "Visit was not added"
            ]
        );
    }
});

$app->post('/payment', function ($request, $response, $args) {
    $paymentdata = $this->Payments;

    $params = $request->getParams();
    
    $paymentadd = $paymentdata->addNewPayment($params);
    
    if($paymentadd){
        return $response->withJson(
            [
            "error" => false,   
            "message" => "Payment was successfully added"
            ]
        );
    }else {
        return $response->withJson(
            [
                "error"=> true,
                "message" => "Payment was not added"
            ]
        );
    }
});


//Functions for updating role data
$app->put('/user', function ($request, $response, $args) {
    $roledata = $this->Roles;

    $params = $request->getParams(); //print_r($params); exit;
    $roleupdate = $roledata->updateRoleByID($params);
    
    if($roleupdate){
        return $response->withJson(
            [
            "error" => false,   
            "message" =>$params['FirstName'] . ' ' . $params['LastName'] . ' ' . "was successfully updated"
            ]
        );
    }else {
        return $response->withJson(
            [
                "error"=> true,
                "message" => "Role was not updated"
            ]
        );
    }
});

//Functions for updating user data
$app->put('/user', function ($request, $response, $args) {
    $userdata = $this->Users;

    $params = $request->getParams(); 
    $userupdate = $userdata->updateUserByID($params);
    
    if($userupdate){
        return $response->withJson(
            [
            "error" => false,   
            "message" =>$params['FirstName'] . ' ' . $params['LastName'] . ' ' . "was successfully updated"
            ]
        );
    }else {
        return $response->withJson(
            [
                "error"=> true,
                "message" => "User was not updated"
            ]
        );
    }
});

$app->put('/bill', function ($request, $response, $args) {
    $billdata = $this->Bills;

    $params = $request->getParams();
    $billupdate = $billdata->updateBillByID($params);
    
    if($billupdate){
        return $response->withJson(
            [
            "error" => false,   
            "message" => "Bill was successfully updated"
            ]
        );
    }else {
        return $response->withJson(
            [
                "error"=> true,
                "message" => "Bill was not updated"
            ]
        );
    }
});

$app->put('/appointment', function ($request, $response, $args) {
    $appointmentdata = $this->Appointments;

    $params = $request->getParams(); 
    $appointmentupdate = $appointmentdata->updateAppointmentByID($params);
    
    if($appointmentupdate){
        return $response->withJson(
            [
            "error" => false,   
            "message" => "Appointment was successfully updated"
            ]
        );
    }else {
        return $response->withJson(
            [
                "error"=> true,
                "message" => "Appointment was not updated"
            ]
        );
    }
});

$app->put('/gender', function ($request, $response, $args) {
    $genderdata = $this->Genders;

    $params = $request->getParams(); 
    $genderupdate = $genderdata->updateGenderByID($params);
    
    if($genderupdate){
        return $response->withJson(
            [
            "error" => false,   
            "message" => "Gender was successfully updated"
            ]
        );
    }else {
        return $response->withJson(
            [
                "error"=> true,
                "message" => "Gender was not updated"
            ]
        );
    }
});

$app->put('/position', function ($request, $response, $args) {
    $positiondata = $this->Positions;

    $params = $request->getParams(); //print_r($params); exit;
    $positionupdate = $positiondata->updatePositionByID($params);
    
    if($positionupdate){
        return $response->withJson(
            [
            "error" => false,   
            "message" => "Position was successfully updated"
            ]
        );
    }else {
        return $response->withJson(
            [
                "error"=> true,
                "message" => "Position was not updated"
            ]
        );
    }
});


$app->put('/visit', function ($request, $response, $args) {
    $visitdata = $this->Visits;

    $params = $request->getParams(); //print_r($params); exit;
    $visitupdate = $visitdata->updateVisitByID($params);
    
    if($visitupdate){
        return $response->withJson(
            [
            "error" => false,   
            "message" => "Visit was successfully updated"
            ]
        );
    }else {
        return $response->withJson(
            [
                "error"=> true,
                "message" => "Visit was not updated"
            ]
        );
    }
});

$app->put('/payment', function ($request, $response, $args) {
    $paymentdata = $this->Payments;

    $params = $request->getParams(); 
    $paymentupdate = $paymentdata->updatePaymentByID($params);
    
    if($paymentupdate){
        return $response->withJson(
            [
            "error" => false,   
            "message" => "Payment was successfully updated"
            ]
        );
    }else {
        return $response->withJson(
            [
                "error"=> true,
                "message" => "Payment was not updated"
            ]
        );
    }
});



//Function for Get users data by id
$app->delete('/role/{id}',function($request, $response, $args){
    $roledata = $this->Roles;

    $roleID = $args['id'];

    $roledelete = $roledata->deleteRoleByID($roleID);

    if($roledelete){
        return $response->withJson(
            [
                "error"=> true,
                "message" => "Role was not deleted"
            ]
        );
    }else {
        return $response->withJson(
            [
            "error" => false,   
            "message" => "Role was successfully deleted"
            ]
        );
    }
});

//Function for Get users data by id
$app->delete('/user/{id}',function($request, $response, $args){
    $userdata = $this->Users;

    $userID = $args['id'];

    $userdelete = $userdata->deleteUserByID($userID);

    if($userdelete){
        return $response->withJson(
            [
                "error"=> true,
                "message" => "User was not deleted"
            ]
        );
    }else {
        return $response->withJson(
            [
            "error" => false,   
            "message" => "User was successfully deleted"
            ]
        );
    }
});

$app->delete('/bill/{id}',function($request, $response, $args){
    $billdata = $this->Bills;

    $billID = $args['id'];

    $billdelete = $billdata->deleteBillByID($billID);

    if($billdelete){
        return $response->withJson(
            [
                "error"=> true,
                "message" => "Bill was not deleted"
            ]
        );
    }else {
        return $response->withJson(
            [
            "error" => false,   
            "message" => "Bill was successfully deleted"
            ]
        );
    }
});


$app->delete('/appointment/{id}',function($request, $response, $args){
    $appointmentdata = $this->Appointments;

    $appointmentID = $args['id'];

    $appointmentdelete = $appointmentdata->deleteAppointmentByID($appointmentID);

    if($appointmentdelete){
        return $response->withJson(
            [
                "error"=> true,
                "message" => "Appointment was not deleted"
            ]
        );
    }else {
        return $response->withJson(
            [
            "error" => false,   
            "message" => "Appointment was successfully deleted"
            ]
        );
    }
});

$app->delete('/gender/{id}',function($request, $response, $args){
    $genderdata = $this->Genders;

    $genderID = $args['id'];

    $genderdelete = $genderdata->deleteGenderByID($genderID);

    if($genderdelete){
        return $response->withJson(
            [
                "error"=> true,
                "message" => "Gender was not deleted"
            ]
        );
    }else {
        return $response->withJson(
            [
            "error" => false,   
            "message" => "Gender was successfully deleted"
            ]
        );
    }
});


$app->delete('/position/{id}',function($request, $response, $args){
    $positiondata = $this->Positions;

    $positionID = $args['id'];

    $positiondelete = $positiondata->deletePositionByID($positionID);

    if($positiondelete){
        return $response->withJson(
            [
                "error"=> true,
                "message" => "Position was not deleted"
            ]
        );
    }else {
        return $response->withJson(
            [
            "error" => false,   
            "message" => "Position was successfully deleted"
            ]
        );
    }
});


$app->delete('/visit/{id}',function($request, $response, $args){
    $visitdata = $this->Visits;

    $visitID = $args['id'];

    $visitdelete = $visitdata->deleteVisitByID($visitID);

    if($visitdelete){
        return $response->withJson(
            [
                "error"=> true,
                "message" => "Visit was not deleted"
            ]
        );
    }else {
        return $response->withJson(
            [
            "error" => false,   
            "message" => "Visit was successfully deleted"
            ]
        );
    }
});


$app->delete('/payment/{id}',function($request, $response, $args){
    $paymentdata = $this->Payments;

    $paymentID = $args['id'];

    $paymentdelete = $paymentdata->deletePaymentByID($paymentID);

    if($paymentdelete){
        return $response->withJson(
            [
                "error"=> true,
                "message" => "Payment was not deleted"
            ]
        );
    }else {
        return $response->withJson(
            [
            "error" => false,   
            "message" => "Payment was successfully deleted"
            ]
        );
    }
});

$app->run();

?>
