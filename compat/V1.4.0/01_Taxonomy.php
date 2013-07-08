<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL & ~E_NOTICE);
ini_set('memory_limit', '400M');
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

// Preparation of datas

//creation of the new table term_fields_term (from term fields module)
$query = "CREATE TABLE IF NOT EXISTS `term_fields_term` (
  `tid` int(10) unsigned NOT NULL,
  `vid` int(10) unsigned NOT NULL,
  `taxonomy_uri_value` longtext,
  PRIMARY KEY (`tid`),
  KEY `vid` (`vid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
db_query($query);

//New taxonomies
$terms = array(
    //Interoperability level 
	array( 74, "'Legal'", "''", 0, 'http://purl.org/adms/interoperabilitylevel/Legal'),
	array( 74, "'Organisational'", "''", 0, 'http://purl.org/adms/interoperabilitylevel/Organisational'),
	array( 74, "'Political'", "''", 0, 'http://purl.org/adms/interoperabilitylevel/Political'),
	array( 74, "'Semantic'", "''", 0, 'http://purl.org/adms/interoperabilitylevel/Semantic'),
	array( 74, "'Technical'", "''", 0, 'http://purl.org/adms/interoperabilitylevel/Technical'),
    //Asset type
    array("68","'Business Process Model'","''","0","http://purl.org/adms/assettype/BusinessProcessModel"),
    array("68","'Business Service Description'","''","0","http://purl.org/adms/assettype/BusinessServiceDescription"),
    array("68","'Code List'","'Complete set of data element values of a coded simple data element  [ISO 9735-1:2002, 4.14].'","0","http://purl.org/adms/assettype/CodeList"),
    array("68","'Communication Protocol'","''","0","http://purl.org/adms/assettype/CommunicationProtocol"),
    array("68","'Contract Template'","''","0","http://purl.org/adms/assettype/ContractTemplate"),
    array("68","'Core Component'","'A core component is a context-free semantic building block for creating clear and meaningful data models, vocabularies, and information exchange packages [UN/CEFACT CCTS ].'","0","http://purl.org/adms/assettype/CoreComponent"),
    array("68","'Domain Model'","'A domain model is a conceptual view of a system or an information exchange that identifies the entities involved and their relationships [NIEM Glossary ].'","0","http://purl.org/adms/assettype/DomainModel"),
    array("68","'Information Exchange Package Description'","'A collection of artifacts that define and describe the structure and content of an information exchange  [NIEM Glossary]. An Information Exchange Package Description has a specifi);c information exchange context and may refer to other semantic, assets.'","0","http://purl.org/adms/assettype/InformationExchangePackageDescription"),
    array("68","'Legal Interoperability Agreement'","''","0","http://purl.org/adms/assettype/LegalInteroperabilityAgreement"),
    array("68","'Legislative Framework'","''","0","http://purl.org/adms/assettype/LegislativeFramework"),
    array("68","'Licence Template'","''","0","http://purl.org/adms/assettype/LicenceTemplate"),
    array("68","'Mapping'","'relationship between a concept in one vocabulary and one or more concepts in another [ISO/DIS 25964-2].'","0","http://purl.org/adms/assettype/Mapping"),
    array("68","'Name Authority List'","'controlled vocabulary for use in naming particular entities consistently [ISO/DIS 25964-2].'","0","http://purl.org/adms/assettype/NameAuthorityList"),
    array("68","'Ontology'","'A formal, explicit specification of a shared conceptualization [ISO/DIS 25964-2].'","0","http://purl.org/adms/assettype/Ontology"),
    array("68","'Organisational Interoperability Agreement'","''","0","http://purl.org/adms/assettype/OrganisationalInteroperabilityAgreement"),
    array("68","'Political Interoperability Agreement'","''","0","http://purl.org/adms/assettype/PoliticalInteroperabilityAgreement"),
    array("68","'Schema'","'A schema is a concrete view on a system or information exchange, describing the structure, content, and semantics of data.'","0","http://purl.org/adms/assettype/Schema"),
    array("68","'Security Specification'","''","0","http://purl.org/adms/assettype/SecuritySpecification"),
    array("68","'Service Description'","'A service description is a set of documents that describe the interface to and semantics of a service [W3C WS-GLOSS ].'","0","http://purl.org/adms/assettype/ServiceDescription"),
    array("68","'Software'","''","0","http://purl.org/adms/assettype/Software"),
    array("68","'Syntax Encoding Scheme'","'Syntax Encoding Schemes indicate that the value is a string formatted in accordance with a formal notation, such as \"2000-01-01\" as the standard expression of a date. [DCMI Glossary].'","0","http://purl.org/adms/assettype/SyntaxEncodingScheme"),
    array("68","'Taxonomy'","'scheme of categories and subcategories that can be used to sort and otherwise organize items of knowledge or information [ISO/DIS 25964-2]. '","0","http://purl.org/adms/assettype/Taxonomy"),
    array("68","'Technical Interopability Agreement'","''","0","http://purl.org/adms/assettype/TechnicalInteropabilityAgreement"),
    array("68","'Thesaurus'","'controlled and structured vocabulary in which concepts are represented by terms, organized so that relationships between concepts are made explicit, and preferred terms are accompanied by lead-in entries for synonyms or quasi-synonyms  [ISO 25964-1:2011].'","0","http://purl.org/adms/assettype/Thesaurus"),
    //Status
	array( "69", "'Completed'", "''", "0","http://purl.org/adms/status/Completed"),
	array( "69", "'Deprecated'", "''", "0", "http://purl.org/adms/status/Deprecated"),
	array( "69", "'Under development'", "''", "0", "http://purl.org/adms/status/UnderDevelopment"),
	array( "69", "'Withdrawn'", "''", "0", "http://purl.org/adms/status/Withdrawn"),
    //Representation technique
	array( 70, "'Archimate'", "''", "0", "http://purl.org/adms/representationtechnique/Archimate"),
	array( 70, "'BPMN (Business Process Modeling Notation)'", "''", "0", "http://purl.org/adms/representationtechnique/BPMN"),
	array( 70, "'Common Logic'", "''", "0", "http://purl.org/adms/representationtechnique/CommonLogic"),
	array( 70, "'Datalog'", "''", "0", "http://purl.org/adms/representationtechnique/Datalog"),
	array( 70, "'Diagram'", "''", "0", "http://purl.org/adms/representationtechnique/Diagram"),
	array( 70, "'DTD (Document Type Definition)'", "''", "0", "http://purl.org/adms/representationtechnique/DTD"),
	array( 70, "'Genericode'", "''", "0", "http://purl.org/adms/representationtechnique/Genericode"),
	array( 70, "'Human Language'", "''", "0", "http://purl.org/adms/representationtechnique/HumanLanguage"),
	array( 70, "'IDEF (Integration Definition Methods)'", "''", "0", "http://purl.org/adms/representationtechnique/IDEF"),
	array( 70, "'KIF (Knowledge Interchange Format)'", "''", "0", "http://purl.org/adms/representationtechnique/KIF"),
	array( 70, "'OWL (Web Ontology Language)'", "''", "0", "http://purl.org/adms/representationtechnique/OWL"),
	array( 70, "'Prolog'", "''", "0", "http://purl.org/adms/representationtechnique/Prolog"),
	array( 70, "'RDF Schema'", "''", "0", "http://purl.org/adms/representationtechnique/RDFSchema"),
	array( 70, "'Relax NG'", "''", "0", "http://purl.org/adms/representationtechnique/RelaxNG"),
	array( 70, "'RIF (Rule Markup Language)'", "''", "0", "http://purl.org/adms/representationtechnique/RIF"),
	array( 70, "'RuleML (Rule Markup Language)'", "''", "0", "http://purl.org/adms/representationtechnique/RuleML"),
	array( 70, "'SBVR (Semantics of Business Vocabulary and Rules)'", "''", "0", "http://purl.org/adms/representationtechnique/SBVR"),
	array( 70, "'Schematron'", "''", "0", "http://purl.org/adms/representationtechnique/Schematron"),
	array( 70, "'SKOS (SImple Knowledge Organization Schema)'", "''", "0", "http://purl.org/adms/representationtechnique/SKOS"),
	array( 70, "'SPARQL (Query Language for RDF)'", "''", "0", "http://purl.org/adms/representationtechnique/SPARQL"),
	array( 70, "'SPIN (SPARQL Inference Notation)'", "''", "0", "http://purl.org/adms/representationtechnique/SPIN"),
	array( 70, "'SWRL (Semantic Web Rule Language)'", "''", "0", "http://purl.org/adms/representationtechnique/SWRL"),
	array( 70, "'Topic Maps'", "''", "0", "http://purl.org/adms/representationtechnique/TopicMaps"),
	array( 70, "'UML (Unified Modeling Language)'", "''", "0", "http://purl.org/adms/representationtechnique/UML"),
	array( 70, "'WSDL (Web Service Description Language)'", "''", "0", "http://purl.org/adms/representationtechnique/WSDL"),
	array( 70, "'WSMO (Web Service Modeling Ontology)'", "''", "0", "http://purl.org/adms/representationtechnique/WSMO"),
	array( 70, "'XML Schema'", "''", "0", "http://purl.org/adms/representationtechnique/XMLSchema"),
    //Publisher type
	array( 72, "'Academia/Scientific organisation'", "''", 0, "http://purl.org/adms/publishertype/Academia-ScientificOrganisation"),
	array( 72, "'Company'", "''", 0, "http://purl.org/adms/publishertype/Company"),
	array( 72, "'Industry consortium'", "''", 0, "http://purl.org/adms/publishertype/IndustryConsortium"),
	array( 72, "'Local authority'", "''", 0, "http://purl.org/adms/publishertype/LocalAuthority"),
	array( 72, "'National authority'", "''", 0, "http://purl.org/adms/publishertype/NationalAuthority"),
	array( 72, "'Non-governmental organisation'", "''", 0, "http://purl.org/adms/publishertype/NonGovernmentalOrganisation"),
	array( 72, "'Non-profit organisation'", "''", 0, "http://purl.org/adms/publishertype/NonProfitOrganisation"),
	array( 72, "'Private individual(s)'", "''", 0, "http://purl.org/adms/publishertype/PrivateIndividual(s)"),
	array( 72, "'Regional authority'", "''", 0, "http://purl.org/adms/publishertype/RegionalAuthority"),
	array( 72, "'Standardisation body'", "''", 0, "http://purl.org/adms/publishertype/StandardisationBody"),
	array( 72, "'Supra-national authority'", "''", 0, "http://purl.org/adms/publishertype/SupraNationalAuthority"),
    //File format
	array( 73, "'application/rdf+xml'", "''", 0, "http://purl.org/NET/mediatypes/application/rdf+xml"),
    array( 73, "'application/xml'", "''", 0, "http://purl.org/NET/mediatypes/application/xml"),
    array( 73, "'application/x-excel'", "''", 0, "http://purl.org/NET/mediatypes/application/x-excel"),
    array( 73, "'application/excel'", "''", 0, "http://purl.org/NET/mediatypes/application/excel"),
    array( 73, "'application/pdf'", "''", 0, "http://purl.org/NET/mediatypes/application/pdf"),
    array( 73, "'application/vnd.oasis.opendocument.text'", "''", 0, "http://purl.org/NET/mediatypes/application/vnd.oasis.opendocument.text"),
    array( 73, "'application/vnd.oasis.opendocument.text-template'", "''", 0, "http://purl.org/NET/mediatypes/application/vnd.oasis.opendocument.text-template"),
    array( 73, "'application/vnd.oasis.opendocument.graphics'", "''", 0, "http://purl.org/NET/mediatypes/application/vnd.oasis.opendocument.graphics"),
    array( 73, "'application/vnd.oasis.opendocument.graphics-template'", "''", 0, "http://purl.org/NET/mediatypes/application/vnd.oasis.opendocument.graphics-template"),
    array( 73, "'application/vnd.oasis.opendocument.presentation'", "''", 0, "http://purl.org/NET/mediatypes/application/vnd.oasis.opendocument.presentation"),
    array( 73, "'application/vnd.oasis.opendocument.presentation-template'", "''", 0, "http://purl.org/NET/mediatypes/application/vnd.oasis.opendocument.presentation-template"),
    array( 73, "'application/vnd.oasis.opendocument.spreadsheet'", "''", 0, "http://purl.org/NET/mediatypes/application/vnd.oasis.opendocument.spreadsheet"),
    array( 73, "'application/vnd.oasis.opendocument.spreadsheet-template'", "''", 0, "http://purl.org/NET/mediatypes/application/vnd.oasis.opendocument.spreadsheet-template"),
    array( 73, "'application/vnd.oasis.opendocument.chart'", "''", 0, "http://purl.org/NET/mediatypes/application/vnd.oasis.opendocument.chart"),
    array( 73, "'application/vnd.oasis.opendocument.chart-template'", "''", 0, "http://purl.org/NET/mediatypes/application/vnd.oasis.opendocument.chart-template"),
    array( 73, "'application/vnd.oasis.opendocument.image'", "''", 0, "http://purl.org/NET/mediatypes/application/vnd.oasis.opendocument.image"),
    array( 73, "'application/vnd.oasis.opendocument.image-template'", "''", 0, "http://purl.org/NET/mediatypes/application/vnd.oasis.opendocument.image-template"),
    array( 73, "'application/vnd.oasis.opendocument.formula'", "''", 0, "http://purl.org/NET/mediatypes/application/vnd.oasis.opendocument.formula"),
    array( 73, "'application/vnd.oasis.opendocument.formula-template'", "''", 0, "http://purl.org/NET/mediatypes/application/vnd.oasis.opendocument.formula-template"),
    array( 73, "'application/vnd.oasis.opendocument.text-master'", "''", 0, "http://purl.org/NET/mediatypes/application/vnd.oasis.opendocument.text-master"),
    array( 73, "'application/vnd.oasis.opendocument.text-web'", "''", 0, "http://purl.org/NET/mediatypes/application/vnd.oasis.opendocument.text-web"),
    array( 73, "'application/xhtml xml'", "''", 0, "http://purl.org/NET/mediatypes/application/xhtml xml"),
    array( 73, "'application/x-javascript'", "''", 0, "http://purl.org/NET/mediatypes/application/x-javascript"),
    array( 73, "'application/x-gzip-compressed'", "''", 0, "http://purl.org/NET/mediatypes/application/x-gzip-compressed"),
    array( 73, "'application/json'", "''", 0, "http://purl.org/NET/mediatypes/application/json"),
    array( 73, "'application/x-www-form-urlencoded'", "''", 0, "http://purl.org/NET/mediatypes/application/x-www-form-urlencoded"),
    array( 73, "'application/x-msdos-program'", "''", 0, "http://purl.org/NET/mediatypes/application/x-msdos-program"),
    array( 73, "'application/x-zip-compressed'", "''", 0, "http://purl.org/NET/mediatypes/application/x-zip-compressed"),
    array( 73, "'application/zip'", "''", 0, "http://purl.org/NET/mediatypes/application/zip"),
    array( 73, "'application/java'", "''", 0, "http://purl.org/NET/mediatypes/application/java"),
    array( 73, "'application/msword'", "''", 0, "http://purl.org/NET/mediatypes/application/msword"),
    array( 73, "'application/vnd.ms-excel'", "''", 0, "http://purl.org/NET/mediatypes/application/vnd.ms-excel"),
    array( 73, "'application/vnd.lotus-notes'", "''", 0, "http://purl.org/NET/mediatypes/application/vnd.lotus-notes"),
    array( 73, "'application/vnd.ms-powerpoint'", "''", 0, "http://purl.org/NET/mediatypes/application/vnd.ms-powerpoint"),
    array( 73, "'application/vnd.ms-project'", "''", 0, "http://purl.org/NET/mediatypes/application/vnd.ms-project"),
    //Licence type
    array( 75, "'Attribution'", "''", 0, 'http://purl.org/adms/licencetype/Attribution'),
    array( 75, "'Public domain'", "''", 0, 'http://purl.org/adms/licencetype/PublicDomain'),
    array( 75, "'Viral effect (a.k.a. Share-alike)'", "''", 0, 'http://purl.org/adms/licencetype/ViralEffect-ShareAlike'),
    array( 75, "'Non-commercial use only'", "''", 0, 'http://purl.org/adms/licencetype/NonCommercialUseOnly'),
    array( 75, "'No derivative work'", "''", 0, 'http://purl.org/adms/licencetype/NoDerivativeWork'),
    array( 75, "'Royalties required'", "''", 0, 'http://purl.org/adms/licencetype/RoyaltiesRequired'),
    array( 75, "'Reserved names / endorsement / official status'", "''", 0, 'http://purl.org/adms/licencetype/ReservedNames-Endorsement-OfficialStatus'),
    array( 75, "'Nominal cost'", "''", 0, 'http://purl.org/adms/licencetype/NominalCost'),
    array( 75, "'Grant back'", "''", 0, 'http://purl.org/adms/licencetype/GrantBack'),
    array( 75, "'Jurisdiction within the EU'", "''", 0, 'http://purl.org/adms/licencetype/JurisdictionWithinTheEU'),
    array( 75, "'Other restrictive clauses'", "''", 0, 'http://purl.org/adms/licencetype/OtherRestrictiveClauses'),
    array( 75, "'Known patent encumbrance'", "''", 0, 'http://purl.org/adms/licencetype/KnownPatentEncumbrance'),
    array( 75, "'Unknown IPR'", "''", 0, 'http://purl.org/adms/licencetype/UnknownIPR'),
);

foreach ($terms as $value) {
  //query construction
  $term_uri = array_pop($value);
  $vid = $value[0];
  $arguments = implode(',', $value);
  $query ="INSERT INTO term_data (vid, name, description, weight) VALUES (" . $arguments . ")";
  db_query($query);
  $tid = db_last_insert_id('term_data', 'tid');

  //Insert the tid in term_hierarchy
  $query = "INSERT INTO term_hierarchy (tid, parent) VALUES (%d,0)";
  db_query($query, $tid);

  //Insert the tid + uri in term_fields_term
  if (!empty($term_uri)) {
    $query = "INSERT INTO term_fields_term (tid, vid, taxonomy_uri_value) VALUES (%d, %d, '%s')";
    db_query($query, $tid, $vid, $term_uri);
  }
}

?>