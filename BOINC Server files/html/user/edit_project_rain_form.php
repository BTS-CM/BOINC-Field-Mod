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
row1(tra("Cryptocurrency addresses/accounts"));
row2(tra("Bitshares %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=bitshares type=text size=20 value='$project_rain->bitshares'>"
);
row2(tra("Steem %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=steem type=text size=20 value='$project_rain->steem'>"
);
row2(tra("Gridcoin %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=gridcoin type=text size=20 value='$project_rain->gridcoin'>"
);
row2(tra("Ethereum %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=ethereum type=text size=20 value='$project_rain->ethereum'>"
);
row2(tra("Ethereum Classic %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=ethereum_classic type=text size=20 value='$project_rain->ethereum_classic'>"
);
row2(tra("Golem %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=golem type=text size=20 value='$project_rain->golem'>"
);
row2(tra("NXT %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=nxt type=text size=20 value='$project_rain->nxt'>"
);
row2(tra("Ardor %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=ardor type=text size=20 value='$project_rain->ardor'>"
);
row2(tra("Hyperledger Sawtooth Lake %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=hyperledger_sawtooth_lake type=text size=20 value='$project_rain->hyperledger_sawtooth_lake'>"
);
row2(tra("Hyperledger Fabric %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=hyperledger_fabric type=text size=20 value='$project_rain->hyperledger_fabric'>"
);
row2(tra("Waves %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=waves type=text size=20 value='$project_rain->waves'>"
);
row2(tra("Peershares %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=peershares type=text size=20 value='$project_rain->peershares'>"
);
row2(tra("Omnilayer %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=omnilayer type=text size=20 value='$project_rain->omnilayer'>"
);
row2(tra("CounterParty %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=counterparty type=text size=20 value='$project_rain->counterparty'>"
);
row2(tra("Heat Ledger %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=heat_ledger type=text size=20 value='$project_rain->heat_ledger'>"
);
row2(tra("Peerplays %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=peerplays type=text size=20 value='$project_rain->peerplays'>"
);
row2(tra("Storj %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=storj type=text size=20 value='$project_rain->storj'>"
);
row2(tra("NEM %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=nem type=text size=20 value='$project_rain->nem'>"
);
row2(tra("IBM Bluemix blockchain %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=ibm_bluemix_blockchain type=text size=20 value='$project_rain->ibm_bluemix_blockchain'>"
);
row2(tra("Coloredcoins %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=coloredcoins type=text size=20 value='$project_rain->coloredcoins'>"
);
row2(tra("Antshares %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=antshares type=text size=20 value='$project_rain->antshares'>"
);
row2(tra("Lisk %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=lisk type=text size=20 value='$project_rain->lisk'>"
);
row2(tra("Decent %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=decent type=text size=20 value='$project_rain->decent'>"
);
row2(tra("Synereo %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=synereo type=text size=20 value='$project_rain->synereo'>"
);
row2(tra("LBRY %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=lbry type=text size=20 value='$project_rain->lbry'>"
);
row1(tra("DAC/DAO platforms"));
row2(tra("Wings %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=wings type=text size=20 value='$project_rain->wings'>"
);
row2(tra("Hong %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=hong type=text size=20 value='$project_rain->hong'>"
);
row2(tra("Boardroom %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=boardroom type=text size=20 value='$project_rain->boardroom'>"
);
row2(tra("Expanse %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=expanse type=text size=20 value='$project_rain->expanse'>"
);
row2(tra("Echo %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=echo type=text size=20 value='$project_rain->echo'>"
);
row1(tra("Secure messaging"));
row2(tra("TOX %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=tox type=text size=20 value='$project_rain->tox'>"
);
row2(tra("Retroshare %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=retroshare type=text size=20 value='$project_rain->retroshare'>"
);
row2(tra("Wickr %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=wickr type=text size=20 value='$project_rain->wickr'>"
);
row2(tra("Ring %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=ring type=text size=20 value='$project_rain->ring'>"
);
row2(tra("PGP %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=pgp type=text size=20 value='$project_rain->pgp'>"
);
row2("", "<input class=\"btn btn-default\" type=submit value='".tra("Update info")."'>");
end_table();
echo "</form>\n";
page_tail();

?>
