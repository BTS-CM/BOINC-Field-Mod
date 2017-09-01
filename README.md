# What is BOINC?

[BOINC](https://boinc.berkeley.edu/) (Berkeley Open Infrastructure for Network Computing) is an open-source volunteer oriented computing grid that combines the processing power of all individual users for the purposes of scientific research.

Berkeley Open Infrastructure for Network Computing (BOINC) is an open-source middleware system which supports volunteer and grid computing. Originally developed to support the SETI@home project, it became generalized as a platform for other distributed applications in areas as diverse as mathematics, linguistics, medicine, molecular biology, climatology, environmental science, and astrophysics, among others. BOINC aims to enable researchers to tap into the enormous processing resources of multiple personal computers around the world.

# What is this repo?

It's a far simpler version of project-rain with zero references to cryptocurrency.

---

Changed files:
# /db/boinc_db.cpp

```
void PROJECT_RAIN::clear() {memset(this, 0, sizeof(*this));}
```

```
void DB_PROJECT_RAIN::db_print(char* buf) {
    ESCAPE(bitshares);
    sprintf(buf,
        "id=%lu, "
        "bitshares='%s' ",
        id,
        bitshares
    );
    UNESCAPE(bitshares);
}

void DB_PROJECT_RAIN::db_parse(MYSQL_ROW& r) {
    int i=0;
    clear();
    id = atol(r[i++]);
    strcpy2(bitshares, r[i++]);
}
```

# /db/boinc_db.h

```
struct DB_USER_ : public DB_BASE, public PROJECT_RAIN {
public:
    DB_PROJECT_RAIN(DB_CONN* p=0);
    DB_ID_TYPE get_id();
    void db_print(char*);
    void db_parse(MYSQL_ROW &row);
    void operator=(PROJECT_RAIN& r) {PROJECT_RAIN::operator=(r);}
};
```

# /db/boinc_db_types.h

```
struct PROJECT_RAIN {
    DB_ID_TYPE id;
    char bitshares[254];
    void clear();
};
```

# /db/schema.sql

## Relevant readme at the top of schema.sql

```
create table project_rain (
    id                      integer         not null auto_increment,
    cross_project_id        varchar(254),
    authenticator           varchar(254),
    bitshares               varchar(254),
    primary key (id)
) engine=InnoDB;
```

```
 If you add/change anything, update
    boinc_db.cpp,h
    and if needed:
    py/Boinc/
        database.py
    html/
        inc/
            host.inc (host)
            db_ops.inc
        ops/
            db_update.php
        user/
            create_account_action.php (user)
            team_create_action.php (team)
    sched/
        db_dump.cpp (host, user, team)
        db_purge.cpp (workunit, result)

 Fields are documented in boinc_db.h */
 Do not replace this with an automatically generated schema */

 type is specified as InnoDB for most tables.
   Supposedly this gives better performance.
   The others (post, thread, profile) are myISAM
   because it supports fulltext index

 fields ending with id (but not _id) are treated specially
   by the Python code (db_base.py)
```

# In accordance with the schema.sql guidance, todo:

* investigate sched dump & purge
* add field to database.py
* host.inc, db_update

---

# /html/inc/boinc_db.cpp

```
class BoincRain {
    static $cache;
    static function lookup($clause) {
        $db = BoincDb::get();
        return $db->lookup('project_rain', 'BoincRain', $clause);
    }

    static function lookup_id_nocache($id) {
        $db = BoincDb::get();
        return $db->lookup_id($id, 'project_rain', 'BoincRain');
    }
    static function lookup_id($id) {
        if (!isset(self::$cache[$id])) {
            self::$cache[$id] = self::lookup_id_nocache($id);
        }
        return self::$cache[$id];
    }
    static function lookup_auth($auth) {
        $db = BoincDb::get();
        $auth = BoincDb::escape_string($auth);
        return self::lookup("authenticator='$auth'");
    }
    static function count($clause) {
        $db = BoincDb::get();
        return $db->count('project_rain', $clause);
    }
    static function max($field) {
        $db = BoincDb::get();
        return $db->max('project_rain', $field);
    }
    function update($clause) {
        $db = BoincDb::get();
        return $db->update($this, 'project_rain', $clause);
    }
    static function enum($where_clause, $order_clause=null) {
        $db = BoincDb::get();
        return $db->enum('project_rain', 'BoincRain', $where_clause, $order_clause);
    }
    static function enum_fields($fields, $where_clause, $order_clause=null) {
        $db = BoincDb::get();
        return $db->enum_fields(
            'project_rain', 'BoincRain', $fields, $where_clause, $order_clause
        );
    }
    static function insert($clause) {
        $db = BoincDb::get();
        $ret = $db->insert('project_rain', $clause);
        if (!$ret) return 0;
        return $db->insert_id();
    }
    function delete() {
        $db = BoincDb::get();
        $db->delete_aux('profile', "userid=$this->id");
        return $db->delete($this, 'project_rain');
    }
    static function sum($field) {
        $db = BoincDb::get();
        return $db->sum('project_rain', $field);
    }
    static function percentile($field, $clause, $pct) {
        $db = BoincDb::get();
        return $db->percentile('project_rain', $field, $clause, $pct);
    }
}
```

# /html/inc/db_ops.inc

```
function show_project_rain($project_rain) {
    start_table();
    row("ID", $project_rain->id);
    row("Bitshares", $project_rain->bitshares);
    end_table();
}
```

# /html/inc/user.inc

```
function show_project_rain_crypto_private($project_rain) {
    
    if ($project_rain->bitshares) {
        row1(tra("User Data"));
        if ($project_rain->bitshares) {
            row2(tra("<img src=\"img/bitshares.png\" alt=\"BTS\" /> <a href='https://bitshares.org'>Bitshares</a>"), $project_rain->bitshares);
        }
    }

    $url_tokens = url_tokens($project_rain->authenticator);
    row2(tra("Change"),
        "<a href=\"edit_project_rain_form.php?$url_tokens\">".tra("Edit your user data")."</a>"
    );
}

function show_project_rain_crypto_public($project_rain) {
    if ($project_rain->bitshares) {
        row1(tra("Cryptocurrency addresses/accounts"));
        if ($project_rain->bitshares) {
            row2(tra("<img src=\"img/bitshares.png\" alt=\"BTS\" /> <a href='https://bitshares.org'>Bitshares</a>"), $project_rain->bitshares);
        }
    }
}
```

# /html/inc/util.inc

```
$g_project_rain_details = null;
$got_project_rain_details = false;

function get_project_rain_details($must_be_logged_in=true) {
    global $g_project_rain_details, $got_project_rain_details;
    if ($got_project_rain_details) return $g_project_rain_details;

    check_web_stopped();
    $authenticator = null;
    if (isset($_COOKIE['auth'])) $authenticator = $_COOKIE['auth'];

    $authenticator = BoincDb::escape_string($authenticator);
    if ($authenticator) {
        $g_project_rain_details = BoincRain::lookup("authenticator='$authenticator'");
    }

    if ($must_be_logged_in && !$g_project_rain_details) {
        $next_url = '';
        if (array_key_exists('REQUEST_URI', $_SERVER)) {
            $next_url = $_SERVER['REQUEST_URI'];
            $n = strrpos($next_url, "/");
            if ($n) {
                $next_url = substr($next_url, $n+1);
            }
        }
        $next_url = urlencode($next_url);
        Header("Location: login_form.php?next_url=$next_url");
        exit;
    }
    $got_project_rain_details = true;
    return $g_project_rain_details;
}
```

# /html/inc/xml.inc

* 'show_user_xml' function modified to define $project_rain alongside user/show_hosts.
* Additional field added to the xml, enabling scraping of newly included data in a polite manner.

```
// $show_hosts is true only if $user is the logged-in user
//
function show_user_xml($user, $show_hosts, $project_rain) {
    $cpid = md5($user->cross_project_id.$user->email_addr);
    echo "<user>
    <id>$user->id</id>
    <cpid>$cpid</cpid>
    <create_time>$user->create_time</create_time>
    <name>".htmlspecialchars($user->name)."</name>
    <country>$user->country</country>
    <bitshares>$project_rain->bitshares</bitshares>
    <total_credit>$user->total_credit</total_credit>
    <expavg_credit>$user->expavg_credit</expavg_credit>
    <expavg_time>$user->expavg_time</expavg_time>
    <teamid>$user->teamid</teamid>
    <url>".htmlspecialchars($user->url)."</url>
    <has_profile>$user->has_profile</has_profile>
";
    if ($show_hosts) {
        $hosts = BoincHost::enum("userid=$user->id");
        echo "   <venue>$user->venue</venue>\n";
        foreach ($hosts as $host) {
            show_host_xml($host);
        }
    }
echo"</user>
";
}
```

* Similarly, project_rain defined in show_team_member function.
* Additional xml field included.

```
function show_team_member($user, $project_rain, $creditonly = false) {
    if ($creditonly && !$user->total_credit) { return; }
    $cpid = md5($user->cross_project_id.$user->email_addr);
    echo "<user>
    <id>$user->id</id>
    <cpid>$cpid</cpid>
    <total_credit>$user->total_credit</total_credit>";
    if (!$creditonly) {
        echo "    <create_time>$user->create_time</create_time>
    <name>".htmlspecialchars($user->name)."</name>
    <country>$user->country</country>
    <bitshares>$project_rain->bitshares</bitshares>
    <expavg_credit>$user->expavg_credit</expavg_credit>
    <expavg_time>$user->expavg_time</expavg_time>
    <url>".htmlspecialchars($user->url)."</url>
    <has_profile>$user->has_profile</has_profile>
";
    }
    echo "</user>
";
}
```

# /html/ops/team_export.php

Simply added a field to the export, untested & may be unable to access $project_rain table?

```
"<team>
   <name>".escape($team->name)."</name>
   <url>".escape($team->url)."</url>
   <type>$team->type</type>
   <name_html>".escape($team->name_html)."</name_html>
   <description>
".escape($team->description)."
    </description>
   <country>$team->country</country>
   <id>$team->id</id>
   <user_email_munged>$user_email_munged</user_email_munged>
   <user_name>".escape($user->name)."</user_name>
   <user_country>".escape($user->country)."</user_country>
   <user_postal_code>".escape($user->postal_code)."</user_postal_code>
   <user_bitshares>".escape($project_rain->bitshares)."</user_bitshares>
   <user_url>".escape($user->url)."</user_url>
</team>
"
```