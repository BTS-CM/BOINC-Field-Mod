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

* Investigate sched dump & purge
* Add fields to database.py
* db_update --> Does this help upgrade existing BOINC projects SQL databases to include new tables?

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
        echo "   <venue>$user->venue</venue>";
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

# /html/user/am_get_info.php

```
$project_rain = BoincRain::lookup_auth($auth);
$bitshares = urlencode($project_rain->bitshares);
```

Added to $ret:
```
    <bitshares>$bitshares</bitshares>
```

# /html/user/am_set_info.php

```
$bitshares = post_str("bitshares", true);
```

```
$bitshares = BoincDb::escape_string($bitshares);
```

```
if ($bitshares) {
    $query .= " bitshares='$bitshares', ";
}
```

# /html/user/delete_account.php

Need to be able to delete the added data from the DB when deleting an account.

```
$retval = $user->update("email_addr='$x', authenticator='$x', name='', country='', postal_code='', bitshares='', has_profile=0");
```

# /html/user/show_user.php

```
$project_rain = get_project_rain_details();
```

```
show_user_xml($user, $show_hosts, $project_rain);
```

```
show_rain_public($project_rain);
```

# Custom files (no need to edit existing files)

* /html/user/edit_project_rain_action.php
* /html/user/edit_project_Rain_form.php

---

# /py/BOINC/database.py

## Reference User section

```
class User(DatabaseObject):
    _table = DatabaseTable(
        table = 'user',
        columns = [ 'create_time',
                    'email_addr',
                    'name',
                    'authenticator',
                    'country',
                    'postal_code',
                    'total_credit',
                    'expavg_credit',
                    'expavg_time',
                    'global_prefs',
                    'project_prefs',
                    'teamid',
                    'venue',
                    'url',
                    'send_email',
                    'show_hosts',
                    'posts',
                    'seti_id',
                    'seti_nresults',
                    'seti_last_result_time',
                    'seti_total_cpu',
                    'signature',
                    'has_profile',
                    'cross_project_id',
                    'passwd_hash',
                    'email_validated',
                    'donated'
                    ])
```

## Guesstimated implementation

### Note:

* Change: 'project_rain' to the db name defined in the '/db/schema.sql'
* Change: 'bitshares' to the rebranded term.

```
class Project_Rain(DatabaseObject):
    _table = DatabaseTable(
        table = 'project_rain',
        columns = [ 'authenticator',
                    'cross_project_id',
                    'bitshares'
                    ])
```

---

# /sched/db_dump.cpp

## DbDump Readme

* [BOINC wiki: DbDump](https://boinc.berkeley.edu/trac/wiki/DbDump)

```
"This program generates XML files containing project statistics."
"It should be run once a day as a periodic task in config.xml."
"For more info, see https://boinc.berkeley.edu/trac/wiki/DbDump"
"Usage: %s [options]"
"Options:"
"    --dump_spec filename          Use the given config file (use ../db_dump_spec.xml)"
"    [-d N | --debug_level]        Set verbosity level (1 to 4)"
"    [--db_host H]                 Use the DB server on host H"
"    [--retry_period H]            When can't connect to DB, retry after N sec instead of terminating"
"    [-h | --help]                 Show this"
"    [-v | --version]              Show version information",
```

## DbDump write_user reference segment

```
void write_user(USER& user, FILE* f, bool /*detail*/) {
    char buf[1024];
    char cpid[MD5_LEN];

    char name[2048], url[2048];
    xml_escape(user.name, name, sizeof(name));
    xml_escape(user.url, url, sizeof(url));

    safe_strcpy(buf, user.cross_project_id);
    safe_strcat(buf, user.email_addr);
    md5_block((unsigned char*)buf, strlen(buf), cpid);

    fprintf(f,
        "<user>"
        " <id>%lu</id>"
        " <name>%s</name>"
        " <country>%s</country>"
        " <create_time>%d</create_time>"
        " <total_credit>%f</total_credit>"
        " <expavg_credit>%f</expavg_credit>"
        " <expavg_time>%f</expavg_time>"
        " <cpid>%s</cpid>",
        user.id,
        name,
        user.country,
        user.create_time,
        user.total_credit,
        user.expavg_credit,
        user.expavg_time,
        cpid
    );
    if (strlen(user.url)) {
        fprintf(f,
            " <url>%s</url>",
            url
        );
    }
    if (user.teamid) {
        fprintf(f,
            " <teamid>%lu</teamid>",
            user.teamid
        );
    }
    if (user.has_profile) {
        fprintf(f,
            " <has_profile/>"
        );
    }
    fprintf(f,
        "</user>"
    );
}
```

## Guesstimated rain implementation

## Brainstorming how to change this file

* Create rain equivelant of write_user
  * 'USER& user' -> Custom equivelant?
  * Able to import 'USER& user' AND 'RAIN& rain', or will we only be able to export from one table at a time? No joins?
    * We may need to include more info in our schema, such as RAC and TotalCredit, if we cannot import 2 table contents..
* Reducing the size of the xml extract by minimizing the field names.
  * user -> u
  * total_credit -> trac
  * expavg_credit -> rac
* If XML validation isn't being performed during the dump, we could potentially switch to an alternative to xml to further reduce the filesize of dumped files. JSON for example.
* We check that the user has provided the information we want to scrape, if they haven't then they aren't included in the xml dump - further reducing the file size.


```
void write_rain(RAIN& rain, FILE* f, bool /*detail*/) {
    char buf[1024];
    char cpid[MD5_LEN];
    safe_strcpy(buf, user.cross_project_id);
    safe_strcat(buf, user.email_addr);
    md5_block((unsigned char*)buf, strlen(buf), cpid);

    if (user.rain) {
    fprintf(f,
        "<u>"
        " <id>%lu</id>"
        " <trac>%f</trac>"
        " <rac>%f</rac>"
        " <cpid>%s</cpid>"
        " <rain>%s</rain>"
        "</u>",
        user.id,
        user.total_credit,
        user.expavg_credit,
        cpid,
        rain
    );
    }
}
```

---

# /sched/db_dump_spec.xml

Added the following:

```
    <enumeration>
        <table>rain</table>
        <filename>rain</filename>
        <output>
            <compression>gzip</compression>
        </output>
    </enumeration>
```
