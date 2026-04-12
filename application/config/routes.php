<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "front";
$route['404_override'] = 'error';


/*********** USER DEFINED ROUTES *******************/

$route['loginMe'] = 'login/loginMe';
$route['dashboard'] = 'hotel_other/dashboard';
$route['logout'] = 'user/logout';
$route['userListing'] = 'user/userListing';
$route['userListing/(:num)'] = "user/userListing/$1";
$route['addNew'] = "user/addNew";

$route['addNewUser'] = "user/addNewUser";
$route['editOld'] = "user/editOld";
$route['editOld/(:num)'] = "user/editOld/$1";
$route['editUser'] = "user/editUser";
$route['deleteUser'] = "user/deleteUser";
$route['loadChangePass'] = "user/loadChangePass";
$route['changePassword'] = "user/changePassword";
$route['pageNotFound'] = "user/pageNotFound";
$route['checkEmailExists'] = "user/checkEmailExists";
$route['userRights/(:num)'] = "user/user_rights/$1";

$route['forgotPassword'] = "login/forgotPassword";
$route['resetPasswordUser'] = "login/resetPasswordUser";
$route['resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['createPasswordUser'] = "login/createPasswordUser";
//hotels
$route['add_hotel'] = "hotel_other/add_hotel";
$route['hotel'] = 'hotel_other/hotel_list';
$route['hotel/(:num)'] = "hotel_other/hotel_list/$1";
$route['deleteHotel'] = "hotel_other/deleteHotel";
$route['edit_hotel'] = "hotel_other/edit_hotel";
$route['edit_hotel/(:num)'] = "hotel_other/edit_hotel/$1";
$route['editHotel'] = "hotel_other/editHotel";

//agents hotels
$route['add_hotel_agent'] = "hotel_other/add_hotel_agent";
$route['agent_hotel'] = 'hotel_other/agent_hotel';
$route['agent_hotel/(:num)'] = "hotel_other/agent_hotel/$1";
$route['deleteAgentHotel'] = "hotel_other/deleteAgentHotel";
$route['edit_agent_hotel'] = "hotel_other/edit_agent_hotel";
$route['edit_agent_hotel/(:num)'] = "hotel_other/edit_agent_hotel/$1";
$route['editAgentHotel'] = "hotel_other/editAgentHotel";

//Trip
$route['trip'] = "hotel_other/trip";
$route['addTrip'] = 'hotel_other/add_trip';
$route['trip/(:num)'] = "hotel_other/trip/$1";
$route['deleteTrip'] = "hotel_other/delete_trip";
$route['editTrip'] = "hotel_other/edit_trip";
$route['editTrip/(:num)'] = "hotel_other/edit_trip/$1";
$route['edit_trip'] = "hotel_other/editTrip";

//vehicles
$route['vehicle'] = "hotel_other/vehicle";
$route['addVehicle'] = 'hotel_other/add_vehicle';
$route['vehicle/(:num)'] = "hotel_other/vehicle/$1";
$route['deleteVehicle'] = "hotel_other/delete_vehicle";
$route['editVehicle'] = "hotel_other/edit_vehicle";
$route['editVehicle/(:num)'] = "hotel_other/edit_vehicle/$1";
$route['edit_vehicle'] = "hotel_other/editVehicle";

//Ziarat
$route['ziarat'] = "hotel_other/ziarat";
$route['addZiarat'] = 'hotel_other/add_ziarat';
$route['ziarat/(:num)'] = "hotel_other/ziarat/$1";
$route['deleteZiarat'] = "hotel_other/delete_ziarat";
$route['editZiarat'] = "hotel_other/edit_ziarat";
$route['editZiarat/(:num)'] = "hotel_other/edit_ziarat/$1";
$route['edit_ziarat'] = "hotel_other/editZiarat";

//Flight
$route['flight'] = "hotel_other/flight";
$route['addFlight'] = 'hotel_other/add_flight';
$route['flight/(:num)'] = "hotel_other/flight/$1";
$route['deleteFlight'] = "hotel_other/delete_flight";
$route['editFlight'] = "hotel_other/edit_flight";
$route['editFlight/(:num)'] = "hotel_other/edit_flight/$1";
$route['edit_flight'] = "hotel_other/editFlight";
//Packeg
$route['packeg'] = "hotel_other/packeg";
$route['addPackeg'] = 'hotel_other/add_packeg';
$route['packeg/(:num)'] = "hotel_other/packeg/$1";
$route['deletePackeg'] = "hotel_other/delete_packeg";
$route['editPackeg'] = "hotel_other/edit_packeg";
$route['editPackeg/(:num)'] = "hotel_other/edit_packeg/$1";
$route['edit_packeg'] = "hotel_other/editPackeg";

//sector
$route['sector'] = "hotel_other/sector";
$route['addSector'] = 'hotel_other/add_sector';
$route['sector/(:num)'] = "hotel_other/sector/$1";
$route['deleteSector'] = "hotel_other/delete_sector";
$route['editSector'] = "hotel_other/edit_sector";
$route['editSector/(:num)'] = "hotel_other/edit_sector/$1";
$route['edit_sector'] = "hotel_other/editSector";

//visa company
$route['visaCompany'] = "hotel_other/visaCompany";
$route['addVisaCompany'] = 'hotel_other/add_visaCompany';
$route['visaCompany/(:num)'] = "hotel_other/visaCompany/$1";
$route['deleteVisaCompany'] = "hotel_other/delete_visaCompany";
$route['editVisaCompany'] = "hotel_other/edit_visaCompany";
$route['editVisaCompany/(:num)'] = "hotel_other/edit_visaCompany/$1";
$route['edit_visaCompany'] = "hotel_other/editVisaCompany";

//agent company
$route['agent'] = "hotel_other/agent";
$route['addAgent'] = 'hotel_other/add_agent';
$route['agent/(:num)'] = "hotel_other/agent/$1";
$route['deleteAgent'] = "hotel_other/delete_agent";
$route['editAgent'] = "hotel_other/edit_agent";
$route['editAgent/(:num)'] = "hotel_other/edit_agent/$1";
$route['edit_agent'] = "hotel_other/editAgent";
$route['checkEmailExists1'] = "hotel_other/checkEmailExists";

//configration
$route['setting'] = "configration";
$route['Config'] = "configration/agent_config";
$route['backup_db'] = "configration/backup_db";
$route['image_manager'] = "configration/images_manager";

//client here controller is client
$route['client'] = "client/index";
$route['addClient'] = 'client/add_client';
$route['importClient'] = 'client/import_client';
$route['client/(:num)'] = "client/index/$1";
$route['deleteClient'] = "client/deleteClient";
$route['editClient'] = "client/edit_client";
$route['editClient/(:num)'] = "client/edit_client/$1";
$route['edit_client'] = "client/editClient";
$route['checkPassportNo'] = "client/checkPassportNo";
$route['visaApprove'] = "client/visaApprove";
$route['visaNApprove'] = "client/visaNApprove";
$route['update_visa'] = 'client/update_visa';

//Voucher
$route['voucher'] = "hotel_other/voucher";
$route['voucher/(:num)'] = "hotel_other/voucher/$1";
$route['voucherView/(:num)'] = "hotel_other/voucher_view/$1";
$route['voucherCancel'] = "hotel_other/voucher_cancel";
$route['voucherInvoice/(:num)'] = "hotel_other/voucher_invoice/$1";
$route['createVoucher'] = "hotel_other/create_voucher";
$route['deleteVoucher'] = "hotel_other/delete_voucher";
$route['editVoucher/(:num)'] = "hotel_other/edit_voucher/$1";
$route['edit_voucher'] = "hotel_other/editVoucher";
$route['select_clients'] = "hotel_other/select_clients";
$route['selectHtl_room/(:num)'] = "hotel_other/get_hotels_room_type/$1";
$route['selectHtl_city/(:any)/(:any)/(:any)'] = "hotel_other/get_hotels_city_name/$1/$2/$3";
$route['selectTrip/(:num)'] = "hotel_other/select_trip/$1";
$route['selectTrip1/(:num)/(:num)'] = "hotel_other/select_trip1/$1/$2";
$route['voucherApprove'] = "hotel_other/voucherApprove";
$route['voucherNApprove'] = "hotel_other/voucherNApprove";
$route['selectAgent/(:num)'] = "hotel_other/selectAgent/$1";
$route['c_in_out/(:num)'] = "hotel_other/c_in_out/$1";
$route['c_in_out/(:num)'] = "hotel_other/c_in_out/$1";
$route['check_in_yes'] = "hotel_other/check_in_yes";
$route['check_in_no'] = "hotel_other/check_in_no";
$route['check_out_yes'] = "hotel_other/check_out_yes";
$route['check_out_no'] = "hotel_other/check_out_no";


//Transection
$route['transection'] = "transection";
$route['addTransection'] = 'transection/add_transection';
$route['transection/(:num)'] = "transection/index/$1";
$route['deleteTransection'] = "transection/delete_transection";
$route['editTransection'] = "transection/edit_transection";
$route['editTransection/(:num)'] = "transection/edit_transection/$1";
$route['edit_transection'] = "transection/editTransection";
$route['balance'] = "transection/balance";

//ticket sale
$route['ticket_sale'] = "hotel_other/ticket_sale";
$route['ticket_sale/(:num)'] = "hotel_other/ticket_sale/$1";
$route['addTicket_sale'] = 'hotel_other/add_ticket_sale';
$route['deleteTicket'] = "hotel_other/delete_ticket";
$route['edit_ticketSale/(:num)'] = "hotel_other/edit_ticket_sale/$1";
$route['print_ticket_sale/(:num)'] = "hotel_other/print_ticket_sale/$1";
$route['edit_ticket_sale'] = "hotel_other/edit_ticketSale";
$route['receive_payment'] = "hotel_other/receive_payment";

//flight transection

$route['flight_transection'] = "hotel_other/flight_transection";
$route['flight_transection/(:num)'] = "hotel_other/flight_transection/$1";
$route['addFTransection'] = 'hotel_other/add_ftransection';
$route['deleteFTransection'] = "hotel_other/delete_ftransection";
$route['editFTransection/(:num)'] = "hotel_other/edit_ftransection/$1";
$route['edit_ftransection'] = "hotel_other/editFTransection";

//bank 
$route['bank'] = "hotel_other/bank";
$route['bank/(:num)'] = "hotel_other/bank/$1";
$route['addBank'] = 'hotel_other/add_bank';
$route['bank/(:num)'] = "hotel_other/bank/$1";
$route['deleteBank'] = "hotel_other/delete_bank";
$route['editBank'] = "hotel_other/edit_bank";
$route['editBank/(:num)'] = "hotel_other/edit_bank/$1";
$route['edit_bank'] = "hotel_other/editBank";

// permotion numbers
$route['permotion_number'] = "hotel_other/permotion_number";
$route['permotion_number/(:num)'] = "hotel_other/permotion_number/$1";
$route['addpermotion_number'] = 'hotel_other/add_permotion_number';
$route['permotion_number/(:num)'] = "hotel_other/permotion_number/$1";
$route['deletepermotion_number'] = "hotel_other/delete_permotion_number";
$route['editpermotion_number'] = "hotel_other/edit_permotion_number";
$route['editpermotion_number/(:num)'] = "hotel_other/edit_permotion_number/$1";
$route['edit_permotion_number'] = "hotel_other/editpermotion_number";
$route['permotion_sms'] = "hotel_other/permotion_sms";
//bank transection

$route['bank_transection'] = "hotel_other/bank_transection";
$route['bank_transection/(:num)'] = "hotel_other/bank_transection/$1";
$route['addBTransection'] = 'hotel_other/add_btransection';
$route['deleteBTransection'] = "hotel_other/delete_btransection";
$route['editBTransection/(:num)'] = "hotel_other/edit_btransection/$1";
$route['edit_btransection'] = "hotel_other/editBTransection";

//reports
$route['pilgrim_report'] = "reports/pilgrim_report";
$route['pilgrim_report/(:num)'] = "reports/pilgrim_report/$1";
$route['arrival_report'] = "reports/arrival_report";
$route['arrival_report/(:num)'] = "reports/arrival_report/$1";
$route['departure_report'] = "reports/departure_report";
$route['departure_report/(:num)'] = "reports/departure_report/$1";
$route['visa_report'] = "reports/visa_report";
$route['visa_report/(:num)'] = "reports/visa_report/$1";
$route['pilgrim_wise_report'] = "reports/pilgrim_wise_report";
$route['pilgrim_wise_report/(:num)'] = "reports/pilgrim_wise_report/$1";
$route['party_wise_report'] = "reports/party_wise_report";
$route['party_wise_report/(:num)'] = "reports/party_wise_report/$1";
//export
$route['arrival_report_excel'] = "reports/arrival_report_excel";
$route['arrival_report_word'] = "reports/arrival_report_word";
$route['pilgrim_report_excel'] = "reports/pilgrim_report_excel";
$route['pilgrim_report_word'] = "reports/pilgrim_report_word";
$route['departure_report_excel'] = "reports/departure_report_excel";
$route['departure_report_word'] = "reports/departure_report_word";
$route['visa_report_excel'] = "reports/visa_report_excel";
$route['visa_report_word'] = "reports/visa_report_word";
$route['flight_transection_excel'] = "hotel_other/flight_transection_excel";
$route['flight_transection_word'] = "hotel_other/flight_transection_word";
$route['ticket_sale_excel'] = "hotel_other/ticket_sale_excel";
$route['ticket_sale_word'] = "hotel_other/ticket_sale_word";
$route['bank_transection_excel'] = "hotel_other/bank_transection_excel";
$route['bank_transection_word'] = "hotel_other/bank_transection_word";
$route['client_excel'] = "client/client_excel";
$route['client_word'] = "client/client_word";
$route['pilgrim_wise_excel'] = "reports/pilgrim_wise_excel";
$route['pilgrim_wise_word'] = "reports/pilgrim_wise_word";

//pdf
$route['voucherPDF/(:num)'] = "hotel_other/voucherPDF/$1";
$route['voucherInvPDF/(:num)'] = "hotel_other/voucherInvPDF/$1";
/* End of file routes.php */
/* Location: ./application/config/routes.php */