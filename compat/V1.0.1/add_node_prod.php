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
	$newNode->title = 'Spago4Q to improve the production of OSS in the Veneto Region, Italy';
	$path = 'software/page/spago4q-to-improve-the-production-of-oss-in-the-veneto-region-italy';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<p><font size="2">Spago4Q is an OSS measuring and monitoring platform that supports the improvement of quality in software products, processes, and services. This study presents the use of the Spago4Q platform by the Veneto region (regione Veneto), Italy, which in this way supports its goal to provide quality services to citizens, to enterprises and to its employees. The project discussed in this study demonstrates how the Spago4Q platform can foster the improvement of the implementation process quality and the transparency of communication among the actors involved in the development process. Through Spago4Q, involved actors can jointly verify the quality of performance through data analysis based on predefined SLAs built on well identified metrics. The Spago4Q platform is maintained by Engineering, it is licensed though GPL and it is hosted in the OW2 forge. </font></p>
<p><font size="2">Contents</font></p>
<ol>
    <li><font size="2"><a href="#section-0">Introduction</a></font></li>
    <li><font size="2"><a href="#section-1">Organisation and Background</a></font></li>
    <li><font size="2"><a href="#section-2">Budget and funding/Financial issues</a></font></li>
    <li><font size="2"><a href="#section-3">Technical issues</a></font></li>
    <li><a href="#section-4"><font size="2">Licensing issues</font> </a></li>
    <li><a href="#section-5"><font size="2">Cooperation with other public bodies</font> </a></li>
    <li><a href="#section-6"><font size="2">Evaluation, including lessons learned, adn future plans</font> </a></li>
    <li><a href="#section-7"><font size="2">Acknowledgements</font> </a></li>
    <li><font size="2"><a href="#section-8">Links</a></font></li>
</ol>
<p>
<table class="plain" width="80%">
    <tbody>
        <tr>
            <td colspan="2" align="center"><strong>Quick Facts</strong><br />
            &nbsp;</td>
        </tr>
    </tbody>
    <tbody>
        <tr>
            <td>Project Name</td>
            <td>&nbsp;Veneto Region maintenance and development of the Information System</td>
        </tr>
        <tr>
            <td>Sector</td>
            <td>eGovernment</td>
        </tr>
        <tr>
            <td>Start Date</td>
            <td>2009</td>
        </tr>
        <tr>
            <td>End Date</td>
            <td>2016<br />
            &nbsp;</td>
        </tr>
        <tr>
            <td>Objectives</td>
            <td>Specific objective related to the case study: development of the dashboard to monitor SLA of the business services.</td>
        </tr>
        <tr>
            <td>Target group<br />
            &nbsp;</td>
            <td>Public sector<br />
            &nbsp;</td>
        </tr>
        <tr>
            <td>Scope<br />
            &nbsp;</td>
            <td>National, Regional</td>
        </tr>
        <tr>
            <td>Budget&nbsp;&nbsp;&nbsp; <br />
            &nbsp;</td>
            <td>N/A</td>
        </tr>
        <tr>
            <td>Funding&nbsp;&nbsp;&nbsp; <br />
            &nbsp;</td>
            <td>Internal funding</td>
        </tr>
        <tr>
            <td>Achivements</td>
            <td>Successful introduction of a SLA dashboard and process improvement procedures.<br />
            &nbsp;</td>
        </tr>
    </tbody>
</table>
</p>
<p>&nbsp;<a name="section-0"></a></p>
<div id="parent-fieldname-text">
<h3><b><font size="2">Introduction</font></b></h3>
<font size="2">
<p>The ICT supplies create a customer-supplier chain where the Public Administration (PA) acts both as a customer, in its relation towards the ICT services supplying companies, and as a business services supplier, for citizens, enterprises and its employees.</p>
<dl class="image-inline captioned">
    <dt><img title="flusso" alt="flusso" width="642" height="135" src="http://www.osor.eu/studies/images/introduction.jpg/image_large" /> </dt>
    <dd class="image-caption" style="width: 642px"></dd>
</dl>
<div align="center">&nbsp;</div>
<p>Usually, a business service delivered by a PA is the result of a mixture of different software and hardware components and services, taken by different suppliers that have to integrate and cooperate in order to maintain the high level of quality expected by a public administration.<br />
In many cases, a discrepancy may occur between the realisation phase of an application and the successive production phase, inducing a lower quality of the final business service.<br />
Members of the organization dealing with the software constituents and the ones dealing with the service management tend to have conflicting objectives:</p>
<ul>
    <li>The development teams are usually focused on the single service components, while the management structure is focalised on the delivery of the services as a whole;</li>
    <li>The developments teams usually work on specific projects, while the management structure handles recurring processes and activities.
    <table class="plain">
        <tbody>
            <tr>
                <th>Aspect<br />
                &nbsp;</th>
                <th>Project development<br />
                &nbsp;</th>
                <th>Process management</th>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>Time scale</td>
                <td>Limited duration</td>
                <td>Continuous</td>
            </tr>
            <tr>
                <td>Process type</td>
                <td>Unique<br />
                &nbsp;</td>
                <td>Repetitive</td>
            </tr>
            <tr>
                <td>Initiative&nbsp;&nbsp;&nbsp; <br />
                &nbsp;</td>
                <td>Scheduled&nbsp;&nbsp;&nbsp; <br />
                &nbsp;</td>
                <td>Event Driven</td>
            </tr>
            <tr>
                <td>Level of analysis</td>
                <td>Clear and well-defined objectives</td>
                <td>Overall objectives</td>
            </tr>
        </tbody>
    </table>
    </li>
</ul>
</font>
<p><font size="2">It may happen that, separately considered, the project development and the management process both comply with the pre-defined SLAs, but that the consequent business service provided does not meet the end user needs.</font></p>
<p><font size="2">&nbsp;In order to prevent this, it is important that:</font></p>
<ul>
    <li><font size="2">the overall business services goals, and&nbsp;</font></li>
    <li><font size="2">the design and implementation of the service supply </font><font size="2">link the life-cycle of each application with the life-cycle of the complete service.</font></li>
</ul>
<div style="line-height: normal; margin: 0cm 0cm 12pt"><font size="2">The objective can be achieved by working on two levels:</font></div>
<ol>
    <li><font size="2">At the organizational level, a specific team is dedicated to the process of &quot;transformation&quot; of the software product to a customer service. The team must be able to ensure the integration between the service design phase and the service delivery phase, also ensuring a strong focus on the testing and validation phases of the service (Service Transition).</font></li>
    <li><font size="2">In terms of approach, defining the expected quality of the service. The quality of the service should:</font></li>
</ol>
<ul>
    <li><font size="2">be <b>correlated </b>to the goals of the delivery process;</font></li>
    <li><font size="2">allow to <b>formalize </b>the requested service level; and</font></li>
    <li><font size="2">allow to <b>verify </b>the service level attained in a totally transparent way for all the actors involved.</font></li>
</ul>
<p><font size="2">In particular, the Italian Public Administration, which follows the above-mentioned pragmatic approach, has defined some guidelines (</font><a href="http://www.digitpa.gov.it/"><span style="color: blue"><font size="2">www.digitpa.gov.it</font></span></a><font size="2">) including specific service quality levels as well as ICT governance indicators. This fosters a comprehensive, integrated and thoroughly transparent perspective that involves the whole delivery process: quality policies to be applied within institutional missions, ICT sourcing strategies, public procurement, deal negotiation and operations management.</font></p>
<p><font size="2">The service levels are based on the various actors&rsquo; points of view, on the activities performed during the whole services lifecycle and on operational requirements. This aims to foster the projects and ICT services success, and to consequently protect the investments over time, provided that they are supported by effective solutions.</font></p>
<p><font size="2">Service levels and quality indicators, allow to:</font></p>
<ul>
    <li><font size="2">provide operational goals with measurable results;</font></li>
    <li><font size="2">monitor the supply lifecycle and all ICT services activities;</font></li>
    <li><font size="2">monitor overall quality over time.</font></li>
</ul>
<p><font size="2">The Spago4Q platform (</font><a href="http://www.spago4q.org/"><span style="color: blue"><font size="2">www.spago4q.org</font></span></a><font size="2">) is an effective solution allowing to measure and monitor the quality improvement over time in project realization, software project development, ICT services supply and facility management. In the case of the Veneto region, Spago4Q is a central dashboard platform collecting information from all services tools and providing reporting and presentation facilities to monitor and control the SLA.</font></p>
<p><font size="2">In particular, in the Veneto Region, a Regional Department of the Italian Public Administration, Spago4Q platform has been integrated into the IT governance system managing the application and information services supplied to the local government bodies, citizens and enterprises located on the regional territory. The services delivered by the suppliers (service desk, change management, application lifecycle management, asset and configuration management, network and hardware management) as well as the overall service provided to end-users are evaluated according to Service Level Agreements and Key Performance Indicators (KPIs), based on ITIL v3 and CMMI standard processes.</font></p>
<div id="parent-fieldname-text"><a name="section-1"></a>
<h3><b><font size="2">Organisation and background</font></b></h3>
<p><font size="2">The Veneto Region invests in the development of its information system (SIRV) to keep it aligned with the constantly evolving technology in order to increase the efficiency, the transparency and the effectiveness of its administrative processes but in particular to ensure support for innovative projects of e-government, e-democracy, net-economy and net-welfare that help to create a competitive system for all entities in the territory (local authorities, citizens, enterprises).</font></p>
<p><font size="2">The objective of the Veneto Region is to create a system able to support a growing digital cooperation between all involved actors.</font></p>
<p><font size="2">To this end, the Veneto Region offers:</font></p>
<ul>
    <li><font size="2">an infrastructure, the Information System of the Veneto Region (SIRV), which delivers more than 300 business services both to internal and external users, like local bodies, citizens, enterprises operating on the territory of the region;</font></li>
    <li><font size="2">on-line marketplace services for the reuse of experiences, information products and eGovernment projects;</font></li>
    <li><font size="2">results and knowledge derived from participation, with other European regions, in EU research projects.</font></li>
</ul>
<p><font size="2">In order to provide services that are increasingly facing out towards businesses and citizens, the most important aspect is not the individual service or a single technological component, but the entire chain of technological elements that contribute to the delivery in parallel of multiple business services.</font></p>
<p><font size="2">This means that it makes no sense to measure performance of a single component; the business service has to be evaluated as a whole, in order to ensure accessibility, availability, performance and quality from the end users&rsquo; perspective.Within the SIRV project, the Operative Governance System (SGO) has been created, which allows the Veneto Region to:</font></p>
<ul>
    <li><font size="2">monitor the suppliers&rsquo; performance through the measurement and monitoring of the SLA related to the business services, with maximum transparency;</font></li>
    <li><font size="2">commit to the satisfaction of users (both internal and external) and improve the quality of the delivered services;</font></li>
    <li><font size="2">constantly align and adapt the provided services to the needs of the Administration and the regional territory;</font></li>
    <li><font size="2">standardize the IT management and improve the productivity.</font></li>
    <li><font size="2">Within SGO, Spago4Q monitors the SLAs of the business services, as well as incident, change and release management services.</font></li>
</ul>
<div id="parent-fieldname-text"><a name="section-2"></a>
<h3><b><font size="2">Budget and funding/Financial issues</font></b></h3>
<p><font size="2">The project carried out for the Veneto Region is divided into three main phases: takeover, operational and handover.</font></p>
<p><font size="2">Within the takeover phase, the contractor sets up the organisation, the resources and the necessary infrastructure for the provision of the services in the operational and handover phases.</font></p>
<p><font size="2">Among the various infrastructure components, the project focuses on the tools to monitor the services and project management quality (audits, surveys, control board, indicators statistics) and the tools to provide reports such as Monthly Progress Report.</font></p>
<p><font size="2">In the operational phase the contractor is fully responsible for delivering the required services, developing information systems, correcting defects, monitoring progress and in guaranteeing their quality referring to the defined service levels.</font></p>
<p><font size="2">The implementation of the dashboard to monitor the services provided for the Veneto Region has no specific budget but it is part of the set-up of the infrastructure for the governance of the services developed during the takeover.</font></p>
<p><font size="2">The project is internally funded.</font></p>
<div id="parent-fieldname-text"><a name="section-3"></a>
<h3><b><font size="2">Technical issues</font></b></h3>
<h4><b><font size="2">What is Spago4Q</font></b></h4>
<p><font size="2">Spago4Q (www.spago4q.org) is an OSS multi-process and multi-project monitoring platform, released under GNU LGPL license. It allows measuring and monitoring of the quality improvement during the project lifetime, software projects development, ICT services supply and facility management, according to specific service level based on the various actors&rsquo; points of view.</font></p>
<p><font size="2">Spago4Q architecture, obtained as a specialization of SpagoBI (the Open Source Business Intelligence suite www.spagobi.org), is designed in order to be easily adapted to complex organizational contexts. It integrates an advanced meta-model which makes Spago4Q fully independent from the adopted software development processes, infrastructure tools, measurement and assessment frameworks.</font></p>
<dl class="image-inline captioned">
    <dt><img title="Architecture" alt="Architecture" width="457" height="265" src="http://www.osor.eu/studies/images/flusso.jpg/image_large" /> </dt>
    <dd class="image-caption" style="width: 457px"></dd>
</dl>
<p><font size="2">As shows in the previous figure, the ETL (Extract Transform Load) procedures extract data from the set of tools used by the organization and load them into the DWH-Spago4Q data warehouse module, based on the meta-model definition. Spago4Q analyzes data and represents metrics, and the Configuration &amp; Administration module allows system configuration. A set of predefined plug-ins and extractors allows the extraction of data from the most common tools used to support project and service management.<br />
As shown in the following figure, in Veneto Region Spago4Q collects data from the tools used to support the services supplied and provides dashboards for the continuous and proactive monitoring of the SLAs as well as periodic reports on the status of the SLAs and on the result of the undertaken improvement actions, by ensuring transparency in the sharing and dissemination of information through the publication in the information portal of the specific organization.</font></p>
<dl class="image-inline captioned image-inline">
    <dt><img title="Architecture" alt="Architecture" width="421" height="241" src="http://www.osor.eu/studies/images/architecture1.jpg/image_large" /> </dt>
    <dd class="image-caption" style="width: 421px"></dd>
</dl>
<p><font size="2">The most important features follow.</font></p>
<h4><b><font size="2">Main Dashboard</font></b></h4>
<p><font size="2">The picture below shows the dashboard designed to show SLA/KPI value (also with gauge-bar when required). For each SLA/KPI, where applicable, one or more icons show the presence of an exception or a correction report (or both). The other icons show the historical trend of the SLA value and allow drill down to visualize the items responsible for the excess of the SLA threshold. </font></p>
<p><img title="dashboard" alt="dashboard" width="640" height="307" src="http://www.osor.eu/studies/images/maindashboard.jpg/image_large" /></p>
<h4><b><font size="2">Corrections Management</font></b></h4>
<p><font size="2">This optional feature grants the possibility to apply corrections to the Liquidated Damage Unit (LDU) already calculated, however the SAL/KPI calculation would remain unchanged:</font></p>
<ul>
    <li><font size="2">the KPI non-compliance will still be visible in the Report;</font></li>
    <li><font size="2">the correction description will be visualized in the single impacted KPI detail Report as well as in the global detail Report;</font></li>
    <li><font size="2">the LDU calculation will be diminished/augmented taking into account the KPI delta value included in the correction;</font></li>
</ul>
<p><font size="2">This possibility of correction is required because in some cases the SLA non-compliance is not accountable to the contractor (Service Supplier). Such cases, due to the nature of the obstacle impeding the SLA/KPI fulfilment wouldn&rsquo;t require an explicit and official exception but need to be officially tracked and seen by the Customer in order to enable it to request the annulment of this correction if necessary.</font></p>
<h4><b><font size="2">Exceptions Management</font></b></h4>
<p><font size="2">This feature gives the Customer the possibility of applying exceptions to the SLA/KPI non-compliances that are deemed to be independent from Service Supplier will and commitment.</font></p>
<p><font size="2">Exceptions must be explicit, official and linked to a punctual non-compliance, there is no such thing as general exceptions.</font></p>
<p><font size="2">When an exception is granted:</font></p>
<ul>
    <li><font size="2">the SLA/KPI non-compliance will still be visible in the Report;</font></li>
    <li><font size="2">the exception description will be visualized in the single impacted KPI detail Report as well as in the global detail Report;</font></li>
    <li><font size="2">the LDU calculation will be diminished taking into account the KPI delta value included in the exception;</font></li>
</ul>
<h4><b><font size="2">Comments Management</font></b></h4>
<div style="line-height: normal; margin: 0cm 0cm 12pt"><font size="2">This is an online functionality that allows inserting comments into the detail Report, to share these comments with the other users and eventually import them in the Monthly Progress Report.</font></div>
<h4><b><font size="2">Import data logger and quality control</font></b></h4>
<div style="line-height: normal; margin: 0cm 0cm 12pt"><font size="2">This is the data upload functionality that performs, via semantic and chronological checks, a quality and consistency control over the uploaded data.</font></div>
<div style="line-height: normal; margin: 0cm 0cm 12pt"><font size="2">The logger is accessible on the online platform and records the uploads and checks history.</font></div>
<div id="parent-fieldname-text"><a name="section-4"></a>
<h3><b><font size="2">Licensing issues</font></b></h3>
<p><font size="2">The Spago4Q platform is licensed under the GNU Lesser General Public License (GNU LGPL).</font></p>
<div id="parent-fieldname-text"><a name="section-5"></a>
<h3><b><font size="2">Cooperation with other public bodies</font></b></h3>
<p><font size="2">Spago4Q project is hosted by OW2 forge (</font><a href="http://www.ow2.org/"><span style="color: blue"><font size="2">www.ow2.org</font></span></a><font size="2">), a global, independent and non-profit open source community, ensuring transparency, openness, sustainability and open source availability over time.</font></p>
<p><font size="2">Moreover, it takes part in the durable and collaborative development of the OW2 long-lasting ecosystem, where each player can define his/her own open source strategy. In this way everyone contributes to the global sustainability of a wide stack of open source solutions at enterprise level, which no enterprise could ever develop on its own.</font></p>
<p><font size="2">Spago4Q and the other projects within the SpagoWorld initiative belong to a new generation of open source projects, characterized by:</font></p>
<ul>
    <li><font size="2">holistic approach and planned development process;</font></li>
    <li><font size="2">complex design in vertical domains according to project business requirements;</font></li>
    <li><font size="2">mature process development;</font></li>
    <li><font size="2">involvement of a wide community of users, companies and organizations, open source specialists, consultants and developers;</font></li>
    <li><font size="2">guaranteed support service.</font></li>
    <li><font size="2">The communities born around these projects and supported by the active governance role of Engineering Group are as follows:</font></li>
</ul>
<p><font size="2"><b>A free/open source community</b> has been initially growing thanks to the OW2 community; now it&rsquo;s growing around Engineering Group&rsquo;s projects and cooperates through the tools provided by the initiative itself.</font></p>
<p><font size="2"><b>The Open Source Competence Centres</b>, both Italian ones (such as the Italian Open Source Competence Centre <a href="http://www.ccos.it/"><span style="color: blue">www.ccos.it</span></a>) and international ones (e.g. QualiPSo Competence Centres Network and the FLOSS CC initiative <a href="http://www.flosscc.org/"><span style="color: blue">www.flosscc.org</span></a>); they are based on the results coming from the European research project QualiPSo (<a href="http://www.qualipso.org/"><span style="color: blue">www.qualipso.org</span></a>). The labelling infrastructure of the QualiPSo Competence Centres is based on the Spago4Q platform, which integrates the different tools supporting the assessment of products, processes and services, in compliance with QualiPSo MOSST (Model of Open Source Software Trustworthiness) and OMM (Open Maturity Model) models.</font></p>
<p><b><font size="2">A commercial community</font></b><font size="2"> is based on a wide network of technology and integrator partners, which jointly work to support and develop the SpagoWorld projects, providing a wider stack of open source solutions with an integrated offering of support services.<br />
<br />
</font></p>
<div id="parent-fieldname-text"><a name="section-6"></a>
<h3><b><font size="2">Evaluation, including lessons learned, and future plans</font></b></h3>
<h4><b><font size="2">Evaluation</font></b></h4>
<p><font size="2">In the project, the pre-defined objectives have been achieved. The implemented solution meets the following goals:</font></p>
<ul>
    <li><font size="2">it provides both global and detailed view of the SLAs values on the monitored services;</font></li>
    <li><font size="2">it supports the reporting process (Monthly Progress Report, SLA reports);</font></li>
    <li><font size="2">it helps in LDU calculation;</font></li>
    <li><font size="2">it shares and stores feedbacks, comments and exceptions;</font></li>
</ul>
<div style="line-height: normal; margin: 0cm 0cm 12pt"><font size="2">It also ensures:</font></div>
<ul>
    <li><font size="2">Transparency: all actors visualize the SLAs according to their role</font></li>
    <li><font size="2">Uniformity: rules are defined in a single repository;</font></li>
    <li><font size="2">Consistency: well defined data concept;</font></li>
    <li><font size="2">Univocity: the information is collected once;</font></li>
    <li><font size="2">Archiving: data are consolidated at Service level.</font></li>
</ul>
<div style="line-height: normal; margin: 0cm 0cm 12pt"><font size="2">Benefits of this approach follows:</font></div>
<ul>
    <li><font size="2">From the Public Administration/customer point of view: </font><font size="2">The IT services managers of the Public Administration can constantly monitor the quality level of the provided services, according to real and updated data. In this way, the customer pays for the services that are actually supplied, instead of paying for the professional work of the development team.</font></li>
    <li><font size="2">From the systems integrator/supplier point of view:</font><font size="2">The supplier can improve the efficiency of its organization, by identifying the existing systems inefficiencies and some areas of improvement, making it benefit from the consequent reduction of the organizational costs</font></li>
</ul>
<h4><b><font size="2">Lessons learned</font></b></h4>
<p><font size="2">The project provided evidence on clear benefits on the measurement process. The Public Administration pays particular attention to the low-cost tools (OSS) for a better monitoring and control both at the project and organizational level. The right combination should include both methods and tools.</font></p>
<p><font size="2">Sometimes it could be difficult to obtain a good quality of data extracted from the tools that support the ICT service and perform the actions for process improvements. Time pressure, workload and urgent activities may encumber the team to provide sufficient effort to the Software Process Improvement activities, so continuous commitment is needed.</font></p>
<h4><b><font size="2">Future Plans</font></b></h4>
<p><font size="2">Spago4Q is a platform developed and managed over time both by a company and a community, so that its development is continuous and progressive. In addition, its flexibility and easy adaptability to the requirements of users make it particularly suitable to projects such as those described here, that naturally evolve over time both in terms of expansion of the operational and application infrastructures to be monitored, and of typical change over time in terms of technical and functional characteristics.</font></p>
<div id="parent-fieldname-text"><a name="section-7"></a>
<h3><b><font size="2">Acknowledgments</font></b></h3>
<p><font size="2">The study was based on information presented by Davide Dalle Carbonare during the &ldquo;Open Source: Its place in cross-border environment&rdquo; workshop organised by the European Commission in Brussels, and on extensive material received from Davide Dalle Carbonare, Sergio Oltolina, and Gabriele Ruffatti of Engineering, the company that supports Spago4Q and the rest of the SpagoWorld Open Source initiative. Spago4Q is hosted by the OW2 Consortium.</font></p>
<div id="parent-fieldname-text"><a name="section-8"></a>
<h3><b><font size="2">Links</font></b></h3>
<b><font size="2">
<ul>
    <li><a class="external-link" jquery1318583244695="176" href="http://www.spago4q.org/"><font color="#0066cc">www.<span class="highlightedSearchTerm" jquery1318583244695="218">spago4q</span>.org</font></a></li>
    <li><a class="external-link" jquery1318583244695="177" href="http://www.spagoworld.org/"><font color="#0066cc">www.spagoworld.org</font></a></li>
    <li><a class="external-link" jquery1318583244695="178" href="http://www.ow2.org/"><font color="#0066cc">www.ow2.org</font></a></li>
    <li><a class="external-link" jquery1318583244695="179" href="http://www.qualipso.org/"><font color="#0066cc">www.qualipso.org</font></a></li>
    <li><a class="external-link" jquery1318583244695="180" href="http://www.ccos.it/"><font color="#0066cc">www.ccos.it</font></a></li>
    <li><a class="external-link" jquery1318583244695="181" href="http://www.digitpa.gov.it/"><font color="#0066cc">www.digitpa.gov.it</font></a></li>
    <li><a class="external-link" jquery1318583244695="182" href="http://www.regione.veneto.it/"><font color="#0066cc">www.regione.vene<span class="highlightedSearchTerm" jquery1318583244695="388">to</span>.it</font></a></li>
</ul>
</font></b></div>
</div>
</div>
</div>
</div>
<p>&nbsp;</p>
<dl class="image-inline captioned">
    <dt>&nbsp;</dt>
    <dd class="image-caption" style="width: 640px"></dd>
</dl>
</div>
</div>
</div>
</div>
<p>&nbsp;</p>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ===================================================================================================== */