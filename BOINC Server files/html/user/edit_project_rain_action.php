<?php
// This file is part of BOINC.
// http://boinc.berkeley.edu
// Copyright (C) 2008 University of California
//
// BOINC is free software; you can redistribute it and/or modify it
// under the terms of the GNU Lesser General Public License
// as published by the Free Software Foundation,
// either version 3 of the License, or (at your option) any later version.
//
// BOINC is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// See the GNU Lesser General Public License for more details.
//
// You should have received a copy of the GNU Lesser General Public License
// along with BOINC.  If not, see <http://www.gnu.org/licenses/>.

require_once("../inc/boinc_db.inc");
require_once("../inc/user.inc");
require_once("../inc/util.inc");
require_once("../inc/countries.inc");

check_get_args(array("tnow", "ttok"));

$user = get_logged_in_user();
check_tokens($user->authenticator);

$bitshares_account = sanitize_tags(post_str("bitshares_account", true));
$steem_account = sanitize_tags(post_str("steem_account", true));
$gridcoin_address = sanitize_tags(post_str("gridcoin_address", true));
$ethereum_address = sanitize_tags(post_str("ethereum_address", true));
$ethereum_classic_address = sanitize_tags(post_str("ethereum_classic_address", true));
$golem_address = sanitize_tags(post_str("golem_address", true));
$nxt_account_id = sanitize_tags(post_str("nxt_account_id", true));
$ardor_account_id = sanitize_tags(post_str("ardor_account_id", true));
$hyperledger_sawtooth_lake = sanitize_tags(post_str("hyperledger_sawtooth_lake", true));
$hyperledger_fabric = sanitize_tags(post_str("hyperledger_fabric", true));
$waves_address = sanitize_tags(post_str("waves_address", true));
$peershares_address = sanitize_tags(post_str("peershares_address", true));
$omnilayer_address = sanitize_tags(post_str("omnilayer_address", true));
$counterparty_address = sanitize_tags(post_str("counterparty_address", true));

$bitshares_account = BoincDb::escape_string($bitshares_account);
$steem_account = BoincDb::escape_string($steem_account);
$gridcoin_address = BoincDb::escape_string($gridcoin_address);
$ethereum_address = BoincDb::escape_string($ethereum_address);
$ethereum_classic_address = BoincDb::escape_string($ethereum_classic_address);
$golem_address = BoincDb::escape_string($golem_address);
$nxt_account_id = BoincDb::escape_string($nxt_account_id);
$ardor_account_id = BoincDb::escape_string($ardor_account_id);
$hyperledger_sawtooth_lake = BoincDb::escape_string($hyperledger_sawtooth_lake);
$hyperledger_fabric = BoincDb::escape_string($hyperledger_fabric);
$waves_address = BoincDb::escape_string($waves_address);
$peershares_address = BoincDb::escape_string($peershares_address);
$omnilayer_address = BoincDb::escape_string($omnilayer_address);
$counterparty_address = BoincDb::escape_string($counterparty_address);

$result = $project_rain->update(
    "bitshares_account='$bitshares_account',
     steem_account='$steem_account',
     gridcoin_address='$gridcoin_address',
     ethereum_address='$ethereum_address',
     ethereum_classic_address='$ethereum_classic_address',
     golem_address='$golem_address',
     nxt_account_id='$nxt_account_id',
     ardor_account_id='$ardor_account_id',
     hyperledger_sawtooth_lake='$hyperledger_sawtooth_lake',
     hyperledger_fabric='$hyperledger_fabric',
     waves_address='$waves_address',
     peershares_address='$peershares_address',
     omnilayer_address='$omnilayer_address',
     counterparty_address='$counterparty_address' "
);
if ($result) {
    Header("Location: home.php");
} else {
    error_page(tra("Couldn't update 'project Rain' info."));
}

?>
