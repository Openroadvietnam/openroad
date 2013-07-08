Add the following resource ref to the web.xml file of nexus

  <resource-ref>
      <description>DB Connection</description>
      <res-ref-name>jdbc/drupal</res-ref-name>
      <res-type>javax.sql.DataSource</res-type>
      <res-auth>Container</res-auth>
  </resource-ref>
  
Add the following resource to the context.xml file of tomcat

	<Resource
		name="jdbc/drupal"
		auth="Container"
		type="javax.sql.DataSource"
		maxActive="100"
		maxIdle="30"
		maxWait="10000"
		validationQuery="SELECT 1"
		testOnBorrow="true"
		username="********"
		password="********"
		driverClassName="com.mysql.jdbc.Driver"
		url="jdbc:mysql://wormwood.cc.cec.eu.int:3306/isa_drupal_acceptance" />

Copy the following jars

	nexus-drupal-realm-xxx.jar     from target                       to nexus/WEB-INF/lib
	commons-dbutils-xxx.jar        from target/dependency/compile    to nexus/WEB-INF/lib
	
	mysql-connector-java-xxx.jar   from target/dependency/provided   to tomcat/lib