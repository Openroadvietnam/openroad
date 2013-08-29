-- Jira 236 : Access to licence wizard for authenticated & anonymous
DELETE FROM `og_ancestry` WHERE group_nid = 19088;

DELETE FROM `node_access` WHERE nid IN (2048, 2063, 2065, 2066, 2069, 19088);
INSERT INTO `node_access` (`nid`, `gid`, `realm`, `grant_view`, `grant_update`, `grant_delete`) VALUES
(2048, 0, 'all', 1, 0, 0),
(2063, 0, 'all', 1, 0, 0),
(2065, 0, 'all', 1, 0, 0),
(2066, 0, 'all', 1, 0, 0),
(2069, 0, 'all', 1, 0, 0);

UPDATE `node_revisions` SET
body = '<p class="documentDescription"><span id="parent-fieldname-description">             <strong>You have received an existing open source software component, licensed under the LGPLv2 or LGPLv3</strong></span></p>
<p><font face="Verdana" color="#436976" class="Apple-style-span"><span style="font-size: 15px;" class="Apple-style-span"> </span></font>Your program, including the modified or un-modified component, can be licensed by you under any licence of your choice (for example, the EUPL). You may even select a non-open source licence (a proprietary licence).<br />
<br />
This is applicable to your program &quot;as a whole&quot;, including the modified component.</p>
<p><a href="wiz-0101">How to select a licence for your program?</a><font face="Verdana" color="#436976" class="Apple-style-span"><a title="Wiz-0101" style="text-decoration: none;" class="internal-link" href="wiz-0101"><br />
</a></font></p>
<p>However, the LGPL licence of the received component is not modified: if it is distributed &quot;alone&quot;, this component - including its derivatives in case modified versions are propagated - will be distributed under the LGPL. </p>
<p><a href="wiz-03">Back to previous...</a><font face="Verdana" color="#436976" class="Apple-style-span"><span style="font-size: 10pt;"><span class="Apple-style-span"><a title="Wiz-03" style="text-decoration: none;" class="internal-link" href="wiz-03"><br />
</a></span></span></font><font face="Verdana" color="#436976" class="Apple-style-span"> </font></p>'
 WHERE nid = 2069 AND vid = 19874;