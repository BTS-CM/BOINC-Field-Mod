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

require_once("../inc/util.inc");
require_once("../inc/countries.inc");

check_get_args(array("tnow", "ttok"));

$user = get_logged_in_user();
check_tokens($user->authenticator);
$project_rain = get_project_rain_details();

page_head(tra("Edit project rain information"));

echo "<form method=post action=edit_project_rain_action.php>";
echo form_tokens($user->authenticator);
start_table();
row2(tra("Bitshares account %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=bitshares_account type=text size=20 value='$project_rain->bitshares_account'>"
);
row2(tra("Steem account %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=steem_account type=text size=20 value='$project_rain->steem_account'>"
);
row2(tra("Gridcoin address %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=gridcoin_address type=text size=20 value='$project_rain->gridcoin_address'>"
);
row2(tra("Ethereum address %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=ethereum_address type=text size=20 value='$project_rain->ethereum_address'>"
);
row2(tra("Ethereum Classic address %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=ethereum_classic_address type=text size=20 value='$project_rain->ethereum_classic_address'>"
);
row2(tra("Golem address %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=golem_address type=text size=20 value='$project_rain->golem_address'>"
);
row2(tra("NXT account ID %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=nxt_account_id type=text size=20 value='$project_rain->nxt_account_id'>"
);
row2(tra("Ardor account ID %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=ardor_account_id type=text size=20 value='$project_rain->ardor_account_id'>"
);
row2(tra("Hyperledger Sawtooth Lake %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=hyperledger_sawtooth_lake type=text size=20 value='$project_rain->hyperledger_sawtooth_lake'>"
);
row2(tra("Hyperledger Fabric %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=hyperledger_fabric type=text size=20 value='$project_rain->hyperledger_fabric'>"
);
row2(tra("Waves address %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=waves_address type=text size=20 value='$project_rain->waves_address'>"
);
row2(tra("Peershares address %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=peershares_address type=text size=20 value='$project_rain->peershares_address'>"
);
row2(tra("Omnilayer address %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=omnilayer_address type=text size=20 value='$project_rain->omnilayer_address'>"
);
row2(tra("CounterParty Address %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=counterparty_address type=text size=20 value='$project_rain->counterparty_address'>"
);
row2("", "<input class=\"btn btn-default\" type=submit value='".tra("Update info")."'>");
end_table();
echo "</form>\n";
page_tail();

?>
