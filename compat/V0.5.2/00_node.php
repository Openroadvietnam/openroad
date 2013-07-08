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
	$newNode->title = 'European Union Public Licence (EUPL v.1.1) ';
	$path = 'software/page/licence-eupl';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<h1 class="documentFirstHeading"><span class="documentAuthor"><br />
</span></h1>
<p class="documentDescription"><span id="parent-fieldname-description">             Text and preamble of the European Union Public Licence  (EUPL) version 1.1, available in 22 official languages of the European  Union.         </span></p>
<p>This page contains all the official versions of the European  Union Public Licence (EUPL)&nbsp; together with a preamble explaining the  purpose of this Free/Open Source Software Licence, together with links  to further information on the licence.</p>
<p><br />
&nbsp;</p>
<table align="center" class="plain">
    <tbody>
        <tr>
            <td align="left"><strong>BG</strong></td>
            <td align="left"><a href="../../system/files/BG/EUPL%20v.1.1%20-%2041f44043543043c43144e43b.pdf" class="document pdf" title="EUPL v.1.1 - ????????"> EUPL v.1.1 - ????????</a></td>
            <td align="left"><a href="../../system/files/BG/EUPL%20v.1.1%20-%2041b41842641541d417.pdf" class="document pdf" title="EUPL v.1.1 - ??????">EUPL v.1.1 - ??????</a></td>
        </tr>
        <tr>
            <td align="left"><strong>CS</strong></td>
            <td align="left"><a href="../../system/files/CS/EUPL%20v.1.1%20-%20Preambule.pdf" class="document pdf" title="EUPL v.1.1 - Preambule">EUPL v.1.1 - Preambule</a></td>
            <td align="left"><a href="../../system/files/CS/EUPL%20v.1.1%20-%20license.pdf" class="document pdf" title="EUPL v.1.1 - license">EUPL v.1.1 - Licence</a></td>
        </tr>
        <tr>
            <td align="left"><strong>DA</strong></td>
            <td align="left"><a href="../../system/files/DA/EUPL%20v.1.1%20-%20Forord.pdf" class="document pdf" title="EUPL v.1.1 - Forord">EUPL v.1.1 - Forord</a></td>
            <td align="left"><a href="../../system/files/DA/EUPL%20v.1.1%20-%20Licens.pdf" class="document pdf" title="EUPL v.1.1 - Licens">EUPL v.1.1 - Licens</a></td>
        </tr>
        <tr>
            <td align="left"><strong>DE</strong></td>
            <td align="left"><a href="../../system/files/DE/EUPL%20v.1.1%20-%20Praambel.pdf" class="document pdf" title="EUPL v.1.1 - Pr&auml;ambel"> EUPL v.1.1 - Pr&auml;ambel</a></td>
            <td align="left"><a href="../../system/files/DE/EUPL%20v.1.1%20-%20Lizenz.pdf" class="document pdf" title="EUPL v.1.1 - Lizenz"> EUPL v.1.1 - Lizenz</a></td>
        </tr>
        <tr>
            <td align="left"><strong>ET</strong></td>
            <td align="left"><a href="../../system/files/ET/EUPL%20v.1.1%20-%20Preambul.pdf" class="document pdf" title="EUPL v.1.1 - Preambul"> EUPL v.1.1 - Preambul</a></td>
            <td align="left"><a href="../../system/files/ET/EUPL%20v.1.1%20-%20Litsents.pdf" class="document pdf" title="EUPL v.1.1 - Litsents"> EUPL v.1.1 - Litsents</a></td>
        </tr>
        <tr>
            <td align="left"><strong>EL</strong></td>
            <td align="left"><a href="../../system/files/EL/EUPL%20v.1.1%20-%203a03c13bf3bf3bc3b93bf.pdf" class="document pdf" title="EUPL v.1.1 - &Pi;&rho;&omicron;&omicron;?&mu;&iota;&omicron;">EUPL v.1.1 - &Pi;&rho;&omicron;&omicron;?&mu;&iota;&omicron;</a></td>
            <td align="left"><a href="../../system/files/EL/EUPL%20v.1.1%20-%203b43b53b93b1%203a73c13c33b73c2.pdf" class="document pdf" title="EUPL v.1.1 - ?&delta;&epsilon;&iota;&alpha; &Chi;&rho;?&sigma;&eta;&sigmaf;">EUPL v.1.1 - ?&delta;&epsilon;&iota;&alpha; &Chi;&rho;?&sigma;&eta;&sigmaf;</a></td>
        </tr>
        <tr>
            <td align="left"><strong>EN</strong></td>
            <td align="left"><a href="../../system/files/EN/EUPL%20v.1.1%20-%20Preamble.pdf" class="document pdf" title="EUPL v.1.1 - Preamble">EUPL v.1.1 - Preamble</a></td>
            <td align="left"><a href="../../system/files/EN/EUPL%20v.1.1%20-%20Licence.pdf" class="document pdf" title="EUPL v.1.1 - Licence"> EUPL v.1.1 - Licence</a></td>
        </tr>
        <tr>
            <td align="left"><strong>ES</strong></td>
            <td align="left"><a href="../../system/files/ES/EUPL%20v.1.1%20-%20Preambulo.pdf" class="document pdf" title="EUPL v.1.1 - Pre&aacute;mbulo"> EUPL v.1.1 - Pre&aacute;mbulo</a></td>
            <td align="left"><a href="../../system/files/ES/EUPL%20v.1.1%20-%20Licencia.pdf" class="document pdf" title="EUPL v.1.1 - Licencia">EUPL v.1.1 - Licencia</a></td>
        </tr>
        <tr>
            <td align="left"><strong>FR</strong></td>
            <td align="left"><a href="../../system/files/FR/EUPL%20v.1.1%20-%20Preambule.pdf" class="document pdf" title="EUPL v.1.1 - Pr&eacute;ambule">EUPL v.1.1 - Pr&eacute;ambule</a></td>
            <td align="left"><a href="../../system/files/FR/EUPL%20v.1.1%20-%20Licence.pdf" class="document pdf" title="EUPL v.1.1 - Licence">EUPL v.1.1 - Licence</a></td>
        </tr>
        <tr>
            <td align="left"><strong>IT</strong></td>
            <td align="left"><a href="../../system/files/IT/EUPL%20v.1.1%20-%20Preambolo.pdf" class="document pdf" title="EUPL v.1.1 - Preambolo">EUPL v.1.1 - Preambolo</a></td>
            <td align="left"><a href="../../system/files/IT/EUPL%20v.1.1%20-%20licenza.pdf" class="document pdf" title="EUPL v.1.1 - licenza"> EUPL v.1.1 - Licenza</a></td>
        </tr>
        <tr>
            <td align="left"><strong>LV</strong></td>
            <td align="left"><a href="../../system/files/LV/EUPL%20v.1.1%20-%20Preambula.pdf" class="document pdf" title="EUPL v.1.1 - Preambula">EUPL v.1.1 - Preambula</a></td>
            <td align="left"><a href="../../system/files/LV/EUPL%20v.1.1%20-%20Licence.pdf" class="document pdf" title="EUPL v.1.1 - Licence">EUPL v.1.1 - Licence</a></td>
        </tr>
        <tr>
            <td align="left"><strong>LT</strong></td>
            <td align="left"><a href="../../system/files/LT/EUPL%20v.1.1%20-%20Preambule.pdf" class="document pdf" title="EUPL v.1.1 - Preambule"> EUPL v.1.1 - Preambule</a></td>
            <td align="left"><a href="../../system/files/LT/EUPL%20v.1.1%20-%20Licencija.pdf" class="document pdf" title="EUPL v.1.1 - Licencija"> EUPL v.1.1 - Licencija</a></td>
        </tr>
        <tr>
            <td align="left"><strong>HU</strong></td>
            <td align="left"><a href="../../system/files/HU/EUPL%20v.1.1%20-%20Preambulum.pdf" class="document pdf" title="EUPL v.1.1 - Preambulum">EUPL v.1.1 - Preambulum</a></td>
            <td align="left"><a href="../../system/files/HU/EUPL%20v.1.1%20-%20Licenc.pdf" class="document pdf" title="EUPL v.1.1 - Licenc">EUPL v.1.1 - Licenc</a></td>
        </tr>
        <tr>
            <td align="left"><strong>MT</strong></td>
            <td align="left"><a href="../../system/files/MT/EUPL%20v.1.1%20-%20Preambolu.pdf" class="document pdf" title="EUPL v.1.1 - Preambolu">EUPL v.1.1 - Preambolu</a></td>
            <td align="left"><a href="../../system/files/MT/EUPL%20v.1.1%20-Licenzja.pdf" class="document pdf" title="EUPL v.1.1 -Licenzja">EUPL v.1.1 - Licenzja&nbsp;</a></td>
        </tr>
        <tr>
            <td align="left"><strong>NL&nbsp;</strong></td>
            <td align="left"><a href="../../system/files/NL/EUPL%20v.1.1%20-%20Inleiding.pdf" class="document pdf" title="EUPL v.1.1 - Inleiding">EUPL v.1.1 - Inleiding</a></td>
            <td align="left"><a href="../../system/files/NL/EUPL%20v.1.1%20-%20Licentie.pdf" class="document pdf" title="EUPL v.1.1 - Licentie"> EUPL v.1.1 - Licentie</a></td>
        </tr>
        <tr>
            <td align="left"><strong>PL</strong></td>
            <td align="left"><a href="../../system/files/PL/EUPL%20v.1.1%20-%20Preambula.pdf" class="document pdf" title="EUPL v.1.1 - Preambula">EUPL v.1.1 - Preambula</a></td>
            <td align="left"><a href="../../system/files/PL/EUPL%20v.1.1%20-%20Licencja.pdf" class="document pdf" title="EUPL v.1.1 - Licencja">EUPL v.1.1 - Licencja</a></td>
        </tr>
        <tr>
            <td align="left"><strong>PT</strong></td>
            <td align="left"><a href="../../system/files/PT/EUPL%20v.1.1%20-%20Preambulo.pdf" class="document pdf" title="EUPL v.1.1 - Pre&acirc;mbulo"> EUPL v.1.1 - Pre&acirc;mbulo</a></td>
            <td align="left"><a href="../../system/files/PT/EUPL%20v.1.1%20-%20licencia.pdf" class="document pdf" title="EUPL v.1.1 - licencia">EUPL v.1.1 - Licen&ccedil;a</a></td>
        </tr>
        <tr>
            <td align="left"><strong>RO&nbsp;</strong></td>
            <td align="left"><a href="../../system/files/RO/EUPL%20v.1.1%20-%20Preambul.pdf" class="document pdf" title="EUPL v.1.1 - Preambul">EUPL v.1.1 - Preambul</a></td>
            <td align="left"><a href="../../system/files/RO/EUPL%20v.1.1%20-%20Licenta.pdf" class="document pdf" title="EUPL v.1.1 - Licenta">EUPL v.1.1 - Licenta</a></td>
        </tr>
        <tr>
            <td align="left"><strong>SK&nbsp;</strong></td>
            <td align="left"><a href="../../system/files/SK/EUPL%20v.1.1%20-%20Preambula.pdf" class="document pdf" title="EUPL v.1.1 - Preambula">EUPL v.1.1 - Preambula</a></td>
            <td align="left"><a href="../../system/files/SK/EUPL%20v.1.1%20-%20Licencia.pdf" class="document pdf" title="EUPL v.1.1 - Licencia">EUPL v.1.1- Licencia</a></td>
        </tr>
        <tr>
            <td align="left"><strong>SL</strong></td>
            <td align="left"><a href="../../system/files/SL/EUPL%20v.1.1%20-%20Preambula.pdf" class="document pdf" title="EUPL v.1.1 - Preambula"> EUPL v.1.1 - Preambula</a></td>
            <td align="left"><a href="../../system/files/SL/EUPL%20v.1.1%20-%20Licenca.pdf" class="document pdf" title="EUPL v.1.1 - Licenca">EUPL v.1.1 - Licenca</a></td>
        </tr>
        <tr>
            <td align="left"><strong>FI</strong></td>
            <td align="left"><a href="../../system/files/FI/EUPL%20v.1.1%20-%20Johdanto.pdf" class="document pdf" title="EUPL v.1.1 - Johdanto">EUPL v.1.1 - Johdanto&nbsp;</a></td>
            <td align="left"><a href="../../system/files/FI/EUPL%20v.1.1%20-%20Lisenssi.pdf" class="document pdf" title="EUPL v.1.1 - Lisenssi">EUPL v.1.1 - Lisenssi</a></td>
        </tr>
        <tr>
            <td align="left"><strong>SV</strong></td>
            <td align="left"><a href="../../system/files/SV/EUPL%20v.1.1%20-%20Motivering.pdf" class="document pdf" title="EUPL v.1.1 - Motivering"> EUPL v.1.1 - Motivering</a></td>
            <td align="left"><a href="../../system/files/SV/EUPL%20v.1.1%20-%20Licens.pdf" class="document pdf" title="EUPL v.1.1 - Licens"> EUPL v.1.1 - Licens</a></td>
        </tr>
    </tbody>
</table>
<p><strong>Further information:</strong></p>
<p>&nbsp;</p>
<ul>
    <li><a href="./introduction-eupl-licence" class="external-link">General information about the EUPL</a>&nbsp;</li>
    <li><a href="./eupl-guidelines" class="external-link">Guidelines for users and developers on &quot;how to use the EUPL&quot; (available in 22 languages)</a></li>
    <li><a href="./eupl-compatible-open-source-licences" title="EUPL-compatible licenses">EUPL compatible open source licences</a></li>
    <li><a href="./eupl-community" class="external-link">The EUPL community</a></li>
    <li><a href="http://ec.europa.eu/idabc/EN/document/7330.html" class="external-link">EUPL v.1.0 (previous version)&nbsp;on the European Commission site </a></li>
    <li><a href="http://ec.europa.eu/idabc/EN/document/7778.html" class="external-link">List of the experts having participated to the legal quality verification of the various linguistic versions of the EUPL </a></li>
    <li><a href="../../system/files/doc/Docda3d.pdf"><span class="pdf-document">Translation  of the EUPL into the official languages of the European Union - Report  on comments received by&nbsp;the European Commission&nbsp;</span>&nbsp;</a></li>
    <li><a href="../../system/files/doc/Doc3ef5.pdf">Study of the compatibility mechanism of the EUPL&nbsp; </a></li>
    <li><a href="http://ec.europa.eu/idabc/EN/document/5425.html" class="external-link">Preparations for the EUPL v.1.0</a></li>
    <li><a href="http://ec.europa.eu/idabc/EN/document/7311.html" class="external-link">EUPL Workshop</a></li>
    <li><a href="./articles-eupl" title="Documentation directory">Articles on EUPL</a></li>
</ul>
<p>&nbsp;</p>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Guidelines for users and developers ';
	$path = 'software/page/eupl-guidelines';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<h1 class="documentFirstHeading"><span id="parent-fieldname-title">EUPL v1.1  Guidelines for users and developers </span></h1>
<div class="documentByLine" id="plone-document-byline"><span class="documentAuthor"><br />
</span><span class="documentModified">  </span></div>
<p class="documentDescription"><span id="parent-fieldname-description">This page  provides access to the Guidelines for users and developers EUPL v.1.1 (Please  select your language). </span></p>
<div id="parent-fieldname-text">
<p><span class="Apple-style-span">Guidelines exist in the following  languages:&nbsp;</span></p>
<div align="center">
<table border="1" class="MsoNormalTable">
    <tbody>
        <tr>
            <td>
            <p><strong><span style="FONT-SIZE: 9pt">BG</span></strong></p>
            </td>
            <td width="288">
            <p><span style="FONT-SIZE: 9pt"><a href="../../system/files/guidelines/EUPL%201.1%20Guidelines%20BG.pdf" title="EUPL guidelines BG" class="document pdf">EUPL v1.1 Guidelines </a></span></p>
            </td>
        </tr>
        <tr>
            <td>
            <p><strong><span style="FONT-SIZE: 9pt">CS</span></strong></p>
            </td>
            <td width="288">
            <p><span style="FONT-SIZE: 9pt"><a href="../../system/files/guidelines/EUPL%201.1%20Guidelines%20CS.pdf" title="EUPL guidelines CS" class="document pdf">EUPL v1.1 Guidelines </a></span></p>
            </td>
        </tr>
        <tr>
            <td>
            <p><strong><span style="FONT-SIZE: 9pt">DA</span></strong></p>
            </td>
            <td width="288">
            <p><span style="FONT-SIZE: 9pt"><a href="../../system/files/guidelines/EUPL%201.1%20Guidelines%20DA.pdf" title="EUPL guidelines DA" class="document pdf">EUPL v1.1 Guidelines </a></span></p>
            </td>
        </tr>
        <tr>
            <td>
            <p><strong><span style="FONT-SIZE: 9pt">DE</span></strong></p>
            </td>
            <td width="288">
            <p><span style="FONT-SIZE: 9pt"><a href="../../system/files/guidelines/EUPL%201.1%20Guidelines%20DE.pdf" title="EUPL guidelines DE" class="document pdf">EUPL v1.1 Guidelines </a></span></p>
            </td>
        </tr>
        <tr>
            <td>
            <p><strong><span style="FONT-SIZE: 9pt">ET</span></strong></p>
            </td>
            <td width="288">
            <p><span style="FONT-SIZE: 9pt"><a href="../../system/files/guidelines/EUPL%201.1%20Guidelines%20ET.pdf" title="EUPL guidelines ET" class="document pdf">EUPL v1.1 Guidelines </a></span></p>
            </td>
        </tr>
        <tr>
            <td>
            <p><strong><span style="FONT-SIZE: 9pt">EL</span></strong></p>
            </td>
            <td width="288">
            <p><span style="FONT-SIZE: 9pt"><a href="../../system/files/guidelines/EUPL%201.1%20Guidelines%20EL.pdf" title="EUPL guidelines EL" class="document pdf">EUPL v1.1 Guidelines </a></span></p>
            </td>
        </tr>
        <tr>
            <td>
            <p><strong><span style="FONT-SIZE: 9pt">EN</span></strong></p>
            </td>
            <td width="288">
            <p><span style="FONT-SIZE: 9pt"><a href="../../system/files/guidelines/EUPL%201.1%20Guidelines%20EN.pdf" title="EUPL guidelines EN" class="document pdf">EUPL v1.1 Guidelines </a></span></p>
            </td>
        </tr>
        <tr>
            <td>
            <p><strong><span style="FONT-SIZE: 9pt">ES</span></strong></p>
            </td>
            <td width="288">
            <p><span style="FONT-SIZE: 9pt"><a href="../../system/files/guidelines/EUPL%201.1%20Guidelines%20ES.pdf" title="EUPL guidelines ES" class="document pdf">EUPL v1.1 Guidelines </a></span></p>
            </td>
        </tr>
        <tr>
            <td>
            <p><strong><span style="FONT-SIZE: 9pt">FR</span></strong></p>
            </td>
            <td width="288">
            <p><span style="FONT-SIZE: 9pt"><a href="../../system/files/guidelines/EUPL%201.1%20Guidelines%20FR.pdf" title="EUPL guidelines FR" class="document pdf">EUPL v1.1 Guidelines </a></span></p>
            </td>
        </tr>
        <tr>
            <td>
            <p><strong><span style="FONT-SIZE: 9pt">IT</span></strong></p>
            </td>
            <td width="288">
            <p><span style="FONT-SIZE: 9pt"><a href="../../system/files/guidelines/EUPL%201.1%20Guidelines%20IT.pdf" title="EUPL guidelines IT" class="document pdf">EUPL v1.1 Guidelines </a></span></p>
            </td>
        </tr>
        <tr>
            <td>
            <p><strong><span style="FONT-SIZE: 9pt">LV</span></strong></p>
            </td>
            <td width="288">
            <p><span style="FONT-SIZE: 9pt"><a href="../../system/files/guidelines/EUPL%201.1%20Guidelines%20LV.pdf" title="EUPL guidelines LV" class="document pdf">EUPL v1.1 Guidelines </a></span></p>
            </td>
        </tr>
        <tr>
            <td>
            <p><strong><span style="FONT-SIZE: 9pt">LT</span></strong></p>
            </td>
            <td width="288">
            <p><span style="FONT-SIZE: 9pt"><a href="../../system/files/guidelines/EUPL%201.1%20Guidelines%20LT.pdf" title="EUPL guidelines LT" class="document pdf">EUPL v1.1 Guidelines </a></span></p>
            </td>
        </tr>
        <tr>
            <td>
            <p><strong><span style="FONT-SIZE: 9pt">HU</span></strong></p>
            </td>
            <td width="288">
            <p><span style="FONT-SIZE: 9pt"><a href="../../system/files/guidelines/EUPL%201.1%20Guidelines%20HU.pdf" title="EUPL guidelines HU" class="document pdf">EUPL v1.1 Guidelines </a></span></p>
            </td>
        </tr>
        <tr>
            <td>
            <p><strong><span style="FONT-SIZE: 9pt">MT</span></strong></p>
            </td>
            <td width="288">
            <p><span style="FONT-SIZE: 9pt"><a href="../../system/files/guidelines/EUPL%201.1%20Guidelines%20MT.pdf" title="EUPL guidelines MT" class="document pdf">EUPL v1.1 Guidelines </a></span></p>
            </td>
        </tr>
        <tr>
            <td>
            <p><strong><span style="FONT-SIZE: 9pt">NL&nbsp;</span></strong></p>
            </td>
            <td width="288">
            <p><span style="FONT-SIZE: 9pt"><a href="../../system/files/guidelines/EUPL%201.1%20Guidelines%20NL.pdf" title="EUPL guidelines NL" class="document pdf">EUPL v1.1 Guidelines </a></span></p>
            </td>
        </tr>
        <tr>
            <td>
            <p><strong><span style="FONT-SIZE: 9pt">PL</span></strong></p>
            </td>
            <td width="288">
            <p><span style="FONT-SIZE: 9pt"><a href="../../system/files/guidelines/EUPL%201.1%20Guidelines%20PL.pdf" title="EUPL guidelines PL" class="document pdf">EUPL v1.1 Guidelines </a></span></p>
            </td>
        </tr>
        <tr>
            <td>
            <p><strong><span style="FONT-SIZE: 9pt">PT</span></strong></p>
            </td>
            <td width="288">
            <p><span style="FONT-SIZE: 9pt"><a href="../../system/files/guidelines/EUPL%201.1%20Guidelines%20PT.pdf" title="EUPL guidelines PT" class="document pdf">EUPL v1.1 Guidelines </a></span></p>
            </td>
        </tr>
        <tr>
            <td>
            <p><strong><span style="FONT-SIZE: 9pt">RO&nbsp;</span></strong></p>
            </td>
            <td width="288">
            <p><span style="FONT-SIZE: 9pt"><a href="../../system/files/guidelines/EUPL%201.1%20Guidelines%20RO.pdf" title="EUPL guidelines RO" class="document pdf">EUPL v1.1 Guidelines </a></span></p>
            </td>
        </tr>
        <tr>
            <td>
            <p><strong><span style="FONT-SIZE: 9pt">SK&nbsp;</span></strong></p>
            </td>
            <td width="288">
            <p><span style="FONT-SIZE: 9pt"><a href="../../system/files/guidelines/EUPL%201.1%20Guidelines%20SK.pdf" title="EUPL guidelines SK" class="document pdf">EUPL v1.1 Guidelines </a></span></p>
            </td>
        </tr>
        <tr>
            <td>
            <p><strong><span style="FONT-SIZE: 9pt">SL</span></strong></p>
            </td>
            <td width="288">
            <p><span style="FONT-SIZE: 9pt"><a href="../../system/files/guidelines/EUPL%201.1%20Guidelines%20SL.pdf" title="EUPL guidelines SL" class="document pdf">EUPL v1.1 Guidelines </a></span></p>
            </td>
        </tr>
        <tr>
            <td>
            <p><strong><span style="FONT-SIZE: 9pt">FI</span></strong></p>
            </td>
            <td width="288">
            <p><span style="FONT-SIZE: 9pt"><a href="../../system/files/guidelines/EUPL%201.1%20Guidelines%20FI.pdf" title="EUPL guidelines FI" class="document pdf">EUPL v1.1 Guidelines </a></span></p>
            </td>
        </tr>
        <tr>
            <td>
            <p><strong><span style="FONT-SIZE: 9pt">SV</span></strong></p>
            </td>
            <td width="288">
            <p><span style="FONT-SIZE: 9pt"><a href="../../system/files/guidelines/EUPL%201.1%20Guidelines%20SV.pdf" title="EUPL guidelines SV" class="document pdf">EUPL v1.1 Guidelines  </a></span></p>
            </td>
        </tr>
    </tbody>
</table>
</div>
<p align="center" style="TEXT-ALIGN: center"><span style="FONT-SIZE: 9pt">&nbsp;</span></p>
<p align="center" style="TEXT-ALIGN: center"><span style="FONT-SIZE: 9pt"><span class="Apple-style-span">&nbsp;</span>&nbsp;</span></p>
<p>To complement the guidelines in case you want to distribute an application  combining F/OSS components received under various F/OSS licences, please read  the list of EUPL compatible licences</p>
</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Introduction to the EUPL licence ';
	$path = 'software/page/introduction-eupl-licence';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<h1 class="documentFirstHeading"><span id="parent-fieldname-title">Introduction to  the EUPL licence </span></h1>
<div class="documentByLine" id="plone-document-byline"><span class="documentAuthor"><br />
</span></div>
<p class="documentDescription"><span id="parent-fieldname-description">The EUPL is  the first European Free/Open Source Software (F/OSS) licence. It has been  created on the initiative of the European Commission. It is now approved by the  European Commission in 22 linguistic versions and can be used by anyone for  software distribution. </span></p>
<dl class="portlet toc" id="document-toc">
    <dt class="portletHeader">Contents</dt>
    <dd class="portletItem">
    <ol>
        <li><a href="#section-0">What  is the EUPL?</a></li>
        <li><a href="#section-1">Why  the EUPL?</a></li>
        <li><a href="#section-2">Objectives</a></li>
        <li><a href="#section-3">Who  may use the EUPL?</a></li>
        <li><a href="#section-4">The  role of the IDABC programme</a></li>
        <li><a href="#section-5">OSI  certified</a></li>
    </ol>
    </dd>
</dl>
<div id="parent-fieldname-text">
<p>The EUPL is the first European Free/Open Source Software (F/OSS) licence. It  has been created on the initiative of the European Commission. It is now  approved by the European Commission in 22 official languages of the European  Union and can be used by anyone for software distribution.</p>
<p>Following an intensive preparatory process and a public consultation, it was  approved by the European Commission on 9 January 2007 in three linguistic  versions.</p>
<p>By a second Decision of 9 January 2008, the European Commission validated the  EUPL in 22 official languages of the European Union.</p>
<p>By a third decision of 9 January 2009, the European Commission adopted a  revised version of the Licence while at the same time validated it in 22&nbsp;  official languages (EUPL v.1.1).</p>
<p>The EUPL is a unique legal instrument, as it has been elaborated in respect  of European law requirements and has legal value in 22 European languages.</p>
<p>More than 100 other F/OSS licences exist. The purpose of the EUPL is not to  compete with any of these licences, but to encourage first of all, a new wave of  public administrations to embrace the Free/Open Source model to valorise their  software and knowledge, starting with the European Institutions  themselves.</p>
The EUPL is compatible with some other copyleft licences,  including the GPLv2. The first applications developed inside the European  Commission or by national public administration have already been published  under the EUPL.
<p align="right">[<a href="#what-is-the-eupl" title="What is the EUPL?">top</a>]</p>
<a name="section-0"></a>
<h2><a name="what-is-the-eupl"></a>What is the EUPL?</h2>
<p>EUPL is an acronym&nbsp; for &ldquo;European Union Public Licence&rdquo;.</p>
<p>The first EUPL draft (v.0.1) went public in June 2005. A public debate was  then&nbsp; organised by the European Commission (IDABC). The consultation of the  developers and users community was very productive and has lead to many  improvements of the draft licence; 10 out of 15 articles were modified. Based on  the results of these modifications (a detailed report and the draft EUPL v.0.2),  the European Commission&nbsp; elaborated a final version (v.1.0) that was officially  approved on 9 January 2007, in three linguistic versions.</p>
<p><br />
By a second Decision of 9 January 2008, the European Commission validated  the EUPL in all the official languages of the European Union.</p>
<p>By a third Decision of 9 January 2009, the European Commission clarified  specific points of the&nbsp;EUPL, publishing the version 1.1&nbsp;in all the official  languages of the European Union.</p>
<p align="right">[<a href="#what-is-the-eupl" title="What is the EUPL?">top</a>]</p>
<a name="section-1"></a>
<h2>Why the EUPL?</h2>
<p>The purpose of the European Commission is first of all to distribute its own  software under the licence. Some applications developed in the framework of the  IDABC programme, such as CIRCA, or IPM have already been licensed under the EUPL  in 2007. Other European Institutions are also interested in using the new  licence.</p>
<p>But why creating a new legal instrument from scratch when more than 100 other  F/OSS licences exist, such as the GPL, the BSD or the OSL? The reason is that in  a detailed legal study no existing licence was found to correspond to the  requirements of the European Commission:</p>
<ul>
    <li>The Licence should have equal legal value in many languages;</li>
    <li>The terminology regarding intellectual property rights had to be conformant  with European law requirements ;</li>
    <li>To be valid in all Member States, limitations of liability or warranty had  to be precise, and not formulated &ldquo;to the extend allowed by the law&rdquo; as in most  licences designed with the legal environment of the United States in mind.
    <p align="right">[<a href="#what-is-the-eupl" title="What is the EUPL?">top</a>]</p>
    </li>
</ul>
<a name="section-2"></a>
<h2>Objectives</h2>
<p>The main objective of the European Commission is to distribute widely and  promote the use of software owned by itself and other European Institutions  under an Free/Open Source Licence conform to European law requirements.</p>
<p>The EUPL is however written in neutral terms so that a broader use might be  envisaged.</p>
<p>In addition, distribution of software should avoid the exclusive  appropriation of the software even after improvement by a third party  (therefore, the EUPL is a &quot;copyleft&quot; licence).</p>
<p align="right">[<a href="#what-is-the-eupl" title="What is the EUPL?">top</a>]</p>
<a name="section-3"></a>
<h2>Who may use the EUPL?</h2>
<p>Although the potential users of European Institutions\' software are mostly  other public sector administrations, there is nothing in the EUPL preventing its  broader use. The EUPL could be used by anyone who holds the copyright to a piece  of software. It could become &ndash; in various languages - an adequate legal  interoperability instrument across Europe.</p>
<p>Nevertheless, the EUPL purpose is not to compete with other licences. It  might be used primarily by public administrations, either European or national,  that would need a common licensing instrument to mutualise or share software and  knowledge.</p>
<p><strong>Is the EUPL compatible with the GPL and other F/OSS  licences?</strong></p>
<p>Yes, it is. The EUPL contains a unique compatibility clause and provides for  a list of compatible copyleft licences. The GPL is one of them.</p>
<p><strong>For example, how would the interaction between the EUPL and the GPL  play out in the case of CIRCA, an application a already distributed&nbsp; under the  EUPL?</strong></p>
<p>A developer may improve CIRCA by integrating a GPL component in it, and then  could license the improved or derivative work under the GPL. A developer will be  also able to integrate CIRCA in existing GPL work called e.g. &ldquo;MY-GPL-PROGRAM&rdquo;  and continue to license this improved work under the GPL licence that he had  chosen originally.</p>
<p align="right">[<a href="#what-is-the-eupl" title="What is the EUPL?">top</a>]</p>
<a name="section-4"></a>
<h2>The role of the IDABC programme</h2>
<p>The IDABC programme has constantly supported the objective of widely  distributing its own software, such as CIRCA or IPM.</p>
<p>Distribution of software under the EUPL makes possible the growth of a  stronger&nbsp; developers and users community. It also ensures ithe continued  availability of and support for these programs after the expiration of the IDABC  programme.</p>
<p>To this end, the European Commission has investigated various alternatives,  submitted the EUPL to public consultation and made appropriate modifications.  The EUPL is one of the instruments to encourage the European Public sector to  develop collaborative initiatives e.g.&nbsp; in the framework of the future Open  Source Repository.</p>
<p align="right">[<a href="#what-is-the-eupl" title="What is the EUPL?">top</a>]</p>
<a name="section-5"></a>
<h2>OSI certified</h2>
<p>The EUPL v 1.1 is OSI certified as from March 2009.[<a href="#what-is-the-eupl" title="What is the EUPL?">top</a>]</p>
<a name="section-6"></a></div>
<p>&nbsp;</p>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Impact of the EUPL ';
	$path = 'software/page/impact-eupl';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<p>&nbsp;</p>
<div id="parent-fieldname-text">
<p><span style="FONT-SIZE: 9pt">The EUPL is the licence of choice for  distributing software from the European institutions or agencies and from  several Member States. The EUPL has made such distribution possible on a much  wider scale. The preference for the EUPL is not exclusive of other licences  providing the same rights (the use of another licence may even be compulsory  according to the copyright law, in case the distributed work is a derivative of  a previous work distributed under another licence that is copyleft. This mostly  happens when developing from GPL covered components).</span></p>
<p><span style="FONT-SIZE: 9pt">The EUPL is part of the <a href="./european-interoperability-framework">European  Interoperability Framework</a> (EIF v2 published in December 2010) as the legal  framework implemented by the Commission in order to facilitate the sharing of  software components. This is in line with the 2009 Malm&ouml; EU ministerial  declaration: &ldquo;the Open Source model could be promoted for use in eGovernment  projects&rdquo;. </span></p>
<p><span style="FONT-SIZE: 9pt">About 30% of OSOR hosted projects are  distributed under the EUPL (January 2011).</span></p>
<p><span style="FONT-SIZE: 9pt">The EUPL is used outside OSOR (in other forges  and for other projects).</span></p>
<p><span style="FONT-SIZE: 9pt">Within two years of its v1.1 publication and its  certification by the Open Source Initiative (OSI), the EUPL is already widely  used in Member States:</span></p>
<ul>
    <li><span style="FONT-SIZE: 9pt">The Estonian National Interoperability  Framework (2009) requires that software developments commissioned by the public  sector should be freely used on the basis of the EUPL licence.</span></li>
    <li><span style="FONT-SIZE: 9pt">The Spanish Royal Decree 4/2010 implementing  the national interoperability framework states: &ldquo;the EUPL will be procured,  without prejudice of other licences that can guarantee the same  rights&rdquo;.</span></li>
    <li><span style="FONT-SIZE: 9pt">The Malta Government policy (2010) states:  &ldquo;Government shall seek to facilitate distribution of OSS Government solutions  under the EUPL.&rdquo;</span></li>
    <li><span style="FONT-SIZE: 9pt">The Netherlands (NOiV) licence wizard  recommends the EUPL for software owned by the government.</span></li>
    <li><span style="FONT-SIZE: 9pt">The EUPL is widely used by Italian institutions  (i.e. Istat) and regions, by administrations in France, Germany, Belgium,  etc.</span></li>
</ul>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><span style="FONT-SIZE: 9pt">The OSOR team welcomes new information and  questions related to the use of the EUPL, which can be submitted <a href="../../contact">HERE</a>.</span></p>
</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'How to use the EUPL ';
	$path = 'software/page/how-use-eupl';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<p>&nbsp;</p>
<p class="documentDescription"><span id="parent-fieldname-description">Frequently  asked questions on the European Union Public License </span></p>
<dl class="portlet toc" id="document-toc">
    <dt class="portletHeader">Contents</dt>
    <dd class="portletItem">
    <ol>
        <li><a href="#section-0">What is the  EUPL?</a></li>
        <li><a href="#section-1">How to use  EUPL?</a></li>
        <li><a href="#section-2">Is the  software licensed under the EUPL &ldquo;Open Source&rdquo;?</a></li>
        <li><a href="#section-3">Where can I  get the EUPL text in my language?</a></li>
        <li><a href="#section-4">What are the  benefits of publishing software under the EUPL?</a></li>
        <li><a href="#section-5">Are there  specific development requirements for the EUPL?</a></li>
        <li><a href="#section-6">How can I  collaborate to a EUPL project?</a></li>
        <li><a href="#section-7">Can we  translate a EUPL licensed application?</a></li>
        <li><a href="#section-8">What are the risks  of publishing software under the EUPL?</a>
        <ol>
            <li><a href="#section-9">Copyright  litigations</a></li>
            <li><a href="#section-10">Patent  claims</a></li>
            <li><a href="#section-11">Warranty  and Liability claims</a></li>
            <li><a href="#section-12">Security  risks</a></li>
        </ol>
        </li>
        <li><a href="#section-13">Why did the  the European Commission create the EUPL?</a></li>
        <li><a href="#section-14">What makes  the EUPL unique?</a></li>
        <li><a href="#section-15">Were other  licences screened?</a></li>
        <li><a href="#section-16">What about  new versions of the EUPL?</a></li>
        <li><a href="#section-17">What about  compatibility issues?</a></li>
        <li><a href="#section-18">What are  jurisdiction and applicable law?</a></li>
        <li><a href="#section-19">Does EUPL  deprive me from intellectual property?</a></li>
        <li><a href="#section-20">Is EUPL  software &ldquo;for free&rdquo;?</a></li>
        <li><a href="#section-21">Are they  limitations to the use of the software?</a></li>
        <li><a href="#section-22">Can I  provide government services on Internet, based on EUPL licensed software?</a></li>
        <li><a href="#section-23">Can I make  my own software on EUPL software?</a></li>
        <li><a href="#section-24">Can I merge  other software with EUPL software?</a></li>
    </ol>
    </dd>
</dl>
<div id="parent-fieldname-text"><a name="section-0"></a>
<h2><a name="what-is-the-eupl"></a>What is the EUPL?</h2>
<p>The EUPL is a licence, meaning a <strong>contract</strong> between a  <strong>Licensor</strong> (the author of the software) and a  <strong>Licensee</strong> (the user of the software, who can then use it  according to the licence terms). Such licence is compulsory to authorise the  widest possible use of the software: communication, copy, change or  distribution, in full respect of the applicable law. The EUPL licence is &ldquo;Open  Source&rdquo; ensuring freedoms to use, analyse, adapt and redistribute the  software.</p>
<a name="section-1"></a>
<h2>How to use EUPL?</h2>
<p>For detailed advice on</p>
<ul>
    <li>using software licensed under the EUPL</li>
    <li>distributing your own software under the EUPL</li>
    <li>please read the <a href="./licence-eupl" class="external-link">European Union Public Licence (EUPL v.1.1)</a><strong> </strong>which is available in 22 European languages (external  website, guidelines are listed below the licences)</li>
</ul>
<p>&nbsp;</p>
<a name="section-2"></a>
<h2><a name="faq3"></a>Is the software licensed under the EUPL &ldquo;Open Source&rdquo;?</h2>
<p>Yes. EUPL licensing makes software Open Source (or more generally &ldquo;Free /  Libre / Open Source Software &ndash; FLOSS) because the EUPL ensures the following  rights to the licensee:</p>
<ul>
    <li>Obtain the source code of the software from a free access repository</li>
    <li>Use the software in any circumstance and for all usage</li>
    <li>Reproduce (copy, duplicate) the software</li>
    <li>Modify the original software, and/or make derivative works out of it</li>
    <li>Communicate the software to the public (i.e. using it through a public  network or distributing services based on the software via Internet)</li>
    <li>Distribute the software or copies thereof to other users (inside or outside  the licensee\'s organisation)</li>
    <li>Lend and rent the software or copies thereof</li>
    <li>Sub-licence rights in the software or copies thereof.
    <p align="right">[<a href="#section-0" class="external-link">top</a>]</p>
    </li>
</ul>
<a name="section-3"></a>
<h2><a name="faq4"></a>Where can I get the EUPL text in my language?</h2>
<p>The EUPL is approved by the European Commission in 22 linguistic versions  (all current EU languages, except the Irish). All linguistic versions have  identical value. Therefore the EUPL may produce legal effects in any approved  linguistic version.</p>
<p>To check all the linguistic versions of the EUPL please visit <a href="./licence-eupl" class="external-link">European Union Public Licence (EUPL v.1.1)</a>.</p>
<p align="right">[<a href="#section-0" class="external-link">top</a>]</p>
<a name="section-4"></a>
<h2><a name="faq5"></a>What are the benefits of publishing software under the  EUPL?</h2>
<p>As the author of the software, you (or your organisation / administration)  will keep full ownership of the software with a guarantee that your copyright is  publicly known and that your software will never been appropriated by a third  party: all subsequent users will have to respect your copyright and if they  distribute some improvements, you will benefit from it for free.</p>
<p>If you develop appropriate communication, organisation and leadership, your  work will be more widely known and it will be both rewarding and motivating for  you or for your team to be recognised as one of the domain experts in the field  (due to the visibility of your work, you may expect to be invited in specialised  workshops or to communicate your experience to other administrations sharing  similar needs). This will both motivate your team and provide you interesting  feedback, in return, or even support from volunteer contributors forming a kind  or &ldquo;community&rdquo; with you and around you.</p>
<p>If your software is recognised as best practice (because of the achieved  results, because of your presentations in workshops, in some case because of  national or international recognition or awards), it may gain in visibility,&nbsp;  awarded in relevant events, be quoted in taxonomies of software repositories and  eventually become a reference or a standard. This will maximise your return on  investment and the long term sustainability of your work, by maintaining an  active group of developers and by developing a competitive service ecosystem  around it.</p>
<p align="right">[<a href="#section-0" class="external-link">top</a>]</p>
<a name="section-5"></a>
<h2><a name="faq6"></a>Are there specific development requirements for the  EUPL?</h2>
<p>There are few specific requirements, in the sense that all software  development models (open or proprietary) share common issues such as security  and quality: you could as well decide to apply EUPL licensing to any existing  software application that you own, without regarding the way it has been  developed.</p>
<p>However, there are differences concerning the way the software is  distributed, bundled or packaged and the roles played by participants. If you  want to benefit from the support of an external community, it is always  recommended to apply a number of principles: It is recommended to start with  more than a simple idea: an efficient application kernel, easy to understand and  enrich with new functionalities is a preferred starting point. It is also  recommended to dwell on successful other Open Source standards of existing  projects: sustainability will be better if you build on such success than if you  reinvent everything alone or duplicate what others have done already.</p>
<p>Concerning the development of your specific part, take care about:</p>
<ol start="1">
    <li>A modular design (a solid kernel facilitating the addition of several  modules)</li>
    <li>The use of a version control system (which is normally provided on any  &ldquo;software forge&rdquo;)</li>
    <li>A clear documentation explaining the objectives, scope, use cases and  interactions according to standards</li>
    <li>An open mind team spirit, welcoming external participation, while keeping  control and setting a direction</li>
    <li>Good communication and interface with the &quot;developers community&quot;&nbsp;
    <p align="right">[<a href="#section-0" class="external-link">top</a>]</p>
    </li>
</ol>
<a name="section-6"></a>
<h2><a name="faq7"></a>How can I collaborate to a EUPL project?</h2>
<p>By collaborating to an Open Source project, you will offer some of your work  (time, writing work, lines of codes) to this project. By doing this, the EUPL  requires one specific warranty from you: you must be the copyright holder of the  provided work. This warranty is provided in Article 6 of the EUPL: Contributors  warrants that the copyright in the modifications they bring to the work are  owned by (or licensed for that purpose to) them.</p>
<p>Therefore, if you are an employee of a public or private organisation, it is  strongly recommended to go to your department head and obtain their green  light.</p>
<p>In a second step you should identify yourself and contact the relevant  project manager, present your experience and explain your interest in  collaborating (normally, you or your organisation should have a specific need  that the project could cover). In order to avoid work disorganisation and  duplication, it is important that your role in the project will be known, that  your potential contribution will be defined and communicated to all  stakeholders, knowing who you are and what you are doing or planning to do on  which project module.</p>
<p align="right">[<a href="#section-0" class="external-link">top</a>]</p>
<a name="section-7"></a>
<h2><a name="faq8"></a>Can we translate a EUPL licensed application?</h2>
<p>Facilitating the translation of EUPL licensed software (for example adapting  an eGovernment application from UK or France to Slovakia or Romania) is one of  the main potential utilities of the &ldquo;common&rdquo; EUPL licence. Adaptation is more  than simple translation on another language: it is called &ldquo;Localisation&rdquo; because  from one State to another, many parameters may vary:</p>
<ul>
    <li>the role of the stakeholders (depending on the organisation of the  government, of the judiciary etc... ) and the rights attached to these roles;</li>
    <li>the conditions of performing a specific operation (age, cost, VAT rate,  pre-requisites);</li>
    <li>the required time to perform an operation, etc.</li>
</ul>
<p>Therefore, before trying to translate any interesting application, it is  recommended to check that it was &ldquo;made for localisation&rdquo;. The software code  should not contain any hard-coded messages or parameters: just the logical  instructions and internal comments (usually in English) allowing readers to  understand. All displayable text and all parameters depending on location should  be stored in external files, with references to both countries and language  because several countries may share the same language (as Austria and Germany)  while in some other several languages are spoken (like in Belgium).</p>
<p align="right">[<a href="#section-0" class="external-link">top</a>]</p>
<a name="section-8"></a>
<h2><a name="faq9"></a>What are the risks of publishing software under the  EUPL?</h2>
<p>Risks are extremely low and may be classified in four subcategories:</p>
<blockquote><a name="section-9"></a>
<h3>Copyright litigations</h3>
<p>You (or your developers) have copied parts from other software without  appropriate and compatible licences or without reproducing copyright marks (this  is copyright violation). Although this may happen occasionally (however  generally for internal use and not for public re-distribution), the number of  litigations related to Open Source software copyright is extremely reduced (a  handful in ten years time) because cases are normally solved based on common  agreement. Most existing software copyright litigations involve companies with  conflicting commercial interests. In the case of a public administration  distributing its own software, risk can be mitigated by suspending distribution  during the copyright clarification, and as long as an agreement cannot be  found.</p>
<a name="section-10"></a>
<h3>Patent claims</h3>
<p>What has been said for copyright is also true for other intellectual property  rights (i.e. patents, in the exceptional case it could be applicable). Patents  on computer programs are not allowed in European law &ldquo;as such&rdquo;, but in practice,  patents have been granted that cover functionality in many common software  applications. Patents pose a specific risk to the development of software  because they protect the idea or the method and not simply the form, as  copyright does. It is therefore possible to infring some patent without copying  anything or without even knowing it. However, users are rarely subject to legal  action for patent infringement. Developers and software licensors must almost  always be notified first, prior to legal action seeking damages, thus giving  them an opportunity to replace or remove the functionality that is possibly  patented. The risk is therefore related to higher costs for replacing this  functionality, rather than the direct costs of being subjected to patent  lawsuits. In the practice, risks appear to be higher for proprietary software,  where commercial interests are higher, than for Open Source distribution. Known  software patents, such as MP3 audio or the LZW data compression have halted  software development specific areas, but no Free / Open Source software has yet  been subject to legal action for patent infringement.</p>
<p>In conclusion, when public administrations are using or distributing their  own specific software under the EUPL, the risk from legal action related to  patent infringement, while not zero, is very low.</p>
<a name="section-11"></a>
<h3>Warranty and Liability claims</h3>
<p>Liability for such damages are generally excluded by the EUPL licence, to the  extent permissible by applicable law. Exceptions, as spelled out in Article 8 of  the licence, could be your wilful misconduct (for example by distributing a  computer virus) or direct damages to natural persons, which are not likely to  occur regarding public sector software (risks look theoretical, and it seems  that such case has never been met).</p>
<a name="section-12"></a>
<h3>Security risks</h3>
<p>Security issues are to be considered with more attention. If your software is  well written, the publication of the source code should not facilitate security  breaches (intrusion by hackers etc.) as the code should not contain passwords,  nor sensitive or personal data as names or biometrics, or information on  possible back door etc. At the contrary, the Open Source publication of the code  should by the time reinforce software security by allowing a wider community to  screen it for possible bugs.</p>
<p>However, if a software is effectively used for critical applications and if  the published source code contains serious security flaws, disclosing the code  will generate real risks of hacking, at least in a first stage, before bug  corrections. Therefore, depending on the sensitive character of the application  and the nature of accessed data, a risk assessment is recommended prior to Open  Source distribution.</p>
<p align="right">[<a href="#section-0" class="external-link">top</a>]</p>
</blockquote><a name="section-13"></a>
<h2><a name="faq10"></a>Why did the the European Commission create the EUPL?</h2>
<p>EUPL was created by the European Commission under the IDABC programme because  it responded to a need: the Commission had the willingness to distribute the  software produced under the IDABC programme (with applications such as CIRCA, or  IPM). A decision was taken to apply Open Source licensing principles while  submitting possible redistribution to non-appropriation principles: the software  produced by the European Commission had to stay open and non-proprietary.</p>
<p>None of the existing Open Source licences (more than 100 models exist) was  satisfactory regarding a series of criteria:</p>
<ul>
    <li>the specificity of Community and Member State\'s law regarding copyright  principles</li>
    <li>the specificity of Community and Member State\'s law regarding warranty and  liability issues</li>
    <li>the specificity of Community and Member State\'s law regarding applicable law  and jurisdiction</li>
    <li>the requirement to obtain a text legally valid in all the official languages  of the European Union.
    <p align="right">[<a href="#section-0" class="external-link">top</a>]</p>
    </li>
</ul>
<a name="section-14"></a>
<h2><a name="faq11"></a>What makes the EUPL unique?</h2>
<p>The EUPL is unique for several reasons:</p>
<ol start="1">
    <li>For the first time, a public body&nbsp; of the size of the European Commission  has officially developed and approved a Free/Open Source Licence for the release  of its software, and authorises the use of the Licence by any other stakeholder.</li>
    <li>The EUPL has identical value in 22 linguistic versions (all EU languages,  except&nbsp;the Irish). No similar example exists in the world.</li>
    <li>The EUPL has considered the specificity and diversity of Member States Law  and the Community Law (copyright terminology, information, warranty, liability,  applicable law and jurisdiction).</li>
    <li>The EUPL ensures downstream compatibility issues with the most relevant  other licences (including the most intensively used, the General Public licence  or GPL). Its unique compatibility provisions create a new category of F/OSS  licence: &quot;Copyleft compatible&quot; (other are: &quot;Strong copyleft&quot;, &quot;Weak copyleft&quot;  and &quot;Without copyleft&quot;)&nbsp;&nbsp;
    <p align="right">[<a href="#section-0" class="external-link">top</a>]</p>
    </li>
</ol>
<a name="section-15"></a>
<h2><a name="faq12"></a>Were other licences screened?</h2>
<p>Yes, as the EUPL elaboration that has taken more than two years started with  the evaluation of several existing licences by a team of lawyers and software  practitioners.he result of such investigation was a first report of December  2004 <a href="http://ec.europa.eu/idabc/servlets/Doc?id=24394">&ldquo;Open Source  Licensing of software developed by the European Commission&ldquo;</a> published on the  IDABC web site.</p>
<p align="right">[<a href="#section-0" class="external-link">top</a>]</p>
<a name="section-16"></a>
<h2><a name="faq13"></a>What about new versions of the EUPL?</h2>
<p>According to Article 13 of the EUPL (which was modified in the EUPL v.1.1),  the European Commission may publish new linguistic versions and/or new versions  of the EUPL, so far this is &ldquo;required and reasonable&rdquo;, and &quot;without reducing the  scope of the rights granted by the Licence&quot;. This means that:</p>
<ul>
    <li>the European Commission may update the licence to address new legal or  technological issues that would otherwise keep the licence from functioning as  intended.</li>
    <li>Any&nbsp;new version will not change the fundamental characteristics of the  licence, such as the freedoms it grants you, the liability exemption, or its  reciprocal (or &ldquo;copyleft&rdquo;) character, meaning that the exclusive appropriation  of the licensed work will not be authorised.</li>
</ul>
<p>The key word in Article 13 is <strong>reasonable</strong>. The European  Commission (EC) can indeed update the license, e.g. to cope with new or  previously unknown legal problems that would otherwise keep the license from  functioning as intended. However, any such changes must be reasonable, meaning  that <strong>they cannot tamper with basic characteristics</strong> of the  license, such as the freedoms it grants you, the liability exemption, or its  reciprocal character&rdquo;.</p>
<p>Each new version of the Licence will be published with a unique version  number.</p>
<p>It is important to note that new versions are applicable to the software  already licensed under the EUPL v.1.0, or to software that is licensed without  an explicit version number, or with the explicit provision that later versions  become applicable. As from the publication of the EUPL v.1.1 in January 2009,  new versions (if any, in the future)&nbsp;will not be applicable automatically if the  software was formally licensed &quot;under the EUPL v.1.1&quot;.&nbsp;For such software,&nbsp;the  licence upgrade will be depending on the agreement of the original author (who  keeps control on licensing modifications).</p>
<p align="right">[<a href="#section-0" class="external-link">top</a>]</p>
<a name="section-17"></a>
<h2><a name="faq14"></a>What about compatibility issues?</h2>
<p>Compatibility issues are resulting from the merging or integration of your  work with other software components, when the licence of these components  provides that modified works must be distributed under the same licence.  Normally, the EUPL also does this, to protect your software against  &ldquo;appropriation&rdquo;, however this may produce licence conflicts or  &ldquo;incompatibility&rdquo;. Therefore EUPL foresees for &quot;compatible licences&quot;, by  allowing the resulting software to be distributed under the compatible licence  instead of under the EUPL itself.</p>
<p>The compatible licences are currently defined by the EUPL as being the  following:</p>
<ul>
    <li>General Public licence (GPL) v. 2</li>
    <li>Open Software licence (OSL) v. 2.1, v. 3.0</li>
    <li>Common Public licence v. 1.0</li>
    <li>Eclipse Public licence v. 1.0</li>
    <li>Cecill v. 2.0</li>
</ul>
<p>This list will not be reduced (anyway, as soon a merged or combined work will  be validly licensed under a compatible licence, this may not be revoked), but  could be enlarged (e.g. to later versions of the above licences).</p>
<p align="right">[<a href="#section-0" class="external-link">top</a>]</p>
<a name="section-18"></a>
<h2><a name="faq15"></a>What are jurisdiction and applicable law?</h2>
<p>The EUPL refers to the jurisdiction of the European Court of Justice in the  case the European Commission is the licensor of the software. By referring to  this exception, the EUPL does not intent to create any discrimination (between  the European Commission and other stakeholders). It just reminds Article 238 of  the Treaty establishing the European Community.</p>
<p>According to Article 14 of the EUPL, any litigation resulting from the  interpretation of the licence will be subject to the exclusive jurisdiction of  the competent court where the licensor resides or conducts its primary business.  Without impacting the validity of other EUPL provisions, it cannot be totally  excluded that due to compulsory rules, the &ldquo;court of the residence of the  consumer&rdquo; would consider itself as competent.</p>
<p>According to Article 15 of the EUPL, the competent court, whatever it may  eventually be, will take its decision by applying the law of the European Union  country where the Licensor resides or has his registered office. It will be the  Belgian law if the licensor is the European Commission or - for reasons of legal  security - if the Licensor has no residence or registered office inside a  European Union country.</p>
<p>By this provision, the EUPL ensures that the competent court will have &ndash; in  any case &ndash; to appreciate the EUPL rights and obligations in consideration of the  law of a European Union country.</p>
<p align="right">[<a href="#section-0" class="external-link">top</a>]</p>
<a name="section-19"></a>
<h2><a name="faq16"></a>Does EUPL deprive me from intellectual property?</h2>
<p>Does the EUPL preserve your full ownership of your work? Could EUPL licensing  deprive you of potential opportunities (especially if you want to make some  money out of licensing or recover your investment)?</p>
<p>By sharing your rights, you will not be deprived from your copyright or  intellectual property. You will keep full ownership of your work, especially if  you are the original author.</p>
<p>You may as well decide to undertake new developments, to distribute it or  not, and if you redistribute it to re-licence your software under another  licensing agreement, or even under a proprietary licence.</p>
<p>You may even manage two simultaneous distributions: an Open Source one (for  example under the EUPL) and a proprietary one (that may include additional  functionalities and be proposed for commercial fee). The name for this is &ldquo;Dual  licensing&rdquo;.</p>
<p>It is a matter of fact that the existence of an Open Source licensed version  will limit the possibility of merchantability of alternative licences: indeed,  if a free Open Source version exists, why would users accept to pay high  licensing costs for a &ldquo;commercial-off-the-shelf&rdquo; solution? Therefore, the  additional fees requested from users in the framework of an alternative licence  are generally justified by a higher warranty and a better level of support  services.</p>
<p>A number of software companies operate according to this model (for example  SUN for Star Office/Open Office or MySQL , which presents two versions - open  and proprietary - of its database).</p>
<p>In the case of dual licensing, your sole potential issue will be to reduce  forking (the co-existence and competition among different software versions) by  integrating third party FLOSS contributions into the version that is licensed  differently. If the Open Source test bed demonstrates the efficiency and  profitability of a new specific module, you may find a convenient agreement with  the author (you will normally have good contacts with him as member of your  developers community) or decide to rewrite the most useful modules by yourself  (copyright protects the form, not the ideas).</p>
<p align="right">[<a href="#section-0" class="external-link">top</a>]</p>
<a name="section-20"></a>
<h2><a name="faq17"></a>Is EUPL software &ldquo;for free&rdquo;?</h2>
<p>As often reminded &ldquo;free software is not for free&rdquo;, meaning that it has  certainly a cost, at least for developing, implementing, training the users and  maintaining it. In the specific case of the EUPL, the rights granted by the  licence are <strong>always</strong> royalty-free (as said in Article 2).</p>
<p>This does not restrict the merchantability of additional services related to  the software, for example providing consultancy or support for implementation or  maintenance.</p>
<p>Similarly the various stakeholders undertaking a common project may decide to  share investments according to a separate &ldquo;consortium&rdquo; agreement, and to ask for  a contribution in the case new participants would like to join (because they  will then benefit from the support from other members or from the contractors of  the consortium).</p>
<p align="right">[<a href="#section-0" class="external-link">top</a>]</p>
<a name="section-21"></a>
<h2><a name="faq18"></a>Are they limitations to the use of the software?</h2>
<p>They are normally not: you can use the software for any purpose (for example  commercial, private or non-profit), in any place or country (inside or outside  the European Union), on any type of computer (from the mobile PC to the main  frame) and for any number of users. You may also use it to provide your services  on a network like the Internet or on your Intranet.</p>
<p>The only restrictions are related to modification and re-distribution of the  software:</p>
<ul>
    <li>if you modify it, keep intact all existing copyright mentions and identify  your own modifications by prominent marks (who did it, when, for what purpose)  with mention of your own copyright</li>
    <li>if you redistribute it, ensure that it is done under the EUPL licence, or  under a compatible licence from the list attached to the EUPL (only if this is  compulsory after merging or integrating the software with a component that is  licensed under the compatible licence).
    <p align="right">[<a href="#section-0" class="external-link">top</a>]</p>
    </li>
</ul>
<a name="section-22"></a>
<h2><a name="faq19"></a>Can I provide government services on Internet, based on  EUPL licensed software?</h2>
<p>Yes you can. Indeed, Article 2 of the EUPL provides you the right to  &ldquo;communicate to the public, including the right to make available or display the  Work or copies thereof to the public and perform publicly, as the case may be,  the Work&rdquo;.</p>
<p>Therefore, the deployment of the EUPL licensed software via Internet or via  any similar public network is considered as a case of &laquo;distribution&raquo; according  to the licence. This remains true even if the end-users perceive (for example  through their Internet browser) only a selection of functionalities and not the  whole software itself.</p>
<p>As soon such communication of EUPL software is done, the licence covers it  (because &ndash; according to Article 10, the licence is accepted by exercising any  rights granted by Article 2). However, this means also that, if you modify or  improve some EUPL licensed software and use it to provide your services on line  to the general public, you have to make your modified source code available on a  repository, in order to allow the original author as well as other members of  the &laquo;developers community &raquo; to benefit from your contributions, as the case  could be.</p>
<p align="right">[<a href="#section-0" class="external-link">top</a>]</p>
<a name="section-23"></a>
<h2><a name="faq20"></a>Can I make my own software on EUPL software?</h2>
<p>Yes, provide you respect (leave as they are) the existing copyright mentions  related to the part of EUPL licensed code that is used in your own software.</p>
<p>If you decide to redistribute or to communicate to the public the resulting  work, you will have to do so under the EUPL provisions (including the  publication of your source code on a repository). Using the modified software to  provide services via Internet is considered as a &laquo; communication to the public  &raquo;.</p>
<p align="right">[<a href="#section-0" class="external-link">top</a>]</p>
<a name="section-24"></a>
<h2><a name="faq21"></a>Can I merge other software with EUPL software?</h2>
<p>Yes, you can merge EUPL software or any part or component of it with other  software, provide this other software is yours (developed by you or for you) or  was licensed to you under licensing terms allowing you to do so (which is the  case with all Open Source software).</p>
<p>Please note that the question of how far software can be considered as  &ldquo;merged&rdquo; is a matter of case to case appreciation. Merging criteria (or criteria  to consider that a new software is a derivative) are not precisely defined in  the EUPL, because it was not reasonable, due to the diversity of possible  situations.</p>
<p>In most cases, simply aggregating, combining or linking software does not  create a derivative.</p>
<p>Whenever possible, it is recommended that the different components exchange  parameters or data without merging their source code into a single file. This  would preserve modularity, facilitate future improvements and prevent licence  compatibility issues in the case of re-distribution as the different components  can then be used and possibly be re-distributed under their respective different  licences.</p>
<p>If it is not possible to avoid the merging of the different codes within a  single file, you will not encounter problems if you are using the merged  software for your own needs (no distribution outside your organisation).  However, if your intention is to distribute the merged software to third parties  under the EUPL licence or to perform it publicly (for example by providing a  service with it on the Internet), the pre-requisite is to check if the licensing  conditions of the merged software are compatible.</p>
<p>To help you, JOINUP publishes a <a href="./eupl-compatible-open-source-licences" title="EUPL-compatible licenses" class="internal-link">list or matrix of licences that  are compatible with the EUPL</a>.</p>
<p>There is no problem if you have the copyright of the other software: the  merged software is a derivative work that can be re-distributed under the  EUPL.</p>
<p>There is no problem if the other software licensing conditions are permissive  regarding the re-distribution under the EUPL (this would be the case if the  merged component was licensed to you under a BSD or a MIT licence, for  example).</p>
<p>At the contrary, if these licensing conditions are restrictive or &ldquo;copyleft&rdquo;  (allowing no re-distribution under any other licence than the original one), you  should check if this licence is included into the EUPL compatibility list. If  this is the case (for example if the other software was licensed to you under  GPL v. 2), there are no problems either: you are authorised to re-distribute the  merged software under the compatible licence.</p>
<p>In other cases no re-distribution will be possible without a specific  authorisation from all relevant authors.&nbsp;</p>
<p>Some authors distributing components under a &quot;copyleft&quot; licence have  implemented &quot;FOSS exception lists&quot; to authorise the distribution of larger  (combined) derivative works under another FOSS licence. For example Oracle has  included the EUPL in its FOSS exception list (for integrating MySQL components  that are distributed under the Gnu GPLv2).</p>
<p align="right">[<a href="#section-0" class="external-link">top</a>]</p>
</div>
<p>&nbsp;</p>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'EUPL Community';
	$path = 'software/page/eupl-community';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<h1 class="documentFirstHeading"><span id="parent-fieldname-title">EUPL, Open source  licensing, Legal questions </span></h1>
<div class="documentByLine" id="plone-document-byline"><span class="documentAuthor"><br />
</span></div>
<p class="documentDescription"><span id="parent-fieldname-description">The licence  is the legal instrument allowing you to use, check, modify and distribute  free/open source software (F/OSS or FLOSS). The European Union Public Licence  (EUPL) is certainly one of the prefered licences on OSOR, but it is not the only  one: you may use any other &quot;OSI approved&quot; licences (about 60 models, including  the GPL, LGPL, BSD, Apache, Artistic etc.). The aim of this community is to  address your questions related to F/OSS licensing and to clarify legal issues,  based on questions received by the OSOR team. </span></p>
<p>Welcome to all of you!&nbsp; In order to contribute to this EUPL community, you  need&nbsp;to be a registered user of OSOR. This is very easy:&nbsp;if you are not yet  registered please do so by following the link <a href="../../user/register" class="external-link"><font color="#800080">here</font></a>.</p>
<p>Then&nbsp;subscribe to the EUPL&nbsp;community by clicking on the icon on the Portlet  &quot;My Community&quot;&nbsp;</p>
<h2>Background</h2>
<p>The Community\'s genesis<strong> </strong>can be traced&nbsp;to the public forum  organized by the European Commission after the disclosure of the draft EUPL  v.0.1 in June 2005. &ldquo;<em>What are your views on the Licence? Have you comments  on the proposed text or on the principle of a licence that is written with  European legislation in mind?</em>&rdquo; Bernhard Schnittger (IDABC team) asked. This  forum generated controversial opinions: strongly against the initiative, or  strongly in favour of it. It has a substantial impact on the draft: 10 of the 15  articles were modified and compatibility with the GPL was implemented, producing  the EUPL version 1.0 adopted by the European Commission in January 2007 in three  linguistic versions (EN/FR/DE).</p>
<p>&nbsp;</p>
<p>The next important milestone was the publication of the EUPL in 22 linguistic  versions of equal value. All translation reviewers (two lawyers per Member  State) and guest experts discussed the text in January 2008. This conference and  discussions with&nbsp;OSI produced the EUPL version 1.1, which is certified by OSI  since March 2009.&nbsp;</p>
<h2>Objective and focus</h2>
<p>The objective of the EUPL community is to maintain the focus on F/OSS  licensing, especially by public sector authorities. It is to exchange opinions  and experiences, to clarify issues, to explore new ideas (the previous EUPL  elaboration process has demonstrated that your opinions are important and will  be taken in consideration).</p>
<p>The forum is open to all (lawyers, developers, project leaders, but not  exclusively). Provide the question is relevant to our focus and fairly  presented, there will be no taboo: Has the EUPL its place in the &ldquo;already too  many&rdquo; circle of F/OSS licences? Is maintaining 22 equivalent linguistic versions  sustainable? Should the EUPL compatibility be enlarged to licence X or Y?</p>
<p>In the blog,&nbsp;community members&nbsp;will try to provide&nbsp;each other&nbsp;information  related to the EUPL and to F/OSS licensing, that may come from various  sources.</p>
<p>Last, let\'s remember that the objective of the EUPL is not to compete or to  replace any existing licence: it is to&nbsp;encourage a new wave of F/OSS licensors,  especially among public administrations in Europe.&nbsp;&nbsp;</p>
<h2>EUPL Guidelines</h2>
<p>The EUPL guidelines have  been updated for version 1.1&nbsp;</p>
<h2>Practical Guide to using Free Software in the Public Sector&nbsp;</h2>
<p><font color="#000000"><font face="Verdana, sans-serif"><font size="2" style="FONT-SIZE: 10pt">Thierry Aim&eacute;, member of the team of the French  Ministry for the Budget, Public Accounts and the Civil Service, has authored a  &ldquo;Practical Guide to using Free Software in the Public  Sector&rdquo;.</font></font></font><font color="#000000"><font face="Verdana, sans-serif"><font size="2" style="FONT-SIZE: 10pt"><br />
</font></font></font></p>
<p>&nbsp;</p>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'EUPL compatible open source licences';
	$path = 'software/page/eupl-compatible-open-source-licences';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<h1 class="documentFirstHeading"><span id="parent-fieldname-title">             EUPL-compatible licenses         </span></h1>
<p>&nbsp;</p>
<p class="documentDescription"><span id="parent-fieldname-description">             This is a global compatibility Matrix between all OSI-approved licenses and the EUPL. This Matrix (July 2011)  is open to comments and improvements          </span></p>
<dl style="" class="portlet toc" id="document-toc">
    <dt class="portletHeader">Contents</dt>
    <dd class="portletItem">
    <ol>
        <li><a href="#section-0">Disclaimer</a></li>
        <li><a href="#section-1">Definitions</a></li>
        <li><a href="#section-2">Matrix (OSI-approved licenses in alphabetical order)</a></li>
        <li><a href="#section-3">Discussion on &ldquo;Linking&rdquo;</a></li>
        <li><a href="#section-4">The EUPL &quot;Downstream&quot; compatibility list</a></li>
        <li><a href="#section-5">Notes</a></li>
    </ol>
    </dd>
</dl>
<div id="parent-fieldname-text"><a name="section-0"></a>
<h2>Disclaimer</h2>
<p><br />
The purpose of this Matrix is to clarify compatibility with the  EUPL, seen as the legal possibility to distribute (under the  OSI-approved EUPL) an application that incorporates, or links with,  components covered by another Free/Open Source Software (F/OSS) license.  Due to numerous possibilities, the Matrix does not cover all real  situations (which are not always &ldquo;clear-cut&rdquo; and where more than two  licenses could be relevant). Since European case law is generally  missing, the matrix suggests reasonable guidance without providing a  guarantee that this suggestion will always be followed by a judge, as  the case may be.</p>
<p>&nbsp;</p>
<p>Most F/OSS incompatibilities result from copyleft conflicts&nbsp;(when  both licenses impose the reuse of the&nbsp;same license in case of  redistribution). The aim and utility of copyleft is to protect the free  software world against appropriation. In our vision, it should not make  distribution difficult or legally impossible when the work is covered by  different F/OSS copyleft licenses. In such case, because of a weak  interest, the risk of litigation is weak also, while not zero.  Therefore, the Matrix is rather &ldquo;liberal&rdquo;, based on factual license  provisions and on comments provided by license stewards. We consider  also that permission to distribute the executable binaries under a  single license solves compatibility issues (as soon distribution is  legally possible, there is no need for a single license covering the  source code). The Matrix is not influenced by ideology (telling the good  and the ugly, urging people to use or to avoid specific licenses). On  OSOR.eu user request, the OSOR team supports legal interoperability and  the prevention of litigation by kindly requesting clarification or  exceptions from the license stewards or from relevant licensors. We  welcome comments (especially from license stewards) and relevant case  law at the <span style="font-size: 11pt;"><a href="../../contact"><font face="Times New Roman" color="#0000ff">contact page</font></a>.</span></p>
<a name="section-1"></a>
<h2>Definitions</h2>
<ul>
    <li>Compatibility has two ways:</li>
</ul>
<blockquote>
<ul>
    <li><strong>Upstream</strong>, it allows you to merge a work covered  by another F/OSS license into a larger work that you may distribute  under the EUPL. This is the main scope of the Matrix below.</li>
    <li><strong>Downstream</strong>,  it allows you to merge the work received under the EUPL into a larger  work that you may distribute under a &ldquo;compatible&rdquo; license. This is the  scope of the EUPL own compatibility list (EUPL #5 compatibility clause  and Appendix that includes GPLv2, OSL, Eclipse, CPL and CeCILL) See  discussion on this list in <a href="#section-4" class="internal-link" title="EUPL-compatible licenses">section 5</a> of this Matrix.</li>
</ul>
</blockquote>
<ul>
    <li><strong>F/OSS components</strong> are those covered by an OSI-Approved license (other licenses are not considered in the Matrix).</li>
</ul>
<ul>
    <li>An <strong>Application </strong>is a &ldquo;<strong>larger work</strong>&rdquo;  combining (by incorporation or by linking) F/OSS covered code or  portions thereof with code governed by the EUPL. Outside, making legally  possible a distribution of the larger application under the EUPL, there  is no need and no interest for changing the license of any F/OSS  component &ldquo;taken alone&rdquo; (even after correcting, modifying, translating  it, etc.).</li>
</ul>
<ul>
    <li><strong>Incorporation </strong>is merging all or part of the  received component (in a copy-paste sense, when some original code is  copied) with other software in the application, which becomes a  derivative of the received components according to the applicable  copyright law.</li>
</ul>
<ul>
    <li><strong>Linking </strong>makes two components working in a  single application without merging their source code. The question is:  does it produce a derivative? See <a href="#section-3" class="internal-link" title="EUPL-compatible licenses">discussion on linking</a> at the end of the Matrix.</li>
</ul>
<blockquote>
<ul>
    <li><strong>Static linking</strong> combines components through  compilation, copying them into the target application and producing a  merged object file that is a stand-alone executable.</li>
    <li><strong>Dynamic linking</strong> combines components at the time the application is loaded (load time) or during execution (run time).</li>
</ul>
</blockquote> <a name="section-2"></a>
<h2><br />
Matrix (OSI-approved licenses in alphabetical order)</h2>
<p>&nbsp;</p>
<table width="90%" class="plain">
    <tbody>
        <tr>
            <th>License of existing F/OSS Component</th>
            <th colspan="3">Distribution of the larger application under the EUPL</th>
            <th>Comment and references to F/OSS license provisions</th>
        </tr>
    </tbody>
    <tbody>
        <tr>
            <td>&nbsp;</td>
            <td align="center">&nbsp;Incorporation</td>
            <td align="center">Static link</td>
            <td align="center">Dynamic link</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/AFL-3.0" class="external-link">Academic Free License (AFL) v3.0</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>&nbsp;#1c: you can distribute copies and derivative under any license  that does not contradict the terms and conditions, including Licensor\'s  reserved rights and remedies, in this Academic Free License.<br />
            The OSI-approved EUPL is compliant with this requirement.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/APL-1.0" class="external-link">Adaptive Public License v1.0 </a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>&nbsp;As the license is &ldquo;adaptive&rdquo;, please read the terms carefully.  According to # 3.7 you can combine the covered code with other  components &ldquo;not governed by the APL license provided the APL  requirements are fulfilled for the covered portion of the larger work.&rdquo;<br />
            The OSI-approved EUPL is compliant with this requirement.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/AGPL-3.0" class="external-link">Affero General Public License v1.0</a></td>
            <td bgcolor="#ff0000" align="center">&nbsp;<strong>NO</strong></td>
            <td bgcolor="#ff0000" align="center">&nbsp;<strong>NO?</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>The Affero General Public License is based on the GPL version 2,  with one additional section covering Software as a Service (SaaS) on the  distribution through web services or computer networks (section 2d).<br />
            Regarding linking, see comments under the Gnu GPL and discussion at the end of this Matrix.<br />
            Although  legally not compatible (for copyleft reasons) the AGPL is very close to  the EUPL (which covers also SaaS). Therefore &ndash; at least in case of  linking &ndash; we recommend asking for an exception with the AGPL licensor.  See notes under the GNU Affero General Public License version 3 which  has succeeded to the AGPL.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/Apache-2.0" class="external-link">Apache license V1.1, V2</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>&nbsp;Nothing in the Apache V1.1 and 1.2 prohibits re-licensing of a  larger work under the EUPL. They are indeed specific Apache v1.1  requirements (prohibiting some uses of the Apache brand), but these  requirements are not &quot;restrictions added by the EUPL licensor&quot; (they are  inherited from the original Apache licensing). These requirements are  not impacting essential F/OSS freedoms. They are in line and compatible  with article 5 of the EUPL.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/APSL-2.0" class="external-link">Apple Public Source license APSL v2.0</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>&nbsp;#4 Larger Works: You may create a Larger Work by combining Covered  Code with other code not governed by the terms of this License and  distribute the Larger Work as a single product.&nbsp; In each such instance,  You must make sure the requirements of this License are fulfilled for  the Covered Code or any portion thereof.<br />
            The OSI-approved EUPL is compliant with this requirement.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/Artistic-2.0" class="external-link">Artistic license (Perl foundation)</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>&nbsp;In case of incorporation, verbatim copies (including bug fixes)  must reproduce original copyright notices and associated disclaimers  (#3).<br />
            You can distribute under the EUPL a modified version (i.e.  integrated/merged in a larger derivative work) provided that you  document how it differs from the Standard Version received. The EUPL is a  royalty-free license that permits recipients to receive the source code  and to freely copy, modify and redistribute the modified version  (requirement #4, ii). These conditions are inherited from the Artistic  license and are not &ldquo;restrictions added by the EUPL licensor&rdquo;: they are  compatible with the EUPL provisions.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/AAL" class="external-link">Attribution Assurance License (AAL)</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>This license is adapted from the original BSD license.<br />
            See comments under BSD.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/BSL-1.0" class="external-link">Boost Software License v1.0</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>&nbsp;Nothing in this license restricts redistribution under any other license (free, as the EUPL, or even non-free).</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/BSD-3-Clause" class="external-link">BSD license (all versions)</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>&nbsp;Nothing in the BSD license restricts redistribution under any other license (free, as the EUPL, or even non-free).<br />
            BSD  requests to retain copyright notices and restrict the use of the BSD  licensor name to promote derivative products. These inherited conditions  / restrictions are not &ldquo;added&rdquo; by the EUPL licensor and are in line  with the EUPL requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/CATOSL-1.1" class="external-link">Computer Associate Trusted Open Source License CATOSL v1.1</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>&nbsp;#3.4 (You) may create a Larger Work by combining the Program with  other software code not governed by the terms of this License, and  distribute the Larger Work as a single product. In such a case (...)  make sure that the requirements of this License are fulfilled for the  Program.<br />
            The OSI-approved EUPL is compliant with this requirement.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/CDDL-1.0" class="external-link">Common Development and Distribution License CDDL v1.0</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>&nbsp;#3.6 You may create a Larger Work by combining Covered Software  with other code not governed by the terms of this License and distribute  the Larger Work as a single product. In such a case, You must make sure  the requirements of this License are fulfilled for the Covered  Software.<br />
            The OSI-approved EUPL is compliant with this requirement.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/CPAL-1.0" class="external-link">Common Public Attribution License CPAL v1.0</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>&nbsp;#3.7 You may create a Larger Work by combining Covered Code with  other code not governed by the terms of this License and distribute the  Larger Work as a single product. In such a case, You must make sure the  requirements of this License are fulfilled for the Covered Code.<br />
            The OSI-approved EUPL is compliant with this requirement.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/CUA-OPL-1.0" class="external-link">CUA Office Public License CUA-OPL v1.0</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>&nbsp;#3.7 You may create a Larger Work by combining Covered Code with  other code not governed by the terms of this License and distribute the  Larger Work as a single product. In such a case, You must make sure the  requirements of this License are fulfilled for the Covered Code.<br />
            The OSI-approved EUPL is compliant with this requirement.</td>
        </tr>
        <tr>
            <td><a href="http://www.cecill.info/licences/Licence_CeCILL_V2-en.html" class="external-link">CeCILL v2.0</a></td>
            <td bgcolor="#ff0000" align="center">&nbsp;<strong>NO<br />
            <br />
            <br />
            <br />
            (but you may distribute the larger work under CeCILL)</strong></td>
            <td bgcolor="#ffc000" align="center">&nbsp;<strong>?</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>&nbsp;The CeCILL license is not OSI approved. We cover it here by  exception because it is included in the EUPL &ldquo;downstream&rdquo; compatibility  list (you can distribute under CeCILL a larger derivative work  integrating components covered by the EUPL and by CeCILL).<br />
            CeCILL v2.0 ignores reciprocity with the EUPL.<br />
            Distribution  under the EUPL would be possible only if the licensor has published a  &ldquo;FLOSS exception list&rdquo; for distributing the larger derivative work under  the EUPL.<br />
            There are no examples of such exceptions (probably because  no one requested it so far). As the EUPL has included CeCILL in its own  downstream compatibility list, there would be a good chance to obtain  such exception if requested, but no case was reported.<br />
            CeCILL ignores  linking. As CeCILL stewards are FSF followers, we could assume that  they consider static linking in a similar way as for the GPL: covered by  copyleft (without exceptions).<br />
            The only CeCILL compatibility permission favors the GPL and says &ldquo;include a code&rdquo; or &ldquo;include the software&rdquo; (#5.3.4).<br />
            Regarding static linking, this is depending on how far you create a derivative (see discussion at the end of this Matrix).</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/EPL-1.0" class="external-link">Common Public License (CPL)</a></td>
            <td bgcolor="#ffc000" align="center">&nbsp;<strong>OK (object)</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>(See the Eclipse Public License, which has replaced the CPL).</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/EPL-1.0" class="external-link">Eclipse Public License (EPL) v1.0</a></td>
            <td bgcolor="#ffc000" align="center">&nbsp;<strong>OK (object)<br />
            <br />
            <br />
            You may also distribute the larger work under the EPL</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>#3. Any person or entity (called &ldquo;contributor&rdquo;) may distribute the  Program in object code form under the EUPL (&ldquo;its own license  agreement&rdquo;), because the EUPL complies with the requirements of #3b  (disclaimer etc.).<br />
            While the executable version of the application  including EPL covered code will be distributed as a whole under the  EUPL, it must be documented that the source code of components covered  by the EPL will stay under this license.<br />
            <br />
            The EPL is also included  in the EUPL downstream compatibility list (EUPL appendix). Therefore  the EUPL is compatible with the EPL: as far as needed, you may  distribute under the EPL a larger derivative work integrating components  covered by the EUPL and the EPL.<br />
            &nbsp;</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/ECL-2.0" class="external-link">Educational Community License ECL v2.0</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>Similar to the Apache 1.2.<br />
            Nothing in the license prohibits  re-licensing of a larger work under the EUPL. #4: you may provide ...  different license terms ... for any such Derivative Works as a whole,  provided Your use, reproduction, and distribution of the Work otherwise  complies with the conditions stated in this License.<br />
            The OSI-approved EUPL is compliant with this requirement.<br />
            Concerning  linking #1 clarifies that Derivative Works shall not include works that  remain separable from, or merely link (or bind by name) to the  interfaces of (the covered software).</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/EFL-2.0" class="external-link">Eiffel Forum license v2</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>This is a very permissive license. Similarities with BSD.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/Entessa" class="external-link">Entessa Public License v1.0</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>This is a very permissive license. Similarities with BSD.<br />
            License imposes copyright acknowledgements that are compatible with the EUPL.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/EUDatagrid" class="external-link">EU Data Grid license</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>Nothing in this license restricts redistribution of larger works  under the EUPL. Copyright statement and the permission that  &ldquo;Installation, use, reproduction, display, modification and  redistribution of this software, with or without modification, in source  and binary forms, are permitted&rdquo; must be reproduced.<br />
            The OSI-approved EUPL is compliant with requirements.</td>
        </tr>
        <tr>
            <td><a href="./licence-eupl" class="external-link">European Union Public Licence <br />
            (EUPL v1.0 &amp;<br />
            v1.1)</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>Software that was licensed under EUPL v1.0 is automatically covered  by the EUPL v1.1 (this &ldquo;automatic update&rdquo; was removed from the EUPL v1.1  and is not applicable anymore if the Commission publishes further  versions of the EUPL).</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/Fair" class="external-link">Fair License</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>The license instrument must be retained with the works, so that any entity that uses the works is notified of this instrument.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/Frameworx-1.0" class="external-link">Frameworx Open License v1.0</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>#3a: The other license conditions cannot be less favorable...<br />
            #3c: They are specific copyright notices to respect.<br />
            The EUPL is compliant with these requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/AGPL-3.0" class="external-link">Gnu Affero Public License v3 (AGPLv3)</a></td>
            <td bgcolor="#ff0000" align="center">&nbsp;<strong>NO</strong></td>
            <td bgcolor="#ff0000" align="center">&nbsp;<strong>NO?</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>See comments related to the GPLv3.<br />
            Requesting for an exception should be facilitated by the fact the EUPL covers &ldquo;software as a service&rdquo; (SaaS) like the AGPL.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/GPL-2.0" class="external-link">Gnu GPLv2.0</a></td>
            <td bgcolor="#ff0000" align="center">&nbsp;<strong>NO (exceptions exist)<br />
            <br />
            <br />
            <br />
            and you may distribute the larger work under the GPLv2</strong></td>
            <td bgcolor="#ff0000" align="center">&nbsp;<strong>NO?</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>Only if the licensor has published a &ldquo;FLOSS exception list&rdquo; for  distributing the larger derivative work under other listed FLOSS  licenses, and EUPL is included. <br />
            See for example the MySQL FOSS exception list[<a href="#notes" title="Notes">1</a>]&nbsp; .<br />
            Exception  will be applicable to all portions of the derivative work that are  &ldquo;independent&rdquo; (not specifically derived from the program obtained under  the GPLv2, which &ndash; taken alone - stays under its primary license).<br />
            <br />
            The  GPLv2 is also included in the EUPL downstream compatibility list (EUPL  Appendix) - therefore the EUPL is compatible with the GPLv2: you may  distribute under the GPLv2 a larger derivative work integrating  components covered by the EUPL and by the GPLv2.&nbsp;<br />
            <br />
            Linking: FSF  followers consider static linking as producing a derivative (this is not  confirmed by case law, see &ldquo;Linking discussion&rdquo;). We assume that  licensors using the GPL share this opinion, for extending the protection  of the free software world against appropriation. However, there is no  risk of appropriation when the larger work is licensed under the EUPL.  We recommend asking for exception.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/GPL-3.0" class="external-link">Gnu GPLv3.0</a></td>
            <td bgcolor="#ff0000" align="center">&nbsp;<strong>NO (exceptions exist)<br />
            <br />
            <br />
            <br />
            and it is legally possible to distribute the larger work under the GPLv3, via the CeCILL roundabout</strong></td>
            <td bgcolor="#ff0000" align="center">&nbsp;<strong>NO?</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>Only if the licensor has published a &ldquo;FLOSS exception list&rdquo; for  distributing the larger work under other listed FLOSS licenses, and EUPL  is included. <br />
            See for example the Sencha exception list [<a href="#notes" title="Notes">2</a>]  where all identifiable sections of the larger work, which are not  derived from the GPLv3 covered work, and which can reasonably be  considered independent and separate works in themselves, may be  distributed subject to the EUPL.<br />
            <br />
            The GPLv3 is NOT included in the  EUPL downstream compatibility list (Appendix of the EUPL). However, it  is &quot;legally possible&quot; (without prejudice of a need for it, or not!) to  distribute a larger work integrating components covered by the EUPL and  by the GPLv3. For this, you may use the &quot;CeCILL roundabout&quot;:<br />
            1) publish your own specific contribution under CeCILL, or find convenient code covered by CeCILL;<br />
            2) combine with the EUPL component and publish the larger work under CeCILL;<br />
            3) add the needed GPLv3 components and publish the larger work under the GPLv3.<br />
            &nbsp;<br />
            This  does not restrict EUPL licensors to provide a specific exception for  integrating their own software in a larger work covered by the GPLv3.<br />
            <br />
            Linking:  FSF followers consider static linking as producing a derivative (this  is not confirmed by case law, see &ldquo;Linking discussion&rdquo;). We assume that  licensors using the GPL share this opinion, for extending the protection  of the free software world against appropriation. However, there is no  risk of appropriation when the larger work is licensed under the EUPL.  We recommend asking for exception.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/LGPL-2.1" class="external-link">Gnu LGPL v2.1</a></td>
            <td bgcolor="#ffc000" align="center">&nbsp;<strong>OK (object)</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>According to the LGPL v2.1, #6, you may produce a work containing  portions of the Library, and distribute that work under terms of your  choice, provided that the terms permit modification of the work for the  customer\'s own use and reverse engineering for debugging such  modifications.<br />
            These conditions (including the availability of the source code and all FLOSS freedoms) are fully implemented by the EUPL.<br />
            While  the larger derivative work will be distributed under EUPL, the source  code of the used library &lsquo;taken alone&rdquo; (modified or not) stays covered  by the LGPL (this must be documented with prominent notices)</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/LGPL-3.0" class="external-link">Gnu LGPL v3.0</a></td>
            <td bgcolor="#ffc000" align="center">&nbsp;<strong>OK (object)</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>According to the LGPL v3, #3, You may convey under the EUPL (&ldquo;terms  of your choice&rdquo;) the object code (&ldquo;executable binaries&rdquo;) of an  application that incorporates material from a header file that is part  of the Library.<br />
            While the larger work (binaries) can be distributed  under EUPL, the source code of the used library &lsquo;taken alone&rdquo; (modified  or not) stays covered by the LGPL (this must be documented with  prominent notices).</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/IPL-1.0" class="external-link">IBM Public License v1.0</a></td>
            <td bgcolor="#ffc000" align="center">&nbsp;<strong>OK (object)</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>#3: (You) may choose to distribute the Program in object code form under the EUPL (=own license agreement).<br />
            The  OSI-approved EUPL is compliant with the IPL requirements (i.e. it makes  source code available and contains the requested disclaimers).<br />
            As a consequence, make it clear that the source code of the IPL covered component will stay covered by the IPL.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/IPA" class="external-link">IPA Font License (IPA)</a></td>
            <td bgcolor="#ff0000" align="center">&nbsp;<strong>NO</strong></td>
            <td bgcolor="#ffc000" align="center">&nbsp;<strong>?</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>This Japanese license is specific to &ldquo;Digital Font Programs&rdquo;  (containing, or used to render or display fonts). Derived programs (any  modification to covered code) must be licensed under IPA (#3.1.3).<br />
            Regarding static linking, this is depending on how far you create a derivative (see discussion at the end of this Matrix).</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/ISC" class="external-link">ISC License (ISC)</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>Nothing in the ISC license (similar to BSD) restricts redistribution  under any other license (free, as the EUPL, or even non-free).<br />
            ISC requests to retain copyright notices.<br />
            These inherited conditions / restrictions are not &ldquo;added&rdquo; by the EUPL licensor and are in line with the EUPL requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/LPPL-1.3c" class="external-link">LaTeX Project Public License (LPPL 1.3c)</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>The LaTeX accepts re-distribution under another license: &ldquo;if for any  part of your work you want or need to use *distribution* conditions  that differ significantly from those in this license, then do not refer  to this license... but, instead, distribute your work under a different  license.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/LPL-1.02" class="external-link">Lucent Public License v1.02</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>#3 you may&hellip;&ldquo;distribute the program under your own license agreement&rdquo;  providing it complies with F/OSS conditions and disclaimers.<br />
            The OSI-approved EUPL is compliant with these requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/MS-PL" class="external-link">Microsoft Public License (Ms-PL)</a></td>
            <td bgcolor="#ffc000" align="center">&nbsp;<strong>OK (object)</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>#3 D: If you distribute any portion of the software in source code  form, you may do so only under this license by including a complete copy  of this license with your distribution. If you distribute any portion  of the software in compiled or object code form, you may only do so  under a license that complies with this license.<br />
            The OSI-approved EUPL is compliant.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/MS-RL" class="external-link">Microsoft Reciprocal License (MS-RL)</a></td>
            <td bgcolor="#ffc000" align="center">&nbsp;<strong>OK (object)</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>#3 E: If you distribute any portion of the software in source code  form, you may do so only under this license by including a complete copy  of this license with your distribution. If you distribute any portion  of the software in compiled or object code form, you may only do so  under a license that complies with this license.<br />
            The OSI-approved EUPL is compliant.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/MirOS" class="external-link">MirOS License</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>Nothing in the MirOS license (similar to BSD) restricts  redistribution under any other license (free, as the EUPL, or even  non-free).<br />
            The license requests retaining the copyright notices and disclaimer.<br />
            These inherited conditions / restrictions are not &ldquo;added&rdquo; by the EUPL licensor and are in line with the EUPL requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/MIT" class="external-link">MIT License</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>Nothing in the MIT license restricts redistribution under any other license (free, as the EUPL, or even non-free).<br />
            The license requests retaining the copyright notices. This is in line with the EUPL requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/Motosoto" class="external-link">Motosoto License</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>#4 g. You may &ldquo;distribute Derivative Works as products under any  other license you select, with the proviso that the requirements of this  License are fulfilled for those portions of the Derivative Works that  consist of the Licensed Product or any Modifications thereto.&rdquo;<br />
            These inherited conditions / restrictions are not &ldquo;added&rdquo; by the EUPL licensor and are in line with the EUPL requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/MPL-1.1" class="external-link">Mozilla Public License 1.1</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>#1.8. A larger work combines the MPL Covered Code (or portions  thereof) with other code not governed by the MPL (i.e. code governed by  the EUPL).<br />
            #3.7. You may distribute a Larger Work as a single product  under another license (i.e. the EUPL) provided the requirements of the  MPL are fulfilled for the Covered Code.<br />
            <br />
            Please document  (retaining copyright notices) that the MPL covered code (or portions)  stay covered by the MPL. As an OSI-Approved license, the EUPL grants to  recipients the same freedoms as the MPL.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/Multics" class="external-link">Multics License</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>Nothing in the license restricts redistribution under any other license (free, as the EUPL, or even non-free).<br />
            The license requests retaining the copyright notices and historical background. This is in line with the EUPL requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/NASA-1.3" class="external-link">NASA Open Source Agreement (NOSA v1.3)</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>#1 Larger Work&quot; means computer software that combines Subject  Software, or portions thereof, with software separate from the Subject  Software that is not governed by the terms of this Agreement.<br />
            #3 I:  Larger works may be distributed as a single product &ldquo;not governed by the  terms of this agreement&rdquo; but &ldquo;Subject Software, or portions thereof,  included in the Larger Work is subject to this Agreement.&rdquo;<br />
            These inherited conditions / restrictions are not &ldquo;added&rdquo; by the EUPL licensor and are in line with the EUPL requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/NTP" class="external-link">NTP License</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>Nothing in the license restricts redistribution under any other license (free, as the EUPL, or even non-free).<br />
            The  license requests retaining the copyright notices, disclaimer and  restricts the use of trademarked names for advertising. This is in line  with the EUPL requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/Naumen" class="external-link">Naumen Public License</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>This license is made for a specific licensor (Naumen).<br />
            Nothing in the license restricts redistribution under any other license (free, as the EUPL, or even non-free).<br />
            The license requests retaining the copyright notices, disclaimer and restricts the use of trademarked names. <br />
            This is in line with the EUPL requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/NGPL" class="external-link">Nethack General Public License (NGPL)</a></td>
            <td bgcolor="#ff0000" align="center">&nbsp;<strong>NO</strong></td>
            <td bgcolor="#ffc000" align="center">&nbsp;<strong>?</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>#2b implies that another license can be used:<br />
            &ldquo;...work... that in  whole or in part contains or is a derivative of NetHack or any part  thereof, to be licensed at no charge to all third parties on terms  identical to those contained in this License Agreement (except that you  may choose to grant more extensive warranty protection to some or all  third parties, at your option)&rdquo;.<br />
            However the word &ldquo;identical&rdquo; seems much stronger than &ldquo;compliant&rdquo;, which is used by many other licenses. <br />
            Regarding static linking, this is depending on how far you create a derivative (see discussion at the end of this Matrix)</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/nokia" class="external-link">Nokia Open Source License</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>#1 c. A larger work &ldquo;combines Covered Software or portions thereof with code not governed by the terms of this License&rdquo;<br />
            #3.7.  You may distribute a larger work as a single product &ldquo;not governed by  the terms of this License&rdquo;, provided &ldquo;the requirements of this License  are fulfilled for the Covered Software&rdquo;.<br />
            The OSI-approved EUPL is compliant with requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/NOSL3.0" class="external-link">Non-Profit Open Software License 3.0</a></td>
            <td bgcolor="#ff0000" align="center">&nbsp;<strong>NO</strong></td>
            <td bgcolor="#ffc000" align="center">&nbsp;<strong>?</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>See comments related to the OSL: without exception, derivatives must be licensed under NPOSL.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/OCLC-2.0" class="external-link">OCLC Research Public License 2.0</a></td>
            <td bgcolor="#ff0000" align="center">&nbsp;<strong>NO</strong></td>
            <td bgcolor="#ffc000" align="center">&nbsp;<strong>?</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>#2: A. &quot;Combined Work&quot; results from combining and integrating all or  parts of the Program with other code. A Combined Work may be thought of  as having multiple parents or being result of multiple lines of code  development.<br />
            #3 D. &ldquo;Combined Works are subject to the terms of this license&rdquo;.<br />
            At  the exception of &ldquo;Aggregates&rdquo; (presence without integration on the same  medium) the OCLC is not interoperable with other F/OSS licenses.<br />
            Regarding static linking, this is depending on how far you create a derivative (see discussion at the end of this Matrix).</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/OFL-1.1" class="external-link">Open Font License 1.1 (OFL)</a></td>
            <td bgcolor="#ffc000" align="center">&nbsp;<strong>OK (object)</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>The scope of the license is limited to the font software and  specific derivatives. The Font Software may be bundled, redistributed  and/or sold with any software, provided that each copy contains the  copyright notice and this license.<br />
            Our interpretation is that a  larger work can be distributed under the EUPL, while the specific font  software source (even modified) will stay covered by the OFL.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/OGTSL" class="external-link">Open Group Test Suite License (OGTSL)</a></td>
            <td bgcolor="#ffc000" align="center">&nbsp;<strong>OK (object)</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>#4 You may distribute the work in object code, provided that you ... (rename non-standard executables).<br />
            These inherited conditions / restrictions are not &ldquo;added&rdquo; by the EUPL licensor and are in line with the EUPL requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/OSL-3.0" class="external-link">Open Software License<br />
            OSL v3.0</a></td>
            <td bgcolor="#ff0000" align="center">&nbsp;<strong>NO<br />
            <br />
            <br />
            (but you may distribute the larger work under the OSL)</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>The OSL is copyleft (#1.c. states &ldquo;You may distribute derivative  Works under the OSL&rdquo;). Therefore it is implicitly not allowed to  distribute larger derivative works under other licenses (including EUPL,  GPL etc.).<br />
            <br />
            The OSL is also included in the EUPL downstream  compatibility list (EUPL Appendix) - therefore the EUPL is compatible  with the OSL: you may distribute under the OSL a larger derivative work  integrating components covered by the EUPL and by the OSL.&nbsp;<br />
            <br />
            As  the EUPL has included the OSL in its own compatibility list, there would  be no reasons for OSL licensors to refuse an exception, but this must  be formally requested.<br />
            There are no examples of such exceptions (probably because no one requested it so far).<br />
            <br />
            Linking:  according to Lawrence Rosen (OSL steward) linking components  (especially if covered by various OSI approved licenses, considering the  market factor impact) does not produce a derivative. We assume that OSL  licensors share this view.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/PHP-3.0" class="external-link">PHP License 3.0</a></td>
            <td bgcolor="#ffc000" align="center">&nbsp;<strong>OK (object)</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>Nothing in the license restricts the distribution of larger works in binary form under another license (as the EUPL).<br />
            Redistributions  must retain the copyright notice, disclaimer and conditions (including  restrictions on the use of &ldquo;PHP&rdquo; in the name of derived products).<br />
            These inherited conditions / restrictions are not &ldquo;added&rdquo; by the EUPL licensor and are in line with the EUPL requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/PostgreSQL" class="external-link">PostgreSQL license </a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td><br />
            Nothing in the license restricts the distribution of larger works under another license (as the EUPL).<br />
            Redistributions must retain the copyright notice and disclaimer.<br />
            These inherited conditions / restrictions are not &ldquo;added&rdquo; by the EUPL licensor and are in line with the EUPL requirements</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/Python-2.0" class="external-link">Python 2.0</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>Nothing in the license restricts the distribution of larger works under another license (as the EUPL).<br />
            Specific changes in Python software must be documented and redistributions must retain the copyright notice and disclaimer.<br />
            These inherited conditions / restrictions are not &ldquo;added&rdquo; by the EUPL licensor and are in line with the EUPL requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/QPL-1.0" class="external-link">Q Public License (QPL v1.0)</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>Nothing in the license, which is considered as &ldquo;non-copyleft&rdquo;  restricts the distribution of larger works under another license (as the  EUPL).<br />
            They are specific requirements (to distribute specific modifications of the covered code through patches).<br />
            #6 adds conditions in case &ldquo;applications&rdquo; links with the covered software (availability of source code, free redistribution&hellip;)<br />
            These inherited conditions / restrictions are not &ldquo;added&rdquo; by the EUPL licensor and are in line with the EUPL requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/RPSL-1.0" class="external-link">RealNetworks Public Source License (RPSL v1.0)</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td># 1.6 Derivative Work also includes any work which combines any  portion of Covered Code or Modifications with code not otherwise  governed by the terms of this License.<br />
            #4 (You may) &ldquo;distribute the  Derivative Work as an integrated product. In each such instance, You  must make sure the requirements of this License are fulfilled for the  Covered Code or any portion thereof, including all Modifications.&rdquo;<br />
            The OSI-approved EUPL is compliant with this requirement. <br />
            In addition, the covered source code &ldquo;taken alone&rdquo; will stay covered by RSPL.<br />
            RPSL inherited conditions / restrictions are not &ldquo;added&rdquo; by the EUPL licensor and are in line with the EUPL requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/RPL-1.5" class="external-link">Reciprocal Public License&nbsp; RPL v1.5</a></td>
            <td bgcolor="#ff0000" align="center">&nbsp;<strong>NO</strong></td>
            <td bgcolor="#ffc000" align="center">&nbsp;<strong>?</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>License text states:<br />
            # 6.0 ...You hereby agree that any...  Derivative Works, (meaning &ldquo;defined under U.S. copyright law&rdquo;) ... are  governed by the terms of this License... (and) must be Deployed (meaning  distributed) under the terms of this License or a future version of  this License... <br />
            Regarding static linking, this is depending on how far you create a derivative (see discussion at the end of this Matrix).</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/RSCPL" class="external-link">Ricoh Source Code Public License (RSCPL v1.0)</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>#1.6. &quot;Larger Work&quot; means a work which combines Governed Code or  portions thereof with code not governed by the terms of this License.<br />
            #3.7.  &ldquo;You may create a Larger Work by combining Governed Code with other  code not governed by the terms of this License and distribute the Larger  Work as a single product. In such a case, You must make sure the  requirements of this License are fulfilled for the Governed Code.&rdquo;<br />
            The OSI-approved EUPL is compliant with requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/Simple-2.0" class="external-link">Simple Public License v2.0</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>SimPL is a plain language implementation of GPL 2.0. However it  allows relicensing of derived works under &ldquo;substantially similar terms  (such as GPL 2.0), without adding further restrictions to the rights  provided&rdquo;.<br />
            In our interpretation, &ldquo;such as&rdquo; does not mean &ldquo;only&rdquo; and the EUPL complies with the requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/Sleepycat" class="external-link">Sleepycat License</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>Nothing in this license restricts redistribution under any other license (provide it is F/OSS, as the EUPL).<br />
            The  license requests retaining copyright notices and disclaimer, and to  document how to obtain the freely redistributable source code.<br />
            The OSI-approved EUPL complies with requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/SPL" class="external-link">Sun Public License</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>#1.7. &quot;Larger Work&quot; means a work which combines Covered Code or  portions thereof with code not governed by the terms of this License.<br />
            #3.7.  &ldquo;You may create a Larger Work by combining Covered Code with other code  not governed by the terms of this License and distribute the Larger  Work as a single product. In such a case, You must make sure the  requirements of this License are fulfilled for the Covered Code.&rdquo;<br />
            The OSI-approved EUPL is compliant with requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/Watcom-1.0" class="external-link">Sybase Open Watcom Public License (Watcom v1.0)</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>#1.5 &quot;Larger Work&quot; means a work which combines Covered Code or  portions thereof with code not governed by the terms of this License.<br />
            #4  &ldquo;You may create a Larger Work by combining Covered Code with other code  not governed by the terms of this License and distribute the Larger  Work as a single product. In each such instance, You must make sure the  requirements of this License are fulfilled for the Covered Code or any  portion thereof&rdquo;.<br />
            The OSI-approved EUPL is compliant with requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/NCSA" class="external-link">University of Illinois / NCSA Open Source License</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>Nothing in this license restricts redistribution under any other license (free, as the EUPL, or even non-free).<br />
            The license requests retaining the copyright notices, disclaimer and restricts the use of licensor name.<br />
            The OSI-approved EUPL complies with requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/VSL-1.0" class="external-link">Vovida Software License (VSL v1.0)</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>This license is for use by a specific licensor (Vovida).<br />
            Nothing in this license restricts redistribution under any other license (free, as the EUPL, or even non-free).<br />
            The license requests retaining the copyright notices and disclaimer. It restricts the use of licensor and product names.<br />
            The OSI-approved EUPL complies with requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/W3C" class="external-link">&nbsp;W3C license</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>This license is for use by a specific licensor (W3C).<br />
            Nothing in this license restricts redistribution under any other license (free, as the EUPL, or even non-free).<br />
            The license requests retaining the copyright notices and disclaimer, and to notify changes to W3C.<br />
            These inherited conditions are not &ldquo;added&rdquo; by the EUPL licensor and are in line with the EUPL requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/xnet" class="external-link">X.Net license (Xnet)</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>Nothing in this license restricts redistribution under any other license (free, as the EUPL, or even non-free).<br />
            The license requests retaining the copyright notices &ldquo;in all copies or substantial portions of the software&rdquo;.<br />
            These inherited conditions are not &ldquo;added&rdquo; by the EUPL licensor and are in line with the EUPL requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/ZPL-2.0" class="external-link">Zope Public License (ZPL v2.0)</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>Nothing in this license restricts redistribution under any other license (free, as the EUPL, or even non-free).<br />
            The license requests retaining the copyright notices and restricts the use of service marks or trademarks of Zope.<br />
            These inherited conditions are not &ldquo;added&rdquo; by the EUPL licensor and are in line with the EUPL requirements.</td>
        </tr>
        <tr>
            <td><a href="http://www.opensource.org/licenses/Zlib" class="external-link">Zlib/libpng License</a></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td bgcolor="#92d050" align="center">&nbsp;<strong>OK</strong></td>
            <td>Nothing in this license restricts redistribution under any other license (free, as the EUPL, or even non-free).<br />
            The license requests retaining the copyright notices.<br />
            This condition is in line with the EUPL requirements.</td>
        </tr>
        <tr>
            <td colspan="5">OK= Allowed <br />
            OK (Object) = Distribution of binaries of the larger work &ldquo;as a single product&rdquo; under the EUPL is allowed <br />
            NO = Not allowed (however, licensor owning full copyright may provide exceptions)<br />
            ? = Uncertainties (and no exceptions exist so far)</td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<a name="section-3"></a>
<h2>Discussion on &ldquo;Linking&rdquo;</h2>
<p><br />
A combined application or work is often implemented by linking  various components. From the end user point of view, the application may  look like a single program (it may have a single name, unique  interface, documentation etc.). From the developer point of view, each  component is a separate program, possibly obtained under various primary  licenses.</p>
<p>In case these various licenses are &ldquo;free / open source&rdquo; and  &ldquo;copyleft&rdquo;, what kind of linking could you implement to be legally  authorised to distribute the application, under a single license or &ndash;  possibly &ndash; under several licenses?</p>
<p>There are two main cases of linking:</p>
<ul>
    <li>Static linking combines components through compilation, copying  them into the target application and producing a merged object file that  is a stand-alone executable.</li>
</ul>
<ul>
    <li>Dynamic linking uses components at the time the application is loaded (load time) or during execution (run time).</li>
</ul>
<p>In the above Matrix, we assume that both linking are permitted in two  cases: when incorporation (merging codes in a &ldquo;cut-paste&rdquo; sense) is  authorised and when the distribution of object code under the EUPL is  authorised (because this covers static linking at object code level as  well).</p>
<p>&nbsp;</p>
<div>From the legal (copyright) point of view, the question of linking  is similar to the incorporation discussion: does linking produce a  derivative of the used components, or not?
<ul>
    <li>If the answer is &ldquo;NO&rdquo;, each part of the application can be  licensed under its primary license: You may declare &ldquo;My application is  licensed to you under the EUPL, except component X that is licensed  under GPL, component Y that is licensed under the EPL, component Z under  the MPL etc...</li>
</ul>
<ul>
    <li>If the answer is &ldquo;YES&rdquo;, the distribution of the new derivative  could be legally impossible (under any license) as soon a copyleft  conflict exists. Such prohibition may be considered as beneficial (or  protective) for the free software world in case the licensor planned to  use a proprietary license. On the contrary, the prohibition may look  cumbersome and fussy when all relevant licenses are OSI-approved  (providing the same freedoms) and copyleft (protecting against  appropriation).</li>
</ul>
<p>In Europe there is no case law solving this question. In absence of  case law, we have to be careful. We may assume that a judge will  interpret the copyright law with more flexibility (no derivative created  by linking) in the case of &ldquo;copyleft conflict&rdquo; between two OSI approved  licenses, and more strictly if a proprietary license is used (creation  of a derivative in such case, because in such litigation the  &quot;market-based&quot; factors are looking more important than the pure linking  technique) &ndash; but this is a pure assumption.</p>
<p>The recent GPLv3 looks receptive to these &ldquo;market-based&rdquo; factors when  a compilation is not used to limit users&rsquo; freedom, at least in the  specific case of aggregates[<a href="#notes" title="Notes">3</a>]  . We estimate that the requirement that independent sources (compiled  together) should not form a larger program is to understand from  developers&rsquo; point of view: no portion of the code is copied into a  larger program (on the contrary, due to some interface layer, end users  may perceive the independent components as a single application).</p>
<p>&nbsp;</p>
<p>Instead of European and US case law[<a href="#notes" title="Notes">4</a>] , we may deal with the main F/OSS opinion makers:</p>
<ul>
    <li>Lawrence Rosen (IP professor and OSI general counsel) says that  the method of linking is mostly irrelevant to the question about whether  a piece of software is or is not a derivative work. For him, a  derivative is made only in the case of incorporation [in a copy-paste  sense] of original code, or in the case of modification, translation or  other change in any way for creating the new program.</li>
</ul>
<ul>
    <li>Other IP specialists believe that static linking may produce  derivative works, while dynamic linking may not, but the question is not  &ldquo;clear-cut&rdquo;. For example, some dynamically linked Linux kernel drivers  are distributed under proprietary licenses, and the Linux author (L.  Torvalds) agrees that such dynamic linking can create derived works in  specific circumstances.</li>
</ul>
<ul>
    <li>The Free Software Foundation and their followers, in their  desire to extend the free-software world by giving it more tools than  the proprietary world, are the most assertive: static linking creates  derivatives and executables which uses a dynamically-linked library may  also be derivatives, except when separate programs just &ldquo;communicate&rdquo;  with one another [<a href="#notes" title="Notes">5</a>]  . Does this interest for &ldquo;protecting and extending free software&rdquo; still  exist when the other license is the EUPL (which is a free, copyleft  software license)? The FSF could answer positively, because - at the  contrary of the OSI - it has a strong GPL centric policy, arguing that  for protecting free software there is little salvation outside their own  GPLs (in fact, the GPLv3 and AGPLv3).</li>
</ul>
<p>&nbsp;</p>
<p>We made the assumption that, by selecting a Gnu license, licensors  follow the FSF position and want to consider that most cases of static  linking create a derivative. A question mark (?) is resulting from the  absence of case law. In all other cases, the proposed Matrix is based on  a &ldquo;liberal&rdquo; assumption, in consideration of the common &ldquo;market  approach&rdquo; shared by all OSI approved licenses, especially when these  licenses are copyleft.</p>
<p>&nbsp;</p>
</div>
<a name="section-4"></a>
<h2 style="font-size: 18px;">The EUPL &quot;Downstream&quot; compatibility list</h2>
<p class="Default"><font face="Verdana, sans-serif" color="#17365d" class="Apple-style-span"><span class="Apple-style-span" style="font-size: 12px;"> </span></font></p>
<p><font face="Verdana, sans-serif" color="#17365d" class="Apple-style-span"> <font color="#17365d"><font face="Verdana, sans-serif"><font size="2" style="font-size: 9pt;">The EUPL v1.1 downstream compatibility list was established for the EUPL v1.0 (January 2007). It was drafted based on a September 2006 study of the CRID (Research Centre in Computers and Law &ndash; FUNDP Namur<span style="text-decoration: underline;"> </span></font></font></font></font>[<a href="#notes">6</a>].<font face="Verdana, sans-serif" color="#17365d" class="Apple-style-span"><a href="#notes" name="_ftnref1"></a></font></p>
<font face="Verdana, sans-serif" color="#17365d" class="Apple-style-span"> </font><span class="Apple-style-span" style="font-size: 12px;"><font color="#17365d"><font face="Verdana, sans-serif"><font size="2" style="font-size: 9pt;">The purpose  of the list is to allow mergers between EUPLed code and other copylefted code (when license terms impose to redistribute any larger, merged work under the same &ldquo;inherited&rdquo; license, distribution  becomes legally impossible in case of copyleft conflicts). Therefore the chosen licenses had to be in any case copyleft, and &ldquo;the copyleft effect of the elected licenses should be similar to the EUPL&rsquo;s copyleft and should fulfill the same functions&rdquo;, the authors report </font></font></font></span>[<a href="#notes">7</a>]<span style="text-decoration: underline;">.</span><span class="Apple-style-span" style="font-size: 12px;"><a name="_ftnref2"></a></span><font face="Verdana, sans-serif" color="#17365d" class="Apple-style-span"><span class="Apple-style-span" style="font-size: 12px;">
<p><font color="#17365d">&nbsp;</font></p>
<p><font color="#17365d"><font face="Verdana, sans-serif"><font size="2" style="font-size: 9pt;">The study proposed the following list:</font></font></font></p>
<p align="JUSTIFY"><font color="#17365d"><font face="Verdana, sans-serif"><font size="2" style="font-size: 9pt;">- General Public License (GPL) v. 2</font></font></font></p>
<p align="JUSTIFY"><font color="#17365d"><font face="Verdana, sans-serif"><font size="2" style="font-size: 9pt;">- Open Software License (OSL) v. 2.1, v. 3.0</font></font></font></p>
<p align="JUSTIFY"><font color="#17365d"><font face="Verdana, sans-serif"><font size="2" style="font-size: 9pt;">- Common Public License (CPL) v. 1.0</font></font></font></p>
<p align="JUSTIFY"><font color="#17365d"><font face="Verdana, sans-serif"><font size="2" style="font-size: 9pt;">- Eclipse Public License (EPL) v. 1.0</font></font></font></p>
<p align="JUSTIFY"><font color="#17365d"><font face="Verdana, sans-serif"><font size="2" style="font-size: 9pt;">- Cecill v. 2.0</font></font></font></p>
</span></font><span class="Apple-style-span" style="font-size: 12px;">The presence of the strong copyleft (OSI-approved) GPL and OSL makes no discussion. The presence of non-OSI-approved CeCILL was interesting because supported by three French public research centres, strong copyleft and &ndash; by the way &ndash; permitting re-licensing under all GPL versions (including the GPLv3 that was published in June 2007) This makes the EUPL compatible, directly or indirectly, with all GPL versions.&nbsp;</span><span class="Apple-style-span" style="font-size: 12px;">What looks more questionnable is the presence of the Eclipse (and of the CPL, but we may forget this one that has now been superseded by the EPL), because according to the Free Software Foundation, the EPL only provides a &ldquo;weaker copyleft&rdquo;.</span><font face="Verdana, sans-serif" color="#17365d" class="Apple-style-span"><span class="Apple-style-span" style="font-size: 12px;">
<p><font color="#17365d">&nbsp;</font></p>
<p><font color="#17365d"><font face="Verdana, sans-serif"><font size="2" style="font-size: 9pt;">When analyzing copyleft, the study made three categories </font></font></font>[<a href="#notes">8</a>]<span style="text-decoration: underline;">:</span><a name="_ftnref3"></a></p>
<p><font color="#76797c"><font face="Lucida Grande, Verdana, Lucida, Helvetica, Arial, sans-serif"><font size="1" style="font-size: 8pt;"><font color="#17365d"><font face="Symbol"><font size="2" style="font-size: 9pt;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></font></font><font color="#17365d">&ldquo;</font><font color="#17365d"><font face="Verdana, sans-serif"><font size="2" style="font-size: 9pt;"><strong>Weak copyleft&rdquo;&nbsp;</strong></font></font></font><font color="#17365d"><font face="Verdana, sans-serif"><font size="2" style="font-size: 9pt;">when&nbsp;the&nbsp;licence restricts the effect on a file basis (this is the case of the Mozilla Public License and the Common Development and Distribution License).</font></font></font></font></font></font></p>
<p><font color="#76797c"><font face="Lucida Grande, Verdana, Lucida, Helvetica, Arial, sans-serif"><font size="1" style="font-size: 8pt;"><font color="#17365d"><font face="Symbol"><font size="2" style="font-size: 9pt;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></font></font><font color="#17365d">&ldquo;</font><font color="#17365d"><font face="Verdana, sans-serif"><font size="2" style="font-size: 9pt;"><strong>Source only copyleft&rdquo;</strong></font></font></font><font color="#17365d">&nbsp;</font><font color="#17365d"><font face="Verdana, sans-serif"><font size="2" style="font-size: 9pt;">when&nbsp;the&nbsp;licence imposes the redistribution of the source code under the same licence, while the executable code may be governed by another licence (as long as the source code is available and remains under the original licence): the executable version of the derivative work can then be proprietary (this is the case of the EPL)</font></font></font></font></font></font></p>
<p><font color="#76797c"><font face="Lucida Grande, Verdana, Lucida, Helvetica, Arial, sans-serif"><font size="1" style="font-size: 8pt;"><font color="#17365d"><font face="Symbol"><font size="2" style="font-size: 9pt;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></font></font><font color="#17365d">&ldquo;</font><font color="#17365d"><font face="Verdana, sans-serif"><font size="2" style="font-size: 9pt;"><strong>Strong copyleft</strong></font></font></font><font color="#17365d"><font face="Verdana, sans-serif"><font size="2" style="font-size: 9pt;">&rdquo; when the licence does not restrict the copyleft effect to modifications on a file basis, and the executable is to be considered as a derivative work.</font></font></font></font></font></font></p>
</span></font><span class="Apple-style-span">Therefore Bastin and Laurent, while not categorizing the EPL copyleft as &ldquo;Strong&rdquo; (without being weak in their mind!) considered that it was &ldquo;similar&rdquo; to the EUPL copyleft on the source code, which is by far the important thing for open source developers because it prohibits source code appropriation. For this reason, other prominent analysts like the German License Centre <a href="http://ifross.org/en/license-center" class="external-link">ifrOSS</a> categorize the EPL as &quot;Strong Copyleft&quot;</span>
<div><span class="Apple-style-span" style="font-size: 12px;"><br />
</span></div>
<div><span class="Apple-style-span" style="font-size: 12px;">In January 2007, the European Commission published the EUPL and its compatibility list based on their study, and did not change the list when publishing the EUPL v1.1 in 2009.</span><font face="Verdana, sans-serif" color="#17365d" class="Apple-style-span"><span class="Apple-style-span" style="font-size: 12px;">
<p><font color="#17365d">&nbsp;</font></p>
<p>&nbsp;</p>
</span></font>
<p>&nbsp;</p>
<div><hr width="33%" size="1" align="left" />
<div id="ftn1">
<p class="Default"><font face="Calibri, sans-serif" color="#000000" class="Apple-style-span"><span class="Apple-style-span"><br />
</span></font></p>
</div>
<div id="ftn3">&nbsp;</div>
</div>
<div><a name="section-5"></a>
<h2><a name="notes"></a>Notes</h2>
<ol start="1">
    <li><a href="http://www.mysql.com/about/legal/licensing/foss-exception/" class="external-link">http://www.mysql.com/about/legal/licensing/foss-exception/</a></li>
    <li><a href="http://www.sencha.com/legal/open-source-faq/open-source-license-exception-for-applications/" class="external-link">http://www.sencha.com/legal/open-source-faq/open-source-license-exception-for-applications/</a></li>
    <li>#5  (in fine):&nbsp; &ldquo;A compilation of a covered work with other separate and  independent works, which are not by their nature extensions of the  covered work, and which are not combined with it such as to form a  larger program, in or on a volume of a storage or distribution medium,  is called an &ldquo;aggregate&rdquo; if the compilation and its resulting copyright  are not used to limit the access or legal rights of the compilation\'s  users beyond what the individual works permit. Inclusion of a covered  work in an aggregate does not cause this License to apply to the other  parts of the aggregate.&rdquo;</li>
    <li>In the <a href="http://en.wikipedia.org/wiki/Galoob_v._Nintendo" class="external-link">Galoob v. Nintendo</a>  an US court of appeal defined a derivative work as having &quot;\'form\' or  permanence&quot; and noted that &quot;the infringing work must incorporate a  portion of the copyrighted work in some form&quot;, but there have been no  clear court decisions to resolve the case of static/dynamic linking  making a derivative.</li>
    <li>This is the reason why the FSF created the <a href="http://en.wikipedia.org/wiki/LGPL" class="external-link">LGPL </a>(which  is nearly identical to the GPL) for adding the permission to allow  linking for the purposes of &quot;using the licensed library&quot;.</li>
    <li><span class="Apple-style-span"><span style="font-size: 9pt;">Fabian BASTIN (</span><span style="font-size: 9pt;">CERFACS) and&nbsp;Philippe LAURENT (CRID) <a href="../../system/files/doc/Doc3ef5.pdf" class="document pdf">Study of the compatibility mechanism of the EUPL</a>&nbsp;v. 1.0 -&nbsp;September 2006</span></span></li>
    <li><span class="Apple-style-span"><span style="font-size: 9pt;">Op. Cit., p.17</span></span></li>
    <li>
    <div id="ftn1">
    <p class="Default"><font face="Calibri, sans-serif" class="Apple-style-span"><span style="font-size: 9pt;">Op. Cit., p.7</span></font><span class="Apple-style-span">.</span></p>
    </div>
    </li>
</ol>
</div>
</div>
</div>
<div class="relatedItems"><fieldset id="relatedItemBox">                     <legend>Related content</legend>
<ul class="visualNoMarker">
    <li><span class="contenttype-document">                                                                  <a title="Text and preamble of the European Union Public Licence (EUPL) version 1.1, available in 22 official languages of the European Union." class="state-published" href="./licence-eupl">European Union Public Licence (EUPL v.1.1)</a>                             </span></li>
</ul>
</fieldset></div>
<p>&nbsp;</p>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'European Interoperability Framework';
	$path = 'software/page/european-interoperability-framework';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<h1 class="documentFirstHeading"><span id="parent-fieldname-title">             Commission\'s Communication on Interoperability         </span></h1>
<div class="documentByLine"><span id="parent-fieldname-description">             On the 16th of December 2010, the European Commission has  adopted the Communication &ldquo;Towards interoperability for European public  services&rdquo;, to establish a common approach for Member States public  administrations, to help citizens and businesses to profit fully from  the EU&rsquo;s Single Market.         </span></div>
<div id="parent-fieldname-text" class="plain">
<p>Annex II of the communication is the European Interoperability Framework (EIF v2).</p>
<p>The EIF is a recommendation,&nbsp;maintained under the ISA programme, in  close cooperation between the Member States and the Commission.</p>
<p>The EIF should be taken into account when making decisions on  European public services that support the implementation of EU policy  initiatives and when establishing public services that in the future may  be reused as part of European public services.</p>
<p>Interoperability is build on 12 underlaying principles.</p>
<p>In particular, the &nbsp;&quot;Reusability principle&quot; (N&deg; 10) means that  &nbsp;public administrations must be willing to share with others their  solutions, concepts, frameworks, specifications, tools and components,  applying the principle of &quot;Openness&quot; (N&deg; 9).</p>
<p>The EIF states: Reuse and sharing naturally lead to cooperation using  collaborative platforms: the technical platforms to share open source  <a href="../all">software components</a>, <a href="../../asset/all">semantic assets</a> and best practices, and  the legal framework (the European Union Public Licence EUPL) that the  Commission has also created in order to facilitate the sharing of  software components.</p>
<p>&nbsp;</p>
</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Guideline for Public administrations on Procurement and Open Source Software (updated June 2010) ';
	$path = 'software/page/guideline-for-public';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<h1 class="documentFirstHeading">&nbsp;</h1>
<p class="documentDescription"><span id="parent-fieldname-description">Public administrations that consider using open source software may need advise on how and why public agencies can acquire such software. This study, commissioned by the European Commission s part of the &quot;Dissemination of good practice in Open Source Software (GPOSS)&quot; measure under the IDABC programme, tries to respond to this need. </span></p>
<div id="parent-fieldname-text">
<p>The study contanins guidelines for the procuring of Open Source Software and ready to use template texts for tenders.</p>
<p>The study was updated in June 2010 based on recent Member States policies (Spain, Malta) and case law (Italian Constitutional Court).</p>
<div class="kssattr-atfieldname-text kssattr-templateId-widgets/rich kssattr-macro-rich-field-view inlineEditable" id="parent-fieldname-text">
<p>&nbsp;<br />
Disclaimer: Not legal advice!<br />
These guidelines seek to provide practical information regarding the law covering procurement. However, such law is interpreted by the courts: and very little European case-law exists for the public procurement of software. These guidelines, including the legal guideline in Annex B and the template texts in Annex A, should not be considered legal advice, or a substitution for the normal procedures of legal consultation that may be used in the preparation of procurement, tenders and contracts.</p>
<p>Download the <strong><a class="document pdf" title="OSS procurement guideline public" href="../../system/files/guidelines/OSS-procurement-guideline-public-final-June2010-EUPL-FINAL.pdf">Guideline here</a></strong></p>
</div>
</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Articles on EUPL';
	$path = 'software/page/articles-eupl';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<p>&nbsp;</p>
<h2>General purpose guidelines</h2>
<div>&nbsp;</div>
<ul>
    <ul>
        <li><strong>Thierry Aim&eacute;</strong> and al., A practical guide to using free software in the public sector&nbsp;(in <a href="../sites/default/files/doc/FAQ-LL-V131-EN.pdf">English</a> and <a class="external-link" href="../sites/default/files/doc/FAQ-LL-V131-FR.pdf">French</a>)</li>
        <li><span style="font-size: 13px;" class="Apple-style-span"><span style="font-size: 10pt;"><strong>Rishab A. Ghosh</strong> and al. <a class="external-link" href="../sites/default/files/guidelines/OSS-procurement-guideline-public-final-June2010-EUPL-FINAL.pdf">Guidelines on public procurement of open source software</a> (in English)</span></span></li>
        <li><span style="font-size: 13px;" class="Apple-style-span"><strong>Cenatic guide</strong>&ndash; </span><span style="font-size: 13px;" class="Apple-style-span"><a class="external-link" href="../sites/default/files/doc/infcenatic01.pdf">Software de fuentes abiertas para el desarrollo de la Administraci&oacute;n P&uacute;blica Espa&ntilde;ola</a> </span><span style="font-size: 13px;" class="Apple-style-span">(in Spanish)</span></li>
        <li><span style="font-size: 13px;" class="Apple-style-span"><span style="font-size: 10pt;"><strong>Jean-Paul Triaille and Fran&ccedil;ois Coppens</strong>, for the Joint Research  Center of the European Commission (JRC) &ndash; &ldquo;<a title="JRC OSS guidelines" class="internal-link" href="../sites/default/files/guidelines/OSS guidelines v DIGIT -2.pdf">Open Source Software Guidelines</a>&rdquo; (in English). This guide has been developed by  JRC for internal use, but they were kind enough to share it with JOINUP users. However, the EUPL compatibility matrix should be updated: please  refer to the JOINUP list of <a title="EUPL-compatible licenses" class="internal-link" href="./eupl-compatible-open-source-licences">EUPL compatible licences</a></span></span></li>
        <li><span style="font-size: 13px;" class="Apple-style-span"><span style="font-size: 10pt;">
        <p><span class="apple-style-span"><strong><span style="font-size: 10pt;">Ghosh, Glott, Gerloff, Schmitz, Aisola, Boujraf</span></strong></span><span class="apple-style-span"><span style="font-size: 10pt;">, &quot;Study on the effect on the development of the information society of European public bodies making their own software available as open source&quot; - <a href="../sites/default/files/doc/PS-OSS Final report.pdf"><span class="internal-link">OSS impact study</span></a>.</span></span></p>
        </span></span></li>
    </ul>
</ul>
<h2><span style="font-size: 20px;" class="Apple-style-span">Guidelines and analysis related to the EUPL</span></h2>
<p style="font-size: 10pt;"><span style="font-size: 10pt;">&nbsp;</span></p>
<ul>
    <li><span style="font-size: 10pt;"><strong>Patrice-Emmanuel Schmitz</strong>, &quot;The European Union Public Licence &ndash;&nbsp;</span>Guidelines for users and developers EUPL v.1.1&quot; (<a title="Guidelines" class="internal-link" href="./eupl-guidelines">available in 22 languages</a>). Guidelines are complemented by a <a title="EUPL-compatible licenses" class="internal-link" href="./eupl-compatible-open-source-licences">List of EUPL compatible licences</a> (in English).</li>
    <li><strong>Fabio Bravo</strong>, <a class="external-link" href="../../sites/default/files/doc/ebook4.pdf">Software &ldquo;Open Source&rdquo; e Pubblica Amministrazione </a>(L&rsquo;esperienza europea e quella italiana tra diritto d&rsquo;autore, appalti pubblici e diritto dei contratti. La EUPL), Bologna, 2009 (in Italian)</li>
    <li><strong><a class="external-link" href="http://www.eupl.it/">www.eupl.it</a></strong> This Italian web site is dedicated to the EUPL (in Italian, English and other languages)</li>
    <li><strong>Ernest Park</strong>, <a class="external-link" href="http://olex.openlogic.com/wazi/2009/eupl-gplv3-license-comparison/">Freedom and choice in Open Source Licensing: Comparing the EUPL 1.1 and the GPL v3</a> (in English)</li>
    <li><span style="font-size: 10pt;"><strong>Prof. Dr. Andreas Wiebe</strong>, LL.M. &amp; <strong>Dr. Roman Heidinge</strong>r, M.A, &quot;<a class="external-link" href="../../sites/default/files/doc/EUPL-V11Broschuere-20090423WEB.pdf">The European Union Public Licence - EUPL V1.1 Kommentar</a>&quot; (in German)</span></li>
    <li><span style="font-size: 13px;" class="Apple-style-span"><span style="font-size: 10pt;"><strong>Patrice-Emmanuel Schmitz</strong>, &quot;The EUPL interoperability - </span><span style="font-size: 10pt;"><a title="EUPL interoperability" class="internal-link" href="../../sites/default/files/doc/EUPL Interoperability.pdf">The EUPL interoperability - Which FOSS components in EUPL solutions?</a>&quot;</span><span style="font-size: 10pt;"> </span><span style="font-size: 10pt;">(in English)</span></span></li>
    <li><span style="font-size: 13px;" class="Apple-style-span"><strong><span style="font-size: 10pt;">Prof Petros Stagkos</span></strong><span style="font-size: 10pt;">, <a class="external-link" href="../../sites/default/files/doc/Docf773.pdf"><em>&quot;</em>The European public licence for the use of free software. A mature step forward of the European Union in the context of a globalised society of information and knowledge<em>&quot;</em></a> (in Greek)</span></span></li>
    <li><span style="font-size: 13px;" class="Apple-style-span"><strong><span style="font-size: 10pt;">Kostas Ko&iuml;kas</span></strong><span style="font-size: 10pt;">, (European Commission), formal legal advisor for the IDABC programme, <a class="external-link" href="../../sites/default/files/doc/Doccd5e.pdf">&quot;The European Union Public Licence. First European licence of free software&quot;</a> (in Greek)</span></span></li>
    <li><span style="font-size: 13px;" class="Apple-style-span"><span style="font-size: 10pt;"><strong>Rowan Wilson,</strong> (OSS-Watch, Oxford University), &quot;<a class="external-link" href="http://www.oss-watch.ac.uk/resources/eupl.xml">The European Union Public Licence - An overview</a>&quot; (in English)</span></span></li>
    <li><span style="font-size: 13px;" class="Apple-style-span"><span style="font-size: 10pt;"><strong>Marina Markellou,</strong> <a title="EUPL - vers un dialogue harmonieux entre copyright et copyleft" class="internal-link" href="../../sites/default/files/doc/Marina Markellou - EUPL - 2007.pdf">&quot;EUPL: vers un dialogue harmonieux entre &quot;copyright&quot; et &quot;copyleft&quot;</a> in &quot;Revue Lamy de droit intellectuel&quot; June 2007. (in French)&nbsp;</span></span></li>
    <li><span style="font-size: 10pt;">
    <p><strong><span style="font-size: 10pt;">Marina Markellou</span><span style="font-size: 10pt;">,</span></strong><span style="font-size: 10pt;">&nbsp;<em>&quot;</em><a class="external-link" href="../../sites/default/files/doc/Doce956.pdf">The European Union Public Licence under the Greek IP law</a>&quot; (in Greek)</span></p>
    </span></li>
</ul>
<p>&nbsp;</p>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Guidelines for Public Administrations on Partnering with Free Software Developers (2005)';
	$path = 'software/page/guidelines-public-administrations-partnering-free-software-developers-2005';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<p class="documentDescription"><span id="parent-fieldname-description">Public administrations may be interested in working with free software projects in order to take advantage of their adaptability, low cost and the ability to engage with the large developer community. This document aims to help PAs achieve this successfully. </span></p>
<div id="parent-fieldname-text">
<p><a class="document pdf" title="Encouraging good practice" href="../../system/files/doc/encouraging-good-practice.pdf">Encouraging good practice</a></p>
</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Partnering with Public Administrations: A short guide for OSS developers (2005)';
	$path = 'software/page/partnering-public-administrations-short-guide-oss-developers';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<p class="documentDescription"><span id="parent-fieldname-description">When Free/Libre/Open Source Software (FLOSS) and government are mentioned in the same context, it is usually in relation to public sector use of software. Sometimes, it is related to public sector policies for the promotion of FLOSS. But there are also an increasing number of projects producing customised software for public administrations. This report looks into why FLOSS developers should collaborate with the public sector, and suggests how they should do this. </span></p>
<div id="parent-fieldname-text">
<p><a class="document pdf" title="Short guide for Floss developers" href="../../system/files/doc/short-guide-for-floss-developers.pdf">Short guide for FLOSS developers</a></p>
</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Partnering with Open Source Developers: Guideline for public administrations (2005) ';
	$path = 'software/page/partnering-open-source-developers-guideline-public-administrations-2005';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<p class="documentDescription"><span id="parent-fieldname-description">Public administrations may be interested in working with free software projects in order to take advantage of their adaptability, low cost and the ability to engage with a large developer community. This guide aims to help PAs achieve this successfully, and helps them to avoid the most common stumbling blocks along the way. </span></p>
<div id="parent-fieldname-text">
<p><a class="document pdf" title="Encouraging good practice" href="../../system/files/doc/encouraging-good-practice.pdf">Encouraging good practice</a></p>
</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Patents and open source software - What public authorities need to know (2005) ';
	$path = 'software/page/patents-and-open-source-software-what-public-authorities-need-know';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<p><span id="parent-fieldname-description">While patents on computer programs are not allowed in  European law &quot;as such&quot;, in practice, patents have been granted that  cover functionality in many common software applications. They pose a  risk to the development and distribution of software. This study  discusses the most important issues for public administrations.          </span></p>
<p class="documentDescription"><a class="document pdf" title="Patents and open-source software" href="../../system/files/doc/patents-and-open-source-software.pdf">Patents and open-source software</a></p>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Open Source Licensing of software developed by The European Commission (applied to the CIRCA solution) (2004) ';
	$path = 'software/page/open-source-licensing-software-developed-european-commission-applied-circa-solution';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<p><span id="parent-fieldname-description">For software developed by the public sector, the adoption of  an Open Source licensing policy is a prerequisite to create and  reinforce a community of users and developers, which could hopefully  generate a continuous steam of improvements, support and new releases.  Thi study looks at legal and economic aspects of releasing public  sector-developed applications under open source licences.         </span><a href="../../system/files/doc/open-source-licensing-of-software-developed-by-the.pdf" class="document pdf" title="Open Source Licensing of software developed by The European Commission">Open Source Licensing of software developed by The European Commission</a></p>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Open Source Migration Guidelines. (2003) ';
	$path = 'software/page/open-source-migration-guidelines';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<p class="documentDescription"><span id="parent-fieldname-description">             These guidelines have been designed to help public  administrators decide whether a migration to OSS should be undertaken  and describe, in broad technical terms, how such a migration could be  carried out. They are based on practical experience of a limited number  of publicly available case studies, and cover a wide range of management  and technical concerns.         </span></p>
<p><a href="../../system/files/guidelines/ida-open-source-migration-guidelines-en.pdf" title="IDA Open Source Migration Guidelines EN" class="document pdf">IDA Open Source Migration Guidelines EN</a><a href="../../system/files/guidelines/ida-open-source-migration-guidelines-fr.pdf" class="document pdf" title="IDA Open Source Migration Guidelines FR">IDA Open Source Migration Guidelines FR</a><a href="../../system/files/guidelines/ida-open-source-migration-guidelines-es.pdf" class="document pdf" title="IDA Open Source Migration Guidelines ES">IDA Open Source Migration Guidelines ES</a></p>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Pooling open source software (2002) ';
	$path = 'software/page/pooling-open-source-software-2002';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<p class="documentDescription"><span id="parent-fieldname-description">             This is independent study recommends the creation of a  software clearing house which public administrations can use to share  the software they have developed. This facility, which would concentrate  on applications specific for the needs of the public sector, could  encourage the replication of good practice in e-government services.          </span></p>
<div id="parent-fieldname-text">
<p><a href="../../system/files/doc/pooling-open-source-software-en.pdf" title="Pooling open source software EN" class="document pdf">Pooling open source software EN</a><a href="../../system/files/doc/pooling-open-source-software-fr.pdf" class="document pdf" title="Pooling open source software FR">Pooling open source software FR</a><a href="../../system/files/doc/pooling-open-source-software-de.pdf" class="document pdf" title="Pooling open source software DE">Pooling open source software DE</a></p>
</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Study on the use of Open Source Software in the public sector (2001)';
	$path = 'software/page/study-use-open-source-software-public-sector-2001';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<p class="documentDescription"><span id="parent-fieldname-description">             This study gives an overview of the availability and  potential use of FLOSS-based solutions, reflecting the situation in  spring 2001. It focuses on FLOSS usage experiences in the public sector  of six European countries and the EU administration. Finally, it  provides an overview of the FLOSS market structure, describing  opportunities and potential problems related to the use of FLOSS  solutions.          </span></p>
<p><a class="document pdf" title="OSS Fact sheet" href="../../system/files/doc/oss-fact-sheet.pdf">OSS Fact sheet</a>The Open Source Market Structure<a class="document pdf" title="OSS alphabetical list" href="../../system/files/doc/oss-alphabetical-list-and-software-identification.pdf">Annex: OSS alphabetical list and software identification</a></p>
<div id="parent-fieldname-text">&nbsp;</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Finland and Sweden collaborate using OSS';
	$path = 'software/page/finland-and-sweden-collaborate-using-oss';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<h1 class="documentFirstHeading"><strong><span id="parent-fieldname-description">Sweden and Finland exhibit in this case study exemplary  cross-border collaboration based on open source software for the benefit  of the public. Two universities, one from each country, cooperated in  the Open Kvarken project in order to explore the use of OSS by public  administrations. The name of the project is symbolic, as Kvarken is the  name of the Archipelago that separates (or unites) the two neighbours.  The project in three years has shown interesting examples of OSS use in  the public sector and the operation of two centres of open source  knowledge, in Vaasa, Finland and Ume&aring;, Sweden.           </span></strong></h1>
<p class="documentDescription">&nbsp;</p>
<dl style="" class="portlet toc" id="document-toc">
    <dt class="portletHeader">Contents</dt>
    <dd class="portletItem">
    <ol>
        <li><a href="#section-0">Introduction</a></li>
        <li><a href="#section-1">Organization and background</a></li>
        <li><a href="#section-2">Budget and funding</a></li>
        <li><a href="#section-3">Summary of technical aspects of Open Kvarken</a></li>
        <li><a href="#section-4">Licensing issues</a></li>
        <li><a href="#section-5">Cooperation with other public bodies and the community</a></li>
        <li><a href="#section-6">Dissemination activities</a></li>
        <li><a href="#section-7">Evaluation</a>
        <ol>
            <li><a href="#section-8">Lessons learnt</a></li>
            <li><a href="#section-9">Future plans</a></li>
            <li><a href="#section-10">Conclusions</a></li>
        </ol>
        </li>
        <li><a href="#section-12">Links</a></li>
        <li><a href="#notes">Notes</a></li>
        <li><a href="#section-13">Acknowledgements</a></li>
    </ol>
    </dd>
</dl>
<div id="parent-fieldname-text">
<p>&nbsp;</p>
<table width="80%" class="plain">
    <tbody>
        <tr>
            <td align="center" colspan="2"><strong>Quick Facts</strong></td>
        </tr>
        <tr>
            <td><strong>Project Name</strong></td>
            <td>&nbsp;Open Kvarken</td>
        </tr>
        <tr>
            <td><strong>Sector</strong></td>
            <td>eGovernment</td>
        </tr>
        <tr>
            <td><strong>Start Date</strong></td>
            <td>2008</td>
        </tr>
        <tr>
            <td><strong>End Date</strong></td>
            <td>Ongoing</td>
        </tr>
        <tr>
            <td><strong>Objectives</strong></td>
            <td>To check existing OSS technology for use by the public sector</td>
        </tr>
        <tr>
            <td><strong>Scope</strong></td>
            <td>Regional, International</td>
        </tr>
        <tr>
            <td><strong>Budget</strong></td>
            <td>1,7 million &euro;</td>
        </tr>
        <tr>
            <td><strong>Funding</strong></td>
            <td>Public (mix)</td>
        </tr>
        <tr>
            <td><strong>Achivements</strong></td>
            <td>The use of OSS by public administrations in the region has proved  that there are significant benefits for them and that OSS can be part of  cost-effective and viable solutions when all medium- and long-term  factors have been taken into account.</td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<a name="section-0"></a>
<h2>Introduction<br />
&nbsp;</h2>
<p>In 2008, a common proposal from the University of Applied Sciences in  Vaasa and the Ume&aring; University received funding from the  Botnia-Atlantica Interreg programme (which supports cross-border  cooperation in the Nordic countries) and local administrations to create  a common Open Kvarken project that would foster the use of OSS by  public administrations.</p>
<p>The objective of this project is to check existing OSS technology for  the use of public administrations. The scope of the project covers  public administrations in the Kvarken region.</p>
<p>The project has shown significant success in the direction of  increased awareness on OSS towards the public sector. This was made  possible by continuous dissemination through workshops and handouts, in  parallel to the examination of OSS products for use by the public  sector. The result is adoption of OSS by the public sector in several  municipalities in the region, which has become a case to be studied for  wider adoption as well. The Open Kvarken project has shown that there  are significant cost savings in the use of OSS when taking into account  all affected cost factors: procurement costs, operational costs, and  also hardware costs and the effect of the support services that do not  need to be imported.</p>
<a name="section-1"></a>
<h2>Organization and background<br />
&nbsp;</h2>
<p>The main objective of Open Kvarken is to bring Open Source solution  alternatives to the public sector. The private sector is also encouraged  to offer support for Open Source solutions in the public sector. The  interest in sharing software between different authorities is growing  and the ownership of the source code by the public sector can provide  significant savings. This way the public sector only needs to buy  services to adapt the source code to its specific needs. According to  the Project Manager of the Finnish crew Rainer Lytz, &ldquo;Here the Open  Kvarken project can offer information and change of attitudes in our own  regions&rdquo;.</p>
The Open Kvarken project (Kvarken is the name of the archipelago between Sweden and Finland) is funded by <a href="http://www.botnia-atlantica.eu/default.asp?lid=1" class="external-link">Botnia-Atlantica</a>
<p>and local authorities in Sweden and Finland.</p>
<p>Lead partner in the project is the <a href="http://www.puv.fi/en/" class="external-link">Vasaa University of Applied Sciences</a> (VAMK), Finland in collaboration with the <a href="http://www.umu.se/english/?languageId=1" class="external-link">Ume&aring; University</a>, Sweden.</p>
<p>The project aims to advance the cooperation and development in the  Kvarken region and the two universities in particular. A significant  incentive is the increased interest in moving to OSS and other work in  progress, especially on Open Office. One of the objectives of the  project has been to commercialise Open Source projects in the sense that  commercial companies are invited to offer services around OSS-based  solutions. In this direction, part of the project funding (200 000 &euro;)  has been provided to the Open Kvarken project for public tenders.</p>
<p>This Open Kvarken project was based on the Open Source philosophy  from the start.&nbsp; In the project proposal it was stated that all code to  be developed should be licensed under GPL v.2.0. The Vaasa University of  Applied Sciences has had Open Source projects since 2004. The name of  the first project was BIOS &ndash; Business in Open Source. The Open Kvarken  project has tried to help the local Regional Council of Ostrobothnia[<a href="#notes" title="Notes">1</a>]&nbsp;  to adapt an Open Source strategy since they already have an Open Access  strategy for Broadband. The project has developed guidelines for such  an Open Source Strategy but it has not been implemented yet.</p>
<a name="section-2"></a>
<h2>Budget and funding<br />
&nbsp;</h2>
<p>The Open Kvarken project has a budget of 1 700 000 &euro;, which is distributed as follows:</p>
<ul>
    <li>50% comes from the <a href="http://www.botnia-atlantica.eu/default.asp?lid=1" class="external-link">Botnia-Atlantica</a> programme, which is co-funded by the European Regional Development Fund;</li>
    <li>25% from the <a href="http://www.lansstyrelsen.se/vasterbotten/Sv/Pages/default.aspx" class="external-link">V&auml;sterbotten County Administrative Board </a>(in Swedish);</li>
    <li>17% from the <a href="http://www.obotnia.fi/en/d-Regional-Council-of-Ostrobothnia-Regional-Council-of-Ostrobothnia.aspx?docID=306" class="external-link">Regional Council of Ostrobothnia</a>;</li>
    <li>7 % from the <a href="http://www.puv.fi/en/" class="external-link">Vasaa University of Applied Sciences</a>.</li>
</ul>
<p>The project duration is three years, up to August 31, 2011; however,  the project results will remain available after the project completion  through the two competence centres created as part of the project in  Sweden and Finland.</p>
<a name="section-3"></a>
<h2>Summary of technical aspects of Open Kvarken<br />
&nbsp;</h2>
<p>During 2010, Open Kvarken has been testing and evaluating in the form  of subprojects several open source systems that could be considered  beneficial for local companies and municipalities. Some of the most  interesting subprojects that have already been commercialized in  companies and municipalities in both Finland and Sweden are presented  below.</p>
<p>The project examines different OSS tools that can be used by public  administrations. In some cases, there are interrelations between  different software systems (e.g. between the OpenMeetings and the Moodle  platforms); however, in general the tools are standing alone so as to  address different PA requirements.</p>
<ul>
    <li><strong>OpenMeetings</strong> is a web based conference system  that does not require any installation on the computers of the people  using it. It runs on Open Kvarken servers in both Finland and Sweden  that make it available to the public for testing purposes. Currently,  there are approximately 100 organizations on these servers and over 500  users in the test group. JNT[<a href="#notes" title="Notes">2</a>]&nbsp;  has participated in the development of new features and testing.&nbsp;  Commercial versions and support can be bought from JNT and  Mediamaisteri.</li>
</ul>
<ul>
    <li><strong>E-Booking</strong> is a system that aims to handle and  allocate resources within a municipality. The e-Booking system  integrates two different booking systems that handle physical room  resources and human resources. The same OS-tool  (http://www.silverstripe.com/) is used for both applications and they  are developed simultaneously and might have some common reusable  backbone code. Resources are configurable at the department level and  they may be anything, such as conference rooms, playing fields, catering  services, etc. It has been developed for the municipality of Korsholm.</li>
</ul>
<ul>
    <li><strong>Eduvom </strong>is a sub-project in the municipality of  V&ouml;r&aring; where Open Kvarken has designed the complete IT infrastructure  based on Open Source. Using Xen[<a href="#notes" title="Notes">3</a>]&nbsp;  for virtual server, the project also includes Ubuntu as desktop,  OpenLDAP for authentication, NFS (Network File Server) for file sharing,  OpenMeetings for web conferences and virtual classrooms. Eduvom also  include Moodle as E-learning platform linked with OpenMeetings. Zimbra  is used for email, and Joomla! for their Eduvom.fi portal (with LAMP as  base).&nbsp; The Eduvom project is now ready for commercialisation.</li>
</ul>
<ul>
    <li><strong>F&ouml;r&auml;ldram&ouml;tet </strong>(Parents Meetings) is a portal  for communication between teachers and parents. It allows parents to  easily check up happenings, homework assignments, problems etc.  concerning their children in the nursery or school. This project is  developed in Sundsvall by Nordic Peak and has been commercialized in  Sweden. F&ouml;r&auml;ldram&ouml;tet is being used in more than 300 day-care schools in  several municipalities in Sweden and will also be introduced in  Finland.</li>
</ul>
<ul>
    <li><strong>Wigo.SE</strong> is a platform for the documentation of  cultural heritage and corporate storytelling. Wigo is based on MediaWiki  with some new extensions and integration to Facebook. The development  is done together with archaeologist from the V&auml;sterbottens Museum in  Umea.</li>
</ul>
<ul>
    <li><strong>Moodle</strong>, an E-learning platform, is in use in  several Universities introduced to undergraduate education.&nbsp; Moodle in  combination with OpenMeetings is a powerful tool for education purposes.  This concept can be commercialised separately. The County Council in  V&auml;sterbotten has started a number of courses based on Moodle, and one  church (Mariakyrkan) in Ume&aring; is using Moodle for confirmation classes.  Moodle has been introduced in V&ouml;r&aring; for hands-on practical training.</li>
</ul>
<ul>
    <li><strong>Kaltura</strong>, a video solution, was evaluated by Open Kvarken together with the projects MediaCenter and <a href="http://nordicknowledge.net/" class="external-link">NKW</a>.  The video solution has great potentials and it is planned that in  spring 2011 they will continue to develop plug-ins for several platforms  such as Moodle, Drupal, and Joomla. MediaCenter will then be able to  offer this platform for all municipalities within V&auml;sterbotten. The NKW  project is a collaboration project between Vasaa, Bod&ouml; and Ume&aring; that is  currently using the Kaltura installation of Open Kvarken for their video  presentations. Together the two projects aim to create a good video  solution for all parts.</li>
</ul>
<ul>
    <li><strong>WebSurvey </strong>is a web interface and a system for  online surveys and/or data collection. It has also been implemented and  it is in use in Korsholm. Folk, Visitas, Open Eye, Bokl&aring;dan and  OpenGeoTracker are five new open source products, which have been  developed in Ume&aring;.</li>
</ul>
<ul>
    <li><strong>Folk </strong>is a web application that gets the correct  address from the Skatteverkets database for people living in Sweden.  This product is now running in Ume&aring; and it is also used by neighbour  municipalities as a service. It has also been offered to the Kivos  network of more than ten municipalities in the western region of Sweden.</li>
</ul>
<ul>
    <li><strong>Visitas </strong>and <strong>Bokl&aring;dan </strong>are two  new products from the Ume&aring; community, which were released in 2010.  Visitas has the potential to be used in several different areas where  mobile communication is the prime target. More information can be found  at the website of <a href="http://www.digitalaumea.se/en/" class="external-link">Digital Ume&aring;</a>.</li>
</ul>
<ul>
    <li><strong>Open Eye</strong> is a web-based Business Process  Management (BPM) and Business Intelligent (BI) platform licensed under  the GPL v3. The main objective of Open Eye is to provide a high-end BPM  and BI solution that includes reporting and portfolio management, for  any companies at a minimal cost of acquisition and ownership. The  product is developed by Anchor Management.</li>
</ul>
<ul>
    <li><strong>OpenGeoTracker</strong> is the latest product developed  by Omicron. It is a tracking device for the Android platform and a map  server based on Google Maps. It can be used to track any type of object.  In spring 2011, Open Kvarken will present a demonstration for this  product at the homepage of its website.</li>
</ul>
<ul>
    <li>A<strong> cooperative webshop</strong> based on OsCommerce has  been developed in cooperation with Anno.fi.&nbsp; This program is now  available for commercial use.&nbsp; Coming soon to <a href="http://www.sf.net/" class="external-link">www.sf.net</a> IPTV pre-study has been done on MythTV and OpenIPTV forum.</li>
</ul>
<ul>
    <li><strong>Webapplet</strong>, a Web applet and tunnelling function, has been developed by Sesca [<a href="#notes" title="Notes">4</a>]&nbsp; in cooperation with JNT and the Open Kvarken project. The tunnelling function is published at the <a href="http://www.kamailio.org/w/" class="external-link">Kamailio&nbsp; </a>[<a href="#notes" title="Notes">5</a>]community and will be adapted to the <a href="http://www.ekiga.org/" class="external-link">Ekiga&nbsp; [</a><a href="#notes" title="Notes">6</a>]community.  This new function will be presented at the project&rsquo;s spring conference  of 2011.&nbsp; The road to make Ekiga a High Definition telepresence tool  with the help of multi-threading passing through all firewall is  shortening from day to day.&nbsp; This can become an affordable telepresence  solution with the help of Aleksander Strange and Reynaldo H. Verdejo  Pinochet at <a href="http://gitorious.org/ffmpeg/ffmpeg-mt" class="external-link">http://gitorious.org/ffmpeg/ffmpeg-mt</a> with the financial support of the Open Kvarken project.</li>
</ul>
<ul>
    <li><strong>Zimbra </strong>is an Open Source webmail server that  will now be implemented in the municipality of Malax. The implementation  is provided by Multitronic in Finland.</li>
</ul>
<ul>
    <li><strong>ZoneMinder </strong>is a web-based surveillance system  and it has been implemented in a local grocery store to suit their  surveillance requirements. It has also been commercialised by  Multitronic as one of their products.</li>
</ul>
There are even more software programs, such as <strong>Idega</strong>, <strong>LifeRay</strong>, <strong>Vtiger</strong>, <strong>SugarCRM</strong>, <strong>Projektet</strong>, <strong>MediaWiki</strong>
<p>etc. that have been tested and some of them may start new interesting projects during 2011.</p>
&nbsp;
<p>Concerning education in Open Source, new courses form part of the  educational program in the University of Ume&aring; and the Vaasa University  of Applied Sciences. The first course in open source was carried out the  summer of 2010 at Ume&aring; University. The next courses are planned for  spring 2011. Open Kvarken has also written an ABC-Guide for Open source  that is available at the project&rsquo;s homepage. This guide explains in  simple words what open source is. It is planned that 15 ECTS credits[<a href="#notes" title="Notes">7</a>] , which have already been drafted, will be implemented during 2011 in the University of Applied Sciences at Vasaa.</p>
<p>A significant step towards the wider adoption of OSS is the  facilitation of the installation process through standardised packaging.  OpenMeetings is already available as a Debian package for i386 and  amd64 processor hardware architectures for the Debian Squeeze  distribution. Following the usual practice in OSS, two versions of  OpenMeetings have become available, the stable version and the latest  version. The stable version is intended for regular users, while the  most recent version is intended for people who want to contribute in the  development of OpenMeetings by testing the newest version for bugs and  new functionality. The testing version is build daily against the  current trunk version of OpenMeetings.</p>
<a name="section-4"></a>
<h2>Licensing issues<br />
&nbsp;</h2>
<p>The Open Kvarken project has evaluated open source projects that are  available under a wide spectrum of open source licenses. However, all  software developed through a public tender procedure initiated by the  Open Kvarken project is required to be licensed under GNU General Public  License (GPL) or the GNU Lesser General Public License (LGPL)[<a href="#notes" title="Notes">8</a>].&nbsp;  The use of a copyleft license such as GPL or EUPL strengthens the open  source dimension of the software created with the support of the  project.</p>
<a name="section-5"></a>
<h2>Cooperation with other public bodies and the community<br />
&nbsp;</h2>
<p>The Open Kvarken project was welcome by several local municipalities,  which are represented in the project&rsquo;s steering group and support the  evaluation of new OSS solutions presented by the project.</p>
<p>The following list presents some of the public administrations that have already used the results of the Open Kvarken project:</p>
<ul>
    <li>Municipality of V&ouml;r&aring;;</li>
    <li>V&auml;sterbottens Museum in Ume&aring;;</li>
    <li>County Council in V&auml;sterbotten;</li>
    <li>Mariakyrkan church in Ume&aring;;</li>
    <li>Municipality of Korsholm.</li>
</ul>
<p>The project is also in contact with the <a href="http://www.coss.fi/" class="external-link">Finnish Centre for Open Source Solutions</a>.</p>
<p>The use of the findings of the Open Kvarken project by the  abovementioned public administrations has shown that Open Source  Software can be expected to result in significant benefits for the  public administration and the community in general. As noted in the Open  Kvarken video[<a href="#notes" title="Notes">9</a>]  , OSS can support efficient IT solutions when factors such as the  reduced cost of ownership and related services, the support to local  economy and the benefits from the increased life expectancy of computer  hardware.</p>
<p>&nbsp;</p>
<a name="section-6"></a>
<h2>Dissemination activities<br />
&nbsp;</h2>
<p>The Open Kvarken project evidently considers that in order to raise  awareness it is necessary to be in continuous contact with all  stakeholders. In this direction, the project organised 12 seminars[<a href="#notes" title="Notes">10</a>]&nbsp;  and 3 workshops in only three years of operation. In addition, it  received significant media coverage and managed to get prime time in  Finnish TV news and in several newspapers.</p>
<p>On the project&rsquo;s website home page a spot from the YLE FST[<a href="#notes" title="Notes">11</a>]&nbsp; news program about Open source and Open Kvarken can be found.</p>
<p>One of the main objectives of the Open Kvarken project is changing  attitudes towards the use of OSS in the public sector. For this reason,  the project has created handouts regarding open source in general and  also about open source licenses. They have also created handouts for OSS  that can replace common proprietary software solutions. All these  handouts are available at the project&rsquo;s website[<a href="#notes" title="Notes">12</a>].</p>
<p>In addition to the activities organised by the project, Open Kvarken  made a presentation in the OSOR/ePractice co-organised workshop on &ldquo;Open  Source: Its place in a cross-border environment&rdquo; before an audience of  more than 50 ePractice members from all around Europe.</p>
<p>&nbsp;</p>
<a name="section-7"></a>
<h2>Evaluation</h2>
<p>The project has not yet finished, and there is no public evaluation  yet available. However, there certain findings already have been  identified, which are presented below.</p>
<a name="section-8"></a>
<h3>Lessons learnt</h3>
<p>The use of OSS by public administrations can bring significant cost  savings if one tries to observe the global picture. An aspect influenced  from the use of OSS is the effect OSS use has on the necessary  hardware. In the YLE-FST news program on Open Kvarken, Kenneth Nickull  from the V&ouml;r&aring;-Maxmo municipality says[<a href="#notes" title="Notes">13</a>]:&nbsp;  &ldquo;Just because a computer is too old to run Windows doesn&rsquo;t mean it  can&rsquo;t be used to run Linux&rdquo;. Longer hardware life means reduction in  hardware costs, which adds up to the cost savings that are expected from  the use of OSS instead of proprietary software.</p>
<p>According to Rainer Lytz, the following are some of the main lessons learned:</p>
<ol>
    <li>Open Source is an applied science and perfect for Universities.</li>
    <li>Open Source should be integrated into the curriculum.</li>
    <li>Universities are the perfect place for testing Open Source Software -COSS network.</li>
    <li>IT Students can write their theses about OSS and produce documentation, and translations.</li>
    <li>Universities can test and commercialise mature OSS.</li>
    <li>Universities  can teach local ICT companies how to cooperate with OS Communities  &ndash;Open Tenders (if enterprise driven) and include programmers from  communities on their payroll.</li>
    <li>R&amp;D units at Universities can  help local ICT companies to reuse code and in this way lower development  costs for new software.</li>
    <li>The Universities can help the Public  Sector in writing program specifications and requiring open source  licenses when purchasing software.</li>
    <li>OSS can create local jobs and prevents export of license fees from our regions.</li>
</ol>
<p>Another point made by Mr. Lytz in the abovementioned news program is  that the use of OSS by public administrations creates an ecosystem of  local supporting companies. This means that the cost of support stays  within the region and is not exported.</p>
<a name="section-9"></a>
<h3>Future plans</h3>
<p>The findings of the Open Kvarken project support the inclusion of  Open Source within the Vasaa Applied Sciences University curriculum. In  addition, the experience gained through Open Kvarken is expected to be  useful for the drafting of new similar projects in the same directions.</p>
<a name="section-10"></a>
<h3>Conclusions</h3>
<p>The Open Kvarken project has studied an important number of open  source products for their use by public administrations. According to  the information already made available from its website, the project has  received a warm welcome by several public administrations within the  Kvarken region that have adopted the OSS solutions proposed by Open  Kvarken.</p>
<p>The use of OSS by public administrations in the region has proved  that there are significant benefits for them and that OSS can be part of  cost-effective and viable solutions when all medium- and long-term  factors have been taken into account. Such factors include the reduced  cost of ownership, the procurement of installation, maintenance,  training and operational services at competitive prices from local  service providers, and the benefits from the increased life expectancy  of computer hardware, thus also contributing to the Green Government  initiative.</p>
<p>&nbsp;</p>
<a name="section-11"></a>
<h2>Links</h2>
<ul>
    <li>The <a href="http://www.openkvarken.fi/" class="external-link">Open Kvarken</a> website.</li>
    <li>Ume&aring; Centre of Open Source know-how <a href="http://www.ucoss.se/" class="external-link">UCOSS </a>in Sweden.</li>
    <li>Vaasa Centre of Open Source know-how <a href="http://www.vcoss.fi/">VCOSS</a> in Finland.</li>
</ul>
<p>&nbsp;</p>
<a name="section-12"></a>
<h2><a name="notes"></a>Notes</h2>
<p>&nbsp;</p>
<ol>
    <li><a href="http://www.obotnia.fi/en/d-Regional-Council-of-Ostrobothnia-Regional-Council-of-Ostrobothnia.aspx?docID=306" class="external-link">http://www.obotnia.fi/en/d-Regional-Council-of-Ostrobothnia-Regional-Council-of-Ostrobothnia.aspx?docID=306</a></li>
    <li>Jakobstad Network and Telecom (JNT) is a local telecom provider.</li>
    <li>Xen is an OSS virtualization program for servers (<a href="http://www.xen.org/" class="external-link">http://www.xen.org/</a>).</li>
    <li>&nbsp;Sesca  was an IT company in Vaasa, which has declared bankruptcy, However, as  the software is licensed under the GPL license, Open Kvarken can still  maintain the code they developed.</li>
    <li>Kamailio (formerly OpenSER) is an Open Source SIP Server released under GPL, able to handle thousands of call setups per second.</li>
    <li>Ekiga  (formerly known as GnomeMeeting) is an open source SoftPhone, Video  Conferencing and Instant Messenger application over the Internet.</li>
    <li>European Credit Transfer and Accumulation System (ECTS) see also <a href="http://en.wikipedia.org/wiki/European_Credit_Transfer_and_Accumulation_System ">http://en.wikipedia.org/wiki/European_Credit_Transfer_and_Accumulation_System </a>(retrieved on 2/5/2011)</li>
    <li>More information on the GPL, LGPL and other GNU free software licenses can be found at the GNU website (<a href="http://www.gnu.org/licenses/licenses.html" class="external-link">http://www.gnu.org/licenses/licenses.html</a>).</li>
    <li><a href="http://www.youtube.com/watch?v=Ro5uVH99txw&amp;feature=player_detailpage#t=95s" class="external-link">http://www.youtube.com/watch?v=Ro5uVH99txw&amp;feature=player_detailpage#t=95s</a></li>
    <li>&nbsp;The  last workshop was being held while writing this study. More information  will be shortly presented in the news section of OSOR.</li>
    <li>YLE-FST is the Swedish-speaking programme of the Finnish national broadcasting organisation</li>
    <li><a href="http://openkvarken.fi/?q=content/handouts" class="external-link">http://openkvarken.fi/?q=content/handouts</a></li>
    <li><a href="http://www.youtube.com/watch?v=Ro5uVH99txw" class="external-link">http://www.youtube.com/watch?v=Ro5uVH99txw</a> (retrieved on 29/4/2011).</li>
</ol>
<a name="section-13"></a>
<h2>Acknowledgements</h2>
<p>&nbsp;</p>
<p>This case study was supported by information provided by Mr. Rainer  Lytz, Project Manager of the Finnish crew of Vasaa University of Applied  Sciences.</p>
<p>The opinions expressed in this document are purely those of the  writer and may not, in any circumstances, be interpreted as stating an  official position of the European Commission. The European Commission  does not guarantee the accuracy of the information included in this  document, nor does it accept any responsibility for any use thereof.  Reference herein to any specific products, specifications, process or  service by trade name, trademark, manufacturer or otherwise, does not  necessarily constitute or imply its endorsement, recommendation or  favouring by the European Commission.</p>
</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'OSOR: The more they know the more they share. Introducing Open Source Software communities to Europe\'s public sector ';
	$path = 'software/page/osor-introducing-open-source-software-communities-europe';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<p class="documentDescription"><span id="parent-fieldname-description">             In the early 2000s the European Commission had realized the  potential of open source software and its communities for the public  sector. As the topic gained on importance the Commission launched the  GPOSS portal, which was essentially a source of providing information  regarding open source software for public administrations. Eventually  the GPOSS portal was replaced by another platform, which allowed for  actual cooperation of  projects: OSOR.eu. This platform aimed at  introducing public administrations to open source software and also to  the community dynamics behind the software. It features a variety of  projects and has several partnering websites, which contribute to  further expanding the network.         </span></p>
<dl id="document-toc" class="portlet toc" style="">
    <dt class="portletHeader">Contents</dt>
    <dd class="portletItem">
    <ol>
        <li><a href="#section-0">Introduction</a></li>
        <li><a href="#section-1">Organisation and background</a></li>
        <li><a href="#section-2">Budget and Funding</a></li>
        <li><a href="#section-3">Technical issues</a></li>
        <li><a href="#section-4">Licensing of Open Source Software</a></li>
        <li><a href="#section-5">Project dissemination and user feedback</a></li>
        <li><a href="#section-6">The open source mechanism</a></li>
        <li><a href="#section-7">Cooperation with other communities and platforms</a></li>
        <li><a href="#section-8">Evaluation</a>
        <ol>
            <li><a href="#section-9">Achievements / Lessons learned</a></li>
            <li><a href="#section-10">Future plans</a></li>
            <li><a href="#section-11">Conclusion</a></li>
        </ol>
        </li>
        <li><a href="#section-12">Links</a></li>
    </ol>
    </dd>
</dl>
<div id="parent-fieldname-text"><a name="section-0"></a>
<h2>Introduction</h2>
<p>&nbsp;</p>
<p>The OSOR.eu project started in late 2006 as part of the Interoperable  Delivery of European eGovernment Services to public Administrations,  Businesses and Citizens (IDABC) programme. The Commission and the Member  States (MS) of the European Union realized the need to establish a  &ldquo;platform for exchanging information, experiences and open source  software based code for the use in public administrations&rdquo;. After all,  most public administrations are facing more or less the same issues when  it comes to their software needs, and creating a framework in which  common</p>
<dl class="image-right captioned image-inline">
    <dt><img width="237" height="400" src="../../system/files/images/osor_origin.png" alt="country of origin" title="country of origin" /></dt>
    <dd class="image-caption" style="width:237px">country of origin</dd>
</dl>
<p>interest could be discussed and efforts shared consequently should  benefit all participating parties. As head of the IDABC unit Karel De  Vriendt explains: &ldquo;The origin of the idea was that when open source  became an issue that was occasionally raised within public  administrations, one of the major problems was to have an overview of  what is happening elsewhere.&rdquo; Giving an overview of the subject was  especially important regarding open source software for the public  sector, as traditional support and vending mechanisms did not apply to  this kind of software.</p>
<p>The OSOR.eu platform, which had started as an observatory, eventually  became an important meeting place for public administrations,  developers, businesses and citizens alike. Today, more than 135 projects  feature their software on the OSOR repository, enabling others to  benefit from their developments, while benefiting themselves from the  evolving communities around the products. In total one can search for  approximately 2000 projects through the associated OSOR partners\'  websites that are linked to the repository. As a survey conducted in  early 2010 clearly shows, the OSOR user base is truly international.  Although most participants originate from EU countries, there is also a  substantial number of users from non-EU countries (see chart to the  right).</p>
<a name="section-1"></a>
<h2>Organisation and background</h2>
<p>&nbsp;</p>
<p>Behind the organisation of OSOR stands the European Commission\'s  Directorate General for Informatics. The Commission in 2004 proposed the  IDABC programme, which &ldquo;uses the opportunities offered by information  and communication technologies to encourage and support the delivery of  cross-border public sector services to citizen and enterprises in  Europe, to improve efficiency and collaboration between European public  administrations and to contribute to making Europe an attractive place  to live, work and invest.&rdquo; (IDABC website). The Open Source Observatory  and Repository (OSOR) being one of the activities included in the IDABC  work programme, fits well into the general aim of strengthening  efficiency and collaboration between public administrations.</p>
<p>Before OSOR was established in 2008 the IDABC had already focused on  open source software and its benefits for the public sector. Starting  with the IDA II programme, which was succeeded by the IDABC programme,  the Commission had realized the need for a platform to inform MS about  the use of open source by the public sector. The presumption in the  early 2000s was still that if a public administration needed a custom  solution, it would hire a developer that would do all of the work. The  concept of sharing expertise, efforts and eventually software was still a  relative new and emerging one by the time IDABC launched its GPOSS  (Good Practice in Open Source Software) observatory. As the project  officer of GPOSS Barbara Held explains: &ldquo;Our hypothesis was: The more  they will know about it, the more they will use it.&rdquo; GPOSS as such was  not a repository, where actual software could be shared and communities  established, but a point of information, where licenses were explained,  best practice examples presented and public administrations invited to  participate in open source events.</p>
<p>In the years 2004 and 2005 public administrations slowly started to  realize the benefits of common efforts. &ldquo;People started to work  together. The idea of sharing became much more central&rdquo;, remembers Held.  OSOR in this respect took the GPOSS idea a bit further. The intention  was to create a platform that went beyond information exchange, enabling  people to work together and to form communities. All the information  that was available through GPOSS was transferred to OSOR and in addition  to this an OSS repository added that would allow for sharing and user  contributions. For Held &ldquo;The dream was that people would not only upload  content and other users download this content, but that actual  communities would grow, where people would work together on a European  level.&rdquo; Starting with about 35 projects in the repository, which quickly  found appreciation throughout Europe, the project grew quickly.</p>
<p>Behind OSOR there are a number of people making sure that the content  and the maintenance of the platform is of high quality and updated  continuously, as well as promoting and disseminating it amongst its  target audiences. With regard to the content creation and the technical  aspects of maintaining the platform, amongst other aspects, a consortium  led by Unisys is in charge for OSOR and assures that the project  delivers the expected results.</p>
<table width="301" align="right" class="vertical listing">
    <tbody>
        <tr>
            <th colspan="2">Quick Facts</th>
        </tr>
        <tr>
            <td><em>Project name</em></td>
            <td>
            <p align="justify">OSOR.eu</p>
            </td>
        </tr>
        <tr>
            <td><em>Sector</em></td>
            <td>
            <p align="justify">eGovernment</p>
            </td>
        </tr>
        <tr>
            <td><em>Start date</em></td>
            <td>2006</td>
        </tr>
        <tr>
            <td><em>End date</em></td>
            <td>2010</td>
        </tr>
        <tr>
            <td><em>Objectives</em></td>
            <td>
            <div align="left">&nbsp;</div>
            <p align="left">Creating awareness for open source software amongst European public administrations and help them establish communities.</p>
            </td>
        </tr>
        <tr>
            <td><em>Target group</em></td>
            <td>
            <p>Public sector</p>
            </td>
        </tr>
        <tr>
            <td><em>Scope</em></td>
            <td>International</td>
        </tr>
        <tr>
            <td><em>Budget</em></td>
            <td>&euro; 3,2 Million</td>
        </tr>
        <tr>
            <td><em>Funding</em></td>
            <td>
            <p align="justify">European</p>
            </td>
        </tr>
        <tr>
            <td><em>Achievements</em></td>
            <td>
            <p align="justify">Creation of a vivid open source community with over 130 active projects, and more than one million downloads</p>
            </td>
        </tr>
    </tbody>
</table>
<a name="section-2"></a>
<h2>Budget and Funding</h2>
<p>&nbsp;</p>
<p>The OSOR project is funded by the European Commission, with a budget  of roughly &euro; 3.2 million, which covers the entire project period from  late 2006 until mid 2010. For the development, maintenance and further  development of the technical platform the total cost will be at &euro; 1.4  million by Q3 of 2010. For the content creation and stakeholder  management the project has a budget of roughly &euro; 1.8 million.</p>
<p>Beside the costs of the project, another point that one might raise  is the possible savings that are generated through the shared  development and use of the projects on the OSOR repository. Although the  OSOR team has not done an investigation as to how much those savings  might be as this would be an impossible task within the available  resources, the impact may quite possibly be very high. To illustrate  this, one might look at SEXTANTE, which is a geographic information  system (GIS) software. The cost to develop the software, in terms of  time needed to develop the 101.936 lines of code would amount to roughly  &euro; 2.5 million(For sloccount calculations, please visit <a class="external-link" href="http://www.dwheeler.com/sloccount">http://www.dwheeler.com/sloccount</a>  ). On the one hand, one can assume that this cost has been shared  amongst various public administrations that contributed to the  development, but one may also assume that the number of people that  benefited from actually using the software is substantially higher than  the number of developers and contributors. Even in the case that only  one percent of the 65.000 times that the software has been downloaded  would actually lead to an deployment of the software would mean that 650  public administrations saved up to &euro;2.5 million, by not having to  develop the software themselves. Based on the Gartner survey, the actual  re-use of software is much higher at around 30%, indicating that the  number of administrations that benefit from the software projects is  much higher than the rather pessimistic example above. To mitigate this  number to some extend, one clearly has to see that SEXTANTE is not  purely a custom software and there might be other solutions that can  handle similar tasks for a much smaller price tag (i.e. for the use of  ESRI ArcGIS, one does not have to pay the complete development costs of  the software). It is nonetheless safe to assume that through the reuse  and redevelopment of the software hosted on OSOR, public administrations  or other stakeholders potentially could save substantial amounts of  public money.</p>
<p>At the moment of writing this case study OSOR users have been invited  to participate in a survey, which is intended to give the OSOR team  important feedback. The problem with download statistics is often that a  download does not necessarily correlate with an actual installation of  software at a public administration. It is therefore very hard for the  OSOR team to understand the impact of the project and to provide  concrete numbers about re-use of software. It is presumed that the  survey will give a first insight with regard to the impact of the  project and its reach throughout public administrations across Europe.</p>
<a name="section-3"></a>
<h2>Technical issues</h2>
<p>&nbsp;</p>
<p>When the OSOR website was launched in early summer 2008, the team had  every intention of sticking to a stack of free and open source software  without making too many adaptations themselves. &ldquo;The basic principle  was that we use software that anyone can take and we make this website  with standard software that we change as little as possible&rdquo;, explains  Held. Large parts of the website are build with PLONE, which is a free  and open source content management system (CMS). While offering many  features and being easy to manage, PLONE further has an excellent  security record, which clearly was an important aspect to consider.</p>
<p>Although the team behind OSOR had to tweak the system and learn how  to use it properly at first, there were no major problems over the  years. Issues such as a problem with attributing the right names to  authors were quickly solved, and even one hack attack could be resolved  quickly.</p>
<p>As mentioned before, the content from GPOSS was moved to OSOR in  order to have one platform only that would entail all the information  acquired over the years. The case studies, the news, the events, among  other points, all contributed to making OSOR a website that was both  interesting and relevant for the public sector from the start. The  \'Forge\' or repository that was newly introduced on OSOR might be seen as  the most innovative part of the website, as it was the first of its  kind for public administrations at a European level. Initially 34  projects participated, but the number quickly rose to 135 today. &ldquo;But  altogether almost 2000 projects are searchable and downloadable through  the OSOR site and the partner national forges&rdquo; highlights OSOR project  manager Szabolcs Szekacs.</p>
<a name="section-4"></a>
<h2>Licensing of Open Source Software</h2>
<p>&nbsp;</p>
<p>Licensing has always been an important issue for open source  software. After all, it is important to give clear instructions as to  how a software may be used, how it may be distributed and altered to  name just a few aspects. Furthermore this is especially important for  public administrations that plan to release their development as open  source software, since they might want to make sure that the software  and the work they invested will not be sold by third parties, but  instead be of use to other public administration facing the same issues.  &ldquo;Especially for public administrations it can take very long to decide  for a license for a software&rdquo;, states Szekacs.</p>
<p>Through their legal council OSOR provides projects that are planning  to release their software under an OSS license with the opportunity to  receive legal advice regarding the choice of license. &ldquo;We have done a  lot of work explaining how open source works, and how licensing works&rdquo;,  states De Vriendt. On the one hand there are guidelines on the website  on how to use OSS licenses, which give a good overview of the different  aspects that have to be considered. And on the other hand OSOR also has  contracted a person that is able to provide specific answers to cases  that need more consultation. Although most projects decide for a license  without consulting OSOR, there were several occasions &ldquo;where this was a  problem, and where they wanted some help&rdquo;, explains Szekacs.</p>
<p>Unfortunately from time to time there are still &ldquo;grave errors being  made&rdquo;, which are mostly a result of a &ldquo;lack of knowledge&rdquo;, explains De  Vriendt. On very few occasions, projects just uploaded their content  without any license at all. To prevent this from happening the \'10  principles of using OSOR\' have been established, which give clear  instructions that any software uploaded to OSOR has to be under an open  source software license.</p>
<p>Szekacs mentions the project initiated by the Municipality of Munich,  WollMux, as a good example of how finding the right license is very  helpful for a public administration to publish their project. As the  city needed some legal basis before they wanted to make their custom  OpenOffice.org template tool publicly available, they thought of several  open source licenses. Eventually they realized that the European Union  Public License (EUPL) was the right choice due to its legal implications  and also because it was supported by the European Union. Florian  Schlie&szlig;l from the WollMux project explains: &ldquo;[...] in our opinion this  GPL-like license minimizes the legal risks for public administrations  publishing software as free software. We are pleased to use a license  adapted to European law and knowing a large public body like the  European Commission is behind the licence.&rdquo;</p>
<table class="plain">
    <tbody>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;
            <p align="justify" style="text-decoration: none;"><font color="#4371a9"><font face="Helvetica, sans-serif"><font size="2"><strong>European Union Public Licence (EUPL) V. 1.1</strong></font></font></font></p>
            <p align="justify"><font color="#323231"><font face="Helvetica, sans-serif"><font size="1" style="font-size: 8pt;">The  EUPL is the first European Free/Open Source Software (F/OSS) licence.  The purpose of the EUPL is to encourage a new wave of public  administrations to embrace the Free/Open Source model to valorise their  software and knowledge.</font></font></font></p>
            <p align="justify">&nbsp;</p>
            <p align="justify"><font color="#323231"><font face="Helvetica, sans-serif"><font size="1" style="font-size: 8pt;">EUPL  has been approved as a licence to be used for the distribution of  software developed in the framework of the IDA and IDABC programmes of  the Commission. The licence text is drafted in general terms and can  therefore be used by anybody wishing to release code under an OSS  licence that is adopted to European legal conditions.</font></font></font></p>
            <p align="justify">&nbsp;</p>
            <p align="justify"><font color="#323231"><font face="Helvetica, sans-serif"><font size="1" style="font-size: 8pt;">The  EUPL was created as a result of the IDABC licencing studies. The  publication of this copy-left licence was preceded by an intensive  public consultation process. It was officially adopted by the European  Commission on 9 January 2007. On 9 January 2009, the European Commission  adopted a revised version of the Licence while at the same time  validated it in 22 official languages (EUPL v.1.1).</font></font></font></p>
            <p align="justify">&nbsp;</p>
            <p align="justify"><font color="#323231"><font face="Helvetica, sans-serif"><font size="1" style="font-size: 8pt;">The  EUPL is now available in 22 official EU languages, in respect of the  principle of linguistic diversity of the European Union.</font></font></font></p>
            <p align="justify">&nbsp;</p>
            <p align="justify"><font face="Helvetica, sans-serif"><font color="#323231"><font size="1" style="font-size: 8pt;">For more information on the licence visit</font></font><a title="Introduction to the EUPL licence" class="internal-link" href="./introduction-eupl-licence"><font size="1" style="font-size: 8pt;"> this page.<br />
            </font></a></font></p>
            <p align="justify"><font color="#323231"><font face="Helvetica, sans-serif"><font size="1" style="font-size: 8pt;">To download the text of EUPL licence:</font></font></font></p>
            <p align="justify"><a title="European Union Public Licence (EUPL v.1.1)" class="internal-link" href="./licence-eupl"><font face="Helvetica, sans-serif"><font size="1" style="font-size: 8pt;">EUPL licence<br />
            </font></font></a></p>
            </td>
        </tr>
    </tbody>
</table>
<a name="section-5"></a>
<h2>Project dissemination and user feedback</h2>
<p>&nbsp;</p>
<p>Over the years, the Commission has provided information about OSOR at  many conferences and events relevant to the public sector. Informing  public administration about OSOR was and still is particularly  important, as many stakeholders are still not aware of the potential  advantages of using open source software and participating in open  source communities, instead of purchasing proprietary solutions or  developing non-reusable customized solutions. Both Held and Szekacs  agree that speaking at conferences and creating awareness in this regard  is very helpful. Szekacs further notices that by now OSOR is an  established name in the open source community. However, as most people  working at public administrations are not software developers but  administrators it is even more important to speak to those who &ldquo;aren\'t  yet aware&rdquo;. There are still many public administrations throughout  Europe that have little or no knowledge about open source software and  how it can be particularly useful for the public sector. To address this  problem Szekacs sees two necessary steps. First, it is important to  raise awareness for OSS in the higher levels of governments, such as the  institutions of the European Union. Although already considerable  awareness exists at these levels, members of the Parliament, for  example, are ultimately important information and knowledge broker that  could disseminate OSS knowledge in their home MS. Next to this top-down  approach, Szekacs considers it helpful to investigate if it would make  an impact to organise events together with the governments where those  in public administrations who decide about the acquisition and/or  development of software are invited. This is a very long process that  may not be very rewarding at first, but at least it might make sense to  &ldquo;plant the seed&rdquo;, as he says.</p>
<p>The feedback that the OSOR team gets from the active OSS users in  most cases is positive. Through various conferences and public events,  but as well through the communities on OSOR, it has become clear that  the project is valued and does have an impact.</p>
<p>The projects that are hosted on OSOR and their communities are  another important source of feedback. As projects are not obliged to  report to the website about their contact with the community and their  users, this form of feedback possibly bypasses the team at IDABC.  Eventually the platform is not only a service to those that want to  participate in a community and download useful software applications,  but also for those that want to extend the reach of their developments  and build a community around them. As Victor Olaya who is in charge of  Sextante explains: &ldquo;We get a lot of feedback from users, either directly  via email or through the backtracking system.&rdquo; The GIS software  Sextante, which is a system developed for the forrest management  department of the region of Extremadura, Spain, enables its users to map  out landscapes and generally manage geographic areas by attributing  certain characteristics to specific areas. Olaya on average gets around  15 emails per week, with questions for more functionality or information  about problems with their GIS software. For Sextante this is a very  important aspect of the community. &ldquo;We have many users that test the  software and send us bugs, or sometimes suggestions for improvement.&rdquo;  And he furthers adds &ldquo;It is a very active project.&rdquo; It is difficult for  him to say exactly how many public administrations or other bodies use  the software, but he and his colleague Juan Carlos Gim&eacute;nez frequently  visit conferences and talk to various administrations. This way they  understand that their software in fact finds many users. Although Olaya  assumes that the software is being used &ldquo;world wide, or at least at a  Europe-wide&rdquo;, he knows of roughly twenty public administrations and  several private companies that use the software.</p>
<p>The Municipality of Munich shares this experience for their  self-developed WollMux template tool. Since its publication in 2008, the  tool has been downloaded more than 30.000 times from the OSOR forge.  Although the situation here is the same as far as backtracking the  actual deployments of the tool in public administrations goes, but the  city is very content with the community that is evolving behind the  product. The &ldquo;collaborative testing is great&rdquo;, explains Schlie&szlig;l, as it  helps to &ldquo;improve the overall performance of this tool&rdquo;. Furthermore,  the &ldquo;non-technical aspects of OSOR&rdquo; are of great importance for the  WollMux team: &ldquo;Especially personal meetings and community building  roadshows are a platform for us to advertise the WollMux&rdquo;, highlights  Schlie&szlig;l.</p>
<a name="section-6"></a>
<h2>The open source mechanism</h2>
<p>&nbsp;</p>
<p>To support government services throughout Europe and to allow them to  benefit from open source software is one of the main goals of OSOR.  Anyone participating in the communities or simply acquiring information  from the website can get ideas of how open source software could work at  his or her institution. By offering a framework in which public  administrations can work together and share their experiences, OSOR  brings together an international framework of people that can make their  project visible beyond their communities.</p>
<p>For the project FriKomPort the participation in OSOR has been very  fruitful . After being featured on OSOR, the project received many  requests from various other communities about their course and seminar  management tool that was developed using open source software and  released under GPL license. The project\'s popularity, which was  initially restricted to the Norwegian region of Kongsberg, suddenly  attracted a large audience and received a lot of recognition. It won the  country\'s first Open Source Software Municipality award in October  2009, as well as the Editor\'s Choice award of the website  www.epractice.eu. Furthermore it was presented at the IDABC event at the  Open World Forum in Paris in October 2009. Through OSOR, the project  has reached many people, even beyond Europe, which might not have heard  from the project at all otherwise. The project can be found at the  project section on OSOR.eu (http://www.osor.eu/projects/frikomport),</p>
<dl class="image-right captioned image-inline">
    <dt><img width="399" height="248" src="../../system/files/images/dl_per_month.png" alt="download per month" title="download per month" /></dt>
    <dd class="image-caption" style="width:399px"><br />
    </dd>
</dl>
<p>while the actual code is available for download from frikomport.no,  where developers and anyone who wants to get involved can participate.</p>
<p>The project Sextante has been very successful with over 60.000  downloads from the project website. For the project OSOR initially was  very helpful, as it offered a SVN server where the team could upload  their code and share it with others. Through this, the project  automatically reached out to a large number of potential users  especially from other public administrations. &ldquo;So far it has helped us  quite a bit&rdquo;, explains Olaya. &ldquo;The administrations know OSOR and they  use it. They can go to the website and search for software. Through this  mechanism OSOR has helped us in establishing contacts with  administrations and other groups that need our software.&rdquo;</p>
<a name="section-7"></a>
<h2>Cooperation with other communities and platforms</h2>
<p>&nbsp;</p>
<p>OSOR is partnering with a large number of other portals and forges.  This is an important aspect of the website, as it brings OSOR in contact  with various other initiatives beyond the realm of OSOR. Most of the  partnering platforms and organisations offer similar services as OSOR,  however mostly on a national level. In this respect, OSOR can also be  seen as the link between several national communities, which makes it  easier for them to connect and find each other. On OSOR alone, there are  currently 134 projects where anyone can participate or simply download.  Through the network of national forges there are almost 2000 projects,  all of which can be reached through OSOR. The national forges are all  promoted on OSOR and through the machine translation service of the  European Commission all project descriptions are searchable in English.  This helps fundamentally in extending the national forges outreach and  connects them with a potentially much larger user group.</p>
<p>The national forges featured on OSOR include at the moment:</p>
<ul>
    <li>Adullact (France)</li>
    <li>OpenSource Platform of the digital Austria (Austria)</li>
    <li>Guadalinex forge (Andalucia, Spain)</li>
    <li>Software Repository of the Junte de Andaluc&iacute;a (Andalucia, Spain)</li>
    <li>The Free Knowledge Forge of the RedIRIS Community (Spain)</li>
    <li>forja.linex.org (Extremadura, Spain)</li>
    <li>Morfeo Free Software Community Forge lafarge.cat (Catalonia, Spain)</li>
    <li>ASC &ndash; Ambiente di Sviluppe Cooperativo (Italy)</li>
    <li>Mancom&uacute;n forge (Galicia, Spain)</li>
    <li>COKS (Slovenia) Cenatic (Spain)</li>
    <li>Forxa Mancomun (Spain)</li>
    <li>Softwareboersen (Denmark)</li>
    <li>Friprog (Norway)</li>
    <li>Programverket (Sweden)</li>
    <li>Berlios (Germany)</li>
    <li>COSS (Finnland)</li>
    <li>Tosslab (Italy)</li>
    <li>Technology Transfer Centre of the Spanish Ministry of Public Administration (Spain)</li>
    <li>LISoG (Germany, Austria, Switzerland)</li>
</ul>
<p>For a list of all partners, including those without a forge, please visit: <a title="Partners &amp; Forges" class="internal-link" href="http://www.osor.eu/partners-forges">http://www.osor.eu/partners-forges</a>.  Although there are no contractual obligation between those platforms,  it is this kind of informal cooperation that helps platforms extending  their outreach. After all, it is not about competing with each other,  but about sharing the benefits of common developments.</p>
<a name="section-8"></a>
<h2>Evaluation</h2>
<p>&nbsp;</p>
<a name="section-9"></a>
<h3>Achievements / Lessons learned</h3>
<p>&nbsp;</p>
<p>A problem in many public administration is often that &ldquo;nobody wants  to be the first&rdquo;, explains Szekacs. The OSOR platform, which succeeded  GPOSS, in this regard made a substantial contribution to open source in  the public sector, by showing public administrations throughout Europe  that they are in fact not the first and that others have done &ldquo;it&rdquo;  before successfully. Furthermore &ldquo;we have the big advantage that we are  the European Commission&rdquo; De Vriendt points out, considering that the  institution has a lot of credibility. Many administrations are critical  towards the open source mechanisms of working together with a community  or of sharing software and the fact that the European Commission  supports many of such initiatives has the potential to mitigate  potential fears.</p>
<p>As the recent survey by Gartner, Inc. shows that roughly 50% of OSOR  users visit the platform &ldquo;to keep up to date [as part of my expertise]&rdquo;.  Only 28% of the people that participated in the survey state that  &ldquo;Developing Open Source software is (part of)&rdquo; they daily work, which  indicates that the platform finds wider audiences mainly those that  develop software on a daily basis. 13% of all participants visit OSOR  our of self interest in the topic.</p>
<dl class="image-left captioned">
    <dt><img width="400" height="194" src="../../system/files/images/osor_popularity.png" alt="osor total pages per month" title="osor total pages per month" /></dt>
    <dd class="image-caption" style="width:400px"><br />
    </dd>
</dl>
<dl class="image-inline captioned image-inline">
    <dt><img width="400" height="242" src="../../system/files/images/recommend_osor.png" alt="osor field" title="osor field" /></dt>
    <dd class="image-caption" style="width:400px"><br />
    </dd>
</dl>
<p>Amongst most participants in the study the platform is very  satisfying and the large majority of users (58%) &ldquo;can be seen as  ambassadors&rdquo;, as the study highlights.</p>
<p>&nbsp;</p>
<p>Has OSOR been successful from today\'s point of view? The success of  initiative such as OSOR is difficult to measure, and one has to see that  there are no clear &ldquo;sales targets&rdquo;, as De Vriendt puts it. In terms of  software being used, shared and modified in cooperation OSOR however  could be seen as a success. Initially &ldquo;our main goal was to check if  something like this would be viable&rdquo; De Vriendt further states. &ldquo;And I  believe yes it is viable.&rdquo; The community behind OSOR is growing, and  many of the projects featured on OSOR benefit from working together with  a community of other public administrations.</p>
<p>According to Szekacs, there are several aspects, which can contribute  greatly to the success of a platform such as OSOR. On the one hand it  is necessary to have a good team of experts involved from the start, to  be able to assist others and to establish a platform that offers  relevant information to public administrations. Next to this it is  absolutely important to have stakeholder involvement early in the  project. Considering that a community like OSOR lives from its  participants, active participation and involvement are essential for the  success of a platform. Having an active community, where most people  not only download but also contribute content and generate discussion is  therefore one of the aspects that will have to improve in the future.  According to Szekacs OSOR indeed has faced quite some challenges in  &ldquo;launching active, vivid communities on OSOR.eu&rdquo;, which is one of the  main points where the team would like to show improvement in the future.</p>
<p>OSOR in Numbers:</p>
<table class="plain">
    <tbody>
        <tr>
            <td>&nbsp;Total projects</td>
            <td>148</td>
        </tr>
        <tr>
            <td>Registered users</td>
            <td>&nbsp;1959</td>
        </tr>
        <tr>
            <td align="left">Project downloads</td>
            <td>&nbsp;150512</td>
        </tr>
        <tr>
            <td>Bug reports</td>
            <td>&nbsp;3515</td>
        </tr>
        <tr>
            <td>Commits</td>
            <td>&nbsp;21509</td>
        </tr>
        <tr>
            <td>Code contributors</td>
            <td>&nbsp;135</td>
        </tr>
        <tr>
            <td>Mailing list messages</td>
            <td>&nbsp;6900</td>
        </tr>
        <tr>
            <td>News items</td>
            <td>&nbsp;602</td>
        </tr>
        <tr>
            <td>Case studies</td>
            <td>&nbsp;70</td>
        </tr>
    </tbody>
</table>
<a name="section-10"></a>
<h3>Future plans</h3>
<p>&nbsp;</p>
<p>&ldquo;We have started something, and we have positive feedback from the MS  as well as from the users, but there\'s still a lot ahead&rdquo; states  Szekacs. According to the Gartner survey, the news section as well as  information concerning events and conferences are perceived as the best  functionality of the OSOR platform. The functionalities that are  considered relatively less useful are the uploading function for Open  Source project and the tools collaboration tools for developments of  projects. For Schlie&szlig;l, especially the last point is one main drawback:  &ldquo;We do not use the limited features for source code sharing via version  control systems. The offered solutions CVS and SVN are outdated and not  the best choice for collaborative developments.&rdquo; For the OSOR team, more  attention will have to be payed to those functionalities that are  considered less useful.</p>
<p>Another important question is in which direction OSOR will go  regarding the dimensions of the repository and the impact it should  have. &ldquo;I always have the feeling we could do better&rdquo;, says Szekacs.  Comparing to large repositories such as SourceForge, where hundreds of  thousand projects are featured, OSOR is a very small project also  because of its orientation towards public administrations. Due to its  specific focus, this will most likely always be the case. As mentioned  earlier, OSOR does not want to compete with other platforms, but offer a  framework specifically for public administrations. For public  administrations it is important not to face a jungle of irrelevant  software applications before they find the right solutions for their  specific needs. De Vriendt adds &ldquo;It\'s not about having as many projects  as possible, it\'s about having good software.&rdquo; Finding a way to attract  larger numbers of projects to participate in OSOR, possibly through  informal cooperation with non-European platforms, while managing to keep  a balance between quantity and quality will be one of the points the  IDABC will address in the near future.</p>
<p>For this it will also be important to encourage and engage with the  users and projects that are already a part of the OSOR community. To  address this issue of lacking stakeholder involvement, Szekacs thinks of  two possible starting points: &ldquo;There may be some part of the problem  which can be solved by providing better technical support, such as  notification features, but in order to increase the activity of  communities we will need to rethink our strategy.&rdquo;</p>
<p>Generally OSOR wants to contribute to changing the image of open  source software and its working mechanisms for the better. Many public  administrations are still not convinced or aware of the advantages that  open source can have for their organisation. &ldquo;We must come to a  situation where we can demonstrate that working together and sharing the  results of that work is an effective and efficient way to establish  public services&rdquo;, says De Vriendt. To achieve this OSOR will have to  concentrate more on disseminating the project, and emphasise the  community creation aspects, which are essential for an open source  environment.</p>
<p>&nbsp;</p>
<a name="section-11"></a>
<h3>Conclusion</h3>
<p>&nbsp;</p>
<p>OSOR reflects well, how the European Commission and the European  Member States have realised the potential of changing attitudes in  software development. Where in the early 2000s public administrations  were still very much focused on developing a product by themselves and  for themselves, this is slowly changing towards the notion of sharing  and cooperating. OSOR in this regard takes an important position,  showing public administrations throughout Europe that they are indeed  not the first to consider open source software and community  participation for their software needs. The success stories, of which  there are many, clearly illustrate that old pattern of thinking might be  revised, as free and open source software has the potential to provide  more freedom, more custom functionality, while often being more economic  in financial terms. It is nevertheless important for OSOR to focus  stronger on active community building amongst public administrations, as  this appears to be the main shortcoming of the project.</p>
<p>In the future, one will have to see if the demand for open source  solutions and the acceptance of open source working mechanisms will  continue to grow in the public sector. OSOR certainly has the potential  to take a central position, linking various national initiatives and  bringing open source in public administrations on agendas of decision  makers throughout Europe.</p>
<a name="section-12"></a>
<h2>Links</h2>
<p>&nbsp;</p>
<ul>
    <li><a title="Partners &amp; Forges" class="internal-link" href="http://www.osor.eu/partners-forges">OSOR: Partners &amp; Forges</a></li>
    <li><a class="external-link" href="http://ec.europa.eu/idabc/">IDABC programme</a></li>
    <li><a class="external-link" href="http://ec.europa.eu/dgs/informatics/index_en.htm">European Commission: Directorate-General for Informatics (DIGIT)</a></li>
</ul>
<p>&nbsp;</p>
<p>This case study is brought to you by the Open Source Observatory and  Repository (OSOR), a project of the European Commission\'s IDABC project.</p>
<p>Author: Gregor Bierhals, <a class="external-link" href="http://www.merit.unu.edu/">UNU-MERIT</a></p>
<p>This study is based on interviews with Szabolcs Szekacs, OSOR project  officer at IDABC, Karel De Vriendt, IDABC unit head, and Barbara Held,  OSOR/GPOSS project officer until mid-2008. Additional information has  been provided by Victor Olaya from the Sextante project, and Florian  Schlie&szlig;l from the Municipality of Munich\'s WollMux project.</p>
</div>
<p>&nbsp;</p>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Norwegian Mapping Authority ';
	$path = 'software/page/norwegian-mapping-authority';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<p class="documentDescription"><span id="parent-fieldname-description">             </span><strong><span id="parent-fieldname-description">The Norwegian Mapping Authority (Statens Kartverk) is the  central organisation for the provision of mapping images to most public  bodies and organisations in Norway.  After experiencing a vast increase  in requests for their services in 2006 and 2007, the Mapping Authority  also had to deal with an increasingly overstrained IT infrastructure.  The licenses for their infrastructure however were very costly, and  acquiring additional licenses would only increase the financial burden  consistently in the future. The Mapping Authority therefore chose to  employ an IT infrastructure based on open source software solutions,  which were free of licensing costs and which proved to be much better,  performance wise. In the process of introducing the new IT  infrastructure, the team had to build up own expertise in order to  maintain a functioning system. With the help of online communities, this  has been a great success for the Mapping Authority.         </span></strong></p>
<dl id="document-toc" class="portlet toc" style="">
    <dt class="portletHeader">Contents</dt>
    <dd class="portletItem">
    <ol>
        <li><a href="#section-0">Introduction</a></li>
        <li><a href="#section-1">Organisation and background</a></li>
        <li><a href="#section-2">Budget and funding</a></li>
        <li><a href="#section-3">Technical issues</a></li>
        <li><a href="#section-4">Change management</a></li>
        <li><a href="#section-5">Cooperation with other public bodies and the online community</a></li>
        <li><a href="#section-6">Evaluation</a>
        <ol>
            <li><a href="#section-7">Achievements / Lessons learned</a></li>
        </ol>
        </li>
        <li><a href="#section-8">Conclusion</a></li>
        <li><a href="#section-9">Links</a></li>
    </ol>
    </dd>
</dl>
<p><a title="IDABC_case-study_Norwegian Mapping Authority.odt" class="document doc" href="../../system/files/doc/IDABC-case-study-Norwegian Mapping Authority-final-version.odt">IDABC_case-study_Norwegian Mapping Authority.odt</a></p>
<p><a title="IDABC_case-study_Norwegian Mapping Authority.pdf" class="document pdf" href="../../system/files/doc/IDABC-case-study-Norwegian Mapping Authority-final-version.pdf">IDABC_case-study_Norwegian Mapping Authority.pdf</a></p>
<p><a name="section-0"></a></p>
<h2>Introduction</h2>
<p>&nbsp;</p>
<p>In 2006 and early 2007, the Norwegian Mapping Authority (Statens  Kartverk) experienced a strong increase in requests of WMS (Web Map  Service) and other geographic information, due to its participation in  the Norway Digital initiativ</p>
<dl class="image-right captioned">
    <dt><img width="200" height="181" src="../../system/files/images/image_mini.jpeg" alt="&copy; Norwegian Mapping and Cadastre Authority, 2009." title="&copy; Norwegian Mapping and Cadastre Authority, 2009." /></dt>
    <dd class="image-caption" style="width:200px">&copy; Norwegian Mapping and Cadastre Authority, 2009.</dd>
</dl>
<p>e. The Norway Digital initiative started in January 2005 and aimed at  strengthening cooperation and exchange of information across more than  600 mostly public bodies and institutions. Especially the fisheries  sector, but also other governmental bodies realized the b</p>
<p>enefits of using WMS for their work, resulting in the vast increase  of WMS requests. As a result of this increased use the Mapping Authority  also experienced increasing system breakdowns, since the IT  infrastructure could not cope with the large amount of information that  was requested. To cope with the growing demand for its services the  Mapping Authority therefore had to decide whether they wanted to  purchase additional software licenses or to become independent from  proprietary licenses and to invest in alternative open source  infrastructure. After thorough consideration, the team finally decided  to run both, the proprietary and the open source systems in parallel, in  order to test the capabilities of the open source infrastructure. The  results of this test provided evidence that the open source  infrastructure was not only considerably cheaper, but that it was also  much more reliable, and gave them independence from a vendor.</p>
<table width="301" align="right" class="vertical listing">
    <tbody>
        <tr>
            <th colspan="2">Quick Facts</th>
        </tr>
        <tr>
            <td><em>Project name</em></td>
            <td>
            <p align="justify">Norwegian Mapping Authority</p>
            </td>
        </tr>
        <tr>
            <td><em>Sector</em></td>
            <td>
            <p align="justify">eGovernment</p>
            </td>
        </tr>
        <tr>
            <td><em>Start date</em></td>
            <td>Late 2007</td>
        </tr>
        <tr>
            <td><em>End date</em></td>
            <td>ongoing</td>
        </tr>
        <tr>
            <td><em>Objectives</em></td>
            <td>
            <div align="left">&nbsp;</div>
            <p align="left">Switch to an open source based IT infrastructure for the geographic mapping services</p>
            </td>
        </tr>
        <tr>
            <td><em>Scope</em></td>
            <td>National</td>
        </tr>
        <tr>
            <td><em>Budget</em></td>
            <td>No dedicated budget. Generated saving of over EUR 250.000</td>
        </tr>
        <tr>
            <td><em>Funding</em></td>
            <td>
            <p align="justify">National</p>
            </td>
        </tr>
        <tr>
            <td><em>Achievements</em></td>
            <td>
            <p align="justify">Stable and cost efficient open source infrastructure</p>
            </td>
        </tr>
    </tbody>
</table>
<p><a name="section-1"></a></p>
<h2>Organisation and background</h2>
<p align="left">The Norwegian National Mapping Authority is Norway\'s  main organisation when it comes to the collection and distribution of  geographic information and mapping material. About 50 percent of the  work at the Mapping Authority focuses on the operational and  distributional services and mechanisms, serving the Fishing department  and other official departments in Norway. The other 50 percent of their  work relate mostly to standards, such as ISO, in order to assure that  the Mapping Authority\'s output complies with other organisations and  agreed standards.</p>
<div align="left">&nbsp;</div>
<p align="left">In January 2005, about 600 organisations and partners  came together to form the \'Noway Digital\' initiative. &ldquo;\'Norway Digital\'  is a nation-wide program for co-operation on establishment, maintenance  and distribution of digital geographic data. The aim is to enhance the  availability and use of quality geographic information among a broad  range of users, primarily in the public sector&rdquo;. Erland <font color="#000000"><font face="Times, Times New Roman"><font size="3">R&oslash;ed</font></font></font>,  department manager at the Mapping Authority, further elaborates: &ldquo;[...]  all the municipal authorities, directorates, ministries, the police, or  the armed forces are collaborating in the Norway Digital collaboration.  The principle there is that one signs an agreement stating that \'I will  take part and offer all my data to the collaboration\'. And thus one  gets access to all the other partners\' data.&rdquo; By sharing all the  information collected by the various partners, the allocation of data  has become much more efficient and the data range much more extensive.  This also explains the need of standard compliance, as all the partners  have to be able to access and use the information that is being provided  amongst the partnership.</p>
<div align="left">&nbsp;</div>
<p align="left">Through the participation in Norway Digital, the amount  of WMS (Web Map Services) requests has increased dramatically. Where in  2007 already about 50.000 map images were requested on an average day,  this has increased to roughly 300.000 in 2009, tendency rising.</p>
<p><a name="section-2"></a></p>
<h2>Budget and funding</h2>
<p align="justify">The Norwegian Mapping Authority is funded by the  national government of Norway. Although there is no dedicated budget for  the IT infrastructure, as the main priority is to have an efficient and  functioning system, the national government encourages publicly funded  bodies to reduce IT costs by using free and open software, where this is  possible.</p>
<dl class="image-right captioned">
    <dt><img width="164" height="200" src="../../system/files/images/roed.jpeg" alt="Erland R&oslash;ed. Department manager at the Norwegian Mapping Authority &copy; Erland R&oslash;ed, 2009." title="Erland R&oslash;ed. Department manager at the Norwegian Mapping Authority &copy; Erland R&oslash;ed, 2009." /></dt>
    <dd class="image-caption" style="width:164px">Erland R&oslash;ed. Department manager at the Norwegian Mapping Authority &copy; Erland R&oslash;ed, 2009.</dd>
</dl>
<p align="justify">In the years before 2007, the Mapping Authority paid  annual licensing fees to the software provider ESRI. These were  relatively expensive and with the increasing amount of data requests,  the Mapping Authority either had to purchase additional licenses or had  to find more economical solutions, which would cope with the  requirements equally well and would not undermine the quality of  services provided. With an eye on the future, the team in charge of the  IT infrastructure at the Mapping Authority realized that the financial  burden of this would eventually become larger and larger. &ldquo;To keep up  with the escalation of use, we would have to buy even more licenses&rdquo;  says <font color="#000000"><font face="Times, Times New Roman"><font size="3">R&oslash;ed</font></font></font>.</p>
<p align="justify">In late 2007 the team started to implement an  infrastructure based on open source software in parallel to the  proprietary software based one already in place. At first, this was not  public and just for internal testing purposes, but after three month of  testing the solution went live and replaced the proprietary solution.  After a year of use, the team was more than happy to see that they had a  stable solution that was not only much better performance-wise, but  also much more economic in financial terms. &ldquo;We estimated that we saved  about EUR 250.000 in 2008 by avoiding purchasing additional licenses  from ESRI&rdquo;, highlights <font color="#000000"><font face="Times, Times New Roman"><font size="3">R&oslash;ed</font></font></font>. And as the amount of use had steadily increased over the year, this sum would have doubled or even tripled in 2009, <font color="#000000"><font face="Times, Times New Roman"><font size="3">R&oslash;ed</font></font></font> further states.</p>
<p align="justify">Of course the Mapping Authority also had to make some  investments for the new infrastructure. Especially the building up of  in-house expertise was essential for this project, as there was no more  any external service provider who the team could contact if there was a  problem. The Mapping Authority therefore hired a new member of staff to  fill this skill gap. In addition, the team that has been involved in the  project was sent to conferences and learning workshops, in order to  strengthen the knowledge within the whole team. Even though this  involved some financial investments as well, the amount of money spent  on this was considerably lower compared to the software licenses that  would have had to be purchased if the team would have decided to stay  with the proprietary solution.</p>
<p><a name="section-3"></a></p>
<h2>Technical issues</h2>
<p align="left">The main task of the Mapping Authority is to provide  maps whenever a partner organisation needs one. This process is largely  automated, so all requests happen online through the database system.  The Mapping Authority does not only have to provide the map, but also  complementary information requested by the respective partners. Those  complementary information might be the location of ships, weather  circumstances, or national preservation areas, for example. At this  point, the Mapping Authority has around 300.000 map images per day  serving different users and different applications that are run by the  partners. &ldquo;For a small country like Norway that is pretty much&rdquo;,  indicated <font color="#000000"><font face="Times, Times New Roman"><font size="3">R&oslash;ed</font></font></font>,  with a hint of pride in his voice. On top of the WMS (Web Map Service)  that are being used most frequently by the partners, the Mapping  Authority also enabled its partners to access maps based on tiles, such  as Google Maps, which speeds up the process of accessing information  significantly.</p>
<div align="left">&nbsp;</div>
<p align="left">To do all this, the Mapping Authority clearly has to  have an IT infrastructure that is efficient with resources and reliable,  as some of the information may be of crucial importance to some of the  partners. The system that had been used until 2007 was based on ArcSDE  and ArcIMS, which are both from ESRI. The main problem with this system  was, that it had frequent breakdowns and generally was not able to cope  with the increasing use. So, for the Mapping Authority &ldquo;It was either  doubling the number of licenses for ArcIMS or to abandon it and  replacing it by free and open source software&rdquo;, recalls <font color="#000000"><font face="Times, Times New Roman"><font size="3">R&oslash;ed</font></font></font>.</p>
<div align="left">&nbsp;</div>
<p align="left">Corresponding to this situation, the team chose to  employ Linux RedHat and several other open source products, such as  PostgreSQL, PostGIS, and Mapserver. The BAAT in the following chart  stands for user (B), authorisation (A), authentication (A), and counting  (T). The system allows the Mapping Authority to give the right  information to the right partner, and to control system resources  efficiently.</p>
<p>&nbsp;</p>
<p align="left">The system can only be accessed by the member  organisations of the Norway Digital co-operation. To make sure that no  one else has access to the system, the <em>gatekeepers</em>, which were  developed on Tomcat, enable user access control. In a case of an  emergency, they also allow the Mapping Authority to give certain  partners priority over others, i.e. when a ship is missing and the port  authorities have to make full use of the system. The <em>proxies</em>,  which are all running on Apache, can be understood as the frontier  between the internet and the local network at the Mapping Authority.</p>
<div align="left">&nbsp;</div>
<p align="left">On the right side of the chart at the image below, the <em>cache</em> produces the tiles, which is a fast way of presenting maps, as explained earlier. On the left side of the chart, the <em>interceptors</em>  check if &ldquo;you have your ticket&rdquo;, explains R&oslash;ed. In other words, they  control the user rights one has for the accessing of data. Once user  rights have been established, the interceptors allow one to the <em>balancers</em>, which make sure that the <em>Mapserver </em>is not overburdened. The Mapserver then lets one access the maps requested from the <em>database </em>(<em>DB</em>).</p>
<div align="left">&nbsp;</div>
<p align="left">With some few exceptions, the system is running almost  entirely on open source software. Contrary to many fears, the Mapping  Authority has hardly encountered any problems since the infrastructure  went live. Considering the breakdowns that were occurring almost on a  daily basis with the previous system, this has been a great success for  the Mapping Authority. The open source environment manages to cope with  the constant increasing of requests seemingly without problems.</p>
<div align="left">&nbsp;</div>
<p align="left">The new environment also has an effect on standard  compliance. Whereas the ESRI solutions and most other proprietary  software only complied with ISO and OGC (Open Geo Consortium) standards  to some extent, &ldquo;the open source software gives the possibility to  fulfil the standard 100%&rdquo; says <font color="#000000"><font face="Times, Times New Roman"><font size="3">R&oslash;ed</font></font></font>.  By using Web Map Service, which complies with all these standards, the  Mapping Authority makes sure that all the other partners in the Norway  Digital co-operation can access the mapping images without difficulties.  With regard to the functionality, it also brings several advantages, as  it entails many useful ways to display mapping images on the Internet.  &ldquo;You can put more or less real time information on top of [the maps],  like the AIS [Automatic Identification System] &ndash; real time ship traffic,  weather information, and other information.&rdquo;</p>
<dl class="image-inline captioned image-inline">
    <dt><img src="../../system/files/images/image_large.jpeg" alt="Example of a web mapping image as used by the Mapping Authority &copy; Norwegian Mapping Authority, 2009." title="Example of a web mapping image as used by the Mapping Authority &copy; Norwegian Mapping Authority, 2009." style="width: 421px; height: 314px;" /></dt>
    <dd class="image-caption" style="width:720px">Example of a web mapping image as used by the Mapping Authority </dd>
    <dd class="image-caption" style="width: 720px;">&copy; Norwegian Mapping Authority, 2009.</dd>
</dl>
<p><a name="section-4"></a></p>
<h2 align="left">Change management</h2>
<p align="left">At the start of the project, the Mapping Authority had  only little knowledge of open source software environments. Therefore  they had to find ways to get acquainted with the new system, while they  were still using the old infrastructure. As <font color="#000000"><font face="Times, Times New Roman"><font size="3">R&oslash;ed</font></font></font>  remembers this process &ldquo;We didn\'t have any competence or skills  connected to open source software. But we built it up quite fast and  then we changed the service, and ran a double operation by having the  official deliverance going from the ESRI software, while we tested out  the open source software on the side.&rdquo; Starting in the fall of 2007, the  team ran the systems in parallel for about three to four month until  they felt that the system was fit for the job, and they had gained the  necessary understanding of it.</p>
<div align="left">&nbsp;</div>
<p align="left">At the Mapping Authority usually three people dedicate  their time to the evaluation and distribution of geographic information  and another three people to the technical aspects of the work. For the  introduction of the open source environment, both groups &ldquo;joined forces&rdquo;  and together with a new member of staff who had thorough knowledge of  the operating system and general open source working methods, they  tweaked the system according to their needs. <font color="#000000"><font face="Times, Times New Roman"><font size="3">R&oslash;ed</font></font></font>  explains that acquiring knowledge on open source software was at the  end rather easy and fast: &ldquo;We found a lot of material on the internet.  There are a large number of communities that can help you a lot and  which have already implemented the respective solutions successfully.&rdquo;</p>
<div align="left">&nbsp;</div>
<p align="left">The three most importance improvements for the Mapping  Authority are: performance improvement, cost savings, and the freedom to  change and adapt the software according to their needs- independent  from a software vendor.</p>
<div align="left">&nbsp;</div>
<p align="left">With the previous vendor ESRI it was very difficult to  add custom system functionalities, it could take weeks to get feedback  on a problem or request, and the Mapping Authority could do only little  themselves to fix the system. With the introduction of the open source  solutions, the team was free to adapt the software to their needs, and  they had to find other ways to solve problems. By not relying on a  support partner, one has to take responsibility over the system oneself.  Although this last aspect may be fearful to some, for the team at the  Mapping Authority rather the opposite was the case, as <font color="#000000"><font face="Times, Times New Roman"><font size="3">R&oslash;ed</font></font></font>  explains: &ldquo;This sparks the technician\'s interest. It is a challenge to  him; a possibility to have the total responsibility. You can\'t point to a  company and say \'I can\'t do anything about it, I need support.\'&rdquo; The  new system has been an interesting challenge for the people at the  Mapping Authority to take the responsibility and to have the freedom to  do what they want. &ldquo;Now we really have the possibility to master the  whole thing. And that has been a trigger for our people to do things, to  make things work&rdquo; <font color="#000000"><font face="Times, Times New Roman"><font size="3">R&oslash;ed</font></font></font> further adds.</p>
<p><a name="section-5"></a></p>
<h2>Cooperation with other public bodies and the online community</h2>
<p>The Mapping Authority essentially co-operates on two different levels: with regards to the content (<font color="#000000"><font face="Times, Times New Roman"><font size="3">i.e.</font></font></font>  the information for maps) they stand in close collaboration with the  partners from the Norway Digital initiative. This however had no impact  on the development of the new software environment, as the cooperation  mainly aims at establishing a two-way exchange of geographic  information. Besides the provision of WMS and other information, the  Mapping Authority has shared some of its in-house developments with  other partners within the Norway Digital cooperation. Although most of  these in-house developments are rather specialized on the needs of the  Mapping Authority, other organisations may find themselves in the need  of similar solutions. By employing open source solutions, the Mapping  Authority had the freedom to share any solution they developed without  breaching any license agreements. The government even established the  platform Friprog.no for the exchange of information, experience, and  code amongst organisations and public bodies in Norway.</p>
<p>With regard to the development of the open source system  infrastructure, the Mapping Authority sought the cooperation with the  online communities behind the software solutions they employed. In order  to gain expertise and a clear understanding of the open source software  environments involved they realized that the best way of doing so is by  referring to the online communities, such as OpenGeo. Those  collaborations were extremely helpful, and eventually became the most  important knowledge resource for the team. Compared to the software  vendor that in older times would provided guaranteed support, even if  delayed, the team at the Mapping Authority initially feared that it  might be much harder to rely on the volunteering support provided  through the open source software communities on the web. However,  contrary to this assumption the Mapping Authority\'s experiences so far  has been rather the opposite. With the software vendor that they had  contracted &ldquo;we had weeks of waiting, in the worst case even a month&rdquo;,  remembers <font color="#000000"><font face="Times, Times New Roman"><font size="3">R&oslash;ed</font></font></font>.  Now, with the open source solutions, nobody will give you a guarantee  that you get an answer, but their experience so far has shown that  &ldquo;there\'s always someone to ask, and there has always been an answer from  somebody.&rdquo; And, even better, this usually happens within minutes.  Consequently, the Mapping Authority advices other institutions to take  the risk, as their worst fears of standing alone with a problem have  simply not come true.</p>
<p><a name="section-6"></a></p>
<h2>Evaluation</h2>
<p><a name="section-7"></a></p>
<h3>Achievements / Lessons learned</h3>
<p>&ldquo;We have had only positive experiences with this. It might seem a bit  boasting, but we haven\'t experienced a single setback&rdquo;, states <font color="#000000"><font face="Times, Times New Roman"><font size="3">R&oslash;ed</font></font></font> proudly. The project therefore has been a great success for the Mapping Authority.</p>
<p>As stated before, the three main improvements that the undertaking  brought along were: the cost savings, the improved stability, and the  freedom to adapt the system to their needs. Considering that the  services the Mapping Authority provides are still increasingly requested  , these three points gain in importance continuously. Where the savings  generated by not having to purchase licenses amounted to EUR 250.000  already in 2008, these may well have been doubled again by the year of  2010. The stability plays an equally important role, as more and more  partners relay on the services. By relaying on open source solutions,  the Mapping Authority can ensure that system breakdowns do not hinder  the work of others.</p>
<p align="justify">One more positive aspect of open source solutions is  the ability to share developments and expertise. Any developments that  the Mapping Authority has done themselves can be shared with others,  where this appears useful. The Norwegian government is also trying to  promote the use and the sharing of open source software through the  portal Friprog.no. Through this portal, the government has released a  kind of &ldquo;cook book&rdquo;, as <font color="#000000"><font face="Times, Times New Roman"><font size="3">R&oslash;ed</font></font></font> explains this, where organisations are guided on their way to implementing open source software.</p>
<p align="justify">To conclude, <font color="#000000"><font face="Times, Times New Roman"><font size="3">R&oslash;ed</font></font></font>  says: &ldquo;Just try it, that would be my advice.&rdquo; Although the fear of not  having a support partners may be reasonable, the Mapping Authority has  not encountered any problems in this respect so far. And even if an  organisation is obliged to contract an official support partner, there  are plenty of companies offering just this service.</p>
<p><a name="section-8"></a></p>
<h2>Conclusion</h2>
<p align="justify">The Mapping Authority\'s undertaking to deploy open  source software in the place of proprietary solutions appears to be a  overall a success story. On the one hand the financial benefits are  clearly visible, but perhaps more importantly are the performance  aspects. With the new infrastructure the Mapping Authority has managed  to build up a system that is much more economical and much more reliable  than the previous system. This might be one important aspect learned  from this case study. A lesson learnt that <font color="#000000"><font face="Times, Times New Roman"><font size="3">R&oslash;ed</font></font></font>  likes to share with other organizations is: Just try it. As the fear to  stand alone without any support often becomes a barrier in the  consideration of open source solutions, seeing that it actually can work  without much difficulties is an important lesson.</p>
<p><a name="section-9"></a></p>
<h2>Links</h2>
<ul>
    <li><a href="http://www.statkart.no/Norge_digitalt/Engelsk/About_Norway_Digital/">The Norwegian Mapping and Cadastre Authority</a></li>
    <li><a href="http://www.statkart.no/Norge_digitalt/Engelsk/About_Norway_Digital/">The Norway Digital cooperation</a></li>
    <li><a href="http://www.friprog.no/">Friprog.no</a></li>
    <li><a href="http://opengeo.org/community/">The OpenGeo community website</a></li>
</ul>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'The Swedish National Police: How to avoid locking yourself in while saving money ';
	$path = 'software/page/swedish-national-police';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<p><span id="parent-fieldname-description">In 2006 the Swedish National Police launched a project that  led to the implementation and migration from an ICT  infrastructure  based on proprietary products to an ICT server and database platform  based on Open Source software and open standards. The previous ICT  platform was very costly and obliged the Police to stick with a hand  full of vendors. The aim was therefore to cut costs, avoid vendor  lock-in, achieve better performance, and introduce open standards. Before ideas were realized, a thorough study was conducted to calculate  costs and benefits. This study foresaw cost savings of up to fifty  percent over a five years period  compared to the  proprietary hardware  and software in place at this time, while improving performance at the  same time. Due to the dimensions of this project that affected the entire ICT  infrastructure of the Swedish National Police, it was not always easy to  turn ideas into reality.         </span></p>
<p class="documentDescription">&nbsp;</p>
<dl style="" class="portlet toc" id="document-toc">
    <dt class="portletHeader">Contents</dt>
    <dd class="portletItem">
    <ol>
        <li><a href="#section-0">Introduction</a></li>
        <li><a href="#section-1">Organisation and background</a></li>
        <li><a href="#section-2">Budget and Funding</a></li>
        <li><a href="#section-3">Technical issues</a></li>
        <li><a href="#section-4">Change management</a></li>
        <li><a href="#section-5">Cooperation with other public bodies</a></li>
        <li><a href="#section-6">Evaluation</a>
        <ol>
            <li><a href="#section-7">Achievements / Lessons learned</a></li>
            <li><a href="#section-8">Future plans</a></li>
            <li><a href="#section-9">Conclusion</a></li>
        </ol>
        </li>
        <li><a href="#section-10">Links</a></li>
    </ol>
    </dd>
</dl>
<p><a href="../../system/files/doc/IDABC-case-study-Swedish-Police.odt" class="document doc" title="The Swedish National Police: How to avoid locking yourself in while saving money - ODT">The Swedish National Police: How to avoid locking yourself in while saving money - ODT</a></p>
<p><a href="../../system/files/doc/IDABC-case-study-Swedish-Police.pdf" class="document pdf" title="The Swedish National Police: How to avoid locking yourself in while saving money - PDF">The Swedish National Police: How to avoid locking yourself in while saving money - PDF</a></p>
<p><a name="section-0"></a></p>
<h2>Introduction</h2>
<p>In Sweden, the Swedish National Police Board (SNPB) maintains the IT  infrastructure for the Swedish National Police. It is in this board that  all decisions are centrally made regarding administrative issues  concerning police authorities throughout the country.</p>
<p>Around the year 2000, the former director of Development and  Strategies and his team at the National Police Board, investigated new  possibilities for a more economic and&nbsp; flexible IT infrastructure.  Per-Ola Sj&ouml;sw&auml;rd, who is today executive IT-Strategist at the CIO\'s  office, went to several conferences and eventually realized that &ldquo;we  must have an IT architecture which is not locked to a special vendor.&rdquo;  As the old architecture was comprised solely of proprietary solutions,  the Swedish Police was dependent on specific vendors for the support,  which in turn added high support costs to the already substantial  licensing costs.</p>
<p>In the following years the Police weighed their options searching for  solutions that minimized costs, introduced open standards, increased  the freedom of choice of technology, enhanced the competition between  vendors, and minimized the dependency on one vendor. Eventually the team  in charge of this process established a business case study in early  2006, which concluded that only Open Source Software (OSS) would meet  their demands. After the the National Police Commissioner decided for  the deployment of OSS in November 2007, the CIO\'s office started the  process of implementing the new ICT architecture. In the two years since  the start of the project the CIO\'s office is still positive about the  success of the project, however they also have come to realize that it  takes a lot of work to make a business plan become reality.</p>
<p><a name="section-1"></a></p>
<h2>Organisation and background</h2>
<p>The Swedish National Police Board is the central organisation in the  Swedish national police system. It stands above the 21 police  authorities and the national laboratory of forensic science. As such, it  is in charge of managing the national police budget, and comprises all  important offices for the organisation of the national police services.  For example, decisions on the number of helicopter or police cars  purchases are made in this body, just as decision with regard to the ICT  architecture. The Swedish National Police consists of roughly 27.000  employees, 19.000 of which are police officers.</p>
<table width="301" align="right" class="vertical listing">
    <tbody>
        <tr>
        </tr>
        <tr>
            <th colspan="2">Quick Facts</th>
        </tr>
        <tr>
            <td><em>Project name</em></td>
            <td>
            <p align="justify">Swedish National Police</p>
            </td>
        </tr>
        <tr>
            <td><em>Sector</em></td>
            <td>
            <p align="justify">eGovernment</p>
            </td>
        </tr>
        <tr>
            <td><em>Start date</em></td>
            <td>06-02-01</td>
        </tr>
        <tr>
            <td><em>End date</em></td>
            <td>ongoing</td>
        </tr>
        <tr>
            <td><em>Objectives</em></td>
            <td>
            <p align="justify">Introduction of a back-office Open Source ICT architecture for the National Police</p>
            </td>
        </tr>
        <tr>
            <td><em>Target group</em></td>
            <td>
            <p>ICT administration</p>
            </td>
        </tr>
        <tr>
            <td><em>Scope</em></td>
            <td>National</td>
        </tr>
        <tr>
            <td><em>Budget</em></td>
            <td>N.A.</td>
        </tr>
        <tr>
            <td><em>Funding</em></td>
            <td>
            <p align="justify">National</p>
            </td>
        </tr>
        <tr>
            <td><em>Achievements</em></td>
            <td>
            <p align="justify">Development of a detailed business case study, and first implementation of Open Source ICT infrastructure</p>
            </td>
        </tr>
    </tbody>
</table>
<p>The chief information officer (CIO) Ola &Ouml;hlund is in charge of making  all relevant decisions concerning the National Police ICT  infrastructure backbone. The CIO\'s office is directly connected to the  SNPB and consists of seven staff members, who have a strong technical  background and&nbsp; ensure the Police has a reliable and efficient ICT  system. The office is still relatively new, as it had only gained the  status as a more or less autonomous office within the SNPB about three  years ago. Roughly 600 employees work in the Police ICT department,  which is part of the business development organisation carrying out the  decisions that are made by the CIO.</p>
<p><a name="section-2"></a></p>
<h2>Budget and Funding</h2>
<p>The annual IT-budget for the Swedish National Police is &euro;130 million,  which is administered by the CIO office. Clearly not all of this budget  is dedicated to the implementation of the new ICT architecture, but  also comprises various software licenses as well as hardware purchases  that the Police has to do over the year.</p>
<p>&ldquo;Between 2001 and 2006 we used proprietary products, because an open  source environment was not so common in the beginning. So we tried  proprietary products, but we realized in 2006 that it was too expensive  to go on with that&rdquo;, remembers Sj&ouml;sw&auml;rd. From the servers to the  databases, the CIO office calculated that the costs of continuing to  employ the proprietary solution would amount to &euro;40 million for  licenses, server hardware and support over the years from 2006 to 2011.  At the same time, the team also made calculations for the costs of Open  Source Software and X86 server hardware. They concluded that due to the  competition between support partners for Open Source products, the  prices were considerably lower than comparable support for proprietary  solutions. Additionally, there were also large savings resulting from  using open licenses and moving to X86 server hardware instead of  proprietary hardware. Eventually the team estimated the cost for  employing the new ICT platform for the same period to be only &euro;21  million, which was nearly 50% cheaper than the proprietary counterpart.  To illustrate the impact of this amount, Sj&ouml;sw&auml;rd says it is equivalent  to 400 new police cars, or the salary of 70 new system developers for a  five year period.</p>
<p>The Total Cost of Ownership (TCO) of using Open Source vendors  instead of proprietary vendors has thus been reduced substantially. In a  presentation about the Swedish National Police (See Links section)  Sj&ouml;sw&auml;rd highlights that the cost for the application server amount to  only one fifth (1/5) of the previous solutions, and the cost for the  database only one seventh (1/7) of the price of the proprietary  solution.</p>
<p>Sj&ouml;sw&auml;rd emphasises that the use of standard X86 server hardware was  another factor for cost reduction. &ldquo;If you switch to Open Source  Software, you must also switch to simple, standard X86 server hardware,  because the competition there is much stronger and you have the  possibility to negotiate with hardware vendors.&rdquo; Compared to  non-standardised hardware products sold only by selected companies,  using standard hardware makes it possible to select the best offer for  hardware and support.</p>
<p><a name="section-3"></a></p>
<h2>Technical issues</h2>
<dl class="image-left captioned">
    <dt><img width="320" height="130" title="Swedish National Police 1 new" alt="Swedish National Police 1 new" src="../../system/files/images/image_preview.jpeg" /></dt>
    <dd style="width:320px" class="image-caption">&copy; Swedish National Police, 2009</dd>
</dl>
<p>The SNPB\'s move towards an open ICT server infrastructure went along  with a change of suppliers representing a much larger number of  potential suppliers for the adapted Open Source solutions than has been  the case for the replaced&nbsp; commercial products. Such a diverse range of  potential suppliers has been one of the key aspects for the SNPB to  avoid a vendor lock-in and to allow for competition.</p>
<p>It is important to highlight that the software and hardware migration  only took place on the servers in the data centres, and not at the  client computers. For the local police officers distributed across the  country everything remained the same, and nothing new had to be learned.  Even more so, the desktop PCs at the Swedish Police are still running  on a proprietary operating system. Essentially the implementation of  Open Source Software can therefore be considered a background migration  of which only performance enhancements are felt on the desktop computer.</p>
<p>The migration project has been focusing on the replacement of four  essential parts of the infrastructure: 1) the application server, 2) the  database, 3) the operating system of the servers, and 4) the CPUs  thereof.</p>
<p>The application servers in the previous architecture were BEA  WebLogic Server 8.1. Although the application server did everything the  Police needed at the time, they could already see that it had some  performance limits. More importantly, it was very costly, which was not  sustainable in the long run, especially in the light ofmore economic  solutions that would offer at the same time more capacities. The CIO  office therefore decided to employ the JBoss EAP application server. The  solution only costs a fifth of the price of BEA, and was much improved  in terms of performance. The same holds for the database and the  operating system running on the servers. The database MySQL replaced the  previously deployed Oracle, and Linux SLES by Novell replaced the  operating system HP Unix on the servers. This combination, together with  the new standard X86-based ICT hardware which the Police installed,  gave a clear boost in performance and stability.</p>
<dl class="image-right captioned">
    <dt><img width="308" height="240" title="Swedish National Police 2" alt="Swedish National Police 2" src="../../system/files/images/image_preview_tab.png" /></dt>
    <dd style="width:308px" class="image-caption">Cost comparison between the previous proprietary ICT solution and the new Open Source solution&lt;br /&gt; &copy;Sj&ouml;sw&auml;rd, 2009</dd>
</dl>
<p>To prove this, the CIO\'s office has conducted a benchmark test with  their in-house developed PICTURE software. This software is used by  police officers to search and store passport pictures and other photo  material. Although there are on average about 3,500 daily passport  picture queries, this number can occasionally peak substantially higher.  Whereas BEA only could cope with a maximum of 100.000 queries before  the system slowed down considerably or would no longer work at all, the  new architecture can cope with a number ten times higher, namely:  1.000.000 queries. The reason for this is that the new server and  database environment takes up much less system resources than the  previous system, which at the end boosts performance dramatically. The  improved performance is therefore mostly due to the lightweight  software, and not necessarily linked to a new hardware environment.  Sj&ouml;sw&auml;rd sums up &ldquo;So if you switch to an Open Source system it may not  just be for the cost aspects, it can be for performance also.&rdquo;</p>
<p>Another advantage of working with an Open Source environment is the  fact that it is much easier to find developers and support for the  solutions, because one can choose between many vendors and the number of  people developing in Open Source environments is constantly rising.  Considering that about 70% of the Swedish National Police\'s ICT system  is developed in-house, the importance of this quickly becomes evident.  &ldquo;If you speak with any developer and ask if he wants to use BEA, Oracle,  or if he wants to use JBoss, the answer is always JBoss&rdquo;, explains  Sj&ouml;sw&auml;rd. Finding competent developers and system administrators and  building in-house expertise in this regard is very important, as  proprietary vendors can only support their own solution. So if there is a  problem with an in-house developed application it may take weeks to get  support, or it may not be possible at all, unless there is someone  employed at the Police who can take care of the problem. With the  implementation of the Open Source environment the CIO also invested  &euro;126.000 in staff education for JBoss, MySQL, and Linux SLES to make  sure that the competence is always available in house. Here again, the  CIO\'s office saw the spending in relation to the savings generated from  the implementation: &ldquo;It\'s not a lot of money if you think of what you  can save&rdquo;, as Sj&ouml;sw&auml;rd&nbsp; compares the building of own competence together  with professional open source support if you compare it with  traditional commercial support on proprietary solutions.</p>
<p><a name="section-4"></a></p>
<h2>Change management</h2>
<p>Before the integration of the new software and hardware into the ICT  environment of the Swedish Police, several steps were necessary to make  sure that the whole process was implemented carefully.</p>
<p>Initially, a team of staff members from the ICT department realized  that the ICT environment at the Police would have to change. They were  &ldquo;fed up with the high costs and the vendor lock-in&rdquo; states &Ouml;hlund.  Responding to these impulses, a team of IT specialists surrounding  Sj&ouml;sw&auml;rd started the investigation of a business case study about the  migration towards an Open Source ICT architecture. This study was  finished in October 2006, and became an important document, as it was  the first step in the project. On the one hand it made people realize  the benefits of using an Open Source Software environment and standard  hardware, and it also thoroughly researched what solution would have to  be employed. Following this preliminary study, the National Police  Commissioner formally made the decision to implement the new ICT  infrastructure in November 2006.</p>
<p>The project was divided in two steps: the implementation project, and  the migration project. This division gave the project more structure,  as the both sub-projects are rather substantial projects on their own.</p>
<dl class="image-right captioned">
    <dt><img width="124" height="185" title="Swedish National Police 3" alt="Swedish National Police 3" src="../../system/files/images/image_preview_smb.jpeg" /></dt>
    <dd style="width:124px" class="image-caption">Ola &Ouml;hlund, Chief Information Officer at the Swedish National Police Board &copy; Swedish National Police, 2009</dd>
</dl>
<p>The implementation project started in March 2007. New X86 standard  hardware was bought, together with support and maintenance for the data  servers. &ldquo;We bought around 300 CPUs, and maintenance for the database  MySQL [for around 120 CPUs]. We also bought support for the Linux  operating system for about 300 CPUs, as well as support for around 130  JBoss application servers&rdquo; recalls Sj&ouml;sw&auml;rd. This aspect of the project  however was still relatively easy, considering that nothing from the old  infrastructure was touched at this point. The difficult part at this  stage was to find the right solutions and to install them so they would  function properly. As the team had already acquired a certain level of  expertise and most decisions were well planned, the process of  implementing new software and hardware solutions was relatively  uncomplicated.</p>
<p>After finished the implementation project in December 2007, the  migration project started in April 2009 and was just as large, if not  even larger as the implementation project. As part of this sub-project,  33 legacy systems will eventually be migrated to the new ICT platform,  which is planned to be completed in two years until 2011. The big  challenge&nbsp; in this project is ensuring that the existing ICT  infrastructure works properly with the new ICT environment. According to  &Ouml;hlund this process of migrating existing applications to the new  infrastructure is not always easy. In contrast to the business case, the  CIO is a sees this timeline with less optimism and states a slightly  different aim for the completion of the whole project: &ldquo;somewhere in  2015 we will have realized all the benefits.&rdquo; For &Ouml;hlund it was  important to have a good business case study before the project started,  as this laid a good foundation and convinced other people at the  Swedish National Police Board of the advantages of such an ICT  infrastructure. In practical terms however, he sees that realizing the  plan is a different challenge, to which the CIO office is dedicating  many resources at the moment. On the one hand there is&nbsp; resistance due  to the high costs of such an undertaking. Especially when there is a  delay in the implementation and migration of software and hardware  solutions, this can become a barrier to the project. And on the other  hand, one needs to convince people that such an undertaking is in fact a  necessary step, and that the old infrastructure should be replaced.  There are thus several aspects that can impose barriers to the success  of a project. To put it in &Ouml;hlund\'s words : &ldquo;The change itself is the  main obstacle.&rdquo;</p>
<p>In order to cope with these obstacles, the CIO office had to work on two  fronts: on the one hand it was necessary to talk to people and convince  them of the advantages of the new ICT infrastructure, and on the other  hand they had to find the right solutions, build up expertise, and  implement and migrate the solutions. It this regard it certainly helped  that the team did not rush into the project, but planned every step  carefully. Only by introducing and migrating new software and hardware  step by step, the team could avoid problems on a larger scale, which  would have sparked new criticism. The fact that old software and  hardware can run simultaneously with the new solutions without much  difficulties clearly is of help as well. For &Ouml;hlund to be successful  with such an initiative it is important to integrate it as part of a  larger organisational strategy. &ldquo;It is not a standalone issue that you  try to push forward, rather [&hellip;] it is a part of an IT strategy and a  business strategy&rdquo;, he explains. By disseminating the project in this  way, the acceptance at all levels is much higher, and people are much  less reluctant to accept initial costs and migration processes.</p>
<p>From a financial point of view, although a delay in project  completion does invoke additional costs, the team is still confident of  its benefits. As there is no dedicated budget to the project, but it is  covered under the general CIO budget, the process will not be stopped  once the financial resources are exhausted. The CIO office is still  convinced of the financial benefits that the undertaking will bring  eventually. Although a large share of the ICT budget of the Swedish  Police currently flows into the project, the team is aware that in the  future this flow of money would have been greater had they continued to  use a proprietary platform.</p>
<p><a name="section-5"></a></p>
<h2>Cooperation with other public bodies</h2>
<p>Although the Swedish government is trying to promote the use of Open  Source Software in the public sector, there are not too many examples  where Open Source is used on a similar scale as by the Swedish National  Police. According to &Ouml;hlund and Sj&ouml;sw&auml;rd, there are many public bodies  that use Open Source applications in their daily operations on a small  scale, but the introduction of an Open Source server and database  environment on the scale of the Swedish National Police is unique in  Sweden. As a result of this, the team did not have many partners to  consult. The team had some conversations with Premiepensionsmyndighetens  (PPM) which manages the national premium pension system, and which also  migrated its ICT to an Open Source environment. There was however no  direct cooperation.</p>
<p>In addition to that, there were two important reasons why the Police  did not ask for help from other organisations: One the one hand it was  essential for the Police to develop own expertise, in order to  understand the system thoroughly. The fact that only few organisations  had done a similar undertakings was seen as an opportunity to develop  the knowledge and expertise in house, which is of fundamental help for  the maintenance of the system. On the other hand it was important for  the Police to have a Swedish language environment as well as support for  their ICT infrastructure. This excluded many projects outside of Sweden  as possible partners for coordination.</p>
<dl class="image-right captioned">
    <dt><img width="217" height="320" title="Swedish National Police 4" alt="Swedish National Police 4" src="../../system/files/images/image_preview_smb2.jpeg" /></dt>
    <dd style="width:217px" class="image-caption">Per-Ola Sj&ouml;sw&auml;rd, Executive IT-strategist at the Swedish National Police Board &copy; Sj&ouml;sw&auml;rd, 2009</dd>
</dl>
<p><a name="section-6"></a></p>
<h2>Evaluation</h2>
<p><a name="section-7"></a></p>
<h3>Achievements / Lessons learned</h3>
<p>For the Swedish National Police, the introduction of Open Source  software and standard X86-based server hardware to their ICT  infrastructure, has many advantages. The most important aspects in this  respect are: cost savings, limitation of the vendor lock-in, and the use  of open standards. Considering that the Police is planning on saving  roughly &euro;20 million over a period of five years, the financial incentive  to turn to Open Source Software and standard X86-based server hardware  was high, especially considering the fact the solution is not inferior  to the proprietary solution that was previously used.</p>
<p>For the project team, it was very important to prepare a good roadmap  ahead of the migration project. This helped in setting clear targets  with regard to timelines and technical solutions. As this is often the  case in other project involving a large-scale migration, convincing the  people in charge of an organisation is never easy. In order to manage  this &ldquo;soft migration&rdquo; successfully, as &Ouml;hlund calls it, communication of  the advantages of a new system and disadvantages of the old system is  very important. The business case study in this respect was also of  great help in convincing the Swedish National Police Board that this  migration step was a viable alternative.</p>
<p>While having a clear strategy is of great help to such a project,  &Ouml;hlund also states that it is not always easy to make theory reality.  Moving from a proprietary software environment to a consolidated Open  Source Software environment with standard X86-based server hardware is a  very big undertaking that should not be underestimated. &ldquo;That\'s the  tough part, actually getting things done. And I think we might have some  good insights to share with others&rdquo;, &Ouml;hlund furthers says. After all,  there are not many other organisations that undertook such a large scale  project for the sake of avoiding the vendor lock-in and reducing costs.</p>
<p>For Sj&ouml;sw&auml;rd it is furthermore important to not only focus on  software, but to include hardware in a such an undertaking in order to  fully benefit from it: &ldquo;[...] If you switch out the infrastructure from  proprietary hardware and proprietary software to common hardware based  on X86 products and Open Source Software, you will decrease [the costs]  between 50% and 70% over the course of three years&rdquo;. And he further  highlights that this is not only true for the public sector, but for the  private sector just as much: &ldquo;Open Source can be a door opener for  private companies as well. This is another twist to the story.&rdquo;</p>
<p><a name="section-8"></a></p>
<h3>Future plans</h3>
<p>The team at the national Police is hoping to complete the migration  project for 33 legacy systems to the new Open Source ICT platform in a  timely manner. As the business case laid out a rather optimistic target,  the team is trying its best to complete the migration&nbsp; by 2011, as  &Ouml;hlund explains.</p>
<p>Although the team is not actively engaged in a desktop migration at  this point, the team is thinking about models how to employ free  software in the desktop environment of the Swedish National Police.  There are however no concrete plans yet.</p>
<p><a name="section-9"></a></p>
<h3>Conclusion</h3>
<p>The case of the Swedish National Police is a good example of how a  public institution can avoid the dependence on particular hardware and  software vendors, and how this has the potential to increase  performance.</p>
<p>As public bodies throughout Europe are seeking to reduce costs and to  maximize the value of their ICT infrastructure, the number of  institutions that has realized the potential of Open Source Software is  still relatively small. In this sense, the Swedish National Police can  still be considered a pioneer. It was for this reason all the more  important that the implementation process was well planned and carefully  executed, in order to avoid drawbacks that only undermine&nbsp; the  resistance to change. Although the process of implementing a new ICT  infrastructure takes time and money, the Police managed to calculate the  costs as well as the benefits accordingly. The project plan in this  respect might have been slightly optimistic in this regard, but the  project team is still convinced of the benefits the migration will bring  eventually. Considering savings of up to fifty percent within the  coming years, the Police has managed to plan a system that not only is  cheaper, but also has managed to boost performance and stability. <br />
For  other public bodies that find themselves in a similar situation, these  are important arguments that should calm down critics and encourage the  step towards change.</p>
<p><a name="section-10"></a></p>
<h2>Links</h2>
<ul>
    <li><a href="http://www.polisen.se/en/Languages/The-Swedish-Police/Direction-/National-Police-Board/" class="external-link">National Swedish Police Board</a></li>
    <li><a href="../../news/se-police-to-use-open-source-database-system" class="internal-link" title="SE: Police to use Open Source database system">JoinUp news item - Police to use Open Source database system</a></li>
    <li><a href="http://www.mysql.com/news-and-events/generate-article.php?id=2007_39" class="external-link">MySQL news item - The Swedish National Police Move to and Open Source Infrastructure with MySQL Enterprise Unlimited</a></li>
    <li><a href="http://www.mysql.com/why-mysql/cio-corner/interviews/per-ola-sjosward.html" class="external-link">MySQL - Interview with Per-Ola Sj&ouml;sw&auml;rd, Executive IT-strategist, Swedish National Police</a></li>
    <li><a href="http://translate.google.com/translate?prev=hp&amp;hl=en&amp;js=y&amp;u=http://www.idg.se/2.1085/1.81493&amp;sl=sv&amp;tl=en&amp;history_state0=" class="external-link">Computer Sweden - National Police to open source (Google translate)</a></li>
    <li><a href="../../system/files/doc/Ingen bildrubrik.pdf" class="external-link">Presentation by Per-Ola Sj&ouml;sw&auml;rd&ndash; Open Source at Swedish National Police Board</a></li>
</ul>
<p>&nbsp;</p>
<p>This case study is brought to you by <a href="../../" class="internal-link" title="JoinUp">JoinUp</a>, a project of the European Commission\'s <a href="http://ec.europa.eu/idabc/" class="external-link">IDABC project</a>. Author: Gregor Bierhals, <a href="http://www.merit.unu.edu/" class="external-link">UNU-MERIT</a></p>
<p>This study is based on interviews with Per-Ola Sj&ouml;sw&auml;rd, executive  IT-strategist at the Swedish National Police, and Ola &Ouml;hlund, chief  executive officer at the Swedish National Police Board. Additional  information has been taken from the presentation \'Open Source at Swedish  National Police Board\' by Per-Ola Sj&ouml;sw&auml;rd.</p>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Eurostat: Standards and open source software for data interoperability';
	$path = 'software/page/eurostat-standards-and-open-source-software-data-interoperability';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<h1 class="documentFirstHeading"><span id="parent-fieldname-title">             Eurostat: Standards and open source software for data interoperability          </span><span class="documentAuthor">       </span><span class="documentModified"><br />
</span></h1>
<p class="documentDescription"><span id="parent-fieldname-description">             Eurostat collects and publishes huge amounts of data each  year, and exchanges many datasets with other large organisations. This  exchange was constantly suffering from a lack of interoperability, as  data needed to be converted from one organisation\'s convention into  another, a process which consumes both time and money. Different  organisations were also using very different tools to work with the  data, which caused further problems. In late 2001, Eurostat got together  with a number of EU committees to discuss the need for greater  interoperability within the European public sector. In 2005, IDABC  agreed to fund the SDMX Open DATA Interchange (SODI) project. Thanks to  previous cooperations between Eurostat and other international  institutions, the SDMX standard quickly found a large group of sponsors,  all of which hoped to benefit from the greater interoperability  afforded by using a single standard, and the tools built on it. These  tools were developed by Eurostat and other sponsoring institutions, and  many of them were published under the EUPL license. The SDMX Converter  is an example of the successful development and publication of a tool  that is essential for working with the SDMX standard.          </span></p>
<dl style="" class="portlet toc" id="document-toc">
    <dt class="portletHeader">Contents</dt>
    <dd class="portletItem">
    <ol>
        <li><a href="#section-0">Introduction</a></li>
        <li><a href="#section-1">Organisation and political background</a></li>
        <li><a href="#section-2">Budget and Funding</a></li>
        <li><a href="#section-3">Technical issues</a></li>
        <li><a href="#section-4">Legal issues</a></li>
        <li><a href="#section-5">Change management</a></li>
        <li><a href="#section-6">Effect on government services</a></li>
        <li><a href="#section-7">Cooperation with other public bodies</a></li>
        <li><a href="#section-8">Evaluation</a>
        <ol>
            <li><a href="#section-9">Achievements / Lessons learned</a></li>
            <li><a href="#section-10">Conclusion</a></li>
        </ol>
        </li>
        <li><a href="#section-11">Links</a></li>
    </ol>
    </dd>
</dl>
<div id="parent-fieldname-text">
<p>&nbsp;<a href="../../system/files/doc/IDABC.OSOR.casestudy.Eurostat.odt" class="document doc" title="Eurostat: Standards and open source software for data interoperability - ODT">Eurostat: Standards and open source software for data interoperability</a><a href="../../system/files/doc/IDABC.OSOR.casestudy.Eurostat.pdf" class="document pdf" title="Eurostat: Standards and open source software for data interoperability - PDF">Eurostat: Standards and open source software for data interoperability</a></p>
<a name="section-0"></a>
<h2>Introduction</h2>
<p>In 2001, Eurostat\'s section for&nbsp; Advanced Technologies for the  European Statistical System in Luxembourg sat down with various  committees composed of the European Member States to brainstorm about  the possibilities of developing a European knowledge management system.  Although this focus changed quickly, one core issue remained: Europe\'s  need for more interoperability in the information sector. About four  years later, these brainstorming sessions were followed by an intensive  planning phase which eventually led to the X-DIS&nbsp; program (XML for DATA  Interoperability in Statistics). The focus here was no longer on  knowledge management, but rather on interoperability of statistics  within Europe, and on the usability of these information beyond the  organisation which initially gathered it. This was to be achieved by  introducing the a standard for all statistical data and related  applications, which came to be called SDMX (Statistical Data and  Metadata Exchange). In the framework of X-DIS program, the SDMX Open  DATA Interchange (SODI) project became an important pillar. Bengt-&Aring;ke  Lindblad, who is the project officer for SODI explains: &ldquo;SODI is a  program to implement data sharing in the European Statistical System  using the SDMX standard&rdquo;.</p>
<p>Leonhard Maqua, the program manager responsible for X-DIS further  explains: &ldquo;The impulse [for SDMX] came together with the Member States.  We have several working groups with the Member States, the most  important being the Statistics Telematic Networks and EDI (STNE)  workgroup&rdquo;. These meetings proved to be an important framework for the  planning of the X-DIS programme and all its sub-projects. Many tools and  standards had to be developed, most of which are published as open  source software under the EUPL license. From the start, the open source  route has been an important strategy to ensure the project\'s  sustainability in the future. Today SDMX is an acknowledged standard by  the International Standards Organization (ISO), and many large  organization and institutions sponsor the initiative.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="Eurostat: Standards and open source software for data interoperability">top</a>]</p>
<a name="section-1"></a>
<h2>Organisation and political background</h2>
<p>Eurostat is the statistical institute of the European Commission,  producing and illustrating data of a wide range of indicators,&nbsp; from  economic ones to social, for example. Within the framework of the IDABC  program (Interoperable Delivery of European eGovernment Services to the  Administrations, Businesses and Citizens), Eurostat is in charge of  several programs that aim at fostering European eGovernment services.  One such program is the X-DIS project, a &ldquo;project of common interest&rdquo;1.</p>
<table width="301" align="right" class="vertical listing">
    <tbody>
        <tr>
        </tr>
        <tr>
            <th colspan="2">Quick Facts</th>
        </tr>
        <tr>
            <td><em>Project name</em></td>
            <td>
            <p>X-DIS: SDMX Open Data Interchange (SODI)</p>
            </td>
        </tr>
        <tr>
            <td><em>Sector</em></td>
            <td>
            <p>eGovernment</p>
            </td>
        </tr>
        <tr>
            <td><em>Start date</em></td>
            <td>2005</td>
        </tr>
        <tr>
            <td><em>End date</em></td>
            <td>2009</td>
        </tr>
        <tr>
            <td><em>Objectives</em></td>
            <td>
            <p>Improve quality, timeliness and<br />
            interoperability of statistical data</p>
            </td>
        </tr>
        <tr>
            <td><em>Target group</em></td>
            <td>
            <p>Mainly public sector</p>
            </td>
        </tr>
        <tr>
            <td><em>Scope</em></td>
            <td>International</td>
        </tr>
        <tr>
            <td><em>Budget</em></td>
            <td>3,750,000&euro; over four years</td>
        </tr>
        <tr>
            <td><em>Funding</em></td>
            <td>EU (IDABC)</td>
        </tr>
        <tr>
            <td><em>Achievements</em></td>
            <td>
            <p>Successful introduction of a standard, development and publication of related software</p>
            </td>
        </tr>
    </tbody>
</table>
<p>Besides Eurostat, the SDMX standard is sponsored by the Bank of  International Settlements (BIS), the European Central Bank (ECB), the  International Monetary Fund (IMF), the Organization for Economic  Co-operation and Development (OECD), the Statistics Division of the  United Nations, the World Bank. Maqua explains that the contact between  the various institutions has already existed for quite some time, as  they had been exchanging data already in previous projects. It therefore  only took a a few meeting at the director level to agree on a common  initiative for SDMX. The institutions all benefit from the standard, and  work together on increasing its use, as well as on improving the  applications built on it. The costs for tools developed as part of the  SODI project are shared with all institutions, which keeps the financial  burden for each organisation at a minimum. The data collected by these  institutions can be used by all of them, which facilitates the data  collection and its use greatly.</p>
<p>The SODI project receives funding as part of the X-DIS program, which  in turn is financed by the IDABC. The project is set to end in late  2009, and the Eurostat team aims to conclude all the contractual work by  then or shortly after. In order to ensure sustainability of the project  and the software it has developed, the standard and related  applications have been published under the open source license EUPL. The  Food and Agriculture Organization of the United Nations (FAO) is just  one example of a&nbsp; non-sponsoring institution making use of the SDMX  standard and the related open source tools.&nbsp; In the future, besides the  already large user groups at Eurostat and the other sponsoring  institutions, Eurostat is hoping to further extend the use of the  standard to the EU Member State\'s institutions, and other departments  within the EU. In addition, users from the private sector and other  institutions will also ensure the standard\'s use in the future. Already  at this point, there are many users that employ the SDMX standard on a  daily basis, and further develop the related tools to their needs.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="Eurostat: Standards and open source software for data interoperability">top</a>]</p>
<a name="section-2"></a>
<h2>Budget and Funding</h2>
<p>Before receiving funding from IDABC, the project had to be carefully  planned, which took about 3 years from late 2001 to 2005. IDABC saw the  potential of the SDMX standard and agreed to fund the project from 2005  until&nbsp; 2009. In total, the funding for X-DIS is set at &euro; 3,750,000 over  those four years. As Maqua explains, the budget is used for all aspects  of the program, including the development of applications and the  support to the Member States. As an example, he mentions the SDMX  Converter, which has a budget &ldquo;of probably &euro; 100.000 to 200.000&rdquo;. It is  however difficult to give clear estimations, as there are not dedicated  budgets for individual aspects of the project.</p>
<p>The program is very beneficial for Eurostat and the other sponsoring  institutions. As the SDMX standard is applicable throughout all  institutions, it offers the possibility to improve the interoperability  across the institutions, while at the same time speeding up internal  processes. It is for this reason that each of them is contributing in  some way to the enhancement of the SDMX standard and the related  applications. The division of tasks and budgets is decided at high-level  meetings of the various institutions, and attempts to give a fair  representation of who benefits the most from each development. Moreover,  the developments are often tested together, in order to ensure the best  possible outcome.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="Eurostat: Standards and open source software for data interoperability">top</a>]</p>
<a name="section-3"></a>
<h2>Technical issues</h2>
<p>For the X-DIS program, the implementation and the development of the  SDMX standard are the central points. The main objectives of the project  are:</p>
<ul>
    <li>to improve quality and timeliness of statistics;</li>
    <li>to decrease the reporting burden of enterprises and statistical authorities in Member States;</li>
    <li>to improve accessibility of statistics for business users and citizens.</li>
</ul>
<p>The main technical backbone of SDMX is XML, which stands for  Extensive Markup Language. It is a framework in which markup languages  are developed, which allows for the for visualization of data in text  form. With regard to statistical data, SDMX makes it possible to  illustrate statistical data with tables and graphs, which can be updated  easily and quickly. Through the use of the standardized SDMX format,  the different institutions can make use of data more efficiently, and  share their datasets much more easily, as they do not have to convert  data into their own format &ndash; a process which is usually time-consuming  and error-prone. Especially in an international context, this  substantially facilitates the work, as data has to be collected just  once, and can then be shared and used by all. The standard\'s  certification by the International Standards Organisation as ISO 17369  means that the standard meets official criteria and will be applicable  in the future as well.</p>
<p>There are seven key actions within the X-DIS project:</p>
<ul>
    <li>Implement SDMX (Statistical Data and Metadata eXchange, see www.sdmx.org) standards and develop appropriate tools;</li>
    <li>Develop an SDMX Open Data Interchange (SODI, interoperability of statistical web sites for economic indicators);</li>
    <li>Set  up sectoral networks for exchange of statistical information (initial  focus on XBRL - eXtensible Business Reporting Language, which supports  information modelling and the expression of semantic meaning commonly  required in business reporting);</li>
    <li>Develop and implement advanced visualisation techniques for statistical data in XML format;</li>
    <li>Make Eurostat&rsquo;s web site interoperable;</li>
    <li>Develop suitable tools to access large statistical XML datasets;</li>
    <li>Create  a repository of open source software for statistical purposes, using  the IDABC OSS repository to collect all tools developed in X-DIS and  grant sustainability and re-usage of results.</li>
</ul>
<p>Especially the repository named in the last point is important to  ensure the use of the SDMX standard and the related tools after the  project\'s end. Achieving this sort of sustainability was a major  consideration in the design of the X-DIS project.. Maqua explains that  the &ldquo;tools are usable with your own data, or with the data we provide on  our website&rdquo;. The tools are usually more interesting for larger bodies  than for individuals, although they may also be of use in companies. As  an example Maqua refers to the Eurostat SDMX converter, which converts  statistical data between different version of SDMX. &ldquo;It is an important  tool, which is essential for anyone working with SDMX&rdquo;, he states. This  may also explain its popularity in terms of SDMX-related downloads at  the OSOR.eu platform and repository. &ldquo;[The converter] has been  downloaded from the OSOR platform alone over 300 times within four  month&rdquo;, Maqua further adds.</p>
<p>In addition to OSOR, the SDMX standard is also available on the  SEMIC.eu platform (Semantic Interoperability Centre Europe). Here also, a  frequently updated release of the standard is available for download.  By joining the forum on the website, one can further engage in  discussion about the standard and related tools, which proves to be an  important input for the project. The presence of the standard on  multiple websites is therefore very important for the project, as this  not only ensures more users, but a broader group of user experiences  which can be shared and discussed.</p>
<p>The SDMX converter serves as an example of the typical way in which a  tool is developed in the X-DIS project. For the development of this  tool, Eurostat contracted a third party consortium comprised of a  Hungarian, Greek, and Luxembourgian development team. Eurostat clearly  specified its requirements, and closely monitored the development  process, Maqua says. Lindblad adds that &ldquo;the software is developed with  Java technology, it requires the Java Runtime Environment and it is  platform independent&rdquo;.&nbsp;This was very important, seeing that the software  had to function on many platforms.</p>
<dl class="image-left captioned">
    <dt><img width="326" height="295" title="Eurostat: Standards and open source software for data interoperability 2" alt="Eurostat: Standards and open source software for data interoperability 2" src="../../system/files/images/SODI Organizaition Background copy.jpg" /></dt>
    <dd style="width:326px" class="image-caption">Illustration 1: Organizational context of SODI</dd>
</dl>
<p align="right">[<a href="#section-0" class="internal-link" title="Eurostat: Standards and open source software for data interoperability">top</a>]</p>
<a name="section-4"></a>
<h2>Legal issues</h2>
<p>In order to receive the IDABC\'s approval and ultimately funding for  the X-DIS program and the SODI project within this, Eurostat had to  bring forward justifications for the need of such a program. Clear  explanations of the aims of the project, and the existing shortcomings  at the time where therefore necessary to get the IDABC\'s approval.  Eventually however, the program targets were clearly formed, and it was  clearly in the IDABC\'s interest to approve and fund the program.</p>
<p>Publishing applications as open source software does not pose any  problems for Eurostat. When Eurostat contracts third parties to develop  software, it makes sure to obtain the copyright and related rights in  the product. As the funding for the development came from IDABC, the  European Commission is ultimately is the owner of the software and can  decide what to do with it. Once a tool such as the SDMX converter is  fully functioning and ready to use, the Eurostat team may decide to  publish it under EUPL license, if it is considered useful for the public  and other institutions.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="Eurostat: Standards and open source software for data interoperability">top</a>]</p>
<a name="section-5"></a>
<h2>Change management</h2>
<p>For the introduction of the SODI project at Eurostat, the team  gradually implemented the standard and the related tools and  applications, says Lindblad.</p>
<p>The X-DIS team took a step-by-step approach to introducing the use of  the SDMX Open Data Interchange (SODI). This allowed Eurostat to adopt  its own procedures. Ensuring a smooth transition was also necessary  since Eurostat works closely with the Member States in collecting data,  so that a significant number of organisations were affected by the  introduction of the new standard and the related tools. Fortunately,  this process went smoothly, and the team did not encounter significant  problems.</p>
<p>Specialised tools such as the SDMX converter and other software  developed by the X-DIS project usually do not require significant  changes in the IT infrastructure of the user organisations. This is  particularly the case for applications built on platform-independent  technologies such as Java.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="Eurostat: Standards and open source software for data interoperability">top</a>]</p>
<a name="section-6"></a>
<h2>Effect on government services</h2>
<p>The use of the SDMX standard has greatly accelerated the process of  publishing statistical data provided by Member States. Where this  process was previously hindered by the use of diverging standards, SDMX  allows for a much quicker publication, since Eurostat no longer has to  invest time in converting the data of the Member States from various  formats into its own mode of display.</p>
<p>In addition, the use of a common standard amongst various  international institutions is very beneficial. It makes significant  savings possible, as it becomes very easy for an organisation using the  standard to use data which has already been gathered elsewhere for its  own purposes, with minimal effort. The data is collected only once, and  then shared between the various organisations, which reduces the amount  of funding needed for collecting data. The process of sharing is not  only enabled, but also accelerated by the use of SDMX as a common  standard.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="Eurostat: Standards and open source software for data interoperability">top</a>]</p>
<a name="section-7"></a>
<h2>Cooperation with other public bodies</h2>
<p>SDMX is an initiative that is sponsored by the Bank of International  Settlements (BIS), the European Central Bank (ECB), the International  Monetary Fund (IMF), the Organisation for Economic Co-operation and  Development (OECD), the United Nations (UN), the World Bank and  Eurostat. The cooperation between these organisations originated before  the SODI project, as they were had already been exchanging data and  expertise. The common initiative came into existence after a series of  executive meetings, which were further prepared in technical staff  meetings in Paris, Maqua explains. Eurostat is the main beneficiary of  the greater interoperability provided by the SDMX initiative, &ldquo;because  in contrast to the other institutions we receive data and pass it on,  which is basically only the case with the ECB although it has a much  narrower target area&rdquo;, Maqua explains. Nonetheless, the initiative also  brings many benefits to the other institutions as well. As Maqua says,  &ldquo;we do something, they do something, and afterwards we can all use it  together, because SDMX is a common standard&rdquo;.</p>
<dl class="image-right captioned">
    <dt><img width="290" height="385" title="Eurostat: Standards and open source software for data interoperability 1" alt="Eurostat: Standards and open source software for data interoperability 1" src="../../system/files/images/Photo-maqua.jpg" /></dt>
    <dd style="width:290px" class="image-caption">Leonhard Maqua. Head of Section Standardisation and advanced information technologies for statistics &copy; 2008, licensed by BRC</dd>
    <dd style="width: 290px;" class="image-caption">Photography, Norman, Oklahoma, www.brcphotography.com.</dd>
</dl>
<p>In the case of the SDMX converter, Eurostat was in charge of the  development of the tool. It contracted a consortium of firms, which  developed the converter in close cooperation with the Eurostat team. For  testing purposes, the team worked closely together with the Bank of  International Settlements (BIS) in order to test the software thoroughly  and in areas where Eurostat could not have put the program through its  paces by itself. As Maqua explains:&nbsp; &ldquo;Especially in the beginning we  didn\'t have too many data sets to work with, so it came in very helpful  to use their input&rdquo;.</p>
<p>Another example can be seen in the European Central Bank\'s Statistics  Dashboard tool, which visualises statistical data in a way that is very  clear and easily understandable. Although this tool was not developed  by Eurostat, it &ldquo;will probably be used intensively by us&rdquo;, says Maqua.  This in turn will help in further improving the software.  Cross-institutional developments are thus not considered an obstacle for  the initiative, but rather help all participating institutions in some  form or another.</p>
<p>Beyond the group of sponsoring organisations, the United Nation\'s  Food and Agriculture Organisation has also started using the standard &ndash;  something which Maqua says he only learned about when a representative  of the body told him so at a a conference.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="Eurostat: Standards and open source software for data interoperability">top</a>]</p>
<a name="section-8"></a>
<h2>Evaluation</h2>
<a name="section-9"></a>
<h3>Achievements / Lessons learned</h3>
<p>For the success of the X-DIS program and the SDMX initiative, careful  planning was one of the most important ingredients. Maqua highlights  that &ldquo;we invested one and a half work years into the planning phase of  the project&rdquo;, which enabled the project team to give clear predictions  of the requirements for such a program. With a certain pride in his  voice, Maqua adds: &ldquo;We basically managed to stick completely to the  project plan&rdquo;.</p>
<p>With basically no advertisement and only with the help of the Open  Source community and the widespread use across all sponsoring  institutions has the SDMX standard achieved relatively large popularity.  &ldquo;Many opportunities even beyond the purely statistical area have been  created through the SDMX standard and the the tools that come with it&rdquo;,  says Maqua.</p>
<a name="section-10"></a>
<h3>Conclusion</h3>
<p>Compared to many other tools in the Open Source ecosystem, the SDMX  standard and tools such as the SDMX Converter are backed by a number of  very large institutions. Although one may assume that cooperation on  such a high level could be problematic, it appears that the SDMX  initiative and the SODI project work very efficiently. Through the SDMX  standard, all tools can be employed by all institutions, which saves a  lot of financial resources, and further ensures a fairly large user  group. This is in turn helps in developing adaptable and well  functioning software, as it can be tested in many situations and  contexts.</p>
<p>Use of the standard and the related tools is spreading beyond the  group of sponsoring organisations. Assuming that this process continues,  it will further add to the combined weight of the large institutions  already backing the standard and the related tools. This demonstrates  the power of free software licenses like the EUPL to enable sharing  between a large number of partners without the need for significant  contractual overheads.</p>
<p>With regard to the future, the Eurostat team\'s approach to publish  the software under the EUPL license appears very successful. As the  software is already used extensively by a large group of users even  beyond the sponsoring institutions, early since of success are already  visible before the funding of the project runs out.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="Eurostat: Standards and open source software for data interoperability">top</a>]</p>
<a name="section-11"></a>
<h2>Links</h2>
<ul>
    <li><a href="http://sdmx.org/?page_id=6" class="external-link">SDMX.org</a></li>
    <li><a href="../../sites/default/files/doc/36462416.ppt" class="external-link">SODI Demonstration of the results of the SODI Pilots</a></li>
</ul>
<p><br />
Author: Gregor Bierhals, UNU-MERIT <br />
This  study is based on interviews with Leonhard Maqua, director of X-DIS and  Head of Section Standardisation and advanced information technologies  for statistics, and Bengt-&Aring;ke Lindblad, SODI project director.</p>
<div align="right">[<a href="#section-0" class="internal-link" title="Eurostat: Standards and open source software for data interoperability">top</a>]</div>
</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'The Open University UK: creating a win-win situation by sharing code and content ';
	$path = 'software/page/open-university-uk-creating-win-win-situation-sharing-code-and-content';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<p class="documentDescription"><span id="parent-fieldname-description">             In 2005 The Open University (OU) UK, one of Europe\'s largest  distance learning universities, established that it was time to deploy a  new Virtual Learning Environment (VLE), for both The Open University  itself as well as for their OpenLearn project aimed at providing free  open educational resources (OER) to the general public.  A team with  different sub-tasks was formed, which investigated future learning  environments and how learning material was presented and disseminated  through those. Next to this, the OU also researched open learning  models, as part of the OpenLearn project. The team of researchers and  technical staff, after setting out the components required to meet the  OU\'s needs the most appropriate match was determined. The choice fell on  the VLE Moodle, which is an open source product. Today the Moodle VLE  has been successfully implemented at the OU and the OU has further  published a significant amount of their learning material under a  Creative Commons license as courses on the Moodle VLE based OpenLearn  website, which are freely available to anyone interested. The OU  continues to collaborate closely with the Moodle community , as this  provides a very large platform for feedback and information. All the  OU\'s development are given back to the Moodle community, which improves  the product for the OU and the rest of the community.          </span></p>
<dl id="document-toc" class="portlet toc" style="">
    <dt class="portletHeader">Contents</dt>
    <dd class="portletItem">
    <ol>
        <li><a href="#section-0">Introduction</a></li>
        <li><a href="#section-1">Organisation and background</a></li>
        <li><a href="#section-2">Budget and Funding</a></li>
        <li><a href="#section-3">Technical issues</a></li>
        <li><a href="#section-4">Legal issues</a></li>
        <li><a href="#section-5">Change management</a></li>
        <li><a href="#section-6">Cooperation and assistance of government services</a></li>
        <li><a href="#section-7">Cooperation with other universities and the online community</a></li>
        <li><a href="#section-8">Evaluation</a>
        <ol>
            <li><a href="#section-9">Achievements / Lessons learned</a></li>
            <li><a href="#section-10">Future plans</a></li>
            <li><a href="#section-11">Conclusion</a></li>
        </ol>
        </li>
        <li><a href="#section-12">Links</a></li>
    </ol>
    </dd>
</dl>
<p><a title="The Open University UK - PDF" class="document pdf" href="../../system/files/doc/IDABC OSOR casestudy OpenUniversity.pdf">The Open University UK: creating a win-win situation by sharing code and content&nbsp; - PDF</a><a title="The Open University UK - ODT" class="document doc" href="../../system/files/doc/IDABC OSOR casestudy OpenUniversity.odt">The Open University UK: creating a win-win situation by sharing code and content&nbsp; - ODT</a></p>
<p><a name="section-0"></a></p>
<h2>Introduction</h2>
<p>The Open University (OU) UK is one of the largest distance learning  universities in the world, teaching a total of over 200,000 learner:  roughly 150,000 undergraduate students and 30,000 postgraduate students.</p>
<p>By 2005 the OU had a variety of online services, which helped the  students in their distance learning process and the university in  evaluating and communicating with them. The problems in 2005 however  were that many of these online services were outdated, offered little  modularity, and were not centralized, which made it increasingly  difficult for students and teaching staff to find their way around the  OU\'s online platform. It was therefore necessary for the university to  address these issues, and to provide a solid and functional online  platform, as the Internet gradually moved in the centre of their daily  operations.</p>
<p>The OU thus started an extensive initiative with the aim to research  new learning platforms and ways to communicate and distribute learning  content. This process, that started in October 2005, eventually led to  two important outcomes. From a technical perspective, the OU decided to  develop a virtual learning platform (VLE) on the basis of the open  source software Moodle, as this software seemed to&nbsp; offer the highest  degree of modularity and a broad user base, which ensured continuous  support for the system. With regard to the learning materials itself,  the OU decided to change its policy and to release large parts of them  as open educational resources (OER)&nbsp; through the OpenLearn project, that  has been generously funded by the William and Flora Hewlett Foundation,  to the public under Creative Commons license.</p>
<p align="right">[<a title="The Open University UK: creating a win-win situation by sharing code and content" class="internal-link" href="#section-0">top</a>]</p>
<p><a name="section-1"></a></p>
<h2>Organisation and background</h2>
<p>The Open University UK is one of the largest distance learning  universities in the world. Today,&nbsp; there are about 200,000 students  enrolled in the various programs the OU</p>
<table width="301" align="right" class="vertical listing">
    <tbody>
        <tr>
        </tr>
        <tr>
            <th colspan="2">Quick Facts</th>
        </tr>
        <tr>
            <td><em>Project name</em></td>
            <td>
            <p align="justify">Open University VLE, OpenLearn</p>
            </td>
        </tr>
        <tr>
            <td><em>Sector</em></td>
            <td>
            <p align="justify">Education</p>
            </td>
        </tr>
        <tr>
            <td><em>Start date</em></td>
            <td>01/10/05</td>
        </tr>
        <tr>
            <td><em>End date</em></td>
            <td>Early 2008</td>
        </tr>
        <tr>
            <td><em>Objectives</em></td>
            <td>
            <p align="justify">Development of a new VLE, to release Open Educational Resources [through such a VLE]</p>
            </td>
        </tr>
        <tr>
            <td><em>Target group</em></td>
            <td>
            <p>University students, general public</p>
            </td>
        </tr>
        <tr>
            <td><em>Scope</em></td>
            <td>Global</td>
        </tr>
        <tr>
            <td><em>Budget</em></td>
            <td>Roughly &pound;5 million</td>
        </tr>
        <tr>
            <td><em>Funding</em></td>
            <td>
            <p align="justify">Partly self financed, partly foundational funding</p>
            </td>
        </tr>
        <tr>
            <td><em>Achievements</em></td>
            <td>
            <p align="justify">Functioning VLE, with courses for<br />
            University students and the general public, respectively</p>
            </td>
        </tr>
    </tbody>
</table>
<p>offers, which are supported by around 7,000 tutors and academic staff  members. The university was founded in 1970 and increased in size  steadily over the years. For the most part of this history the OU has  been highly dependent on paper-based communication with its students.  With the rise of the Internet in the 1990s the OU adapted new ways of  communication, as it has always tried to have a state of the art  communication infrastructure.&nbsp; By 2005 there were several different  programs running in the background of the online learning environment,  each with a different user interface and hardly any common feel to them  and the functionality also needed some improvement. The university thus  formed several research teams with the task to investigate all aspects  of a new learning environment. As Niall Sclater, who was the director of  this process, highlights: &ldquo;We had a very structured approach.&rdquo; The  teams did not only focus on the technical aspects of this undertaking  but also had an eye on societal changes that started as a by product of  the Internet. Eventually they concluded that the open source Virtual  Learning Environment (VLE) Moodle would be the solution that meets most  of their requirements, as it was stable, modular and due to its large  user base, very sustainable in the future.</p>
<p>More or less simultaneously The William and Flora Hewlett Foundation  wanted to fund an educational entity that would investigate open  learning platforms and to provide open educational resources through it.  For the Hewlett Foundation the OU was the right institution for such a  project, and the OU itself was very interested in this development.  Patrick McAndrew, who has been involved at the OpenLearn project since  its origin&nbsp; explains: &ldquo;Essentially, although it was a very big  investment, it was seen as an experiment. An experiment in how we can  offer open educational resources, and what impact it would have on the  University, [&hellip;] on other people who were acting as providers, and [&hellip;]  learners and end-users.&rdquo; The Hewlett Foundation thus funded the  OpenLearn project for a period of two years, after which the OpenLearn  platform went online, offering a very extensive catalogue of learning  content. The OpenLearn project itself was not directly linked to the  OU\'s development of the Moodle based VLE, but the teams worked together  closely, as the OpenLearn platform is also running on Moodle.</p>
<p>The two projects can be understood as the development of two  platforms: one for the University, where students and teaching staff can  log in and participate in courses and discussions, and one that is open  to the public, where anyone can access course material and learn  independently. For both platforms &ldquo;Moodle forms the heart of it&rdquo;,  explains Sclater.</p>
<p align="right">[<a title="The Open University UK: creating a win-win situation by sharing code and content" class="internal-link" href="#section-0">top</a>]</p>
<p><a name="section-2"></a></p>
<h2>Budget and Funding</h2>
<dl class="image-left captioned">
    <dt><img width="278" height="400" src="../../system/files/images/Niall-Sclater.jpeg" alt="The Open University UK" title="The Open University UK" /></dt>
    <dd class="image-caption" style="width:278px">Niall Sclater, Director of Learning Innovation at the Open University &copy; 2009. Used by permission.</dd>
</dl>
<p>The development of the Moodle based OU internal VLE was funded by the  University\'s internal resources, meanwhile for the OpenLearn initiative  the&nbsp; William and Flora Hewlett Foundation provided&nbsp; a generous  contribution to the budget that also benefited the underlying Moodle VLE  customization. Together the two projects had a dedicated budget of  roughly &pound; 5 million for the development of the two VLEs, which covered  research, the development of the platform, change management and  anything else that was necessary in order to have a functioning system.  About &pound; 2 million of this budget was contributed by the Hewlett  Foundation, which represented the part of the budget dedicated to the  technical and media aspects of the OpenLearn project.</p>
<p>The total number of people that was working on both of the projects  combined at times reached about thirty full time employees, which  included about twelve developers and a lot of the general staff from the  University. The teams had clearly dedicated tasks: for the  investigation of the Moodle deployment, several sub groups were formed,  which did extensive research on the needs and risks of such a  deployment. The team working on OpenLearn worked separately, although  both teams had frequent exchange of ideas and experiences. After the  official completion of the two projects in July 2008, the number of  people actively involved in the projects went down substantially, even  though many people are today still involved in the project from time to  time. Sclater explains that at the moment there are only two developers  working full time on the development and the maintenance of the OU\'s  VLE. Yet, academic staff members and IT related offices are still  contributing to the project if there is the need for them to assist or  give input.</p>
<p>The choice for the open source solution Moodle for the OU\'s VLE was  less driven by avoiding licensing fees; although the University was well  aware that license cost could arise with proprietary solutions, this  was not a main a factor in the decision-making process. &ldquo;For us that  wasn\'t an issue, it was finding the best possible system for our needs  and working on that&rdquo; which was the deciding factor, explains Sclater.  The change of system however did not come for free, as other factors in  such an undertaking can be much costlier than software licenses, he  further ads: &ldquo;The true cost of implementing any system like this and for  it to be effective [&hellip;] are much much higher than the technical  development. It\'s the change management, the communications and the  staff development and changing working practices, which are the  expensive bits.&rdquo;</p>
<p>Considering that the OU not only had to introduce about 7,000 tutors  and staff members to the system, but also had to ensure a smooth  transition of the considerably high number of 200,000 students.</p>
<p align="right">[<a title="The Open University UK: creating a win-win situation by sharing code and content" class="internal-link" href="#section-0">top</a>]</p>
<p><a name="section-3"></a></p>
<h2>Technical issues</h2>
<p>Before the team decided to deploy Moodle as their VLE they conducted  an extensive market study on potential solutions. Although the team did  not exclude proprietary solutions, such as Blackboard, from the start,  they soon found out that no other system but Moodle offered the  functionality and more importantly the modularity that the OU\'s VLE  needed to have.</p>
<p>However, when the decision was made to deploy&nbsp; Moodle the work was  not over, but had just begun. &ldquo;When we took on Moodle, there were a lot  of things wrong with it&rdquo; remembers Sclater. At this point, Moodle was  just a basis, which seemed to offer the highest potential for&nbsp; the  future. To name just a few of the points that needed improvement,  Sclater recalls the quiz engine, the assessment functionality, and  accessibility issues which needed a lot of work. In order to cope with  this large scale undertaking appropriately, the team in charge of the  VLE split into twelve sub projects, which focused on separate aspects:</p>
<ul>
    <li><em>Asynchronous Communication </em>(forums, wikis, blogs, polling tool, audio recording facility),</li>
    <li><em>Synchronous Communication</em> (instant messaging, audioconferencing, video- conferencing, shared whiteboards, application sharing),</li>
    <li><em>E-assessment</em>,</li>
    <li><em>E-portfolio</em>,</li>
    <li><em>Calendar</em>,</li>
    <li><em>Tracking and Reporting</em>,</li>
    <li><em>Integrated Online Experience</em> (integration of StudentHome and Moodle, information architecture and design ),</li>
    <li><em>Mobile Learning</em> (offline Moodle, viewing of VLE on small mobile devices,podcasting),</li>
    <li><em>&nbsp;Learning Design</em> (learning design tools),</li>
    <li><em>Federated Search</em> (searching across all VLE tools and other information sources at the University),</li>
    <li><em>Maths and Scientific Notation</em> (the input and display of this notation),</li>
    <li><em>Library Resources</em> (RSS newsfeeds of library resources to course websites).</li>
</ul>
<p><br />
These teams worked closely together with the faculties and the  academic staff, ensuring that the functionality would actually meet the  demand. In addition to the team of developers other members of staff  from the University helped out in the design and the testing of the new  VLE, and whenever some non-technical expertise was required.</p>
<p>Recently the OU has introduced one feature, of which they are  particularly proud of, which changes the way users can interact with  each other. Considering that most VLE\'s have little room for users to do  things freely, the OU wanted to change this and make the system less  rigid and institutional. &ldquo;We have re-engineered Moodle and one thing  that we have added to it is the concept of what we call a \'shared  activity\' so that any student or member of staff can set up a forum, a  blog, or a wiki at the moment, and invite anyone else to join them in  that,&rdquo; highlights Sclater, &ldquo;And that I think is a radical change to the  structure of Moodle.&rdquo;</p>
<p>Eventually, when the OU internal VLE was rolled out , the OU brought  the largest number of users to the Moodle community at one single point.  For the Moodle community this process was very beneficial, as  deployments and improvements on such a large scale ultimately would  improve the software for all users. Even though this was not the primary  motivation for the OU to , the community behind the system was an  important factor, since it ensured continuous support and improvements  of the system. And in the same way that the OU benefited from this  community, the community benefitted from the work of the OU. From the  OU\'s side there has been a &ldquo;altruistic&rdquo; motivation to give developments  back to the world, explains Sclater further.</p>
<p align="right">[<a title="The Open University UK: creating a win-win situation by sharing code and content" class="internal-link" href="#section-0">top</a>]</p>
<p><a name="section-4"></a></p>
<h2>Legal issues</h2>
<p>From a legal perspective the VLE deployment did not impose too many  barriers. The team had legal consultants, who they could address in the  case required, but essentially there were not many problems. Given that  Moodle is available under a GPL license, the team did not have to cope  with license costs and agreements.</p>
<p>The only issue that came up was related to the integration of  previously deployed systems into the Moodle infrastructure, namely that  some license agreements had to be checked and sign-on integrated. As  some programs were developed by the University itself, they only had to  to find ways to integrate proprietary applications, or develop similar  functionalities from scratch.</p>
<p>Perhaps more challenging than the technical aspects the OpenLearn  project had to face the legal aspects of such an undertaking , and it  required a significant amount of research and legal consulting&nbsp; before  the OU could publish its content for free.</p>
<p><a name="section-5"></a></p>
<h2>Change management</h2>
<p>As mentioned before, the perhaps biggest challenge in the  introduction of the new VLE within the OU was related to change  management. On the one hand, there were the technical innovations which  had to be developed or improved, and on the other hand there was the  staff and the students, who had to be carefully familiarized with the  new solution and its functionality.</p>
<p>The University had very high requirements with regard to the new VLE,  since the system is at the core of their business. After all,  communicating with their students through distances has always been, and  will always be the teaching style at the Open University.</p>
<p>In the fifteen years before the project started in 2005, the OU  relied heavily on a series of programmes for the administration of  courses, the distribution of information, and the registration to  courses, and so forth. These were not on a centralized place, had  different user interfaces (UI), and were at least partially outdated.  The new VLE had to address these issues equally, as these would improve  the experience for the users, which in turn would eliminate resistance  against a new system and facilitate change. This was particularly  important as there was resistance to rely increasingly on a new web  based platform that would handle an increasing number of tasks. &ldquo;Some of  the skepticism about Moodle is more based on the mistrust of online  methods.&rdquo; says Sclater. Especially older teaching staff had relied on  paper for the most part of their working live, and changing this  impacted most of their working methods, therefore potentially resulting  in resistance. For McAndrew the increasing reliance on the Internet and  the publishing of most of the OU\'s course material was surprisingly  unproblematic within the related OpenLearn project, given that this  project targeted a different user group and that it did not commit any  lecturing staff to provide online classes through OpenLearn, but rather  asked lecturers to make their materials publicly available. &ldquo;There was  less resistance. [&hellip;] Essentially we took this forward and directly  collaborated with the academic staff involved. So we liaised with the  faculties, we invited people to nominate material that they were proud  of and felt that the material could stand alone.&rdquo; In this sense, it was a  kind of re-usage of the material, or a way of making sure that it would  not only be used for a few years at the University and then end up in a  folder somewhere in the basement. Although this was certainly new for  most people at the University, this found great acceptance across the  board.</p>
<p>In order to make sure that the technical part of the new OU internal  VLE was understood by all academic staff, a series of about 45 events  was held, which members from all faculties attended. In addition to  that, there were also several trainings held within the faculties. And  to make sure that all question would be answered in the future as well  they set up a wiki for this. &ldquo;This is why it is not a trivial process,  just introducing a VLE like this&rdquo;, as Sclater sums it up.</p>
<p>Eventually most people at the OU could see the rising importance of  the Internet, especially for distance learning purposes, which justified  a lot of the developments and changes that took place. And although the  Internet makes many processes more interactive, the learners are still  asked to pull out pen and paper, to do their work and practice.  &ldquo;Interactive does not mean flash&rdquo;, ads McAndrew.</p>
<p align="right">[<a title="The Open University UK: creating a win-win situation by sharing code and content" class="internal-link" href="#section-0">top</a>]</p>
<p>&nbsp;</p>
<p><a name="section-6"></a></p>
<h2>Cooperation and assistance of government services</h2>
<p>Most of the developments of the Moodle VLE and the OpenLearn projects  were initiatives that were carried without much governmental  assistance. Clearly, the OU is a public&nbsp; funded institution, but there  was no dedicated funding support specifically for such projects.</p>
<p>Even though the OU hardly needed any assistance of any government  services for their project. As Sclater points out there is a place for  higher education institutions to find guidance for Open Source projects  and initiatives, such as the OSS Watch (Open Source Watch), that aims at  providing &ldquo;unbiased advice and guidance on the use, development, and  licensing of free and open source software&rdquo;(<a class="external-link" href="http://www.oss-watch.ac.uk/">www.oss-watch.ac.uk</a>).  In addition to providing direct assistance to Open Source projects in  the higher education sector, OSS Watch runs also a number of workshops  and forums, which educational facilities can attend throughout the year.</p>
<p align="right">[<a title="The Open University UK: creating a win-win situation by sharing code and content" class="internal-link" href="#section-0">top</a>]</p>
<p><a name="section-7"></a></p>
<h2>Cooperation with other universities and the online community</h2>
<p>Before the introduction of Moodle and the OpenLearn platform, the OU  was not the only institution that had the ambitious plan of bringing  their IT infrastructure and working methods up-to-date. Especially other  distance learning universities were very interesting partners to talk  to, as most of them faced similar issues. &ldquo;We certainly had a lot of  discussion with various other Moodle users, and we have lots of  collaborations and various projects with universities around the place&rdquo;,  states Sclater. These discussions provided important information before  the project started, and the OU could get an understanding of common  mistakes and misconceptions. The Open University of the Netherlands and  the Fern Universtit&auml;t Hagen in Germany were particularly interesting  examples, that had underwent similar changes and had to adapt their  working methods to the Internet.</p>
<p>For the development of the Moodle VLE however, the OU saw little need  for direct cooperation with other universities, given that each  university has different requirements and specific needs. What was right  for the OU in this respect, may not not been the best solution for  another university. The most important source of information and  cooperation for the OU therefore was the Moodle community itself. As  Sclater illustrates: &ldquo;What we\'ve found is that with Moodle, we\'re part  of the world wide community, and that\'s really the best forum for  collaboration and development.&rdquo; This means that you can get almost  instant feedback for any development that you publish, and you may find  answers for anything that you might want to develop. And by having a  large user base, which Moodle certainly has with roughly 28 million  users and 2,8 million courses, most bugs and glitches are found very  quickly. Responding to the question if the University has a concrete  partner university, or outside support company somewhere in the UK or  Europe, Sclater says: &ldquo;It wouldn\'t make sense to restrict it to the UK  or Europe. You\'re not getting all the expertise that\'s around.&rdquo;</p>
<p>The OU cooperates with the Moodle community in various ways, explains  Sclater. On the one hand, the University is attending Moodle  conferences and forums as participants&nbsp; or speakers. These are important  events for the exchange of information and ideas with other users.  Through such events the Moodle community, including the OU, can get a  feel for what directions future developments should take and which  functionalities need to be enhanced or developed.</p>
<p>The staff in charge of the maintenance of the OU VLE is constantly  monitoring and contributing to discussions at Moodle.org that are in the  area of their interest. This ensures that the OU is always up-to-date  with the latest developments and ideas of the community. Furthermore,  this is the prime source of user feedback, as bugs in the system can be  discussed or problems in new contribution highlighted, amongst other  aspects.</p>
<p>With regard to the code contributions, the OU uploads most  developments to the community that they consider ready for a wide use.  As mentioned earlier, this is very important for the community and the  OU alike, given that both benefit greatly from this. Through the forums  and discussion boards, the OU can learn about shortcomings of their  development and improve them accordingly.&nbsp; And even before releasing a  new development to the community, the University sometimes publishes  &ldquo;specifications for new modules or adaptations to them&rdquo;, says Sclater,  &ldquo;which gives us invaluable feedback and also keeps others informed on  what we\'re doing.&rdquo; In addition to the discussions and conversations that  take place on Moodle.org, the OU also benefits from a bug log that lets  them know exactly what errors occur with the system, if the users  decide to report these. This is an essential source of feedback to the  developers at the OU, given that it can tell them exactly which errors  occur most frequently, and which they consequently have to fix.</p>
<p>With regard to community activities (i.e. code submission,  discussion, etc.) the OU mainly focuses on the Moodle.org website. Next  to this however, there is also Moodle.com, which operates independently  and where a large group of so-called Moodle Partners offers a range of  commercial services to Moodle users, which may enhance the system  according to specific needs. The developments that have been initiated  through this channel, are not automatically streamed back to the Moodle  system at Moodle.org. The team at the OU is therefore commissioning  relevant contributions from the Moodle.com website, such as &ldquo;new roles  and permissions infrastructure and accessibility enhancements&rdquo; to the  Moodle.org website, explains Sclater. This is an important task, as it  helps to ensure that all Moodle users can benefit from developments that  take place within the Moodle ecosystem. Thus, in a nutshell, the OU has  drawn important information from other educational institutes, and has  cooperation with them in several projects, but for the development and  maintenance of their VLE, the online community has been the best partner  of choice.</p>
<p align="right">[<a title="The Open University UK: creating a win-win situation by sharing code and content" class="internal-link" href="#section-0">top</a>]</p>
<p><a name="section-8"></a></p>
<h2>Evaluation</h2>
<p><a name="section-9"></a></p>
<h3>Achievements / Lessons learned</h3>
<p>The introduction of Moodle was a &ldquo;very ambitious, well funded, and  highly structured programme&rdquo;, that was &ldquo;probably typical for this  institution&rdquo; as Sclater explains. Given that distance communication is  at the core of the OU\'s method of operation this very structured  approach appears absolutely necessary to ensure that the system would  reliably do what it needed to do.</p>
<p>With regard to the choice of an Open Source environment for their  VLE, the University had tried different systems, of which Moodle simply  appeared as the best choice for the OU. Admittedly&nbsp; the system still  required a large number of&nbsp; of modifications, improvements, and  additions,&nbsp; but today the system fulfils the OU\'s requirements. &ldquo;The  fundamental point is that we have a working Virtual Learning Environment  that is scalable, robust and feature rich and that is being used  increasingly in our courses&rdquo; highlights Slater. Even though some people  would have liked to see a dedicated commercial support partner in this  process, the team in charge of the VLE quickly realized that the best  source of expertise is freely reachable through the Moodle community.  The invaluable feedback that they get for code contributions in the form  of new developments or enhancements, through bug reports and  discussions has become essential to the work on the OU\'s VLE. The  altruistic approach clearly is a welcome addition to this, as&nbsp; not only  the OU can benefit from this large project, but also any other Moodle  users world wide. The reasons for this give-and-take relationship are  thus of a mutual benefit, which is an important backbone of the Moodle  community. As McAndrew explains, the same has been true for the content  side at OpenLearn, where giving back to the community and sharing  content was a motivation that made the project interesting for most  people involved.</p>
<p>In addition to these altruistic motivations, the OU also sees a clear  pragmatic benefit in the sharing of code and content. The OpenLearn  platform, as McAndrew states, attracts many visitors from outside the  University. This in turn can translate in students that register for  courses at the University, given that it may spark the interest of new  students. Thus, &ldquo;it has been a success operating openly for the  University itself, it has helped its image, [and] it has helped public  access&rdquo;, as he sums it up. According to estimations the team has made,  the number of students that registered&nbsp; at the OU through the OpenLearn  platform is roughly 11000 since the publication of the platform.  Operating openly consequently brings financial benefits as well, while  giving the rest of the world content and developments.</p>
<p>Especially in the early phase of the project, the OU however also  faced several barriers to which solutions had to be found. Sclater  mentions a few points, which he has also described in a book chapter on  strategic IT management of learning institutions (Sclater, 2008):</p>
<ul>
    <li><em>Lack of awareness</em>: Especially in organisations relied  heavily on a print-based approach for the communication and distribution  of their learning material, moving the focus on an Internet-based  approach might be a challenge. It is therefore essential to communicate  the advantages of these working methods and to give clear instructions  on how to use them.</li>
    <li><em>Lack of incentives</em>: Although the  senior levels at the OU advice academic staff to include more e-learning  methods in their work, and produce their content around online  platforms, some members of staff are still reluctant to do so. Given  that a students and internal resources are increasingly centred around  e-learning platforms (i.e. the VLE), academic staff is pressured into  using these methods increasingly as well. In this process, once again,  it is important to communicate new working methods and give clear  assistance where needed.</li>
    <li><em>Concern to avoid alienating students</em>:  There is the concern that relying heavily on e-learning methods might  exclude some students from participating in courses, as Internet access  is still not comparable to access water. The OU however sees that it  should rather focus on leading in new technologies than bowing down to  decreasing trends. Already in the 1970s and 1980s the OU has faced  similar discussion with the introduction of television-based learning  methods, which have diminished quickly with the spread of TVs and audio  cassettes. Similar to this, the OU considers that already now about 64%  percent of all households in the UK have broadband Internet access, and  that this is very likely to increase even more throughout the UK and  Europe.</li>
    <li><em>Risk aversion</em>: There is justified concern  within the OU that using a system which is under development might be a  risk, seeing that it might be unreliable or that functionalities and  user interface might change. The VLE development team however made sure  that the first version deployed was stable and that only improvements  would be added to the system in the future. Basic functions, user  interface, and access system would remain the same, and issues with the  stability of the system were tackled in advance. Of course, there might  be a problem here and there with the system, but this can happen to any  other finished system as well, which might be less modular or flexible,  making it harder to find a solution.</li>
</ul>
<p>These are just the first barriers such a development might face, and  there are numerous other that Sclater explains in detail in his book  chapter.</p>
<p><a name="section-10"></a></p>
<h3>Future plans</h3>
<p>In the future the OU will continue to work on improving Moodle, and  integrating previous systems into their Moodle VLE. As user created  content and participation on Internet platforms is escalating as part of  the so-called Web 2.0, the OU is trying to find ways to incorporate  this in their online platform. The OU is developing a &ldquo;a roadmap for the  things we want to do in and with Moodle in the future&rdquo;, says Sclater.  Already by now, the University is for example present in the virtual  world of Second Life, given that an increasing number of students has  accounts there. The University hopes to engage in a variety of Web 2.0  communities as they see the potential of these for future learning and  communication spaces. Given that students are increasingly used to  participating actively in the social networks of the Internet, in  whatever form this may be, the OU is seeking to integrate this in their  work. As universities and other institutions are still experimenting  with this and as that there is constant change of social platforms, the  OU is not yet decided on what format they want to employ, but the topic  is certainly very interesting for the future.</p>
<p>With the dramatic spread of smart phones and hand-held computers, the  OU is also thinking of ways to incorporate these technologies into  their communication and information&nbsp; strategy. &ldquo;We are trying to have an  alternative mobile version&nbsp; of Moodle, because I think that smart  phones are going to be a massive way of how people are going to access&nbsp;  online content in the future.&rdquo; Sclater notes.</p>
<p>With regard to the OpenLearn platform, McAndrew is participating in  ongoing research projects on the investigation of the consequences of  open learning models, and their value to learners outside the  University. Together with a team of researchers from various  universities, they are developing ways to analyse the impact of open  education by employing methods on analytics. The progress and the  outcomes of this research can be found at the project website <a class="external-link" href="http://olnet.org/">www.OLnet.org</a>.</p>
<p><a name="section-11"></a></p>
<h3>Conclusion</h3>
<p>The deployment of Moodle and the free release&nbsp; of learning material  as part of the OpenLearn project at the Open University gives a fair  indication of how paradigms in the educational sectors are changing.</p>
<p>From a technical perspective, the choice of Moodle as the OU\'s VLE  shows how Open Source products can be well capable of competing with  proprietary solutions. It was and is seen as the best available solution  that would&nbsp; meet the OU\'s demands on stability, flexibility,  scalability, and also very important: support. Compared to commercial  software deployments, Moodle does not rely on one support partner, but  features a community of users world wide. With more than 2,5 million  registered courses and roughly 28 million users, this is a substantial  source of feedback and information, which is invaluable to the work of  the OU. By contributing to this community with their own developments,  they create a win-win situation, as their tools improve with all the  feedback and assistance, and all others users benefit from the  additional functionalities added by the OU.</p>
<p>From a social perspective, the OpenLearn project also shows potential  new ways on how open educational resources, such as learning materials,  might be produced and shared within free and open collaborative  environments. With OpenLearn, the OU has made an important step in  making content freely available for learners outside the realm of the  University, who might not be able to access quality learning material  otherwise. This way, the value of the content very likely increased , as  a much higher numbers of learners can benefit from it. And besides the  benefits for all learners that access the content for free, the OU  benefits with regard to the positive image attached to sharing content.</p>
<p>With regard to change management, the OU\'s case shows&nbsp; that the real  costs of introducing a new system do not trace back only to software  licenses, development work or hardware acquisitions, but also to the  change management. The OU\'s case confirms once again&nbsp; that old habits  have to be broken and resistance to be overcome, which in the case of  the OU was done as a step-by-step approach, with guidance of every step  that helped fundamentally in creating acceptance and understanding.</p>
<p>Clearly, relying heavily on the Internet and sharing the content of  whole courses might be new and strange to people that were used to  traditional ways of communication and dissemination models. With regard  to the OU, one might argue that it is acting as a forerunner of general  trends, which are by-products of the Internet, and which have the  potential to change traditional education systems for the benefit of the  greater society. Projects such as OpenLearn underline this idea, and it  is to see if these effects will actually change the learning  environment in the future.</p>
<p align="right">[<a title="The Open University UK: creating a win-win situation by sharing code and content" class="internal-link" href="#section-0">top</a>]</p>
<p><a name="section-12"></a></p>
<h2>Links</h2>
<p>&nbsp;</p>
<ul>
    <li><a class="external-link" href="http://openlearn.open.ac.uk/">Open Learn &ndash; Learning Space</a></li>
    <li><a class="external-link" href="http://www3.open.ac.uk/media/fullstory.aspx?id=7354">The Open University builds student online environment with Moodle and more </a></li>
    <li><a class="external-link" href="http://sclater.com/blog/">Niall Sclater\'s Blog &ndash; Virtual Learning</a></li>
    <li><a class="external-link" href="http://moodle.org/stats/">Moodle Statistics</a></li>
    <li><a class="external-link" href="http://moodle.org/mod/forum/discuss.php?d=34002">Moodle Announcements &ndash; Open University chooses Moodle! </a></li>
    <li><a class="external-link" href="http://olnet.org/research">Olnet beta &ndash; Researching the open world </a></li>
    <li><a class="external-link" href="http://www.oss-watch.ac.uk/events/">OSS Watch&nbsp; - the Open Source Software Advisory Service</a></li>
</ul>
<p>&nbsp;</p>
<p><em>This case study is brought to you by <a href="../..">JoinUp</a>, a project of the European Commission\'s <a class="external-link" href="http://ec.europa.eu/idabc/">IDABC project</a>.</em></p>
<p><em>Author: Gregor Bierhals, <a class="external-link" href="http://www.merit.unu.edu/">UNU-MERIT</a><br />
</em></p>
<p><em>This study is based on interviews with Niall Sclater, director of  Learning Innovations at The Open University, Patrick McAndrew, director  of Research and Evaluation for the Open Content Initiative and  Associate Director (Learning and Teaching) in the Institute of  Educational Technology. Additional information has been drawn from the  book chapter \'E-Learning at The Open University UK\' (Sclater, N., 2008)  in Stratmann, J. &amp; Kerres, M. E-Strategy, Strategisches  Informations-management f&uuml;r Forschung und Lehre, Waxman Verlag GMBH,  M&uuml;nster. Reviewed by: Niall Sclater, The Open University &ndash; UK, Patrick  McAndrew, The Open University &ndash; UK, Andreas Meiszner, UNU-MERIT - NL</em></p>
<p align="right">[<a title="The Open University UK: creating a win-win situation by sharing code and content" class="internal-link" href="#section-0">top</a>]</p>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'FriKomPort: Sharing code, costs, and benefits';
	$path = 'software/page/frikomport-sharing-code-costs-and-benefits';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<h1 class="documentFirstHeading"><span id="parent-fieldname-title">             FriKomPort: Sharing code, costs, and benefits         </span><span class="documentAuthor">       </span><span class="documentModified"><br />
</span></h1>
<p class="documentDescription"><span id="parent-fieldname-description">             In 2006 the Norwegian region of Kongsberg launched a portal  to coordinate and administrate courses and trainings for municipality  staff. The solution was developed  with open source tools, as a common  effort of all seven municipalities of the Kongsberg region. Once the  project was working successfully, other municipalities and organisations  became interested and wanted to use the portal as well. The Kongsberg  region eventually published FriKomPort, as the portal was called, as a  free software application under the GPL. The portal today is used by  more than 50 organisations, and practically all users are very confident  about the solution. For the future the FriKomPort leaders hope to share  the portal with even more municipalities by publishing an English  version.          </span></p>
<dl style="" class="portlet toc" id="document-toc">
    <dt class="portletHeader">Contents</dt>
    <dd class="portletItem">
    <ol>
        <li><a href="#section-0">Introduction</a></li>
        <li><a href="#section-1">Organisation and political background</a></li>
        <li><a href="#section-2">Budget and Funding</a></li>
        <li><a href="#section-3">Technical issues</a></li>
        <li><a href="#section-4">Change management</a></li>
        <li><a href="#section-5">Effect on government services</a></li>
        <li><a href="#section-6">Cooperation with other public bodies</a></li>
        <li><a href="#section-7">Evaluation</a>
        <ol>
            <li><a href="#section-8">Achievements / Lessons learned</a></li>
            <li><a href="#section-9">Future plans</a></li>
            <li><a href="#section-10">Conclusion</a></li>
        </ol>
        </li>
        <li><a href="#section-11">Links</a></li>
    </ol>
    </dd>
</dl>
<div id="parent-fieldname-text">
<p><a href="../../system/files/doc/IDABC.OSOR.casestudy.FriKomPort.odt" class="document doc" title="FriKomPort: Sharing code, costs, and benefits - ODT">FriKomPort: Sharing code, costs, and benefits</a></p>
<p><a href="../../system/files/doc/IDABC.OSOR.casestudy.FriKomPort.pdf" class="document pdf" title="FriKomPort: Sharing code, costs, and benefits - PDF">FriKomPort: Sharing code, costs, and benefits</a></p>
<a name="section-0"></a>
<h2>&nbsp;Introduction</h2>
<p>Norway is a country with vast landscapes and long distances in  between its 431 municipalities. The municipality plays an important  role, since it provides the framework for primary education,  unemployment, health, and other social services. As most municipalities  are rather small however, budget restraints are evident in most  communities. An example of this can be seen in the Kongsberg region,  which is one of 19 Norwegian administrative regions, and which includes  seven municipalities near the town of Kongsberg.</p>
<p>It was in 2005 that Britt Inger Kolset, the region\'s ICT program  coordinator, came up with the idea for a project to solve a problem that  all the municipalities shared. They all offer courses for their staff  concerning issues such as information about the municipality\'s ICT  system, public law, or public health, which every employee has to attend  at some point. To administer and coordinate these courses, Kolset  recognised that there was a need for a system that would make it easier  for people to register for courses, and for the organisers to inform  participants about changes. &ldquo;We searched the market, but we didn\'t find  any solution that would just work. So we realized that we had to develop  a portal by ourselves. For this we wanted to focus on a solution that  other municipalities could re-use&rdquo;, Kolset explains. This was the  starting point for the development of the Fri KompentansePortal (Free  Competence Portal), FriKomPort.&nbsp; The portal was developed using open  source tools, and its code is&nbsp; freely available for reuse under the GPL.  After initially being used only by the seven municipalities in the  Kongsberg region, the number of organizations and municipalities that  use it today has risen to 58.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="FriKomPort: Sharing code, costs, and benefits">top</a>]</p>
<a name="section-1"></a>
<h2>Organisation and political background</h2>
<table width="301" align="right" class="vertical listing">
    <tbody>
        <tr>
        </tr>
        <tr>
            <th colspan="2">Quick Facts</th>
        </tr>
        <tr>
            <td><em>Project name</em></td>
            <td>
            <p>FriKomPort</p>
            </td>
        </tr>
        <tr>
            <td><em>Sector</em></td>
            <td>
            <p>eGovernment</p>
            </td>
        </tr>
        <tr>
            <td><em>Start date</em></td>
            <td>December 2006</td>
        </tr>
        <tr>
            <td><em>End date</em></td>
            <td>ongoing</td>
        </tr>
        <tr>
            <td><em>Objectives</em></td>
            <td>
            <p>Municipality staff course administration</p>
            </td>
        </tr>
        <tr>
            <td><em>Target group</em></td>
            <td>
            <p>Municipalities, other sectors</p>
            </td>
        </tr>
        <tr>
            <td><em>Scope</em></td>
            <td>National</td>
        </tr>
        <tr>
            <td><em>Budget</em></td>
            <td>Starting budget 250.000 Kroner<br />
            (&euro; 29.000). Currently approx. 230.000 Kroner (&euro; 26.000)</td>
        </tr>
        <tr>
            <td><em>Funding</em></td>
            <td>Initially funded by the Kongsberg<br />
            region. Now funded by all participating regions and municipalities</td>
        </tr>
        <tr>
            <td><em>Achievements</em></td>
            <td>
            <p>58 organisations are using the platform daily (50 of which are municipalities)</p>
            </td>
        </tr>
    </tbody>
</table>
<p>Initially the FriKomPort project was only intended to serve the seven  municipalities of the Kongsberg region: Flesberg, Kongsberg, Nore and  Uvdal, Notodden, Rollag, Tinn and &Oslash;vre Eiker.&nbsp; All seven municipalities  had the same troubles in the administration of their courses, and  sharing this development was going to simplify their internal processes  substantially. Although their courses were mostly aimed at one  municipality at a time, FriKomPort has also made it much easier to  organise courses for staff from several of the municipalities. This  helps to save time and money, e.g. by making sure that courses are fully  booked, even if a single town does not have enough staff to fill the  ranks.</p>
<p>After about half a year of successfully running the platform, other  municipalities started to hear about FriKomPort and the interest for the  project grew all across Norway. Step by step,&nbsp; the number of regions  and municipalities increased from the initial seven to 58 public bodies,  50 of which were municipalities and eight other organisations from the  educational and the political sector. Among them are the municipality of  Arendal, and the University of Agder. Both came across FriKomPort after  being in contact with Kolset, the alleged &ldquo;mother of the system&rdquo;, as  described by Brit Maria Marcussen from the municipality of Arendal,  which makes use of&nbsp; FriKomPort.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="FriKomPort: Sharing code, costs, and benefits">top</a>]</p>
<a name="section-2"></a>
<h2>Budget and Funding</h2>
<p>The initial investment for the FriKomPort project was made entirely  by the region of Kongsberg. Getting the funding approved by the region  was easy, says Kolset.&nbsp; The need for such a platform was clearly there  and easy to demonstrate, and the sums required were not very large.</p>
<p>For the development of the platform, a call for tender was published.  About six companies presented their idea of a course administration  platform. At the end &ldquo;the one we chose was the cheapest, and the only  one relying on open software&rdquo;, as Kolset remembers the process. Know IT  Objectnet was the ideal partner for the region. The budget for the first  phase of the project was 150.000 Norwegian Kroner (approximately &euro;  17.000) and for the second phase another 100.000 Kroner (approximately &euro;  11.000). &ldquo;The second phase [which followed shortly after the first] was  basically just an update&rdquo;, Kolset adds. The initial investment of  250.000 Kroner was thus borne by the Kongsberg region.</p>
<p>After about half a year of successfully running the project in  Kongsberg, the number of municipalities interested in using the platform  increased by the day. Eventually, the national government also realized  the potential of sharing such a project, and provided about 500.000  Kroner (approximately &euro; 51.000) for the establishment of a platform  where the application could be shared, and for the publication of the  source code. Thereafter the number of users increased rapidly. Already  at the start of the project, the Kongsberg region made a contract with  an application service&nbsp; provider, stating that new users could make use  of their services for a fee of 6000 Kroner (approximately &euro; 620) per  year. Kolset explains proudly that &ldquo;this was a very smart thing to do,  because there are no difficulties for new members to use the solution.  They don\'t have to download the solution or update their infrastructure.  They can just buy this as a service [&hellip;], which is very cheap&rdquo;. For  Terje Sagstad, chief engineer at the IT department of the University of  Agder, this was the best and cheapest solution he could possibly find  for the administration of staff courses at his university.</p>
<p>In addition to the 6000 Kroner for the application hosting service,  the member organisations also have the option to pay a voluntary fee of  8000 Kroner (approximately &euro; 900), which is used to improve the portal  according to the wishes of the users. To determine key points which need  improvements or future functionalities, all users, including the  non-paying users, have the chance to meet annually at a conference in  Oslo to discuss these issues. After several brainstorming sessions, a  group of representatives of all participants makes a list of all new  suggestions, on which the paying members can vote in the course of the  year. Sagstad, Marcussen and Kolset explain the system jokingly: &ldquo;It\'s  like in the Eurovision song contest. Someone gets the points&rdquo;. Out of  the 58 organisations and municipalities that use FriKomPort, &ldquo;29  municipalities have bought this kind of service&rdquo;, Kolset&nbsp; says. After  the voting process, those points that have been ranked highest will be  reported to Know IT Objectnet, which adds them to the software.</p>
<dl class="image-right captioned">
    <dt><img width="277" height="87" title="FriKomPort: Sharing code, costs, and benefits 1" alt="FriKomPort: Sharing code, costs, and benefits 1" src="../../system/files/images/kongsbergregionen-stor.gif" /></dt>
    <dd style="width:277px" class="image-caption">Coat of arms of the 7 municipalities of the Kongsberg region &copy; Kongsbergregionen, 2009</dd>
</dl>
<p>The organisations that use FriKomPort find the solution ideal because  of the low cost and the easy and cheap maintenance through the  application service provider. With regard to the financial resources  invested in the project at the University of Agder, Sagstad sums it up:  &ldquo;So far the university has invested about 20.000 Kroner [approximately &euro;  2300) in the project, which would be tenfold this amount with  proprietary software. So the board of the university was quite  impressed&rdquo;.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="FriKomPort: Sharing code, costs, and benefits">top</a>]</p>
<a name="section-3"></a>
<h2>Technical issues</h2>
<p>As the ICT direction at the Kongsberg region itself did not have the  expertise in-house to develop such a platform &ldquo;we talked to Know IT, and  they showed us which free software we should use for the development.  We didn\'t know much about this, but I think they did a good job&rdquo;, Kolset  explains.</p>
<p>FriKomPort was developed with Java and PHP. This kept the costs to a  minimum, while at the same time ensuring functionality and  sustainability of software. The content management system behind  FriKomPort is eZ Publish, which is also freely available under GPL  license. For the database functionalities, Know IT relied on MySQL,  which allows multi-user access to all databases on the system. This core  element of FriKomPort is also available under the GPL.</p>
<p>The development work itself only took about three month until the  project was out of its beta phase. At first, Know IT presented a demo of  the platform to the ICT department of the Kongsberg region. Then, after  discussing the software, additional functions were added and bugs  resolved, until the software was fully functional in mid-2006.</p>
<dl class="image-left captioned">
    <dt><img width="300" height="400" title="FriKomPort: Sharing code, costs, and benefits 2 " alt="FriKomPort: Sharing code, costs, and benefits 2 " src="../../system/files/images/BIK.jpg" /></dt>
    <dd style="width:300px" class="image-caption">Britt Inger Kolset, director of FriKomPort and ICT coordinator at the Kongsberg region &copy; Britt Inger Kolset, 2009</dd>
</dl>
<p>One of the key aspects in the development was the usability of the  solution, as it would be used on a daily basis by a broad variety of  people employed by the municipalities and the other organisations.  Especially Sagstad, who has a background in software development, is  amazed by the platforms usability: &ldquo;It\'s a simple system, it\'s quite  easy to use, it\'s not rocket science, but it just works!&rdquo;, he concludes.  Even though the platform was originally not intended for the use in the  educational sector, it only needed a few changes in the wording of  buttons and tables for the use at Sagstad\'s university. &ldquo;The basics of  how to administrate courses are the same for a municipality or a higher  education organisation, and so 80 per cent of the software was ready to  run from the beginning&rdquo;, Sagstad explains.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="FriKomPort: Sharing code, costs, and benefits">top</a>]</p>
<a name="section-4"></a>
<h2>Change management</h2>
<p>Before the introduction of FriKomPort to the municipalities in the  region of Kongsberg, there was no system for the administration of staff  courses. They were&nbsp; organised mostly by using a pen and a paper, which  clearly did not allow for the same functionality as a computer-based  system. This&nbsp; explains why users at the municipalities were happy to  have a system, which kept them updated about any changes, and where they  could easily register and de-register for a course. With regard to the  implementation Kolset recalls: &ldquo;There was a project plan, which  consisted of implementing the software and giving the necessary  training. For this we also cooperated with Know IT&rdquo;. The training  however was done in a few minutes, as the software is very easy to use  and almost self-explanatory.</p>
<p>Basically the same happened at the University of Agder. Sagstad  remembers the introduction as follows: &ldquo;One of the key success factors  is that it is easy to use. I introduced the system to several people and  let them try it out. In less than 5 to 10 minutes they had learned the  system and were registering courses&rdquo;. In his eyes,&ldquo;it\'s a software made  for humans&rdquo;, and in this respect &ldquo;quite a success story really&rdquo;, as he  says enthusiastically.</p>
<p>At the municipality of Arendal, although the courses were already  coordinated with the help of a computer, &ldquo;we needed something more  elegant and secure&rdquo;, Marcussen explains. Here, lists were previously  send around via email and participants would just add their name to a  list. This was often problematic, as list would get lost along the way,  or names would be deleted accidentally. Getting access to FriKomPort was  easy: &ldquo;I just made a phone call, they sent us a contract, we signed,  and then it was taken care of&rdquo;, Marcussen says. For the registration  thereafter, &ldquo;all we did was to change the link [to the courses]. It was  really not necessary to tell everyone how it worked&rdquo;, as using the  platform turned out to be so easy. &ldquo;Only a few people called and asked,  but most people found it quite OK and did not have any problems&rdquo;.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="FriKomPort: Sharing code, costs, and benefits">top</a>]</p>
<a name="section-5"></a>
<h2>Effect on government services</h2>
<p>For the municipalities and organisations that use FriKomPort, the  administration and coordination of internal courses and trainings has  improved substantially with the platform. As the hosted solution is  quite cost effective and requires virtually no maintenance, even  municipalities with smaller budgets and fewer resources can employ it in  their system.</p>
<p>The number of people using FriKomPort on a daily basis probably goes  well in the thousands. In the municipality of Arendal alone &ldquo;there are  about 1500 to 2000 people using it frequently&rdquo;, as Marcussen says.  There, since the start of FriKomPort in early 2007, 421 courses have  been registered on the platform.</p>
<p>For Sagstad another important factor for the success of the platform,  and also for Open Source Software in general, is the need for a sharing  model or &ldquo;Delingsmodell&rdquo;, as he calls it in Norwegian. In his eyes,  this is the most important point where Open Source Software often lacks  in attractiveness to government services and the public sector. &ldquo;Today,  free software is not part of a value chain like commercial software,  because you have this piece of software that you can download for free,  but what\'s next? With proprietary software there is support, and a whole  life cycle, and often this is not the case for free software&rdquo;, as he  explains the need for a Delingsmodell. Especially for smaller  organisations and municipalities, the resources to dive into the Open  Source ecosystem for support are simply not there, which leaves them  only with proprietary solutions. &ldquo;The free software has to be cost  effective, it has to add value, it should lead to a sharing of code and  development, as well as the sharing of knowledge and experience. If it  can meet all those points, then&nbsp; it can be a real alternative to  proprietary software&rdquo; Sagstad highlights. With FriKomPort, he sees that  all these conditions are met, which makes the platform as successful as  it is: the initial code if freely accessible, it can be improved and  developed with the input with all users,the experience can be shared,  which represents some form of support. It stands in a life cycle that  goes beyond the development and the initial publication of its code.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="FriKomPort: Sharing code, costs, and benefits">top</a>]</p>
<a name="section-6"></a>
<h2>Cooperation with other public bodies</h2>
<p>For the FriKomPort project cooperation was very important from the  start on, as the first phase of the project was already a cooperation of  all municipalities of the Kongsberg region. With regard to the initial  idea, Kolset recalls: &ldquo;The idea to share the project with other  municipalities [outside of Kongsberg] was there, but we wanted to wait a  bit. As the project became more and more&nbsp; popular, we travelled the  country and presented FriKomPort to other municipalities and regions&rdquo;.  In July 2007, after the portal had been up and running for seven month  &ldquo;there was the [&hellip;] the region of Grenland [consisting of six  municipalities] that wanted to use FriKomPort. Together we were then 13  municipalities using the portal&rdquo;. Step by step the number of using  organisations grew, until it reached 20 municipalities by the end of  2007, and eventually 58 organisations by the end of 2008, 50 of which  were municipalities.</p>
<dl class="image-right captioned">
    <dt><img width="248" height="350" title="FriKomPort: Sharing code, costs, and benefits 3 " alt="FriKomPort: Sharing code, costs, and benefits 3 " src="../../system/files/images/terje.jpg" /></dt>
    <dd style="width:248px" class="image-caption">Terje Sagstad, Chief Engineer at the IT Department of the University of Agder &copy; Terje Sagstad, 2009</dd>
</dl>
<p>Through the annual conferences, where all users are invited, there is  a good exchange of ideas and experiences. Together with representatives  of all users, be they from municipalities, political parties, or  educational facilities, they work on finding ideas on how to improve the  portal for their needs. These meetings are an ideal platform to  exchange experiences and suggestions for improvements. Through the  voting system, where those users that pay the voluntary fee of 8000  Kroner can vote on suggestions, all users can at least indirectly take  part in shaping the future course of the solution.</p>
<p>The code for the software is freely available for download to anyone at <a href="https://projects.knowit.no/display/FRIKOMPORT/Fri+KompetansePortal;jsessionid=6C028C7F8F58F287C954BBB3E24CAF4B" class="external-link">http://projects.unified.no</a>,  which is hosted by Know IT. Unfortunately &ldquo;the solution is only  available in Norwegian, but I talked to Know IT and they say that it  would be rather simple to make this available in English&rdquo;, Kolset says.  After all, she says that they &ldquo;have genuine interest in sharing and  spreading this to as many municipalities as possible&rdquo;. In this respect,  they see it as an option to publish FriKomPort on the OSOR platform and  repository in the near future, once the language barrier is removed.  This would clearly extend their user group tremendously, as a product  like this is likely&nbsp; to be in demand at municipalities and other  organisations all over Europe.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="FriKomPort: Sharing code, costs, and benefits">top</a>]</p>
<a name="section-7"></a>
<h2>Evaluation</h2>
<a name="section-8"></a>
<h3>Achievements / Lessons learned</h3>
<p>The general tone of all users interviewed for this study is that the  software just works. As Sagstad puts it,&nbsp; &ldquo;there are basically no  problems with the system, which is how it should always be&rdquo;. In contrast  to many other software solutions, be they proprietary or open source,  FriKomPort appears to be working at very low costs and with very little  problems. In addition, the fact that hardly any training is required to  understand the system equally underlines the success of the portal. The  developers were thus making sure that the software may be as easily  usable as possible, which contributed to the portal\'s success  tremendously. &ldquo;And if there\'s something you need to be fixed&rdquo; Sagstad  says &ldquo;Know IT will help you via the free phone support.&rdquo;</p>
<p>Another important aspect for the success in the eyes of Kolset is the  application service provider, which enables even small communities with  very limited resources to use the system. As there is no maintenance  necessary, and no new hardware required, the solution is ideal for most  municipalities.</p>
<p>According to Sagstad the portal is successful, &ldquo;because we are taking  FriKomPort beyond the initial free software code and embed it in a  chain of value added services in the organizations&rdquo;. It is thus not only  a free piece of software with no support, but instead a growing product  with a healthy community that develops the software continuously.</p>
<a name="section-9"></a>
<h3>Future plans</h3>
<p>For the future Kolset and Sagstad have very ambitious aims with  regard to the promotion of free software in the public sector. Sagstad  says: &ldquo;We have huge expectations, because we want to see that even very  small organisations will be able to use free software&rdquo;. In order to  establish some kind of framework in which especially projects in the  early phase can turn to for advice, Kolset is working together with FriProg,  the Norwegian Open Source Competence Centre. These plans are however  still in an early phase, though Kolset and Sagstad are excited about the  future.</p>
<a name="section-10"></a>
<h3>Conclusion</h3>
<dl class="image-left captioned">
    <dt><img width="400" height="300" title="FriKomPort: Sharing code, costs, and benefits 4" alt="FriKomPort: Sharing code, costs, and benefits 4" src="../../system/files/images/Skarverenn 09.jpg" /></dt>
    <dd style="width:400px" class="image-caption">Brit Maria Marcussen, ICT coordinator at the municipality of Arendal &copy; Brit Maria Marcussen, 2009</dd>
</dl>
<p>FriKomPort appears to be a very successful project, as basically all  participants are very glad about the solution. The factors that make  this portal so successful are the user interface, the low cost of the  product, its relative universal applicability, and the fact that the  system is running without bugs and other issues.</p>
<p>The approach of offering FriKomPort as a service rather than a  locally installed solution makes it easy for different organisations to  start using the service. There is no need for maintenance or hardware  upgrades, or for integration with local systems. All this substantially  lowers the barriers to entry. At the same time, the fact that users can  discuss the further development of the software lets the solution  continually adapt to the needs of the people who use it on a daily  basis, providing a much closer feedback loop than what is available for  most programs.</p>
<p>Compared to other software solutions of a similar scale, FriKomPort  has had the advantage that the system&nbsp; filled a space where hardly any  software was in use before. In this respect it certainly brought  benefits to most users, as basically all options related to the  coordination and administration were improved. In addition, FriKomPort  offers a simple solution for a task that is rather simple and clearly  delimited.<br />
FriKomport was allowed to mature step by step. It was  first developed and tested in regular use in the Kongsberg region. New  users were only added once the solution was stable and functional,  avoiding numerous frustrations on the way.</p>
<p>Making FriKomPort available in English and other languages would  likely boost the number of users substantially. Offering the software on  multiple online platforms and repositories, such as OSOR, will be of  great help, as this those are central meeting points for relevant users.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="FriKomPort: Sharing code, costs, and benefits">top</a>]</p>
<a name="section-11"></a>
<h2>Links</h2>
<ul>
    <li><a href="https://projects.knowit.no/pages/viewpage.action?pageId=819212" class="external-link">FriKomPort summary</a> (Norwegian)</li>
    <li><a href="https://projects.knowit.no/display/FRIKOMPORT/Fri+KompetansePortal" class="external-link">FriKomPort page at KnowIT</a> (Norwegian)<a href="http://www.knowit.no/index.php/knowiten/References/Fri-KompetansePortal" class="external-link"><br />
    </a></li>
    <li><a href="http://en.wikipedia.org/wiki/Kongsberg" class="external-link">The Kongsberg region</a> (Wikipedia)</li>
    <li><a href="http://www.uia.no/" class="external-link">The University of Agder</a> (Norwegian)<a href="http://www.friprog.no/In-English/" class="external-link"><br />
    </a></li>
</ul>
<p><br />
Author: Gregor Bierhals, UNU-MERIT <br />
This  study is based on interviews with Britt Inger Kolset, FriKomPort  project director, Terje Sagstad, chief engineer at the University of  Agder\'s IT-Derpartment, and Brit Maria Marcussen, ICT coordinator at the  municipality of Arendal.</p>
<div align="right">[<a href="#section-0" class="internal-link" title="FriKomPort: Sharing code, costs, and benefits">top</a>]</div>
</div>
<p>&nbsp;</p>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'OpenCimetiere: Managing graves the open way ';
	$path = 'software/page/opencimetiere-managing-graves';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<p class="documentDescription"><span id="parent-fieldname-description">             </span><strong><span id="parent-fieldname-description">For the management of their cemeteries the city of Arles,  and its neighbouring municipalities Albi, Tarn and Dadou decided in 2006  that they needed to replace pen and paper with computers and software.  The solution had to be  secure, adaptable, and fully featured. The IT  direction of the city of Arles was in close contact with the open source  initiative OpenMairie, which presented many software products for the  use in the public sector. It was through this relationship that the four  municipalities took the initiative to start OpenCimetiere, an open  source management system for cemeteries. This was started with an  initialization phase in 2006, followed by a contribution phase in 2007,  where the software was further improved and extended. Today, the  software is used by over 300 municipalities inside and outside France,  and helps an increasing number of municipalities all over the world to  manage their citizens\' final resting places efficiently.         </span></strong></p>
<dl style="" class="portlet toc" id="document-toc">
    <dt class="portletHeader">Contents</dt>
    <dd class="portletItem">
    <ol>
        <li><a href="#section-0">Introduction</a></li>
        <li><a href="#section-1">Organisation and political background</a></li>
        <li><a href="#section-2">Budget and Funding</a></li>
        <li><a href="#section-3">Technical issues</a></li>
        <li><a href="#section-4">Change management</a></li>
        <li><a href="#section-5">Effect on government services</a></li>
        <li><a href="#section-6">Cooperation with other public bodies</a></li>
        <li><a href="#section-7">Evaluation</a>
        <ol>
            <li><a href="#section-8">Achievements / Lessons learned</a></li>
            <li><a href="#section-9">Future plans</a></li>
        </ol>
        </li>
        <li><a href="#section-10">Conclusion</a></li>
        <li><a href="#section-11">Links</a></li>
    </ol>
    </dd>
</dl>
<div id="parent-fieldname-text">
<p><a href="../../system/files/doc/IDABC.OSOR.casestudy.OpenCimetiere.odt" class="document doc" title="OpenCimetiere: Managing graves the open way - ODT">OpenCimetiere: Managing graves the open way - ODT </a></p>
<p><a href="../../system/files/doc/IDABC.OSOR.casestudy.OpenCimetiere.pdf" class="document pdf" title="OpenCimetiere: Managing graves the open way - PDF">OpenCimetiere: Managing graves the open way - PDF</a></p>
<a name="section-0"></a>
<h2>Introduction</h2>
<p>In 2006 the French city of Arles, which is located in the southern  Bouches-du-Rh&ocirc;ne department,&nbsp; decided that it had to introduce a system  for the management of cemeteries. With a population of about 50.000  inhabitants the city is fairly small. Nonetheless, it is the largest  community in France in terms of territory, due to its location at the  Camargue delta, which spreads between the two river arms of the  Petit-Rhone and the Grande-Rhone.</p>
<p>&ldquo;It is not very interesting from a political point of view, but in  fact it is difficult and important to manage cemeteries&rdquo;, says project  manager Francois Raynaud. Although the management of cemeteries appears  to be a novel function, it is mostly done in a rather old-fashioned  manner using pen and paper. The problem of managing cemeteries in this  way is that information is easily lost, which in turn can create  confusion, and lead to problems for the future administration of  cemeteries.</p>
<p>For Raynaud, who is working as the city of Arles\' IT director, the  solution to this problem was a software which would enable a city to  have full detailed records of all all graves and concessions, so that  this information would not be lost if there is a fire, or the relatives  of the deceased disappear. But instead of just searching the market for a  software solution, Raynaud felt the need to be independent from one  proprietary solution. He also wanted to be flexible with regard to the  functionalities of a cemetery management software. Beside his work at  the city of Arles he is also very engaged in the open source framework  project OpenMairie, which offers many open source programsfor a variety  of purposes. As the need for a software solution for the management of  cemeteries grew larger, Raynaud together with the help of many  contributors developed the first version of OpenCimetiere, which was the  first open source cemetery management system.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="OpenCimetiere: Managing graves the open way">top</a>]</p>
<a name="section-1"></a>
<h2>Organisation and political background</h2>
<p>Before the development phase of OpenCimetiere started, the city of  Arles was in close contact with the neighbouring cities and  municipalities of Albi, Tarn and Dadou. Those municipalities faced the  same problem as did Arles, regarding their cemeteries. They needed to  make sure that information pertaining to the graves and the deceased  would be available and accessible for the long term. All these  municipalities quickly realised the benefits of having a cemetery  management system which would not bring high costs, while offering a  secure way of storing information for an unlimited period of time. After  agreeing on the framework and a roadmap, Raynaud who by then was  appointed as the project manager of OpenCimetiere, consulted with  Adullact, a French organisation for the promotion and dissemination of  open source software. With their help the initialization phase of  OpenCimetiere was launched in 2006. In this phase the first functions of  the software were developed, and contributors were invited to include  new functionalities to the system.</p>
<p>The project quickly became increasingly popular, especially in the  French speaking world, and it is used in about 300 municipalities all  over France, in Belgium, Spain, and even as far afield as Santo Domingo.  In order to make the software even more useful for a wider public,  OpenMairie has launched an English version and a Spanish beta version by  the name of OpenCemetery and OpenCementerio, respectively.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="OpenCimetiere: Managing graves the open way">top</a>]</p>
<table width="301" align="right" class="vertical listing">
    <tbody>
        <tr>
        </tr>
        <tr>
            <th colspan="2">Quick Facts</th>
        </tr>
        <tr>
            <td><em>Project name</em></td>
            <td>
            <p align="justify">OpenCimetiere</p>
            </td>
        </tr>
        <tr>
            <td><em>Sector</em></td>
            <td>
            <p align="justify">Public</p>
            </td>
        </tr>
        <tr>
            <td><em>Start date</em></td>
            <td>2006</td>
        </tr>
        <tr>
            <td><em>End date</em></td>
            <td>ongoing</td>
        </tr>
        <tr>
            <td><em>Objectives</em></td>
            <td>
            <p align="justify">Improving the management of cemeteries</p>
            </td>
        </tr>
        <tr>
            <td><em>Target group</em></td>
            <td>
            <p>Municipality administrations</p>
            </td>
        </tr>
        <tr>
            <td><em>Scope</em></td>
            <td>National/International</td>
        </tr>
        <tr>
            <td><em>Budget</em></td>
            <td>N/A</td>
        </tr>
        <tr>
            <td><em>Funding</em></td>
            <td>
            <p align="justify">Internal resources/public sector</p>
            </td>
        </tr>
        <tr>
            <td><em>Achievements</em></td>
            <td>
            <p align="justify">Functioning software in three languages, used in over 300 municipalities</p>
            </td>
        </tr>
    </tbody>
</table>
<a name="section-2"></a>
<h2>Budget and Funding</h2>
<p>As OpenCimetiere is a project that is done largely in cooperation of  many contributors, there is no single dedicated budget. The financial  framework for the project is therefore mostly provided by internal  resources and individual dedication. Raynaud says that he does not know  the exact amount of money which has been spent on developing  OpenCimetiere, but is certain that it is not very large. Like many other  open source projects, the development of OpenCimetiere relies heavily  on contributions from the community. This means that there is no single  party absorbing the costs for development.</p>
<p>Though Raynaud is certain that the solution is much cheaper than  proprietary software solutions, he was not able to estimate the savings  yet, as the software has not reached full maturity yet. The development  is an ongoing process, and although the software is doing what it is  supposed to do perfectly, there are still new functions being added  continuously.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="OpenCimetiere: Managing graves the open way">top</a>]</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<a name="section-3"></a>
<h2>Technical issues</h2>
<dl class="image-left captioned">
    <dt><img width="400" height="223" title="OpenCimetiere: Managing graves the open way 2" alt="OpenCimetiere: Managing graves the open way 2" src="../../system/files/images/screenshot_opencimetiere.png" /></dt>
    <dd style="width:400px" class="image-caption">Screenshot of OpenCimetiere online demonstration&lt;br /&gt; </dd>
</dl>
<p align="left">OpenCimetiere itself is not an entirely new development. Essentially, &ldquo;</p>
<p>OpenCimetiere is an integration of existing components&rdquo; says Raynaud.  The contributors behind the software follow one credo, as he further  explains:</p>
<p>&ldquo;In France we say LAMP technology. L stands for Linux, A stands for  Apache, M for MySQL, and P for PHP&rdquo;. These are the essential tools that  are used for the development of the software.</p>
<p>The software\'s database management system is very flexible, allowing  municipalities to adopt the solution without having to deal with a new  database format. Initially only MySQL was supported. A year after the  initialization phase support for PostgreSQL was added. &ldquo;Because we use a  database abstraction layer, which is DB PEAR, we can use other  databases like Oracle or Microsoft SQL&rdquo;, Raynaud adds. The PostgreSQL  support came in the contribution phase, when General Infographique, a  French geographic information company, decided to contribute with its  core system to OpenCimetiere\'s functionality.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="OpenCimetiere: Managing graves the open way">top</a>]</p>
<a name="section-4"></a>
<h2>Change management</h2>
<p>OpenMairie at first was only a framework for a total of about 80  contributing developers, which mostly published demonstrations of  software solutions that were not mature and only of limited use. It was  only shortly before the launch of OpenCimetiere that OpenMairie started  to publish a catalogue of applications that were beyond the  demonstration status. This helped fundamentally in the promotion of  those applications, as an increasing number of people realized their  potential and usefulness for their purposes. In total there are today 18  applications in operation, of which OpenCimetiere is one.</p>
<p>For the success of the software it was important to have an  initialization phase, which started in the first year, and a  contribution phase, that was launched in 2007. This way it was possible  to establish the essential requirements of the software, as well as  possible packages that would be included in the future. Although the  software was lacking in functionality during the initialization phase,  it improved continuously with the help of contributors. &ldquo;With the help  of the community we become better and better&rdquo; explains Raynaud.  Additionally he further mentions that it is not necessarily the most  important ingredient to success to have many functions, but that the  solution &ldquo;has to function properly&rdquo;. By planing every step carefully,  the software could mature slowly without any significant problems.</p>
<p>Users can make contact with Raynaud and other developers through the  website of OpenMairie. The most common reason for contact is related to  minor issues in the installation process of the software, which could be  difficult for a non-technical person. As for most users however this is  not the case,&nbsp; Raynaud concludes that there are not many problems  occurring.</p>
<p>The software can be downloaded from the websites of Adullact and  Osor. So far most downloads have been over the Adullact website, as the  project was published there first. For Raynaud however &ldquo;it is due to the  work of Osor that OpenCimetiere is used beyond the borders of France&rdquo;.  As the reach of the Osor project goes far beyond the French speaking  world, it attracts a much wider public and this helps in spreading to  use of the software greatly.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="OpenCimetiere: Managing graves the open way">top</a>]</p>
<a name="section-5"></a>
<h2>Effect on government services</h2>
<p>With the use of OpenCimetiere the management of cemeteries is greatly  facilitated. Managing the concessions into cemeteries and keeping track  of existing graves was previously done using pen and paper, or through  other non-computerized forms of record keeping. The problem of this  method was that these important information could get lost very easily,  as for example a fire could damage or completely destroy the entire set  of data. The other problem behind this way of handling concessions is  that there are only two documents given at a concession: One to the town  hall and one to the family of a deceased person. As time goes by the  family of a deceased person can move away, or simply forget about a  grave. This in turn can create more bureaucratic disorder and confusion  within the municipality. The old way of managing concessions can  therefore be rather agonizing for municipalities as it can lead to a lot  of bureaucratic chaos.</p>
<p align="left">With the help of OpenCimetiere information can be safely  stored on a computer or an online database, which &ndash; given proper backup  procedures - ensures their existence way beyond any possible negative  incident that might come up. As graves are often kept for many decades,  keeping records safe and accessible is crucial. &ldquo;It is very dangerous to  have only one copy [on paper], and it is necessary to have all  information saved on a system&rdquo; explains Raynaud. The only problem in the  past was that information had to be transferred from the old hard copy  databases into the new system. For the 9000 graves in Arles alone, this  took the municipality about three years from 2006 to 2009.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="OpenCimetiere: Managing graves the open way">top</a>]</p>
<a name="section-6"></a>
<h2>Cooperation with other public bodies</h2>
<p align="left">According to Raynaud &ldquo;there is a real open source movement in France, and it is more difficult in European countries&rdquo; to deploy open source solutions in the public sector. This acceptance of open source software is what made the cooperation of the initial four municipalities, Arles, Albi, Tarn and Dadou, so easy.</p>
<dl class="image-right captioned">
    <dt><img width="400" height="223" title="OpenCimetiere: Managing graves the open way 1" alt="OpenCimetiere: Managing graves the open way 1" src="../../system/files/images/evolution opencimetiere.png" /></dt>
    <dd style="width:400px" class="image-caption">Illustration 1: The different steps in the development of OpenCimetiere &copy; OpenMairie, 2009&lt;br /&gt; </dd>
</dl>
As all of them had a common interest in the software, and all agreed on  the benefits of using the Free Sofware model for their cooperation.  Combined with the help of Adullact and the developers behind OpenMairie  the first version of OpenCimetiere turned out to be successful.
<p>The project also enjoys the support of the mayors association of the  74th department Haut-Savoie. It is with the help of this association,  which encompasses about 300 mayor offices, that the software became  widely used in the region.</p>
<p>Although it is hardly possible for the OpenMairie team to know where  the software is being used outside their region, since it is freely  available for download to anyone, they are aware of a few municipalities  in Belgium, Spain, and Santo Domingo. There, the software finds similar  use as in Arles and contributes to a better management of cemeteries.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="OpenCimetiere: Managing graves the open way">top</a>]</p>
<a name="section-7"></a>
<h2>Evaluation</h2>
<p>The software and the way it was developed were very successful in the  eyes of Raynaud. It works as intended, which is essentially what any  developer wants from his or her product. Even if some functions are  still missing, or at least could be further extended, the software  functions very stable and meets basically all requirements.</p>
<p>&ldquo;The biggest problem is the initialization of data&rdquo; Raynaud says; &ldquo;It  is a great problem to have the data and bring it into the system&rdquo;. As  there were tons of paper with information about location, state, and  even pictures that had to be entered into the system, this process took  the team good three years. Of course, once the system is up-to-date it  is much easier and more convenient to maintain it that way. Just as with  many other migrations from paper to file, this process initially is a  large task, but brings many advantages behind once the process is  completed.</p>
<a name="section-8"></a>
<h3>Achievements / Lessons learned</h3>
<p>For Raynaud the most important ingredient to success is to have a  public servant in charge of such a project who has no business interest  in mind, only the good of the city. This is especially important with  regard to open source solutions, as they are often the least costly and  most flexible solutions to a problem. &ldquo;I think it is better to have  project chief who works in the municipality, because this position is  more neutral and he is not driven by profit&rdquo;, he explains.</p>
<a name="section-9"></a>
<h3>Future plans</h3>
<p>For the future of OpenCimetiere the team of OpenMairie hopes to see  further development of the software, and a wants to see its use spread  further. As the software is already used in several countries beyond the  borders of France, more international versions of OpenCimetiere, such  as the English or the Spanish version, will hopefully be developed soon.  This in turn will extend the community of users, which will help to  make the software ever more stable and functional.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="OpenCimetiere: Managing graves the open way">top</a>]</p>
<a name="section-10"></a>
<h2>Conclusion</h2>
<p>For most municipalities making the choice between open source  software and proprietary software is not easy, as the expertise or the  knowledge of open source software is mostly not available. In the case  of OpenCimetiere, the city of Arles together with its neighbouring  cities and municipalities had the luck to have OpenMairie and its team  directly involved in the administration. This enabled the city to make  the choice for more independence, flexibility, and to safe costs.</p>
<p>With the help of an active community of contributors who have quickly  understood the potential of such a solution, OpenCimetiere became a  software that is used by many other municipalities as far away as Santo  Domingo. As the number of users increases it is foreseeable that the  number of functionalities increases as well. The fact that an English  and a Spanish version exist already now, after only three years of being  active, underlines this trend.</p>
<p>With the help of online platforms such as Osor and Adullact it is  easy for users from anywhere in the world to find the software, download  it and use it for own purposes. As this is supposedly the most common  way for open source software to find its way out in the world, this  underlines the importance of such platforms in increasing the popularity  and use of open source products.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="OpenCimetiere: Managing graves the open way">top</a>]</p>
<a name="section-11"></a>
<h2>Links</h2>
<ul>
    <li><a href="../../news/fr-pic-st-loup-moves-to-open-source-cemetery-management-application" class="internal-link" title="FR: Pic st Loup moves to open source cemetery management application">News article on JoinUp</a></li>
    <li><a href="http://openmairie.org/" class="external-link">OpenMairie </a></li>
    <li><a href="http://www.adullact.org/" class="external-link">Adullact</a></li>
    <li><a href="http://demo.openmairie.org/" class="external-link">Demonstration of software promoted by OpenMairie</a></li>
</ul>
<p>Software download:</p>
<ul>
    <li><a href="http://adullact.net/frs/?group_id=284" class="external-link">Adullact</a></li>
</ul>
<p><br />
This case study is brought to you by the Open Source Observatory  and Repository (OSOR), a project of the European Commission\'s IDABC  project. <br />
Author: Gregor Bierhals, UNU-MERIT</p>
<p>This study is based on an extensive interview with IT-director of the  city of Arles and member of OpenMairie Francois Raynaud, as well as the  information provided under the Links section.</p>
<p>This study is based on interviews with Leonhard Maqua, director of  X-DIS and Head of Section Standardisation and advanced information  technologies for statistics, and Bengt-&Aring;ke Lindblad, SODI project  director.</p>
<div align="right">[<a href="#section-0" class="internal-link" title="OpenCimetiere: Managing graves the open way">top</a>]</div>
</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'AirAware: managing the skies of Bucharest using free software';
	$path = 'software/page/airaware-managing-skies-bucharest-using-free-software';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<h1 class="documentFirstHeading"><span id="parent-fieldname-title">             AirAware: managing the skies of Bucharest using free software          </span></h1>
<div id="plone-document-byline" class="documentByLine"><span class="documentAuthor">       </span><span class="documentModified"><br />
</span></div>
<p class="documentDescription"><span id="parent-fieldname-description">             In 2005 the Romanian National Meteorological Administration  (NMA) received EU funding for its AirAware project. The project\'s  objective was to  improve the air quality monitoring system currently in  place and to enhance the system with forecasting capabilities. For the  management of all the information and the presentation thereof, the team  at the NMA developed a portal that is entirely built on Free/Libre Open  Source Software. In the future, the team is hoping to open the project  to the public.         </span></p>
<dl style="" class="portlet toc" id="document-toc">
    <dt class="portletHeader">Contents</dt>
    <dd class="portletItem">
    <ol>
        <li><a href="#section-0">Introduction</a></li>
        <li><a href="#section-1">Organisation and political background</a></li>
        <li><a href="#section-2">Budget and Funding</a></li>
        <li><a href="#section-3">Technical issues</a></li>
        <li><a href="#section-4">Legal issues</a></li>
        <li><a href="#section-5">Change management</a></li>
        <li><a href="#section-6">Effect on government services</a></li>
        <li><a href="#section-7">Cooperation with other public and private bodies</a></li>
        <li><a href="#section-8">Evaluation</a>
        <ol>
            <li><a href="#section-9">Achievements / Lessons learned</a></li>
            <li><a href="#section-10">Future plans</a></li>
        </ol>
        </li>
        <li><a href="#section-11">Conclusion</a></li>
        <li><a href="#section-12">Links</a></li>
    </ol>
    </dd>
</dl>
<p><a href="../../system/files/doc/IDABC-case study-AirAware -Final.odt" class="document doc" title="AirAware: managing the skies of Bucharest using free software -ODT">AirAware: managing the skies of Bucharest using free software</a></p>
<p><a href="../../system/files/doc/IDABC-case study-AirAware -Final.pdf" class="document pdf" title="AirAware: managing the skies of Bucharest using free software - PDF">AirAware: managing the skies of Bucharest using free software</a></p>
<p><a name="section-0"></a></p>
<h2>Introduction</h2>
<p>Around the year 2004 a team of researchers and meteorologists at the  Romanian National Meteorological Administration (NMA) first saw the  necessity to establish a monitoring system that would capture the air  quality of Bucharest and the region. Much like in any other large city,  air quality can become a problematic issue, which ultimately even could  cause&nbsp; health problems. Especially in peak heating seasons and during  the summer, larger cities have to find solutions to ensure healthy air  quality and to limit pollutions to established compulsory and advisory  critical levels . <br />
The task of monitoring air quality has been  traditionally carried out by the Environmental Protection Agency  Bucharest (EPA-B), but there were clear limitations with regard to the  technology and the knowledge at hand. The NMA thus applied for funding  within the EU\'s LIFE framework to set up an improved monitoring system,  that would give more detailed information about the air quality, and  that also would dispose of forecasting capabilities. After obtaining  funding through the LIFE framework, the project started in 2005, the  initial equipment was bought and plans were implemented. As more and  more equipment was purchased the team had to realize that the actual  costs for equipment by far exceeded the initially forecasted costs. This  development led to the need of cost reductions for other positions,  most notably the software solution to be implemented.</p>
<p>One way to reduce the cost for software solutions is to use open  source software solutions instead of proprietary ones. As Vasile  Craciunescuthe technical project manager&nbsp; explains &ldquo;we use a lot of Open  Source software on our workstations at work and at home&rdquo;, so the choice  for a non-proprietary open source solution was considered as being a  viable alternative. After a requirement analysis it then was decided  that the AirAware system, as the monitoring system was called, would be  built by mainly using open source software. The later development  process of the AirAware system also paid close attention to comply to  open standards, therefore ensuring stability, independence, and  compatibility.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="AirAware: managing the skies of Bucharest using free software">top</a>]</p>
<p><a name="section-1"></a></p>
<h2>Organisation and political background</h2>
<p>The Romanian National Meteorological Administration (NMA) consists of  a number of departments, with all of those being active in the field of  meteorology and climatology. The AirAware project was a joint  initiative between the NMA\'s&ldquo;Department of Remote Sensing and GIS&rdquo; and  its &ldquo;Department of Numerical Modelling&rdquo;. The amount of work dedicated to  the project varies over time, and after the starting phase in the first  and the second year, the workload decreased substantially. From the  Department of Remote Sensing and GIS there are usually about three  persons working on the project, who are in charge of the platform and  the administration of incoming data. Although their tasks may overlap  with the other department, they mostly take care that the partners get  the information they need in an accessible format.&nbsp; The Numerical  Modelling department is responsible for the mathematical background of  the project. Additionally there is one person working on the sensors  outside, who is making sure the system delivers the right data. The  other partner institutions in the project do not contribute to the  development of the platform or the hardware maintenance, but make use of  the NMA\'s services. <br />
Especially in the initial phase of the project,  the NMA worked closely together with the Environmental Protection  Agency Bucharest (EPA-B). Since the EPA-B had previously been in charge  of monitoring the air quality, they had substantial expertise. This was  particularly helpful for&nbsp; the calibration of the sensors and the  adjustment of various other factors in the system. Still today, as they  are among the main users of the system, the feedback and expertise  provided by EPA-B constitutes a valuable information source to the  AirAware team. &ldquo;We use of lot of the feedback that we receive from them,  and we adjust the tools to fit their needs&rdquo;, Craciunescu explains.</p>
<table width="301" align="right" class="vertical listing">
    <tbody>
        <tr>
        </tr>
        <tr>
            <th colspan="2">Quick Facts</th>
        </tr>
        <tr>
            <td><em>Project name</em></td>
            <td>
            <p align="justify">AirAware</p>
            </td>
        </tr>
        <tr>
            <td><em>Sector</em></td>
            <td>
            <p align="justify">Environment, public sector</p>
            </td>
        </tr>
        <tr>
            <td><em>Start date</em></td>
            <td>2005</td>
        </tr>
        <tr>
            <td><em>End date</em></td>
            <td>2008; ongoing</td>
        </tr>
        <tr>
            <td><em>Objectives</em></td>
            <td>
            <p align="justify">Raising air quality awareness, improved monitoring system</p>
            </td>
        </tr>
        <tr>
            <td><em>Target group</em></td>
            <td>
            <p>Public bodies, industry</p>
            </td>
        </tr>
        <tr>
            <td><em>Scope</em></td>
            <td>Regional</td>
        </tr>
        <tr>
            <td><em>Budget</em></td>
            <td>&euro; 1.000.000</td>
        </tr>
        <tr>
            <td><em>Funding</em></td>
            <td>
            <p align="justify">EU/ National</p>
            </td>
        </tr>
        <tr>
            <td><em>Achievements</em></td>
            <td>
            <p align="justify">Up-to-date monitoring and forecasting system, cooperation<br />
            with about 40 partners</p>
            </td>
        </tr>
    </tbody>
</table>
<p>The project initially consisted of a&nbsp; comparatively small group of  stakeholders that has been involved at it , such as the&nbsp; Bucharest city  hall, or the Environment Protection Agency. The team realized however  quickly, that &ldquo;the project [&hellip;] would be very good to be shared with the  public&rdquo;, as Craciunescu noted. However, it was only ,after receiving  some media coverage and workshops carried out by the project team, that  the political- and commercial world realized the potential of the  project and its relation to environmental protection, a field of vast  growing importance.&nbsp; Although this did not bring environmental  protection on the top of political agendas, it at the very least has  helped to improve public awareness and the project team is currently  compiling some of their findings to be published to the general public.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="AirAware: managing the skies of Bucharest using free software">top</a>]</p>
<p><a name="section-2"></a></p>
<h2>Budget and Funding</h2>
<p>The team at the NMA applied for EU funding in late 2004, which was  then granted as part of the European Union\'s LIFE framework programme.  The budget for the project was set at roughly &euro; 1.000.000 over three  years (2005-2008) duration, with funding provided on a more or less  equal terms by&nbsp; the Romanian government and the EU . The project funding  ended at the end of 2008, and as Craciunescu states,&ldquo;we have to keep  the system running on our own resources&rdquo; - but given the fact that the  hardware is in place and given the absence of proprietary annual license  fees the maintenance cost the AirAware team is now facing are seen to  be moderate and manageable.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="AirAware: managing the skies of Bucharest using free software">top</a>]</p>
<p><a name="section-3"></a></p>
<h2>Technical issues</h2>
<p>At the start the project management made a plan how the costs for  hardware and software had to be divided. Considering that advanced  measuring of meteorological data was at the core of the project, a  relatively large number of high-priced equipment had to be purchased, in  order for AirAware to work as accurate as possible.&nbsp; Once detailed  plans were put in place the project team quickly recognized that the  budget did not leave much space for underlying software solutions, since  the costs for the technical equipment were by far surpassing the  initial calculations. Therefore a new strategy had to be found for  potential software solutions, since proprietary software solutions were  simply too expensive with regards to license fees involved, and at the  very same time offering little modularity and freedom with regard to  standards. As the technical team at the NMA has been very familiar with  Open Source Software (OSS) the solution to this problem was found  quickly and open source solutions were seen as a viable, if not  superior, alternative to initially considered proprietary solutions.</p>
<p>With regards to AirAware\'s technical requirements, the team had to  develop a platform, which enabled the partners to access the information  and data easily, either via a web based thin client, or via a desktop  based thick client. Developing a framework for this was a technical  challenge, as the data output presented to the partners had to be very  accurate and reliable. Craciunescu explains that weather forecasting,  calculating the pollution and combining various informations in the  process is a &ldquo;very difficult, and very technical project&rdquo;. &ldquo;The  information is quite sensitive, so we have to make sure we are correct  with our analysis and forecasts&rdquo;.</p>
<p>Most data for the system comes directly from the partners, which are  about 40 public institutions and companies. They stream the data to the  AirAware servers at NMA, where the data is then imported in the  monitoring and forecasting system. This in turn creates an output, which  is streamed&nbsp; back as easily readable and&nbsp; accessible information to all  the partners. The following chart illustrates this process, by showing  the data streams of the six major partners: The Urban and Metropolitan  Planning Centre of Bucharest (UMPC-B),The Regional Environmental  Protection Agency Bucharest (REPA-B), The Public Health Authority of  Bucharest (APH-B), METEO France, The Institute of Biology &ndash; Bucharest,  The National Meteorological Administration (NMA). To clarify one  example, we can see data being collected by the REPA-B\'s air pollution  monitoring stations and by further data providers. This data is streamed  to the AirAware Servers, where it is integrated into the system, which  then streams the processed information to the workstations at the UMPC-B  (and all other partners) where the data is used for urban planning  processes.</p>
<dl class="image-inline captioned">
    <dt><img width="400" height="242" title="AirAware: managing the skies of Bucharest using free software - Flow Chart" alt="AirAware: managing the skies of Bucharest using free software - Flow Chart" src="../../system/files/images/FlowChart.jpg" /></dt>
    <dd style="width:400px" class="image-caption">&copy; Craciunescu, et. al., 2008</dd>
</dl>
<p>The data is streamed every day and updated very frequently. This  allows for an accurate air monitoring output and also enhances the  forecasting accuracy, which is very important for the system. Every  additional input the system can get, no matter how infrequent or  insignificant the data may seem, helps in improving the accuracy of the  system.</p>
<p>For end users the system does not appear as a complex network of data  streams and numbers, but is presented neatly on a website using  graphical interfaces that comprise all the information acquired in the  above flow chart. This can be accessed either via the web or desktop  client. For the building and the administration of the website, only  open source software was used, which helped in keeping development and  maintenance cost at a very economic level, while offering at the same  time modularity, security, and supplier independence. To just name some  solutions that have been applied,&nbsp;&nbsp; the content management system (CMS)  is based on Textpattern , which is freely available under GPL license.  The same is true for the relational database management system MySQL and  the scripting languages used: PHP, Python, and Java. The web server  Apache, with the Apache Tomcat running as the servlet container for Java  code to run.</p>
<p>For the management of the geospatial data, the system relies on  PostgreSQL and the extension PostGIS as geospatial enabled data base  storage. The server is Geoserver, which is a Java based standard  geospatial server, that serves that data to the partner\'s thick  (desktop) and thin (web-based) clients.</p>
<p>Craciunescu further explains: &ldquo;For data visualization analysis, the  geospatial part, we rely entirely on the Open Source stack [and we also  employ] Open Standards of the OGC [Open Geospatial Consortium] for all  our documents&rdquo;. This ensures that all data can be used by each of the  partners; no matter what platform or system they use.</p>
<p>The following table illustrates how the components of the portal work together behind the user interface:</p>
<dl class="image-inline captioned">
    <dt><img width="400" height="146" title="AirAware: managing the skies of Bucharest using free software - Portal info Flow Chart" alt="AirAware: managing the skies of Bucharest using free software - Portal info Flow Chart" src="../../system/files/images/Portal Information Flow Chart.jpg" /></dt>
    <dd style="width:400px" class="image-caption">&copy; Craciunescu, et. al., 2008</dd>
</dl>
<p>&nbsp;</p>
<div align="right">[<a href="#section-0" class="internal-link" title="AirAware: managing the skies of Bucharest using free software">top</a>]</div>
<p><a name="section-4"></a></p>
<h2>Legal issues</h2>
<p>With Romania\'s EU membership many new opportunities emerged, but also  many new requirements. With regard to air quality, Romania is now  forced to comply with certain standards by 2012 and in the years to  follow. In policy terms, 2012, is still far away and therefore the  demand for immediate actions is moderate, Craciunescu explains. The  AirAware project up to this point has not brought about any policy  changes, although the project gives important insights to the urban  planners and other institutions.</p>
<p>The software that was used for the development of the platform is  entirely based on open source licenses. As the platform can be seen as a  catalogue of different software components, it was only necessary to  link those components to have a functioning system. For this only minor  modifications were necessary. At least with regard to the platform there  are therefore no legal barriers that would prohibit releasing it under  an open source licence, which the team is considering at the moment.  However, not all of the projects outcomes will be freely available. The  \'pollution forecasting model\' for example, is very complex and  mathematical and intricate to produce. The NMA is working together  closely with Meteo France, which is one of few institution capable of  providing such models. As opposed to common software solutions, the  forecasting models are only produced on demand and customized uniquely  for a&nbsp; respective institution. Since such a production involves  Intellectual Property Rights (IPR) that belongs to Meteo France,&nbsp; a  sharing of these models is consequently not possible.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="AirAware: managing the skies of Bucharest using free software">top</a>]</p>
<p><a name="section-5"></a></p>
<h2>Change management</h2>
<p>Before the AirAware project, the Environmental Protection Agency  (EPA) Bucharest was in charge of monitoring the air quality. The  technology at hand however only allowed for the monitoring of street  levels, which is not enough to give accurate information about higher  spheres and it does not suffice to make usable forecasts. So before  AirAware took the task &ldquo;we started acquiring new equipment, and made  surveys to find out about the major sources of pollution&rdquo;, says  Craciunescu. Accordingly, &ldquo;the main source of pollution [in the past  years] has shifted from heavy industries, which are the legacy of the  Communist times, to traffic&rdquo;, he further ads. The number of cars has  increased dramatically, making it the biggest pollution problem in  Bucharest.</p>
<p>After finding out about the sources of pollution the NMA set up the  monitoring system in 2006, which is fairly advanced; even compared to  the European standard. With the new system, which was fully functional  in early 2008, the NMA was able to give detailed information about  higher levels of pollution (above the street level), which is very  important in indicating the pollution of a greater area. The other  important innovation was the ability to forecast, which was previously  impossible. Although forecasting is not considered a guideline for the  city administration, as this is the case in France for example, it is  important for many of the partner institution, and may be important for  the city planners in the future.</p>
<p>At the Urban and Metropolitan Planning Centre Bucharest (UMPC-B),  which is attached to the Bucharest City Council, the system is actively  used for a period of about six month, starting in early 2009. Here, it  is used for the planning of green areas or the regulation of  construction sites. At first the users there had their slight problems  with the software, because they did not clearly understand how it  worked. It did not take them very long be able to use the system, as it  was &ldquo;very accessible&rdquo;, says the director of the UMPC-B, Rodica Gheorghe.  In order to fully make use of it, the NMA held three to four training  sessions, which were very helpful, especially in the beginning.  Additionally, if there are problems with the system, or if something is  unclear to the users at the UMPC-B, they can call the team at the NMA at  all times. Gheorghe further ads with a laugh: &ldquo;they come all the time&rdquo;.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="AirAware: managing the skies of Bucharest using free software">top</a>]</p>
<p><a name="section-6"></a></p>
<h2>Effect on government services</h2>
<p>In the six month of use of the AirAware system the UMPC-B has  benefited greatly from the software, as it facilitates many planning  processes. As the system gives a very detailed image of the urban area  of Bucharest, the city planners can make dynamic maps, which have  improved substantially compared to the previous system. Gheorghe further  explains: &ldquo;Right now we are using the information from the system to  develop a general urban plan&rdquo; and AirAware shows them &ldquo;which are the  areas most exposed to pollution&rdquo;. This in turn gives them clues were  more green spaces have to be build, or where the traffic situation has  to change.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="AirAware: managing the skies of Bucharest using free software">top</a>]</p>
<p><a name="section-7"></a></p>
<h2>Cooperation with other public and private bodies</h2>
<p>The NMA is working together with roughly 40 partner institutions and  companies, such as energy companies, public bodies, private companies,  and so forth. The nature of these partnerships is not identical in all  cases, as some partners simply provide data, and others provide and/or  use it. The provided data is essential for giving accurate information  on the air quality levels in the area, and the team always tries to get  as much information as possible, no matter how small the source of  pollution may be. This enables the NMA to provide a picture that is as  close to reality as it can get today. <br />
The six main project partners in the AirAware project are:</p>
<ul>
    <li>The Urban and Metropolitan Planning Centre of Bucharest (UMPC-B)</li>
    <li>The Environmental Protection Agency Bucharest (EPA-B)</li>
    <li>The Public Health Authority of Bucharest (APH-B)</li>
    <li>METEO France</li>
    <li>The Institute of Biology &ndash; Bucharest</li>
    <li>The National Meteorological Administration (NMA)</li>
</ul>
<p>These six institutions work closely together, and are also the most  important end-users of the system. Although the different backgrounds  can sometimes pose a challenge to the communication between the  different institutions (i.e. a technician talking to a medical  scientist), the cooperation is generally very positive. Ultimately all  six have the same aim of monitoring and improving the air quality. <br />
&nbsp;At  the moment the legislation does not oblige companies to publish  information about air pollution,&nbsp; which can make the work of the NMA  very difficult at times. &ldquo;I\'m only 29-years old, and discussing all  those partnerships brought me at least 100 grey hairs&rdquo; Craciunescu  explains jokingly.</p>
<div align="right">[<a href="#section-0" class="internal-link" title="AirAware: managing the skies of Bucharest using free software">top</a>]</div>
<p>&nbsp;</p>
<p><a name="section-8"></a></p>
<h2>Evaluation</h2>
<p><a name="section-9"></a></p>
<h3>Achievements / Lessons learned</h3>
<p>For Craciunescu the system has been a great success and compared to  the previous system, which has been maintained by the EPA-B, AirAware  has brought many advantages. The monitoring is much more accurate and it  is possible to analyse the air of many more levels than before. With  regard to the portal, the Open Source solution is still be considered  as&nbsp; the right path to go: the system performance meets the requirements,  while being very secure, modular, and cost efficient. The mapping  technology for example allows to employ maps of various mapping  applications of the web; be it OpenStreetMap, Yahoo Maps, or even the  popular Google Maps. Especially when the system will be public, this is  seen to be of great help for any user.</p>
<p>For the Urban and Metropolitan Planning Centre, the project has also  facilitated the daily work. &ldquo;With the database we have another level of  analysis&rdquo; which can be very important for the decision making, says  Gheorghe. And Craciunescu continues that they now have some solid  arguments to support sound policy making.</p>
<p>Working within such a large partnership can be a challenging thing,  but even though all difficulties encountered throughout the project  could be successfully overcome and solutions were usually found quickly.</p>
<p>As mentioned before (<em>Cooperation with other public bodies</em>)  the biggest problem by far however remains the allocation of data. For  the AirAware project, a change in the legal environment towards more  openness would&nbsp; certainly facilitate many aspects of the work.</p>
<p><a name="section-10"></a></p>
<h3>Future plans</h3>
<p>One of the main aims for the future is to make the system public so  citizens would be aware about&nbsp; pollution levels. In the very best case  this perhaps would&nbsp; change the way people think about air polution and  to bring the topic higher on the public agenda.</p>
<p>The team at NMA is also eager to collaborate with institutions from  outside Romania, e.g. to help others with a similar system, or to  benefit from NMA\'s knowledge. At least with regard to the software  solution, the team is open to share its developments. Talks to publish  the AirAware platform on the OSOR Forge are already ongoing. As the  forecasting models are much harder to acquire and are only distributed  to a hand full of institutes, the NMA does not have the authority to  publish them under an open source license.</p>
<p align="right">[<a href="#section-0" class="internal-link" title="AirAware: managing the skies of Bucharest using free software">top</a>]</p>
<p><a name="section-11"></a></p>
<h2>Conclusion</h2>
<p>With regard to the software solution of the AirAware system, the  project is a good example on using open source software solutions for  economic means, plus getting further advantages alongside. The solution  employed provides a safe environment for all partners to stream and  share their information, which in turn&nbsp; contributes to a better planning  of urban spaces and to a better use of energy. A precondition for the  success of such a project certainly also relates&nbsp;&nbsp; to the team, the  skills and motivation.</p>
<p>[</p>
<a href="#section-0" class="internal-link" title="AirAware: managing the skies of Bucharest using free software">top</a>
<p>]</p>
<h2>Links</h2>
<ul>
    <li><a href="http://life-airaware.inmh.ro/" class="external-link">AirAware Project website</a></li>
    <li><a href="http://studiacrescent.com/images/pdf2/craciunescu_on-line_air_quality_monitoring.pdf" class="external-link">Study: Craciunescu, V., et. al. (2008) \'On-line Air Quality Monitoring and Warning Support System for Bucharest Urban Area\'</a></li>
</ul>
<p>Author: Gregor Bierhals, UNU-MERIT</p>
<p>This study is based on interviews with Vasile Craciunescu, technical  manager of AirAware, and Rodica Gheorghe, director of the Urban and  Metropolitan Planning Centre Bucharest.&nbsp;</p>
<div align="right">[<a href="#section-0" class="internal-link" title="AirAware: managing the skies of Bucharest using free software">top</a>]</div>
<p>&nbsp;</p>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */
	
	$newNode = (object) NULL;
	$newNode->type = 'page';
	$newNode->title = 'Desktop4education: Bringing new environments to Austrian schools ';
	$path = 'software/page/desktop4education';	
	$newNode->uid = 1;
	$newNode->created = strtotime('now');
	$newNode->changed = strtotime('now');
	$newNode->status = 1;
	$newNode->language = 'en';
	$newNode->body = '<p class="documentDescription"><span id="parent-fieldname-description">             In 2003 the secondary school of Weiz, Austria, started the  development of an open source operating system. The overall objective  has been to develop a system that was easy to maintain, sustainable in  the future, and free of licensing costs: the so called desktop4eduation.  Although open source software is not extensively used in Austrian  schools yet, it is becoming more and more important, as the government  tries to promote free software over proprietary solutions increasingly.  Today the desktop4education project is being frequently used as a  reference case by the Austrian Federal Ministry for Education, Arts and  Culture and as such promoted by them throughout Austria.         </span></p>
<dl style="" class="portlet toc" id="document-toc">
    <dt class="portletHeader">Contents</dt>
    <dd class="portletItem">
    <ol>
        <li><a href="#section-0">Introduction</a></li>
        <li><a href="#section-1">Organisation and political background</a></li>
        <li><a href="#section-2">Budget and Funding</a></li>
        <li><a href="#section-3">Technical issues</a></li>
        <li><a href="#section-4">Legal issues</a></li>
        <li><a href="#section-5">Change management</a></li>
        <li><a href="#section-6">Cooperation with other public bodies</a></li>
        <li><a href="#section-7">Evaluation</a>
        <ol>
            <li><a href="#section-8">Achievements / Lessons learned</a></li>
            <li><a href="#section-9">Conclusion</a></li>
        </ol>
        </li>
        <li><a href="#section-10">Links</a></li>
    </ol>
    </dd>
</dl>
<div id="parent-fieldname-text">
<p><a href="../../system/files/doc/IDABC-OSOR-case study-desktop4education-Final.odt" class="document doc" title="Desktop4education: Bringing new environments to Austrian schools - ODT">Desktop4education: Bringing new environments to Austrian schools - ODT</a></p>
<p><a href="../../system/files/doc/IDABC-OSOR-case study-desktop4education-Final.pdf" class="document pdf" title="Desktop4education: Bringing new environments to Austrian schools - PDF">Desktop4education: Bringing new environments to Austrian schools - PDF</a></p>
<a name="section-0"></a>
<h2>Introduction</h2>
<dl class="image-left captioned">
    <dt><img width="284" height="142" title="&copy; desktop4education, 2009" alt="&copy; desktop4education, 2009" src="../../system/files/images/desktop_for_education.jpeg" /></dt>
    <dd style="width:284px" class="image-caption"><br />
    </dd>
</dl>
<p>In 2003 Helmuth Peer, a math teacher at the Weiz secondary school  (Bundesgymnasium) decided that it was time to migrate the schools\' IT  system to a new platform, that would be easy to set up, easy to  maintain, and easy to connect via a network. Together with his students,  which he involved in the project, he searched for a solution that would  allow for customization and correspond to the needs of each school  level concerned. He found that the Linux distribution openSUSE 11.1  would qualify as a suitable solution, and building a system on this  basis seemed sustainable in the future and the right choice to him. The  team therefore started developing what was to be called the  \'desktop4education\' for the school\'s workstations and a server version  they named \'server4education\'. Once the project grew and matured, the  Ministry of Education, Arts and Culture (BMUKK) became aware of it and  realized its potential for other schools throughout Austria. The  Ministry\'s IT department, under the direction of Robert Kristoefl,  consequently started to support the project by dispatching around 2.000  CDs and DVDs to other Austrian schools. Although the system is working  very well and does not require any type of licensing fees [due to the  use of free and open source software], many schools are still reluctant  to use the solution, as they prefer to opt for proprietary software  solutions (i.e. Microsoft). However, by the time of writing the  situation is about to change as the Federal government increasingly  adopts a policy that promotes the use of open source software in  Austrian schools. Exemplary to this is the government\'s decision to pay  any school &euro;10 for each workstation that runs the free productivity  suite Open Office that is provided by Sun Microsystems in replace of  Microsoft Office, for which the government introduced a calculative  license fee of &euro;10. Although the schools opting for Microsoft Office  still do not pay the full amount of the license, this policy creates a  give-or-get framework which clearly illustrates the schools a financial  loss or reward. With further political steps in this direction on the  one hand and decreasing regional budgets on another hand, an increasing  number of schools is about to realize the potential of educational Linux  distributions as desktop4education, or also the related Linux Advanced  project, which is a similar initiative focused on an easy to use live  booting operating system for students. The desktop4education solution  has seen to be not only an economical viable alternative to proprietary  solutions, but also an alternative of equal quality.</p>
<a name="section-1"></a>
<h2>Organisation and political background</h2>
<p>The Austrian government under the auspices of the Ministry of  Education, Arts and Culture (BMUKK) in 2004 commissioned a study to the  Donau University in Krems, Austria, with the task to investigate the  state of open source software solutions for the educational sector. The  central outcome of the University\'s study was that there were no open  source solutions mature enough at that time to replace proprietary  solutions entirely, says Gerhard Schwed, eLearning coordinator at the  Donau University, who took an active role in this study. However, it was  highly recommended that students should gain experience in at least one  other software environment than Microsoft Windows, in order to be more  flexible and to have a broader knowledge of software solutions.</p>
<p>Already about three years before this study has been published, by  2003, Helmuth Peer, who is a teacher at the secondary school in Weiz,  launched a project with the aim of freeing the school from software  licensing costs and by the same time providing a software solution that  was easy to network and administer. Together with some of his  enthusiastic students Peer conducted a market research for available  free operating systems that would allow for easy customisation according  to the school\'s needs. After thorough research the team decided to  deploy openSUSE, which is an operating system built on Linux and that is  freely available under a GNU general public license. After consensus on  the system was reached they than began with customization, including  different software packages for different age grades, and named the  overall solution with the characteristic name \'desktop4education\'.</p>
<p>The study that has been commissioned in 2004 to the Donau University  was eventually published in 2006, recommending 10 software solution to  the Ministry that perhaps could build the base for an open source  software strategy for the Austrian public school sector. Since by the  time of 2006 the&nbsp; desktop4education project had become one of the more  experienced projects to be named within this study, the Ministry decided  to use the Weiz school and their desktop4education project as a  reference case to be promoted to Austrian public schools on efficient  implementation on open source software solutions. After having secured  support from Sun Microsystems, which provided the CDs, the Ministry then  sent out 2.000 copies of the desktop4education to schools all over  Austria. Today, the system can be downloaded for free at the project\'s  website (www.d4e.at) and can be additionally ordered free of charge from  the Ministry, even comprising nowadays a DVD with extensive training  material for the productivity suit Open Office.</p>
<p>As Gerhard Schwed from the Donau University states, this was one  example that proved the ministry\'s openness towards open source  software. Encouraged by the Weiz case and based upon the evidence  gathered through the commissioned study the Ministry decided upon  changing its policies towards the handing out of licenses for  productivity suites. As of the school year 2009 &ndash; 2010, the Ministry is  paying every school in Austria &euro;10 for each workstation that uses the  Open Office suite instead of Microsoft Office. Contrary to that schools  have to pay a &euro;10 licensing fee for the use of Microsoft Office.  Therefore the savings of using Open Office instead of Microsoft Office  amount to &euro;20 per workstation, with the ultimate decision on which  software to deploy being left with the respective school. Such an  economic measure (called \'Zuckerl\' in Austria), as Peer describes it,  has already lead to significant changes on the grade of deployment of  open source software. Since there are still no incentives or pressures  to do the same with regard to the operating system, many schools are  still reluctant to take this bigger step. As of 2012 the governmental  contracts with Microsoft will expire, and this perhaps will change the  status of open source operating systems, such as desktop4education or  Linux Advanced, from being marginally used to becoming the main IT  systems at Austrian schools.</p>
<a name="section-2"></a>
<h2>Budget and Funding</h2>
<p>The financial resources in the starting phase of the  desktop4education project were covered entirely by the school and Peer  himself. Because the solution is entirely based on free software there  were no license fees involved and only few additional equipment had to  be purchased. However, the project involved a great deal of time  investment and without the personal motivation and commitment of the  people involved, such an undertaking would not have been possible. As  Peer explains jokingly: &ldquo;I am not so interested in the financial aspects  of a project, I\'m a bad business man and this is not in the foreground  for me&rdquo;. Motivation and interest were instead the driving force to  invest a great deal of free time in researching, testing, developing and  the final roll out of the&nbsp;&nbsp; desktop4education solution at a school  level.</p>
<p>At another Austrian school, the secondary school in Rechte  Kremszeile, the situation has been similar and it was again a group of  enthusiastic teachers together with the help of some IT specialists that  started the development of the Linux distribution &ldquo;Linux Advanced&rdquo;,  which is a live booting distribution of the free operating system. Linux  Advanced is build on the Debian Lenny distribution, as this ensures  longevity, security, stability, and flexibility. The case of Rechte  Kremszeile supports the notion that successful school wide IT changes  can result out of the actions that were taken on an individual level,  and even in the absence of external funding.</p>
<p>Although neither of the two schools mentioned above has carried out  an analysis of the savings generated from the use of open source  software, it is believed that there are economic benefits. While the  licensing fees for the use of Microsoft Windows are still carried  entirely by the federal government, schools have little motivation to  employ an open source operating system, as this does not imply  additional savings. And at the same time however they tend to opt for  the Microsoft Office, productivity suit, which does imply licensing  costs. On the contrary, when schools decide to employ an open source  operating system, the decision to use an open course productivity suit  usually goes hand in hand, which also brings financial benefits. In  particular since the year 2009 / 2010 that introduced the &ldquo;save &euro;10,- /  pay &euro;10,-&rdquo; licensing model, that rewards schools that save on license  cost. The licensing fee of &euro;10 that schools have to carry for the use of  Microsoft Office quickly adds when using it on every workstation.</p>
<a name="section-3"></a>
<h2>Technical issues</h2>
<p>For the migration to desktop4education from their previous  Microsoft-based software platform the Weiz secondary school did not have  to acquire any new hardware. Quite on the contrary, the new system  introduced new minimum hardware requirements that were even below the  previous ones.&nbsp; On the other hand, would the school have decided to  migrate to a newer version of Microsoft Windows, this migration would  have even been much more expensive, since the computers in place did not  meet most of the requirements a newer version would have had. &ldquo;If I  think of Windows Vista or Windows 7&rdquo;, explains Peer, &ldquo;we do not even  have the hardware to deploy these solutions. With desktop4education the  system can run on the school\'s older workstations, some of which have  not more than 256 MB of memory and Pentium 3 processors. The deployment  of Linux therefore not only brings the advantage of saving licensing  costs, but also permits the school to use older workstations for a much  longer period&rdquo;.</p>
<p>For the selection of the different software packages, that the team  wanted to include in the desktop4education software solution, they  carried out an extensive research on freely available and good quality  educational applications, of which there are many, as Peer highlights.  They had to bear in mind that the different school levels had distinct  needs. As such, it would not make much sense to present a 3rd grader  with the more complex software that is used in the 10th grade. Luckily  the system allowed just this in a very easy fashion, giving the  administrator the rights to chose between basic school packages and  higher education packages. &ldquo;It\'s very easy to modify, and there is a lot  of quality software on the Web, especially for the educational sector&rdquo;  states Peer.</p>
<p>In additional to the productivity suits OpenOffice and Sun StarOffice  and other software that comes with most Linux distributions, the  project website lists the following applications with particular  importance for the educational sector:</p>
<ul>
    <li>Tuxmath &ndash; math application</li>
    <li>Tuxpaint &ndash; basic paint programme</li>
    <li>Tuxtype &ndash; 10-finger typing software</li>
    <li>G-Compris &ndash; learning software for pupils age 2 &ndash; 10</li>
    <li>Qcad &ndash; 2D Construction programme</li>
    <li>Geogebra &ndash; dynamic math software</li>
    <li>WX Maxima &ndash; GUI for the computer algebra system (CAS)</li>
    <li>Qucs &ndash; integrated circuit simulator</li>
    <li>Dr. Geo &ndash; interactive geometry software</li>
    <li>KDE-Edu &ndash; free educational software based on KDE technologies</li>
</ul>
<p>These programs make it very interesting for the classroom, since the  software facilitates the understanding of sometimes very abstract  learning content. To mention just one example, Dr. Geo is a geometry  learning software, which helps students in understanding basic geometry  functions in a playful manner. This makes it very easy to integrate into  a normal geometry class, seeing that it is more of an extension to the  teacher that asks for more interaction and participation. Most  applications follow this idea, of helping students to learn content more  easily. Having a great variety of learning applications also gave Peer  the chance to select the appropriate software for each school level.</p>
<p>As a server operating system Peer also had to find a solution that  was able to control both: Windows and Linux operating clients. An  additional requirement was that it had to be easily integrated in  existing networks, as his school, but also other schools, would have to  be able to dual boot, choosing either the Windows or the Linux  distribution. Further, students had to be able to access their data from  their home computer, which in most cases was running Windows. This is  how the development of server4education came about, which met exactly  these requirements. It is built on Suse Linux Server and features the  following network services:</p>
<ul>
    <li>CUPS print server</li>
    <li>DHCP dynamic IP allocation</li>
    <li>DNS</li>
    <li>NTP as time server</li>
    <li>openLDAP as the centralized user administration</li>
    <li>Samba as the data server</li>
    <li>Apache-Webserver with PHP5</li>
    <li>MySQL and PostgreSQL database servers</li>
</ul>
<p>The pre-installed applications make it easy to administer the content  and to work seamlessly on the network. And just like with  desktop4education, all of them are freely available under various open  source licenses:</p>
<ul>
    <li>Joomla! &ndash; the content management system</li>
    <li>Moodle &ndash; the learning platform</li>
    <li>Gallery (v.1) &ndash; easy administration of photos</li>
    <li>DokuWiki &ndash; common online-notebook</li>
    <li>phpMyAdmin &ndash; administration of MySQL database</li>
    <li>phpPgAdmin &ndash; administration of PostgreSQL database</li>
    <li>x2go &ndash; terminal server</li>
    <li>squid &ndash; proxy server</li>
    <li>gnump3d &ndash; mp3 file server</li>
</ul>
<p>During the development process relatively few problems occurred, and  web based search usually helped to solve problems and to find just the  right answers. Although Peer and his development team did not  participate actively in any open source communities they often used the  expertise found in various forums and websites. In addition to this the  team went to many open source conferences, most notably the Knoppix  Days, where they acquired important information, which helped  significantly in mapping out the risks and avoiding pitfalls, therefore  facilitating the overall development process.</p>
<a name="section-4"></a>
<h2>Legal issues</h2>
<p>The desktop4education team had to consider only very few legal  aspects in the accumulation of different software products. The only  thing that they had to bear in mind was that the selected solutions that  formed a part of the desktop4education were freely available under  licenses that permitted the free use and distribution thereof. For the  most part, this did not become a difficult task.</p>
<p>The other aspect the team had to keep in mind was that some products  consisted of \'free software\', but had no open source license, and for  this reason it was necessary to ask the user to agree to the products  end user license agreement (EULA) each time an application would be  started. For those few applications that required such an EULA agreement  the most simple solution was to simply ask the user to agree or  disagree upon the start of those applications on the EULA license  agreement, therefore coming at the \'cost\' of one further mouse-click,  but no license fee cost.</p>
<a name="section-5"></a>
<h2>Change management</h2>
<p>Before starting the development of desktop4education, Peer searched  for server solutions that enabled him to control Microsoft Windows  clients and Linux clients alike, as this was an absolute necessity if he  wanted to install a Linux distribution on the schools workstations.  Server4education met this requirement and further allowed students to  access their data from Windows clients just as easily as from any Linux  operated workstation. Considering that most of the resistance towards an  open source migration comes from teachers and parents, as Peer, Schwed  and Schwarzinger agree, this was very important for eliminating the  fears many of those teachers and parents had.</p>
<p>As Schwarzinger, who oversaw the migration at the secondary school of  Rechte Kremszeile, explains: &ldquo;It is necessary to implement a solution  slowly. Anyone who thinks a migration is merely a simple software change  will come into trouble&rdquo;. Preparing the students, the teachers and the  parents to the software migration, by highlighting the benefits and  removing the fears, was a very important step prior to the actual  software migration. This helped in creating support for the solution and  to further diminish resistance.</p>
<p>For Peer another important factor for a successful migration was an  easy installation process of&nbsp; such a solution, while bringing as little  problems as possible. In order to avoid any complications in the  migration process, the team tested all application until they were sure  to have a properly functioning solution. As noted by Schwed &ldquo;There are  now two suitable distributions, which are working well and have a good  software package&rdquo;, referring to desktop4education and Linux Advanced.  This two distributions are of potential relevance to other schools,that  wish to base their migrations on solutions that are known to work out  successfully.&nbsp;</p>
<p>For most users the new software environment hardly presented any  problems. Clearly, the look and feel was different to some extent, but  once an application was started it was all the same for most students.  Peer illustrates this with a smile: &ldquo;The only thing that\'s different for  them is where to find the \'start button\' to shut the computers down. So  really it\'s not an issue at all for my students.&rdquo; Most students easily  adapt to the new operating system and after a short introduction period  use it just as they used to use Windows. The only point Peer raises that  perhaps could be improved in the future is the incompatibility of most  games with the Linux environment, which is a drawback especially for  younger boys.</p>
<p>For teachers and parents a software migration is more challenging,  since they are usually less flexible and do not want to re-learn how to  use an operating system, but often prefer to remain in the environment  familiar to them. Although this is understandable, Schwed states that  this is mostly a &ldquo;psychological barrier&rdquo;. Essentially most recent Linux  distribution have a very simple user interface and offer the same  functionality as Microsoft Windows. But, as most Linux distributions  have no or very little corporate backing, starting expensive  advertisement campaigns is hardly an option. So in order to solve the  image problem the government would have to promote open source operating  systems, by introducing a similar licensing system for schools as it  did for OpenOffice and Microsoft Office. In 2012, when many of the  federal government\'s contracts with Microsoft will expire, it remains to  be seen whether new licensing terms to be introduced by the Ministry  will make Linux distributions, such as desktop4education, more  attractive for schools.</p>
<a name="section-6"></a>
<h2>Cooperation with other public bodies</h2>
<p>Although the desktop4education project has been promoted to basically  all schools in Austria, and despite being freely available for download  from the project website, it is difficult to give numbers how many  schools actually deploy the system. Peer however estimates that the  number of schools that use it actively and daily is rather low.His team  is offering support to at least two schools who use desktop4education  extensively, and he is positive that this number will grow in the  future. With regard to the financial crisis he states: &ldquo;I think the time  we are in right now is working in favour for our project, as many have  to find ways to cut down current costs&rdquo;. Although schools still do not  have to pay for the licenses of the operating system, the federal and  the regional government urges increasingly to save resources where  possible. Thus, although not directly, financial matters do play an  increasingly important position in budgetary discussions. The promotion  of the project through the Ministry therefore clearly is of help too, as  it gives schools an option to save costs. Since the first version of  desktop4education several thousand CDs and DVDs have been sent out to  schools, and many schools have requested the solution. Especially the  OpenOffice video training material, which is delivered with the most  recent version, seems to meet actual needs and further helps to overcome  fears to be left alone in the process of learning to deploy and use  such a new software. Peer however has some doubts whether these  desktop4eduation DVDs are actually deployed on the school\'s  workstations, or if they simply end up somewhere in a teachers room desk  drawer. The increasing interest and the amount of requested DVDs from  the Ministry lets him hope that more and more schools will actually use  it. In addition to that Peer and his team members, most of which are  higher education students by now, continue to participate in as many  conferences as possible, and follow requests for workshops as their time  allows. Participation at such events on the one hand contributes to the  improvement of the software, and on the other hand helps to make it  more popular. Peer notes that the number of people that&nbsp; approach him is  constantly increasing, which he believes is a fairly good indicator of  the projects popularity. The team even offers to go to schools and to  supervise the migration process, which according to Peer can be  completed in just one day.</p>
<a name="section-7"></a>
<h2>Evaluation</h2>
<a name="section-8"></a>
<h3>Achievements / Lessons learned</h3>
<p>For both Peer and Schwarzinger it is clear that in order for such a  project to be successful one needs a team that works out of conviction.  This is important, because there have been hardly any financial rewards  in the past and a lot of resistance in the way. &ldquo;You have to be  passionate and enduring&rdquo; says Peer, in order to make a good solution and  to convince anyone thereof.</p>
<p>The careful planning of the project implementation, not only from a  software perspective, but also from a social and change management  perspective, is therefore very important. Only by delivering a product  that actually meets all the requirements and compares well to  proprietary solutions allowed the team to gain acceptance for their  project from the various stakeholders involved, and to remove doubts and  resistance.</p>
<p>Schwarzinger also mentions that it is important to use comprehensive  software, which not only functions on a Linux system, but on many other  systems as well. Using applications such as Mozilla Firefox and  Thunderbird, or OpenOffice makes this very easy, as the students do not  only use them at school, but also at home irrespective of the operating  system that is used there.</p>
<p>The live booting USB drive version of both operating systems  (desktop4education and Linux Advanced) contributed to a successful  deployment in the two schools in particular. Not having to install a new  system on the parents computers, but simply plugging in a USB drive,  took away much of the fear parents initially had shown. This way,  students can work even at home with the exact same desktop environment  that they are seeing at their school workstation, without having to do  any of the complicated installation processes.</p>
<p>As a result of those individual success cases, and backed by sound  studies provided by the Donau University, the Austrian government  provides today an increasingly beneficial framework for the use of open  source products in the educational sector. As the Ministry has realized  the potential of such software products, licenses with proprietary  software providers perhaps will fade away step wise. The financial  reward that is given to schools, for the use of OpenOffice and resulting  savings on licence costs, is just one example of this policy change.</p>
<a name="section-9"></a>
<h3>Conclusion</h3>
<p>The Desktop4education project shows how free open source solutions  can compare to proprietary solutions, without any shortcomings quality  wise. The software provides all a school needs, it is easy to  administer, and does not bring about any licensing costs. Especially for  the educational sector it is therefore potentially attractive, since  budget savings can be used elsewhere to improve the learning facilities  and educational provision. It also became clear that a common  misconception in schools is that free or open source software is  inferior to commercial proprietary solutions. However the  desktop4education case clearly demonstrates that such a conception  perhaps should be reconsidered, as open source products in most cases  provide the same functionality and quality, while being based on  standards, having easy customization options, ultimately resulting in  cost savings.</p>
<p>It also has been shown that governmental initiatives that share part  of the real cost of software license fees with the schools can be a  viable mean to make schools paying closer attention to the type of  products available to them and their underlying cost. The Austrian  government in this respect appears to have taken a suitable approach,  with further steps likely to follow in the coming years. While the  promotion of the use free software in the educational sector is  certainly desirable, the question to what extent the government should  intervene in the market is another aspect worth mentioning. The &ldquo;save  &euro;10,- / pay &euro;10,-&rdquo; licensing model, that rewards schools that save on  license cost appears to have been a viable approach. However, if the  same approach would be equally viable for the exchange of the operating  system, be it in terms of market intervention, financial aspects,  technical complexity or required cultural changes, remains to be further  investigated.&nbsp;</p>
<p>For projects such as thedesktop4eduation an important criteria to  succeed on a larger scale appears to be \'public awareness\' of open  source software products and to not see those as inferior solutions to  proprietary ones. The fact that many, if not most Austrian schools are  still reluctant to use open source software illustrates this very well.  Perhaps one suitable way to change such public perceptions would be a  closer&nbsp; cooperation amongst similar projects to gain on visibility. In  any case, just sending out CDs and DVDs appears to be too little, or the  wrong type of promotion, seeing that it has not been very fruitful so  far.&nbsp; While financial incentives may be effective to some level, it  might be equally important to have an increasing number of workshops,  trainings and other events on a regional and national level, that would  allow to showcase the products and to overcome misconceptions. As noted  by the&nbsp; Desktop4eduation project team, participation at workshops and  events or providing support to other schools can have a positive impact  on the deployment of open source software, but to foster large scale  deployments perhaps requires equally large scale actions, but not only  individual ones. It remains to be seen if the government\'s new policies  will bring about this change, and whether or not such policies will  support large scale deployments of solutions such as the  desktop4education one.</p>
<a name="section-10"></a>
<h2>Links</h2>
<ul>
    <li><a href="http://d4e.at/" class="external-link">Desktop4education project website</a></li>
    <li><a href="http://www.format.at/articles/0729/520/178808/open-source-schule" class="external-link">News item about desktop4education (German)</a></li>
    <li><a href="../../news/at-education-ministry-supports-gnu-linux-distribution-for-schools" class="external-link">JoinUp news item</a></li>
    <li><a href="http://www.linuxadvanced.at/la_info.html" class="external-link">Linux Advanced project website</a></li>
    <li><a href="http://www.bmukk.gv.at/enfr/index.xml" class="external-link">The Austrian Federal Ministry for Education, Arts and Culture</a></li>
    <li><a href="http://www.donau-uni.ac.at/de/universitaet/whois/00292/index.php" class="external-link">Donau University - Gerhard Schwed</a><a href="http://wbt.donau-uni.ac.at/linux/linuxstudie-2006-final.pdf" class="external-link"><br />
    </a></li>
</ul>
<p><em><br />
</em></p>
<p><em>This case study is brought to you by the Open Source Observatory  and Repository (OSOR), a project of the European Commission\'s IDABC  project.<br />
</em></p>
<p><em>Author: Gregor Bierhals, UNU-MERIT</em></p>
<p><em>his study is based on interviews with Hemluth Peer, team leader  of desktop4education and teacher at the Weiz secondary school, Gerhard  Schwed, e-learning coordinator at the Donau University, and Rene  Schwarzinger, team member of the Linux Advanced project and teacher at  the Rechte Kremszeile secondary school.<br />
</em></p>
<p>&nbsp;</p>
</div>';
	node_save($newNode);	
	$nid = $newNode->nid;
	$sql = "UPDATE `url_alias` SET `dst` = '".$path."' WHERE `src` = 'node/".$nid."'";
	db_query($sql);
	/** ---------------------------------------------------------------------------------------------- */