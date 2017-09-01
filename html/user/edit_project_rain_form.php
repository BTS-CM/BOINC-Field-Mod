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
row2(tra("<img src=\"img/bitshares.png\" alt=\"BTS\" /> Bitshares %1 Optional%2", "<br><p class=\"text-muted\">", "</p>"),
    "<input name=bitshares type=text size=20 value='$project_rain->bitshares'>"
);
row2("", "<input class=\"btn btn-default\" type=submit value='".tra("Update info")."'>");
end_table();
echo "</form>\n";
page_tail();

?>
