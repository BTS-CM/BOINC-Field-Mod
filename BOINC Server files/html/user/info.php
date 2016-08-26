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

require_once('../inc/util.inc');
require_once('../inc/translation.inc');

check_get_args(array());

page_head(tra("Read our rules and policies"));

$show_default = true;

if (function_exists("project_rules_policies")) {
    $show_default = project_rules_policies();
}

if ($show_default) {
echo "
    <h2>Rules and Policies</h2>
    <hr>
    <h3>Use of Project-Rain data</h3>
    <p>
        Everyone is permitted to download the user XML data from project rain for the purposes of raining their crypto asset of choice upon BOINC users.
    </p>
    <p>
        Please do not pull user XML data more often than once per 24hrs, pulling data more frequently will put strain onto the project-rain website & abuse will be met with IP bans.
    </p>
    <p>
        Likewise, when planning on issuing a project rain do not pull XML data files from external BOINC projects more than once per 24hrs.
    </p>

    <h3>How does Project-Rain use your computer?</h3>
    <p>
        Unlike other BOINC projects, the Project-Rain BOINC project does not distribute work units. Its purpose is solely to match users CPID to crypto addresses/accounts.
    </p>
    <p>
        You will however have to add the Project-Rain BOINC project to your BOINC account manager client for your CPID to sync with your other projects.
    </p>

    <h3>Privacy policy</h3>
    <p>
        Your account on Project-Rain is identified by a name that you choose. This name may be shown on the Project-Rain web site, along with a summary of the work your computer has done for other BOINC project. If you want to be anonymous, choose a name that doesn't reveal your identity.
    </p>

    <p>
        The entire purpose of this BOINC project is to match your CPID (BOINC ID) to your cryptocurrency addresses/accounts. Do not re-use addresses and create alternate cryptocurrency accounts if you're worried about privacy.
    </p>

    <p>
        If you participate in Project-Rain and do not 'hide hosts', information about your computer (such as its processor type, amount of memory, etc.) will be recorded by the Project-Rain BOINC server. On other BOINC project servers this information is used to decide what type of work to assign to your computer, it's present within this project so hide your hosts if you're concerned about your computer's fingerprint. This information will also be shown on the Project-Rain web site via the host XML files. Nothing that reveals your computer's location (e.g. its domain name or network address) will be shown.
    </p>

    <p>
        To participate in Project-Rain, you must give an address where you receive email. This address will not be shown on the Project-Rain web site or shared with 3rd party organizations. Project-Rain may send you periodic newsletters; however, you can opt out at any time.
    </p>

    <p>
        If you join a team, your email address will be visible to your team founder. If you are concerned by this, opt out of the newsletter option detailed above (covers both project admin and team founder emails).
    </p>

    <p>
        Private messages sent on the Project-Rain web site are visible only to the sender and recipient. Project-Rain does not examine or police the content of private messages. If you receive unwanted private messages from another Project-Rain user, you may add them to your message filter. This will prevent you from seeing any public or private messages from that user.
    </p>

    <p>
        If you use our web site forums you must follow the posting guidelines. Messages posted to the Project-Rain forums are visible to everyone, including non-members. By posting to the forums, you are granting irrevocable license for anyone to view and copy your posts.
    </p>

    <h3>Liability</h3>
    <p>
        Project-Rain assumes no liability for damage to your computer, loss of data, or any other event or condition that may occur as a result of participating in Project-Rain.
    </p>
    <p>
        Project-Rain providing the ability to link your CPID to cryptocurrency addresses/accounts does not constitute financial advice nor endorsement of said cryptocurrencies nor the rained crypto-assets.
    </p>
    <p>
        Consult a financial advisor with regards to cryptocurrency investment if you do decide to invest in any cryptocurrency.
    </p>
    
    <h3>Stance regarding rained assets</h3>
    <p>
        Assets distributed via the ‘project rain’ share-dropping vector are not by default officially endorsed by this website unless otherwise stated.
    </p>

    <h3>Other BOINC projects</h3>
    <p>
        These other projects are not associated with Project-Rain, and we cannot vouch for their security practices or the nature of their research. Join them at your own risk. Joining projects outside of the <a href='https://www.gridcoin.us/Guides/whitelist.htm'>Gridcoin whitelist</a> potentially has a higher risk to the end user.
    </p>
"
}
page_tail();
$cvs_version_tracker[]="\$Id$";
?>
