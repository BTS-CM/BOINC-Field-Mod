<?php
// This file is part of BOINC.
// http://boinc.berkeley.edu
// Copyright (C) 2014 University of California
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

// This is a template for your web site's front page.
// You are encouraged to customize this file,
// and to create a graphical identity for your web site
// my developing your own stylesheet
// and customizing the header/footer functions in html/project/project.inc

require_once("../inc/util.inc");
require_once("../inc/news.inc");
require_once("../inc/cache.inc");
require_once("../inc/uotd.inc");
require_once("../inc/sanitize_html.inc");
require_once("../inc/text_transform.inc");
require_once("../project/project.inc");

check_get_args(array());

function show_nav() {
    $config = get_config();
    $master_url = parse_config($config, "<master_url>");
    $no_computing = parse_config($config, "<no_computing>");
    $no_web_account_creation = parse_bool($config, "no_web_account_creation");
    $disable_acct = parse_bool($config, "disable_account_creation");
    echo "<div class=\"mainnav\">
        <h2 class=headline>About ".PROJECT."</h2>
    ";
    if ($no_computing) {
        echo "
            Project-Rain matches BOINC user's CPID to multiple cryptocurrency accounts/addresses to extend project rain (tipping BOINC users) to multiple cryptocurrency platforms.
        ";
    } else {
        echo "
            Project-Rain matches BOINC user's CPID to multiple cryptocurrency accounts/addresses to extend project rain (tipping BOINC users) to multiple cryptocurrency platforms.
        ";
    }
    echo "
        <p>
        Project-Rain is hosted on <a href='https://www.digitalocean.com/?refcode=b86d3e55f889'>DigitalOcean</a>, and run by CM from the <a href='https://www.gridcoin.us'>Gridcoin</a> community.
        <ul>
        <li> <a href='https://steemit.com/boinc/@cm-steem/project-rain-distributing-crypto-assets-to-boinc-users-based-on-their-verified-boinc-computation'>Project-Rain Steem post</a>.</li>
        <li> Got an idea for a BOINC project? <a href='https://steemit.com/gridcoin/@cm-steem/brainstorming-new-boinc-projects-anyone-can-create-a-project-and-reward-their-users-with-gridcoin'>Post your ideas in the Brainstorming thread</a> on Steem!</li>
        </ul>
        <p>Currently supported cryptocurrencies:</p>
        <ul>
            <li>Gridcoin, Bitshares, STEEM, Ethereum (ETH), Ethereum Classic (ETC), Golem, NXT, Ardor, Hyperledger, Waves, Peershares, Omnilayer and Counterparty.</li>
        </ul>
        <h2 class=headline>Join the project!</h2>
        <ul>
    ";
    if ($no_computing) {
        if (!$no_web_account_creation && !$disable_acct) {
            echo "
                <li> Want to potentially recieve project rain across multiple crypto platforms? <a href=\"create_account_form.php\">Create an account</a>!
            ";
        } else {
            echo "<li> This project is not currently accepting new accounts. Something has gone wrong, contact CM!";
        }
    } else {
        echo "
            <li><a href=\"info.php\">".tra("Read our rules and policies")."</a>
        ";
        if (0) {
            echo "<li>";
            show_button("register.php", "Join", null, "btn btn-green");
        } else {
            echo "<li> <a href=https://boinc.berkeley.edu/download.php>Download</a> and run BOINC.
                <li> Choose Add Project
            ";
        }
        echo "
            <li> If you have any problems,
                <a target=\"_new\" href=\"https://boinc.berkeley.edu/wiki/BOINC_Help\">get help here</a>.
        ";
    }
    echo "
        </ul>

        <h2 class=headline>Returning participants</h2>
        <ul>
        <li><a href=\"home.php\">Your account</a> - view stats, modify preferences
    ";
    if (!$no_computing) {
        echo "
            <li><a href=server_status.php>Server status</a>
        ";
    }
    if (!DISABLE_TEAMS) {
        echo "
            <li><a href=\"team.php\">Teams</a> - create or join a team
        ";
    }
    echo "
        </ul>
        <h2 class=headline>".tra("Community")."</h2>
        <ul>
    ";
    if (!DISABLE_PROFILES) {
        echo "
            <li><a href=\"profile_menu.php\">".tra("Profiles")."</a>
        ";
    }
    echo "
        <li><a href=\"user_search.php\">User search</a>
        <li><a href=ffmail_form.php>Share</a>
    ";
    if (!DISABLE_FORUMS) {
        echo "
            <li><a href=\"forum_index.php\">".tra("Message boards")."</a>
            <li><a href=\"forum_help_desk.php\">".tra("Questions and Answers")."</a>
        ";
    }
    echo "
        <li><a href=\"stats.php\">Statistics</a>
        <li><a href=language_select.php>Languages</a>
        </ul>
        </div>
    ";
}

$stopped = web_stopped();
$rssname = PROJECT . " RSS 2.0" ;
$rsslink = url_base() . "rss_main.php";

header("Content-type: text/html; charset=utf-8");

echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">";

echo "<html>
    <head>
    <title>".PROJECT."</title>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"main.css\" media=\"all\" />
    <link rel=\"stylesheet\" type=\"text/css\" href=\"".STYLESHEET."\">
    <link rel=\"alternate\" type=\"application/rss+xml\" title=\"".$rssname."\" href=\"".$rsslink."\">
";
include 'schedulers.txt';
    if (defined("SHORTCUT_ICON")) {
        echo '<link rel="icon" type="image/x-icon", href="'.SHORTCUT_ICON.'"/>'
;
    }
echo "
    </head><body>
    <div class=page_title>".PROJECT."</div>
";

if (!$stopped) {
    get_logged_in_user(false);
    show_login_info();
}

echo "
    <table cellpadding=\"8\" cellspacing=\"4\" class=\"table table-bordered\">
    <tr><td rowspan=\"2\" valign=\"top\" width=\"40%\">
";

if ($stopped) {
    echo "
        <b>".PROJECT." is temporarily shut down for maintenance - if it's down for more than 6hrs please contact the site admin</b>.
    ";
} else {
    show_nav();
}

echo "
    <p>
    <a href=\"https://boinc.berkeley.edu/\"><img align=\"middle\" border=\"0\" src=\"img/pb_boinc.gif\" alt=\"Powered by BOINC\"></a></br>
    <a href=\"https://www.digitalocean.com/?refcode=b86d3e55f889\"><img src=\"img/DigitalOcean.png\" alt=\"DigitalOcean\"/></a>
    </p>
    </td>
";

if (!$stopped && !DISABLE_PROFILES) {
    $profile = get_current_uotd();
    if ($profile) {
        echo "
            <td class=uotd>
            <h2 class=headline>".tra("User of the day")."</h2>
        ";
        show_uotd($profile);
        echo "</td></tr>\n";
    }
}

echo "
    <tr><td class=news>
    <h2 class=headline>News</h2>
    <p>
";
include("motd.php");
show_news(0, 5);
echo "
    </td>
    </tr></table>
";

page_tail_main();

?>
