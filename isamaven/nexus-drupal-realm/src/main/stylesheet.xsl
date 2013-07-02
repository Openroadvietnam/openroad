<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	version="1.0">

	<xsl:output method="xml" />

	<xsl:template match="/*">
		<xsl:copy>
			<xsl:copy-of select="@*" />
			<xsl:apply-templates />
			<resource-ref>
				<description>DB Connection</description>
				<res-ref-name>jdbc/drupal</res-ref-name>
				<res-type>javax.sql.DataSource</res-type>
				<res-auth>Container</res-auth>
			</resource-ref>
		</xsl:copy>
	</xsl:template>

	<xsl:template match="@*|node()">
		<xsl:copy>
			<xsl:apply-templates select="@*|node()" />
		</xsl:copy>
	</xsl:template>

</xsl:stylesheet>


