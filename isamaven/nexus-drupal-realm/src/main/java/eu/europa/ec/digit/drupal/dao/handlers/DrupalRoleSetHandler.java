package eu.europa.ec.digit.drupal.dao.handlers;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.HashSet;
import java.util.Set;

import org.apache.commons.dbutils.ResultSetHandler;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import eu.europa.ec.digit.drupal.domain.DrupalRole;

public class DrupalRoleSetHandler implements ResultSetHandler<Set<DrupalRole>> {

    private static Logger logger = LoggerFactory.getLogger(DrupalRoleSetHandler.class);

    @Override
    public Set<DrupalRole> handle(ResultSet rs) throws SQLException {
        logger.debug("DrupalUserSetHandler.handle");
        Set<DrupalRole> result = new HashSet<DrupalRole>();
        while (rs.next()) {
            result.add(DrupalRoleHandler.toDrupalRole(rs));
        }
        return result;
    }

}
