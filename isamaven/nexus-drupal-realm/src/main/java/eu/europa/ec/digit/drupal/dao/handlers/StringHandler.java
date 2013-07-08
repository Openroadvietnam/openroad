package eu.europa.ec.digit.drupal.dao.handlers;

import java.sql.ResultSet;
import java.sql.SQLException;

import org.apache.commons.dbutils.ResultSetHandler;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

public class StringHandler implements ResultSetHandler<String> {
    
    private static Logger logger = LoggerFactory.getLogger(StringHandler.class);

    @Override
    public String handle(ResultSet rs) throws SQLException {
        logger.debug("StringHandler.handle");
        String result = null;
        if (rs.next()) {
            result = rs.getString(1);
        }
        logger.debug("" + result);
        return result;
    }

}
