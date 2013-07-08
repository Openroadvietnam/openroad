<?php
/* 
 * Update help (table node, node_revision & content_type_contexthelp are filtered)
 * 
 */
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);


ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);


// array with all new help
// replace line breaks in online help body with ""
$help_array = array();

// Where are the context help information stored ?
// - "title" is stored in "node" and "node_revisions"
// - "body" is stored in "node_revisions"
// - "url" is stored in "content_type_contexthelp"
// - "tid" is stored in "term_node"
// - "op" content helps the script know what kind of operation must be done :
//   - 'insert' to create a new node
//   - 'update with title' to update an existing node, looking for a node having the same title
//   - 'update with url' to update an existing node, looking for a node having the same url

// node 96
$help_array[] = array( 'title' => 'General information',
                       'body' => '<div class="field-content"><h3>What is displayed in this page for non-registered users ?</h3><p>At top, you\'ll find some links to</p><p>- login (if an account already exists) or to register</p><p>- search information in the whole site</p><p>There\'s a main menue that allows any user to check all different kind  of contents on the site (for more details about them, there is a  specific section for each of them).</p><p>Following infos are then available on the homepage:</p><p>- an introduction message explaining the aim of the ISA-ICP site</p><p>- the last content promoted as an Editor\'s choice</p><p>- a list of upcoming events</p><p>- a list of latest news (four of them are animated)</p><p>- a list of the latest blog posts</p><p>- a list of the latest forums</p><p>And finally at bottom of this homepage, some links to external sites</p><h3>What is displayed in this page for non-registered users ?</h3></div><p>The homepage is quite the same as for non-registered users.&nbsp;The only  difference is that the user has access at top to its account and  dashboard, and at bottom to some quick links allowing him to do actions  like proposing a news item or a new community and s.o.</p>',
                       'url' => 'homepage',
                       'tid' => '186',
                       'op' => 'update with title');

// node 70
$help_array[] = array( 'title' => 'View of a community',
                       'body' => '<h3>What can I find on this page?</h3><div>On a community\'s page, you can find the following:</div><div>&nbsp;</div><div>At top left:</div><div>- generic information about the community (title, logo, creation date, owner and taxonomies)</div><div>- a link to join the community or, if you are member, the information &quot;I\'m a member&quot;</div><div>&nbsp;</div><div>At top right:</div><div>- links to all content types related to the community (Blogs, Documents, Forums and Wikis)</div><div>- a link to member\'s list</div><div>- a link to highlight the community</div><div>- (for facilitator) links to add or manage members</div><div>&nbsp;</div><div>In the main section:</div><div>- a description of the community</div><div>- a list of the 3 last news &amp; blogs published or highlighted in this community</div><div>- a list of the 3&nbsp;last topics published or highlighted in this community</div><div>- a list of the 3 last highlighted communities</div><div>- a list of the 3 last highlighted events</div><div>- a list of the 3 last documents &amp; wikis published or highlighted in this community</div><div>- a list of the 3 last members joining the community</div><div>- a list of the 6 last facilitators managing the community</div><h3>News &amp; blog posts</h3><div>News are necessarily created in the common area, so if they appear in the community, they have been highlighted (see yellow marker at right).</div><div>To view its content, you just need to click on the news title.&nbsp;</div><div>&nbsp;</div><div>Blog posts can belong to the community, and can have been highlighted from common area.&nbsp;</div><div>To distinguish them, a yellow marker is at right.</div><div>To distinguish news from blog posts, a blue double quote symbol is shown before blog description.</div><div>&nbsp;</div><div>In this section of the community, you can only create blog posts.&nbsp;For that, click on the &quot;create blog post&quot; link to run the creation form.</div><div>By clicking on the &quot;view all&quot; link, a page listing all news &amp; blogs is displayed.</div><h3>Forums</h3><div>The &quot;latest forums&quot; block shows the latest topics created or highlighted in this community.</div><div>To create a new topic belonging to one of the predefined forums, click on link &quot;create topic&quot;.</div><div>When clicking on link &quot;view all&quot;, all topics will be shown for each of the predefined forums.</div><div>Default forums are :</div><div>- Help and support</div><div>- Implementation and practises</div><div>- Known issues</div><div>- Off-topics posts</div><div>- Open discussions</div><h3>Wiki section</h3><div>The wiki page block shows the latest wiki pages, with possibility  to reach the wiki list page (&quot;view all&quot; link). By clicking on wiki page  title, you can reach the wiki page content.</div><div>Members of the community can also create a new wiki page by  clicking on link &quot;create a wiki&quot;.&nbsp;In this case, a new page showing the  creation form is displayed.</div><h3>Highlighted contents</h3><h4>What is a highlight?</h4><div>The list of highlighted contents shows all items members of the community have marked as highlights. These items come from the general area (like news items) or from non-moderated communities. A highlight can be any type of contents: news article, wiki, blog post, even another community.</div><div>&nbsp;</div><h4>Highlighting contents</h4><div>To highlight an item, go to the item\'s page. If you\'re a member of at least one group, you\'ll see a link saying: &quot;Highlight contents&quot;. Clicking this will bring up a list of all communities you\'re a member of. To highlight an item, simply check the box in front of the community you want to highlight it for, and click the &quot;Highlight contents&quot; button.</div><div>&nbsp;</div><h4>Removing a highlight</h4><div>Once an item is highlighted, the person who highlighted it, can remove the highlight from the item\'s page, the same way he highlighted it. If you try to remove a highlight you yourself didn\'t add, nothing will happen. The highlight will still be there.</div><div>Community facilitators can click the &quot;remove&quot; link in the list of highlights, and it\'ll be removed.</div>',
                       'url' => 'community/%/home',
                       'tid' => '177',
                       'op' => 'update with url');

// node 329
$help_array[] = array( 'title' => 'View a software',
                       'body' => '<div class="field-content"><div class="field field-revisions-body"><h3>What can I find on this page?</h3><div>On an OSS&nbsp;project\'s page, you can find the following:</div><div>&nbsp;</div><div>At top left:</div><ul>    <li>generic information about the software (title, logo, creation date, owner and some generic taxonomies)</li>    <li>a link to download the last release project and, if you are member, the information &quot;I\'m a member&quot;</li></ul><div>At top right:</div><ul>    <li>links to all content types related to the projects (News &amp; Blogs, Documents, Forums, Wikis and Issues)</li>    <li>a link to member\'s list</li>    <li>a link to leave the project</li>    <li>a link to highlight the project</li>    <li>a link to add the project to the list of projects you use, and the current number of users</li></ul><div>In the main section:</div><ul>    <li>a description of the software project</li>    <li>main information about the project (features, future plans, ...)</li>    <li>a list of the 5 last items published or highlighted in this project</li>    <li>a list of the 5 last documents published or highlighted in this community</li>    <li>a list of the 3 last highlighted events</li>    <li>a list of the 3 last members joining the community</li>    <li>a list of the 3 last issues</li>    <li>a list of projects required by the current one</li></ul></div></div>',
                       'url' => 'software/%/home',
                       'tid' => '568',
                       'op' => 'update with url');

// node 711
$help_array[] = array( 'title' => 'Asset view',
                       'body' => '<h3 style="margin-top: 1em; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-size: 17px; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; line-height: 25px; color: rgb(65, 81, 122); background-position: initial initial; background-repeat: initial initial; ">What can I find on this page?</h3><div style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-size: 13px; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; background-position: initial initial; background-repeat: initial initial; ">On an asset project\'s page, you can find the following:</div><div style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-size: 13px; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; background-position: initial initial; background-repeat: initial initial; ">&nbsp;</div><div style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-size: 13px; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; background-position: initial initial; background-repeat: initial initial; ">At top left:</div><ul>    <li>generic information about the asset (title, logo, creation date, owner and some generic taxonomies)</li>    <li>a link to download the last release project and, if you are member, the information &quot;I\'m a member&quot;</li></ul><div style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-size: 13px; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; background-position: initial initial; background-repeat: initial initial; ">At top right:</div><ul>    <li>links to all content types related to the projects (News &amp; Blogs, Documents, Forums, Wikis and Issues)</li>    <li>a link to member\'s list</li>    <li>a link to leave the project</li>    <li>a link to highlight the project</li>    <li>a link to add the project to the list of projects you use, and the current number of users</li></ul><p>In the main section:</p><ul>    <li>a description of the asset project</li>    <li>a list of the 5 last items published or highlighted in this project</li>    <li>a list of the 5 last documents published or highlighted in this community</li>    <li>a list of the 3 last highlighted events</li>    <li>a list of the 3 last members joining the community</li>    <li>a list of the 3 last issues</li></ul><p>&nbsp;</p>',
                       'url' => 'asset/%/home',
                       'tid' => '568',
                       'op' => 'update with url');

// node 1007 ?
$select_term = "SELECT tid FROM `{term_node}` WHERE vid = %d AND name = '%s'";
$select_term = db_result(db_query($select_term,9,'Search'));
$help_array[] = array( 'title' => 'Search',
                       'body' => '<h3>What can I find on this page?</h3><p>A search allows users to find contents matching specific criteria.</p><p>It can be generic (searching one or more words in the contents) or with more advanced criteria (taxonomies domains and keywords, content types, authors...).</p><p>First you have to type some keywords in the search field then if a set of result is returned you can refine your search by selecting one or more of the avaible facets displayed over the search field.</p><p>It is possible to search inside attached documents to contents.</p>',
                       'url' => 'search%',
                       'tid' => $select_term,
                       'op' => 'insert');


// node 1006
$help_array[] = array( 'title' => 'Factsheet creation form',
                       'body' => '<h3>What is a factsheet ?</h3><p>A factsheet is necessarily created in the common area, it is describing an overall picture of the situation and progress for a country. Upload facilities to moderators, and download possibilities to users are available.</p><p class="MsoNormal"><span lang="EN-GB" style="mso-ansi-language:EN-GB"><o:p></o:p></span></p><h3>Creating factsheet</h3><p>A factsheet item can be created by clicking the &quot;Create a factsheet&quot; link under &quot;Quick actions&quot;, at the bottom right of the page.</p><h3>Displaying</h3><p>Factsheet will appear under the E-library menu item.</p>',
                       'url' => 'node/add/factsheet',
                       'tid' => '1430',
                       'op' => 'insert');
					   
// node 1008
$help_array[] = array( 'title' => 'Factsheet list page',
                       'body' => '<h3>What is displayed in this page ?</h3><p>All factsheet are displayed as a list showing how long it\'s been since the factsheet been created, the title and an extraction of its content.</p><h3>How is the list built ?</h3><p>Default sort option is based on the post date.&nbsp;So, when reaching this page, newest factsheet are shown on top list.</p><p>User has the possibility to choose different sort option.&nbsp;By clicking on post-date or title link, he can choose to sort it differently (alphabetical for the \'title\' and chronological or reverse-chronological for the post-date).</p><h3>How to view a factsheet\'s content ?</h3><p>User just has to click on the title link to reach the factsheet\'s whole content.</p>',
                       'url' => 'elibrary/factsheets',
                       'tid' => '1430',
                       'op' => 'insert');

// node 1009
$help_array[] = array( 'title' => 'View of factsheet page',
                       'body' => '<h3>What is displayed in this page ?</h3><p><strong>In the header section:</strong></p><ul><li>Generic informations about the factsheet (title, logo, creation date, owner and some generic taxonomies).</li></ul><p><strong>In the main section:</strong></p><ul><li>A description of the factsheet;</li><li>The list of documentation (pdf, html).</li><li>Taxonomies factsheet topic and country&nbsp;</li></ul><h3>Highlighting factsheet</h3><p>Users belonging to at least one community can also highlight factsheet, so it appears in their community. To highlight a factsheet&nbsp;item, click on the &quot;Highlight this content&quot; link.</p><p>A list of all communities you\'re a member of appears. Check the box in front of each community you want to highlight the factsheet&nbsp;for and click on the &quot;highlight content&quot; button. If it\'s already been flagged, either by you or by somebody else, the box in front of the community\'s name will already be checked.</p><p>If you want to remove a highlight, simply uncheck the box in front of the community\'s name and click on the &quot;highlight content&quot; button.</p>',
                       'url' => 'factsheet/%',
                       'tid' => '1430',
                       'op' => 'insert');

//node 1035
$help_array[] = array( 'title' => 'E-Library list page',
                       'body' => '<h3>What is displayed in this page ?</h3><p>All documents, cases and factsheet are displayed as a list showing how long it\'s been since the content been created, the title and an extraction of its content.</p><h3>How is the list built ?</h3><p>Default sort option is based on the post date. So, when reaching this page, newest contents are shown on top list.</p><p>User has the possibility to choose different sort option. By clicking on post-date or title, he can choose to sort it differently (alphabetical for the \'title\' and chronological or reverse-chronological for the post-date).</p><h3>How to view a elibrary\'s content ?</h3><p>User just has to click on the title link to reach the item\'s whole content.</p>',
                       'url' => 'elibrary/all',
                       'tid' => '1430',
                       'op' => 'insert');

//node 1046
$help_array[] = array( 'title' => 'People list page',
                       'body' => '<h3>What is displayed in this page ?</h3><p>On this page, you can see a list of all users. Informations like user\'s name, compagny, domains and keywords. you have a glossary to sort users by their names.<br>You can also use filters to refine you search.</p>',
                       'url' => 'peoples/all',
                       'tid' => '1650',
                       'op' => 'insert');

//node 1103
$help_array[] = array( 'title' => 'View of an event',
                       'body' => '<div class="field-content"><div class="field field-revisions-body"><h3>What is displayed in this page ?</h3><div>All event information is available here such as :</div><ul>    <li>the event author and creation date</li>    <li>languages and domains corresponding to the event</li>    <li>the event rating</li>    <li>the event description</li>    <li>the country, scope and organisation type of the event</li>    <li>information whether the event is free or open to anyone</li>    <li>the start date and end date indicated in the local time of your profile</li>    <li>the city and Google Map location</li>    <li>the event organiser</li>    <li>the event website, portal and contact email</li>    <li>the event venue, full address, agenda, expected participants and fees description</li></ul><h3>Highlighting event</h3><p>Users belonging to at least one community can also highlight events, so  it appears in their community. To highlight an event, click on the  &quot;Highlight this content&quot; link.</p><p>A list of all events you\'re a member of appears. Check the box  in front of each community you want to highlight the event for and click  on the &quot;highlight content&quot; button. If it\'s already been flagged, either  by you or by somebody else, the box in front of the community\'s name  will already be checked.</p><p>If you want to remove a highlight, simply uncheck the box in front of  the community\'s name and click on the &quot;highlight content&quot; button.</p><h3>How to post a comment</h3><div>Click on link &quot;Add comment&quot; in the right section.&nbsp;This action brings the cursor inside the Comment field.</div><div>You can also click directly in this field.</div><div>After completing the comment, click on button &quot;Save&quot; to publish the comment.</div></div></div><p>&nbsp;</p>',
                       'url' => 'event/%',
                       'tid' => '1652',
                       'op' => 'insert');

//node 1104
$help_array[] = array( 'title' => 'Events calendar page',
                       'body' => '<h3>What is displayed in this page ?</h3><p>All events are displayed in a calendar. The currently displayed month is displayed on top of the calendar.&nbsp;You can switch to previous or next month calendar using the &quot;Prev&quot; and &quot;Next&quot; links.</p><h3>How to view an event content ?</h3><p>You can view an event content clicking on its name in the calendar.</p><p>&nbsp;</p>',
                       'url' => 'events/all',
                       'tid' => '1652',
                       'op' => 'insert');

//node 1168
$help_array[] = array( 'title' => 'Event creation form',
                       'body' => '<h3>What is an event ?</h3><p>An event is an activity with a start date and an end date. You may discuss some subjects with other people during an event. It can be visible for  everybody.</p><h3>Creating an event</h3><p>An event can be created by clicking the &quot;Propose an event&quot; link under &quot;Quick actions&quot;, at the bottom right of the page.</p><h3>Moderation</h3><p>At first, it won\'t be published, as it has to be accepted by a  moderator first. This is to make sure the contents submitted is of  interest to all users. A moderator will be notified of your submission  and will check to see if it\'s good. If something is wrong with the event, they will let you know. If the event is good enough, they\'ll  publish it.</p><h3>Displaying</h3><p>Events will appear in the events calendar under the &quot;Events&quot; menu.</p><p>People will also be able to view upcoming events on the homepage. A &quot;view all&quot; link in the homepage redirects to the event calendar.</p><p>&nbsp;</p>',
                       'url' => 'node/add/event',
                       'tid' => '1652',
                       'op' => 'insert');

//node 367
$help_array[] = array( 'title' => 'Profile creation form',
                       'body' => '<h3>Privacy settings</h3>
<p>The user has the capability to authorise other regular user to accede to its profile information or not.</p>
<p>These choices are:</p>
<ul>
    <li>Email Visibility : choose&nbsp;the visibility for the field Email,</li>
    <li>Profile Visibility : choose the visibility for fields domains and languages,</li>
</ul>
<p>The moderators and the administrators are not affected by these options.</p>
<h3>Completed profile</h3>
<p><span lang="EN-GB" style="font-size: 10pt; font-family: Arial;">According  to the amount of personal information provided by registered members in  their profile, the system calculates a &ldquo;percentage of completeness&rdquo;.&nbsp;</span></p>
<table width="552" cellspacing="0" cellpadding="3" border="1">
    <tbody>
        <tr>
            <td width="70%" bgcolor="#cccccc"><strong>profile section</strong></td>
            <td width="30%" bgcolor="#cccccc"><strong>% completeness average</strong></td>
        </tr>
        <tr>
            <td bgcolor="#ffffff">Register with all mandatory fields</td>
            <td bgcolor="#ffffff">40%</td>
        </tr>
        <tr>
            <td bgcolor="#ffffff"><span class="Estilo1">Photo</span></td>
            <td bgcolor="#ffffff"><span class="Estilo1">10%</span></td>
        </tr>
        <tr>
            <td bgcolor="#ffffff"><span class="Estilo1">Street</span></td>
            <td bgcolor="#ffffff">10%</td>
        </tr>
        <tr>
            <td bgcolor="#ffffff"><span class="Estilo1">Number</span></td>
            <td bgcolor="#ffffff">10%</td>
        </tr>
        <tr>
            <td bgcolor="#ffffff">City</td>
            <td bgcolor="#ffffff">10%</td>
        </tr>
        <tr>
            <td bgcolor="#ffffff">Zipcode</td>
            <td bgcolor="#ffffff">10%</td>
        </tr>
        <tr>
            <td bgcolor="#ffffff">Phone</td>
            <td bgcolor="#ffffff">10%</td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>',
                       'url' => 'user/%/edit/profile',
                       'tid' => '184',
                       'op' => 'update with url');

//node 1110
$help_array[] = array( 'title' => 'View of a newsletter item',
                       'body' => '<h3>&nbsp;What is displayed in this page ?</h3><p>All newsletter item information is available here as :</p><ul><li>the title and content of the newsletter</li><li>the author of the newsletter</li><li>the date the newsletter item has been posted</li><li>possibility to vote for this newsletter</li></ul><h3>Newsletter subscription</h3><p>User can subscribe to the newsletter in his profile.</p>',
                       'url' => 'newsletter/%',
                       'tid' => '179',
                       'op' => 'insert');		
//node 1111
$help_array[] = array( 'title' => 'Newsletter list page',
                       'body' => '<h3>What is displayed in this page ?</h3>
<p>All newsletter items are displayed as a list showing profile information (name and photography of the author), the post date, the title and an extraction of its content.</p>
<h3>How is the list built ?</h3>
<p>Default sort option is based on the post date. So, when reaching this page, latest newsletter are shown on top list.  User has the possibility to choose different sort option. By clicking on post-date or title link, he can choose to sort it differently (alphabetical for the 'title' and chronological or reverse-chronological for the post-date).</p>
<h3>How to view a news content ?</h3>
<p>User just has to click on the title link to reach newsletter whole content.</p>',
                       'url' => 'news/newsletters%',
                       'tid' => '179',
                       'op' => 'insert');		
//node 1113
$help_array[] = array( 'title' => 'Newsletter creation form',
                       'body' => '<h3>What is a newsletter ?</h3>
<p>A <span style="mso-bidi-font-weight:bold">newsletter</span> is a regularly distributed publication generally about one main topic that is of interest to its subscribers. When newsletter is created, he\'s sent to all subscriber.</p>
<p class="MsoNormal"><span lang="EN-US" style="mso-ansi-language:EN-US"><o:p></o:p></span>Newsletters are managed by the moderators.</p>
<h3>Creating a newsletter</h3>
<p>A news newsletter be created by clicking the &quot;Create a newsletter&quot; link under &quot;Quick actions&quot;, at the bottom right of the page.</p>
<p>&nbsp;</p>',
                       'url' => 'node/add/newsletter',
                       'tid' => '179',
                       'op' => 'insert');						   
					   
foreach ($help_array as $help) {
  if ($help['op'] == 'insert') {
    // add node properties
    $newNode = (object) NULL;
    $newNode->type = 'contexthelp';
    $newNode->title = $help['title'];
    $newNode->uid = 0;
    $newNode->created = strtotime("now");
    $newNode->changed = strtotime("now");
    $newNode->status = 1;
    $newNode->language = 'en';
    $newNode->body = $help['body'];
    $newNode->field_url[0]['value'] = $help['url'];
    $newNode->tid = $help['tid'];
    $newNode->teaser = substr($help['body'], 0, 140);

    // save node
    node_save($newNode);

    // taxo
    $taxo_sql = "INSERT INTO `{term_node}` (`nid`, `vid`, `tid`)
                 VALUES (%d, %d, %d);";
    db_query($taxo_sql, $newNode->nid, $newNode->vid, $help['tid']);
  }
  else {
    // load nid
    if ($help['op'] == 'update with title') {
      $sql = "SELECT nid FROM `{node_revisions}`
              WHERE title = '%s'";
      $nid = db_result(db_query($sql, $help['title']));
    }
    elseif ($help['op'] == 'update with url') {
      $sql = "SELECT nid FROM `{content_type_contexthelp}`
              WHERE field_url_value = '%s'";
      $nid = db_result(db_query($sql, $help['url']));
    }
    // update node_revisions for "title"
    // update content_type_contexthelp for "url"
    $node = node_load($nid);
    $node->title = $help['title'];
    $node->body = $help['body'];
    $node->field_url[0]['value'] = $help['url'];
    $node->tid = $help['tid'];
    $node->teaser = substr($help['body'], 0, 140);
    node_save($node);
    // update term_node for "tid"
    $sql = "UPDATE `term_node`
            SET tid = '%d'
            WHERE nid = '%d'";
    db_query($sql, $help['tid'], $nid);
  }
}

//Update old paths

//$sql  = "UPDATE `content_type_contexthelp` SET field_url_value = '%/%/wiki/%' WHERE nid = '167';";
//db_query($sql);
