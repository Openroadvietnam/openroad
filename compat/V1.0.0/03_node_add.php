<?php 
	ini_set('display_errors', 1);
	ini_set('log_errors', 1);
	ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
	error_reporting(E_ALL);
	ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
	require_once('./sites/all/modules/contributed/pathauto/pathauto.inc');
	drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'What is semantic interoperability? ';
	$path = 'asset/page/practice_aids/what-semantic-interoperability';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<p>In its  reference document, the \'European Interoperability Framework\', the  European Commission defines interoperability as the ability of  information and communication technology (ICT) systems and the business  processes they support to exchange data and to enable the sharing of  information and knowledge:   \'Semantic Interoperability enables systems to combine received  information with other information resources and to process it in a  meaningful manner\' (EIF 1.0).  It aims at the mental representations that human beings have of the  meaning of any given data.</p>
<div class="sub clearfix">
<h1><a name="1"></a> 							Semantic Interoperability in eGovernment</h1>
<div class="text">
<p>In European eGovernment, for instance, this  would mean that an application in one Member State can access an  information source of another Member State to validate the taxation  status of an enterprise or to check the eligibility of social welfare of  a citizen. For full Semantic Interoperability it is crucial that no  previous knowledge of the way the information is created is needed.  Interoperability can be achieved in different ways: a certain degree can  be established by bilateral and multilateral solutions and suitable  mappings without the need for standardisation.</p>
<p class="moreLink">&nbsp;</p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="2"></a> 							Semantic Interoperability Assets</h1>
<div class="text">
<p>To achieve Semantic Interoperability, the  systems involved must refer to an agreed authority, typically a  terminology that clearly defines the meanings of the items carrying the  information.  The use of controlled terminologies, and controlled mapping tables and  mapping rules for any transformation promises sufficient reliability.  These controlled terminologies and mapping tables, also in their  representations as taxonomies, ontologies, thesauri are called Semantic  Interoperability Assets.</p>
<p class="moreLink">&nbsp;</p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="3"></a> 							Syntactic Interoperability</h1>
<div class="text">
<p>Syntactic Interoperability is a pre-requisite  to Semantic Interoperability. Examples are the use of XML or SQL  standards to make different operating systems and programmes capable of  exchanging data. No semantic communication is possible without an  appropriate syntax and data representation. In a nutshell, one could  define the matter of syntactic interoperability as data, that of  Semantic Interoperability as information or meaning.</p>
<p class="moreLink">&nbsp;</p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="4"></a> 							Interoperability in European eGovernment</h1>
<div class="text">
<p>There are plenty of cross-border projects at  the European level already relying on interoperability assets. Others  would potentially benefit from using such assets. Although there are  several European standardisation initiatives and national  XML-collaboration platforms have emerged, there is not yet an initiative  to install a platform and broker for pan-European assets. Joinup  addresses this shortcoming. It gathers information and supplements  national and sectoral asset repositories and initiatives.</p>
<p class="moreLink">&nbsp;</p>
</div>
</div>
<hr />
<h1><a name="5"></a> 							Interoperability over standardisation</h1>
<p>Creating a standard requires unanimous  agreement of all partners involved. In order to receive the necessary  acceptance, standards have to be created and enforced by an institution  with adequate authority. Given the numerous different economic, legal,  and cultural backgrounds of the Member States, achieving  interoperability without standards is the most efficient solution. Joinup promotes and encourages standardisation and harmonisation  efforts but its main focus will be ensuring interoperability in the best  way possible.</p>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Guidelines and studies';
	$path = 'asset/page/practice_aids/guidelines-and-studies';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<h1>Joinup Documents</h1>
<p>Joinup is producing guidelines and studies related to  questions of semantic interoperability. You can download these  publications here.</p>
<div class="sub clearfix">
<h1><a name="1"></a> 							Conformance Guidelines - The Path to a pan-European Asset</h1>
<div class="img">&nbsp;</div>
<div class="text">
<p>Final draft of Joinup\'s conformance guidelines by example of a Natural Person</p>
<p class="moreLink"><a href="../../../system/files/doc/guidelines_studies/SEMIC-EU-pan-European_Person-Asset-finaldraft.pdf" class="document pdf">Download: Conformance Guidelines (PDF, 0.6MB)</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="2"></a> 							Asset Development Guidelines</h1>
<div class="img">&nbsp;</div>
<div class="text">
<p>These Guidelines are a PDF version of joinup Asset Development Assistant, detailing best practices  encountered in our coaching efforts.</p>
<p class="moreLink"><a href="../../../system/files/doc/guidelines_studies/SEMIC-EU-Asset-Development-Assistant-v1.1.pdf" class="document pdf">Download: Asset Development Guidelines (PDF, 219KB)</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="3"></a> 							Guidelines and Good Practices for Taxonomies</h1>
<div class="img">&nbsp;</div>
<div class="text">
<p>This Joinup study introduces good practices,  usage scenarios for taxonomy development and examines the matching,  mapping and integration of taxonomies</p>
<p class="moreLink"><a href="../../../system/files/doc/guidelines_studies/guidelines-and-good-practices-for-taxonomies-v1.3a.pdf" class="document pdf">Download: Guidelines and Good Practices for Taxonomies (PDF, 733KB)</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="4"></a> 							Study on Methodology</h1>
<div class="img">&nbsp;</div>
<div class="text">
<p>This study presents state-of-the-art  methodologies for treating the different types of semantic conflicts,  i.e. detecting and resolving these conflicts or even avoiding them by  reusing existing solutions.</p>
<p class="moreLink"><a href="../../../system/files/doc/guidelines_studies/semic-eu-study-on-methodology-v1.2.pdf" class="document pdf">Download: Study on Methodology (PDF, 0.5MB)</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="5"></a> 							Asset Production</h1>
<div class="img">&nbsp;</div>
<div class="text">
<p>Reusable interoperability assets enhance  pan-European eGovernment. These guidelines give insight into  interoperability asset production to Member States, projects and  initiatives.</p>
<p class="moreLink"><a href="../../../system/files/doc/guidelines_studies/semic-guideline-for-producing-interoperability-assets-v1.0.pdf" class="document pdf">Download: Producing Interoperability Assets (PDF, 0.3MB) </a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="6"></a> 							Study on Multilingualism</h1>
<div class="img">&nbsp;</div>
<div class="text">
<p>This detailed study on multilingual issues in  data exchange recommends a pivot language approach as the most effective  solution. The study was published in January 2009.</p>
<p class="moreLink"><a href="../../../system/files/doc/guidelines_studies/multilingualism-study.pdf" class="document pdf">Download: Study on multilingualism (PDF, 0.4MB)</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="7"></a> 							Interconnecting Europe - Semantic Interoperability Centre Europe</h1>
<div class="img">&nbsp;</div>
<div class="text">
<p>Published on the occasion of the Launch of  SEMIC.EU, this book outlines the essentials of SEMIC.EU services,  features expert contributions from across Europe and presents SEMIC.EU\'s  project partners.</p>
<p class="moreLink"><a href="../../../system/files/doc/guidelines_studies/Interconnecting-Europe-SEMIC-EU-Book.pdf" class="document pdf">Download Interconnecting Europe (PDF, 2.5MB)</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="8"></a> 							Licensing Framework</h1>
<div class="img">&nbsp;</div>
<div class="text">
<p>For any assets submitted to Joinup a licence  must be specified. The licencing framework and features of different  licences are outlined in this document.</p>
<p class="moreLink"><a href="../../../system/files/doc/guidelines_studies/licensing-framework.pdf" class="document pdf">Download: Licensing Framework (PDF, 0.5MB)</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="9"></a> 							Quality Framework</h1>
<div class="img">&nbsp;</div>
<div class="text">
<p>During the Clearing Process, assets are assessed and enhanced according to the quality criteria outlined in this document.</p>
<p class="moreLink"><a href="../../../system/files/doc/guidelines_studies/quality-framework.pdf" class="document pdf">Download: Quality Framework (PDF, 0.3MB)</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="10"></a> 							Good Practice Study</h1>
<div class="img">&nbsp;</div>
<div class="text">
<p>A number of initiatives in several countries  address issues of interoperability and exchange of solutions. This study  introduces the most important ones and examines their respective  strengths.</p>
<p class="moreLink"><a href="../../../system/files/doc/guidelines_studies/good-practice-study.pdf" class="document pdf">Download: Joinup Good Practice Study (PDF, 1.5 MB)</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="11"></a> 							Vision of the Clearing Process</h1>
<div class="img">&nbsp;</div>
<div class="text">
<p>The study develops the basic parameters of the Joinup Clearing process: stages, roles and quality management.</p>
<p class="moreLink"><a href="../../../system/files/doc/guidelines_studies/vision-of-the-clearing-process.pdf" class="document pdf">Download: Joinup Vision of the Clearing Process (PDF, 1 MB) </a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="12"></a> 							Orientation Paper</h1>
<div class="img">&nbsp;</div>
<div class="text">
<p>Download: This document gives an overview of  the ideas behind Joinup, its purposes and implementation. It is the  general reference document on Joinup.</p>
<p class="moreLink"><a href="../../../system/files/doc/guidelines_studies/semic-orientation-paper.pdf" class="document pdf">Download: Joinup Orientation Paper (PDF, 0.2 MB)</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="13"></a> 							Core Vocabularies &ndash; Joinup Case Study</h1>
<div class="img">&nbsp;</div>
<div class="text">
<p>This case study describes the initiatives of Joinup on creating Core Vocabularies for e-Government.</p>
<p class="moreLink"><a href="../../../system/files/doc/guidelines_studies/Case-Study-Core-Vocabularies.pdf" class="document pdf">Download: Core Vocabularies &ndash; Joinup Case Study (PDF, 0.1 MB)</a></p>
</div>
</div>
<div id="marginal">&nbsp;</div>
<p>&nbsp;</p>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Joinup Core Person: A pan-European schema for personal data ';
	$path = 'asset/page/practice_aids/core-person';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<p>As a shared development activity, Joinup and more than  100 of its users have developed a data model for persons that is  supposed to be used as a core element for any person-related data  exchange in eGovernment projects and public administration in Europe. It is supposed to become the first-ever conformant interoperability  asset. Other core concepts will follow.</p>
<div class="sub clearfix">
<div class="text">
<p class="moreLink">&nbsp;</p>
</div>
</div>
<div class="sub clearfix">
<h1><a name="2"></a> 							Specification of the data model</h1>
<div class="img">&nbsp;</div>
<div class="text">
<p>Joinup Core Person is a collection of  attributes that can be used to identify a physical person independent of  the actual use case. It is extensive enough to allow for the  identification of a person, but at the same time being as small as  possible so that it is more universally reusable in specific use cases.</p>
<p class="moreLink"><a id="j_id108" href="specification_data_model"> 							Details</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="3"></a> 							eGovernment Linked Metadata Cloud</h1>
<div class="img">&nbsp;</div>
<div class="text">
<p>Project Officer Vassilios Peristeras describes  the approach of using &quot;Linked Open Metadata&quot; for Core Concepts,  following Tim Berners-Lee\'s LOD guidelines.</p>
<p class="moreLink"><a id="j_id123" href="linked-metadata"> 							Linked Metadata</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="4"></a> 							Cases of Reuse</h1>
<div class="img">&nbsp;</div>
<div class="text">
<p>Existing and potential implementations of the Joinup core person in a specific context, submitted by users</p>
<p class="moreLink"><a id="j_id138" href="business-cases"> 							Cases of Reuse</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="5"></a> 							Call for test data</h1>
<div class="img">&nbsp;</div>
<div class="text">
<p>For the proofing of implementations and the  eventual awarding of conformance status of the Joinup core person, we  need test data for persons - extreme data like complex name structures,  symbols, variations in attributes etc. will be especially helpful.</p>
<p class="moreLink"><a href="call-test-data-person-data">Call for test data</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="6"></a> 							Design Principles</h1>
<div class="img">&nbsp;</div>
<div class="text">
<p>During the design process 4 principles were  found playing a key role. These principles are recommended for all Joinup users designing interoperability assets.</p>
<p class="moreLink"><a id="j_id168" href="designing-core-concepts"> 							Read more</a></p>
</div>
</div>
<p>&nbsp;</p>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Specification of the data model';
	$path = 'asset/page/practice_aids/specification_data_model';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<h1>&nbsp;</h1>
<div class="imgWithText clearfix">
<p class="img"><img src="../../../system/files/images/core_person.JPG" alt="paragraph" /></p>
<p>The Joinup Core Person model contains eight elements.  These elements are almost always present when dealing with personal  data. The model has been restricted to these eight elements in order to  minimise the potential of semantic conflicts and in order to increase  the possibility for reuse.</p>
</div>
<h2>&nbsp;</h2>
<p>&bull; <strong>Full Name</strong></p>
<p>The  attribute &quot;Full Name&quot; contains the complete name of a person as one  string. In addition to the content of Given Name and Family Name, this  can carry additional parts of a person&rsquo;s name as titles, middle name or  suffixes like &quot;the third&quot; or names which are neither a given nor a  family name.</p>
<p>&bull; <strong>Given Name</strong></p>
<p>A given name is  a denominator given to a person by his/her parents at birth, part of  Full Name. All given names are ordered in one field.</p>
<p>&bull; <strong>Family Name</strong></p>
<p>A  family name is usually shared by members of a family. This attribute  also carries prefixes or suffixes which are part of the Family Name,  e.g. &quot;de Boer&quot;, &quot;van de Putte&quot;, &quot;von und zu Orlow&quot;.</p>
<p>&bull; <strong>Gender</strong></p>
<p>A code specifying the current gender of a person such as male, female, unknown.</p>
<p>&bull; <strong>Date of Birth</strong></p>
<p>A date and/or time that specifies the birth date of a person.</p>
<p>&bull; <strong>Place of Birth</strong></p>
<p>The  code value or text representing the name of the place where the person  was born. Depending on the use case this might be a city, district, or  other part of a country. Additionally it would be useful to add  information about the type of place, i.e. city, region, etc. Depending  on the use case geographic coordinates can be used to indicate the place  of birth.</p>
<p>&bull; <strong>Country of Birth</strong></p>
<p>&nbsp;The code value representing the name of the country at the time the person was born.</p>
<p>&bull; <strong>Citizenship</strong></p>
<p>The code value representing the name(s) of the country(ies) which issued the person a citizenship.</p>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Linked Metadata';
	$path = 'asset/page/practice_aids/linked-metadata';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<div class="singleview" id="main">
<h1>eGovernment Linked Metadata Cloud</h1>
<div class="imgWithText clearfix">
<p><em>by Vassilios Peristeras</em></p>
<p>Linked Open Data (<a href="http://linkeddata.org/" target="_blank">LOD</a>)  refers to publishing and connecting structured data on the Web. The  European Commission already supports work in this area with projects  like <a href="http://lod2.eu/Welcome.html" target="_blank">LOD2</a> and <a href="http://latc-project.eu/" target="_blank">LATC</a>.  Here our approach is slightly different as Joinup does not deal  directly with data but rather with metadata. We could call our approach  Linked Open Metadata, as we do follow the <a target="_blank" href="http://www.w3.org/DesignIssues/LinkedData.html">LOD guidelines</a> proposed by Tim Berners-Lee.</p>
</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p>This means that:</p>
<p>a) we provide our metadata schemas (semantic assets) in open formats (e.g. xml, csv) including rdfs</p>
<p>b) for later, we link and reuse terms from existing rdf vocabularies (<a href="http://esw.w3.org/VocabularyMarket" target="_blank">examples</a>), instead of creating new ones</p>
<p>c) we provide URIs for the new terms we introduce.</p>
<p>As  an example you can find below the Core Person metadata schema expressed  as Linked Open Metadata using concepts from external reference  vocabularies like foaf, bio and dbp.</p>
</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p class="img"><img width="412" height="255" alt="paragraph" src="../../../system/files/images/elmc520.gif" /></p>
</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p>More generally, we have a great  interest in vocabulary and EU-related URI management and we intend to  conduct some pivotal work on this respect in Joinup, in order to  create a set of interrelated, linked schemas with persistent URIs for  reuse. We want to mobilize our community and work together with the MSs  to this direction to create something like an eGovernment Linked  Metadata Cloud, obviously linked and following LOD approaches. This  Metadata Cloud could be used from the 27 EU MSs (and beyond) as a  reference library either to map existing national metadata schemas or  directly as a library of reusable semantics for organizations  kicking-off new projects. We are aware of the difficulties such an  endeavour may encounter, but the interest and the willingness we see for  cooperation towards semantic alignment in several MSs gives us a  promising starting point.</p>
</div>
</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Business cases ';
	$path = 'asset/page/practice_aids/business-cases';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<p>The Joinup Core Person is proofed against business cases submitted by users. Their cases are presented in this section.</p>
<div class="sub clearfix">
<h1><a name="1"></a> 							GBA: Dutch civil register</h1>
<div class="img"><img alt="Emile van der Maas" src="../../../system/files/images/emile-van-der-maas-89.gif" /></div>
<div class="text">
<p>The register of all residents of the  Netherlands used at municipal  level and reused for all other purposes  including person-related data.  Presented by Emile van der Maas, ICTU  Netherlands.</p>
<p class="moreLink"><a id="j_id96" href="gba-dutch-civil-register"> 							Case: GBA - Dutch civil register</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="2"></a> 							RNI: Dutch register of non-inhabitants</h1>
<div class="img"><img alt="Egbert Verwej" src="../../../system/files/images/verwej_89.jpg" /></div>
<div class="text">
<p>Connected to the central catalogue of registry  data in the  Netherlands, this business case lists persons not resident  in the  Netherlands but having a relationship with the Dutch Government.   Presented by Egbert Verweij, Ministry of the Interior, The Netherlands.</p>
<p class="moreLink"><a id="j_id111" href="rni-register-non-inhabitants"> 							Case: Dutch register of non-inhabitants</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="3"></a> 							Persons in Danish public administration</h1>
<div class="img"><img alt="B&oslash;rge Krogh Samuelsen" src="../../../system/files/images/samuelsen-boerge-89.gif" /></div>
<div class="text">
<p>For the processing of person-related data,  Denmark has decided to  implement standards developed by the IDABC  Project EESSI (Electronic  Exchange of Social Security Information).  Presented by B&oslash;rge Krogh  Samuelsen, Local Government Denmark.</p>
<p class="moreLink"><a id="j_id126" href="denmark-local-government"> 							Case: Persons in Danish public administration</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="4"></a> 							Students registries in Croatia</h1>
<div class="img"><img alt="Neven Vrcek" src="../../../system/files/images/vrcek-neven-89.gif" /></div>
<div class="text">
<p>The University of Zagreb has developed a data  model for student  records at the core of which is a unique ID for each  student. Presented  by Neven Vrcek, Faculty of Organization and  Informatics, University of  Zagreb.</p>
<p class="moreLink"><a id="j_id141" href="croatia-students-register"> 							Case: Student registries in Croatia</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="5"></a> 							Voter registers in Russia</h1>
<div class="img"><img alt="Yuri Lipuntsov" src="../../../system/files/images/lipuntsov-yuri-89.gif" /></div>
<div class="text">
<p>The &quot;Vybory&quot; register in Russia addresses the  challenges of  interoperability of systems at different administrative  levels with a  focus on accurate identification of individuals as voters.  Presented by  Yuri Lipuntsov, Lomonosov Moscow State University, Faculty  of  Economics.</p>
<p class="moreLink"><a id="j_id156" href="russian-voters-register"> 							Case: Voter registers in Russia</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="6"></a> 							BAA: Persons and Organisations at Airports</h1>
<div class="img"><img alt="Segun Alayande" src="../../../system/files/images/alayande-segun-89.gif" /></div>
<div class="text">
<p>A person is only one of three actors  represented in the information  model developed for British Airport  operator BAA. Other &quot;parties&quot; are  organisations and groups. Presented by  Sigun Alayande, BAA.</p>
<p class="moreLink"><a id="j_id171" href="baa-airports-limited-united-kingdom"> 							Case: Parties at British Airports Authority</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="7"></a> 							National Health Service in the United Kingdom</h1>
<div class="img"><img alt="Mark Reynolds" src="../../../system/files/images/mark_reynolds_89.jpg" /></div>
<div class="text">
<p>Data model for the national demographics database used by the UK\'s National Health Service (NHS). Presented by Mark Reynolds</p>
</div>
</div>
<p>&nbsp;</p>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'GBA Dutch Civil Register ';
	$path = 'asset/page/practice_aids/gba-dutch-civil-register';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<div class="singleview" id="main">
<h1>&nbsp;</h1>
<div class="imgWithText clearfix">
<p><strong>a Business Case for the Joinup Core Person<br />
</strong>The  Dutch public administration operates two citizen registers. One  register is the GBA, the Dutch civil register and the second register is  RNI, the register of people working in the Netherlands but living in  another country.</p>
</div>
<h2>Emile van der Maas on selected topics</h2>
<div class="imgWithText clearfix">&nbsp;</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p><strong>Use cases</strong></p>
<p>At  data level, the general requirement for the Dutch public administration  is to uniquely identify a person. At the semantic level, their roll and  context must also be described in order to be relevant for a business  case.</p>
</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p><strong>Resources: The Stelselcatalogus</strong></p>
<p>In the Netherlands, there is a repository of metadata called the &ldquo;<a href="https://catalogus.stelselcatalogus.nl/StelselCatalogus/WAStelselcatalogus/home?init=true">Stelselcatalogus</a>&rdquo;  (Systematic catalogue). It lists all general specifications and  registration catalogue schemes used in the Netherlands. It does not yet  incorporate XML schemas and must be regarded as a metadata catalogue at  the current state. In the context of personal data, the standardised  person data stored in local registers (GBA register) and the register of  non-residents (RNI) are the core resources.<br />
The Stelselcatalogus is  used as a central reference. All data collected in one authority is  mandatory to be reused whenever another authority processes data of the  same person / entity.</p>
</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p><strong>Standards</strong></p>
<p>There should be just one single transformation standard for data (on persons) in public administration.</p>
</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p><strong>Names</strong></p>
<p>The name attribute has a granularity level that is different from the one of the Joinup Core Person</p>
</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p><strong>Code lists</strong></p>
<p>On  the domain levels, the Dutch administration uses standardised code  list. This should be considered for a central exchange format as well.</p>
</div>
</div>
<div id="marginal">
<div class="marginalBox">&nbsp;</div>
<p class="moreLink">&nbsp;</p>
</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'RNI Register of Non-Inhabitants ';
	$path = 'asset/page/practice_aids/rni-register-non-inhabitants';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<div class="singleview" id="main">
<h1>&nbsp;</h1>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p><strong>a Business Case for the Joinup Core Person<br />
</strong></p>
<p>The  Dutch public administration operates two citizen registers. One  register is the GBA, the Dutch civil register and the second register is  RNI, the register of people working in the Netherlands but living in  another country.</p>
</div>
<h2>Egbert Verweij on selected topics</h2>
<div class="imgWithText clearfix">&nbsp;</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p><strong>Use cases</strong></p>
<p>RNI  registers only basic data in a central database used by all relevant  public organisations and maintained by organisations which are in  contact with non-inhabitants on a regular basis. In comparison with GBA  the dataset is much smaller, as most data is not relevant and  additionally it would require a substantial amount of effort to collect  such data. <br />
The dataset maintained for foreigners consists of:<br />
-&nbsp;&nbsp; &nbsp;Dutch Civil Service Number <br />
-&nbsp;&nbsp; &nbsp;Name (Family Name, Given Name, Honorary Titles)<br />
-&nbsp;&nbsp; &nbsp;Birth (Date, Place, Country)<br />
-&nbsp;&nbsp; &nbsp;Gender<br />
-&nbsp;&nbsp; &nbsp;Nationality<br />
-&nbsp;&nbsp; &nbsp;Death (Date, Place, Country)<br />
-&nbsp;&nbsp; &nbsp;Address (abroad address where the person is living)<br />
&nbsp;</p>
</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p><strong>Example</strong></p>
<p>If  a person used to live in the Netherlands but moved to another country,  the data that was maintained during the period the person lived in the  Netherlands stays in the registration, but is not further maintained.  For example, when an emigrant divorces abroad, the marriage is still  visible in the dataset, but the divorce is not registered. When  distributing the data, the receiving organisation is told that the data  on the marriage is updated only until the date of emigration.<br />
In  case of data transfer from RNI to GBA (when a person moved to the  Netherlands) only missing information is added. The rest is just  validated, there is no entirely new acquisition, making the transfer of  data a default test case for the validity of existing data sets.</p>
</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p><strong>Reuse</strong></p>
<p>The  Netherlands are building a central register for data on persons (and  other entities like buildings, companies&hellip;). All public institutions can  use it. The idea is reuse of existing data sets instead of new  acquisition.</p>
</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p><strong>ID</strong></p>
<p>For  the purpose of the Dutch register of Non-Inhabitants, the inclusion of  the Social Security Number as a unique ID for persons is indispensible.</p>
</div>
</div>
<div id="marginal">&nbsp;</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Croatia: Students Register ';
	$path = 'asset/page/practice_aids/croatia-students-register';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<div class="singleview" id="main">
<h1>&nbsp;</h1>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p><strong>a Business Case for the Joinup Core Person</strong></p>
<p>The  person data model is used for student records at the University of  Zagreb. The University of Zagreb has a centralized information system  for student affairs. Exchange of data happens mostly from the central  system to faculties for additional analysis at the faculty level, and  from faculties to the central system for occasional mass data entry.<br />
The basis of the centralised system has been in use for ten years and comprises students, subjects and marks.<br />
The faculties will in practice need more information than is stored in  the central system. Information units will be complemented with the  specific data for each business case.</p>
</div>
<h2>Neven Vrček on selected topics</h2>
<div class="imgWithText clearfix">&nbsp;</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p><strong>Mapping</strong></p>
<p>Considering  the structure and content of the two, it will not be problem to map his  student record model to the Joinup Core Person.</p>
</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p><strong>ID</strong></p>
<p>In  contrast to the Joinup Core Person, the student record model includes  an identification number. In fact, this ID is the key identifier. Other  case-specific attributes are: marks, subjects, projects a student is  involved in.</p>
</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p><strong>Other core concepts</strong>&nbsp;&nbsp;</p>
<p>Other data for which core concepts for pan-European use should be developed:</p>
<p>- Human Resources data (skills, qualifications), labour mobility<br />
- Student exchanges, student mobility</p>
</div>
</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Russian Voters Register ';
	$path = 'asset/page/practice_aids/russian-voters-register';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<div id="main" class="singleview"><br />
<div class="imgWithText clearfix">
<p><strong>Description of the business case</strong></p>
<p>The information system &quot;Выборы&quot; (<em>&quot;Vybory&quot;</em>, <em>engl: Election</em>) of the Russian Federation uses the data of the Russian civil registration.<br />
The main purpose of the information system is to reproduce the voter  lists, where every citizen who is eligible for voting is listed.  Additionally, the data is used for demographic statistics, e.g.  forecasts on  pensions.<br />
Information is collected at three levels: local, regional and federal. In every level there is a different source of data:<br />
<br />
&nbsp;- Local level: the majority of voters,<br />
&nbsp;- Regional level: the data of military personnel and prisoners,<br />
&nbsp;- Federal level: citizens living abroad<br />
<br />
The data from a local voting district is transferred to the regional  level, and the data from the regional level is transferred to the  federal level.</p>
<p><strong>Difficulties</strong><br />
The main  challenge behind the voters register are double entries. When the  collection of data was undertaken for the first time, the number of  double entries was about 5% of the total data. One person may be  registered two times, if they move from one region (i.e. register) to  another in a short period of time. Considering the attributes of the  Joinup Core Person - <em>Full Name</em>, <em>Given Name</em>, <em>Family Name</em>,<em> Date of Birth</em> and <em>Place of Birth</em>  would not be sufficient for unique identification of a citizen and  therefore avoidance of double entries. In large cities as e.g. Moscow,  newborns with common names would lead to double entries (Names, Date of  Birth and Place of Birth being identical),&nbsp; therefore the information  system &quot;Vybory&quot; needs to make use of a unique ID - in this case the  Passport number.<br />
<br />
A double entry in the voting register can also  happen when a citizen moves from one region to another. From his former  region the citizen receives a document for registration which he hands  to the passport office  of the region where he is moving to. After  handing in this document the citizen is included in list of voters of  his new region. In the former region the citizen is excluded only after  the confirmation from the government. Until this the voter is registered  two times in &quot;Vybory&quot;.<br />
<br />
Groups of people with high risk of leading to double entries:<br />
- Citizens with dual nationality living abroad<br />
- Citizens on long-term business trip<br />
- Inter-region migration within Russian Federation<br />
- Students studying outside their home region<br />
<br />
<strong>Data scheme</strong><br />
The voters register consists of four tables: Person details, address,  document for identification and the election event. A special attribute  of personal data for elections is the field &quot;disability&quot; - a property  which reflects the fact whether or not a citizen has the right to vote.  It may be revoked due to mental disorder - a decision to be made by  court.<br />
Additionally the Department of Interior can revoke the right  to vote for convicts. The address is obligatory to identify citizens for  local elections.<br />
<br />
All changes on the data are saved and it is  possible to do a roll back at any time. This allows to reproduce a  sequence of life events for the individual citizen.<br />
The voter  register has been in place in different versions since the Yeltsin  government. Students are a particularly difficult case if transferred  from a university register to the voter register:<br />
Their data &ndash; which  includes information on courses taken &ndash; is registered on campus with  the university. But as yet, no notice is given upon leaving a university  place.<br />
So updating becomes critical, especially because voting documents can be received after (temporary) registration.</p>
</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p><strong>ID</strong></p>
<p>There is no universial ID number used for the voters registers, only the passport series and passport numbers.</p>
</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p><strong>Maintenance</strong></p>
<p>The  Russian law requires updates of the voter register every three months  at the national level. At the local and regional levels, it must be  updated monthly.<br />
Validation and updating for single cases takes  place whenever a person moves, and the data has to be transferred  between regions.</p>
</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p><strong>Other core concepts</strong></p>
<p>These other core concepts should be considered besides the Core Person:</p>
<p>&bull;&nbsp;&nbsp;&nbsp;  Address (because of the interconnection of voter register and agencies,  recruitment offices, Ministry of the Interior, passport authority).  Address should be universal for all places.<br />
&bull;&nbsp;&nbsp;&nbsp; Life events model for citizens and businesses</p>
</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p><strong>Ownership</strong></p>
<p>The Russian voter data model is owned and maintained by <a href="http://insoft.ru/insoft/products/products_kz_REGISTR_IZBIRATELEI.htm">INSOFT</a></p>
</div>
</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'BAA Airports Limited, United Kingdom ';
	$path = 'asset/page/practice_aids/baa-airports-limited-united-kingdom';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<h1>&nbsp;</h1>
<div class="imgWithText clearfix">
<p class="img"><img alt="paragraph" src="../../../system/files/images/baa-party-identity.gif" /></p>
<p><strong>a Business Case for the Joinup Core Person</strong></p>
<p>The  information standards authority in BAA models Persons, Groups and  Organisations as parties of interest in the daily operations of the  airport. Passengers, Security Personnel, Government Agencies, Airlines  and Ground Handlers are modeled as roles played by these business  parties in business interactions.</p>
<p>Information exchange occurs in the Airport between these parties and may include:</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;<strong>&bull;</strong>&nbsp;&nbsp;&nbsp;Airline to Airport communication<br />
&nbsp;&nbsp;&nbsp;&nbsp;<strong>&bull;</strong>&nbsp;&nbsp;&nbsp;Airport to Airport communication<br />
&nbsp;&nbsp;&nbsp;&nbsp;<strong>&bull;</strong>&nbsp;&nbsp;&nbsp;Government Agencies  to Airport communication<br />
&nbsp;&nbsp;&nbsp;&nbsp;<strong>&bull;</strong>&nbsp;&nbsp;&nbsp;Regulatory Agencies to Airport communication<br />
&nbsp;&nbsp;&nbsp;&nbsp;<strong>&bull;</strong>&nbsp;&nbsp;&nbsp;Passenger to Airport communication<br />
&nbsp;&nbsp;&nbsp;&nbsp;<strong>&bull;</strong>&nbsp;&nbsp;&nbsp;Ground Handler to Airport communication<br />
&nbsp;&nbsp;&nbsp;&nbsp;<strong>&bull;</strong>&nbsp;&nbsp;&nbsp;Airport Business Unit to Airport Business Unit communication<br />
&nbsp;&nbsp;&nbsp;&nbsp;<strong>&bull;</strong>&nbsp;&nbsp;&nbsp;Staff to Staff communication</p>
<p>These  communications require meaningful messages comprising data elements  that need be based on a shared vocabulary and derived from a common  knowledge of the airport community. The common knowledge of the airport  community is represented as a common information model. The BAA common  information model is encoded into XML components that are used to create  digital messages.</p>
<p>The variety of business communication requires  the common information model to be abstract and detailed and easy to  re-use in various communication context. For example, the Party  information object is detailed enough to support personnel information  exchange and so the model is much granular in comparison to the Joinup Core Person.</p>
<p>The image on the left is part of the BAA common  information model for the party information object. It illustrates how  the party identity is modeled. It introduces a flexibility that  recognises the fact that a party may be identified in various ways. Of  interest is the granularity of the name-related information.</p>
</div>
<h2>Segun Alayande on selected topics</h2>
<div class="imgWithText clearfix">&nbsp;</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p><strong>Roles</strong></p>
<p>The  concept of &quot;role&quot; is central to the modeling of a person, an  organisation or a group of persons in BAA&rsquo;s information model. A party  might be an individual person, a group of persons (as in a family) or an  organisation. These types of parties may have multiple identities and  act in various roles depending on the business context. A person who is  acting in the role of an employee in one period may also act as a  Passenger on another occasion in the same Airport. The role of the party  is determined by the function of that party within the context of a  process or business interaction. The role of a party may be transient,  that is, temporary (as in a Passenger). A party&rsquo;s identity is a  collection of attributes that identify that party.</p>
</div>
<h2>&nbsp;</h2>
<p><strong>Standards</strong></p>
<p>Information  standards in BAA are developed within the context of an Enterprise  Information Architecture. BAA Information Architecture practice creates  information standards with standards. BAA&rsquo;s information standards are  aligned to a number of method and product standards.</p>
<p>The ISO  11179 and ISO 15000 (UN/CEFACT Core Components Technical Specification)  method standards are used to develop BAA&rsquo;s information standards. BAA&rsquo;s  development process is a variant of the UN/CEFACT&rsquo;s UNCEFACT Modelling  Methodology (UMM 2.0).</p>
<p>BAA practices re-use at two levels, it  re-uses global and industry information standards like UN/CEFACT - OASIS  UBL, EUROCONTROL</p>
<p><a href="http://www.eurocontrol.int/eatm/public/standard_page/foips.html">FOIPS</a></p>
<p>(Flight Objects Interoperability Proposed Standard) and IATA AIDX and  PADEX where possible. BAA is also working within some of these standards  organisations to create new standards and evolve existing standards.  The adoption of XML standards provides BAA with flexible digital  communications infrastructure that realizes a real-time Airport.</p>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Denmark: Local Government ';
	$path = 'asset/page/practice_aids/denmark-local-government';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<div class="singleview" id="main">
<h1>&nbsp;</h1>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p><strong>a Business Case for the Joinup Core Person<br />
</strong></p>
</div>
<h2>B&oslash;rge Krogh Samuelsen on selected topics</h2>
<div class="imgWithText clearfix">&nbsp;</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p><strong>Standards</strong></p>
<p>I was a reviewer for the standards developed in the <a href="http://ec.europa.eu/idabc/en/document/7189/">EESSI</a> project (an IDABC project). They will be implemented in all Danish government.</p>
</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p><strong>Variability</strong></p>
<p>Any  core person needs an element &ldquo;Curriculum vitae&rdquo; to be capable of  representing changes in persons: names, nationalities, sexes can vary  over the course of a lifetime. A CV element can be used to cover these  changes and document former states, e.g. their original nationality that  might be relevant for pension payments.<br />
&ldquo;Curriculum vitae&rdquo; was  chosen in the Danish case as a deliberately generic element that makes  the reuse of the model more likely.<br />
For the Joinup Core Person I  suggest introducing a time t marking the point in time for which the  data is validated. An element indicating whether a person is alive might  also add valuable information.</p>
</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p><strong>ID</strong></p>
<p>The  XML schema for persons used in Danish administrative practice includes a  civil registration number that is comparable only to the Swedish model.  Many other countries do not use such a central number. For accessible  and interoperable services, this number is very useful: It can also be  used by and for banks, health care etc.</p>
</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p><strong>Other core concepts</strong></p>
<p>In  general, one must be careful in using the term &ldquo;attribute&rdquo;. The word is  understood differently in different countries. While it might just be  any describing feature for a person in one, it might be a fixed set or  at the beholder&rsquo;s discretion what an attribute of a person is.</p>
</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p><strong>Mappings</strong></p>
<p>OWL is used for mappings in Denmark.</p>
</div>
</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Call for test data: Person data ';
	$path = 'asset/page/practice_aids/call-test-data-person-data';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<h1>&nbsp;</h1>
<p>23/08/2010</p>
<p>The final draft of the Joinup Core Person will be tested for  maturity and conformity in the coming weeks. Test values are needed to  proof the practicality of the model.</p>
<p>If you<br />
<br />
- can provide test data (real or dummy values)<br />
<br />
- know of sources for test data on persons<br />
<br />
please go to the <a href="../../../contact">contact form.</a><br />
<br />
&quot;Extreme data&quot; will be particularly useful - national peculiarities in name structures, gender definitions, birth dates etc.</p>
<p>&nbsp;</p>
<p><strong>For more information</strong></p>
<p>see the <a href="core-person">Joinup Core Person</a> section</p>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Designing Core Concepts ';
	$path = 'asset/page/practice_aids/designing-core-concepts';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<h1>&nbsp;</h1>
<p>When designing Joinup Core Concepts, or any other  interoperability asset for that matter, there are four basic principles  that should be followed.</p>
<div class="sub clearfix">
<div class="text">
<p>The following statements are the results of Joinup shared development processes and coaching sessions. They  can be considered best practice and are tested in practice.</p>
<p>More content will be added here as a result of future experience.</p>
<p class="moreLink">&nbsp;</p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="2"></a> 							Define your use case</h1>
<div class="img"><img alt="Principle 1" src="../../../system/files/images/principle_1.jpg" /></div>
<div class="text">
<p>A use case needs to be cleary specified, as it  is used to validate a schema against it: which data needs to be  represented, this can only be decided based on the underlying use case.</p>
<p class="moreLink"><a id="j_id107" href="principle-1-define-your-use-case"> 							more</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="3"></a> 							Reuse existing material</h1>
<div class="img"><img alt="Principle 2" src="../../../system/files/images/principle_2.jpg" /></div>
<div class="text">
<p>Existing material should be evaluated  regarding the previously specified use case. Try to find models and  concepts which are supportive for your use case and identify schema  elements which could be adopted.</p>
<p class="moreLink"><a id="j_id122" href="principle-2-reuse-existing-material"> 							more</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="4"></a> 							Reduce Complexity</h1>
<div class="img"><img alt="Principle 3" src="../../../system/files/images/principle_3.jpg" /></div>
<div class="text">
<p>A data exchange schema should not exceed a  certain level of complexity. Less complexity means less potential for  semantic conflicts. This level should be determined by a use case.</p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="5"></a> 							Semantic Documentation</h1>
<div class="img"><img alt="Principle 4" src="../../../system/files/images/principle_4.jpg" /></div>
<div class="text">
<p>Add to your model descriptions of the exact  meaning of all its elements. Even if you think that the name of an  element defines its meaning unambiguously, the meaning may not be that  clear for people from other countries and other cultural backgrounds.</p>
</div>
</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Principle 1: Define your use case ';
	$path = 'asset/page/practice_aids/principle-1-define-your-use-case';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<div class="singleview" id="main">
<h1>&nbsp;</h1>
<div class="imgWithText clearfix">
<p>It is necessary to define a use  case to be able to validate your schema against it. In our situation we  had to realize that there is no &ldquo;Person&rdquo; use case per se. That means,  in each of the currently available assets modelling a natural person,  the assets are in reality modelling a role that a natural person is  acting out in the context of the data exchange.<br />
<br />
In order to be  able to decide which attributes are necessary and which can be left out,  we need a use case. Otherwise it will be very hard to be able to  ultimately reason about the necessity of a certain attribute. As we want  to achieve a schema which serves as the basic foundation for every  person-related data exchange within Europe, we chose the following  approach:</p>
<p>&bull; We define a use case in order to be able to  decide on attributes to include in the schema representation of the  natural person.</p>
<p>&bull; We try to define the use case as general as  possible so the attributes part of the schema represent the most basic  attributes necessary for representing a person. This minimal set of  attributes will be known as &quot;Joinup Core Person&quot;.</p>
<p>&bull; For the  actual data exchange, the specific use case decides on what attributes  are added to the &ldquo;Joinup Core Person&rdquo;, to create a use case specific  Global Schema.</p>
</div>
</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Principle 2: Reuse existing material ';
	$path = 'asset/page/practice_aids/principle-2-reuse-existing-material';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<h1>&nbsp;</h1>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p>The reuse of existing models  raises the acceptance of your data exchange model. Building on  widespread standards raises the potential of reuse. Profiting from the  experiences of other projects potentially raises the quality of your  schema and saves time.</p>
<p>For modelling the Joinup Core Person  existing personal schemas should be evaluated regarding the previously  specified use case. Which personal schemas are already designed for a  similar scenario and which attributes are used? This information may be  helpful in designing the Joinup Core Person.</p>
</div>
<h2>UN/CEFACT Core Components</h2>
<p class="img"><img alt="paragraph" src="../../../system/files/images/Unbenannt.png" /></p>
<p>The central idea is a Core Component (CC). Core Components  are semantic building blocks that can be used for all aspects of data  and information modelling. They encourage a semantically correct and  meaningful information exchange.<br />
<br />
There are three types of Core Components:</p>
<ul>
    <li>Basic Core Components (BCC): - used to represent attributes of a schema</li>
    <li>Aggregate Core Component (ACC): - used to aggregate BCCs and ASCCs</li>
    <li>Association Core Component (ASCC) - represents associations between ACCs</li>
</ul>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Code lists';
	$path = 'asset/page/practice_aids/code-lists';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<h1>&nbsp;</h1>
<p>Code lists, catalogue, authority table - the concept of  code lists has many names and is widely used in the field of data  exchange. It is a simple but effective means of standardisation and a  popular type of semantic interoperability asset in the Joinup  repository.  Finding the one needed for reuse is important. Well structured and  defined types of code lists help to do so and improve the overall  quality of code lists as interoperability assets.</p>
<div class="sub clearfix">
<h1><a name="2"></a> 							Recommendations</h1>
<div class="img"><img src="../../../system/files/images/code-list-recommendations.gif" alt="Code list recommendations by SEMIC.EU" /></div>
<div class="text">
<p>A list of recommendations for harmonised use of code lists in European public administration</p>
<p class="moreLink"><a href="code-list-recommendations-version-10" id="j_id108"> 							Code list recommendations</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="3"></a> 							Four Usage Types of Code Lists</h1>
<div class="img"><img src="../../../system/files/images/COLOURBOX553697.jpg" alt="" /></div>
<div class="text">
<p>Joinup is convinced that these four  approaches to code list design and validation can add interoperability  value to code list creation and use.</p>
<p class="moreLink"><a href="first-step-forward-usage-types-code-lists" id="j_id123"> 							Framework: Code list types</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="4"></a> 							Interview with the Clearing Manager</h1>
<div class="img"><img src="../../../system/files/images/clearing-manager-width.gif" alt="Stephan Meyer, SEMIC.EU Clearing Process coordinator" /></div>
<div class="text">
<p>Stephan Meyer, head of the Joinup Clearing  Management department, claims in the interview that code lists are keys  to enable semantic interoperability.</p>
<p class="moreLink"><a href="use-cases-key-code-list-reusability">Interview: Stephan Meyer</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="5"></a> 							Interview with Frank Steimke, Head of OSCI-Leitstelle</h1>
<div class="img"><img src="../../../system/files/images/Steimke_Frank_LQ.jpg" alt="" /></div>
<div class="text">
<p>Frank Steimke, representative for &quot;Deutschland  Online&quot; outlines an exemplary approach for code list distribution in  Europe. He is responsible for the upcoming X&Ouml;V Handbook, a new framework  document containing rules and guidelines in data model development for  public administrations in Germany.</p>
<p class="moreLink"><a href="german-code-list-concept-europe">Interview: Frank Steimke</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="6"></a> 							Code lists in the Joinup Repository</h1>
<div class="img"><img src="../../../system/files/images/codelist-auszug1.gif" alt="" /></div>
<div class="text">
<p>Take a look at the J Repository, and find there more than 100 code lists from numerous domains and countries.</p>
<p class="moreLink"><a href="../../all">Code lists in the repository</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="7"></a> 							Code list  inquiries</h1>
<div class="img"><img src="../../../system/files/images/contact.gif" alt="snapshot of cell phone calling SEMIC.EU" /></div>
<div class="text">
<p>Share your ideas and insights about code lists  with Joinup. Contact the Clearing Manager and get to know more about  the action plan.</p>
<p class="moreLink"><a href="../../../contact" id="j_id183"> 							Contact Joinup Clearing Management</a></p>
</div>
</div>
<p>&nbsp;</p>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Code list recommendations, version 1.0 ';
	$path = 'asset/page/practice_aids/code-list-recommendations-version-10';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<div class="text">
<h2>&nbsp;</h2>
<p>A code list (or catalogue, value list, enumeration) lists  terms and codes representing these terms in electronic data exchange.  Well known examples are the ISO country code list (<a href="http://www.iso.org/iso/country_codes/iso_3166_code_lists/english_country_names_and_code_elements.htm" target="_blank">ISO 3166</a>) or the <a target="_blank" href="http://www.iata.org/whatwedo/aircraft_operations/codes/index">IATA airport codes</a>.</p>
<p>Based  on consultation with the community, Joinup Clearing recommends the  following practices for the creation, use and exchange of code lists</p>
</div>
<div class="left">
<h2>Recommendations &ndash; Creation</h2>
<div class="imgWithText clearfix">
<ul>
    <li>Keep codes short and unique&nbsp;</li>
    <li>Add clarification (=semantic statement) wherever the meaning is not completely clear&nbsp;</li>
</ul>
</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p class="img" style="width: 542px;"><img src="http://www.semic.eu/semic/jcpimage/blue-line2.gif?uuid=d1a9b8e9-f28a-4976-a8c9-950841bfdf39" alt="paragraph.image.altTag" /></p>
</div>
<h2>Recommendations &ndash; Use</h2>
<div class="imgWithText clearfix">
<ul>
    <li>Clarify the scenario of use (e.g. using the <a href="first-step-forward-usage-types-code-lists">4 types</a> suggested by Joinup)&nbsp;</li>
    <li>Clarify provision (incl. versioning, persistence, etc.) of the code list&nbsp;</li>
    <li>Clarify how the code list will be maintained, esp. if the code list will be used externally</li>
</ul>
</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p class="img" style="width: 542px;"><img src="http://www.semic.eu/semic/jcpimage/blue-line2.gif?uuid=97e90aa3-3eee-41c3-bc8f-b7d5ffa7e079" alt="paragraph.image.altTag" /></p>
</div>
<h2>Recommendations &ndash; Exchange</h2>
<div class="imgWithText clearfix">
<ul>
    <li>Prepare human-readable format for discussion and for easy reuse (e.g. csv file)&nbsp;</li>
    <li>Prepare machine-readable format for easy exchange and automated processing; Joinup recommends the use of <a href="http://www.genericode.org/" target="_blank">OASIS Genericode</a></li>
</ul>
</div>
<h2>&nbsp;</h2>
<div class="imgWithText clearfix">
<p class="img" style="width: 542px;"><img src="http://www.semic.eu/semic/jcpimage/blue-line2.gif?uuid=0a91e767-4641-43a9-bf38-70cb0fe73a7f" alt="paragraph.image.altTag" /></p>
</div>
<h2>Changes in Joinup Clearing Process and new services</h2>
<div class="imgWithText clearfix">
<ul>
    <li>Upon request by the asset agent/owner, Joinup may add OASIS Genericode representations to Assets containing code lists&nbsp;</li>
    <li>Joinup recommends to all asset agents to publish code lists as separate assets&nbsp;</li>
    <li>Joinup will no longer grant maturity status to assets that do not provide a machine-readable presentation of their code lists</li>
</ul>
</div>
</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'First step forward: Usage Types of Code Lists ';
	$path = 'asset/page/practice_aids/first-step-forward-usage-types-code-lists';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<div class="text">
<p>The European audience is requested to evaluate the  following draft framework, taken from the German X&Ouml;V Handbook, which  distinguishes four different types of usage types of code lists.</p>
<p>The following page provides an overview.</p>
</div>
<h2>Framework: Four Types of Code Lists</h2>
<div class="imgWithText clearfix">
<p>Below you will find four types of usage of code lists, as well as guidelines and examples:</p>
<ul>
    <li><a href="standard-code-list-type-1">Standard Code List (Type 1)</a></li>
    <li><a href="named-code-list-type-2">Named Code List (Type 2)</a></li>
    <li><a href="version-free-code-list-type-3">Version free Code List (Type 3)</a></li>
    <li><a href="version-free-code-list-type-4">Generic Code List (Type 4)</a></li>
</ul>
<p>&nbsp;</p>
</div>
<h2>Overview</h2>
<p>Type 1 and Type 2 include the code list within their  definition. The code list is therefore explicitely determined, that  means the list (for example List of Countries according to ISO 3166) and  its version (for example 22.04.1950) are determined within the asset.</p>
<p>This is not the case for Type 3 and Type 4.</p>
<p>Here,  only at runtime within the context of the transferred codes in the XML  message instance it is defined which version (Type 3) or even which code  list (Type 4) the code refers to. Type 1 has the entries of the code  list explicitly defined within the XML Schema, while Type 2 relies on  having the entries of the code lists defined at a suitable place.  Characteristics of the different types:</p>
<p>&nbsp;</p>
<table cellspacing="1" cellpadding="1" border="1" style="width: 300px; height: 658px;">
    <tbody>
        <tr>
            <th>&nbsp;</th>
            <th>&nbsp;Type 1</th>
            <th>&nbsp;Type 2</th>
            <th>&nbsp;Type 3</th>
            <th>&nbsp;Type 4</th>
        </tr>
        <tr>
            <td>Name</td>
            <td>Standard Code List</td>
            <td>Named Code List</td>
            <td>Version free Code List</td>
            <td>Generic Code List</td>
        </tr>
        <tr>
            <td>Characteristic</td>
            <td>
            <p>Code list is part of the Standard</p>
            </td>
            <td>Identifier and Version of the Code List are determinated in the Standard</td>
            <td>Identifier  of the Code List is determinated in the Standard, the version is  defined in the message instance at runtime by the application.</td>
            <td>Neither identifier, nor version are determinated in the Standard, both are defined at runtime.</td>
        </tr>
        <tr>
            <td>Code list is&nbsp; used version-relevantely?</td>
            <td>yes</td>
            <td>yes</td>
            <td>no</td>
            <td>no</td>
        </tr>
        <tr>
            <td>Code list is used to validate the Schema?</td>
            <td>yes</td>
            <td>no</td>
            <td>no</td>
            <td>no</td>
        </tr>
        <tr>
            <td>code (Data type)</td>
            <td>concrete type of Code List, defined in Standard (using xs:enumeration)</td>
            <td>xs:token</td>
            <td>xs:token</td>
            <td>xs:token</td>
        </tr>
        <tr>
            <td>code (Multiplicity)</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
        </tr>
        <tr>
            <td>name (Data type)</td>
            <td>xs:normalizedString</td>
            <td>xs:normalizedString</td>
            <td>xs:normalizedString</td>
            <td>xs:normalizedString</td>
        </tr>
        <tr>
            <td>listURI (Data type)</td>
            <td>xs:anyURI</td>
            <td>xs:anyURI</td>
            <td>xs:anyURI</td>
            <td>xs:anyURI</td>
        </tr>
        <tr>
            <td>listURI (Multiplicity)</td>
            <td>0..1 (with default value)</td>
            <td>0..1 (with default value)</td>
            <td>0..1 (with default value)</td>
            <td>1 (no default value)</td>
        </tr>
        <tr>
            <td>listVersionID (Data type)</td>
            <td>xs:normalizedString</td>
            <td>xs:normalizedString</td>
            <td>xs:normalizedString</td>
            <td>xs:normalizedString</td>
        </tr>
        <tr>
            <td>listVersionID (Multiplicity)</td>
            <td>0..1 (with default value)</td>
            <td>0..1 (with default value)</td>
            <td>1 (no default value)</td>
            <td>1 (no default value)</td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Standard Code list (Type 1) ';
	$path = 'asset/page/practice_aids/standard-code-list-type-1';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<div class="text">
<p>Standard Code list (Type 1) describes the highest degree  of integration a code list can have in a specification for data  exchange. The distinguishing feature of Type 1 is that <strong>the code list is integrated into the XML schema</strong>  of the data exchange model. This allows for schema validation at run  time, i.e. it effectively restricts the possible values in a data field  of the XML file. Using invalid codes also makes the XML file invalid.</p>
</div>
<div class="left">
<div class="imgWithText clearfix">
<p>This creates a high bindingness to the code list. On the  other hand the code list can only be changed with a new release of the  specification.</p>
<p><strong>Please note</strong>: As a code list  owner, you should provide it as a separate, related asset on Joinup  regardless of its degree of integration into the specification. This  increases the reusability and comparability of code lists significantly.</p>
</div>
<h2>When to use a code list as Type 1:</h2>
<div class="imgWithText clearfix">
<p>You should use a code list as Type 1 if</p>
<ul>
    <li>you want to use the possibilities of <strong>XML schema validation to detect invalid code entries</strong>.</li>
    <li>the code list is an <strong>integral part of your specification that will not be changed independently</strong> from the specification.</li>
</ul>
<p>&nbsp;</p>
</div>
<h2>When not to use a code list as Type 1:</h2>
<div class="imgWithText clearfix">
<p>You should not use a code list as Type 1 if</p>
<ul>
    <li>you do not need XML schema validation - consider Type <a href="named-code-list-type-2">2</a>, <a href="version-free-code-list-type-3">3</a>, or <a href="version-free-code-list-type-4">4</a> instead</li>
    <li>the code list is expected to change  more often than the specification itself - consider Type <a href="version-free-code-list-type-3">3</a> or <a href="version-free-code-list-type-4">4</a> instead</li>
    <li>the  code list is maintained by another organisation and you cannot be sure  to be informed of changes to the code list in due time - consider Type <a href="version-free-code-list-type-3">3</a> or <a href="version-free-code-list-type-4">4</a> instead.</li>
</ul>
<p>&nbsp;</p>
</div>
<h2>Advantages of Type 1 code lists:</h2>
<div class="imgWithText clearfix">
<ul>
    <li>The code list is highly integrated with the  specification and cannot change without changing the specification. Thus  the code list is highly stable and easy to integrate into applications.</li>
    <li>XML  schema validation is used to verify that only valid codes are  transmitted. Thus applications can work on the assumption that only  valid codes are received.</li>
</ul>
<p>&nbsp;</p>
</div>
<h2>Semantic conflicts and other problems you have to avoid:</h2>
<div class="imgWithText clearfix">
<p>Due to the high integration of the code list into the  specification, semantic conflicts are avoided as long as the codes and  their semantics remain clear and unchanged.</p>
<p>However, there are a  number of reasons why an XML message may contain an invalid code. For  example, sender and receiver of a message may use different applications  implementing different code lists, typos in manually/semi-automatically  created messages may result in invalid codes, etc.</p>
<p>If the code  list is used as Type 1, an invalid code is a show stopper. The XML  validation fails, and the message should be discarded. You should bear  in mind that this is a rather drastic measure and may lead to severe  problems if too many messages are discarded.</p>
<p>It may be more  prudent to hand the validation of the codes to the application rather  than to the schema validator. The application has more options to react  to a problem.</p>
</div>
</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Named Code list (Type 2) ';
	$path = 'asset/page/practice_aids/named-code-list-type-2';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<div class="text">
<p>Named Code List (Type 2) describes a high degree of  integration of a code list in a specification for data exchange. The  distinguishing feature of Type 2 is that the <strong>code list is published as part of the specification but is not integrated into the XML schema of the specification</strong> and thus in contrast to <a href="standard-code-list-type-1">Type 1</a>, it does not allow for schema validation.</p>
</div>
<div class="left">
<div class="imgWithText clearfix">
<p>As with <a href="standard-code-list-type-1">Type 1</a>, this gives a high bindingness to the code list and the code list can only be changed with a new release of the specification.</p>
<p><strong>Please note</strong>:  As a code list owner, you should provide it as a separate, related  asset on Joinup regardless of its degree of integration into the  specification. This increases the reusability and comparability of code  lists significantly.</p>
</div>
<h2>When to use a code list as Type 2:</h2>
<div class="imgWithText clearfix">
<p>You should use a code list as Type 2 if</p>
<ul>
    <li>the <strong>code list is an integral part of your specification that will not be changed independently</strong> from the specification.</li>
    <li>you <strong>don\'t want to use the possibilities of XML schema validation</strong> to detect invalid code entries.</li>
</ul>
<p>&nbsp;</p>
<p>If schema validation is needed in your application, you should use a code list as <a href="standard-code-list-type-1">Type 1 </a>instead.</p>
</div>
<h2>When not to use a code list as Type 2:</h2>
<div class="imgWithText clearfix">
<p>You should not use a code list as Type 2 if</p>
<ul>
    <li>you want to use XML schema validation, use <a href="standard-code-list-type-1">Type 1</a> instead</li>
    <li>the code list is expected to change frequently and more often than the specification itself, consider <a href="version-free-code-list-type-3">Type 3</a> or <a href="version-free-code-list-type-4">Type 4</a> instead</li>
    <li>the  code list is maintained by another organisation and you cannot be sure  to be informed of changes to the code list in due time, consider Type <a href="version-free-code-list-type-3">3</a> or <a href="version-free-code-list-type-4">4</a> instead</li>
</ul>
<p>&nbsp;</p>
</div>
<h2>Advantages of Type 2 code lists:</h2>
<div class="imgWithText clearfix">
<p>Advantages of Type 2 code lists:</p>
<ul>
    <li>The code  list is highly integrated with the specification and cannot change  without changing the specification. Thus the code list is highly stable  and integration into applications is relatively easy.</li>
    <li>XML  schema validation is not used to verify that only valid codes are  transmitted. Thus applications can handle invalid codes more flexible  than in the case of <a href="standard-code-list-type-1">Type 1</a> code lists.</li>
</ul>
<p>&nbsp;</p>
</div>
<h2>Semantic conflicts and other problems you have to avoid:</h2>
<div class="imgWithText clearfix">
<ul>
    <li>Due to the high integration of the code list into  the specification, semantic conflicts are avoided as long as the codes  and their semantics remain clear and unchanged.</li>
    <li>If the code  list is used as Type 2, an invalid code will not be detected by schema  validation. The applications processing the code will have to handle  erroneous codes on their own.</li>
</ul>
</div>
</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Version free Code list (Type 3) ';
	$path = 'asset/page/practice_aids/version-free-code-list-type-3';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<div class="text">
<p>Version free Code List (Type 3) describes a lesser degree  of integration of a code list with a specification for data exchange.  The distinguishing feature of Type 3 is that <strong>the code list is not published as part of the specification</strong>. The <strong>version of the code list is determined at run-time</strong>, i.e. each time data is exchanged, the version of the code list that is used is identified.&nbsp;</p>
</div>
<div class="left">
<div class="imgWithText clearfix">
<p>As opposed to Types <a href="standard-code-list-type-1">1</a> and <a href="named-code-list-type-2">2</a>,  the code list is less binding and it can be changed independently from  the specification. Since the code list is not a part of the  specification itself, it has to be made available separately, e.g. on Joinup.</p>
</div>
<h2>When to use a code list as Type 3:</h2>
<div class="imgWithText clearfix">
<p>You should use a code list as Type 3 if</p>
<ul>
    <li>the <strong>code list is not an integral part of your specification</strong> and may be changed independently from the specification.</li>
    <li>you <strong>don\'t want to use the possibilities of XML schema validation</strong> to detect invalid code entries.</li>
</ul>
</div>
<h2>When not to use a code list as Type 3:</h2>
<div class="imgWithText clearfix">
<p>You should not use a code list as Type 3 if</p>
<ul>
    <li>you want to use XML schema validation, use <a href="standard-code-list-type-1">Type 1</a> instead</li>
    <li>the code list is expected to change only with a new release of the specification itself, consider Type <a href="standard-code-list-type-1">1</a> or <a href="named-code-list-type-2">2</a> instead</li>
</ul>
</div>
<h2>Advantages of Type 3 code lists:</h2>
<div class="imgWithText clearfix">
<p>Advantages of Type 3 code lists:</p>
<ul>
    <li>The code  list is not integrated with the specification and can change without  changing the specification. Thus it can be used more flexibly.</li>
    <li>XML  schema validation is not used to verify that only valid codes are  transmitted. Applications have more options to handle invalid codes.</li>
</ul>
</div>
<h2>Semantic conflicts and other problems you have to avoid:</h2>
<div class="imgWithText clearfix">
<ul>
    <li>If the code list is used as Type 3, an invalid  code will not be detected by schema validation. The applications  processing the code will have to handle erroneous codes on their own.</li>
</ul>
</div>
</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Version free Code list (Type 4) ';
	$path = 'asset/page/practice_aids/version-free-code-list-type-4';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<div class="text">
<p>Generic Code List (Type 4) describes the lowest degree of  integration of a code list with a specification for data exchange. The  distinguishing feature of Type 4 is that <strong>neither the code list itself nor the version of the code list are determined in the specification</strong>. Both will be <strong>determined at run-time</strong>, i.e. each time data is exchanged, the identitiy and the version of the code list that is used are identified.</p>
</div>
<div class="left">
<div class="imgWithText clearfix">
<p>As opposed to Types <a href="standard-code-list-type-1">1</a> and <a href="named-code-list-type-2">2</a>,  the code list is less binding and it can be changed independently from  the specification. Different applications may even use different code  list. Since the code list is no longer part of the specification, it has  to be made available separately, e.g. on Joinup.</p>
</div>
<h2>When to use a code list as Type 4:</h2>
<div class="imgWithText clearfix">
<p>You should use a code list as Type 4 if</p>
<ul>
    <li>the <strong>code list is not an integral part of your specification</strong> and may be changed independently from the specification.</li>
    <li>you <strong>don\'t want to use the possibilities of XML schema validation</strong> to detect invalid code entries.</li>
    <li>you want to l<strong>eave the choice of a particular code list to the application developers</strong>.</li>
</ul>
</div>
<h2>When not to use a code list as Type 4:</h2>
<div class="imgWithText clearfix">
<p>You should not use a code list as Type 4 if</p>
<ul>
    <li>you want to use XML schema validation, use <a href="standard-code-list-type-1">Type 1</a> instead</li>
    <li>the code list is expected to change only with a new release of the specification itself, consider Type <a href="standard-code-list-type-1">1</a> or <a href="named-code-list-type-2">2</a> instead</li>
    <li>you want a particular code list to be used, consider Type <a href="standard-code-list-type-1">1</a>, <a href="named-code-list-type-2">2</a>, or <a href="version-free-code-list-type-3">3</a> instead</li>
</ul>
</div>
<h2>Advantages of Type 4 code lists:</h2>
<div class="imgWithText clearfix">
<p>Advantages of Type 4 code lists:</p>
<ul>
    <li>The code list is not identified with the specification. Thus codes are handled in the most flexible way.</li>
    <li>XML  schema validation is not used to verify that only valid codes are  transmitted. Thus applications can handle invalid codes more flexibly  than in the case of <a href="standard-code-list-type-1">Type 1 </a>code lists.</li>
</ul>
</div>
<h2>Semantic conflicts and other problems you have to avoid:</h2>
<div class="imgWithText clearfix">
<ul>
    <li>If the code list is used as Type 4, an invalid  code will not be detected by schema validation. The applications  processing the code will have to handle erroneous codes on their own.</li>
</ul>
</div>
</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = '"Use cases the key to code list reusability" ';
	$path = 'asset/page/practice_aids/use-cases-key-code-list-reusability';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<p>12/10/2009</p>
<p>Stephan Meyer, head of the Joinup Clearing Management department,  claims in the interview that code lists are keys to enable semantic  interoperability.</p>
<p>Hence, more and more code lists are required and a discussion  about how to use them must clarify the potential scope of use cases.  Countries, domains and airports are already coded, but there are still  other entities that could ease communication between governments,  citizens and business once code lists, meaning bijective lists including  identifiers, are established.</p>
<p><img src="../../../system/files/images/clearing-manager-width.gif" alt="Stephan Meyer, SEMIC.EU Clearing Process coordinator" /></p>
<p>The interview raises a number of questions we think should  be tackled now in order to facilitate the reuse of code lists. Find out  more about the code list action plan in the dedicated section. <br />
<small><strong>Section access:</strong> <a title="opens section on SEMIC.EU code list action plan" href="code-lists">Code list action plan</a></small></p>
<p><strong>Joinup</strong> <em>As we reported last week, a lot of  assets added to the Joinup repository are code lists. What is common  to all code lists especially regarding the structure?</em></p>
<p><strong>Stephan Meyer</strong> Well, common to all code lists is that  they list codes. But seriously, we see all kinds of code lists, from a  simple list of human sexes (male, female, unknown) to really complex  structured lists with thousands of entries, like the NACE codes.</p>
<p>Also, there is a great diversity in the formats the code lists are  presented in. Some are part of an XML schema, some are presented in  spreadsheets as Excel, csv, HTML, or plain text. Some are even  represented as PDF and are not readily machine readable. Thus it is basically impossible to say what &quot;the&quot; Joinup code list  looks like.</p>
<p>&nbsp;</p>
<p><strong>Joinup</strong> <em>Isn\'t there some kind of standard or recommendation on how code lists should be represented?</em></p>
<p><strong>Stephan Meyer</strong> As a matter of fact, the only  candidate we are aware of is a Committee Specification of the  Organization for the Advancement of Structured Information Standards  (OASIS) called Genericode v1.0. It is currently in a public review  period and thereafter will be elevated to OASIS standard by public vote. Genericode is a very promising candidate for a universal standard. It is  an XML based standard, quite easy to understand, and satisfies many  requirements. We also understand that the German administration will  recommend using Genericode in its future standardisation projects in the  context of the &quot;Deutschland Online Standardisation&quot; initiative. I\'d really like to see some Joinup assets also adopting this standard.  Having a common representation would also make it easier to compare,  assess, adapt, and reuse code lists. <br />
<small><strong>Open Group access:</strong> <a title="opens websection onwww.open-group.org about genricode" href="http://www.oasis-open.org/committees/tc_home.php?wg_abbrev=codelist">genericode</a></small></p>
<p><br />
<strong>Joinup</strong> <em>The chances for reusing code lists  rise if they are customisable. Project requirements vary from ad-hoc  solutions to long-standing concepts. During the athletics world  championships in Berlin this year, it became obvious that for instance  long-standing concepts are also in need of adjustment: Code lists  indicating the sex of persons used to feature classifications such as  &quot;male&quot;, &quot;female&quot; and &quot;unspecified&quot;. It depends on the approach chosen  whether Caster Semenya, the female 800-meter world track champion, is  classified as male, female, of the &quot;third sex&quot; or &quot;unspecified&quot;. The  results may differ from a biological, genetic or cultural perspective.  For our purpose, this raises the question: How important is it that code  lists are expandable and flexible in contrast to permanency?</em></p>
<p><strong>Stephan Meyer</strong> You could say that the case  of Caster Semenya is the reason why most code lists for sexes include a  code for &quot;unknown&quot;. Not mentioning that such a category is humiliating  and discriminating. Nevertheless you are right, cases like this show,  that for any code list either the elements must be exhaustive or it has  to be clear how the code list can be changed.</p>
<p>I guess depending on the specific use case there are certain types of  how code lists are used. Whether the code lists are fix or variable,  how frequently changes are made, how deeply they are integrated with  data models and applications, etc. Actually, if we want to encourage  reuse of code lists, we would greatly benefit from such use cases for  the implementation of code lists. We as Joinup team need to answer the  questions: Which use cases for code list implementation are known? How  are code lists used in pan-European eGovernment projects? What are the  best methods?</p>
<p><strong>Joinup</strong> <em>Speaking about chances of reuse the  benefit of interoperability assets is to be taken into account. Assets  allow reuse of existing knowledge and to be more precise they enable  semantic interoperability. Can code lists be considered interoperability  assets?</em></p>
<p><strong>Stephan Meyer</strong> Code lists are an excellent example  for an interoperability asset in a broader sense. What a good code list  does is to eliminate any semantic ambiguity from a certain data element,  thus achieving semantic interoperability. That is exactly what we  expect of an interoperability asset. But a code list will always be just a part of a data exchange. So,  generally code lists will be used in greater interoperability assets,  like data exchange formats. But if they are stored separately in the Joinup repository, they can be reused more easily.</p>
<p><strong>Joinup</strong> <em>One of our goals is to enable  reuse of assets. It is especially interesting if assets are produced in  one sector, but reused in another domain. What are the chances of  combining code lists from different domains and therefore gain a broader  scope of potential reuse options?</em></p>
<p><strong>Stephan Meyer</strong> I think the chances are excellent.  Code lists are usually designed for a specific concept, can easily be  understood, are easy to modify and adapt. If you have a similar concept  in different domains, it will be easy to reuse a code list. Think, e.g.,  of country codes. Such code lists can be used in almost any eGovernment  application, regardless of domain. And if you have special needs you  can adapt a given code list easily, e.g. by adding a code for a historic  country, like&quot;GDR - German Democratic Republic&quot;.</p>
<p><strong>Joinup</strong> <em>Our last question targets the process  of coordination of designing a code list. Does a code list come into  being in an evolutionary way or is a code list the result of  governmental, parliamentary or organisational bargaining? In this  context, what is the role of standardisation bodies, for instance at  European level? What are the alternatives to standardisation?</em></p>
<p><strong>Stephan Meyer</strong> It depends on the code list and the  usage scenario, whether the code list is built in an evolutionary manner  or if it is part of a legislative effort. We have seen both in Joinup and both approaches have their advantages. Generally speaking, not all code lists will be candidates for  standardisation. Standardisation is an option for code list that are  rather static and frequently used, like the ISO code lists. Here at Joinup we would rather push for harmonisation of code lists and for  presenting different alternatives for different use cases.</p>
<p>&nbsp;</p>
<p><strong>Joinup</strong> <em>And at the very last and  keeping in mind the up coming Holiday Season. Please make a wish.  Imagine you could choose the next 3 assets uploaded to the Joinup  reposirory, which ones would you choose?</em></p>
<p><strong>Stephan Meyer</strong> First of all let me tell  you, that I&rsquo;m really positively surprised about the quality of the  assets we have received so far. But back to your question, if I could make a wish, I would like to see  more assets that different implementations of the same concepts, like we  have different data models for the physical person. I&rsquo;m sure there are  many implementations out there that we haven&rsquo;t seen yet. It would be  great if we had a broader base from which to start harmonisation efforts  or in order to see how different approaches work in different  scenarios. Besides I think that every asset is a step forward for Joinup.</p>
<p><strong>Joinup</strong> <em>Thank you</em></p>
<p><strong>Further information:</strong> <br />
Section access: <a title="opens section on SEMIC.EU code list action plan" href="code-lists">Code list action plan</a> <br />
Open Group access: <a title="opens websection onwww.open-group.org about genricode" href="http://www.oasis-open.org/committees/tc_home.php?wg_abbrev=codelist">genericode</a></p>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'German code list concept for Europe ';
	$path = 'asset/page/practice_aids/german-code-list-concept-europe';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<p>&nbsp;18/11/2009</p>
<p>Frank Steimke is the head of the OSCI co-ordination office, Germany.  He presents the German concept of code lists, regarded by Joinup as a  methodology of code lists for Europe.</p>
<p>He tells us why the considerations behind this new scheme are  clearly practice-oriented and that this approach can be transferred to  cases outside the German context of Deutschland Online.<br />
<br />
<small><strong>Section access:</strong> <a title="opens section on SEMIC.EU code list action plan" href="code-lists">Code list action plan</a></small></p>
<p><img src="../../../system/files/images/Steimke_Frank_LQ.jpg" alt="Stephan Meyer, SEMIC.EU Clearing Process coordinator" /></p>
<p><strong>Joinup</strong> <em>We understand that the new  German X&Ouml;V Handbook identifies four types of code lists for German data  standards. They are distinguished mainly by the degree to which the  lists are incorporated in the standard proper. How did this  categorisation come about? </em></p>
<p><strong>Frank Steimke</strong> The previous X&Ouml;V framework did not  live up to the expectations in terms of its actual use in  standardisation efforts of public authorities. It is now replaced by a  more practical manual on how to develop the standards for public  administration data exchange.<br />
<br />
The four types as described in the Handbook are everything but a result  of mere armchair reasoning. Rather, they are distinguished to address  four different kinds of requirements posed by the practice of data  exchange in the German administration.<br />
<br />
The basic question which separates the cases is whether a specific code  list is expected to change independently or in between release cycles of  the standard as a whole.<br />
<br />
Requirements were analysed based on existing standards, for example for  the civil registration system and alien registration, as well as on  future standards we are working on.<br />
<br />
This said, currently the pros and cons of a fifth type are being  discussed among the X&Ouml;V participants and contributors. The proposal has  been made by representatives from the justice domain. It is, however,  not yet clear whether the introduction of the fifth option is truly  necessary.</p>
<p>&nbsp;</p>
<p><strong>Joinup</strong> <em>Was there ever a point in the  development of the handbook when you considered a different scheme to  categorise the use of value/identifier lists in the standards?</em></p>
<p><strong>Frank Steimke</strong> No, there were no alternative models.  Quite to the contrary, I had actually expected only two types to emerge.  But we found out soon that in order to cover all requirements, we  needed to separate cases in which the codes or, respectively, URIs are  an integral component of a standard release or not. In a way, the four  cases can be described as gradual with regard to the volatility and  flexibility of the values represented in the lists.</p>
<p>&nbsp;</p>
<p><strong>Joinup</strong> <em>Why is it necessary to  distinguish types of code lists in the first place, especially in a  manual for the development of standards?</em></p>
<p><strong>Frank Steimke</strong> This is also a result of the  experience we made in earlier standardisation processes. The earlier the  partners in the process agree on the actual values of the data they are  about to apply in their standards or data models, the easier it is to  handle the further development of the standard. Agreeing on a type of  code list early on creates reliability in the design of the actual  schema in addition to the technical consequences. <br />
<br />
The most interesting point in the new approach, however, is not only the  particular case of code list development. What is more, we now address  the important question of measuring and validating X&Ouml;V conformity in  general, an issue which had not been fully clarified beforehand. Now,  with the first version of the X&Ouml;V handbook, this becomes possible and  more transparent. <br />
<br />
The effects on standard validation are obvious &ndash; is the code list in its  present or future forms an element of the validation process, or do we  only take the actual schema design as a measure for validity? The  question of validation is the basis for the requirement of different  types of code lists which are types of dealing with code lists rather  than code list types in the narrower sense.  <br />
<br />
This is also why, once we realised the advantages of this approach, we  figured we also needed clearer structures on a more abstract,  organisational level. We are therefore also developing standard  workflows and coordination procedures in order to streamline the  standard development process which &ndash; given the complexity of  administrative structures and variation of contexts in which to use the  standards - is not a simple task.</p>
<p>&nbsp;</p>
<p><strong>Joinup</strong> <em>What is the effect of this  new scheme on already existing standards? For instance, during the  development of the successful XMeld standard for civil registration data  which is also available at Joinup, the scheme did not exist. Will you  now have to adapt these existing models to the new requirements?</em></p>
<p><strong>Frank Steimke</strong> I was personally involved in the  development of the XMeld standard. Being aware of the ramifications of  the new framework that we have created with the X&Ouml;V handbook, I  anticipate that there will be a number of issues that the handbook  recommends to do differently. However, I am sure that the XMeld  standard, even in its current form, does not violate any of the binding  rules stipulated in the handbook. We take this as both an indicator of  the validity and quality of the XMeld standard and as a proof of the  practicability of the handbook&rsquo;s provisions.</p>
<p>&nbsp;</p>
<p><strong>Joinup</strong> <em>In how far is the X&Ouml;V  Handbook specifically German? Put differently: Can you recommend your  approach to the handling of code lists outside the German context, i.e.  to your European colleagues?</em></p>
<p><strong>Frank Steimke</strong> That would be a clear yes. I am  convinced that the question of validating XML schemas and included or  related lists of the data type code is an issue that faces all  administrations in data exchange regardless of their specific  administrative frameworks. This is the case with basic data models like  that of physical persons or addresses but also in domain-specific  contexts. <br />
<br />
I&rsquo;d be grateful to receive feedback on our recommendations. As I said  before, we have developed this typology not as an academic exercise but  rather to meet the requirements of hands-on data exchange in public  administrations. <br />
<br />
If any of these are not met by the four types described, we will surely  take additional cases into account for upcoming versions of the X&Ouml;V  handbook. We are actually already working on new releases. Due to the  complexities of public administration, its various levels and plethora  of application contexts, the work will never be done with a single draft  only.</p>
<p>&nbsp;</p>
<p><strong>Further information:</strong> <br />
Section access: <a title="opens section on SEMIC.EU code list action plan" href="code-lists">Code lists</a> <br />
Open Group access: <a title="opens websection on www.open-group.org about genricode" href="http://www.oasis-open.org/committees/tc_home.php?wg_abbrev=codelist">genericode</a></p>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Taxonomies ';
	$path = 'asset/page/practice_aids/taxonomies';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<h1>&nbsp;</h1>
<p>Taxonomies are specific cases of controlled vocabularies.  Their distinctive feature is the hierarchical order of objects they  classify: Hierarchical relationships are based on levels of  superordination and subordination. Every term in a taxonomy has to have a  hierarchical relationship to at least one other term within the  taxonomy. A single taxonomic unit is known as a \'taxon\'.</p>
<div class="sub clearfix">
<div class="img">&nbsp;</div>
<div class="text">
<p class="moreLink">&nbsp;</p>
</div>
</div>
<div class="sub clearfix">
<h1><a name="2"></a> 							Interview: &quot;The Practicability of Taxonomies&quot;</h1>
<div class="img"><img src="../../../system/files/images/billig-adametz-interview.gif" alt="Andreas Billig, Helmut Adametz" /></div>
<div class="text">
<p>An interview with the authors of the Joinup  Study on Taxonomies, Andreas Billig (left) and the late Helmut Adametz. Our colleague Helmut passed away shortly after the finalisation of the  interview. We are grateful for his invaluable contributions to Joinup \'s efforts and publish the interview and the study in his  memory.</p>
<p class="moreLink"><a class="document pdf" href="../../../system/files/doc/SEMIC.EU_Interview_Taxonomies_Fraunhofer-ISST.pdf">Download: Interview (PDF, 43KB)</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="3"></a> 							Study on Taxonomies</h1>
<div class="img"><img src="../../../system/files/images/taxonomy-schema.gif" alt="Taxonomy schema" /></div>
<div class="text">
<p>The study proposes a life-cycle for  machine-readable taxonomies, provides guidelines for syntactic  integration and assesses matching techniques and mappings of  semantically heterogeneous taxonomies.</p>
<p class="moreLink"><a class="document pdf" href="../../../system/files/doc/guidelines-and-good-practices-for-taxonomies-v1.3a.pdf">Download: Guidelines and Good Practices for Taxonomies (PDF, 733KB)</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="4"></a> 							Action plan</h1>
<div class="img"><img src="../../../system/files/images/handschlag.gif" alt="shaking hands indicating a started action plan" /></div>
<div class="text">
<p>Joinup encourages the use of taxonomies in the creation of semantic interoperability. Learn more about the steps to take</p>
<p class="moreLink"><a href="action-plan-taxonomies" id="j_id138"> 							Action Plan: Taxonomies</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="5"></a> 							Taxonomy  inquiries</h1>
<div class="img"><img src="../../../system/files/images/contact.gif" alt="snapshot of cell phone calling SEMIC.EU" /></div>
<div class="text">
<p>Share your experiences in classification and data exchange based on taxonomic schemes, and contact the Clearing Manager</p>
<p class="moreLink"><a href="../../../contact" id="j_id153"> 							Contact Joinup Clearing Management</a></p>
</div>
</div>
<div id="marginal">&nbsp;</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Video tutorials ';
	$path = 'asset/page/practice_aids/video-tutorials';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<h1>&nbsp;</h1>
<p>These tutorials and lectures cover issues relevant to the  creation and development of seamless and meaningful data exchange - from  the semantic web and ontologies to domain-specific presentations  helpful to stakeholders in European eGovernment.  They are presented in cooperation with our partner Videolectures.net at  the Center for Knowledge Transfer, Jozef Stefan Institute, Ljubljana.</p>
<div class="sub clearfix">
<h1><a name="1"></a> 							Full list: Semantics and Interoperability</h1>
<div class="img"><img src="../../../system/files/images/videolectures_angletou_tuto.gif" alt="videolectures videos" /></div>
<div class="text">
<p>Full selection of video tutorials on issues related to semantic interoperability.</p>
<p class="moreLink"><a href="http://videolectures.net/semantic_interoperability_centre_europe/">Joinup at Videolectures</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="2"></a> 							Aldo Gangemi, Institute of Cognitive Sciences and Technologies, Rome</h1>
<div class="img"><img src="../../../system/files/images/gangemi-video.gif" alt="Aldo Gangemi" /></div>
<div class="text">
<p>Joinup national expert Aldo Gangemi explains ontologies and his research group\'s approach to ontology engineering.</p>
<p class="moreLink"><a href="http://videolectures.net/eswc06_gangemi_iag/">Video: Aldo Gangemi</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="3"></a> 							Holger Wache, University of Applied Sciences Northwestern Switzerland</h1>
<div class="img"><img src="../../../system/files/images/wache-video.gif" alt="Holger Wache" /></div>
<div class="text">
<p>Semantic technologies in the recruiting process</p>
<p class="moreLink"><a href="http://videolectures.net/iswc06_wache_irpto/">Video: Holger Wache</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="4"></a> 							Heiko Stoermer, University of Trento</h1>
<div class="img"><img src="../../../system/files/images/stoermer-video.gif" alt="Heiko Stoermer" /></div>
<div class="text">
<p>Introduction to the &quot;Entity Name System&quot; (ENS) for the Semantic Web and Joinup partner project OKKAM.</p>
<p class="moreLink"><a href="http://videolectures.net/eswc08_stoermer_ens/">Video: Heiko Stoermer</a></p>
</div>
</div>
<hr />
<div class="sub clearfix">
<h1><a name="5"></a> 							Ivan Herman, World Wide Web Consortium</h1>
<div class="img"><img src="../../../system/files/images/herman-video.gif" alt="Ivan Herman" /></div>
<div class="text">
<p>Industry 3: Semantic Web @ W3C: Activities, Recommendations and State of Adoption</p>
<p class="moreLink"><a href="http://videolectures.net/iswc06_herman_arsa/">Video: Ivan Herman</a></p>
</div>
</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Action Plan: Taxonomies ';
	$path = 'asset/page/practice_aids/action-plan-taxonomies';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<div class="text">Taxonomies are both an object of and a tool for semantic  harmonisation: Different classifications of the same matter (if in  different languages) require solutions to semantic conflicts. At the  same time, mappings to agreed taxonomies are a powerful tool that  facilitates solutions to semantic conflicts and, thus, seamless data  exchange.</div>
<h2>Community building</h2>
<div class="imgWithText clearfix">
<p>Developers and users of taxonomic schemes are called on to  share their knowledge and tackle common challenges in taxonomy use in  eGovernment contexts.</p>
<p>In bilateral and community cooperation, they should focus on:</p>
<ul>
    <li>Experiences and best practices in taxonomy development&nbsp;</li>
    <li>Efficient use of taxonomies as interfaces / taxonomy mapping</li>
    <li>Potential for reuse of existing taxonomies</li>
</ul>
</div>
<img src="http://www.semic.eu/semic/jcpimage/blue-line2.gif?uuid=a096b1fc-b492-4014-a101-290a7dd0077d" alt="paragraph.image.altTag" />
<div class="imgWithText clearfix">&nbsp;</div>
<h2>What to do?</h2>
<div class="imgWithText clearfix">
<ul>
    <li>We appeal to all Joinup users to provide taxonomies and similar classifications as interoperability assets.<br />
    &nbsp;</li>
    <li>We encourage all asset owners to scan their assets for included taxonomies and to provide them seperately for potential reuse.<br />
    &nbsp;</li>
    <li>We  are collecting and discussing with the Joinup community input on  different use case and maintenance scenarios for taxonomies.</li>
</ul>
<p><strong>Open Questions:</strong></p>
<ul>
    <li>What is a efficient way to store a taxonomy?</li>
    <li>How can a reliable version management of taxonomies be implemented, esp. in eGovernment contexts?</li>
    <li>How to ensue governance of taxonomies?</li>
    <li>How to collate similiar taxonomies with diverging content?</li>
</ul>
<p>We appreciate your input!</p>
</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */