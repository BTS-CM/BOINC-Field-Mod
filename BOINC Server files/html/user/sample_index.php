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
//require_once("../inc/news.inc");
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
    echo "<div class=\"container\">
    <div class=\"row\">
    <div class=\"mainnav col-xs-12 col-sm-12 col-md-6\" style=\"padding:10px;\">
        <h2 class=headline>About ".PROJECT."</h2>
    ";
    if ($no_computing) {
        echo "
            Project-Rain matches BOINC user's CPID to multiple cryptocurrency accounts/addresses to extend 'Project Rain' (tipping BOINC users) to multiple cryptocurrency networks & all BOINC teams.
        ";
    } else {
        echo "
            Project-Rain matches BOINC user's CPID to multiple cryptocurrency accounts/addresses to extend 'Project Rain' (tipping BOINC users) to multiple cryptocurrency networks & all BOINC teams.
        ";
    }
    echo "
        <p>
            Project-Rain is hosted on <a href='https://www.digitalocean.com/?refcode=b86d3e55f889'>DigitalOcean</a>, and run by CM from the <a href='https://www.gridcoin.us'>Gridcoin</a> community.
        </p>
            <a href='https://steemit.com/boinc/@cm-steem/project-rain-distributing-crypto-assets-to-boinc-users-based-on-their-verified-boinc-computation'>Project-Rain Steem post</a>.
        <p>
            <a href='https://steemit.com/steem/@cm-steem/gauging-interest-would-you-be-interested-being-able-to-tip-boinc-users-your-crypto-asset-of-choice'>Initial Steem post regarding the concept of 'project rain'</a>
        </p>
        <p>
            Do you have an idea for a BOINC project? <a href='https://steemit.com/gridcoin/@cm-steem/brainstorming-new-boinc-projects-anyone-can-create-a-project-and-reward-their-users-with-gridcoin'>Post your ideas in the Brainstorming thread</a> on Steem!
        </p>
        
        <h4>Currently supported cryptocurrencies:</h4>
        <p>
            <a href='https://www.gridcoin.us'>Gridcoin</a>, <a href='https://www.bitshares.org'>Bitshares</a>, <a href='https://steemit.com/'>STEEM</a>, <a href='https://www.ethereum.org/'>Ethereum (ETH)</a>, <a href='https://ethereumclassic.github.io/'>Ethereum Classic (ETC)</a>, <a href='http://www.golemproject.net/'>Golem</a>, <a href='https://nxt.org/'>NXT</a>, <a href='https://ardorplatform.org/'>Ardor</a>, <a href='https://intelledger.github.io/introduction.html'>Hyperledger: Sawtooth Lake (Intel)</a>, <a href='https://hyperledger-fabric.readthedocs.io/en/latest/'>Hyperledger: Fabric (IBM)</a>, <a href='https://wavesplatform.com/'>Waves</a>, <a href='www.peershares.net'>Peershares</a>, <a href='http://www.omnilayer.org'>Omnilayer</a> and <a href='https://counterparty.io'>Counterparty</a>.
        </p>
        <h4>Why is cryptocurrency 'x/y/z' not included?</h4>
        <p>
            Only '2nd gen' cryptocurrencies have been added, mainly those which allow the issuance of new crypto assets within their network (Bitshares/Ardor/Waves/etc). Gridcoin and Golem are directly related to distributed computing and Steem has the potential for raising funds for project-rain. Cryptocurrencies such as Bitcoin are not supported due to the fact their project-rain would be classed as 'dust' and would not be sufficient precipitation for a 'project rain' against tens of thousands of users.
        </p>
        <h4>
            Can you add cryptocurrency 'x/y/z'?
        </h4>
        <p>
            Negative, once this project is live the cryptocurrencies selected will be set in stone. If you wish to create 'Project Rain' capabilities for your cryptocurrency, you can fork the <a href='https://github.com/grctest/project-rain-site/'>Project-Rain Github repo</a> and create your own BOINC project. Alternatively, you could convert your cryptocurrency to Gridcoin/ETH/ETC/Steem/Bitshares assets to create a project rain on behalf of your cryptocurrency.
        </p>
        </div>
    ";
    if ($no_computing) {
        if (!$no_web_account_creation && !$disable_acct) {
            echo "
                <li> Want to potentially recieve 'project rain' across multiple crypto networks? <a href=\"create_account_form.php\">Create an account today</a>!
            ";
        } else {
            echo "<li> This project is not currently accepting new accounts. Something has gone wrong, contact CM!";
        }
    } else {
        echo "
        <div class=\"mainnav col-xs-12 col-sm-12 col-md-6\" style=\"padding:10px;\">
            <h2 class=headline>Join the project!</h2>
            <p>
                Want to potentially recieve 'project rain' across multiple crypto networks? <a href=\"create_account_form.php\">Create an account today</a>!
            </p>
            <p>
                In order for your Project-Rain <a href=\"http://boincfaq.mundayweb.com/index.php?view=192\">CPID</a> to match your BOINC project <a href=\"http://boincfaq.mundayweb.com/index.php?view=192\">CPID</a>s, you <b>must</b> add the Project-Rain BOINC project to your BOINC manager client alongside your other active BOINC projects, otherwise your CPIDs will not merge & you will be skipped for project rain! It's not our fault if you do not follow this step and miss out on a project rain.
            </p>
            <p>
                <a href=https://boinc.berkeley.edu/download.php>Download</a> and run BOINC.
            </p>
            <p>
                Once you've launched BOINC, Choose Add Project, enter https://www.project-rain.co.uk/rain/ into the URL field and log into the account you created (or create an account at this point via the BOINC manager).
            </p>
            <p>
                If you have any problems with project-rain, do not hesitate to contact CM via email/IRC/Steem.
            </p>
        ";
    }
    echo "
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
            <li><a href=\"profile_menu.php\">".tra("Profiles")."</a></li>
        ";
    }
    echo "
    ";
    echo "
            <li>
                <a href=\"user_search.php\">User search</a>
            </li>
            <li>
                <a href=\"stats.php\">Project statistics</a></li>
            </li>
            <li>
                <a href=\"https://project-rain.co.uk/rain/stats/\">Project Rain XML files for aiding execution of 'project rain' (matches CPID:address/account)</a></li>
            </li>
            <li>
                <a href=language_select.php>Languages</a>
            </li>
            <li>
                <a href=\"info.php\">".tra("Read our rules and policies")."</a>
            </li>
        </ul>
        </div>
        </div>
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
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" integrity=\"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u\" crossorigin=\"anonymous\">
    <script src=\"https://code.jquery.com/jquery-3.1.0.min.js\"></script>
    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\" integrity=\"sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa\" crossorigin=\"anonymous\"></script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-82680050-1', 'auto');
      ga('send', 'pageview');
    </script>
";
include 'schedulers.txt';
    if (defined("SHORTCUT_ICON")) {
        echo '<link rel="icon" type="image/x-icon", href="'.SHORTCUT_ICON.'"/>'
;
    }
echo "
    </head><body>
        <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-xs-6\"><img src=\"img/project-rain.png\" alt=\"Project-Rain\" /><br/>".PROJECT."</div>
            <div class=\"col-xs-6\">
                <div class=\"row\">
                    <div class=\"col-xs-12\" style=\"text-align:center;\">
                        <a href=\"login_form.php\"><button type=\"button\" class=\"btn btn-success\">Login</button></a>
                    </div>
                    <div class=\"col-xs-12\" style=\"text-align:center;\">
                        <a href=\"create_account_form.php\"><button type=\"button\" class=\"btn btn-info\">Register</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>"
;

if (!$stopped) {
    get_logged_in_user(false);
    //show_login_info();
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

//echo "
//    <tr><td class=news>
//   <h2 class=headline>News</h2>
//    <p>
//";
//include("motd.php");
//show_news(0, 5);
echo "
    </td>
    </tr></table>
";

page_tail_main();

?>
