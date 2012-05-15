package eu.europa.ec.digit.drupal.dao.handlers;

import java.sql.ResultSet;
import java.sql.SQLException;

import org.apache.commons.dbutils.ResultSetHandler;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import eu.europa.ec.digit.drupal.domain.DrupalUser;

public class DrupalUserHandler implements ResultSetHandler<DrupalUser> {

    private static Logger logger = LoggerFactory.getLogger(DrupalUserHandler.class);

    private static DrupalUser toDrupalUser(ResultSet rs) throws SQLException {
        logger.debug("DrupalUserHandler.toDrupalUser");

        DrupalUser user = new DrupalUser();

        user.setUid(rs.getString(1));
        user.setFirstname(rs.getString(2));
        user.setLastname(rs.getString(3));
        user.setMail(rs.getString(4));

        do {
            String role = rs.getString(5);
            if (!rs.wasNull()) {
                user.addRole(role);
            }
        } while (rs.next());

        logger.debug(user.toString());
        return user;
    }

    @Override
    public DrupalUser handle(ResultSet rs) throws SQLException {
        logger.debug("DrupalUserHandler.handle");
        if (rs.next()) {
            return toDrupalUser(rs);
        } else {
            return null;
        }
    }

}