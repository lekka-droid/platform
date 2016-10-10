<?php
// parsing posted data:
if (isset($_POST['dovenueadd'])) {
	// do the actual list add stuffs...
	$addvenue_address1 = '';
	$addvenue_address2 = '';
	$addvenue_postalcode = '';
	$addvenue_url = '';
	$addvenue_phone = '';
	if (isset($_POST['venue_address1'])) { $addvenue_address1 = $_POST['venue_address1']; }
	if (isset($_POST['venue_address2'])) { $addvenue_address2 = $_POST['venue_address2']; }
	if (isset($_POST['venue_postalcode'])) { $addvenue_postalcode = $_POST['venue_postalcode']; }
	if (isset($_POST['venue_url'])) { $addvenue_url = $_POST['venue_url']; }
	if (isset($_POST['venue_phone'])) { $addvenue_phone = $_POST['venue_phone']; }
	$add_response = $cash_admin->requestAndStore(
		array(
			'cash_request_type' => 'calendar', 
			'cash_action' => 'addvenue',
			'name' => $_POST['venue_name'],
			'city' => $_POST['venue_city'],
			'region' => $_POST['venue_region'],
			'country' => $_POST['venue_country'],
			'address1' => $addvenue_address1,
			'address2' => $addvenue_address2,
			'postalcode' => $addvenue_postalcode,
			'url' => $addvenue_url,
			'phone' => $addvenue_phone,
            'user_id' => $cash_admin->effective_user_id
		)
	);
	if ($add_response['payload']) {
		AdminHelper::formSuccess('Success. Venue added.','/calendar/venues/edit/' . $add_response['payload']);
	} else {
		AdminHelper::formFailure('Error. Something just didn\'t work right.','/calendar/venues/add/');
	}
}

$cash_admin->page_data['form_state_action'] = 'dovenueadd';
$cash_admin->page_data['venue_button_text'] = 'Add the venue';
$cash_admin->page_data['country_options'] = AdminHelper::drawCountryCodeUL();

$cash_admin->setPageContentTemplate('calendar_venues_details');
?>