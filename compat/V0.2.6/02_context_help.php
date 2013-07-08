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
// use " for the body field string to avoid problems with apostrophes in body content
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


// node 17					   
$help_array[] = array( 'title' => 'View of a news item',
                       'body' => '<h3>What is displayed in this page ?</h3><div>All news item information is available here as :</div><div>- the title and content of the news</div><div>- the author, email contact, its location</div><div>- the date the news item has been posted</div><div>- the source URL for the news item</div><div>- downloadable documentation files</div><div>- the possibility to add a comment for this news item</div><div>- related terms for other news item list</div><h3>Editor\'s choice</h3><div>For users having the moderator role, there\'s a link in the quick actions allowing him to select/unselect this news as &quot;editor\'s choice&quot;.</div><div>The latest editor\'s choice appears directly at homepage.</div><h3>Highlighting news</h3><p>Users belonging to at least one community can also highlight news, so it appears in their community. To highlight a news item, click on the &quot;Highlight this content&quot; link.</p><p>A list of all communities you\'re a member of appears. Check the box in front of each community you want to highlight the news for and click on the &quot;highlight content&quot; button. If it\'s already been flagged, either by you or by somebody else, the box in front of the community\'s name will already be checked.</p><p>If you want to remove a highlight, simply uncheck the box in front of the community\'s name and click on the &quot;highlight content&quot; button.</p><h3>How to post a comment</h3><div>Click on link &quot;Add comment&quot; in the right section.&nbsp;This action brings the cursor inside the Comment field.</div><div>You can also click directly in this field.</div><div>After completing the comment, click on button &quot;Save&quot; to publish the comment.</div>',
                       'url' => 'news/%',
                       'tid' => '179',
                       'op' => 'update with title');

// node 111
$help_array[] = array( 'title' => 'General information',
                       'body' => "<h3>What can I find on my dashboard?</h3><p>On your dashboard, you'll find a list of all communities you belong to, along with a list of all your drafts and all your proposed items. If you're a moderator, you'll also see a list of items awaiting moderation and a list of all the comments (on items outside of communities) awaiting moderation. Facilitators have a similar list, but for comments made in communities they're facilitator of.</p><h3>My communities</h3><p>The list of your communities shows the following:</p><ul>    <li>Community name</li>    <li>Number of new posts</li></ul><p>The list is sortable on the community names.</p><h3>My Issues</h3><p>This list shows all issues that you have been assigned to and contains the following informations:</p><ul>    <li>Project name</li>    <li>Issue name</li>    <li>Status</li>    <li>The time since the creation</li></ul><h3>My Items</h3><p>This list shows the following:</p><ul>    <li>Title of the content</li>    <li>Creation date</li>    <li>Links to edit or delete the content</li>    <li>Type of content (e.g. Blog, News...)</li>    <li>State, to know if content if there as draft, proposed or published content</li></ul><p>A select list allows to filter by every kind of content user may have published on the ISA-ICP&nbsp;site.</p><p>Another select list allows to filter by state.</p><p>Note : Community_moderation workflow is available for both communities and projects</p><div>List can be sorted by title, creation date, type and state.</div><h3>Items awaiting moderation</h3><p>In the list of items awaiting moderation, you'll find:</p><ul>    <li>The author's name</li>    <li>The title</li>    <li>The date of creation</li>    <li>A link to edit the item</li>    <li>A link to validate / reject the item</li></ul><p>The list is sortable on author, title and date. By default, it's sorted ascending on date.<br />You can also use the filter above the list to choose which types you'd  like to see. To do so, select the type you want  to filter on from the dropdown menu and click the filter button.</p><h3>Asset maturity process</h3><p>In this list, you will find every asset requiring a validation, according to the asset maturity process.&nbsp;You will find:</p><ul>    <li>The author's name</li>    <li>The asset name</li>    <li>The release name</li>    <li>The date of creation</li>    <li>A link to edit the release</li></ul><p>The list is sortable on author, asset name, release name and date. By default, it's sorted ascending on date.</p><h3>Latest comments -- moderator</h3><p>In the list of the latest comments for a moderator, you'll find this for each of the latest 20 comments made on items that are outside communities.</p><ul>    <li>The author's name</li>    <li>The comment</li>    <li>The date of creation</li>    <li>A link to edit the item</li>    <li>A link to delete the item</li></ul><p>This list isn't sortable.</p><div>Each comment can be edited or deleted.&nbsp;</div><div>You can select multiple comments by clicking on check boxes or you can choose all comments by clicking on check box in the title bar.&nbsp;First selection will only select all comments in the current page.&nbsp;</div><div>A new button will appear and proposes to select all comments the moderator has access.</div><div>To remove selected comments, click on button &quot;Delete comments&quot; and confirm.</div><h3>Latest comments -- facilitator</h3><p>In the list of the latest  comments for a facilitator, you'll find this for each of the latest 20  comments per community you're facilitator for.</p><ul>    <li>The community's name</li>    <li>The author's name</li>    <li>The comment</li>    <li>The date of creation</li>    <li>A link to edit the item</li>    <li>A link to delete the item</li></ul><p>This list isn't sortable.</p><p>This list contains the same checkboxes than for &quot;moderator&quot;'s latest comments.</p><h3>Sorting a table</h3><p>To sort a table, simply click on the name of the column (which appears above the table) you want to sort on. The arrow appearing next to the title after you click it, shows whether it's sorting ascending or descending. When sorting ascending, it's 0 -&gt; 9 or A -&gt; Z. Descending is the other way around: 9 -&gt; 0 or Z -&gt; A</p>",
                       'url' => 'dashboard',
                       'tid' => '185',
                       'op' => 'update with url');

// node 300
$help_array[] = array( 'title' => 'Open Source Software list page',
                       'body' => "<h3>What does this page show?</h3><p>On this page, you can see a list of all Open Source Software (OSS) projects and Federated projects, along with a list of the Federated forges.   Information like the project's name, a short description, the amount   of members and whether or not you're already a member, is available   here.</p><p>If you are not member, you first need to go to project's homepage to reach link &quot;Request membership&quot;.&nbsp;Becoming member of such a project, requires approval from OSS&nbsp;project facilitator.&nbsp;Once he approves your request, you are member.</p><p>Software list can be sorted by creation date and OSS&nbsp;project title. For this, a select list is available at top right.</p><p>To access a project, you just have to click on the title.</p><p>The &quot;download&quot; button redirects to the last release of the software.</p><p>An project is a public space, meaning every ISA-ICP&nbsp;user can view its content. It works the same way as public communities.</p><p>From this page, you can request the creation of an OSS&nbsp;project.&nbsp;Clik on link &quot;Register your project&quot; to access the creation form.</p><p>On the right of this page, you can view some Federated Forges and how many Federated Projects they aggregate.</p>",
                       'url' => 'softwares/all',
                       'tid' => '568',
                       'op' => 'update with url');

// node 329
$help_array[] = array( 'title' => 'View a software',
                       'body' => "<div class=\"field-content\"><div class=\"field field-revisions-body\"><h3>What can I find on this page?</h3><div>On an OSS&nbsp;project's page, you can find the following:</div><div>&nbsp;</div><div>At top left:</div><ul>    <li>generic information about the software (title, logo, creation date, owner and some generic taxonomies)</li>    <li>a link to download the last release project and, if you are member, the information &quot;I'm a member&quot;</li></ul><div>At top right:</div><ul>    <li>links to all content types related to the projects (News &amp; Blogs, Documents, Forums, Wikis and Issues)</li>    <li>a link to member's list</li>    <li>a link to leave the project</li>    <li>a link to highlight the project</li>    <li>a link to add the project to the list of projects you use, and the current number of users</li></ul><div>In the main section:</div><ul>    <li>a description of the software project</li>    <li>main information about the project (feautres, future plans, ...)</li>    <li>a list of the 5 last items published or highlighted in this project</li>    <li>a list of the 5 last documents published or highlighted in this community</li>    <li>a list of the 3 last members joining the community</li>    <li>a list of the 3 last issues</li>    <li>a list of projects required by the current one</li></ul></div></div>",
                       'url' => 'software/%/home',
                       'tid' => '568',
                       'op' => 'update with url');

// node 381
$help_array[] = array( 'title' => 'Create a new Release',
                       'body' => '<h3>Version number elements</h3><div>Define here your version number.</div><h3>File information</h3><p>Attach here your release file in one of the following formats :<em> zip gz tar bz2 rar tgz tar.gz dmg rpm deb exe</em>.</p><h3>Attachements</h3><p>You could add some documents with these permitted extensions: (doc, docx, pdf, ppt, pptx, odf, odp) if you are a clearing process manager.</p><h3>Release note</h3><p>Describe here your release evolutions : bug corrections, improvements, new features, ...</p>"',
                       'url' => 'node/add/project-release/%',
                       'tid' => '568',
                       'op' => 'update with url');

// node 624
$help_array[] = array( 'title' => 'View of a federated forge page',
                       'body' => "<h3>What can I find on this page?</h3><p>On a federated forge page, you can find the following:<br />&nbsp;<br /><strong>In the main section:</strong></p><ol>    <li>A description of the federated forge;</li>    <li>Main information about the federated forge (get involved, taxonomies and external forge homepage);</li>    <li>The list of projects associated with this federated forge.</li></ol><p>&nbsp;</p>",
                       'url' => 'federatedforge/%',
                       'tid' => '568',
                       'op' => 'update with url');

// node 711
$help_array[] = array( 'title' => 'Asset view',
                       'body' => '<h3 style="margin-top: 1em; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-size: 17px; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; line-height: 25px; color: rgb(65, 81, 122); background-position: initial initial; background-repeat: initial initial; ">What can I find on this page?</h3><div style=""margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-size: 13px; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; background-position: initial initial; background-repeat: initial initial; ">On an asset project\'s page, you can find the following:</div><div style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-size: 13px; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; background-position: initial initial; background-repeat: initial initial; "">&nbsp;</div><div style=""margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-size: 13px; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; background-position: initial initial; background-repeat: initial initial; "">At top left:</div><ul>    <li>generic information about the asset (title, logo, creation date, owner and some generic taxonomies)</li>    <li>a link to download the last release project and, if you are member, the information &quot;I\'m a member&quot;</li></ul><div style=""margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-size: 13px; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; background-position: initial initial; background-repeat: initial initial; "">At top right:</div><ul>    <li>links to all content types related to the projects (News &amp; Blogs, Documents, Forums, Wikis and Issues)</li>    <li>a link to member\'s list</li>    <li>a link to leave the project</li>    <li>a link to highlight the project</li>    <li>a link to add the project to the list of projects you use, and the current number of users</li></ul><p>In the main section:</p><ul>    <li>a description of the asset project</li>    <li>a list of the 5 last items published or highlighted in this project</li>    <li>a list of the 5 last documents published or highlighted in this community</li>    <li>a list of the 3 last members joining the community</li>    <li>a list of the 3 last issues</li></ul><p>&nbsp;</p>',
                       'url' => 'asset/%/home',
                       'tid' => '568',
                       'op' => 'update with url');

// node 718
$help_array[] = array( 'title' => 'View a federated project',
                       'body' => "<div class=\"field-content\"><div class=\"field field-revisions-body\"><h3>What can I find on this page?</h3><div>On a federated project page, you can find the following:</div><div>&nbsp;</div><div><strong>At top left:</strong></div><ul>    <li>generic information about the federated project (title, logo, creation date, author, federated forge name with a link to its homepage and some generic taxonomies).</li></ul><p><strong>At top right:</strong></p><ul>    <li>a link to add the federated project to the list of projects you use, and the current number of users</li></ul><p><strong>In the main section:</strong></p><ul>    <li>a description of the federated project;</li>    <li>some project categories;</li>    <li>main information about the project (features, future plans, get involved, public administration)</li></ul></div></div><p>&nbsp;</p>",
                       'url' => 'federatedproject/%',
                       'tid' => '568',
                       'op' => 'update with url');

// node 746
$help_array[] = array( 'title' => 'Federated Forge list page',
                       'body' => '<h3>What does this page show?</h3><p>On this page, you can see a list of Federated Forges and how many Federated Projects they aggregate.&nbsp;You may use the pager at the bottom of the list to see more than the 10 last Federated Forges.</p><p>You can access a Federated Forge homepage by clicking on its name.</p>',
                       'url' => 'federatedforges',
                       'tid' => '568',
                       'op' => 'insert');

// node 764					   
$help_array[] = array( 'title' => 'Document creation form',
					   'body' => "<h3>Creating a document</h3><p>A document can be created by clicking the &quot;Propose a document&quot; link under &quot;Quick actions&quot;, at the bottom right of the page.</p><h3>Moderation</h3><p>At first, it won't be published, as it has to be accepted by a  moderator first. This is to make sure the contents submitted is of  interest to all users. A moderator will be notified of your submission  and will check to see if it's good. If something is wrong with the document, they will let you know. If the document is good enough, they''ll  publish it.</p><h3>Displaying</h3><p>Documents will appear under the E-library menu item.</p>",
					   'url' => 'node/add/document',
					   'tid' => '1411',
					   'op' => 'insert');

// node 766
$help_array[] = array( 'title' => 'Case creation form',
					   'body' => "<h3>Creating a case</h3><p>A case can be created by clicking the &quot;Propose a case&quot; link under &quot;Quick actions&quot;, at the bottom right of the page.</p><h3>Moderation</h3><p>At first, it won't be published, as it has to be accepted by a  moderator first. This is to make sure the contents submitted is of  interest to all users. A moderator will be notified of your submission  and will check to see if it's good. If something is wrong with the  document, they will let you know. If the document is good enough,  they'll  publish it.</p><h3>Displaying</h3><p>Cases will appear under the E-library menu item.</p>",
					   'url' => 'node/add/case',
					   'tid' => '1412',
					   'op' => 'insert');

// node 767
$help_array[] = array( 'title' => 'Federated Forge Form',
                       'body' => "<h3>What is a news Federated Forge?</h3><p>A Forge is a collaboration platform allowing software development over the Internet.<br />&nbsp;</p><h3>Creating a Federated Forge</h3><p>Use the Quick Action Links bellow named &quot;Create a federated forge&quot; at the rigth at the page.<br />A Form will be displayed.</p><h3>Displaying</h3><p>Federate Forge items will appear at the top right of the page and also at the right bottom of the page .</p>",
                       'url' => 'node/add/federated-forge',
                       'tid' => '568',
                       'op' => 'insert');

// node 775			
$help_array[] = array( 'title' => 'Blogs list',
					   'body' => '<h3>What is displayed in this page ?</h3><p style="margin-top: 0.6em; margin-right: 0px; margin-bottom: 1.2em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-size: 13px; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; background-position: initial initial; background-repeat: initial initial; ">All blogs are displayed as a list showing profile information (name and photography of the author), the post date, the title and an extraction of its content.</p><h3 style="margin-top: 1em; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-size: 17px; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; line-height: 25px; color: rgb(65, 81, 122); border-style: initial; border-color: initial; background-position: initial initial; background-repeat: initial initial; ">How is the list built ?</h3><p style="margin-top: 0.6em; margin-right: 0px; margin-bottom: 1.2em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-size: 13px; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; border-style: initial; border-color: initial; background-position: initial initial; background-repeat: initial initial; ">Default sort option is based on the post date.&nbsp;So, when reaching this page, latest news are shown on top list.</p><p style="margin-top: 0.6em; margin-right: 0px; margin-bottom: 1.2em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-size: 13px; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; border-style: initial; border-color: initial; background-position: initial initial; background-repeat: initial initial; "><a id="fck_paste_padding">?</a>User has the possibility to choose different sort option.&nbsp;By clicking on post-date or title link, he can choose to sort it differently (alphabetical for the \'title\' and chronological or reverse-chronological for the post-date).</p><h3 style="margin-top: 1em; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-size: 17px; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; line-height: 25px; color: rgb(65, 81, 122); background-position: initial initial; background-repeat: initial initial; ">How to view a blog ?</h3><p>Member just needs to click on the title link to reach a blog\'s whole content.</p><p>&nbsp;</p><p>&nbsp;</p><h3 style="margin-top: 1em; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-size: 17px; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; line-height: 25px; color: rgb(65, 81, 122); background-position: initial initial; background-repeat: initial initial; ">&nbsp;</h3><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>',						
					   'url' => 'news/blogs',
					   'tid' => '180',
					   'op' => 'insert');

// node 776					   
$help_array[] = array( 'title' => 'News list page',
					   'body' => '<h3><div style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-size: 100%; background-image: none; background-attachment: scroll; background-origin: initial; background-clip: initial; background-color: initial; line-height: 150%; font: normal normal normal 80%/normal Arial, sans-serif; color: rgb(0, 0, 0); background-position: 0px 0px; background-repeat: repeat repeat; "><h3 style="margin-top: 1em; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-size: 17px; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; line-height: 25px; color: rgb(65, 81, 122); background-position: initial initial; background-repeat: initial initial; ">What is displayed in this page ?</h3><div style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-size: 10px; background-image: none; background-attachment: scroll; background-origin: initial; background-clip: initial; background-color: initial; border-style: initial; border-color: initial; line-height: normal; font: normal normal normal 80%/normal Arial, sans-serif; color: rgb(0, 0, 0); background-position: 0px 0px; background-repeat: repeat repeat; "><p style="margin-top: 0.6em; margin-right: 0px; margin-bottom: 1.2em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-size: 13px; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; border-style: initial; border-color: initial; background-position: initial initial; background-repeat: initial initial; ">All news items are displayed as a list showing profile information (name and photography of the author), the post date, the title and an extraction of its content.</p><h3 style="margin-top: 1em; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-size: 17px; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; line-height: 25px; color: rgb(65, 81, 122); border-style: initial; border-color: initial; background-position: initial initial; background-repeat: initial initial; ">How is the list built ?</h3><p style="margin-top: 0.6em; margin-right: 0px; margin-bottom: 1.2em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-size: 13px; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; border-style: initial; border-color: initial; background-position: initial initial; background-repeat: initial initial; ">Default sort option is based on the post date.&nbsp;So, when reaching this page, latest news are shown on top list.</p><p style="margin-top: 0.6em; margin-right: 0px; margin-bottom: 1.2em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-size: 13px; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; border-style: initial; border-color: initial; background-position: initial initial; background-repeat: initial initial; ">User has the possibility to choose different sort option.&nbsp;By clicking on post-date or title link, he can choose to sort it differently (alphabetical for the \'title\' and chronological or reverse-chronological for the post-date).</p><h3 style="margin-top: 1em; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-size: 17px; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; line-height: 25px; color: rgb(65, 81, 122); border-style: initial; border-color: initial; background-position: initial initial; background-repeat: initial initial; ">How to view a news content ?</h3><p style="margin-top: 0.6em; margin-right: 0px; margin-bottom: 1.2em; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-size: 13px; background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent; border-style: initial; border-color: initial; background-position: initial initial; background-repeat: initial initial; ">User just has to click on the title link to reach news whole content.</p></div></div></h3><div style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; outline-width: 0px; outline-style: initial; outline-color: initial; font-size: 100%; background-image: none; background-attachment: scroll; background-origin: initial; background-clip: initial; background-color: initial; line-height: 150%; font: normal normal normal 80%/normal Arial, sans-serif; color: rgb(0, 0, 0); background-position: 0px 0px; background-repeat: repeat repeat; ">&nbsp;</div>',	
					   'url' => 'news/news-only',
					   'tid' => '179',
					   'op' => 'insert');

// node 818
$help_array[] = array( 'title' => 'View of a Document page',
					   'body' => "<h3>What can I find on this page?</h3><p>On a document page, you can find the following:</p><p><strong>In the header section:</strong></p><ul>    <li>Generic information about the document (title, logo, creation date, owner and some generic taxonomies).</li></ul><p><strong>In the main section:</strong></p><ul>    <li>A description of the document;</li>    <li>Some document categories and information;</li>    <li>The original URL;</li>    <li>The list of additional documentation (ppt, pptx, pdf, doc, docx and zip).</li></ul>",
                       'url' => 'document/%',
					   'tid' => '1430',
					   'op' => 'insert');

// node 853
$help_array[] = array( 'title' => 'View of a Case page',
					   'body' => "<h3>What can I find on this page?</h3><p>On a case page, you can find the following:</p><p><strong>In the header section:</strong></p><ul>    <li>Generic information about the case (title, logo, creation date, owner and some generic taxonomies).</li></ul><p><strong>In the main section:</strong></p><ul>    <li>A short summary of the case</li>    <li>The URL of the case</li>    <li>The start and end dates</li>    <li>The date the case went into production</li>    <li>The case's region</li>    <li>A full description of the case</li></ul><p>&nbsp;</p>",
                       'url' => 'case/%',
					   'tid' => '1430',
					   'op' => 'insert');

// node 856
$help_array[] = array( 'title' => 'Cases list page',
					   'body' => '<div class="field-content"><div class="field field-revisions-body"><p><span style="color: rgb(65, 81, 122); font-size: 17px; font-weight: bold; line-height: 25px;" class="Apple-style-span">What is displayed in this page ?</span></p><div style="margin: 0px; padding: 0px; border-width: 0px; outline-width: 0px; background-image: none; background-attachment: scroll; font: 80% Arial,sans-serif; color: rgb(0, 0, 0); background-position: 0px 0px;"><p style="margin: 0.6em 0px 1.2em; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 13px; background-color: transparent;">All cases are displayed as a list showing the case\'s logo, how long it\'s been since the case\'s been created, the title and an  extraction of its content.</p><h3 style="margin: 1em 0px; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 17px; background-color: transparent; line-height: 25px; color: rgb(65, 81, 122);">How is the list built ?</h3><p style="margin: 0.6em 0px 1.2em; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 13px; background-color: transparent;">Default sort option is based on the post date.&nbsp;So, when reaching this page, newest cases are shown on top list.</p><p style="margin: 0.6em 0px 1.2em; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 13px; background-color: transparent;">User  has the possibility to choose different sort option.&nbsp;By clicking on  post-date or title link, he can choose to sort it differently  (alphabetical for the \'title\' and chronological or reverse-chronological  for the post-date).</p><h3 style="margin: 1em 0px; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 17px; background-color: transparent; line-height: 25px; color: rgb(65, 81, 122);">How to view a case\'s content ?</h3><p style="margin: 0.6em 0px 1.2em; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 13px; background-color: transparent;">User just has to click on the title link to reach the case\'s whole content.</p></div></div></div>',
                       'url' => 'elibrary/cases',
					   'tid' => '1430',
					   'op' => 'insert');

// node 857
$help_array[] = array( 'title' => 'Documents list page',
					   'body' => '<div class="field-content"><div class="field field-revisions-body"><p><span class="Apple-style-span" style="color: rgb(65, 81, 122); font-size: 17px; font-weight: bold; line-height: 25px;">What is displayed in this page ?</span></p><div style="margin: 0px; padding: 0px; border-width: 0px; outline-width: 0px; background-image: none; background-attachment: scroll; font: 80% Arial,sans-serif; color: rgb(0, 0, 0); background-position: 0px 0px;"><p style="margin: 0.6em 0px 1.2em; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 13px; background-color: transparent;">All documents are displayed as a list showing how long it\'s been since the document\'s been created, the title and an  extraction of its content.</p><h3 style="margin: 1em 0px; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 17px; background-color: transparent; line-height: 25px; color: rgb(65, 81, 122);">How is the list built ?</h3><p style="margin: 0.6em 0px 1.2em; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 13px; background-color: transparent;">Default sort option is based on the post date.&nbsp;So, when reaching this page, newest documents are shown on top list.</p><p style="margin: 0.6em 0px 1.2em; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 13px; background-color: transparent;">User  has the possibility to choose different sort option.&nbsp;By clicking on  post-date or title link, he can choose to sort it differently  (alphabetical for the \'title\' and chronological or reverse-chronological  for the post-date).</p><h3 style="margin: 1em 0px; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 17px; background-color: transparent; line-height: 25px; color: rgb(65, 81, 122);">How to view a document\'s content ?</h3><p style="margin: 0.6em 0px 1.2em; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 13px; background-color: transparent;">User just has to click on the title link to reach the document\'s whole content.</p></div></div></div><p>&nbsp;</p>',
                       'url' => 'elibrary/documents',
					   'tid' => '1430',
					   'op' => 'insert');

// node 858
$help_array[] = array( 'title' => 'View editor\'s choice list',
					   'body' => '<div class="field-content"><div class="field field-revisions-body"><h3>What is an editor\'s choice ?</h3><p>Editor\'s choice is a content that the ISA-ICP moderator wishes to promote.</p><h3>What is displayed in this page ?</h3><p>All contents are displayed as a list showing the case\'s logo, how long it\'s been since the case\'s been created, the title and an  extraction of its content.</p><h3 style="margin: 1em 0px; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 17px; background-color: transparent; line-height: 25px; color: rgb(65, 81, 122);">How is the list built ?</h3><p style="margin: 0.6em 0px 1.2em; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 13px; background-color: transparent;">Default sort option is based on the post date.&nbsp;So, when reaching this page, newest cases are shown on top list.</p><p style="margin: 0.6em 0px 1.2em; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 13px; background-color: transparent;">User   has the possibility to choose different sort option.&nbsp;By clicking on   post-date or title link, he can choose to sort it differently   (alphabetical for the \'title\' and chronological or reverse-chronological   for the post-date).</p><h3 style="margin: 1em 0px; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 17px; background-color: transparent; line-height: 25px; color: rgb(65, 81, 122);">How to view a case\'s content ?</h3><p style="margin: 0.6em 0px 1.2em; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 13px; background-color: transparent;">User just has to click on the title link to reach the case\'s whole content.</p></div></div>',
                       'url' => 'elibrary/editor',
					   'tid' => '1430',
					   'op' => 'insert');

// node 859
$help_array[] = array( 'title' => 'Viewing documents & wikis list',
					   'body' => '<div class="field-content"><div class="field field-revisions-body"><div class="field-content"><div class="field field-revisions-body"><h3>What is displayed in this page ?</h3><p>All documents &amp; wiki pages are displayed as a list showing profile information   (name and photography of the author), the post date, the title and an   extraction of its content.</p><h3>How is the list built ?</h3><p>Default sort option is based on the post date.&nbsp;So, when reaching this page, latest documents &amp; wiki pages are shown on top list.</p><p>Member can choose different sort option. A select list proposes many options :</p><p>- title : alphabetical order</p><p>- post-date : chronological or reverse-chronological (most recent first)</p><h3>How to view a document or wiki page ?</h3><p>Member just needs to click on the title link to reach the document or wiki\'s whole content.</p></div></div></div></div><p>&nbsp;</p>',
                       'url' => '%/%/wikis/all',
					   'tid' => '182',
					   'op' => 'insert');

// node 860
$help_array[] = array( 'title' => 'Viewing documents list',
					   'body' => '<div class="field-content"><div class="field field-revisions-body"><p><span class="Apple-style-span" style="color: rgb(65, 81, 122); font-size: 17px; font-weight: bold; line-height: 25px;">What is displayed in this page ?</span></p><div style="margin: 0px; padding: 0px; border-width: 0px; outline-width: 0px; background-image: none; background-attachment: scroll; font: 80% Arial,sans-serif; color: rgb(0, 0, 0); background-position: 0px 0px;"><p style="margin: 0.6em 0px 1.2em; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 13px; background-color: transparent;">All  documents are displayed as a list showing how long it\'s been since the  document\'s been created, the title and an  extraction of its content.</p><h3 style="margin: 1em 0px; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 17px; background-color: transparent; line-height: 25px; color: rgb(65, 81, 122);">How is the list built ?</h3><p style="margin: 0.6em 0px 1.2em; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 13px; background-color: transparent;">Default sort option is based on the post date.&nbsp;So, when reaching this page, newest documents are shown on top list.</p><p style="margin: 0.6em 0px 1.2em; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 13px; background-color: transparent;">User   has the possibility to choose different sort option.&nbsp;By clicking on   post-date or title link, he can choose to sort it differently   (alphabetical for the \'title\' and chronological or reverse-chronological   for the post-date).</p><h3 style="margin: 1em 0px; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 17px; background-color: transparent; line-height: 25px; color: rgb(65, 81, 122);">How to view a document\'s content ?</h3><p style="margin: 0.6em 0px 1.2em; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 13px; background-color: transparent;">User just has to click on the title link to reach the document\'s whole content.</p></div></div></div><p>&nbsp;</p>',
                       'url' => '%/%/wikis/documents',
					   'tid' => '182',
					   'op' => 'insert');

// node 864
$help_array[] = array( 'title' => 'View of a Case page',
					   'body' => '<h3>What can I find on this page?</h3><p>On a case page, you can find the following:</p><h4>In the header section</h4><p>Generic information about the document (title, logo, creation date, owner and some generic taxonomies).</p><h4>In the main section</h4><ol>    <li>A description of the case;</li>    <li>Some document information;</li>    <li>Some document categories;</li>    <li>A list of long text information (policy context, target users, technology solution, main results, benefits and impacts, etc).</li></ol>',
                       'url' => 'case/%',
					   'tid' => '1412',
					   'op' => 'insert');

//delete \r\n on old help

$help_array[] = array( 'title' => 'Manage members',
                       'body' => '<div class="field-content"><div class="field field-revisions-body"><h3>Managing members</h3><p>Only software project owners or facilitators have access to this page. If    you\'re a software project owner or facilitator, click on the &quot;Manage members&quot;   link  in the software view.</p><h3>How do I manage members?</h3><p>On the &quot;Manage members&quot; page, a list of all project members can be   found. Change the boxes next to the members you want to edit. Then  click  on &quot;apply these changes.&quot; The users will receive a mail to let  them  know of the changes.</p><h3>What can I do ?</h3><ul class="ui-accordion" role="tablist">    <li>Checking the &quot;facilitator&quot; box: Makes a member a facilitator</li>    <li>Checking the &quot;project owner&quot; box: Makes a member the project owner</li>    <li>Checking the &quot;developer&quot; box: Makes a member a developer</li>    <li>Unchecking the &quot;facilitator&quot; box: Removes facilitator rights from the member</li>    <li>Unchecking the &quot;member&quot; box: Will remove the member from the software project</li></ul><h3>I can\'t check or uncheck a box!</h3><p>Sometimes, you   won\'t be able to check / uncheck boxes. This is because these members   haven\'t been approved yet. You\'ll see &quot;approve&quot; and &quot;deny&quot; links under   their name then.</p><p>In another case, it\'s because the member you want to alter, is the software project owner. As he\'s the owner, you can\'t demote them from   facilitator, and can\'t remove them from the project. A moderator\'s   intervention is required if these changes are necessary.</p><h3>What is the difference between &quot;member&quot; and &quot;facilitator&quot;?</h3><ul class="ui-accordion" role="tablist">    <li>A member is a regular member of the project. He can create any contents, but it has to be approved.</li>    <li>Facilitators are also members of a project, with all rights of   a  regular member. They can also approve submitted contents and manage    users.</li></ul></div></div>',
                       'url' => '%/%/members/edit',
                       'op' => 'update with url',
                       'tid' => '568');

$help_array[] = array( 'title' => 'Members list',
                       'body' => '<div class="field-content"><div class="field field-revisions-body"><h3>What can I&nbsp;find on this page?</h3><p>On the Members list of a project, you can see everybody who\'s a   member. The owner of the project and the facilitators are marked in   this list as well. That way, you know who to contact in case you have   any questions or remarks about this project.</p></div></div>',
                       'url' => '%/%/members',
                       'op' => 'update with url',
                       'tid' => '568');

$help_array[] = array( 'title' => 'Add members',
                       'body' => '<div class="field-content"><div class="field field-revisions-body"><h3>Adding members</h3><p>Only project owners or facilitators have access to this page. If  you\'re a project owner or facilitator, click on the &quot;Add members&quot; link  in the project view.</p><h3>How do I&nbsp;add members?</h3><p>On the &quot;Add members&quot; page, a list of all users not yet in the project can be found. Check the box next to all users you want to add  their name and click the &quot;Add these users&quot; button. These users will be  notified that they were added to the project.</p><h3>What is the difference between &quot;member&quot; and &quot;facilitator&quot;?</h3><ul>    <li>A member is a regular member of the project. They can create any contents, but it has to be approved.</li>    <li>Facilitators are also members of a project, with all rights of a  regular member. They can also approve submitted contents and manage  users.</li></ul></div></div>',
                       'url' => '%/%/members/add',
                       'op' => 'update with url',
                       'tid' => '568');

$help_array[] = array( 'title' => 'View related projects',
                       'body' => '<div class="field-content"><div class="field field-revisions-body"><h3>What does this page show ?</h3><div>On this page, you can see a list of all other projects having a relation with the project user or member is viewing.&nbsp;</div><div>Possible relations are:</div><ul>    <li><strong>Depends on:</strong> Current software project requires all theses projects to work</li>    <li><strong>Required by: </strong>All listed projects require current project to work</li></ul><h3>Which filters exist in this page ?</h3><ul class="ui-accordion" role="tablist">    <li><strong>Recently registered:</strong> This filter is based on the creation date of the software project.&nbsp;</li>    <li><strong>Most active:</strong> This filter is based on posts created on the listed projects (taken from comments on different tools as blogs, topics... but also the number of contents published in the project)</li></ul><p>&nbsp;</p></div></div>',
                       'url' => 'software/%/related_projects/%',
                       'op' => 'update with url',
                       'tid' => '568');

$help_array[] = array( 'title' => 'Create a new issue',
                       'body' => '<h3><strong>Main Information</strong></h3><div><strong>Title </strong>: The title of your issue.</div><div><strong>Description</strong> : A complete and detailled description of the issue.</div><h3><strong>Project Information</strong></h3><p>This part contains informations about the related project.</p><div><strong>Project</strong> : Name of the project.</div><div><strong>Version</strong> : Release version of the project.</div><div><strong>Component</strong> : The component concerned by the issue (code, documentation, ...).</div><div><h3><strong><strong>Issue Information</strong></strong></h3><p>This part contains detailled informations about the issue.</p><div><strong><strong>Category </strong></strong>: The category of the issue (bug, improvement, ...).</div><div>&nbsp;</div><div><strong>Priority</strong> : The priority of the issue (minor, normal, major).</div><div>&nbsp;</div><div><strong>Assigned :</strong> The developper in charge of the issue.</div><div>If you are project owner or developper, you can assign the issue to every member of the OSS.<div>If you are a simple member of the project, you can only assign an issue to yourself.</div><div>&nbsp;</div></div><div><strong>Status :</strong> The status of the issue (active, resolved, closed, ...).</div></div>',
                       'url' => 'node/add/project-issue/%',
                       'op' => 'update with url',
                       'tid' => '568');

$help_array[] = array( 'title' => 'Profile creation form',
                       'body' => '<h3>Privacy settings</h3><p>The user has the capability to authorise other regular user to accede to its profile information or not.</p><p>These choices are:</p><ul>    <li>Email Visibility : choose&nbsp;the visibility for the field Email,</li>    <li>Profile Visibility : choose the visibility for fields domains and languages,</li></ul><p>The moderators and the administrators are not affected by these options.</p><p>&nbsp;</p>',
                       'url' => 'user/%/edit/profile',
                       'op' => 'update with url',
                       'tid' => '184');

$help_array[] = array( 'title' => 'View of an issue',
                       'body' => '<h3>What is displayed in this page ?</h3><div>Issue details and related informations.</div><div><table style="width: 359px; height: 190px;">    <tbody>        <tr class="odd">            <td>Project:</td>            <td>Name of the project</td>        </tr>        <tr class="even">            <td>Version:</td>            <td>Project version</td>        </tr>        <tr class="odd">            <td>Component:</td>            <td>The concerned component type</td>        </tr>        <tr class="even">            <td>Category:</td>            <td>The category of the issue</td>        </tr>        <tr class="odd">            <td>Priority:</td>            <td>The priority of the issue</td>        </tr>        <tr class="even">            <td>Assigned:</td>            <td>The software member assigned to this issue</td>        </tr>        <tr class="odd">            <td>Status:</td>            <td>the status of the issue</td>        </tr>    </tbody></table></div><h3>Comment an issue</h3><p>Completing the comment form, and click on button &quot;Save&quot; to publish the comment.</p><div>If you are project owner or developper, you can modify all issue fields.</div><div>If you are a simple member of the project, you can only modify the field \'Assigned\' if no one is assigned, and you can only assign yourself.</div>',
                       'url' => 'software/%/issue/%',
                       'op' => 'update with url',
                       'tid' => '568');

$help_array[] = array( 'title' => 'Assets list page',
                       'body' => '<h3>What does this page show?</h3><p>On this page, you can see a list of all Asset projects, along with a list of the Federated  forges.   Information like the project\'s name, a short description, the  amount   of members and whether or not you\'re already a member, is  available   here.</p><p>If you are not member, you first need to go to project\'s homepage to  reach link &quot;Request membership&quot;.&nbsp;Becoming member of such a project,  requires approval from Asset project facilitator.&nbsp;Once he approves your  request, you are member.</p><p>Assets list can be sorted by creation date and Asset project title. For this, a select list is available at top right.</p><p>To access a project, you just have to click on the title.</p><p>The &quot;download&quot; button redirects to the last release of the software.</p><p>An project is a public space, meaning every ISA-ICP&nbsp;user can view its content. It works the same way as public communities.</p><p>From this page, you can request the creation of an Asset project.&nbsp;Clik  on link &quot;Register your project&quot; to access the creation form.</p>',
                       'url' => 'assets/all',
                       'op' => 'update with url',
                       'tid' => '568');


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

$sql  = "UPDATE `content_type_contexthelp` SET field_url_value = '%/%/wiki/%' WHERE nid = '167';";
$sql  = "UPDATE `content_type_contexthelp` SET field_url_value = '%/%/wikis/wikis' WHERE nid = '191';";
$sql  = "UPDATE `content_type_contexthelp` SET field_url_value = '%/blogs/all' WHERE nid = '267';";
$sql  = "UPDATE `content_type_contexthelp` SET field_url_value = '%/%/forums/all' WHERE nid = '268';";
$sql  = "UPDATE `content_type_contexthelp` SET field_url_value = '%/%/topic/%' WHERE nid = '271';";
$sql  = "UPDATE `content_type_contexthelp` SET field_url_value = '%/%/forum/%' WHERE nid = '281';";
db_query($sql);
