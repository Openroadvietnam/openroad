<?php
/* 
 * Add the kudos page
 * 
 */
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);


ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

// add node properties
$newNode = (object) NULL;
$newNode->type = 'page';
$newNode->title = 'What are Kudos?';
$newNode->uid = 1;
$newNode->created = strtotime("now");
$newNode->changed = strtotime("now");
$newNode->status = 1;
$newNode->language = 'en';
$newNode->body = '<p><span lang="EN-GB" style="font-size: 10pt; font-family: Arial;">Kudos is a peer recognition program, a way to acknowledge the activity and reliability of registered members.</span></p>
<p><span lang="EN-GB" style="font-size: 10pt; font-family: Arial;">How  does it work? Each activity a registered user performs on the portal is  awarded a numerical value which is associated to the member&rsquo;s profile.  In other words: the higher the total number of Kudos a member has, the  more active he/ she is.</span></p>
<p><span lang="EN-GB" style="font-size: 10pt; font-family: Arial;">Kudos  do not only help to locate highly active members within  the community; they also serve to track down users with comments, cases  and posts highly rated by their peers. Kudos also affect the order of  the People&rsquo;s list, giving more visibility and recognition to active  members.<br />
Following is a list of the activities awarded with Kudos: </span></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table cellspacing="0" cellpadding="3" border="1" style="width: 550px; border: 1px solid;">
    <tbody>
        <tr>
            <td bgcolor="#cccccc" style="width: 100%;" colspan="2"><strong>Personal profile</strong></td>
        </tr>
        <tr>
            <td style="width: 80%;"><strong>Activity</strong></td>
            <td style="width: 20%;"><strong>Score</strong></td>
        </tr>
        <tr>
            <td style="width: 80%;">Register with complete personal profile (including all compulsory fields)</td>
            <td style="width: 20%;">100 kudos</td>
        </tr>
        <tr>
            <td style="width: 80%;">Update user profile</td>
            <td style="width: 20%;">20 kudos</td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<table cellspacing="0" cellpadding="3" border="1" style="width: 550px; border: 1px solid;">
    <tbody>
        <tr>
            <td bgcolor="#cccccc" style="width: 100%;" colspan="2"><strong>Ratings</strong></td>
        </tr>
        <tr>
            <td style="width: 80%;"><strong>Activity</strong></td>
            <td style="width: 20%;"><strong>Score</strong></td>
        </tr>
        <tr>
            <td style="width: 80%;">Rating a portal item (news, event, elibrary,...)</td>
            <td style="width: 20%;">2 kudos</td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<table cellspacing="0" cellpadding="3" border="1" style="width: 550px; border: 1px solid;">
    <tbody>
        <tr>
            <td bgcolor="#cccccc" style="width: 100%;" colspan="2"><strong>Propose</strong></td>
        </tr>
        <tr>
            <td style="width: 80%;"><strong>Activity</strong></td>
            <td style="width: 20%;"><strong>Score</strong></td>
        </tr>
        <tr>
            <td style="width: 80%;">Blog post or comment</td>
            <td style="width: 20%;">40 kudos</td>
        </tr>
        <tr>
            <td style="width: 80%;">Propose a portal item (News, events, elibrary,...)</td>
            <td style="width: 20%;">40 kudos</td>
        </tr>
    </tbody>
</table>
<table cellspacing="0" cellpadding="3" border="1" style="width: 550px; border: 1px solid;">
    <tbody>
        <tr>
            <td bgcolor="#cccccc" style="width: 100%;" colspan="2"><strong>Contributions</strong></td>
        </tr>
        <tr>
            <td width="77%" style="width: 80%;"><strong>Activity</strong></td>
            <td width="23%" style="width: 20%;"><strong>Score</strong></td>
        </tr>
        <tr>
            <td style="width: 80%;">Post a case</td>
            <td style="width: 20%;">200 kudos</td>
        </tr>
        <tr>
            <td style="width: 80%;">Update a case</td>
            <td style="width: 20%;">20 kudos</td>
        </tr>
    </tbody>
</table>
<table cellspacing="0" cellpadding="3" border="1" style="width: 550px; border: 1px solid;">
    <tbody>
        <tr>
            <td bgcolor="#cccccc" style="width: 100%;" colspan="2"><strong>Login</strong></td>
        </tr>
        <tr>
            <td width="76%" style="width: 80%;"><strong>Activity</strong></td>
            <td width="24%" style="width: 20%;"><strong>Score</strong></td>
        </tr>
        <tr>
            <td style="width: 80%;">
            <p>Login to the portal (with user name and password).<br />
            Maximum 10 kudos per week<br />
            Unless the last login is more than one month</p>
            </td>
            <td style="width: 20%;">10 kudos</td>
        </tr>
    </tbody>
</table>';
$newNode->teaser = '<p><span lang="EN-GB" style="font-size: 10pt; font-family: Arial;">Kudos is a peer recognition program, a way to acknowledge the activity and reliability of registered members.</span></p>
<p><span lang="EN-GB" style="font-size: 10pt; font-family: Arial;">How  does it work? Each activity a registered user performs on the portal is  awarded a numerical value which is associated to the member&rsquo;s profile.  In other words: the higher the total number of Kudos a member has, the  more active he/ she is.</span></p>';

// save node
node_save($newNode);
print_r($newNode);

/* Add the new cck to content type profile */
$sql = 'ALTER TABLE {content_type_profile} ADD COLUMN `field_completed_profile_value` int(11) default 40';
db_query($sql);