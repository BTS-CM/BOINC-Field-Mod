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
require_once("../inc/xml.inc");

BoincDb::get(true);
xml_header();

$retval = db_init_xml();
if ($retval) xml_error($retval);

check_get_args(array("account_key"));
$auth = get_str("account_key");

$user = BoincUser::lookup_auth($auth);
if (!$user) {
    xml_error(ERR_DB_NOT_FOUND);
}

$project_rain = BoincRain::lookup_auth($auth);

$name = urlencode($user->name);
$country = urlencode($user->country);
$postal_code = urlencode($user->postal_code);
$bitshares_account = urlencode($project_rain->bitshares_account);
$steem_account = urlencode($project_rain->steem_account);
$gridcoin_address = urlencode($project_rain->gridcoin_address);
$ethereum_address = urlencode($project_rain->ethereum_address);
$ethereum_classic_address = urlencode($project_rain->ethereum_classic_address);
$golem_address = urlencode($project_rain->golem_address);
$nxt_account_id = urlencode($project_rain->nxt_account_id);
$ardor_account_id = urlencode($project_rain->ardor_account_id);
$hyperledger_sawtooth_lake = urlencode($project_rain->hyperledger_sawtooth_lake);
$hyperledger_fabric = urlencode($project_rain->hyperledger_fabric);
$waves_address = urlencode($project_rain->waves_address);
$peershares_address = urlencode($project_rain->peershares_address);
$omnilayer_address = urlencode($project_rain->omnilayer_address);
$counterparty_address = urlencode($project_rain->counterparty_address);
$url = urlencode($user->url);
$weak_auth = weak_auth($user);
$cpid = md5($user->cross_project_id.$user->email_addr);

$ret = "<id>$user->id</id>
<name>$name</name>
<country>$country</country>
<weak_auth>$weak_auth</weak_auth>
<postal_code>$postal_code</postal_code>
<bitshares_account>$bitshares_account</bitshares_account>
<steem_account>$steem_account</steem_account>
<gridcoin_address>$gridcoin_address</gridcoin_address>
<ethereum_address>$ethereum_address</ethereum_address>
<ethereum_classic_address>$ethereum_classic_address</ethereum_classic_address>    
<golem_address>$golem_address</golem_address>
<nxt_account_id>$nxt_account_id</nxt_account_id>
<ardor_account_id>$ardor_account_id</ardor_account_id>
<hyperledger_sawtooth_lake>$hyperledger_sawtooth_lake</hyperledger_sawtooth_lake>
<hyperledger_fabric>$hyperledger_fabric</hyperledger_fabric>
<waves_address>$waves_address</waves_address>
<peershares_address>$peershares_address</peershares_address>
<omnilayer_address>$omnilayer_address</omnilayer_address>
<counterparty_address>$counterparty_address</counterparty_address>
<cpid>$cpid</cpid>
<has_profile>$user->has_profile</has_profile>
<create_time>$user->create_time</create_time>
<global_prefs>
$user->global_prefs
</global_prefs>
<project_prefs>
$user->project_prefs
</project_prefs>
<url>$url</url>
<send_email>$user->send_email</send_email>
<show_hosts>$user->show_hosts</show_hosts>
<teamid>$user->teamid</teamid>
<venue>$user->venue</venue>";

if ($user->teamid) {
    $team = BoincTeam::lookup_id_nocache($user->teamid);
    if ($team->userid == $user->id) {
        $ret = $ret . "<teamfounder/>\n";
    }
}

echo "<am_get_info_reply>
    <success/>
    $ret
</am_get_info_reply>
";

?>
