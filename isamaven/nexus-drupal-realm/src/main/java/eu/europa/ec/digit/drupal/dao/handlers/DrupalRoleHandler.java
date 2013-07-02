package eu.europa.ec.digit.drupal.dao.handlers;

import java.sql.ResultSet;
import java.sql.SQLException;

import org.apache.commons.dbutils.ResultSetHandler;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import eu.europa.ec.digit.drupal.domain.DrupalRole;

public class DrupalRoleHandler implements ResultSetHandler<DrupalRole> {

    private static Logger logger = LoggerFactory.getLogger(DrupalRoleHandler.class);

    public static DrupalRole toDrupalRole(ResultSet rs) throws SQLException {
        logger.debug("DrupalUserHandler.toDrupalUser");
        DrupalRole role = new DrupalRole();
        role.setId(rs.getString(1));
        role.setName(rs.getString(2));
        logger.debug(role.toString());
        return role;
    }

    @Override
    public DrupalRole handle(ResultSet rs) throws SQLException {
        logger.debug("DrupalUserSetHandler.handle");
        if (rs.next()) {
            return toDrupalRole(rs);
        }
        return null;
    }

}
