package eu.europa.ec.digit.drupal.dao.handlers;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.HashSet;
import java.util.Set;

import org.apache.commons.dbutils.ResultSetHandler;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

public class StringSetHandler implements ResultSetHandler<Set<String>> {

    private static Logger logger = LoggerFactory.getLogger(StringSetHandler.class);

    private int index = 1;

    public StringSetHandler() {
    }

    public StringSetHandler(int index) {
        this.index = index;
    }

    @Override
    public Set<String> handle(ResultSet rs) throws SQLException {
        logger.debug("StringSetHandler.handle");
        Set<String> result = new HashSet<String>();
        while (rs.next()) {
            String value = rs.getString(index);
            result.add(value);
            logger.debug("" + value);
        }
        return result;
    }

}