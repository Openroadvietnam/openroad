package eu.europa.ec.digit.drupal.dao;

import javax.naming.Context;
import javax.naming.InitialContext;
import javax.naming.NamingException;
import javax.sql.DataSource;

import org.codehaus.plexus.component.annotations.Component;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

@Component(role = DataSourceFactory.class, hint = "Drupal")
public class DataSourceFactory {

    private static Logger logger = LoggerFactory.getLogger(DataSourceFactory.class);

    private DataSource dataSource;

    private String jndiName = "jdbc/drupal";

    public DataSource getInstance() {
        if (dataSource == null) {
            logger.debug("DataSourceFactory.getInstance");
            try {
                Context initContext = new InitialContext();
                Context envContext = (Context) initContext.lookup("java:/comp/env");
                dataSource = (DataSource) envContext.lookup(jndiName);
            } catch (NamingException ne) {
                throw new RuntimeException("Unable to aquire data source", ne);
            }
        }
        return dataSource;
    }

}
