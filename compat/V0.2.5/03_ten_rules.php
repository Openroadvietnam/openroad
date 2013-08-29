<?php
/* 
 * Add the ten rules node
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
$newNode->title = 'Ten "Principles" of using ISA';
$newNode->uid = 1;
$newNode->created = strtotime("now");
$newNode->changed = strtotime("now");
$newNode->status = 1;
$newNode->language = 'en';
$newNode->body = '<h3>Principle 1</h3>
<p>The OSOR.eu and its services are exclusively reserved for the  exchange and collaboration on Open Source Software. This means that  software or projects that are not released under recognized OSS licences  will not be admitted on the OSOR, or will be removed as the case may  be. The Open Source character of software is defined in the licence,  where the software author(s) or &ldquo;Licensor&rdquo; ensures a number of freedoms  to the licensee:</p>
<ul>
    <li>Freedom to use or run it for any purpose and any number of users</li>
    <li>Freedom to study how the software works. Access to the source code is a precondition for this.</li>
    <li>Freedom to share,(redistribute) copies of the softwar</li>
    <li>Freedom to modify, adapt, improve the software according to  specific needs and to share (redistribute) these modifications. Access  to the source code is a precondition for this.</li>
</ul>
<p>The use of the EUPL licence, which is available in all official  European languages and was especially written for use by public sector  in Europe, comes highly recommended. However, any other licence that is  recognized by the OSI (<a href="http://www.opensource.org">Open Source Initiative</a>), or the FSF (<a href="http://www.fsf.org">Free Software Foundation</a>) will be accepted.</p>
<h3>Principle 2</h3>
<p>The OSOR.eu is reserved for software and projects that are of  particular use for public administrations in Europe, and/or produced by  the public sector.When describing the project, the provider should  explain the link of the project with the public sector (is it owned,  sponsored, funded in research program, aimed to&hellip;) and explain why it may  be useful for other public administrations. This represents a wide  array of possible applications. The reference to public administrations  is not exclusive of other usages: for example a Geographical Information  System may be considered as &ldquo;answering to public sector needs&rdquo; (road  making etc.), even if it can also be useful for private purpose (home  building, truck or property management etc.). The OSOR.eu taxonomy will  help project owners to categorise their project according to public  sector needs.The fact that specific sectors (games, entertainment,  religion, genealogy etc.) are not present in the taxonomy may be an  indication that related projects are not targeted to answer to public  sector needs.The reference to Europe is not exclusive either: OSOR.eu  welcomes projects that are initiated and could be downloaded and used  everywhere, provide they may be useful to public administrations in  Europe.The project owner can be a public administration, however it can  be any other person (individual, association, company) developing  software that is of particular use for public administrations.</p>
<h3>Principle 3</h3>
<p>The OSOR.eu is freely and publicly accessible . Everybody can access  OSOR.eu and contribute to hosted projects. Everybody can submit a  project. The OSOR.eu management will avoid bureaucracy. No ex-ante  authorisation will be necessary to participate. Respect of OSOR.eu  principles will be checked ex-post by the community of OSOR.eu users and  stakeholders.However, for the use of certain functionalities,  submitting a project or contributing to a specific project,  authentication will be required. Due to the sensitivity of certain  public sector projects, It may happen that a specific project owner will  temporarily restrict the contribution to a restricted group of  developers. This will be the decision of that specific project owner  (and not of the OSOR.eu management). When accepting to share your work  with other people, it is recommended not to restrict access more than it  is strictly necessary.</p>
<h3>Principle 4</h3>
<p>Distributing software under an open source licence, such as the EUPL  implies that the rights granted by the licence should be royalty-free.  As a consequence, all projects hosted by the OSOR.eu shall be free of  royalties. This does not restrict the optional merchantability of  additional services related to the software, for example providing  consultancy or support for implementation or maintenance. Such services  must stay optional, and may not become a condition for downloading,  using or modifying the software.</p>
<h3>Principle 5</h3>
<p>The provider must be the author, the copyright owner or have a valid  license for all that is being communicated. The provider will provide  the material in readable/revisable form using open standards and open  formats and will be responsible to publish (or link to) the licensing  terms that are applicable. This is the main guarantee that needs to be  provided to all other OSOR.eu users, in order to avoid later  intellectual property issues.If the software to be released was entirely  written by the provider (or by the employees of the provider\'s  organisation, i.e. the legal entity that will release the software),  then the provider should normally own the exclusive copyright on the  software. In any other situation, the provider needs to check who wrote  the software (or any part of it) and under what terms (or licence, or  service contract) the provider is allowed to reproduce it in the  software and distribute it on the OSOR.eu.If the software was written  for the provider by contractors, the provider may have the right to  reuse and re-distribute it, or may even own the software exclusively -  this depends on the terms of the service contract under which the  software was written.The software should be provided in  readable/revisable form using preferably open standards or formats. If  the software is distributed as a binary package (object code), the  readable source code, or link to a repository where this source code is  available should be communicated.The licensing terms (or link to) that  are applicable to your software or to its various components should also  be published. It may happen that the &ldquo;software solution&rdquo; that is  distributed is made from several components, each of them with different  licensing conditions.</p>
<h3>Principle 6</h3>
<p>If the user downloads, uses or modifies the work that was put on the  Repository by other persons, the user should always search for, read and  adhere to the terms of the related licence.When adding contributions,  as the case may be, it is possible that own copyright marks are added,  in particular if this contribution is especially important, however,  users should never change existing copyright marks or licensing terms.</p>
<h3>Principle 7</h3>
<p>When redistributing to other persons the material found on the  Repository, users will apply the original licensing conditions if it is  requested by the provider that re-distribution under the same licensing  terms is compulsory. While all FLOSS licences authorise redistribution  of the licensed software, several licences are &ldquo;copyleft&rdquo;, meaning that  if a re-distribution is done, this must be under the same licensing  terms.</p>
<h3>Principle 8</h3>
<p>No one shall make a commercial use of the OSOR.eu platform, or use it  for any kind of advertisement related to private and / or profitable  services.This rule applies even when some software that will be  available on the Repository may also or eventually be used for  commercial purposes, or generates an ecosystem of commercial services.  As a project owner or the author of a software, it is possible to inform  the OSOR.eu users about contact details and possibly display of the  logo in appropriate format and reasonable resolution.It is permitted to  link the OSOR.eu to any other web site which may be commercial or offer  services such as the ones mentioned in Principle 4.However, it is  absolutely non permitted that any advertising material is published on  the OSOR.eu pages (including project pages).</p>
<h3>Principle 9</h3>
<p>When facilitating the distribution of the work, the OSOR.eu is not  responsible and does not provide any guarantee related to this work. As  the project owner and the licensor, you are the sole responsible of your  work, and will comply with intellectual property rights, criminal law,  data privacy, statutory product liability and any other legal  requirement. This is self-explanatory: when opening a project, the  provider is responsible for its content. The principle of transparency  (publication of the source code, under scrutiny of a wide community)  should reinforce security and the evidence that source code contains no  malicious software, virus, etc. The OSOR.eu does not control or validate  the content of your project. The publication and distribution of a  project on the OSOR.eu is not, per se, a certification or label of  quality. They are specialised services for obtaining such certification  or label.</p>
<h3>Principle 10</h3>
<p>Users and providers should consider all requests or recommendations  from the OSOR.eu Web master concerning the content of the work (or  &ldquo;project pages&rdquo;). This authority can also remove / put off line all  projects, pages or texts that appear &ndash; whether originally or later &ndash; to  be contrary to the OSOR.eu principles. The OSOR.eu is not bureaucratic.  It is open to everyone, according to the present Principles. However, if  it appears even after some time, that the software or the content that  was published should be adapted to comply with those principles, the  OSOR.eu web master may request the modification or removal of the  content in question.The OSOR.eu web master can also make the unilateral  decision to remove / put off line or set &ldquo;not visible&rdquo; any web page or  project, after notifying the project owner and justifying such decision.  The OSOR.eu will not be liable for any damage in such case.</p>';
$newNode->teaser = '<h3>Principle 1</h3><p>The OSOR.eu and its services are exclusively reserved for the  exchange and collaboration on Open Source Software. This means that  software or projects that are not released under recognized OSS licences  will not be admitted on the OSOR, or will be removed as the case may  be. The Open Source character of software is defined in the licence,  where the software author(s) or &ldquo;Licensor&rdquo; ensures a number of freedoms  to the licensee:</p>';

// save node
node_save($newNode);
print_r($newNode);

//url_alias
$alias_sql = "UPDATE `{url_alias}` SET `dst` = 'ten_rules' WHERE src = 'node/{$newNode->nid}'; ";
print($alias_sql);
db_query($alias_sql);  