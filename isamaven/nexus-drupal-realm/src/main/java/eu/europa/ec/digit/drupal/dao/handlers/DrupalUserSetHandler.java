package eu.europa.ec.digit.drupal.dao.handlers;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.HashSet;
import java.util.Set;

import org.apache.commons.dbutils.ResultSetHandler;
import org.codehaus.plexus.util.StringUtils;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import eu.europa.ec.digit.drupal.domain.DrupalUser;

public class DrupalUserSetHandler implements ResultSetHandler<Set<DrupalUser>> {

    private static Logger logger = LoggerFactory.getLogger(DrupalUserSetHandler.class);

    @Override
    public Set<DrupalUser> handle(ResultSet rs) throws SQLException {
        logger.debug("DrupalUserSetHandler.handle");
        Set<DrupalUser> result = new HashSet<DrupalUser>();
        boolean next = rs.next();
        while (next) {
            
            DrupalUser user = new DrupalUser();

            user.setUid(rs.getString(1));
            user.setFirstname(rs.getString(2));
            user.setLastname(rs.getString(3));
            user.setMail(rs.getString(4));

            do  {
                String role = rs.getString(5);
                if (!rs.wasNull()) {
                    user.addRole(role);
                }
                next = rs.next();
            } while (next && StringUtils.equals(user.getUid(), rs.getString(1)));
            
            result.add(user);
        }
        return result;
    }
}
