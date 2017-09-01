<?php

require_once("../inc/boinc_db.inc");
require_once("../inc/user.inc");
require_once("../inc/util.inc");
require_once("../inc/countries.inc");

check_get_args(array("tnow", "ttok"));

$user = get_logged_in_user();
check_tokens($user->authenticator);

$project_rain = get_project_rain_details();
$bitshares = sanitize_tags(post_str("bitshares", true));
$bitshares = BoincDb::escape_string($bitshares);

$result = $project_rain->update(
   "bitshares='$bitshares'"
);
if ($result) {
    Header("Location: home.php");
} else {
    error_page(tra("Couldn't update 'project Rain' info."));
}

?>