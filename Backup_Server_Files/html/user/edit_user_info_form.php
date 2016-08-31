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

page_head(tra("Edit account information"));

echo "<form method=post action=edit_user_info_action.php>";
echo form_tokens($user->authenticator);
start_table();
row2(tra("Name %1 real name or nickname%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=user_name type=text size=30 value='$user->name'>"
);
row2(tra("URL %1 of your web page; optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "http://<input name=url type=text size=50 value='$user->url'>"
);
row2_init(tra("Country"),
    "<select name=country>"
);
print_country_select($user->country);
echo "</select></td></tr>\n";
row2(tra("Postal (ZIP) code %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=postal_code type=text size=20 value='$user->postal_code'>"
);
row2(tra("Bitshares account %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=bitshares_account type=text size=20 value='$user->bitshares_account'>"
);
row2(tra("Steem account %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=steem_account type=text size=20 value='$user->steem_account'>"
);
row2(tra("Gridcoin address %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=gridcoin_address type=text size=20 value='$user->gridcoin_address'>"
);
row2(tra("Ethereum address %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=ethereum_address type=text size=20 value='$user->ethereum_address'>"
);
row2(tra("Ethereum Classic address %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=ethereum_classic_address type=text size=20 value='$user->ethereum_classic_address'>"
);
row2(tra("Golem address %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=golem_address type=text size=20 value='$user->golem_address'>"
);
row2(tra("NXT account ID %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=nxt_account_id type=text size=20 value='$user->nxt_account_id'>"
);
row2(tra("Ardor account ID %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=ardor_account_id type=text size=20 value='$user->ardor_account_id'>"
);
row2(tra("Hyperledger Sawtooth Lake %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=hyperledger_sawtooth_lake type=text size=20 value='$user->hyperledger_sawtooth_lake'>"
);
row2(tra("Hyperledger Fabric %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=hyperledger_fabric type=text size=20 value='$user->hyperledger_fabric'>"
);
row2(tra("Waves address %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=waves_address type=text size=20 value='$user->waves_address'>"
);
row2(tra("Peershares address %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=peershares_address type=text size=20 value='$user->peershares_address'>"
);
row2(tra("Omnilayer address %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=omnilayer_address type=text size=20 value='$user->omnilayer_address'>"
);
row2(tra("CounterParty Address %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=counterparty_address type=text size=20 value='$user->counterparty_address'>"
);
row2("", "<input class=\"btn btn-default\" type=submit value='".tra("Update info")."'>");
end_table();
echo "</form>\n";
page_tail();

?>
