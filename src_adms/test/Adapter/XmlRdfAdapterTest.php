<?php

/*
 * Copyright (C) Atos
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

require_once '../../bootstrap.php';

/**
 * Test Class for the AdmsObject
 */
class XmlRdfAdapterTest extends PHPUnit_Framework_TestCase {

  /**
   * Function called to setup the test
   */
  protected function setUp() {
    
  }

  /**
   * Function called to clean the environment once the test is finished
   */
  protected function tearDown() {
    
  }

  /**
   * This method is checking the rdf loading
   * @param string rdf the string to be tested as a compliant rdf file
   * @param \ADMS\AdmsObject object the equivalence implemented with the ADMS library
   * @dataProvider provideData
   */
  public function testLoading($rdf, $object, $message) {
    // Call the XmlRdfLoader
    $loader = new \Adapters\XmlRdfAdapter();
    $admsObjects = $loader->load($rdf);

    $loaded = $admsObjects[$object->id];
    if (isset($loaded->_logger))
      unset($loaded->_logger);
    if (isset($object->_logger))
      unset($object->_logger);

//    var_dump($loaded);
//    var_dump($object);

    $this->assertTrue($loaded == $object, $message);
  }

  /**
   * This method is checking the rdf export
   * @param string rdf the string to be tested as a compliant rdf file
   * @param \ADMS\AdmsObject object the equivalence implemented with the ADMS library
   * @dataProvider provideData
   */
  public function testExporting($rdf, $object, $message) {
    $output = "";
    // Export the model    
    // Call the XmlRdfLoader
    $adapter = new \Adapters\XmlRdfAdapter();
    $export = $adapter->export(array($object->id => $object), $output);

    // How can we determine that the output is what we expect??
    // We check that the object is correct then we rewrite the input rdf to be 
    // the exact equivalent

//    var_dump( $output );
//    var_dump( $rdf );
    $this->assertTrue($rdf == $output, $message);
  }

  public function provideData() {
    $data = array();
    $data[] = $this->_admsSemanticRepository();
    $data[] = $this->_admsSemanticAssetDistribution();
    $data[] = $this->_radionGeographicCoverage();

    return $data;
  }

  /**
   * This function is creating the data provider
   * for checking that the loading of a Semantic Asset Repository is correct
   * @return array
   */
  private function _admsSemanticRepository() {
    $rdfString = <<<REPO
<?xml version="1.0" encoding="UTF-8" ?>
<rdf:RDF
   xmlns:xsd="http://www.w3.org/2001/XMLSchema#"
   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
   xmlns:owl="http://www.w3.org/2002/07/owl#"
   xmlns:dcterms="http://purl.org/dc/terms/"
   xmlns:foaf="http://xmlns.com/foaf/0.1/"
   xmlns:schema="http://schema.org/"
   xmlns:cc="http://creativecommons.org/ns#"
   xmlns:skos="http://www.w3.org/2004/02/skos/core"
   xmlns:dcat="http://www.w3.org/ns/dcat#"
   xmlns:xhv="http://www.w3.org/1999/xhtml/vocab#"
   xmlns:wdrs="http://www.w3.org/2007/05/powder-s#"
   xmlns:vann="http://purl.org/vocab/vann/"
   xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#"
   xmlns:adms="http://www.w3.org/ns/adms#"
   xmlns:rad="http://www.w3.org/ns/radion#">

<rdf:Description rdf:about="https://195.43.52.199/">
   <rdf:type rdf:resource="http://www.w3.org/ns/adms#SemanticAssetRepository"/>
   <adms:accessURL rdf:resource="https://195.43.52.199/"/>
   <dcterms:modified>2012-02-20</dcterms:modified>
   <dcterms:description xml:lang="en">XRepository is a library for data exchange standards and codelists that were modelled in order to ease up interoperability between eGovernment applications of German Public administration and industry.</dcterms:description>
   <dcterms:description xml:lang="fr">XRepository est une bibliothèque permettant d'échanger des données standards qui ont été modélisées afin de faciliter l'intéropérabilité entre les applications eGovernement de l'administration et de l'industrie allemande.</dcterms:description>
   <rdfs:label>XRepository</rdfs:label>
   <dcterms:publisher rdf:resource="http://www.xrepository.de/ns/adms/Publisher/Bundesverwaltungsamt"/>
   <dcterms:publisher rdf:resource="http://www.xrepository.de/ns/adms/Publisher/TheFederalOfficeofAdministration"/>
   <dcterms:spatial rdf:resource="http://dbpedia.org/resource/Germany"/>
</rdf:Description>

</rdf:RDF>
REPO;

    $sar = new \ADMS\SemanticAssetRepository();
    $sar->id = 'https://195.43.52.199/';
    $sar->name = 'XRepository';
    $sar->accessURL = new \Common\Property(
        'https://195.43.52.199/',
        COMMON_PROPERTY_TYPE_RESOURCE);
    //$sar->dateOfModification = DateTime::createFromFormat( 'Y-m-d', '2012-02-20');
    $sar->dateModified = '2012-02-20';

    $sar->description = new \Common\Property(
        'XRepository is a library for data exchange standards and codelists that were modelled in order to ease up interoperability between eGovernment applications of German Public administration and industry.',
        COMMON_PROPERTY_TYPE_LITERAL,
        array('language' => 'en')
    );
    $sar->description = new \Common\Property(
        "XRepository est une bibliothèque permettant d'échanger des données standards qui ont été modélisées afin de faciliter l'intéropérabilité entre les applications eGovernement de l'administration et de l'industrie allemande.",
        COMMON_PROPERTY_TYPE_LITERAL,
        array('language' => 'fr')
    );
    $sar->publisher = new \Common\Property(
        'http://www.xrepository.de/ns/adms/Publisher/Bundesverwaltungsamt',
        COMMON_PROPERTY_TYPE_RESOURCE);
    $sar->publisher = new \Common\Property(
        'http://www.xrepository.de/ns/adms/Publisher/TheFederalOfficeofAdministration',
        COMMON_PROPERTY_TYPE_RESOURCE);
    $sar->spatialCoverage = new \Common\Property(
        'http://dbpedia.org/resource/Germany',
        COMMON_PROPERTY_TYPE_RESOURCE);

    return array($rdfString, $sar, 'Check the ADMS Semantic Repository');
  }

  private function _admsSemanticAssetDistribution() {
    $rdfString = <<< EOF
<?xml version="1.0" encoding="UTF-8" ?>
<rdf:RDF
   xmlns:xsd="http://www.w3.org/2001/XMLSchema#"
   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
   xmlns:owl="http://www.w3.org/2002/07/owl#"
   xmlns:dcterms="http://purl.org/dc/terms/"
   xmlns:foaf="http://xmlns.com/foaf/0.1/"
   xmlns:schema="http://schema.org/"
   xmlns:cc="http://creativecommons.org/ns#"
   xmlns:skos="http://www.w3.org/2004/02/skos/core"
   xmlns:dcat="http://www.w3.org/ns/dcat#"
   xmlns:xhv="http://www.w3.org/1999/xhtml/vocab#"
   xmlns:wdrs="http://www.w3.org/2007/05/powder-s#"
   xmlns:vann="http://purl.org/vocab/vann/"
   xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#"
   xmlns:adms="http://www.w3.org/ns/adms#"
   xmlns:rad="http://www.w3.org/ns/radion#">

<rdf:Description rdf:about="https://joinup.ec.europa.eu/system/files/project/ADMS_RDF_Schema_v1.00.zip">
   <rdf:type rdf:resource="http://www.w3.org/ns/adms#SemanticAssetDistribution"/>
   <adms:accessURL rdf:resource="https://joinup.ec.europa.eu/system/files/project/ADMS_RDF_Schema_v1.00.zip"/>
   <adms:representationTechnique rdf:resource="http://purl.org/adms/representationtechnique/RDFSchema"/>
   <adms:status rdf:resource="http://purl.org/adms/status/Completed"/>
   <dcterms:created rdf:datatype="http://www.w3.org/2001/XMLSchema#dateTime">2012-04-18T00:00:00+0200</dcterms:created>
   <dcterms:modified rdf:datatype="http://www.w3.org/2001/XMLSchema#dateTime">2012-04-18T00:00:00+0200</dcterms:modified>
   <rad:distributionOf rdf:resource="http://joinup.ec.europa.eu/asset/adms/release/100"/>
   <dcterms:format rdf:datatype="http://www.iana.org/assignments/media-types/index.html">Application/zip</dcterms:format>
   <dcterms:license rdf:resource="https://joinup.ec.europa.eu/category/licence/isa-open-metadata-licence-v10"/>
   <dcterms:publisher rdf:resource="http://ec.europa.eu/"/>
</rdf:Description>

</rdf:RDF>
EOF;

    $sad = new \ADMS\SemanticAssetDistribution();
    $sad->id = 'https://joinup.ec.europa.eu/system/files/project/ADMS_RDF_Schema_v1.00.zip';
    $sad->accessURL = new \Common\Property(
        'https://joinup.ec.europa.eu/system/files/project/ADMS_RDF_Schema_v1.00.zip',
        COMMON_PROPERTY_TYPE_RESOURCE);
    $sad->dateCreated = new \Common\Property(
        '2012-04-18T00:00:00+0200',
        COMMON_PROPERTY_TYPE_LITERAL,
        array('datatype' => 'http://www.w3.org/2001/XMLSchema#dateTime')
    );
    $sad->dateModified = new \Common\Property(
        '2012-04-18T00:00:00+0200',
        COMMON_PROPERTY_TYPE_LITERAL,
        array('datatype' => 'http://www.w3.org/2001/XMLSchema#dateTime')
    );
    $sad->distributionOf = new \Common\Property(
        'http://joinup.ec.europa.eu/asset/adms/release/100',
        COMMON_PROPERTY_TYPE_RESOURCE
    );
    $sad->format = new \Common\Property(
        'Application/zip',
        COMMON_PROPERTY_TYPE_LITERAL,
        array('datatype' => 'http://www.iana.org/assignments/media-types/index.html')
    );
    $sad->license = new \Common\Property(
        'https://joinup.ec.europa.eu/category/licence/isa-open-metadata-licence-v10',
        COMMON_PROPERTY_TYPE_RESOURCE);
    //<dcterms:publisher rdf:resource="http://ec.europa.eu/"/>
    $sad->publisher = new \Common\Property(
        'http://ec.europa.eu/',
        COMMON_PROPERTY_TYPE_RESOURCE);
    //<adms:representationTechnique rdf:resource="http://purl.org/adms/representationtechnique/RDFSchema"/>
    $sad->representationTechnique = new \Common\Property(
        'http://purl.org/adms/representationtechnique/RDFSchema',
        COMMON_PROPERTY_TYPE_RESOURCE);
    //<adms:status rdf:resource="http://purl.org/adms/status/Completed"/>
    $sad->status = new \Common\Property(
        'http://purl.org/adms/status/Completed',
        COMMON_PROPERTY_TYPE_RESOURCE);

    return array($rdfString, $sad, 'Check the ADMS Semantic Distribution');
  }

  private function _radionGeographicCoverage() {
    $rdfString = <<< EOF
<?xml version="1.0" encoding="UTF-8" ?>
<rdf:RDF
   xmlns:xsd="http://www.w3.org/2001/XMLSchema#"
   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
   xmlns:owl="http://www.w3.org/2002/07/owl#"
   xmlns:dcterms="http://purl.org/dc/terms/"
   xmlns:foaf="http://xmlns.com/foaf/0.1/"
   xmlns:schema="http://schema.org/"
   xmlns:cc="http://creativecommons.org/ns#"
   xmlns:skos="http://www.w3.org/2004/02/skos/core"
   xmlns:dcat="http://www.w3.org/ns/dcat#"
   xmlns:xhv="http://www.w3.org/1999/xhtml/vocab#"
   xmlns:wdrs="http://www.w3.org/2007/05/powder-s#"
   xmlns:vann="http://purl.org/vocab/vann/"
   xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#"
   xmlns:adms="http://www.w3.org/ns/adms#"
   xmlns:rad="http://www.w3.org/ns/radion#">

<rdf:Description rdf:about="http://france.fr/">
   <rdf:type rdf:resource="http://purl.org/dc/terms/Location"/>
   <dcterms:description xml:lang="en">France is so wonderfull</dcterms:description>
   <dcterms:description xml:lang="fr">On RoX</dcterms:description>
</rdf:Description>

</rdf:RDF>
EOF;

    //<rdfs:label>France</rdfs:label>
    
    $gc = new \RADion\GeographicCoverage();
    $gc->id = 'http://france.fr/';
    $gc->name = new \Common\Property(
        'France',
        COMMON_PROPERTY_TYPE_LITERAL);
    $gc->description = new \Common\Property(
        'France is so wonderfull',
        COMMON_PROPERTY_TYPE_LITERAL,
        array('language' => 'en')
    );
    $gc->description = new \Common\Property(
        'On RoX',
        COMMON_PROPERTY_TYPE_LITERAL,
        array('language' => 'fr')
    );

    return array($rdfString, $gc, 'Check the RADion Geographic Coverage');
  }

}

?>
