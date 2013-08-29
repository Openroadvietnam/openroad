<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL & ~E_NOTICE);
ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

$t_now = strtotime("now");

$newNode = (object) NULL;
$newNode->type = 'page';
$newNode->title = 'Ten Rules for sharing semantic assets on Joinup';
$newNode->uid = 1;
$newNode->created = $t_now;
$newNode->changed = $t_now;
$newNode->status = 1;
$newNode->language = 'en';
$newNode->body = '<p>When sharing semantic assets, the Joinup platform is governed by the following Rules:</p>
<h3>
	Rule 1</h3>
<p>Joinup is a Collaborative Web platform, set-up and owned by the European Union (represented by the European Commission). The &ldquo;Semantic assets&rdquo; section of this platform is reserved for assets that are of particular use for public administrations in Europe, and/or produced by the public sector. Third parties (other administrations, enterprises, individuals) are kindly invited to collaborate, becoming Joinup Contributors. A Contributor may propose and submit a new project dedicated to semantic assets (becoming a Joinup Project Owner) or simply contribute to the improvement of existing assets. When describing a new semantic asset he proposes, the Project Owner must explain the link of the semantic asset with the public sector (is it owned, sponsored, funded in research program, aimed to&hellip;) and explain why it may be useful for other public administrations. The European Commission holds the right to refuse or permanently delete any content uploaded which does not fit the scope of the platform.</p>
<h3 style="font-size: 17px; line-height: 23px; ">
	Rule 2</h3>
<p>Any semantic project submitted in Joinup must be covered by at least one copyright licence. The aim of the licence is to authorise all other parties (JOINUP visitors, contributors) to download and make use of the assets without copyright infringement. When contributing to an existing asset, Contributors are invited to check the licence declared by the Project Owner and to agree with it, as their own contribution will be covered by this licence. Depending on the organisation set up by the Project Owner, Contributors may be invited to sign a specific &ldquo;Contributor Agreement&rdquo; with the Project Owner prior to submit contributions.</p>
<h3 style="font-size: 17px; line-height: 23px; ">
	Rule 3</h3>
<p>When proposing and submitting a new semantic project, the Project Owner must declare which initial copyright licence(s) will be applicable. The Joinup policy authorises any &ldquo;open&rdquo; licence, granting the following:</p>
<ul>
	<li>
		Freedom for downloading or using the assets granted to anyone without discrimination and for any purpose or project;</li>
	<li>
		Freedom to modify, adapt, improve the assets, producing derivative works according to specific needs;</li>
	<li>
		Freedom to share/redistribute copies of the assets, of their modifications or derivative works;</li>
	<li>
		All of the above being &ldquo;royalty free&rdquo;, meaning free from managed royalties depending on the duration, importance or purpose of the use.</li>
</ul>
<p>The information about the copyright licence which is applicable to the asset must be stored in the Joinup platform. If the licence text is not reliably available on the Internet, the licence text must be stored with the asset into the system. Additional meta-information and tags will help users of Joinup platform to filter those assets. Therefore, the correct meta-information must be selected by the Project Owner within the available tags when submitting the asset. Any non-English licence text related to an artefact / asset should be also provided in a binding English translation. The European Commission holds the right to refuse or permanently delete any content uploaded under an unacceptable licence.</p>
<h3 style="font-size: 17px; line-height: 23px; ">
	Rule 4</h3>
<p>By the fact submitting a contribution on Joinup, a Contributor grants the European Union a perpetual, non-exclusive, royalty-free, world-wide right and licence under any Contributor copyrights in the submitted asset to publish this asset as part of the Joinup platform under the licence specified by the Project Owner and stored into the system. A Project Owner may decide to withdraw or terminate a project from the Joinup platform. However, such a termination will not terminate the licences of any person who has received the assets under the licence specified by the Project Owner, provided such persons remain in full compliance with the licence.</p>
<h3 style="font-size: 17px; line-height: 23px; ">
	Rule 5</h3>
<p>The acceptance of a semantic project into the Joinup platform is conditioned on the provision of correct licensing information. The Joinup platform facilitates the task of Project Owners by proposing meta-information tags related to that license. In case of missing or misleading licensing information, the European Commission may add or change corresponding tags to the asset and its licences, or even retract the asset from the Joinup platform</p>
<h3 style="font-size: 17px; line-height: 23px; ">
	Rule 6</h3>
<p>By the fact submitting a contribution on the Joinup Platform, the Contributor vouches that he or she has all rights necessary to license his/her contribution to the Joinup platform in a way that does not violate copyright, patent, and trademark rights, contractual obligations, or libel and export control regulations.</p>
<h3 style="font-size: 17px; line-height: 23px; ">
	Rule 7</h3>
<p>When redistributing to other persons the semantic material found on the Joinup platform, Joinup users are invited to read, understand and apply the original licensing conditions if it is requested by the Project Owner that re-using the same licensing terms is compulsory in the case of re-distribution. While all open licences authorise redistribution, several licences are &ldquo;copyleft&rdquo;, meaning that if a re-distribution is done, this must be under the same licensing terms.</p>
<h3 style="font-size: 17px; line-height: 23px; ">
	Rule 8</h3>
<p>No one shall make a commercial use of the Joinup platform, or use it for any kind of advertisement related to private and / or profitable services. This rule applies even when some semantic assets that will be available on the platform may also or eventually be used for commercial purposes, or generates an ecosystem of commercial services. As a Contributor of a semantic asset, it is possible to inform the Joinup users about contact details and possibly display of the logo in appropriate format and reasonable resolution. It is permitted to link Joinup to any other web site which may be commercial or offer services. However, it is absolutely non permitted that any advertising material is published on the Joinup pages (including project pages).</p>
<h3 style="font-size: 17px; line-height: 23px; ">
	Rule 9</h3>
<p>While facilitating the distribution of the work, Joinup is not responsible and does not provide any guarantee related to this work. Project Owners and Contributors are the sole responsible of this work and will comply with intellectual property rights, criminal law, data privacy, statutory product liability and any other legal requirement. This is self-explanatory: when proposing a project, the provider is responsible for its content. Joinup does not control or validate the content of your project. The publication and distribution of a project on Joinup is not, per se, a certification or label of quality.</p>
<h3 style="font-size: 17px; line-height: 23px; ">
	Rule 10</h3>
<p>Project Owners and Contributors must consider all requests or recommendations from the Joinup Web master concerning the content of the work (or &ldquo;project pages&rdquo;). This authority can also remove / put off line all projects, pages or texts that appear &ndash; whether originally or later &ndash; to be contrary to the Joinup Rules. Joinup is not bureaucratic. It is open to everyone, according to the present Rules. However, if it appears even after some time, that the semantic asset or the content that was published should be adapted to comply with those Rules, the Joinup web master may request the modification or removal of the content in question. The Joinup web master can also make the unilateral decision to remove / put off line or set &ldquo;not visible&rdquo; any web page or project, after notifying the Project Owner and justifying such decision. Joinup will not be liable for any damage in such case.</p>';

$res = node_save($newNode);

$nid = $newNode->nid;
$delete_alias = "DELETE FROM `url_alias` WHERE  src = 'node/{$nid}'";

//add url alias
$insert_alias = "INSERT INTO `url_alias` (`pid`,`src`,`dst`,`language`) VALUES (NULL,'node/{$nid}','asset/page/ten_principles','en')";
db_query($delete_alias);
db_query($insert_alias);
