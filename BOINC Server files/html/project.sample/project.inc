<?php

// This is a sample project file.
// Modify it to suit your project.
// Put your version in html/project/project.inc
// add tra() around visible strings to make them translatable
// see inc/translation.inc and https://boinc.berkeley.edu/trac/wiki/TranslateProject for Details

require_once("../inc/util.inc");

$master_url = parse_config(get_config(), "<master_url>");
define("PROJECT", "Project-Rain");
define("URL_BASE", $master_url);
define("IMAGE_PATH", "../user_profile/images/");
define("IMAGE_URL", "user_profile/images/");
define("PROFILE_PATH", "../user_profile/");
define("PROFILE_URL", "user_profile/");
define("LANGUAGE_FILE", "languages.txt");
define("STYLESHEET", "white.css");
//define("STYLESHEET2", "xxx.css");
define("FORUM_QA_MERGED_MODE", false); // Set to true to merge Message boards and Q&A section
define("COPYRIGHT_HOLDER", "Project-Rain owner.");
define("SYS_ADMIN_EMAIL", "contact@project-rain.co.uk");
define("UOTD_ADMIN_EMAIL", "contact@project-rain.co.uk");
    // who gets user of the day pool running low e-mails?
//define("MEMCACHE_SERVERS", "127.0.0.1:11211");

// Email addresses separated by pipe ( | ) that will receive user reported 
// offensive forum posts.
define("POST_REPORT_EMAILS", "contact@project-rain.co.uk");

// Enables PHP error messages in public Web RPCs
define("RPC_DEBUG", false);

// If you use PHPMailer, uncomment the following
// and complete the function definition based on your SMTP server
// (not all fields may be needed)
//
if (0) {
function make_php_mailer() {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    //$mail->Mailer = 'smtp';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->Username = "contact@project-rain.co.uk";
    $mail->Password = "xxx";
        // Google's application-specific password,
        // if you are using the 2-Step Verification: 16 characters, no spaces.
        // OR: Put here the regular Gmail password if you are not using the
        // 2-Step Verification with your Gmail account.
        // See https://support.google.com/accounts/answer/185833?hl=en";
    $mail->SetFrom('contact@project-rain.co.uk', 'CM');
    $mail->AddReplyTo("contact@project-rain.co.uk", "CM");
    $mail->From = "contact@project-rain.co.uk";
    return $mail;
}
}

function project_banner($title, $prefix) {
    // Put your project title and logo here
    // If you include any links, prepend URL with $prefix

    echo "
    <div class=\"page_title col-xs-12\"><img src=\"img/project-rain.png\" alt=\"Project-Rain\" />$title</div>
    
    <nav class=\"navbar navbar-default\">
      <div class=\"container-fluid\">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class=\"navbar-header\">
          <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\" aria-expanded=\"false\">
            <span class=\"sr-only\">Toggle navigation</span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
          </button>
          <a class=\"navbar-brand\" href=\"/index.html\">Project Rain</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
          <ul class=\"nav navbar-nav\">
            <li>
              <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">BOINC Projects <span class=\"caret\"></span></a>
               <ul class=\"dropdown-menu dropdown-menu-inverse\" role=\"menu\" style=\"text-align:center;\">
                <li role=\"presentation\" class=\"dropdown-header\" style=\"color:black;\">BOINC Projects</li>
                <li>
                    <a href=\"http://asteroids@home.net/boinc/\" style=\"color:#9A9899;\">Asteroids@Home</a>
                    <a href=\"http://atlasathome.cern.ch/\" style=\"color:#9A9899;\">ATLAS@Home</a>
                    <a href=\"http://burp.renderfarming.net/\" style=\"color:#9A9899;\">BURP</a>
                    <a href=\"http://boinc.thesonntags.com/collatz/\" style=\"color:#9A9899;\">Collatz Conjecture</a>
                    <a href=\"http://csgrid.org/csg/\" style=\"color:#9A9899;\">Citizens Science Grid</a>
                    <a href=\"http://www.cosmologyathome.org/\" style=\"color:#9A9899;\">Cosmology@Home</a>
                    <a href=\"http://einstein.phys.uwm.edu/\" style=\"color:#9A9899;\">Einstein@Home</a>
                    <a href=\"http://www.enigmaathome.net/\" style=\"color:#9A9899;\">Enigma@Home</a>
                    <a href=\"http://www.gpugrid.net/\" style=\"color:#9A9899;\">GPUGRID</a>
                    <a href=\"http://boinc.gorlaeus.net/\" style=\"color:#9A9899;\">Leiden Classical</a>
                    <a href=\"http://lhcathome.cern.ch/lhcathome/\" style=\"color:#9A9899;\">LHC@Home Classic</a>
                    <a href=\"http://milkyway.cs.rpi.edu/milkyway/\" style=\"color:#9A9899;\">Milkyway@Home</a>
                    <a href=\"http://mindmodeling.org/beta/\" style=\"color:#9A9899;\">MindModeling@Home</a>
                    <a href=\"http://www.moowrap.net/\" style=\"color:#9A9899;\">MooWrap</a>
                    <a href=\"http://escatter11.fullerton.edu/nfs/\" style=\"color:#9A9899;\">NFS@Home</a>
                    <a href=\"http://numberfields.as.edu/NumberFields/\" style=\"color:#9A9899;\">NumbersField@Home</a>
                    <a href=\"http://boinc.fzk.de/poem/\" style=\"color:#9A9899;\">POEM@Home</a>
                    <a href=\"http://www.primegrid.com/\" style=\"color:#9A9899;\">PrimeGrid</a>
                    <a href=\"https://boinc.bakerlab.org/\" style=\"color:#9A9899;\">Rosetta@Home</a>
                    <a href=\"http://sat.isa.ru/pdsat/\" style=\"color:#9A9899;\">SAT@Home</a>
                    <a href=\"http://setiathome.berkeley.edu/\" style=\"color:#9A9899;\">SETI@Home</a>
                    <a href=\"http://szdg.lpds.sztaki.hu/szdg/\" style=\"color:#9A9899;\">Sztaki desktop grid</a>
                    <a href=\"http://pogs.theskynet.org/pogs/\" style=\"color:#9A9899;\">SkyNet POGs</a>
                    <a href=\"http://universeathome.pl/universe/\" style=\"color:#9A9899;\">Universe@Home</a>
                    <a href=\"http://yafu.myfirewall.org/yafu/\" style=\"color:#9A9899;\">YAFU</a>
                    <a href=\"http://lhcathome2.cern.ch/vLHCathome/\" style=\"color:#9A9899;\">vLHC@Home</a>
                    <a href=\"http://www.rechenkraft.net/yoyo/\" style=\"color:#9A9899;\">World Community Grid</a>
                    <a href=\"http://www.rechenkraft.net/yoyo/\" style=\"color:#9A9899;\">YOYO@Home</a>
                </li>
              </ul>
            </li>
            <li>
                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-expanded=\"false\">BOINC Community <span class=\"caret\"></span></a>
                <ul class=\"dropdown-menu dropdown-menu-inverse\" role=\"menu\" style=\"text-align:center;\">
                    <li role=\"presentation\" class=\"dropdown-header\" style=\"color:black;\">BOINC Community</li>
                    <li>
                        <a href=\"http://formula-boinc.org/\" style=\"color:#9A9899;\"><i class=\"fa fa-arrow-circle-right\" style=\"color:#707C34;\"></i> Formula BOINC</a>
                    </li>
                    <li>
                        <a href=\"http://uotd.org/\" style=\"color:#9A9899;\"><i class=\"fa fa-arrow-circle-right\" style=\"color:#707C34;\"></i> User of the Day</a>
                    </li>
                    <li>
                        <a href=\"https://boinc.berkeley.edu/dev/\" style=\"color:#9A9899;\"><i class=\"fa fa-arrow-circle-right\" style=\"color:#707C34;\"></i> BOINC Forum</a>
                    </li>
                    <li>
                        <a href=\"http://hardforum.com/index.php\" style=\"color:#9A9899;\"><i class=\"fa fa-arrow-circle-right\" style=\"color:#707C34;\"></i> [H]ard|Forum</a>
                    </li>
                    <li>
                        <a href=\"http://www.rechenkraft.net/\" style=\"color:#9A9899;\"><i class=\"fa fa-arrow-circle-right\" style=\"color:#707C34;\"></i> Rechenkraft.net</a>
                    </li>
                    <li>
                        <a href=\"http://desktopgridfederation.org/\" style=\"color:#9A9899;\"><i class=\"fa fa-arrow-circle-right\" style=\"color:#707C34;\"></i> IDGF</a>
                    </li>
                    <li>
                        <a href=\"http://www.seti-germany.de/\" style=\"color:#9A9899;\"><i class=\"fa fa-arrow-circle-right\" style=\"color:#707C34;\"></i> Seti-Germany</a>
                    </li>
                    <li>
                        <a href=\"http://www.setiusa.us\" style=\"color:#9A9899;\"><i class=\"fa fa-arrow-circle-right\" style=\"color:#707C34;\"></i> SETI.USA</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-expanded=\"false\">Gridcoin <span class=\"caret\"></span></a>
                <ul class=\"dropdown-menu dropdown-menu-inverse\" role=\"menu\" style=\"text-align:center;\">
                    <li role=\"presentation\" class=\"dropdown-header\" style=\"color:black;\">Gridcoin Community</li>
                    <li>
                        <a href=\"https://gridcoin.us\" style=\"color:#9A9899;\">
                            <i class=\"fa fa-home\" style=\"color:#707C34;\"></i> Home page
                        </a>
                        <a href=\"https://www.fb.com/gridcoins\" style=\"color:#9A9899;\">
                            <i class=\"fa fa-facebook\" style=\"color:#707C34;\"></i> Facebook
                        </a>
                        <a href=\"https://cryptocointalk.com/forum/464-gridcoin-grc/\" style=\"color:#9A9899;\">
                            <i class=\"fa fa-users\" style=\"color:#707C34;\"></i> Forum
                        </a>
                        <a href=\"https://github.com/gridcoin/Gridcoin-Research\" style=\"color:#9A9899;\">
                            <i class=\"fa fa-github\" style=\"color:#707C34;\"></i> Github
                        </a>
                        <a href=\"https://twitter.com/GridcoinNetwork\" style=\"color:#9A9899;\">
                            <i class=\"fa fa-twitter\" style=\"color:#707C34;\"></i> Twitter
                        </a>
                        <a href=\"https://www.reddit.com/r/gridcoin\" style=\"color:#9A9899;\">
                            <i class=\"fa fa-reddit\" style=\"color:#707C34;\"></i> Reddit
                        </a>
                        <a href=\"https://steemit.com/active/gridcoin\" style=\"color:#9A9899;\">
                            <i class=\"fa fa-newspaper-o\" style=\"color:#707C34;\"></i> Steemit
                        </a>
                        <a href=\"https://soundcloud.com/gridcoin-community-hangouts/\" style=\"color:#9A9899;\">
                            <i class=\"fa fa-soundcloud\" style=\"color:#707C34;\"></i> Soundcloud
                        </a>
                        <a href=\"http://wiki.gridcoin.us/Main_Page\" style=\"color:#9A9899;\"><i class=\"fa fa-wikipedia-w\" style=\"color:#707C34;\"></i> Gridcoin Wiki</a>
                    </li>
                    <li role=\"presentation\" class=\"dropdown-header\" style=\"color:black;\">Exchanges</li>
                    <li>
                        <a href=\"https://holytransaction.com/\" style=\"color:#9A9899;\"><i class=\"fa fa-credit-card\" style=\"color:#707C34;\"></i> HolyTransactions</a>
                        <a href=\"https://poloniex.com/exchange/btc_grc\" style=\"color:#9A9899;\"><i class=\"fa fa-credit-card\" style=\"color:#707C34;\"></i> Poloniex</a>
                        <a href=\"https://c-cex.com/?p=grc-btc\" style=\"color:#9A9899;\"><i class=\"fa fa-credit-card\" style=\"color:#707C34;\"></i> C-Cex</a>
                        <a href=\"https://bittrex.com/Market/Index?MarketName=BTC-GRC\" style=\"color:#9A9899;\"><i class=\"fa fa-credit-card\" style=\"color:#707C34;\"></i> Bittrex</a>
                        <a href=\"https://www.bitsquare.io\" style=\"color:#9A9899;\"><i class=\"fa fa-credit-card\" style=\"color:#707C34;\"></i> BitSquare</a>
                    </li>
                    <li role=\"presentation\" class=\"dropdown-header\" style=\"color:black;\">Exchange Stats</li>
                    <li>
                        <a href=\"http://coinmarketcap.com/currencies/gridcoin/\" style=\"color:#9A9899;\"><i class=\"fa fa-line-chart\" style=\"color:#707C34;\"></i> Coinmarketcap</a>
                        <a href=\"https://www.coingecko.com/en/coins/gridcoin-research\" style=\"color:#9A9899;\"><i class=\"fa fa-line-chart\" style=\"color:#707C34;\"></i> CoinGecko</a>
                        <a href=\"https://www.cryptocompare.com/coins/grc/overview\" style=\"color:#9A9899;\"><i class=\"fa fa-line-chart\" style=\"color:#707C34;\"></i> Cryptocompare</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-expanded=\"false\">Bitshares <span class=\"caret\"></span></a>
                <ul class=\"dropdown-menu dropdown-menu-inverse\" role=\"menu\" style=\"text-align:center;\">
                    <li role=\"presentation\" class=\"dropdown-header\" style=\"color:black;\">Community links</li>
                    <li>
                        <a href=\"https://bitshares.org\" style=\"color:#9A9899;\"><i class=\"fa fa-home\" style=\"color:#707C34;\"></i> Home page</a>
                    </li>
                    <li>
                        <a href=\"https://www.facebook.com/officialbitshares/\" style=\"color:#9A9899;\">
                            <i class=\"fa fa-facebook\" style=\"color:#707C34;\"></i> Facebook
                        </a>
                    </li>
                    <li>
                        <a href=\"https://bitsharestalk.org/\" style=\"color:#9A9899;\"><i class=\"fa fa-users\" style=\"color:#707C34;\"></i> Forum</a>
                    </li>
                    <li>
                        <a href=\"https://github.com/bitshares/bitshares-2\" style=\"color:#9A9899;\">
                            <i class=\"fa fa-github\" style=\"color:#707C34;\"></i> Github
                        </a>
                    </li>
                    <li>
                        <a href=\"https://twitter.com/bitshares\" style=\"color:#9A9899;\">
                            <i class=\"fa fa-twitter\" style=\"color:#707C34;\"></i> Twitter
                        </a>
                    </li>
                    <li>
                        <a href=\"https://www.reddit.com/r/bitshares\" style=\"color:#9A9899;\">
                            <i class=\"fa fa-reddit\" style=\"color:#707C34;\"></i> Reddit
                        </a>
                    </li>
                    <li>
                        <a href=\"https://steemit.com/active/bitshares\" style=\"color:#9A9899;\">
                            <i class=\"fa fa-newspaper-o\" style=\"color:#707C34;\"></i> Steemit
                        </a>
                    </li>
                    <li>
                        <a href=\"https://soundcloud.com/beyond-bitcoin-hangouts\" style=\"color:#9A9899;\">
                            <i class=\"fa fa-soundcloud\" style=\"color:#707C34;\"></i> BeyondBitcoin
                        </a>
                    </li>
                    <li role=\"presentation\" class=\"dropdown-header\" style=\"color:black;\">Web wallets</li>
                    <li>
                        <a href=\"https://bitshares.openledger.info/\" style=\"color:#9A9899;\"><i class=\"fa fa-credit-card\" style=\"color:#707C34;\"></i> Openledger</a>
                    </li>
                    <li>
                        <a href=\"https://secure.freedomledger.com/\" style=\"color:#9A9899;\"><i class=\"fa fa-credit-card\" style=\"color:#707C34;\"></i> Freedomledger</a>
                    </li>
                    <li role=\"presentation\" class=\"dropdown-header\" style=\"color:black;\">Block explorer</li>
                    <li>
                        <a href=\"https://cryptofresh.com/\" style=\"color:#9A9899;\"><i class=\"fa fa-bolt\" style=\"color:#707C34;\"></i> Cryptofresh</a>
                    </li>
                    <li role=\"presentation\" class=\"dropdown-header\" style=\"color:black;\">Exchange Stats</li>
                    <li>
                        <a href=\"http://coinmarketcap.com/currencies/bitshares/\" style=\"color:#9A9899;\"><i class=\"fa fa-line-chart\" style=\"color:#707C34;\"></i> Coinmarketcap</a>
                        <a href=\"https://www.coingecko.com/en/coins/bitshares\" style=\"color:#9A9899;\"><i class=\"fa fa-line-chart\" style=\"color:#707C34;\"></i> CoinGecko</a>
                        <a href=\"https://www.cryptocompare.com/coins/bts/overview\" style=\"color:#9A9899;\"><i class=\"fa fa-line-chart\" style=\"color:#707C34;\"></i> Cryptocompare</a>
                    </li>
                </ul>
            </li>

          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    ";
}

function project_footer($show_return, $show_date, $prefix) {
    // If you include any links, prepend URL with $prefix
    echo "<br><hr noshade size=1><center>";
    if ($show_return) {
        echo "<a href=".$prefix."index.php>".tra("Main page")."</a> &middot; <a href=".$prefix."home.php>".tra("Your account")."</a> &middot; <a href=".$prefix."forum_index.php>".tra("Message boards")."</a><br>\n";
    }
    echo "<br><br>".tra("Copyright")." &copy; ".gmdate("Y ").COPYRIGHT_HOLDER."</center>\n";
    if ($show_date) {
        $t = time_str(time());
        echo "<p class=\"text-muted\">".tra("Generated")." $t</p>\n";
    }
}

// Authorize access to administrative pages.
// You can check for login, IP address, or whatever you want.
//
function auth_ops_example() {
    // if running from cmdline, skip checks
    //
    if (!$_SERVER['REMOTE_ADDR']) {
        return;
    }

    // example: require login as a particular user (id 1 in this case)
    //
    if (0) {
        auth_ops_userid(array(1));
        return;
    }

    // example: require that logged-in user have ADMIN or DEV flags
    // set in their forum_prefs.privilege
    //
    if (0) {
        auth_ops_privilege();
        return;
    }
}

function show_profile_heading1() {
    return tra("Your personal background.");
}

function show_profile_question1() {
    return tra("Tell us about yourself. You could tell us where you're from, your age, occupation, hobbies, or anything else about yourself.");
}

function show_profile_heading2() {
    return tra("Your opinions about %1", PROJECT);
}

function show_profile_question2() {
    return tra("Tell us your thoughts about %1<ol>
    <li>Why do you run %1?
    <li>What are your views about the project?
    <li>Any suggestions?
    </ol>", PROJECT);
}

function project_workunit($wu){
    // shown in the workunit page
}

function project_user_summary($user){
    // shown in the user summary page
}

function project_user_page_private($user){
    // shown in the private account page
}

if (0) {

// show project-specific credit on user/team pages
//
function show_app_credit_user($user, $app_name, $appids) {
    $t = 0;
    $a = 0;
    $n = 0;
    foreach ($appids as $appid) {
        $cu = BoincCreditUser::lookup(
            "userid=$user->id and appid=$appid and credit_type=0"
        );
        if ($cu) {
            $t += $cu->total;
            $a += $cu->expavg;
            $n += $cu->njobs;
        }
    }
    row2("$app_name credit",
        format_credit_large($t)." total, ".
        format_credit($a)." average".
        " ($n tasks)"
    );
}
function show_app_credit_team($team, $app_name, $appids) {
    $t = 0;
    $a = 0;
    $n = 0;
    foreach ($appids as $appid) {
        $ct = BoincCreditTeam::lookup(
            "teamid=$team->id and appid=$appid and credit_type=0"
        );
        if ($ct) {
            $t += $ct->total;
            $a += $ct->expavg;
            $n += $ct->njobs;
        }
    }
    row2("$app_name credit",
        format_credit_large($t)." total, ".
        format_credit($a)." average".
        " ($n tasks)"
    );
}

// a list of "sub-projects", used in the display of per-app credit and badges.
// A subproject is:
// - a set of 1 or more apps; an app can belong to at most 1 subproject.
// - a name, shown on the web site
// - a short name, used in badge names.  Don't use "total".
//
$sub_projects = array(
    array("name" => "Remote Test", "short_name" => "RT", "appids" => array(16)),
    array("name" => "Uppercase", "short_name" => "UC", "appids" => array(1, 25)),
);

function project_user_credit($user){
    global $sub_projects;
    foreach ($sub_projects as $sp) {
        show_app_credit_user($user, $sp["name"], $sp["appids"]);
    }
}

function project_team_credit($team) {
    global $sub_projects;
    foreach ($sub_projects as $sp) {
        show_app_credit_team($team, $sp["name"], $sp["appids"]);
    }
}

}   // if(0)

function project_forum_post_rules() {
    // additional forum post rules
    return "";
}

?>
